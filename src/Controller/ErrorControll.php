<?php

namespace App\Controller;

use App\Service\View;

class ErrorControll implements Controller
{
    private View $view;

    public function __construct(View $view)
    {
        $this->view = $view;

    }

    public function action(): void
    {
        $this->view->addTemplate(dirname(__DIR__, 2).'templates/404_.tpl');
        $this->view->display();
    }

}