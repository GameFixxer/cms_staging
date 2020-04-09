<?php

class ListControll implements Controller
{
    private DatenModell $datamodell;

    public function __construct()
    {
        $this->datamodell = new DatenModell();
    }

    public function action()
    {

        // TODO: Implement action() method.
        $this->getListUpdate($this->datamodell->pingListe());
        return include 'Pages/page_list_.html';

    }

    public function getListUpdate(array $listarray)
    {
        $liste = implode("<br> ", $listarray);
        echo($liste);
    }

    public function pushListUpdate()
    {
        $list = new DatenModell;
        $list->createList();
    }
}