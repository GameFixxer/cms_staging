<?php
declare(strict_types=1);

namespace App\Controller;

use \App\model\DataModel;
use App\Service\View;

class ListControll implements Controller
{
    private View $view;
    public const ROUTE = 'list';

    public function __construct(View $view)
    {
        $this->view = $view;
        $this->datamodell = new DataModel();

    }

    public function action(): void
    {
        $list = new DataModel();


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
        $list->createPageList();
    }


}