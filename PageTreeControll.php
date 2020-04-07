<?php

class PageTreeControll extends PageControll
{
    private $pageTreeModell;
    private $pageTreeView;

    public function __construct(string $name, int $id)
    {
        parent::__construct($name, $id);
        $this->pageTreeModell = new PageTreeModell($name, $id);
        $this->pageTreeView = new PageTreeView($name);
    }

    protected function changeName(int $id, string $name): void
    {
        $this->pageTreeModell->changePageName($id, $name);
        $this->pageTreeView->ShowPageonList($name);
    }

    protected function createNewPage(int $pageID, string $name):void
    {
        $this->addPageToList($pageID, $name);
    }

    protected function deletePage(int $pageID): void
    {
        $this->removePageFromList($pageID);
    }

    private function addPageToList(string $name, int $pageId): void
    {
        $newpage = new PageControll($name,$pageId);
        $this->pageTreeModell->addPagetoList($newpage);
        $this->pageTreeView->ShowPageonList($name);
    }

    private function removePageFromList(int $pageId): void
    {
        $this->pageTreeModell->removePagefromList($pageId);
        $this->pageTreeView->removePagefromList($pageId);
    }
}