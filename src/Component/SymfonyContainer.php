<?php
declare(strict_types=1);
namespace App\Component;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class SymfonyContainer
{
    public function __construct()
    {
        $containerBuilder = new ContainerBuilder();
        $loader = new XmlFileLoader($containerBuilder, new FileLocator(__DIR__));
        $loader->load('/home/rene/PhpstormProjects/MVC/src/Component/DependencyContainer.xml');
    }
}
