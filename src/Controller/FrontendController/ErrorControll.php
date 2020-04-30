<?php
declare(strict_types=1);

namespace App\Controller\FrontendController;

use App\Controller\Controller;
use App\Service\View;

class ErrorControll implements Controller
{
    public const ROUTE = 'error';
    private View $view;

    public function __construct(View $view, object $spaceholder)
    {
        $this->view = $view;
    }

    public function action(): void
    {
        $this->view->addTemplate('404.tpl');
    }
}
