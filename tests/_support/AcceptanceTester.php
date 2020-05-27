<?php


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause()
 *
 * @SuppressWarnings(PHPMD)
 */
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    /**
     * Define custom actions here
     * @param string $pageurl
     * @param string $prediction
     * @param string $expectation
     */
    public function isPageAvailableTest(string $pageurl, string $prediction, string $expectation):void
    {
        $this->amOnPage($pageurl);
        $this->expect($prediction);
        $this->see($expectation);
    }
    public function doesProductExistInBackendListAndDetail(int $productId, bool $shouldItExist, string $expectatedProductname): void
    {
        $this->amOnPage('/Index.php?cl=product&page=list&admin=true');
        if ($shouldItExist) {
            $this->seeElement('//table/tbody[@id='.$productId.']');///tr[position()=last()]/td[1]'));
            $this->amOnPage('Index.php?cl=product&page=detail&id='.$productId.'&admin=true');
            $this->see($expectatedProductname);
        } else {
            $this->cantSee($productId);//$this->grabTextFrom('//table/tbody[@id='.$productId.']'));
        }
    }
    public function logIn(): void
    {
        $this->amOnPage('/Index.php?cl=login&admin=true');
        $this->click('Login');
        $this->submitForm(
            '#contactForm',
            [
                        'username' => 'test',
                        'password' => '1234',
                ]
        );
        $this->click('Login');
        $this->expect('WELCOME TO THE BACKSTAGEAREA');
        $this->see('WELCOME TO THE BACKSTAGEAREA');
    }
}
