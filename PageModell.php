<?php

class PageModell
{
    protected int $pageID;
    protected string $pageName;

    //private $creationDate; private


    public function __construct(string $name, int $id)
    {
        $this->pageName = $name;
        //$this ->$creationDate = new DateTime();
        $this->pageID = $id;

    }


    public function changeOwnName($name): void
    {
        $this->pageName = $name;
    }

    public function getName(): string
    {
        return $this->pageName;
    }

    public function getId(): int
    {
        return $this->pageID;
    }
}

