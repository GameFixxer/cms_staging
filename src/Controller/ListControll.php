<?php
declare(strict_types=1);

namespace App\Controller;

use \App\model\DataModel;
use App\Service\View;

class ListControll implements Controller
{
    private View $view;
    private DataModel $dm;
    public const ROUTE = 'list';

    public function __construct(View $view)
    {
        $this->view = $view;
        $this->dm = new DataModel();

    }

    public function action(): void
    {

        $this->view->addTemplate('index.tpl');
        $this->view->addTlpParamToList($this->dm->returnList());


    }



}