<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 */
class ProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function initialize(): void
    {
        parent::initialize();

        // Controller-level function/action whitelist for authentication
        $this->Authentication->allowUnauthenticated(['view', 'index', 'addToCart']);
    }

    public function index()
    {
        $query = $this->Products->find();
        $products = $this->paginate($query);

        $this->set(compact('products'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, contain: ['Images', 'Ingredients', 'Menus', 'Orders']);
        $this->set(compact('product'));
    }

    public function quantityEdit()
    {
        $query = $this->Products->find();
        $product = $this->paginate($query);

        $this->set(compact('product'));
    }
    public function cateringEdit()
    {
        $query = $this->Products->find();
        $product = $this->paginate($query);

        $this->set(compact('product'));
    }

    public function updateAllQuantities()
{
    if ($this->request->is('post')) {
        // Get the submitted data from the form
        $postData = $this->request->getData();

        // Loop through each product
        foreach ($postData['quantity'] as $productId => $quantity) {
            // Find the product by its id
            $product = $this->Products->get($productId);

            // Update the quantity
            $product->quantity = $quantity;

            // Save the product
            $this->Products->save($product);
        }

        // Flash success message
        $this->Flash->success(__('Product quantities updated successfully.'));

        // Redirect back to the index page
        return $this->redirect(['action' => 'index']);
    }
}
public function updateAllCatering()
{
    if ($this->request->is('post')) {
        // Get the submitted data from the form
        $postData = $this->request->getData();

        // Loop through each product
        foreach ($postData['catering_discount'] as $productId => $cateringDiscount) {
            // Find the product by its id
            $product = $this->Products->get($productId);

            // Update the catering
            $product->catering_discount = $cateringDiscount;

            // Save the product
            $this->Products->save($product);
        }

        // Flash success message
        $this->Flash->success(__('Products catering discounts updated successfully.'));

        // Redirect back to the index page
        return $this->redirect(['action' => 'index']);
    }
}

/**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEmptyEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $images = $this->Products->Images->find('list', limit: 200)->all();
        $ingredients = $this->Products->Ingredients->find('list', limit: 200)->all();
        $menus = $this->Products->Menus->find('list', limit: 200)->all();
        $orders = $this->Products->Orders->find('list', limit: 200)->all();
        $this->set(compact('product', 'images', 'ingredients', 'menus', 'orders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, contain: ['Images', 'Ingredients', 'Menus', 'Orders']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $images = $this->Products->Images->find('list', limit: 200)->all();
        $ingredients = $this->Products->Ingredients->find('list', limit: 200)->all();
        $menus = $this->Products->Menus->find('list', limit: 200)->all();
        $orders = $this->Products->Orders->find('list', limit: 200)->all();
        $this->set(compact('product', 'images', 'ingredients', 'menus', 'orders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        $this->Products->patchEntity($product, ['isArchived' => true]);
        if ($this->Products->save($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Add to cart method
     * Responsible for storing product information into the session, which is then used to populate the shopping cart page
     */
    public function addToCart($id = null)
    {
        // Identify the product
        $product = $this->Products->get($id);

        // Initialise the cart in session if it doesn't exist
        if ($this->request->getSession()->read('cart') == null) {
            $arr = [];
            $this->request->getSession()->write('cart', $arr);
        }

        // read existing cart
        $arr = $this->request->getSession()->read('cart');

        // If the product is not already in the cart add it, else update quantity
        $productExists = false;
        foreach ($arr as $key => $item) {
            if ($item['product']->id == $product->id) {
                // Update quantity
                $arr[$key]['quantity'] += 1;
                $productExists = true;
                $quantity = $arr[$key]['quantity'];
                break;
            }
        }
        if (!$productExists) {
            $prodInfo = [
                "product" => $product,
                "quantity" => 1,
            ];
            $arr[] = $prodInfo;
            $quantity = 1;
        }
        // add new product to existing cart


        // Overwrite previous cart in session
        $this->request->getSession()->write('cart', $arr);

        // Success message & Redirect to menus
        if ($productExists) {
            $this->Flash->success(__('{0} of this product has been added', $quantity));
        } else {
            $this->Flash->success(__('product has been added'));
        }
        $refererUrl = $this->request->getQuery('return_to');
        if ($refererUrl) {
            return $this->redirect($refererUrl);
        } else {
            // If referer URL is not available, redirect to the current page
        return $this->redirect($this->referer());
    }
        // return $this->redirect($this->referer());
        // return $this->redirect(['Controller'=> 'Menus','action' => 'view']);

    }


}
