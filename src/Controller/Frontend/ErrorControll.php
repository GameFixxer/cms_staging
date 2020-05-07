<?php
declare(strict_types=1);

namespace App\Controller\Frontend;

use App\Controller\Controller;
use App\Service\Container;
use App\Service\View;

class ErrorControll implements Controller
{
    public const ROUTE = 'error';
    private View $view;

    public function __construct(Container $container)
    {
        $this->view = $container->get(View::class);
    }

    public function action(): void
    {
        $this->view->addTemplate('404.tpl');
    }
}
