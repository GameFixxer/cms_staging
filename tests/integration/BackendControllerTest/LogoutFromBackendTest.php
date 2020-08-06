<?php
declare(strict_types=1);

namespace App\Tests\integration\BackendControllerTest;

use UnitTester;

class LogoutFromBackendTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester $tester
     */
    protected UnitTester $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
        parent::_after();
        unset($_SERVER['REQUEST_METHOD']);
    }

    // tests

    public function testLoginIntoBackend(): void
    {
        $this->tester->arrange();
        $this->tester->setSession();

        $_SERVER['REQUEST_METHOD'] = 'GET';

        $_GET = [
            'cl' => 'login',
            'page' => 'logout',
            'admin' => 'true',
        ];

        $this->tester->setUpBootstrap();
        $_GET = [
            'cl' => 'login',
            'page' => 'logout',
            'admin' => 'true',
        ];
        if ($_GET['cl'] === 'login' && $_GET['page'] === 'logout') {
            $this->assertNull($_SESSION['username']);
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
}
