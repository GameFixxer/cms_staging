<?php

class PageTreeControll extends PageControll
{
    private PageTreeModell $pageTreeModell;
    private PageTreeView $pageTreeView;
    private Page404 $page404;

    public function __construct(string $ownName, int $ownId)
    {
        parent::__construct($ownName, $ownId);
        $this->pageTreeModell = new PageTreeModell($ownName, $ownId);
        $this->pageTreeView = new PageTreeView($ownName);
        $this->page404 = new Page404("Page404");
    }

    protected function changeName(int $id, string $name): void
    {
        if ($this->pageTreeModell->isListEmpty() === false && $this->pageTreeModell->doesPageExist($id) === true) {
            $this->pageTreeModell->changePageName($id, $name);
            $this->pageTreeView->ShowPageonList($this->pageTreeModell->createArrayOfPageNamesAndIDs(), $this->pageTreeModell->getName());
        }
    }

    private function pingPage($pageId): void
    {
        $this->pageTreeModell->pingPage($pageId);
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

    private function isPageValid($pageId): bool
    {
        return $this->pageTreeModell->doesPageExist($pageId);
    }

    private function showpagelist(): void
    {
        $this->pageTreeView->ShowPageonList($this->pageTreeModell->createArrayOfPageNamesAndIDs(), $this->pageTreeModell->getName());
    }

    private function deletePage(int $pageId): void
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
            $this->pageTreeView->ShowPageonList($this->pageTreeModell->createArrayOfPageNamesAndIDs(), $this->pageTreeModell->getName());
        } else {
            throw new InvalidArgumentException('Diese SeitenID existiert nicht!');
        }
    }

    public function action()
    {


        switch ($_GET) {
            Case $_GET['page'] === 'list':
            {

                $this->showpagelist();
                break;
            }
            case$_GET['page'] === 'detail':
            {

                if ($_GET['page'] === 'detail' && $this->isPageValid($_GET['id']) === true) {
                    $this->pingPage($_GET['id']);
                } else {


                    $this->page404->showErrorMessage();
                }
                break;
            }
        }
    }
}