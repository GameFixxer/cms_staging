<?php

namespace App\Service;
class View
{

    private \Smarty $smarty;

    private string $template;

    public function __construct()
    {
        $this->smarty = new \Smarty();
        $path = $this->navigate();
        $this->smarty->setTemplateDir($path . '/templates');
        $this->smarty->setCompileDir($path . '/templates_c');
        $this->smarty->setCacheDir($path . '/cache');
        $this->smarty->setConfigDir($path . '/configs');


    }

    public function addTemplate(string $template)
    {
        $this->template = $template;

    }

    public function navigate(): string
    {
        return dirname(__DIR__, 2);
    }

    public function addTlpParam(string $id, $value)
    {
        //$this->smarty->assign($id, $value);
        //$this->smarty->assign('name', 'Renégade');
    }

    public function display()
    {
        try {
            $this->smarty->display($this->template);
        } catch (\SmartyException $e) {
        } catch (\Exception $e) {
        }
    }

}