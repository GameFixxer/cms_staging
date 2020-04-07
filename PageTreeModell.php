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
        //$this->addPagetoList($this->pageID, $this->pageName);
        $this->pages = new SplDoublyLinkedList();
    }

    public function addPagetoList(PageControll $newpage): void
    {
        $this->pages->push($newpage);
    }

    public function removePagefromList(int $pageID): void
    {

        if ($this->pages->offsetExists($this->getIndexfromPage($pageID)) === true) {

            $this->pages->offsetUnset($this->getIndexfromPage($pageID));

        } else {
            throw new \http\Exception\InvalidArgumentException('Diese SeitenID existiert nicht!');
        }
    }

    private function getIndexfromPage(int $id): int
    {
        $checker = false;
        if ($this->pages->isEmpty() === false) {

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

    public function changePageName(int $id, string $newName): void
    {
        $this->pages->offsetGet($this->getIndexfromPage($id))->setName($newName);
    }

    public function getPagename(int $id): string
    {
        $this->pages->offsetGet($this->getIndexfromPage($id))->getName();

    }

}