<?php

namespace App\controller;

use \App\model\DataModel;

class ListControll implements Controller
{

    public function __construct()
    {
        $this->datamodell = new DataModel();
    }

    public function action(): string
    {
        $list = new DataModel();

        $this->getListUpdate($list->pingListe());
        return include(dirname(__DIR__, 2) . '/templates/page_list_.html');

    }

    public function getListUpdate(array $listarray)
    {
        $liste = implode("<br> ", $listarray);
        echo($liste);
    }

    public function pushListUpdate()
    {
        $list = new DataModel;
        $list->createList();
    }
}