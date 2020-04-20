<?php
declare(strict_types=1);

namespace App\Controller;

use App\Service\View;

class HomeControll implements Controller

{
    private View $view;

    public const ROUTE = 'home';

    public function __construct(View $view)
    {
        $this->view = $view;

    }


    public function action(): void
    {
        $this->view->addTemplate('home_.tpl');
    }

}
