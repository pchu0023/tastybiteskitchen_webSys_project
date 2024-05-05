<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;
/**
 * WebsiteContent Controller
 *
 * @property \App\Model\Table\WebsiteContentTable $WebsiteContent
 */
class WebsiteContentController extends AppController
{


    // public function beforeFilter(\Cake\Event\EventInterface $event)
    // {
    //     parent::beforeFilter($event);
    //     // Allow non-logged-in users to access the 'add' 'index' action
    //     $this->Authentication->allowUnauthenticated(['view','edit']);
    //     //later to delete there
    // }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

    }

    /**
     * View method
     *
     * @param string|null $id Website Content id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = 1)
    {
        $websiteContent = $this->WebsiteContent->get($id, contain: []);
        $this->set(compact('websiteContent'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
     
    }

    /**
     * Edit method
     *
     * @param string|null $id Website Content id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = 1)
{
    $websiteContent = $this->WebsiteContent->get($id, contain: []);
    if ($this->request->is(['patch', 'post', 'put'])) {

        $data = $this->request->getData();
    
        $websiteContent = $this->WebsiteContent->patchEntity($websiteContent, $data);
        if ($this->WebsiteContent->save($websiteContent)) {
            $this->Flash->success(__('The website content has been saved.'));
            return $this->redirect(['action' => 'view']);
        }
        $this->Flash->error(__('The website content could not be saved. Please, try again.'));
    }
    $this->set(compact('websiteContent'));
}




    /**
     * Delete method
     *
     * @param string|null $id Website Content id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
      
    }
}
