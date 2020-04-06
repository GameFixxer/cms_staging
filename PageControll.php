<?php

class PageControll
{
    private $PageModell;
    private $PageView;

    private function __construct(String $Name)
    {
        $PageModell = new PageModell($Name);
        $PageView = new PageView($Name);
    }

    public function __destruct()
    {
        unset($this->$PageModell);
        unset($this->$PageView);

    }

    private function setName($Name)
    {
        $this->$PageModell->changeOwnName($Name);
        $PageView->showName($Name);
    }


}