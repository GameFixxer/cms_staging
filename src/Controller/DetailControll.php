<?php
declare(strict_types=1);

namespace App\Controller;

use App\Service\View;

class DetailControll implements Controller
{
    private View $view;
    public const ROUTE = 'detail';

    public function __construct(View $view)
    {
        $this->view = $view;

    }


    public function action(): void
    {
        try {
            $pageId = (int)$_GET['id'];
        } catch (\InvalidArgumentException $t) {

        }

        if (!$pageId) {
            $this->view->addTemplate('404_.tpl');

        } else {
            $pageidparser = '' . $pageId;
            $this->view->addTemplate('detail_.tpl');
            $this->view->addTlpParam('detailpage', $pageidparser, '' . $pageId);

        }
    }
}
