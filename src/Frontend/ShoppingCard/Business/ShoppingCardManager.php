<?php


namespace App\Frontend\ShoppingCard\Business;

use App\Client\Product\Persistence\ProductRepositoryInterface;

class ShoppingCardManager implements ShoppingCardManagerInterface
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getShoppingCard(array $card)
    {
        $shoppingCard = [];
        if (isset($card)) {
            foreach ($card as $product) {
                $article = $this->productRepository->getProduct($product);
                if (isset($article)) {
                    $shoppingCard[] = $article;
                }
            }
        }

        return $shoppingCard;
    }
}
