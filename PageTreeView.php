<?php

class PageTreeView extends PageView
{
    public function ShowPageonList(array $namesAndId, string $pageName): void
    {
        echo('Du hast die ' . $pageName . ' gewählt ' . "<br/>");
        echo('' . "\n");
        echo('-> Hier ist eine Auflistung der verfügbaren Seiten:' . "<br/>");
        foreach ($namesAndId as $iValue) {
            print_r($iValue . "<br/>");

        }
    }

}