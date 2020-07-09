<?php
declare(strict_types=1);

namespace App\Frontend\Controller\Frontend\Model;

use App\Client\Product\Business\ProductBusinessFacade;
use App\Client\Product\Business\ProductBusinessFacadeInterface;
use App\Component\Container;
use App\Component\View;
use App\Generated\Dto\ProductDataTransferObject;

class DetailController implements Controller
{
    public const ROUTE = 'detail';
    private View $view;
    private ProductBusinessFacadeInterface $productBusinessFacade;

    public function __construct(Container $container)
    {
        $this->productBusinessFacade = $container->get(ProductBusinessFacade::class);
        $this->view = $container->get(View::class);
    }


    public function action(): void
    {
        $pageId = ($_GET['id'] ?? '0');
        $productDTO = $this->productBusinessFacade->get($pageId);
        if ($pageId === 0 || !($this->checkForValidDTO($productDTO))) {
            $this->view->addTlpParam('error', '404 Page not found.');
            $this->view->addTemplate('404.tpl');
        } else {
            $this->view->addTemplate('detail.tpl');
            $this->view->addTlpParam('page', $productDTO);
        }
    }
    private function checkForValidDTO($productDTO) :bool
    {
        return $productDTO instanceof ProductDataTransferObject;
    }
}
