<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\DataRepository;
use App\Service\View;
use App\Model\DataTransferObject;

class DetailControll implements Controller
{

    private View $view;
    public const ROUTE = 'detail';

    public function __construct(View $view)
    {
        $this->view = $view;


    }


    public function action(): void
    {
        $product_exists=false;
        $pageId = 0;
        try {
            $pageId = (int)$_GET['id'];
        } catch (\InvalidArgumentException $t) {

        }
        try {
            $productpage= new DataTransferObject(new DataRepository(), $pageId, false);
            $product_exists=true;
        }
        catch (\InvalidArgumentException $t){
            $product_exists=false;

        }
        if ($pageId === 0) {
            $this->view->addTemplate('404_.tpl');
        } else if ($product_exists ===false) {
            $this->view->addTemplate('404_.tpl');

        } else {
            $this->view->addTemplate('detail_.tpl');
            $this->view->addTlpParam('', $productpage);

        }

    }




}
