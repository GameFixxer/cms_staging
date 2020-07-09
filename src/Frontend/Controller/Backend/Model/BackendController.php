<?php
declare(strict_types=1);

namespace App\Frontend\Controller\Backend\Model;
use App\Frontend\Controller\Frontend\Model\Controller;

interface BackendController extends Controller
{
    public function init():void;
}
