<?php
declare(strict_types=1);

namespace App\Frontend\Model;

use App\Component\View;
use App\Frontend\Controller;

class ErrorController implements Controller
{
    public const ROUTE = 'error';
    private View $view;

    public function __construct(View $view)
    {
        $this->view = $view;
    }

    public function action(): void
    {
        $this->view->addTlpParam('error', '404 Page not found.');
        $this->view->addTemplate('404.tpl');
    }
}
