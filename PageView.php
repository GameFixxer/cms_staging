<?php

class PageView
{

    private string $displayname;

    public function __construct($name)
    {
        $this->displayname = $name;
        $this->showName();
    }

    public function setName($name): void
    {
        $this->displayname = $name;

    }

    function showName(): void
    {

    }
}
