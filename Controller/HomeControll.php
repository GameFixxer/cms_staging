<?php

class HomeControll implements Controller
{

    public function action():string
    {
        return include( dirname(__DIR__,1).'VIEW/page_home_.html');
    }

}
