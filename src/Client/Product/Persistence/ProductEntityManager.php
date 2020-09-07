<?php
declare(strict_types=1);
namespace App\Client\Product\Persistence;

use App\Client\Product\Persistence\Entity\Product;
use App\Generated\AttributeDataProvider;
use App\Generated\ProductDataProvider;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;


class ProductEntityManager implements ProductEntityManagerInterface
{
    /**
     * @var ProductRepository
     */
    private ProductRepository $productRepository;
    private EntityRepository $entityRepository;
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager, ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->entityManager = $entityManager;
        $this->entityRepository = $entityManager->getRepository(Product::class);
    }



    public function delete(ProductDataProvider $product):void
    {
        $this->entityManager->remove($product);
        $this->productRepository->getList();
    }

    public function save(ProductDataProvider $product): ProductDataProvider
    {

        if ($product->hasId()) {
            $this->entityRepository->createQueryBuilder('c')
                ->update()
                ->set('c.name', ':name')
                ->set('c.description', ':description')
                ->set('c.articleNumber', ':articleNumber')
                ->set('c.price', ':price')
                ->set('c.categoryId', ':categoryId')
                ->set('c.attributeKey', ':attributeKey')
                ->where('id = :id')
                ->setParameter(':name', $product->getName())
                ->setParameter(':description', $product->getDescription())
                ->setParameter(':articleNumber', $product->getArticleNumber())
                ->setParameter(':price', $product->getPrice())
                ->setParameter(':categoryId', $product->getCategory()->getCategoryId())
                ->setParameter(':attributeKey', $this->changeAttributeFormat($product))
                ->getQuery()
                ->execute();

            $this->entityManager->clear();

        } else {
            $productEntity = new Product();
            $productEntity = $this->convert($productEntity, $product);
            $this->entityManager->persist($productEntity);
            $this->entityManager->flush();
        }



        $newProduct = $this->productRepository->get($product->getArticleNumber());
        if (!$newProduct instanceof ProductDataProvider) {
            throw new \Exception('Fatal error while saving/loading', 1);
        }
        return $newProduct;
    }

    private function changeAttributeFormat(ProductDataProvider $product):string
    {
        $values = "";
        foreach ($product->getAttribute() as $item) {
            if ($item instanceof AttributeDataProvider) {
                $values = $values.','.$item->getAttributeKey();
            }
        }
        return $values;
    }

    private function convert(Product $productEntity, ProductDataProvider $productDataProvider): Product
    {
        $productEntity->setAttributeKey($this->changeAttributeFormat($productDataProvider));
        $productEntity->setCategoryId($productDataProvider->getCategory()->getCategoryId());
        $productEntity->setPrice($productDataProvider->getPrice());
        $productEntity->setArticleNumber($productDataProvider->getArticleNumber());
        $productEntity->setDescription($productDataProvider->getDescription());
        $productEntity->setName($productDataProvider->getName());
        return $productEntity;
    }
}
