<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Product;
use App\Model\Table\ProductsTable;
use Cake\Http\ServerRequest;
use Ramsey\Uuid\Uuid;

/**
 * Carts Controller
 *
 *  @property \App\Model\Table\ProductsTable $Products
 */
class CartsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        // By default, CakePHP will (sensibly) default to preventing users from accessing any actions on a controller.
        // These actions, however, are typically required for users who have not yet logged in.
        $this->Authentication->allowUnauthenticated(
            [
                'index',
                'delete',
                'clear',
                'checkoutClear',
                'checkout',
                'saveDeliveryToSession',
                'transferOrderSuccess',
                'cardOrderSuccess',
                ]);
    }

    public $modelClass = '';


    public function index()
    {
        $session = $this->request->getSession();
        $session->write('PaymentConfirmed', false);
   }


    public function view($id = null)
    {

    }


    public function update($id = null)
    {
        $arr = $this->request->getSession()->read('cart');


        if ($this->request->is('post')) {
            $formData = $this->request->getData();
            foreach ($formData['productQuantity'] as $productId => $quantity) {
                foreach ($arr as $key => $value) {
                    if ($value['product']['id'] == $productId) {
                        $arr[$key]['quantity'] = $quantity;
                        $arr = array_values($arr);
                        $this->request->getSession()->write('cart', $arr);
                    }
                }
            }
            $this->Flash->success(__('Product(s) quantity updated'));
            return $this->redirect(['controller' => 'Carts', 'action' => 'index']);
        }
        $this->Flash->error(__('Failed to update item quantity.'));
        return $this->redirect(['controller' => 'Carts', 'action' => 'index']);



    }

    public function delete($id = null)
    {
        $arr = $this->request->getSession()->read('cart');

        foreach ($arr as $key => $value) {
            if ($value['product']['id'] == $id) {
                unset($arr[$key]);
                $arr = array_values($arr);
                $this->request->getSession()->write('cart', $arr);

                $this->Flash->success(__('Product removed from cart.'));
                return $this->redirect(['controller' => 'Carts', 'action' => 'index']);

            }
        }

        $this->Flash->error(__('Failed to remove product from cart.'));
        return $this->redirect(['controller' => 'Carts', 'action' => 'index']);

    }


    public function clear()
    {
        $arr = $this->request->getSession()->read('cart');

        foreach ($arr as $key => $value) {
            unset($arr[$key]);
            $this->request->getSession()->write('cart', $arr);
            $this->Flash->success(__('Cart cleared.'));
        }
        return $this->redirect(['controller' => 'Carts', 'action' => 'index']);
    }

    public function checkout(){
        require_once '../vendor/autoload.php';
        require_once '../config/secrets.php';
        \Stripe\Stripe::setApiKey($stripeSecretKey);

        $paymentSessionId = Uuid::uuid4()->toString();
        $this->request->getSession()->write('paymentSessionId', $paymentSessionId);

//      Build empty array
        $cartarr = array();
//      Build cart in Stripe form
        foreach ($this->request->getSession()->read('cart') as $value) {
            $product = $value['product'];
            $quantity = $value['quantity'];
//          Cost * 100 is because cost is in cents, so change to dollars $$$$$$$$$$
            if ($quantity >= 20) {
//              Cost = Price of the item multiplied by the inverse of the discount (10% off = cost * 0.9, 20% off = cost * 0.8, etc..)
                $cost = round((($product->price) * (1.0 - ($product->catering_discount / 100))) * 100);
            }
            else {
                $cost = round(($product->price) * 100);
            }
            $name = ($product->name);
            $description = ($product->description);

            $cart_item = [
                'price_data' => [
                    'currency' => 'aud',
                    'unit_amount' => $cost,
                    'product_data' => [
                        'name' => $name,
                        'description' => $description,
                    ],
                ],
                'quantity' => $quantity,
            ];

            array_push($cartarr, $cart_item);
        }

        header('Content-Type: application/json');
        $YOUR_DOMAIN = \Cake\Routing\url('/', true);

        $checkout_session = \Stripe\Checkout\Session::create([
            'line_items' => [$cartarr],
            'mode' => 'payment',
            'success_url' => $YOUR_DOMAIN . "Carts/card_order_success?session_id={$paymentSessionId}",
            'cancel_url' => $YOUR_DOMAIN . "Carts",
        ]);

        header("HTTP/1.1 303 See Other");
        return $this->redirect($checkout_session->url);
    }

    public function saveDeliveryToSession(){

        if ($this->request->is('post')) {
            $formData = $this->request->getData();
            $this->request->getSession()->write('DeliveryData', $formData);

            if ($formData['submit'] === 'card') {
                return $this->redirect(['action' => 'checkout']);
            } elseif ($formData['submit'] === 'bank') {
                return $this->redirect(['action' => 'transferOrderSuccess']);
            }

            return $this->redirect(['action' => 'checkout']);
        }
        $this->Flash->error('Unexpected and invalid request occurred! Please try again.');

        return $this->redirect(['action' => 'index']);
    }

    public function cardOrderSuccess(){
        $this->Orders = $this->fetchTable('Orders');
        $session = $this->request->getSession();
        $deliveryData = $session->read('DeliveryData');

        $storedSessionId = $session->read('paymentSessionId');
        $passedSessionId = $this->request->getQuery('session_id');

        if ($storedSessionId !== $passedSessionId) {
            $this->Flash->warning('Invalid payment session. Please try again.');
            return $this->redirect(['action' => 'index']);
        }

        $session->write('PaymentConfirmed', true);

        if (!$session->read('PaymentConfirmed')) {
            $this->Flash->warning('Payment has not been confirmed.');
            return $this->redirect(['action' => 'index']);
        }

        if (empty($deliveryData)) {
            $this->Flash->warning('No delivery details found.');
            return $this->redirect(['action' => 'index']);
        }

        // Create the order in the database using $deliveryData
        $order = $this->Orders->newEmptyEntity();
        $order->id = Uuid::uuid4()->toString();
        $order->delivery_address = $deliveryData['address'];
        $order->requested_date = $deliveryData['requested_date'];
        $order->receiver_name = $deliveryData['first_name'] . ' ' . $deliveryData['last_name'];
        $order->receiver_phone = $deliveryData['phone_number'];
        if ($this->Orders->save($order)) {
            $this->set(compact('deliveryData'));
            $this->set(compact('order'));

            // Link to OrderProducts
            // Link to OrderProducts
            $this->OrdersProducts = $this->fetchTable('OrdersProducts');
            $arr = $this->request->getSession()->read('cart');
            foreach ($arr as $key => $value) {
                $ordersProduct = $this->OrdersProducts->newEmptyEntity();
                $ordersProduct->order_id = $order->id;
                $ordersProduct->product_id = $value['product']['id'];
                $ordersProduct->quantity = $value['quantity'];
                $ordersProduct->product_name = $value['product']['name'];
                $ordersProduct->product_price = $value['product']['price'];
                $ordersProduct->product_description = $value['product']['description'];

                if (!$this->OrdersProducts->save($ordersProduct)) {
                    $this->Flash->error(__('Failed to save orders_products entry.'));
                }
            }

            // Update quantities of products
            // Load Products table
            $Products = $this->fetchTable('Products');
            // For each item in the cart
            foreach ($this->request->getSession()->read('cart') as $value) {
                $productCart = $value['product'];
                $quantityCart = $value['quantity'];
                $productID = ($productCart->id);
                $product = $Products->get($productID);
                if (($product->quantity - $quantityCart) < 0) {
                    $product->quantity = 0;
                } else {
                    $product->quantity -= $quantityCart;
                }
                $Products->save($product);
            }
            $session->delete('paymentSessionId');
            $this->set(compact('session'));
        } else {
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
    }

    public function transferOrderSuccess(){
        $session = $this->request->getSession();
        $this->Orders = $this->fetchTable('Orders');
        $session = $this->request->getSession();
        $deliveryData = $session->read('DeliveryData');

        if (empty($deliveryData)) {
            $this->Flash->error('No delivery details found.');
            return $this->redirect(['action' => 'index']);
        }

        // Create the order in the database using $deliveryData
        $order = $this->Orders->newEmptyEntity();
        $order->id = Uuid::uuid4()->toString();
        $order->delivery_address = $deliveryData['address'];
        $order->requested_date = $deliveryData['requested_date'];
        $order->receiver_name = $deliveryData['first_name'] . ' ' . $deliveryData['last_name'];
        $order->receiver_phone = $deliveryData['phone_number'];
        if ($this->Orders->save($order)) {
            // Link to OrderProducts
            $this->OrdersProducts = $this->fetchTable('OrdersProducts');
            $arr = $this->request->getSession()->read('cart');
            foreach ($arr as $key => $value) {
                $ordersProduct = $this->OrdersProducts->newEmptyEntity();
                $ordersProduct->order_id = $order->id;
                $ordersProduct->product_id = $value['product']['id'];
                $ordersProduct->quantity= $value['quantity'];
                $ordersProduct->product_name = $value['product']['name'];
                $ordersProduct->product_price = $value['product']['price'];
                $ordersProduct->product_description = $value['product']['description'];

                if (!$this->OrdersProducts->save($ordersProduct)) {
                    $this->Flash->error(__('Failed to save orders_products entry.'));
                }
            }

            $this->set(compact('deliveryData'));
            $this->set(compact('order'));
            $this->set(compact('session'));
        }
        else {
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
    }
}
