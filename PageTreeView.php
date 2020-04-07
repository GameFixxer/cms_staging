<?php

class PageTreeView extends PageView
{
    public function __construct($name)
    {
        parent:: __construct($name);
    }

    public function ShowPageonList(array $namesAndId)
    {
        print_r($namesAndId);
    }
}