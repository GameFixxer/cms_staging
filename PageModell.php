<?php

class PageModell
{
    protected int $pageID;
    protected string $pageName;

    //private $creationDate; private


    public function __construct(string $name, int $id)
    {
        $this->pageName = $name;
        //$this ->$creationDate = new DateTime();
        $this->pageID = $id;

    }


    public function changeOwnName($name): void
    {
        $this->pageName = $name;
    }

}

