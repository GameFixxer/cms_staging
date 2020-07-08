<?php

declare(strict_types=1);

namespace App\Service;

use App\Frontend\Controller\Backend\DashboardController;
use App\Frontend\Controller\Backend\LoginController;
use App\Frontend\Controller\Backend\PasswordController;
use App\Frontend\Controller\Backend\ProductController;
use App\Frontend\Controller\Backend\UserController;
use App\Frontend\Controller\Frontend\DetailControll;
use App\Frontend\Controller\Frontend\ErrorControll;
use App\Frontend\Controller\Frontend\HomeControll;
use App\Frontend\Controller\Frontend\ListControll;

class ControllerProvider
{
    public function getFrontEndList(): array
    {
        return [
                DetailControll::class,
                ErrorControll::class,
                HomeControll::class,
                ListControll::class,
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
