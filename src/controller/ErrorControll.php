<?php

namespace App\controller;
class ErrorControll implements Controller
{
    private \Smarty $smarty;

    public function __construct(\Smarty $dependency)
    {
        $this->smarty = $dependency;
    }

    public function action(): string
    {
        // TODO: Implement action() method.
        try {
            return $this->smarty->display('page_404_.tpl');
        } catch (\SmartyException $e) {
        } catch (\Exception $e) {
        }
        //return include(dirname(__DIR__, 2) . '/templates/page_404_.html');
    }

}