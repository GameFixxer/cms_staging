<?php




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

        $_SERVER['REQUEST_METHOD'] = '';

        $_GET = [
            'cl' => 'dashboard',
            'page' => 'list',
            'admin' => 'true',
        ];

        $this->tester->setUpBootstrap();

        $_GET = [
            'cl' => 'login',
            'page' => 'logout',
            'admin' => 'true',
        ];

        codecept_debug($_POST);

        $this->assertTrue($_GET['cl'] === 'login', $_GET['page'] === 'login');
    }
}
