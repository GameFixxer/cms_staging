<?php
declare(strict_types=1);

namespace App\Controller\Frontend;

use App\Controller\Controller;
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
        $this->view->addTemplate('index.tpl');
        $this->view->addTlpParam('productList', $this->productRepository->getProductList());
    }
}
