<?php
declare(strict_types=1);

namespace App\Controller\FrontendController;

use App\Controller\Controller;
use App\Model\ProductRepository;
use App\Service\Container;
use App\Service\View;

class DetailControll implements Controller
{

    public const ROUTE = 'detail';
    private View $view;
    private ProductRepository $pr;

    public function __construct(Container $container)
    {
        $this->view = $container->get(View::class);
        $this->pr = $container->get(ProductRepository::class);

    }


    public function action(): void
    {
        $pageId = 0;
        try {
            $pageId = (int)$_GET['id'];
        } catch (\InvalidArgumentException $t) {
        }
        if ($pageId === 0) {
            $this->view->addTemplate('404.tpl');
        } else {
            if ($this->pr->hasProduct($pageId) === false) {
                $this->view->addTemplate('404.tpl');

            } else {
                $this->view->addTemplate('detail.tpl');
                try {
                    $this->view->addTlpParam('', $this->pr->getProduct($pageId));
                } catch (\Exception $e) {
                }
            }
        }

    }


}
