<?php

class PageControll
{
    private $pageModell;
    private $pageView;

    protected function __construct(string $name, int $id)
    {

        $this->pageModell = new PageModell($name, $id);
        $this->pageView = new PageView($name);
    }

    protected function setName($name): void
    {
        $this->pageModell->changeOwnName($name);
        $this->pageView->setName($name);
    }

    protected function getName(): string
    {
        return $this->pageModell->getName();
    }
    protected function getId(): int
    {
        return $this->pageModell->getId();
    }
}