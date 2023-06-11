<?php

namespace App\Service\Product;

use App\CakePhpCore\BaseService;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;

class CreateProductService extends BaseService
{
    private $Products;

    public function __construct()
    {
        $this->Products = $this->getTableLocator()->get('Products');
        $this->Products->addBehavior('ProductLogic');
    }

    /**
     * Logic to handle the data
     */
    public function handle()
    {
        $product = $this->Products->newEntity();
        $this->data['user_id'] = $this->handler['id'];
        $product = $this->Products->patchEntity($product, $this->data);
        $product = $this->Products->save($product);

        if ($product) {
            $this->sendEmailCreateProduct($product);

            $this->flash->success(__('The product has been saved.'));

            // call job Demo in Service
            TableRegistry::getTableLocator()->get('Queue.QueuedJobs')->createJob('Demo',
            []);

            return $product;
        }

        $this->flash->error(__('The product could not be saved. Please, try again.'));
        return false;
    }

    public function sendEmailCreateProduct($product) {
        $email = new Email('default');
        $email->from(['me@example.com' => 'My Site'])
            ->to('you@example.com')
            ->subject('About')
            ->send('Create product ' . $product->name);
    }
}
