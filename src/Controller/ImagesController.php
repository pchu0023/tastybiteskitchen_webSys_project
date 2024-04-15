<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Images Controller
 *
 * @property \App\Model\Table\ImagesTable $Images
 */
class ImagesController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Allow non-logged-in users to access the 'add' 'index' action
        $this->Authentication->allowUnauthenticated(['add','index']);
        //later to delete there
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Images->find();
        $images = $this->paginate($query);

        $this->set(compact('images'));
    }

    /**
     * View method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $image = $this->Images->get($id, contain: ['Products']);
        $this->set(compact('image'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
public function add()
{
    $image = $this->Images->newEmptyEntity();
    if ($this->request->is('post')) {
        $fileObject = $this->request->getData('file');

        if ($fileObject->getError() == UPLOAD_ERR_OK) {
            $destination = WWW_ROOT . 'img' . DS . 'ProductImages' . DS . $fileObject->getClientFilename();
            // Move files to specified directory
            $fileObject->moveTo($destination);

                $this->Flash->success(__('The image has been saved.'));
                
                // Create a new database record containing the final path to the file
                $image->file_location = 'webroot/img/ProductImages/' . $fileObject->getClientFilename();
                
                // Try saving $image object to database
                if ($result = $this->Images->save($image)) {
                    // open the list page
                    $this->Flash->success(__('Image path saved to database.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    // Log the error message
                    Log::error('Image path could not be saved to the database. Image entity details: ' . print_r($image->getErrors(), true));
                    $this->Flash->error(__('The image path could not be saved to the database. Please, try again.'));
                }

            } else {
                $this->Flash->error(__('Please select a valid file to upload.'));
            }
        }
        $this->set(compact('image'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $image = $this->Images->get($id, contain: ['Products']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $image = $this->Images->patchEntity($image, $this->request->getData());
            if ($this->Images->save($image)) {
                $this->Flash->success(__('The image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The image could not be saved. Please, try again.'));
        }
        $products = $this->Images->Products->find('list', limit: 200)->all();
        $this->set(compact('image', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $image = $this->Images->get($id);
        if ($this->Images->delete($image)) {
            $this->Flash->success(__('The image has been deleted.'));
        } else {
            $this->Flash->error(__('The image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
