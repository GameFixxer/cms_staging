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
use App\Service\SessionUser;

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
    }
    public function setUpBootstrap()
    {
        $this->view = include __DIR__.'/../../Bootstrap.php';
    }
    public function getProduct(string $articleNumber): ?ProductDataTransferObject
    {
        $productRepository = $this->getProductRepository();
        return $productRepository->getProduct($articleNumber);
    }
    public function getContainer():Container
    {
        return $this->container;
    }
    public function getProductList()
    {
        $productRepository = $this->getProductRepository();
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
    public function setSession()
    {
        $tmp = $this->container->get(SessionUser::class);
        $tmp->loginUser('nina');
        $tmp->setUserRole('root');
    }
    public function createArticleNumber():string
    {
        $list = $this->getProductRepository()->getProductList();
        $idCounter = end($list)->getProductId() + 1;
        return (string)$idCounter;
    }
    public function logIntoBackend(): void
    {
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($this->container);
    }
    private function makeSmarty($value, string $name):void
    {
        $this->view->addTlpParam($name, $value);
    }
    private function getProductRepository():\App\Model\ProductRepository
    {
        return $this->container->get(\App\Model\ProductRepository::class);
    }


}
