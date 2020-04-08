<?php

class PageControll
{
    private $pageModell;
    private $pageView;

    protected function __construct(string $ownName, int $ownId)
    {

        $this->pageModell = new PageModell($ownName, $ownId);
        $this->pageView = new PageView($ownName);
    }

    protected function setName($name): void
    {
        $this->pageModell->changeOwnName($name);
        $this->pageView->setName($name);
    }

    public function getName(): string
    {
        return $this->pageModell->getName();
    }

    public function getId(): int
    {
        return $this->pageModell->getId();
    }
}