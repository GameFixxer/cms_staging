<?php

class PageControll
{
    private $pageModell;
    private $pageView;

    private function __construct(string $name, int $id)
    {

        $this -> pageModell = new PageModell($name, $id);
        $this ->pageView = new PageView($name);
    }

    private function setName($Name):void
    {
        $this->pageModell->changeOwnName($Name);
        $this->pageView->showName($Name);
    }


}