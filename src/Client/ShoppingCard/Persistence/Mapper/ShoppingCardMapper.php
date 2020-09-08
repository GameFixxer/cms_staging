<?php
declare(strict_types=1);

namespace App\Client\ShoppingCard\Persistence\Mapper;

use App\Client\Product\Business\ProductBusinessFacadeInterface;
use App\Client\ShoppingCard\Persistence\Entity\ShoppingCard;
use App\Client\User\Business\UserBusinessFacadeInterface;
use App\Generated\ProductDataProvider;
use App\Generated\ShoppingCardDataProvider;
use App\Generated\UserDataProvider;

class ShoppingCardMapper implements ShoppingCardMapperInterface
{
    private UserBusinessFacadeInterface $userBusinessFacade;
    private ProductBusinessFacadeInterface $productBusinessFacade;

    public function __construct(UserBusinessFacadeInterface $userBusinessFacade, ProductBusinessFacadeInterface $productBusinessFacade)
    {
        $this->userBusinessFacade = $userBusinessFacade;
        $this->productBusinessFacade = $productBusinessFacade;
    }

    public function map(ShoppingCard $shoppingCard): ShoppingCardDataProvider
    {
        $shoppingCardDataProvider = new  ShoppingCardDataProvider();
        $user = $this->userBusinessFacade->getById($shoppingCard->getUserId());
        if (!$user instanceof UserDataProvider) {
            throw new \Exception('UserRepository Returned null for username:'.$shoppingCard->getUserId(), 1);
        }
        $shoppingCardDataProvider->setUser($user);
        $shoppingCardDataProvider->setSum($shoppingCard->getSum());
        $shoppingCardDataProvider->setId($shoppingCard->getId());
        $shoppingCardDataProvider->setProduct($this->mapProducts($shoppingCard->getShoppingCard()));



        return $shoppingCardDataProvider;
    }

    /**
     * @param String $productString
     * @return ProductDataProvider[]
     */
    private function mapProducts(string $productString): array
    {
        $articleByNumber = explode(',', $productString);
        $mappedProducts = [];
        foreach ($articleByNumber as $item) {
            $product = $this->productBusinessFacade->get($item);
            if ($product instanceof ProductDataProvider) {
                $mappedProducts[] = $product;
            }
        }
        return $mappedProducts;

    }
}
