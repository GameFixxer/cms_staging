<?php
declare(strict_types=1);

namespace App\Tests\integration\BackendControllerTest;

use App\Client\Attribute\Persistence\Entity\Attribute;
use App\Client\Product\Persistence\Entity\Product;
use App\Generated\Dto\ProductDataTransferObject;
use App\Service\SessionUser;
use App\Tests\integration\Helper\ContainerHelper;
use Cycle\ORM\Transaction;
use UnitTester;

/**
 * @group shoppingcard
 */

class ShoppingCardTest extends \Codeception\Test\Unit
{

    /**
     * @var \UnitTester $tester
     */
    protected UnitTester $tester;
    private \Cycle\ORM\RepositoryInterface $ormProductRepository;
    private ContainerHelper $container;
    protected SessionUser $userSession;
    private $orm;

    protected function _before()
    {
        $this->container = new ContainerHelper();
        $this->orm = $this->container->getOrmProductRepository();
        $this->ormProductRepository = $this->orm->getRepository(Product::class);
        $this->ormAttributeRepository = $this->orm->getRepository(Attribute::class);
        $this->fillWithProducts();
    }

    protected function _after()
    {
        parent::_after();
        unset($_SERVER['REQUEST_METHOD']);
    }

    public function testSessionShoppingCard(){

    }

    private function fillWithProducts(){


        $product1 =  new Product;
        $product1->setPrice(1);
        $product1->setCategory(null);
        $product1->setArticleNumber('product1');
        $product1->setProductDescription('product1');
        $product1->setProductName('product1');
        $product1->addAttribute(null);

        $transaction = new Transaction($this->orm);
        $transaction->persist($product1);
        $transaction->run();

        $product2 =  new Product;
        $product2->setPrice(2);
        $product2->setCategory(null);
        $product2->setArticleNumber('product2');
        $product2->setProductDescription('product2');
        $product2->setProductName('product2');
        $product2->addAttribute(null);

        $transaction->persist($product2);
        $transaction->run();

        $product3 =  new Product;
        $product3->setPrice(3);
        $product3->setCategory(null);
        $product3->setArticleNumber('product3');
        $product3->setProductDescription('product3');
        $product3->setProductName('product3');
        $product3->addAttribute(null);


        $transaction->persist($product3);
        $transaction->run();
    }
}
