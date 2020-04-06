<?php

class PageModell
{

    Private String $PageName;
    Private $CreationDate;
    Private INT $PageID;

    function __construct(String $Name, $ID)
    {
        $PageName = $name;
        $CreationDate = new DateTime();
        $PageID = $ID;

    }

    public function __destruct()
    {

    }

    function changeOwnName($Name)
    {
        $this->PageName = $Name;
    }

}

?>