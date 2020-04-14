<?php

namespace App\Controller;

use \App\Model\DataModel;

class ListControll implements Controller
{

    public function __construct()
    {
        $this->datamodell = new DataModel();
    }

    public function action(): string
    {
        $list = new DataModel();
        // TODO: Implement action() method.
        $this->getListUpdate($list->pingListe());
        return include(dirname(__DIR__, 2) . '/Template/page_list_.html');

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