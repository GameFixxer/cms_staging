<?php
declare(strict_types=1);

namespace App\Controller\Frontend;

use App\Controller\Controller;
use App\Model\Dto\ProductDataTransferObject;
use \App\Model\ProductRepository;
use App\Service\View;
use App\Service\Container;

class ListControll implements Controller
{
    public const ROUTE = 'list';
    private View $view;
    private ProductRepository $productRepository;

    public function __construct(Container $container)
    {
        $this->view = $container->get(View::class);
        $this->productRepository = $container->get(ProductRepository::class);
    }

    public function action(): void
    {
        $productDTO= $this->productRepository->getProductList();
        if ($this->checkForValidDTO($productDTO)) {
            $this->view->addTemplate('index.tpl');
            $this->view->addTlpParam('productlist', $productDTO);
        } else {
            $this->view->addTlpParam('error', '404 Page not found.');
            $this->view->addTemplate('404.tpl');
        }
    }

    private function checkForValidDTO($productDTO) :bool
    {
        if (is_array($productDTO)) {
            foreach ($productDTO as $key) {
                if (!($key instanceof ProductDataTransferObject)) {
                    return false;
                }
            }
            return true;
        }
        return $productDTO instanceof ProductDataTransferObject;
    }
}
