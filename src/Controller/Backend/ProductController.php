<?php
namespace App\Controller\Backend;

use App\Controller\Controller;
use App\Model\Dto\ProductDataTransferObject;
use App\Model\ProductEntityManager;
use App\Model\ProductRepository;

class ProductController implements Controller
{
    private ProductRepository $productRepository;
    private ProductEntityManager $productEntityManager;
    public function __construct(ProductRepository $productRepository, ProductEntityManager $productEntityManager)
    {
        $this->productRepository=$productRepository;
        $this->productEntityManager = $productEntityManager;
    }

    public function action(): void
    {
        switch ($_POST) {
            case !empty($_POST['delete']):
                $tmp = (int)$_POST['delete'];
                $this->deleteProduct($tmp);
                $this->flushPage();
                break;
            case !empty($_POST['update']):
                $tmp = (int)$_POST['update'];
                $inputdesc = (string)$_POST['updatedescription'];
                $inputname = (string)$_POST['updatename'];
                $this->updateProduct($tmp, $inputdesc, $inputname);
                $this->flushPage();
                break;
            case !empty($_POST['new']):
                $tmp = (string)$_POST['newpname'];
                $input = (string)$_POST['newpdescription'];
                $this->createProduct($tmp, $input);
                $this->flushPage();
                break;
        }
    }

    public function deleteProduct(int $id): void
    {
        $this->productEntityManager->delete($this->productRepository->getProduct($id));
    }

    public function updateProduct(int $id, string $description, string $name): void
    {
        $dto = $this->productRepository->getProduct($id);
        if (!($description === '')) {
            $dto->setProductDescr($description);
        }
        if (!($name === '')) {
            $dto->setProductName($name);
        }
        $this->productEntityManager->safe($dto);
    }

    public function createProduct(string $description, string $name): void
    {
        $dto = new ProductDataTransferObject();
        if ($description === ''||$name === '') {
            throw new \Exception('Error! Name and Description cannot be empty.', 1);
        }
        $dto->setProductDescr($description);
        $dto->setProductName($name);
        $this->productEntityManager->safe($dto);
    }
    private function flushPage(): void
    {
        $host = $_SERVER['HTTP_HOST'];
        $uri = trim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra= 'Index.php?page='.Dashboard::ROUTE;
        $extra2='&admin=true';
        header("Location: http://$host$uri/$extra$extra2");
        exit;
    }
}
