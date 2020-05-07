<?php
declare(strict_types=1);

namespace App\Controller\Frontend;

use App\Controller\Controller;
use App\Service\Container;
use App\Service\View;

class HomeControll implements Controller
{
    private View $view;

    public const ROUTE = 'home';

    public function __construct(Container $container)//View $view)
    {
        $this->view = $container->get(View::class);
    }


    public function action(): void
    {
        $this->view->addTemplate('home.tpl');
    }
}
