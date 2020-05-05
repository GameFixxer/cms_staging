<?php

declare(strict_types=1);

namespace App\Controller\Backend;

use App\Controller\BackendController;
use App\Service\Container;
use App\Service\SessionUser;

class Backend implements BackendController
{
    public const ROUTE = 'backend';
    private Container $container;
    private SessionUser $usersession;

    public function __construct(Container $container)
    {
        $this->usersession= $container->get(SessionUser::class);
    }

    public function action(): void
    {
        $this->redirectToPage(Dashboard::ROUTE);
    }

    public function init(): void
    {
        if (!$this->usersession->isLoggedIn()) {
            $this->redirectToPage(Login::ROUTE);
        } else {
            $this->action();
        }
    }

    private function redirectToPage(String $route):void
    {
        $host = $_SERVER['HTTP_HOST'];
        $uri = trim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra= 'Index.php?page='.$route;
        $extra2='&admin=true';
        header("Location: http://$host$uri/$extra$extra2");
        exit;
    }
}
