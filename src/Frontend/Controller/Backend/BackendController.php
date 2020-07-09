<?php
declare(strict_types=1);

namespace App\Frontend\Controller\Backend;
use App\Frontend\Controller\Frontend\Model\Controller;

interface BackendController extends Controller
{
    public function init():void;
}
