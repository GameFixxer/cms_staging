<?php

class PageTreeModell extends PageModell
{
    protected array $pages;

    public function __construct(string $name, int $id)
    {
        parent:: __construct($name, $id);
        $this->pageName = $name;
        //$this ->$creationDate = new DateTime();
        $this->pageID = $id;
        $this->addPagetoList($this->pageID);
    }


    public function addPagetoList(int $pageID): void
    {
        $this->pages[] = $pageID;
    }

    public function removePagefromList(int $pageID): void
    {
        if (in_array($pageID, $this->pages, true)) {
            if (array_search($pageID, $this->pages, true) === array_key_last($this->pages)) {
                array_pop($this->pages);
            } else {
                $this->pages[array_search($pageID, $this->pages, true)] = 'gelöscht';
            }
        } else {
            throw new \http\Exception\InvalidArgumentException('Diese SeitenID existiert nicht!');
        }
    }


}