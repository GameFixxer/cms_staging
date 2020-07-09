<?php
declare(strict_types=1);

namespace App\Frontend\Controller\Frontend\Model;


use App\Component\Container;
use App\Component\View;

class ErrorController implements Controller
{
    public const ROUTE = 'error';
    private View $view;

    public function __construct(Container $container)
    {
        $this->view = $container->get(View::class);
    }

    public function action(): void
    {
        $this->view->addTlpParam('error', '404 Page not found.');
        $this->view->addTemplate('404.tpl');
    }
}
