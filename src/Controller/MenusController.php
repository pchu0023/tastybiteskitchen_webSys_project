<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Menus Controller
 *
 * @property \App\Model\Table\MenusTable $Menus
 */
class MenusController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function initialize(): void
    {
        parent::initialize();

        // By default, CakePHP will (sensibly) default to preventing users from accessing any actions on a controller.
        // These actions, however, are typically required for users who have not yet logged in.
        $this->Authentication->allowUnauthenticated(['index', 'view']);
    }
    public function index()
    {
        $query = $this->Menus->find();
        $menus = $this->paginate($query);

        $this->set(compact('menus'));
    }
 /**
     * index method for admin view
     *
     */
    public function adminIndex()
    {
        $query = $this->Menus->find();
        $menus = $this->paginate($query);

        $this->set(compact('menus'));
    }
     /**
     * render multi active +cater edit of menu - admin view
          */
    public function activeCater()
    {
        $query = $this->Menus->find();
        $menus = $this->paginate($query);

        $this->set(compact('menus'));
    }
 /**
     * post method for multi active + cater edit of menu - admin view
          */
          public function updateAllActiveCaterState()
          {
              if ($this->request->is('post')) {
                  // Get the submitted data from the form
                  $postData = $this->request->getData();
          
                  // Loop through each menu
                  foreach ($postData['active'] as $id => $active) {
                      // Find the menu by its id
                      $menu = $this->Menus->get($id);
          
                      // Update the active state
                      $menu->active = (bool)$active;
                      
                      // Update the catering state
                      $menu->catering = (bool)$postData['catering'][$id] ?? false;
          
                      // Save the menu
                      $this->Menus->save($menu);
                  }
          
                  // Flash success message
                  $this->Flash->success(__('Menus active status updated successfully.'));
          
                  // Redirect back to the active page
                  return $this->redirect(['action' => 'adminIndex']);
              }
          }
          
    /**
     * View method
     *
     * @param string|null $id Menu id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $menu = $this->Menus->get($id, contain: ['Products','Products.Images']);
        $this->set(compact('menu'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $menu = $this->Menus->newEmptyEntity();
        if ($this->request->is('post')) {
            $menu = $this->Menus->patchEntity($menu, $this->request->getData());
            if ($this->Menus->save($menu)) {
                $this->Flash->success(__('The menu has been saved.'));

                return $this->redirect(['action' => 'adminIndex']);
            }
            $this->Flash->error(__('The menu could not be saved. Please, try again.'));
        }
        $products = $this->Menus->Products->find('list', limit: 200)->all();
        $this->set(compact('menu', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Menu id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $menu = $this->Menus->get($id, contain: ['Products']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $menu = $this->Menus->patchEntity($menu, $this->request->getData());
            if ($this->Menus->save($menu)) {
                $this->Flash->success(__('The menu has been saved.'));

                return $this->redirect(['action' => 'adminIndex']);
            }
            $this->Flash->error(__('The menu could not be saved. Please, try again.'));
        }
        $products = $this->Menus->Products->find('list', limit: 200)->all();
        $this->set(compact('menu', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Menu id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $menu = $this->Menus->get($id);
        if ($this->Menus->delete($menu)) {
            $this->Flash->success(__('The menu has been deleted.'));
        } else {
            $this->Flash->error(__('The menu could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'adminIndex']);
    }
}
