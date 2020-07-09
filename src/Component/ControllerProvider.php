<?php

declare(strict_types=1);

namespace App\Component;


use App\Frontend\Login\Communication\LoginController;
use App\Frontend\Login\Communication\PasswordController;
use App\Frontend\Model\DetailController;
use App\Frontend\Model\ErrorController;
use App\Frontend\Model\HomeController;
use App\Frontend\Model\ListController;
use App\Frontend\Product\Communication\ProductController;
use App\Frontend\User\Communication\DashboardController;
use App\Frontend\User\Communication\UserController;

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
