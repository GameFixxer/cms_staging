<?php

class FirstCest
{
    public function pageListWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/Index.php?cl=list');
        $I->see('List');
        $I->click('Productlist');
        $I->amOnPage('/Index.php?cl=list#portfolio');
        $I->see('PRODUCTLIST');
        $I->click(['id' => '20']);
        $I->see('20');
    }

    public function loginLogout(AcceptanceTester $I)
    {
        $I->amOnPage('/Index.php?cl=login&adming=true');
        $I->click('Login');

        $I->submitForm('#contactForm', [
                'username' => 'test',
                'password' => '1234'
        ]);
        $I->see('WELCOME TO THE BACKSTAGEAREA');
        $I->click('Logout');
        $I->see('LOGIN AREA');
    }
    public function createDeleteEditProduct(AcceptanceTester $I)
    {
        $I->amOnPage('/Index.php?cl=product&page=list&admin=true');
        $I->submitForm('#contactForm', [
                'username' => 'test',
                'password' => '1234'
        ]);
        $I->see('WELCOME TO THE BACKSTAGEAREA');
        $I->click(['id' => '20', 'name'=>'edit']);
        $I->see('Productname');
        $I->fillField('newpagename', 'Miles');
        $I->fillField('newpagedescription', 'Miles');
        $I->click('Update');

        $I->click('Return to productlist');
        $I->see('WELCOME TO THE BACKSTAGEAREA');
        $I->see('Create');
        $I->click(['id'=>'create']); // waiting it to show

       
        //$I->click('Ok', '#modal'); // clicking ok insode modal
        $I->fillField('newpagename', 'Miles');
        $I->fillField('newpagedescription', 'Miles');
        $I->click('Create');
    }

    public function checkAllSinglePages(AcceptanceTester $I)
    {
        $I->amOnPage('/Index.php?cl=detail&id=20');
        $I->see(
            'DETAIL PAGE'
        );
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
}