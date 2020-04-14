<?php

class ListControll implements Controller
{
    private DataModel $datamodell;

    public function __construct()
    {
        $this->datamodell = new DataModel();
    }

    public function action():string
    {

        // TODO: Implement action() method.
        $this->getListUpdate($this->datamodell->pingListe());
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