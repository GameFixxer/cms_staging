<?php

namespace App\controller;

use \App\model\DataModel;

class ListControll implements Controller
{
    private \Smarty $smarty;

    public function __construct(\Smarty $dependency)
    {
        $this->datamodell = new DataModel();
        $this->smarty = $dependency;
    }

    public function action(): void
    {
        $list = new DataModel();

        $this->getListUpdate($list->pingListe());

        // return include(dirname(__DIR__, 2) . '/templates/page_list_.html');

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