<?php
declare(strict_types=1);

namespace App\Frontend\Model;

use App\Client\Product\Business\ProductBusinessFacade;
use App\Client\Product\Business\ProductBusinessFacadeInterface;
use App\Component\View;
use App\Frontend\Controller;
use App\Generated\Dto\ProductDataTransferObject;

class ListController implements Controller
{
    public const ROUTE = 'list';
    private View $view;
    private ProductBusinessFacadeInterface $productBusinessFacade;

    public function __construct(View $view,ProductBusinessFacadeInterface $productBusinessFacade )
    {
        $this->view = $view;
        $this->productBusinessFacade = $productBusinessFacade;
    }

    public function action(): void
    {
        $productDTO = $this->productBusinessFacade->getList();
        if ($this->checkForValidDTO($productDTO)) {
            $this->view->addTemplate('index.tpl');
            $this->view->addTlpParam('productlist', $productDTO);
        } else {
            $this->view->addTlpParam('error', '404 Page not found.');
            $this->view->addTemplate('404.tpl');
        }
    }

    private function checkForValidDTO($productDTO) :bool
    {
        if (is_array($productDTO)) {
            foreach ($productDTO as $key) {
                if (!($key instanceof ProductDataTransferObject)) {
                    return false;
                }
            }
            return true;
        }
        return $productDTO instanceof ProductDataTransferObject;
    }
}
