<?php

declare(strict_types=1);

namespace App\Component;

use App\Frontend\Controller\Backend\Login\Model\LoginController;
use App\Frontend\Controller\Backend\Login\Model\PasswordController;
use App\Frontend\Controller\Backend\Product\Model\ProductController;
use App\Frontend\Controller\Backend\User\Model\DashboardController;
use App\Frontend\Controller\Backend\User\Model\UserController;
use App\Frontend\Controller\Frontend\Model\DetailController;
use App\Frontend\Controller\Frontend\Model\ErrorController;
use App\Frontend\Controller\Frontend\Model\HomeController;
use App\Frontend\Controller\Frontend\Model\ListController;

class ControllerProvider
{
    public function getFrontEndList(): array
    {
        return [
                DetailController::class,
                ErrorController::class,
                HomeController::class,
                ListController::class,
        ];
    }
    public function getBackEndList():array
    {
        return [
                LoginController::class,
                DashboardController::class,
                ProductController::class,
                UserController::class,
                PasswordController::class
        ];
    }

}
