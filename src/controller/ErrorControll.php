<?php

namespace App\controller;
class ErrorControll implements Controller
{

    public function action(): string
    {
        // TODO: Implement action() method.
        return include(dirname(__DIR__, 2) . '/template/page_404_.html');
    }

}