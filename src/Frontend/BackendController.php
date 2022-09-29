<?php
declare(strict_types=1);

namespace App\Frontend;

interface BackendController extends Controller
{
    public function init():void;
}
