<?php


namespace App\Tests\integration\Mapper;

use App\Client\ShoppingCard\Persistence\Entity\ShoppingCard;
use App\Client\ShoppingCard\Persistence\Mapper\ShoppingCardMapper;
use App\Generated\ProductDataProvider;
use App\Generated\ShoppingCardDataProvider;
use App\Generated\UserDataProvider;
use App\Service\DatabaseManager;
use App\Tests\integration\Helper\ContainerHelper;
use App\Tests\integration\Helper\DataProviderInstantiator;
use Cycle\ORM\Transaction;

/**
 * @group mapper
 */

class ShoppingCardMapperTest extends \Codeception\Test\Unit
{
    private ProductDataProvider $product;
    private ShoppingCardDataProvider $basked;
    private UserDataProvider $user;
    private DataProviderInstantiator $dataProvider;
    private ContainerHelper $container;

    /**
     * @var ShoppingCardMapper
     */
    private $basketMapper;

    private $orm;
    private $ormProductRepository;

    public function _before()
    {
        $this->orm = new DatabaseManager();
        $this->orm = $this->orm->connect();
        $this->ormProductRepository = $this->orm->getRepository(ShoppingCard::class);

        $this->dataProvider = new DataProviderInstantiator();
        $this->container = new ContainerHelper();
        $this->user = $this->dataProvider->createUser(
            0,
            'pass123',
            'root',
            '',
            '',
            'ShoppingCardMapperTester'
        );
        $this->product = $this->dataProvider->createProduct(
            0,
            [],
            $this->dataProvider->createCategory(),
            'tester',
            "tester",
            "ShoppingCardMapperTester"
        );
        $this->basked = $this->dataProvider->createBasket();

        $this->basketMapper = $this->container->getShoppingCardMapper();
    }

    public function _after()
    {
        $tmpCategoryCache = $this->product->getCategory();
        $this->dataProvider->deleteBasket($this->basked);
        $this->dataProvider->deleteProduct($this->product);
        $this->dataProvider->deleteCategory($tmpCategoryCache);
        $this->dataProvider->deleteUser($this->user);
    }

    public function testWithExistingProduct()
    {
        $basketEntity = $this->ormProductRepository->findByPK($this->basked->getId());


        if (!$basketEntity instanceof ShoppingCard) {
            throw new \Exception('Critical RepositoryError', 1);
        }
        $basket = $this->basketMapper->map($basketEntity);

        self::assertSame($basket->getUser()->getId(), $this->user->getId());
        self::assertSame($basket->getProduct()[0]->getId(), $this->product->getId());
    }

    public function testWithNonExistingProduct()
    {
        $shoppingCard = new ShoppingCard();
        $shoppingCard->setUserId($this->user->getId());
        $shoppingCard->setSum(1);
        $shoppingCard->setId(1);
        $shoppingCard->setQuantity(1);
        $shoppingCard->setShoppingCard('12,34,56');

        $basket = $this->basketMapper->map($shoppingCard);
/*
        self::assertSame($basket->getUser()->getId(), $this->user->getId());
        self::assertSame($basket->getProduct()[0]->getId(), $this->product->getId());
*/
    }
}
