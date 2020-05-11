<?php
declare(strict_types=1);
namespace App\Controller;

interface BackendController extends Controller
{
    public function init():void;
}
