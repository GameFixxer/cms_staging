<?php

declare(strict_types=1);

namespace App\Service;

class View
{
    private \Smarty $smarty;

    private string $template;

    public function __construct()
    {
        $this->smarty = new \Smarty();
        $path = $this->navigate();
        $this->smarty->setTemplateDir($path.'/templates/dist');
        $this->smarty->setCompileDir($path.'/templates_c');
        $this->smarty->setCacheDir($path.'/cache');
        $this->smarty->setConfigDir($path.'/configs');
        $this->template = '';
    }

    public function addTemplate(string $template): void
    {
        $this->template = $template;
    }

    public function navigate(): string
    {
        return dirname(__DIR__, 2);
    }

    public function getAllParams(): array
    {
        return $this->smarty->tpl_vars;
    }
    public function getParam(string $name)
    {
        $vars =$this->smarty->tpl_vars;
        if (isset($vars[$name])) {
            return $vars[$name];
        }
        return null;
    }
    public function addTlpParam(string $name, $value): void
    {
        $this->smarty->assign($name, $value);
    }

    public function display(): void
    {
        $this->smarty->display($this->template);
    }
}
