<?php

namespace App\Controller;
class HomeControll implements Controller

{

    public function action(): string
    {
        return include(dirname(__DIR__, 1) . '/Template/page_home_.html');
    }

}
