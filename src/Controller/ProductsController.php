<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Service\Product\CreateProductService;
use App\Validator\Product\CreateProductValidator;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    public $paginate = [
        'limit' => 5, // Number of products per page
        'contain' => ['Users'] // Eager load the associated User model
    ];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
    }

    /**
     * demo method
     *
     * @return \Cake\Http\Response|null
     */
    public function demo()
    {
        $products = $this->paginate($this->Products);

        $this->render('demo');
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => [],
        ]);

        $this->set('product', $product);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */

    public function add()
    {
        if ($this->request->is('post')) {
            $errors = (new CreateProductValidator())->validate($this->request->getData());
            if (empty($errors)) {
                $product = (new CreateProductService())->setHandler($this->Auth->user())->setFlash($this->Flash)->setData($this->request->getData())->handle();
                if ($product) {
                    // call Demo job in Contrller
                    // $this->loadModel('Queue.QueuedJobs');
                    // $this->QueuedJobs->createJob('Demo', []);

                    return $this->redirect(['action' => 'index']);
                }
                return $this->redirect(['action' => 'add']);
            }
            $this->set(compact('errors'));
        }
        $product = $this->Products->newEntity();
        $this->set(compact('product'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('product'));
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
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
