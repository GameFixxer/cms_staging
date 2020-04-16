<?php

namespace App\Controller;

use App\Service\View;

class DetailControll implements Controller
{
    private View $view;

    public function __construct(View $view)
    {
        $this->view = $view;

    }


    public function action(): void
    {
        $pageId = (int)$_GET['id'];
        if(!$pageId){
            $this->view->addTemplate('404_.tpl');
            $this->view->display();
        }
        else {
            $this->view->addTemplate('detail_.tpl');
            $this->view->addTlpParam('detailpage',$pageId, ''.$pageId);
            $this->view->display();
        }
    }
}