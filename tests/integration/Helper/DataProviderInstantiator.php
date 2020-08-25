<?php


namespace App\Tests\integration\Helper;

use App\Client\Category\Persistence\Entity\Category;
use App\Generated\AddressDataProvider;
use App\Generated\CategoryDataProvider;
use App\Generated\OrderDataProvider;
use App\Generated\ProductDataProvider;
use App\Generated\ShoppingCardDataProvider;
use App\Generated\UserDataProvider;

class DataProviderInstantiator
{
    private $userBusinessFacade;
    private $productBusinessFacade;
    private $shoppingCardBusinessFacade;
    private $addressBusinessFacade;
    private $orderBusinessFacade;
    private $categoryBusinessFacade;

    private UserDataProvider $user;
    private AddressDataProvider $address;
    private ShoppingCardDataProvider $shoppingCard;
    private OrderDataProvider $order;
    private CategoryDataProvider $category;
    private ContainerHelper $container;
    private ProductDataProvider $product;

    public function __construct()
    {
        $this->container = new ContainerHelper();
        $this->userBusinessFacade = $this->container->getUserBusinessFacade();
        $this->productBusinessFacade = $this->container->getProductBusinessFacade();
        $this->addressBusinessFacade = $this->container->getAddressBusinessFacade();
        $this->shoppingCardBusinessFacade = $this->container->getShoppingCardBusinessFacade();
        $this->orderBusinessFacade = $this->container->getOrderBusinessFacade();
        $this->categoryBusinessFacade = $this->container->getCategoryBusinessFacade();
    }

    public function createOrderEntity() :OrderDataProvider
    {
        $date = "".getdate()['year'].'-'.getdate()['mon'].'-'.getdate()['mday'];
        $this->order = new OrderDataProvider();
        $this->order->setDateOfOrder($date);
        $this->order->setUser($this->user);
        $this->order->setAddress($this->address);
        $this->order->setSum(0);
        $this->order->setStatus('shipping');
        $this->order->setShoppingCard($this->createBasket());
        $this->order->setId(0);
        $this->order = $this->orderBusinessFacade->save($this->order);
        return $this->order;
    }

    public function createUser(
        int $shoppingCardId,
        string $password,
        string $role,
        string $sessionId,
        string $resetPassword,
        string $username
    )
    :UserDataProvider {
        $this->user = new UserDataProvider();
        $this->user->setShoppingcardId($shoppingCardId);
        $this->user->setPassword($password);
        $this->user->setRole($role);
        $this->user->setSessionId($sessionId);
        $this->user->setResetPassword($resetPassword);
        $this->user->setUsername($username);
        $this->user = $this->userBusinessFacade->save($this->user);
        return $this->user;
    }

    public function createAddressEntity():AddressDataProvider
    {
        $this->address = new AddressDataProvider();
        $this->address->setUser($this->user);
        $this->address->setCountry("Germany");
        $this->address->setPostCode(42178);
        $this->address->setTown("Leichlingen");
        $this->address->setStreet("Bremsen6a");
        $this->address->setType("");
        $this->address->setFirstName("abc");
        $this->address->setLastName('123');
        $this->address->setAddress_id(0);
        $this->address = $this->addressBusinessFacade->save($this->address);
        return $this->address;
    }

    public function createBasket():ShoppingCardDataProvider
    {
        $this->shoppingCard = new ShoppingCardDataProvider();
        $this->shoppingCard->setProduct([$this->product]);
        $this->shoppingCard->setQuantity(0);
        $this->shoppingCard->setSum(0);
        $this->shoppingCard->setUser($this->user);
        $this->shoppingCard->setId(0);
        $this->shoppingCard = $this->shoppingCardBusinessFacade->save($this->shoppingCard);
        return $this->shoppingCard;
    }

    public function createCategory():CategoryDataProvider
    {
        $this->category = new CategoryDataProvider();
        $this->category->setCategoryKey('abc');
        $this->category = $this->categoryBusinessFacade->save($this->category);
        return $this->category;
    }

    public function createProduct(
        int $price,
        array $attribute,
        CategoryDataProvider $category,
        string $name,
        string $description,
        string $articleNumber
    ):ProductDataProvider {
        $this->product = new ProductDataProvider();
        $this->product->setPrice($price);
        $this->product->setAttribute($attribute);
        $this->product->setCategory($category);
        $this->product->setName($name);
        $this->product->setDescription($description);
        $this->product->setArticleNumber($articleNumber);
        $this->product = $this->productBusinessFacade->save($this->product);
        return $this->product;
    }

    public function deleteProduct(ProductDataProvider $product):void
    {
        $this->productBusinessFacade->delete($product);
    }
    public function deleteUser(UserDataProvider $user):void
    {
        $this->userBusinessFacade->delete($user);
    }
    public function deleteBasket(ShoppingCardDataProvider $basket):void
    {
        $this->shoppingCardBusinessFacade->delete($basket);
    }
    public function deleteCategory(CategoryDataProvider $category):void
    {
        $this->categoryBusinessFacade->delete($category);
    }

    public function deleteOrder(OrderDataProvider $order):void
    {
        $this->orderBusinessFacade->delete($order);
    }

    public function deleteAddress(AddressDataProvider $address):void
    {
        $this->addressBusinessFacade->delete($address);
    }
}
