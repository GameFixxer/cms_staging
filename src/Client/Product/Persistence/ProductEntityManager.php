<?php
declare(strict_types=1);
namespace App\Client\Product\Persistence;

use App\Client\Product\Persistence\Entity\Product;
use App\Generated\AttributeDataProvider;
use App\Generated\CategoryDataProvider;
use Cycle\ORM\Transaction;
use App\Generated\ProductDataProvider;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Query\ResultSetMapping;

class ProductEntityManager implements ProductEntityManagerInterface
{
    /**
     * @var ProductRepository
     */
    private ProductRepository $productRepository;
    private EntityRepository $entityRepository;
    private \Spiral\Database\DatabaseInterface $database;
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager, ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->entityManager = $entityManager;
        $this->entityRepository = $entityManager->getRepository(Product::class);
    }



    public function delete(ProductDataProvider $product):void
    {
        $this->entityManager->remove(
            $this->entityRepository->findBy(
                ['article_Number'=>$product->getArticleNumber()]
            )
        );
        try {
            $this->entityManager->flush();
        } catch (OptimisticLockException $e) {
        } catch (ORMException $e) {
        }

        $this->productRepository->getList();
    }

    public function save(ProductDataProvider $product): ProductDataProvider
    {
        $entity = $this->entityRepository->findBy(['article_number'=>$product->getArticleNumber()]);

        if (!$entity instanceof Product) {
            $rsm = new ResultSetMapping();
            $query = $this->entityManager->createNativeQuery(
                'insert into product (article_number, name, description, price, attribute_id, category_id) values (??????)',
                $rsm
            );
            $query->setParameters([
                1 => $product->getArticleNumber(),
                2 => $product->getName(),
                3 => $product->getDescription(),
                4 => $product->getPrice(),
                5 => $product->getAttribute()->getAttributeId(),
                6 => $product->getCategory()->getCategoryId(),
            ]);
        } else {
            $rsm = new ResultSetMapping();
            $query = $this->entityManager->createNativeQuery(
                'update product set article_number = ?, name = ?, description = ?, price = ?, attribute_id = ?, category_id = ?) where article_number = ?',
                $rsm
            );
            $query->setParameters([
                1 => $product->getArticleNumber(),
                2 => $product->getName(),
                3 => $product->getDescription(),
                4 => $product->getPrice(),
                5 => $product->getAttribute()->getAttributeId(),
                6 => $product->getCategory()->getCategoryId(),
                7 => $product->getArticleNumber(),
            ]);
        }

        if $query->getResult();


        $newProduct = $this->productRepository->get($product->getArticleNumber());
        if (! $newProduct instanceof ProductDataProvider) {
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
}
