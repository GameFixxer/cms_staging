<?php

namespace App\controller;
class HomeControll implements Controller

{

    public function action(): string
    {
        return include(dirname(__DIR__, 1) . '/template/page_home_.html');
    }

}
