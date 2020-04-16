<?php
declare(strict_types=1);
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
        $this->view->addTemplate('404_.tpl');

    }

}