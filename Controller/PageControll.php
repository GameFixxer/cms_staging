<?php

class PageControll implements Controller
{
    public function action()
    {
        $pageId = (int)$_GET['id'];
        if (!$pageId || !file_exists('Pages/detail_' . $pageId . '_.html')) {
            return include 'Pages/page_404_.html';

        }
        return include 'Pages/detail_' . $pageId . '_.html';
    }


}