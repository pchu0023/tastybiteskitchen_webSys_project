<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Order;

/**
 * OrdersProducts Controller
 *
 * @property \App\Model\Table\OrdersProductsTable $OrdersProducts
 */
class OrdersProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->OrdersProducts->find('all');
        $ordersProducts = $this->paginate($query);

        $this->set(compact('ordersProducts'));
    }

    /**
     * View method
     *
     * @param string|null $id Orders Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ordersProduct = $this->OrdersProducts->get($id, contain: ['Orders', 'Products']);
        $this->set(compact('ordersProduct'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ordersProduct = $this->OrdersProducts->newEmptyEntity();
        if ($this->request->is('post')) {
            $ordersProduct = $this->OrdersProducts->patchEntity($ordersProduct, $this->request->getData());
            if ($this->OrdersProducts->save($ordersProduct)) {
                $this->Flash->success(__('The orders product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orders product could not be saved. Please, try again.'));
        }
        $orders = $this->OrdersProducts->Orders->find('list', limit: 200)->all();
        $products = $this->OrdersProducts->Products->find('list', limit: 200)->all();
        $this->set(compact('ordersProduct', 'orders', 'products'));
    }


    /**
     * Add method for adding orders_products using the cart session
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function addFromSession($id = null)
    {
        $arr = $this->request->getSession()->read('cart');

        foreach ($arr as $key => $value) {
            $ordersProduct = $this->OrdersProducts->newEmptyEntity();
            $ordersProduct->order_id = $id;
            $ordersProduct->product_id = $value['product']['id'];
            $ordersProduct->quantity= $value['quantity'];

            if (!$this->OrdersProducts->save($ordersProduct)) {
                $this->Flash->error(__('Failed to save orders_products entry.'));
                return $this->redirect(['controller' => 'Carts', 'action' => 'index']);
            }
        }

        $this->Flash->success(__('Your order has been saved successfully.'));
        return $this->redirect(['controller' => 'Carts', 'action' => 'clear']);





    }




    /**
     * Edit method
     *
     * @param string|null $id Orders Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ordersProduct = $this->OrdersProducts->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ordersProduct = $this->OrdersProducts->patchEntity($ordersProduct, $this->request->getData());
            if ($this->OrdersProducts->save($ordersProduct)) {
                $this->Flash->success(__('The orders product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orders product could not be saved. Please, try again.'));
        }
        $orders = $this->OrdersProducts->Orders->find('list', limit: 200)->all();
        $products = $this->OrdersProducts->Products->find('list', limit: 200)->all();
        $this->set(compact('ordersProduct', 'orders', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Orders Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ordersProduct = $this->OrdersProducts->get($id);
        if ($this->OrdersProducts->delete($ordersProduct)) {
            $this->Flash->success(__('The orders product has been deleted.'));
        } else {
            $this->Flash->error(__('The orders product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
