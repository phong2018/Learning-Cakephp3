<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ProductsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\ProductsController Test Case
 *
 * @uses \App\Controller\ProductsController
 */
class ProductsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Products',
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
         $this->assertTrue(true);
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
         $this->assertTrue(true);
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
         $this->assertTrue(true);
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
         $this->assertTrue(true);
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
         $this->assertTrue(true);
    }
}
