<?php
declare(strict_types=1);

namespace App\Controller;

use \App\Model\DataRepository;
use \App\Model\DataTransferObject;
use App\Service\View;

class ListControll implements Controller
{
    private View $view;
    private DataRepository $dm;
    public const ROUTE = 'list';

    public function __construct(View $view)
    {
        $this->view = $view;

    }

    public function action(): void
    {

        $this->view->addTemplate('index.tpl');
        $this->view->addTlpParam('',new DataTransferObject(new DataRepository(),0, true));


    }



}