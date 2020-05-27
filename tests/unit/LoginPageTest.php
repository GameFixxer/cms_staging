<?php

use App\Service\View;

class LoginPageTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    /** @var  View $view */
    private View $view;
    protected function _before()
    {
    }

    protected function _after()
    {
        parent::_after();
        unset($_SERVER['REQUEST_METHOD']);
    }

    // tests
    public function testLoginPage(): void
    {
        $_SERVER['REQUEST_METHOD'] = '';
        $_GET = [
                'cl' => 'login',
                'admin'=>'true'
        ];
        $this->view = include __DIR__.'/../../Bootstrap.php';
        $smartyParams = (string)$this->view->getParam('login');
        $this->assertEquals($smartyParams, 'LOGIN AREA');
    }
}
