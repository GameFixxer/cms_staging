<?php
declare(strict_types=1);

namespace App\Frontend\Product\Business;

use App\Client\Product\Business\ProductBusinessFacadeInterface;
use App\Generated\ProductDataProvider;

class ProductManager implements ProductManagerInterface
{
    private ProductBusinessFacadeInterface $productBusinessFacade;

    public function __construct(ProductBusinessFacadeInterface $productBusinessFacade)
    {
        $this->productBusinessFacade = $productBusinessFacade;
    }

    public function delete(ProductDataProvider $productDTO): void
    {
        if ($this->productBusinessFacade->get($productDTO->getArticleNumber()) instanceof ProductDataProvider) {
            $this->productBusinessFacade->delete($productDTO);
        }
    }

    public function save(ProductDataProvider $product): void
    {
        $productDTO = $this->productBusinessFacade->get($product->getArticleNumber());
        if (!$productDTO instanceof ProductDataProvider) {
            $product->setArticleNumber((string)rand(1, 2229));
        }
        $this->productBusinessFacade->save($product);
    }

    public function addPriceToShoppingCard(string $articleNumber):ProductDataProvider
    {
        $productDTO = $this->productBusinessFacade->get($articleNumber);
        if (!$productDTO instanceof ProductDataProvider) {
            throw new \Exception('The given articlenumber returned null', 1);
        }
        return $productDTO;
    }
}
