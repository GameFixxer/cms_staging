<?php

declare(strict_types=1);

namespace App\Component;

use App\Frontend\Controller;

class View
{
    private \Smarty $smarty;

    private string $template;

    private ?string $redirection;

    private array $params;

    private ?string $paramName;

    public function __construct()
    {
        $this->smarty = new \Smarty();
        $path = $this->navigate();
        $this->smarty->setTemplateDir($path.'/templates/dist');
        $this->smarty->setCompileDir($path.'/templates_c');
        $this->smarty->setCacheDir($path.'/cache');
        $this->smarty->setConfigDir($path.'/config');
        $this->template = '';
        $this->params = [];
        $this->redirection = null;
        $this->paramName = null;
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
    public function getParam()
    {
        return $this->params;
    }
    public function addTlpParam(string $name, $value): void
    {
        $this->params = [$name => $value];
        $this->smarty->assign($name, $value);
    }

    public function setRedirect(string $controllerRoute, string $action, array $params):void // string $redirection):void
    {
        $this->redirection = $controllerRoute.$action;
        if (!empty($params)) {
            foreach ($params as $singleParam) {
                $this->redirection = $this->redirection.'&'.$singleParam;
            }
        }
    }
    public function getRedirect(): ?string
    {
        return $this->redirection;
    }
    public function redirect():void
    {
        header("Location: http://localhost:8080/Index.php?cl=".$this->redirection);
    }

    public function display(): void
    {
        $this->smarty->display($this->template);
    }
}
