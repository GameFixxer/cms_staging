<?php

class PageTreeModell extends PageModell
{
    protected array $pagesinformation;
    private $pages;
    private bool $checker;

    public function __construct(string $name, int $id)
    {
        parent:: __construct($name, $id);
        $this->pageName = $name;
        //$this ->$creationDate = new DateTime();
        $this->pageID = $id;
        $this->pages = new SplDoublyLinkedList();
    }

    public function addPageToList(PageControll $newPage): void
    {
        $this->pages->push($newPage);
    }

    public function removePageFromList(int $pageID): void
    {

        $this->pages->offsetUnset($this->getIndexFromPage($pageID));


    }

    public function doesPageExist(int $pageID): bool
    {
        return $this->pages->offsetExists($this->getIndexFromPage($pageID));
    }

    private function getIndexFromPage(int $id): int
    {
        $checker = false;
        if ($this->isListEmpty() === false) {

            for ($i = 0; $i < $this->pages->count(); $i++) {
                if ($this->pages->offsetGet($i)->getId() === $id) {
                    $checker = true;
                    break;
                }
            }
        } else {
            throw new \http\Exception\InvalidArgumentException('Es existiert noch keine Seite!');
        }
        if ($checker === true) {
            return $i;
        }

        throw new \http\Exception\InvalidArgumentException('Diese SeitenID existiert nicht!');
    }

    public function isListEmpty()
    {
        return $this->pages->isEmpty();
    }

    public function changePageName(int $id, string $newName): void
    {
        $this->pages->offsetGet($this->getIndexFromPage($id))->setName($newName);
    }

    public function getPagename(int $id): string
    {
        $this->pages->offsetGet($this->getIndexFromPage($id))->getName();

    }

}