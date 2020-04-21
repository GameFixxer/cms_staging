<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\DataRepository;
use App\Service\View;

class DetailControll implements Controller
{
    private DataRepository $dm;
    private View $view;
    public const ROUTE = 'detail';

    public function __construct(View $view)
    {
        $this->view = $view;
        $this->dm = new DataRepository();

    }


    public function action(): void
    {
        $pageId = 0;
        try {
            $pageId = (int) $_GET['id'];
        } catch (\InvalidArgumentException $t) {

        }
        if ($pageId === 0) {
            $this->view->addTemplate('404_.tpl');
        }
        else if (!$this->dm->hasProduct($pageId)) {
            $this->view->addTemplate('404_.tpl');

        } else {
            $this->view->addTemplate('detail_.tpl');
            $this->view->addTlpParam('',$this->dm->getProduct($pageId));

        }
    }


}
