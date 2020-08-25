<?php
declare(strict_types=1);

namespace App\Backend\ImportProduct\Business\Model\Create;

use App\Backend\ImportProduct\Business\Model\IntegrityManager\IntegrityManagerInterface;
use App\Client\Product\Business\ProductBusinessFacadeInterface;
use App\Generated\CsvProductDataProvider;
use App\Generated\ProductDataProvider;


class Product implements ProductInterface
{
    private ProductBusinessFacadeInterface $productBusinessFacade;
    private IntegrityManagerInterface $integrityManager;

    public function __construct(ProductBusinessFacadeInterface $productBusinessFacade, IntegrityManagerInterface $integrityManager)
    {
        $this->productBusinessFacade = $productBusinessFacade;
        $this->integrityManager = $integrityManager;
    }

    public function createProduct(CsvProductDataProvider $csvDTO) : ?CsvProductDataProvider
    {
        if ($csvDTO->getArticleNumber() === '') {
            throw new \Exception('ArticleNumber must not be empty', 1);
        }

        $productFromRepo = $this->productBusinessFacade->get($csvDTO->getArticleNumber());
        if ($productFromRepo instanceof ProductDataProvider) {
            $csvDTO->setId($productFromRepo->getId());
            return $csvDTO;
        }
        $productDTO = new ProductDataProvider();
        $productDTO->setArticleNumber($csvDTO->getArticleNumber());
        $productDTO->setPrice($csvDTO->getPrice());
        $tmp= $this->productBusinessFacade->save($productDTO);
        dump('importer Create Product after safe',$tmp);
        $csvDTO->setId($tmp->getId());

        return $csvDTO;
    }
}
