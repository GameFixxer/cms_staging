<?php
declare(strict_types=1);

namespace App\Controller\Frontend;

use App\Controller\Controller;
use App\Model\ProductRepository;
use App\Service\Container;
use App\Service\View;

class DetailControll implements Controller
{
    public const ROUTE = 'detail';
    private View $view;
    private ProductRepository $productRepository;

    public function __construct(Container $container)
    {
        $this->view = $container->get(View::class);
        $this->productRepository = $container->get(ProductRepository::class);
    }


    public function action(): void
    {
        $pageId = (int)($_GET['id'] ?? '0');

        if ($pageId === 0 || $this->productRepository->hasProduct($pageId) === false) {
            $this->view->addTlpParam('error', '404 Page not found.');
            $this->view->addTemplate('404.tpl');
        } else {
            $this->view->addTemplate('detail.tpl');
            $this->view->addTlpParam('page', $this->productRepository->getProduct($pageId));
        }
    }
}
