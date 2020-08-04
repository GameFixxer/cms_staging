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
        dump($card);
        if (isset($card)) {
            foreach ($card as $product) {
                $article = $this->productRepository->getProduct($product[0]);
                if (isset($article)) {
                    $shoppingCard[] = $article;
                }
            }
        }

        return $shoppingCard;
    }
}
