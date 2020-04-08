<?php

class PageTreeModell extends PageModell
{
    private SplDoublyLinkedList $pages;


    public function __construct(string $name, int $id)
    {
        parent:: __construct($name, $id);
        $this->pageName = $name;
        //$this ->$creationDate = new DateTime();
        $this->pageID = $id;
        $this->pages = new SplDoublyLinkedList();
    }

    public function createArrayOfPageNamesAndIDs(): array
    {
        $pageNameAndIdArray = array();
        for ($i = 0; $i < $this->pages->count(); $i++) {
            $pageNameAndIdArray [] = 'Name: ' . $this->pages->offsetGet($i)->getName($i) . '&nbsp' . '&nbsp' . 'ID: ' . $this->pages->offsetGet($i)->getId();
            //echo('Reporting:' . $pageNameAndIdArray[$i]);

        }
        return $pageNameAndIdArray;
    }

    public function addPageToList(PageControll $newPage): void
    {
        $this->pages->push($newPage);
    }

    public function removePageFromList(int $pageID): void
    {

        $this->pages->offsetUnset($this->getIndexFromPage($pageID));


    }

    public function doesPageExist(int $pageId): bool
    {
        $checker = false;
        if ($this->isListEmpty() === false) {

            for ($i = 0; $i < $this->pages->count(); $i++) {
                if ($this->pages->offsetGet($i)->getId() === $pageId) {
                    $checker = true;
                    break;
                }
            }
        }

        return $checker;
    }

    public function pingPage(int $pageId): void
    {
        $this->pages->offsetGet($this->getIndexFromPage($pageId))->pageCall();
    }

    private function getIndexFromPage(int $id): int
    {

        if ($this->doesPageExist($id) === true) {

            for ($i = 0; $i < $this->pages->count(); $i++) {
                if ($this->pages->offsetGet($i)->getId() === $id) {
                    break;
                }
            }
            return $i;
        } else {
            throw new InvalidArgumentException('Diese SeitenID existiert nicht!');
        }


    }

    public function isListEmpty(): bool
    {
        return $this->pages->isEmpty();
    }

    public function changePageName(int $id, string $newName): void
    {
        $this->pages->offsetGet($this->getIndexFromPage($id))->setName($newName);
    }


}