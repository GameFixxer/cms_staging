<?php

namespace App\Model;

use App\Model\Dto\ProductDataTransferObject;
use App\Model\Entity\Product;
use App\Service\Container;

use Cycle\ORM\ORM;
use Cycle\ORM\Transaction;

class ProductEntityManager
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
        $transaction->delete($this->ormProductRepository->findByPK($product->getProductId()));
        $transaction->run();
        $this->productRepository->getProductList();
    }

    public function save(ProductDataTransferObject $product): ProductDataTransferObject
    {
        $transaction = new Transaction($this->orm);
        $entity = $this->ormProductRepository->findByPK($product->getProductId());

        if (!$entity instanceof Product) {
            $entity = new Product();
        }
        $entity->setName($product->getProductName());
        $entity->setDescription($product->getProductDescription());
        $transaction->persist($entity);
        $transaction->run();
        $product->setProductId($entity->getId());
        return $product;
    }
}
