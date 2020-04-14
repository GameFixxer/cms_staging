<?php

class ErrorControll implements Controller
{

    public function action():string
    {
        // TODO: Implement action() method.
        return include (dirname(__DIR__,1).'VIEW/page_404_.html');
    }

}