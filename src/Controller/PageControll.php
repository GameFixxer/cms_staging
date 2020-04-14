<?php

namespace App\Controller;
class PageControll implements Controller
{
    public function action(): string
    {
        $pageId = (int)$_GET['id'];
        if (!$pageId || !file_exists(dirname(__DIR__, 2) . '/Template/detail_' . $pageId . '_.html')) {
            return include 'Template/page_404_.html';

        }
        return include(dirname(__DIR__, 2) . '/Template/detail_' . $pageId . '_.html');
    }


}