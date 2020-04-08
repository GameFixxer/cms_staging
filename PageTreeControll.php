<?php

class PageTreeControll extends PageControll
{
    private PageTreeModell $pageTreeModell;
    private PageTreeView $pageTreeView;

    public function __construct(string $ownName, int $ownId)
    {
        parent::__construct($ownName, $ownId);
        $this->pageTreeModell = new PageTreeModell($ownName, $ownId);
        $this->pageTreeView = new PageTreeView($ownName);
    }

    protected function changeName(int $id, string $name): void
    {
        if ($this->pageTreeModell->isListEmpty() === false && $this->pageTreeModell->doesPageExist($id) === true) {
            $this->pageTreeModell->changePageName($id, $name);
            $this->pageTreeView->ShowPageonList($this->pageTreeModell->createArrayOfPageNamesAndIDs());
        }
    }

    public function isEmpty(): bool
    {
        return $this->pageTreeModell->isListEmpty();
    }

    public function createNewPage(int $pageId, string $name): void
    {
        if ($this->pageTreeModell->doesPageExist($pageId) === true) {
            throw new \InvalidArgumentException('Diese SeitenID existiert bereits!');

        }

        $this->addPageToList($name, $pageId,);


    }

    public function deletePage(int $pageId): void
    {
        $this->removePageFromList($pageId);
    }

    private function addPageToList(string $name, int $pageId): void
    {
        $newPage = new PageControll($name, $pageId);
        $this->pageTreeModell->addPageToList($newPage);
        $this->pageTreeModell->createArrayOfPageNamesAndIDs();
        //$this->pageTreeView->ShowPageonList($this->pageTreeModell->createArrayOfPageNamesAndIDs());
    }

    private function removePageFromList(int $pageId): void
    {
        if ($this->pageTreeModell->isListEmpty() === false && $this->pageTreeModell->doesPageExist($pageId) === true) {
            $this->pageTreeModell->removePageFromList($pageId);
            $this->pageTreeView->ShowPageonList($this->pageTreeModell->createArrayOfPageNamesAndIDs());
        } else {
            throw new InvalidArgumentException('Diese SeitenID existiert nicht!');
        }
    }
}