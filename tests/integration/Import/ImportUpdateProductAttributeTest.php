<?php
declare(strict_types=1);
namespace App\Tests\integration\Import;

use App\Client\Attribute\Persistence\Entity\Attribute;
use App\Client\Product\Persistence\ProductRepository;
use App\Client\Category\Persistence\Entity\Category;
use App\Client\Product\Persistence\Entity\Product as ProductEntity;
use App\Generated\Dto\CsvProductDataTransferObject;
use App\Generated\Dto\ProductDataTransferObject;
use App\Service\DatabaseManager;
use App\Tests\integration\Helper\ContainerHelper;
use Cycle\ORM\Transaction;
use App\Backend\ImportProduct\Business\Model\Create\Product as ProductImport;

/**
 * @group Import4
 */
class ImportUpdateProductAttributeTest extends \Codeception\Test\Unit
{
    private CsvProductDataTransferObject $csvDTO;
    private $importCreateProduct;
    private ProductRepository $productRepository;
    private  $updateAttribute;
    private  $attributeRepository;
    private ContainerHelper $container;


    public function _before()
    {
        $this->container = new ContainerHelper();
        $this->productRepository = $this->container->getProductRepository();
        $this->importCreateProduct = $this->container->getCreateProduct();
        $this->updateAttribute = $this->container->getUpdateAttribute();
        $this->attributeRepository = $this->container->getAttributeRepository();
    }

    public function _after()
    {/*
        if ($this->productRepository->getProduct($this->csvDTO->getArticleNumber()) instanceof ProductDataTransferObject) {
            $orm = new DatabaseManager();
            $orm = $orm->connect();
            $ormProductRepository = $orm->getRepository(ProductEntity::class);
            $transaction = new Transaction($orm);
            $transaction->delete($ormProductRepository->findOne(['article_number'=>$this->csvDTO->getArticleNumber()]));
            $transaction->run();
        }*/
    }

    public function testUpdateAttribute()
    {
        $this->createProduct();
        $this->updateAttribute->update($this->csvDTO);

        $productFromRepository = $this->productRepository->getProduct($this->csvDTO->getArticleNumber());

        self::assertNotNull($productFromRepository);
        if (!empty(($productFromRepository->getAttribute()))) {
            self::assertNotSame('', $productFromRepository->getAttribute()->getPivot()->getAttributeId());
            $orm = new DatabaseManager();
            $orm = $orm->connect();
            $ormCategoryRepository = $orm->getRepository(Attribute::class);
            self::assertSame(
                $this->csvDTO->getAttributeKey(),
                $ormCategoryRepository->findOne(['attribute_key'=>$this->csvDTO->getAttributeKey()])->getAttributeKey()
            );
            self::assertNotNull($productFromRepository->getAttribute());
            self::assertTrue($productFromRepository->getAttribute() instanceof Attribute);
            self::assertSame(
                $productFromRepository->getAttribute()->getAttributeValue(),
                $ormCategoryRepository->findOne(['attribute_key'=>$this->csvDTO->getAttributeKey()])->getAttributeValue()
            );

            self::assertNotNull($ormCategoryRepository->findOne(['attribute_key'=>$this->csvDTO->getAttributeKey()]));
            self::assertEquals('', $productFromRepository->getName());
        }
    }

    public function testUpdateAttributeWithNonChangingEntry()
    {
        $this->testUpdateAttribute();
    }

    private function createProduct()
    {
        $tmp = rand(1, 1000).substr('', rand(1, 1000));
        $this->createCSVDTO(''.$tmp, 'tester');
        $csvProduct = $this->importCreateProduct->createProduct($this->csvDTO);
        $this->csvDTO->setId($csvProduct->getId());
    }

    private function createCSVDTO(string $articleNumber, string $categoryKey)
    {
        $this->csvDTO = new CsvProductDataTransferObject();
        $this->csvDTO->setAttributeKey($categoryKey);
        $this->csvDTO->setKey($categoryKey);
        $this->csvDTO->setAttributeValue($categoryKey);
        $this->csvDTO->setArticleNumber($articleNumber);
        $this->csvDTO->setName('test');
    }
}
