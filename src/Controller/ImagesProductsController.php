<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ImagesProducts Controller
 *
 * @property \App\Model\Table\ImagesProductsTable $ImagesProducts
 */
class ImagesProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->ImagesProducts->find()
            ->contain(['Images', 'Products']);
        $imagesProducts = $this->paginate($query);

        $this->set(compact('imagesProducts'));
    }

    /**
     * View method
     *
     * @param string|null $id Images Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $imagesProduct = $this->ImagesProducts->get($id, contain: ['Images', 'Products']);
        $this->set(compact('imagesProduct'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $imagesProduct = $this->ImagesProducts->newEmptyEntity();
        if ($this->request->is('post')) {
            $imagesProduct = $this->ImagesProducts->patchEntity($imagesProduct, $this->request->getData());
            if ($this->ImagesProducts->save($imagesProduct)) {
                $this->Flash->success(__('The images product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The images product could not be saved. Please, try again.'));
        }
        $images = $this->ImagesProducts->Images->find('list', limit: 200)->all();
        $products = $this->ImagesProducts->Products->find('list', limit: 200)->all();
        $this->set(compact('imagesProduct', 'images', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Images Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $imagesProduct = $this->ImagesProducts->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $imagesProduct = $this->ImagesProducts->patchEntity($imagesProduct, $this->request->getData());
            if ($this->ImagesProducts->save($imagesProduct)) {
                $this->Flash->success(__('The images product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The images product could not be saved. Please, try again.'));
        }
        $images = $this->ImagesProducts->Images->find('list', limit: 200)->all();
        $products = $this->ImagesProducts->Products->find('list', limit: 200)->all();
        $this->set(compact('imagesProduct', 'images', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Images Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $imagesProduct = $this->ImagesProducts->get($id);
        if ($this->ImagesProducts->delete($imagesProduct)) {
            $this->Flash->success(__('The images product has been deleted.'));
        } else {
            $this->Flash->error(__('The images product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
