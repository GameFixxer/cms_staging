<?php

class PageTreeView extends PageView
{
    public function ShowPageonList(array $namesAndId): void
    {
        $length = count($namesAndId);
        for ($i = 0; $i < $length; $i++) {
            print_r($namesAndId[$i] . "<br/>");

        }
    }
}