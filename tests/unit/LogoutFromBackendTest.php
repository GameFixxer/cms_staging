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
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_GET = [
                'cl' => 'product',
                'page' => 'list',
                'admin' => 'true'
        ];
        $_POST = [
                'logout'=>''
                ];
        $this->tester->arrange();
        if (isset($_SESSION['loggedin'])) {
            $this->assertEquals((string)$_SESSION['loggedin'], '0');
        }
    }
}