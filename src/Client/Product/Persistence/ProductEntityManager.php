<?php
declare(strict_types=1);
namespace App\Client\Product\Persistence;

use App\Client\Attribute\Persistence\Entity\Attribute;
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

    /**
     * @param \Cycle\ORM\ORM $orm
     * @param \App\Client\Product\Persistence\ProductRepository $productRepository
     */
    public function __construct(ORM $orm, ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->orm = $orm;
        $this->ormProductRepository = $orm->getRepository(Product::class);
    }

    /**
     * @param \App\Generated\Dto\ProductDataTransferObject $product
     */

    public function delete(ProductDataTransferObject $product):void
    {
        $transaction = new Transaction($this->orm);
        $transaction->delete($this->ormProductRepository->findOne(['article_Number'=>$product->getArticleNumber()]));
        $transaction->run();

        $this->productRepository->getProductList();
    }

    /**
     * @param \App\Generated\Dto\ProductDataTransferObject $product
     * @return \App\Generated\Dto\ProductDataTransferObject
     */
    public function save(ProductDataTransferObject $product): ProductDataTransferObject
    {
        $transaction = new Transaction($this->orm);


        $entity = $this->ormProductRepository->findOne(['article_Number'=>$product->getArticleNumber()]);
        if (!$entity instanceof Product) {
            $entity = new Product();
        }
        $entity->setProductName($product->getName());
        $entity->setCategory($product->getCategory());
        $entity->setProductDescription($product->getDescription());
        $entity->setArticleNumber($product->getArticleNumber());
        if ($product->getAttribute() instanceof Attribute) {
            $entity->addAttribute($product->getAttribute());
        }

        $transaction->persist($entity);
        $transaction->run();
        $product->setId($entity->getId());

        return $product;
    }
}
