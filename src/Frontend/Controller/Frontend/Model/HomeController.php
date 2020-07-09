<?php
declare(strict_types=1);

namespace App\Frontend\Controller\Frontend\Model;


use App\Component\Container;
use App\Component\View;

class HomeController implements Controller
{
    private View $view;

    public const ROUTE = 'home';

    public function __construct(Container $container)//View $view)
    {
        $this->view = $container->get(View::class);
    }


    public function action(): void
    {
        $this->view->addTlpParam('home', 'There is no place like 127.0.0.1');
        $this->view->addTemplate('home.tpl');
    }
}
