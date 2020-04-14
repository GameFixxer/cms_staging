<?php

class PageControll implements Controller
{
    public function action():string
    {
        $pageId = (int)$_GET['id'];
        if (!$pageId || !file_exists(dirname(__DIR__,1).'/VIEW/detail_' . $pageId . '_.html')) {
            return include 'VIEW/page_404_.html';

        }
        return include( dirname(__DIR__,1).'/VIEW/detail_' . $pageId . '_.html');
    }


}