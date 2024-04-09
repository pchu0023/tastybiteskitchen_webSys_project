<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * IngredientsProducts Controller
 *
 * @property \App\Model\Table\IngredientsProductsTable $IngredientsProducts
 */
class IngredientsProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->IngredientsProducts->find()
            ->contain(['Products', 'Ingredients']);
        $ingredientsProducts = $this->paginate($query);

        $this->set(compact('ingredientsProducts'));
    }

    /**
     * View method
     *
     * @param string|null $id Ingredients Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ingredientsProduct = $this->IngredientsProducts->get($id, contain: ['Products', 'Ingredients']);
        $this->set(compact('ingredientsProduct'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ingredientsProduct = $this->IngredientsProducts->newEmptyEntity();
        if ($this->request->is('post')) {
            $ingredientsProduct = $this->IngredientsProducts->patchEntity($ingredientsProduct, $this->request->getData());
            if ($this->IngredientsProducts->save($ingredientsProduct)) {
                $this->Flash->success(__('The ingredients product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ingredients product could not be saved. Please, try again.'));
        }
        $products = $this->IngredientsProducts->Products->find('list', limit: 200)->all();
        $ingredients = $this->IngredientsProducts->Ingredients->find('list', limit: 200)->all();
        $this->set(compact('ingredientsProduct', 'products', 'ingredients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ingredients Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ingredientsProduct = $this->IngredientsProducts->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ingredientsProduct = $this->IngredientsProducts->patchEntity($ingredientsProduct, $this->request->getData());
            if ($this->IngredientsProducts->save($ingredientsProduct)) {
                $this->Flash->success(__('The ingredients product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ingredients product could not be saved. Please, try again.'));
        }
        $products = $this->IngredientsProducts->Products->find('list', limit: 200)->all();
        $ingredients = $this->IngredientsProducts->Ingredients->find('list', limit: 200)->all();
        $this->set(compact('ingredientsProduct', 'products', 'ingredients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ingredients Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ingredientsProduct = $this->IngredientsProducts->get($id);
        if ($this->IngredientsProducts->delete($ingredientsProduct)) {
            $this->Flash->success(__('The ingredients product has been deleted.'));
        } else {
            $this->Flash->error(__('The ingredients product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
