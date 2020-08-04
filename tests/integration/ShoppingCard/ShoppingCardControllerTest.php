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
        self::assertSame($this->session->getShoppingCard()[0][0], '13');
    }

    public function removeFromShoppingCard()
    {
        
    }

    private function createProduct()
    {
        $tmp = rand(1, 1000).substr('', rand(1, 1000));
        $this->createCSVDTO(''.$tmp, 'tester');
        $csvProduct = $this->importCreateProduct->createProduct($this->csvDTO);
        $this->csvDTO->setId($csvProduct->getId());
    }

    private function createCSVDTO(string $articleNumber, string $categoryKey)
    {
        $this->csvDTO = new CsvProductDataTransferObject();
        $this->csvDTO->setKey($categoryKey);
        $this->csvDTO->setArticleNumber($articleNumber);
        $this->csvDTO->setName('test');
    }
}
