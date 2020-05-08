<?php
namespace App\Controller\Backend;

use App\Controller\BackendController;
use App\Model\Dto\ProductDataTransferObject;
use App\Model\ProductEntityManager;
use App\Model\ProductRepository;
use App\Service\Container;
use App\Service\SessionUser;
use App\Service\View;

class ProductController implements BackendController
{
    public const ROUTE = 'product';
    private ProductRepository $productRepository;
    private ProductEntityManager $productEntityManager;
    private SessionUser $userSession;
    private View $view;

    public function __construct(Container $container)
    {
        $this->productRepository= $container->get(ProductRepository::class);
        $this->productEntityManager =$container->get(ProductEntityManager::class);
        $this->userSession=$container->get(SessionUser::class);
        $this->view= $container->get(View::class);
    }

    public function init(): void
    {
        if (!$this->userSession->isLoggedIn()) {
            $this->redirectToPage(LoginCOntroller::ROUTE);
        }
    }

    public function listAction()
    {
    }

    public function detailAction(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            switch ($_POST) {
                case !empty($_POST['delete']):
                    $productId = (int)$_POST['delete'];
                    $this->deleteProduct($productId);
                    break;
                case !empty($_POST['save']):
                    $productId = (int)$_POST['save'] ;
                    $pageName = (string)$_POST['newpagename'];
                    $description = (string)$_POST['newpagedescription'];
                    $this->saveProduct($productId, $pageName, $description);
                    break;
            }
        }
        $this->loadPage();
    }

    public function deleteProduct(int $id): void
    {
        $this->productEntityManager->delete($this->productRepository->getProduct($id));
        $this->redirectToPage(DashboardController::ROUTE);
    }

    public function saveProduct(int $id, string $description, string $name): void
    {
        if (!empty($id)&& $this->productRepository->hasProduct($id)) {
            $dto = $this->productRepository->getProduct($id);
        } else {
            $dto = new ProductDataTransferObject();
        }
        $dto->setProductDescription($description);
        $dto->setProductName($name);

        $this->productEntityManager->save($dto);
    }

    private function loadPage(): void
    {
        $pageId = (int)$_GET['id'];
        try {
            $this->view->addTlpParam('', $this->productRepository->getProduct($pageId));
            $this->view->addTemplate('productEditPage.tpl');
        } catch (\Exception $e) {
        }
    }


    private function redirectToPage(string $route):void
    {
        $host = $_SERVER['HTTP_HOST'];
        $uri = trim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra= 'Index.php?cl='.$route;
        $extra2='&admin=true';
        header("Location: http://$host$uri/$extra$extra2");
        exit;
    }
}
