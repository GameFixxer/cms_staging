<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\ProductRepository;
use App\Service\View;
use App\Model\ProductDataTransferObject;

class DetailControll implements Controller
{

    private View $view;
    private ProductRepository $pr;
    public const ROUTE = 'detail';

    public function __construct(View $view)
    {
        $this->view = $view;
        $this->pr = new ProductRepository();


    }


    public function action(): void
    {

        $pageId = 0;
        try {
            $pageId = (int)$_GET['id'];
        } catch (\InvalidArgumentException $t) {

        }

        if ($pageId === 0) {
            $this->view->addTemplate('404_.tpl');
        } else if ($this->pr->hasProduct($pageId) ===false) {
            $this->view->addTemplate('404_.tpl');

        } else {
            $this->view->addTemplate('detail_.tpl');
            try {
                $this->view->addTlpParam('', $this->pr->getProduct($pageId));
            } catch (\Exception $e) {
            }

        }

    }




}
