<?php

use App\Service\Container;
use App\Service\DependencyProvider;
use App\Service\View;

class FrontendListPageTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    /** @var  View $view */
    private View $view;
    /** @var  Container $container */
    private Container $container;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests

    public function testDoesListHasAllProducts(): void
    {
        $_GET = [
                'cl' => 'list',
                'page'=>'list'
        ];
        $this->view = include __DIR__.'/../../Bootstrap.php';
        $this->container = new Container();
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($this->container);

        $productList = (array)$this->view->getParam('productList');

        $productRepository = $this->container->get(\App\Model\ProductRepository::class);

        $productListFromRepository = $productRepository->getProductList();

        $this->view->addTlpParam('productList', $productListFromRepository);

        $secondProductList = (array)$this->view->getParam('productList');

        $this->assertEquals($productList, $secondProductList);

    }
}
