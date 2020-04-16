<?php

namespace App\Controller;

use \App\model\DataModel;
use App\Service\View;

class ListControll implements Controller
{
    private View $view;

    public function __construct(View $view)
    {
        $this->view = $view;
        $this->datamodell = new DataModel();

    }

    public function action(): void
    {
        $list = new DataModel();

        $this->view->display();

    }

    public function getListUpdate(array $listarray)
    {
        $liste = implode("<br> ", $listarray);
        echo($liste);
    }

    public function makelist()
    {
    }

    public function pushListUpdate()
    {
        $list = new DataModel;
        $list->createList();
    }


}