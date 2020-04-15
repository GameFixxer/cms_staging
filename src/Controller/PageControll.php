<?php

namespace App\Controller;

use App\Service\View;

class PageControll implements Controller
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
        }
        $this->view->addTemplate('404_.tpl');
        $this->view->addTlpParam($pageId, null);
        $this->view->display();
    }
}