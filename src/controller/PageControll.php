<?php

namespace App\controller;
class PageControll implements Controller
{
    private \Smarty $smarty;

    public function __construct(\Smarty $dependency)
    {
        $this->smarty = $dependency;

    }


    public function action(): void
    {
        $pageId = (int)$_GET['id'];
        try {
            $this->smarty->_getTemplateId(dirname(__DIR__, 2) . '/templates/page_detail_.tpl');
        } catch (\SmartyException $e) {
        }
        if (!$pageId || !file_exists(dirname(__DIR__, 2) . '/templates/page_detail_' . $pageId . '_.tpl')) {
            try {
                 $this->smarty->display('page_404_.tpl');
            } catch (\SmartyException $e) {
            } catch (\Exception $e) {
            }

        }
        //return include(dirname(__DIR__, 2) . '/templates/detail_' . $pageId . '_.html');
    }


}