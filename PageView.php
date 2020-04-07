<?php

class PageView
{

    private string $displayName;

    public function __construct($name)
    {
        $this->displayName = $name;
        $this->showName();
    }

    public function setName($name): void
    {
        $this->displayName = $name;

    }

    private function showName(): void
    {
        echo('Name der Seite: ' . $this->displayName);
    }
}

