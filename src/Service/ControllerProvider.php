<?php

declare(strict_types=1);

namespace App\Service;


use App\Controller\Backend\DashboardController;
use App\Controller\Backend\PasswordController;
use App\Controller\Backend\ProductController;
use App\Controller\Backend\UserController;
use App\Controller\Frontend\DetailControll;
use App\Controller\Frontend\ErrorControll;
use App\Controller\Frontend\HomeControll;
use App\Controller\Frontend\ListControll;
use App\Controller\Backend\LoginController;

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
