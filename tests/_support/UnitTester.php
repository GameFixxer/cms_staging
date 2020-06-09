<?php


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause()
 *
 * @SuppressWarnings(PHPMD)
*/

use App\Model\Dto\ProductDataTransferObject;
use App\Model\Entity\Product;
use App\Service\Container;
use App\Service\DependencyProvider;
use App\Service\View;

class UnitTester extends \Codeception\Actor
{
    use _generated\UnitTesterActions;

    /**
     * Define custom actions here
     * @param int $id
     * @throws Exception
     */
    /** @var  View $view */
    private View $view;
    private Container $container;

    public function arrange()
    {
        $this->container = new Container();
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($this->container);
        $this->view = include __DIR__.'/../../Bootstrap.php';
    }

    public function getProduct(int $id): ?ProductDataTransferObject
    {
        $productRepository = $this->setUpContainer();
        $productEntity = $productRepository->getProduct($id);
        if ($productEntity instanceof Product) {
            return $productRepository->getProduct($id);
        }
        return null;
    }

    public function getProductList()
    {
        $productRepository = $this->setUpContainer();
        return $productRepository->getProductList();
    }
    public function getSmartyParams(string $paramName)
    {
        //$this->view = $this->setUpSmartyAndView();
        return $this->view->getParam($paramName);
    }

    public function exchangeDtoToSmartyParam($value, string $name)
    {
        $this->makeSmarty($value, $name);
        return $this->getSmartyParams($name);
    }

    public function logIntoBackend(): void
    {
        $this->container = new Container();
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($this->container);
        $tmp = $this->container->get(\App\Service\SessionUser::class);
        $tmp->setUser('test');
    }

    private function makeSmarty($value, string $name):void
    {
        $this->view->addTlpParam($name, $value);
    }
    private function setUpContainer():\App\Model\ProductRepository
    {
        return $this->container->get(\App\Model\ProductRepository::class);
    }
}
