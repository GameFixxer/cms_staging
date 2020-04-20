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
        //try {
            $pageId = $_GET['id'];
        //} catch (\InvalidArgumentException $t) {

        //}
        if ($pageId === null) {
            echo('reached this beta point ->pageid:'.$pageId);
            var_dump($pageId);
            $this->view->addTemplate('404_.tpl');
        }
        else if (!$this->dm->hasProduct($pageId)) {
            echo('reached this alpha point ->pageid:'.$pageId);
            $this->view->addTemplate('404_.tpl');

        } else {
            $stringpageid = '' . $pageId;
            $key = $this->dm->getIndex($stringpageid);
            $this->view->addTemplate('detail_.tpl');
            $this->view->addTlpParam($this->dm->getProduct($key), $stringpageid, $this->dm->getDescription($key));

        }
    }


}
