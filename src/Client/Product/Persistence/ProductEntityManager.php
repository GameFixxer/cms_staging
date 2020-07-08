<?php
declare(strict_types=1);
namespace App\Client\Product\Persistence;

use App\Client\Product\Persistence\Entity\Product;
use Cycle\ORM\ORM;
use Cycle\ORM\Transaction;
use App\Generated\Dto\ProductDataTransferObject;

class ProductEntityManager implements ProductEntityManagerInterface
{
    /**
     * @var ProductRepository
     */
    private ProductRepository $productRepository;
    private \Cycle\ORM\RepositoryInterface $ormProductRepository;

    private ORM $orm;

    public function __construct(ORM $orm, ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->orm = $orm;
        $this->ormProductRepository = $orm->getRepository(Product::class);
    }



    public function delete(ProductDataTransferObject $product):void
    {
        $transaction = new Transaction($this->orm);
        $transaction->delete($this->ormProductRepository->findOne(['article_Number'=>$product->getArticleNumber()]));
        $transaction->run();

        $this->productRepository->getProductList();
    }

    public function save(ProductDataTransferObject $product): ProductDataTransferObject
    {
        $transaction = new Transaction($this->orm);


        $entity = $this->ormProductRepository->findOne(['article_Number'=>$product->getArticleNumber()]);
        if (!$entity instanceof Product) {
            $entity = new Product();
        }
        $entity->setProductName($product->getProductName());
        $entity->setCategory($product->getCategory());
        $entity->setProductDescription($product->getProductDescription());
        $entity->setArticleNumber($product->getArticleNumber());
        $transaction->persist($entity);
        $transaction->run();

        $product->setProductId($entity->getId());

        return $product;
    }
}
