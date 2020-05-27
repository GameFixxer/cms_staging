<?php
use App\Service\View;
use App\Service\Container;
use App\Service\DependencyProvider;

class DetailPageTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    /** @var  View $view */
    private View $view;
    /** @var  Container $container */
    private Container $container;

    protected function _before(): void
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testProductDetailPageAndProductAvailability(): void
    {
        $_GET = [
                'cl' => 'detail',
                'page'=>'list',
                'id'=>'5'
        ];
        $this->view = include __DIR__.'/../../Bootstrap.php';
        $this->container = new Container();
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($this->container);

        $product = (array) $this->view->getParam('page');

        $productRepository = $this->container->get(\App\Model\ProductRepository::class);

        $productFromRepository = $productRepository->getProduct(5);

        $this->view->addTlpParam('page', $productFromRepository);

        $secondProduct= (array) $this->view->getParam('page');

        $this->assertEquals($product, $secondProduct);
    }
}
