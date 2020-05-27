<?php

use App\Service\View;

class ErrorPageTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    /** @var  View $view */
    private View $view;

    protected function _before(): void
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testErrorWithAdminEqualsTrue(): void
    {
        $_GET = [
                'cl' => 'home',
                'page' => 'list',
                'admin' => 'true'
        ];
        $this->view = include __DIR__.'/../../Bootstrap.php';
        $smartyParams = (string)$this->view->getParam('error');
        $this->assertEquals($smartyParams, '404 Page not found.');
    }

    public function testErrorWithNoProductNumber():void
    {
        $_GET = [
                'cl' => 'detail',
                'page' => 'detail'
        ];

        $this->view = include __DIR__.'/../../Bootstrap.php';
        $smartyParams = (string)$this->view->getParam('error');
        $this->assertEquals($smartyParams, '404 Page not found.');
    }
    public function testErrorWithNoneAvailableProductPage():void
    {
        $_GET = [
                'cl' => 'detail',
                'page' => 'detail',
                'id' => '0'
        ];

        $this->view = include __DIR__.'/../../Bootstrap.php';
        $smartyParams = (string)$this->view->getParam('error');
        $this->assertEquals($smartyParams, '404 Page not found.');
    }
}
