<?php
declare(strict_types=1);

namespace App\Controller;

use \App\Model\ProductRepository;
use \App\Model\ProductDataTransferObject;
use App\Service\View;

class ListControll implements Controller
{
    private View $view;
    private ProductRepository $pr;
    public const ROUTE = 'list';

    public function __construct(View $view)
    {
        $this->view = $view;
        $this->pr = new ProductRepository();
    }

    public function action(): void
    {

        $this->view->addTemplate('index.tpl');
        $this->view->addTlpParam('',$this->pr->getList());


    }



}