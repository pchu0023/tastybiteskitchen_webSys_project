<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 */
class OrdersController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        // By default, CakePHP will (sensibly) default to preventing users from accessing any actions on a controller.
        // These actions, however, are typically required for users who have not yet logged in.
        $this->Authentication->allowUnauthenticated(['addBlankEntity']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Orders->find('all');
        $orders = $this->paginate($query);

        $this->set(compact('orders'));
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Orders->get($id, contain: ['Products']);
        $this->set(compact('order'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $order = $this->Orders->newEmptyEntity();
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $payments = $this->Orders->Payments->find('list', limit: 200)->all();
        $deliveries = $this->Orders->Deliveries->find('list', limit: 200)->all();
        $products = $this->Orders->Products->find('list', limit: 200)->all();
        $this->set(compact('order', 'payments', 'deliveries', 'products'));
    }


    /**
     * Add method for adding from session
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function addBlankEntity()
    {
        $order = $this->Orders->newEmptyEntity();
        if (!$this->Orders->save($order)) {
            $this->Flash->error(__('The order failed to save.'));
            return $this->redirect(['controller' => 'Carts', 'action' => 'index']);
        }

        return $this->redirect(['controller' => 'OrdersProducts', 'action' => 'addFromSession', $order->id]);
    }


    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, contain: ['Products']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $payments = $this->Orders->Payments->find('list', limit: 200)->all();
        $deliveries = $this->Orders->Deliveries->find('list', limit: 200)->all();
        $products = $this->Orders->Products->find('list', limit: 200)->all();
        $ordersProduct = $this->Orders->Products->junction()->find('list', limit: 200)->all();
        $this->set(compact('order', 'payments', 'deliveries', 'products', 'ordersProduct'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    /**
     * render all orders with status edit options - admin
     */
    public function multipleOrderStatus()
    {
        $query = $this->Orders->find();
        $orders = $this->paginate($query);

        $this->set(compact('orders'));
    }



    /**
     * post method for changing multiple order statuses at once
     */
    public function updateAllOrderStatus()
    {
        if ($this->request->is('post')) {
            // Get the submitted data from the form
            $postData = $this->request->getData();

            // Loop through each order
            foreach ($postData['status'] as $id => $status) {
                // Find the menu by its id
                $order = $this->Orders->get($id);

                // Update the active state
                $order->status = $status;

                // Save the menu
                $this->Orders->save($order);
            }

            // Flash success message
            $this->Flash->success(__('Order status(es) updated successfully.'));

            // Redirect back to the active page
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error(__('Order status(es) failed to update.'));
        return $this->redirect(['action' => 'index']);
    }



}
