<?php

namespace App\controller;
class HomeControll implements Controller

{

    public function action(): string
    {
        return include(dirname(__DIR__, 1) . '/templates/page_home_.html');
    }

}
