<?php

namespace App\controller;
class HomeControll implements Controller

{
    private \Smarty $smarty;

    public function __construct(\Smarty $dependency)
    {
        $this->smarty = $dependency;
    }

    public function action(): void
    {
        // return include(dirname(__DIR__, 1) . '/templates/page_home_.html');
    }

}
