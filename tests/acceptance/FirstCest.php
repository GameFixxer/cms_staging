<?php

class FirstCest
{
    public function frontpageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/Index.php?page=list');
        $I->see('List');
    }

    /*public function clickLink(AcceptanceTester $I, int $link)
    {
        $I->click($link);
    }*/
}