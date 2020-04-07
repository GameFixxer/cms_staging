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
        if ($this->pageTreeModell->isListEmpty() === false && $this->pageTreeModell->doesPageExist($id) === true) {
            $this->pageTreeModell->changePageName($id, $name);
            $this->pageTreeView->ShowPageonList($this->pageTreeModell->createArrayOfPageNamesAndIDs());
        }
    }

    protected function createNewPage(int $pageID, string $name): void
    {
        $this->addPageToList($pageID, $name);
    }

    protected function deletePage(int $pageID): void
    {
        $this->removePageFromList($pageID);
    }

    private function addPageToList(string $name, int $pageId): void
    {
        $newPage = new PageControll($name, $pageId);
        $this->pageTreeModell->addPageToList($newPage);
        $this->pageTreeView->ShowPageonList($this->pageTreeModell->createArrayOfPageNamesAndIDs());
    }

    private function removePageFromList(int $pageId): void
    {
        if ($this->pageTreeModell->isListEmpty() === false && $this->pageTreeModell->doesPageExist($pageId) === true) {
            $this->pageTreeModell->removePageFromList($pageId);
            $this->pageTreeView->ShowPageonList($this->pageTreeModell->createArrayOfPageNamesAndIDs());
        } else {
            throw new \http\Exception\InvalidArgumentException('Diese SeitenID existiert nicht! Evtl');
        }
    }
}