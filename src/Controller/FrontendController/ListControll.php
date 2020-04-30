<?php
declare(strict_types=1);

namespace App\Controller\FrontendController;

use App\Controller\Controller;
use \App\Model\ProductRepository;
use App\Service\View;

class ListControll implements Controller
{
    public const ROUTE = 'list';
    private View $view;
    private ProductRepository $pr;

    public function __construct(View $view, ProductRepository $pr)
    {
        $this->view = $view;
        $this->pr = $pr;
    }

    public function action(): void
    {
        $this->view->addTemplate('index.tpl');
        $this->view->addTlpParam('', $this->pr->getList());
    }
}
