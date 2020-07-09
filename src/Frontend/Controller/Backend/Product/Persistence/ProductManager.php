<?php
declare(strict_types=1);

namespace App\Frontend\Controller\Backend\Product\Persistence;

use App\Client\Product\Business\ProductBusinessFacadeInterface;
use App\Generated\Dto\ProductDataTransferObject;

class ProductManager implements ProductManagerInterface
{
    private ProductBusinessFacadeInterface $productBusinessFacade;

    public function __construct(ProductBusinessFacadeInterface $productBusinessFacade)
    {
        $this->productBusinessFacade = $productBusinessFacade;
    }

    public function delete(ProductDataTransferObject $productDTO): void
    {
        if ($this->productBusinessFacade->get($productDTO->getArticleNumber()) instanceof ProductDataTransferObject) {
            $this->productBusinessFacade->delete($productDTO);
        }
    }

    public function save(ProductDataTransferObject $product): void
    {
        $productDTO = $this->productBusinessFacade->get($product->getArticleNumber());
        if (!$productDTO instanceof ProductDataTransferObject) {
            $product->setArticleNumber((string)rand(1, 2229));
        }
        $this->productBusinessFacade->save($product);
    }
}
