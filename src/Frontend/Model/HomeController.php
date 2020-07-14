<?php
declare(strict_types=1);

namespace App\Frontend\Model;

use App\Component\View;
use App\Frontend\Controller;

class HomeController implements Controller
{
    private View $view;

    public const ROUTE = 'home';

    public function __construct(View $view)//View $view)
    {
        $this->view = $view;
    }


    public function action(): void
    {
        $this->view->addTlpParam('home', 'There is no place like 127.0.0.1');
        $this->view->addTemplate('home.tpl');
    }
}
