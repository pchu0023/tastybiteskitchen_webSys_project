<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Routing\Router;

/**
 * Images Controller
 *
 * @property \App\Model\Table\ImagesTable $Images
 */
class ImagesController extends AppController
{
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

        if ($fileObject->getError() == UPLOAD_ERR_OK && in_array($fileObject->getClientMediaType(), ['image/jpeg', 'image/png', 'image/gif'])) {
            $destination = WWW_ROOT . 'img' . DS . 'ProductImages' . DS . $fileObject->getClientFilename();
            // Move files to specified directory
            $fileObject->moveTo($destination);

                $this->Flash->success(__('The image has been saved.'));

                // Create a new database record containing the final path to the file
                $image->file_location = Router::url('/webroot/img/ProductImages/') . $fileObject->getClientFilename();

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

    $filePath = WWW_ROOT . 'img' . DS . 'ProductImages' . DS . basename($image->file_location);

    if (file_exists($filePath)) {
        // delete database record
        if ($this->Images->delete($image)) {
            // delete image for file
            if (unlink($filePath)) {
                $this->Flash->success(__('The image and the file have been deleted.'));
            } else {
                $this->Flash->error(__('The image was deleted from the database, but the file could not be deleted.'));
            }
        } else {
            $this->Flash->error(__('The image could not be deleted. Please, try again.'));
        }
    } else {
        $this->Flash->error(__('The file does not exist.'));
        if ($this->Images->delete($image)) {
            $this->Flash->success(__('The image record was deleted, but the file was not found.'));
        } else {
            $this->Flash->error(__('The image could not be deleted. Please, try again.'));
        }
    }

    return $this->redirect(['action' => 'index']);
}

}
