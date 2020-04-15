<?php
require(SMARTY_DIR . 'Smarty.class.php');

class Setup extends Smarty
{
    /*
     *  To do
     */
    function __construct()
    {

        // Class Constructor.
        // These automatically get set with each new instance.

        parent::__construct();

        $this->setTemplateDir('/home/rene/smarty/templates');
        $this->setCompileDir('/home/rene/smarty/templates_c');
        $this->setCacheDir('/home/rene/smarty/cache');
        $this->setConfigDir('/home/rene//smarty/configs');
        $this->caching = Smarty::CACHING_LIFETIME_CURRENT;
        $this->assign('name', 'Renégade');

    }
}