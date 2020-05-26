<?php

use \Codeception\Util\Locator;

class FirstCest
{
    private int $password;
    public function createProductTest(AcceptanceTester $I)
    {
        $I->logIn();
        $I->click(['id' => 'create']);
        $I->fillField('newpagename', 'Ted');
        $I->fillField('newpagedescription', 'Tes');
        $I->click(['id' => 'save']);
        $this->password =  (int) $I->grabTextFrom('//table/tbody[position()=last()]/tr[position()=last()]/th[1]/@id');
        $I->cantSee('//table/tbody[@id='.$this->password.']');
        $I->isPageAvailableTest('/Index.php?cl=detail&id='.$this->password.'&admin=false', ''.$this->password, ''.$this->password);
    }

    public function doesProductExistInFrontEndListTest(AcceptanceTester $I)
    {
        $I->amOnPage('/Index.php?cl=list&admin=false');
        $I->canSee($I->grabTextFrom('//object[@id='.$this->password.']'));
        $I->click('//object[@id='.$this->password.']/a');
        $I->see(''.$this->password);
    }


    public function editProductTest(AcceptanceTester $I): void
    {
        $I->logIn();
        $I->click('//table/tbody[@id='.$this->password.']/tr[position()=last()]/th[2]/a');
        $I->see(''.$this->password);
        $I->fillField('newpagename', 'Miles');
        $I->fillField('newpagedescription', 'Miles');
        $I->click('Update');
        $I->click('Return to productlist');
    }

    public function deleteProductTest(AcceptanceTester $I): void
    {
        $I->logIn();
        $I->click('//table/tbody[@id='.$this->password.']/tr[position()=last()]/td[position()=last()]/button');
        $I->cantSee('//table/tbody[@id='.$this->password.']');
    }

    public function logOutTest(AcceptanceTester $I)
    {
        $I->logIn();
        $I->see('Backstage');
        $I->click('Logout');
        $I->see('LOGIN AREA');
    }

    public function checkAllFrontendPagesTest(AcceptanceTester $I): void
    {
        $I->isPageAvailableTest('/Index.php?cl=detail&id=0', 'Page not found', '404');
        $I->isPageAvailableTest('/Index.php?cl=home', 'There is no place like 127.0.0.1', 'There is no place like 127.0.0.1');
        $I->isPageAvailableTest('/Index.php?cl=detail', 'Page not found', '404');
        $I->isPageAvailableTest('/Index.php?cl=detail', 'Page not found', '404');
        $I->isPageAvailableTest('/Index.php?cl=login', 'Page not found', '404');
        $I->isPageAvailableTest('/Index.php?cl=login&admin=true', 'LOGIN AREA', 'LOGIN AREA');
    }
}
