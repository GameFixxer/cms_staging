<?php
declare(strict_types=1);
namespace App\Client\Product\Persistence;

use App\Client\Attribute\Persistence\Entity\Attribute;
use App\Client\Product\Persistence\Entity\Product;
use App\Generated\AttributeDataProvider;
use App\Generated\CategoryDataProvider;
use Cycle\ORM\ORM;
use Cycle\ORM\Transaction;
use App\Generated\ProductDataProvider;
use phpDocumentor\Reflection\Types\Object_;

class ProductEntityManager implements ProductEntityManagerInterface
{
    /**
     * @var ProductRepository
     */
    private ProductRepository $productRepository;
    private \Cycle\ORM\RepositoryInterface $ormProductRepository;
    private \Spiral\Database\DatabaseInterface $database;
    private ORM $orm;

    public function __construct(ORM $orm, ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->orm = $orm;
        $this->ormProductRepository = $orm->getRepository(Product::class);
        $this->database = $orm->getSource(Product::class)->getDatabase();
    }



    public function delete(ProductDataProvider $product):void
    {
        $transaction = new Transaction($this->orm);
        $transaction->delete($this->ormProductRepository->findOne(['article_Number'=>$product->getArticleNumber()]));
        $transaction->run();

        $this->productRepository->getList();
    }

    public function save(ProductDataProvider $product): ProductDataProvider
    {
        $entity = $this->ormProductRepository->findByPK($product->getArticleNumber());
        $values = [
            'article_number' =>  $product->getArticleNumber(),
            'name' =>  $product->getName(),
            'price'     =>  $product->getPrice(),
            'description'  => $product->getDescription(),
        ];
        if ($product->getCategory() instanceof CategoryDataProvider) {
            $values['category_category_id'] = $product->getCategory()->getCategoryId();
        }
        if (!$entity instanceof Product) {
            $transaction= $this->database->insert('product')->values($values);
        } else {
            $values ['id'] =  $entity->getId();
            $transaction = $this->database->update('product', $values, ['id' => $entity->getId()]);
        }
        $transaction->run();

        $newProduct = $this->productRepository->get($product->getArticleNumber());

        if (! $newProduct instanceof ProductDataProvider) {
            throw new \Exception('Fatal error while saving/loading', 1);
        }
        return $newProduct;
    }
}
