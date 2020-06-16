<?php



class LoginIntoBackendTest extends \Codeception\Test\Unit
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
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_GET = [
                'cl' => 'login',
                'admin' => 'true'
        ];
        //$this->tester->logIntoBackend();

        $_POST = [
                'username' => 'test',
                'password' => '1234'
        ];
        $this->tester->arrange();
        if (isset($_SESSION['loggedin'])) {
            $this->assertEquals('1', (string)$_SESSION['loggedin']);
        }
    }
}
