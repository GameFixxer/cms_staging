<?php

use \Codeception\Util\Locator;

class FirstCest
{
    public function createProductTest(AcceptanceTester $I)
    {
        $I->amOnPage('/Index.php?cl=product&page=list&admin=true');
        $this->logIn($I);
        $I->click(['id' => 'create']);
        $I->fillField('newpagename', 'Ted');
        $I->fillField('newpagedescription', 'Tes');
        $I->click(['id' => 'save']);
    }

    public function doesProductExistInFrontEndTest(AcceptanceTester $I)
    {
        $I->amOnPage('/Index.php?cl=list&admin=false');

        $I->see(
            'Ted'
        );
        $I->click(['title' => 'Ted']);
        $I->see(
            'DETAIL PAGE Ted'
        );
    }


    public function editProductTest(AcceptanceTester $I): void
    {
        $I->amOnPage('/Index.php?cl=product&page=list&admin=true');
        $this->logIn($I);
        $I->click(Locator::find('edit', ['title' => 'Ted']));
        $I->see('Productname');
        $I->fillField('newpagename', 'Miles');
        $I->fillField('newpagedescription', 'Miles');
        $I->click('Update');
        $I->click('Return to productlist');
    }

    /**
     * @depends editProductTest
     */

    public function deleteProductTest(AcceptanceTester $I): void
    {
        $I->amOnPage('/Index.php?cl=product&page=list&admin=true');
        $this->logIn($I);
        $I->seeElement(Locator::find('delete', ['title' => 'Ted']));
        $I->click(Locator::find('Delete', ['title' => 'Ted']));
    }

    public function logOutTest(AcceptanceTester $I)
    {
        $this->logIn($I);
        $I->see('Backstage');
        $I->click('Logout');
        $I->see('LOGIN AREA');
    }

    public function checkAllSinglePagesTest(AcceptanceTester $I): void
    {
        $I->amOnPage('/Index.php?cl=detail&id=0');
        $I->see('404');
        $I->amOnPage('/Index.php?cl=detail&id=5');
        $I->see('404');
        $I->amOnPage('/Index.php?cl=home');
        $I->see(
            'Menu Login Productlist About Dashboard Contact There is no place like 127.0.0.1 Login Copyright © Your Website 2020 Privacy PolicyTerms of Use'
        );
        $I->amOnPage('/Index.php?cl=detail');
        $I->see('404');
        $I->amOnPage('/Index.php?cl=login');
        $I->see('404');
        $I->amOnPage('/Index.php?cl=login&admin=true');
        $I->see('LOGIN AREA');
    }
    public function logIn(AcceptanceTester $I): void
    {
        $I->amOnPage('/Index.php?cl=login&admin=true');

        $I->click('Login');
        $I->submitForm(
            '#contactForm',
            [
                        'username' => 'test',
                        'password' => '1234',
                ]
        );
        $I->click('Login');
        $I->see('WELCOME TO THE BACKSTAGEAREA');
    }
}
