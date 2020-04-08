<?php

class PageView
{

    private string $displayName;

    public function __construct($name)
    {
        $this->displayName = $name;
        // $this->showName();
    }

    public function setName($name): void
    {
        $this->displayName = $name;

    }


    public function showPage($pageId): void
    {

        echo('Name der Seite:' . "&nbsp" . $this->displayName . "<br/>" . 'SeitenID:' . "&nbsp" . $pageId);
    }
}

