<?php

namespace App\Service\Product;

use App\CakePhpCore\BaseService;


class CreateProductService extends BaseService
{
    private $Products, $View, $FlashHelper; 

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
            $this->flash->success(__('The product has been saved.'));
            return $product;
        }

        $this->flash->error(__('The product could not be saved. Please, try again.'));
        return false;
    }
}
