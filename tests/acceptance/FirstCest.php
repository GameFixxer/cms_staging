<?php

use \Codeception\Util\Locator;


class FirstCest
{
    private int $productId;

    public function createProductTest(AcceptanceTester $I):void
    {
        $I->logIn();
        $I->click(['id' => 'create']);
        $I->fillField('newpagename', 'Ted');
        $I->fillField('newpagedescription', 'Tes');
        $I->click(['id' => 'save']);
        $this->productId = (int)$I->grabTextFrom('//table/tbody[position()=last()]/tr[position()=last()]/th[1]/@id');
        //$I->seeElement('//table
        ///tbody[@id='.$this->password.']');
        $I->doesProductExistInBackendListAndDetail($this->productId, true, 'Ted');
        $I->isPageAvailableTest('/Index.php?cl=detail&id='.$this->productId.'&admin=false', ''.$this->productId, ''.$this->productId);
    }

    public function doesProductExistInFrontEndListTest(AcceptanceTester $I)
    {
        $I->amOnPage('/Index.php?cl=list&admin=false');
        $I->canSee($I->grabTextFrom('//object[@id='.$this->productId.']'));
        $I->click('//object[@id='.$this->productId.']/a');
        $I->see(''.$this->productId);
    }


    public function editProductTest(AcceptanceTester $I): void
    {
        $I->logIn();
        $I->click('//table/tbody[@id='.$this->productId.']/tr[position()=last()]/th[2]/a');
        $I->see(''.$this->productId);
        $I->fillField('newpagename', 'Miles');
        $I->fillField('newpagedescription', 'Miles');
        $I->click('Update');
        $I->click('Return to productlist');
    }

    public function deleteProductTest(AcceptanceTester $I): void
    {
        $I->logIn();
        $I->doesProductExistInBackendListAndDetail($this->productId, true, 'Miles');
        $I->amOnPage('/Index.php?cl=product&page=list&admin=true');
        $I->click('//table/tbody[@id='.$this->productId.']/tr[position()=last()]/td[position()=last()]/button');
        $I->cantSee('//table/tbody[@id='.$this->productId.']');
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
