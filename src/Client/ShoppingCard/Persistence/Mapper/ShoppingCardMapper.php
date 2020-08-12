<?php
declare(strict_types=1);

namespace App\Client\ShoppingCard\Persistence\Mapper;

use App\Client\Product\Persistence\Mapper\ProductMapperInterface;
use App\Client\ShoppingCard\Persistence\Entity\ShoppingCard;
use App\Client\User\Business\UserBusinessFacadeInterface;
use App\Generated\ProductDataProvider;
use App\Generated\ShoppingCardDataProvider;
use App\Generated\UserDataProvider;
use Doctrine\Common\Collections\ArrayCollection;

class ShoppingCardMapper implements ShoppingCardMapperInterface
{
    private UserBusinessFacadeInterface $userBusinessFacade;
    private ProductMapperInterface $productMapper;

    public function __construct(UserBusinessFacadeInterface $userBusinessFacade, ProductMapperInterface $productMapper)
    {
        $this->userBusinessFacade = $userBusinessFacade;
        $this->productMapper = $productMapper;
    }

    public function map(ShoppingCard $shoppingCard): ShoppingCardDataProvider
    {
        $shoppingCardDataProvider = new  ShoppingCardDataProvider();
        $user = $this->userBusinessFacade->get($shoppingCard->getUser()->getUsername());
        if (!$user instanceof UserDataProvider) {
            throw new \Exception('UserRepository Returned null for username:'.$shoppingCard->getUser()->getUsername(), 1);
        }
        $shoppingCardDataProvider->setUser($user);
        $shoppingCardDataProvider->setSum($shoppingCard->getSum());
        $shoppingCardDataProvider->setId($shoppingCard->getId());
        $shoppingCardDataProvider->setQuantity($shoppingCard->getQuantity());
        $shoppingCardDataProvider->setProduct($this->mapProducts($shoppingCard->getShoppingCard()));



        return $shoppingCardDataProvider;
    }

    /**
     * @param ArrayCollection $product
     * @return ProductDataProvider[]
     */
    private function mapProducts(ArrayCollection $product): array
    {
        $mappedProducts = [];
        foreach ($product as $productEntity) {
            $mappedProducts[]= $this->productMapper->map($productEntity);
        }
        return $mappedProducts;
    }
}
