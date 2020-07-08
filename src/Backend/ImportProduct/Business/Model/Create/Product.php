<?php
declare(strict_types=1);

namespace App\Backend\ImportProduct\Business\Model\Create;

use App\Client\Product\Business\ProductBusinessFacadeInterface;
use App\Generated\Dto\CsvDataTransferObject;
use App\Generated\Dto\ProductDataTransferObject;


class Product implements ProductInterface
{
    private ProductBusinessFacadeInterface $productBusinessFacade;

    public function __construct(ProductBusinessFacadeInterface $productBusinessFacade)
    {
        $this->productBusinessFacade = $productBusinessFacade;
    }

    public function createProduct(CsvDataTransferObject $csvDTO) : ?CsvDataTransferObject
    {
        if ($csvDTO->getArticleNumber() === '') {
            throw new \Exception('ArticleNumber must not be empty', 1);
        }

        $productFromRepo = $this->productBusinessFacade->get($csvDTO->getArticleNumber());
        if ($productFromRepo instanceof ProductDataTransferObject) {
            $csvDTO->setProductId($productFromRepo->getProductId());
            return $csvDTO;
        }
        $productDTO = new ProductDataTransferObject();
        $productDTO->setArticleNumber($csvDTO->getArticleNumber());
        $csvDTO->setProductId($this->productBusinessFacade->save($productDTO)->getProductId());

        return $csvDTO;
    }
}
