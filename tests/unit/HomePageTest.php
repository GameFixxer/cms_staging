<?php

use App\Service\View;

class HomePageTest extends \Codeception\Test\Unit
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
    }

    // tests
    public function testHomepage(): void
    {
        $_GET = [
                'cl' => 'home',
                'page'=>'list'
        ];
        $this->view = include __DIR__.'/../../Bootstrap.php';
        $smartyParams = (string)$this->view->getParam('home');
        $this->assertEquals($smartyParams, 'There is no place like 127.0.0.1');
    }
}
