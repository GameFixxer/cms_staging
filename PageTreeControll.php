<?php

class PageTreeControll extends PageControll
{

    public function __construct()
    {

    }

    private function createNewPage($Name)
    {
        $this->addPagetoList();
    }

    private function deletePage(INT $PageID)
    {
        $this->removePagefromList();
    }

    private function addPagetoList()
    {
    }

    private function removePagefromList()
    {
    }
}