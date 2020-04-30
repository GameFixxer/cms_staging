<?php

declare(strict_types=1);

namespace App\Service;

use App\Controller\BackendController\Backend;
use App\Controller\FrontendController\DetailControll;
use App\Controller\FrontendController\ErrorControll;
use App\Controller\FrontendController\HomeControll;
use App\Controller\FrontendController\ListControll;
use App\Controller\FrontendController\Login;

class ControllerProvider
{
    public function getFrontEndList(): array
    {
        return [
                DetailControll::class,
                ErrorControll::class,
                HomeControll::class,
                ListControll::class,
                Login::class,
                Backend::class,
        ];
    }
    public function getBackEndList():array
    {
        return [
                Backend::class,
        ];
    }
}
