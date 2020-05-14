<?php

class Test
{
    public function pageListWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/Index.php?page=list');
        $I->see('List');
        $I->click('1');
        $I->see('Detail:Shirt Detail:Shirt ID: 1 Productname: Shirt Description: black shirt, different sizes with print \'Here could be your advertising\'');
        $I->amOnPage('/Index.php?page=list');
        $I->click('2');
        $I->see('Detail:Game Detail:Game ID: 2 Productname: Game Description: a lovely game about eat, sleep, code, repeat.');
        $I->amOnPage('/Index.php?page=list');
        $I->click('3');
        $I->see('Detail:Cake Detail:Cake ID: 3 Productname: Cake Description: The cake is a lie.');
        $I->amOnPage('/Index.php?page=list');
        $I->click('4');
        $I->see('Detail:Coffee Detail:Coffee ID: 4 Productname: Coffee Description: Coffee is love, coffee is life.');
    }

    public function checkAllSinglePages(AcceptanceTester $I, $link)
    {
        $I->amOnPage('/Index.php?page=detail&id=1');
        $I->see('Detail:Shirt Detail:Shirt ID: 1 Productname: Shirt Description: black shirt, different sizes with print \'Here could be your advertising\'');
        $I->amOnPage('/Index.php?page=detail&id=0');
        $I->see('404');
        $I->amOnPage('/Index.php?page=detail&id=5');
        $I->see('404');
        $I->amOnPage('/Index.php?page=home');
        $I->see('Page Title Page Title There is no place like 127.0.0.1 ');
        $I->amOnPage('/Index.php?page=detail');
        $I->see('404');

    }
}