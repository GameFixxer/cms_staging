<?php
declare(strict_types=1);
namespace App\Tests\integration\ShoppingCard;

use App\Service\SessionUser;
use App\Tests\integration\Helper\ContainerHelper;
use UnitTester;

/**
 * @group card
 */

class ShoppingCardControllerTest extends \Codeception\Test\Unit
{

    /**
     * @var \UnitTester $tester
     */
    protected UnitTester $tester;
    protected ContainerHelper $helper;
    protected $session;

    public function _before()
    {
        $this->helper = new ContainerHelper();
        $this->session = $this->helper->getUserSession();
        $this->tester->arrange();
        $this->tester->setSession();
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_GET = [
            'cl' => 'list',
            'page' => 'list',
        ];
    }

    public function _after()
    {
    }

    public function testAddToShoppingCard()
    {
        $_POST = [
            'add' => '13'
        ];
        $this->tester->setUpBootstrap();
        self::assertSame($this->session->getShoppingCard()[0], '13');
    }

    public function testRemoveFromShoppingCard()
    {
        $_POST = [
            'add' => '13'
        ];
        $this->tester->setUpBootstrap();
        $cache = $this->session->getShoppingCard();
        $_POST = [
            'add' => '13'
        ];
        $this->tester->setUpBootstrap();
        $this->testAddToShoppingCard();
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_GET = [
        'cl' => 'card',
        'page' => 'list',
            'admin' => 'true'
    ];

        $_POST = [
            'remove' => '13'
        ];
        $this->tester->setUpBootstrap();
        self::assertSame($this->session->getShoppingCard(), $cache);
    }

    private function createProduct()
    {

    }

    private function createCSVDTO(string $articleNumber, string $categoryKey)
    {
    }
}
