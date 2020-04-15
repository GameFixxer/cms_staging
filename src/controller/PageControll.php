<?php

namespace App\controller;
class PageControll implements Controller
{
    public function action(): string
    {
        $pageId = (int)$_GET['id'];
        if (!$pageId || !file_exists(dirname(__DIR__, 2) . '/templates/detail_' . $pageId . '_.html')) {
            return include 'templates/page_404_.html';

        }
        return include(dirname(__DIR__, 2) . '/templates/detail_' . $pageId . '_.html');
    }


}