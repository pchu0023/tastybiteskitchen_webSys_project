<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * WebsiteContent Controller
 *
 * @property \App\Model\Table\WebsiteContentTable $WebsiteContent
 */
class WebsiteContentController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->WebsiteContent->find();
        $websiteContent = $this->paginate($query);

        $this->set(compact('websiteContent'));
    }

    /**
     * View method
     *
     * @param string|null $id Website Content id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
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
        $websiteContent = $this->WebsiteContent->newEmptyEntity();
        if ($this->request->is('post')) {
            $websiteContent = $this->WebsiteContent->patchEntity($websiteContent, $this->request->getData());
            if ($this->WebsiteContent->save($websiteContent)) {
                $this->Flash->success(__('The website content has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The website content could not be saved. Please, try again.'));
        }
        $this->set(compact('websiteContent'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Website Content id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $websiteContent = $this->WebsiteContent->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $websiteContent = $this->WebsiteContent->patchEntity($websiteContent, $this->request->getData());
            if ($this->WebsiteContent->save($websiteContent)) {
                $this->Flash->success(__('The website content has been saved.'));

                return $this->redirect(['action' => 'index']);
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
        $this->request->allowMethod(['post', 'delete']);
        $websiteContent = $this->WebsiteContent->get($id);
        if ($this->WebsiteContent->delete($websiteContent)) {
            $this->Flash->success(__('The website content has been deleted.'));
        } else {
            $this->Flash->error(__('The website content could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
