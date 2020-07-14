<?php
declare(strict_types=1);
namespace App\Component;

use Symfony\Component\Config\ConfigCache;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class SymfonyContainer
{
    public function getContainer()
    {
        $isDebug =true;
        $file = __DIR__.'/cache-container.php';
        $containerConfigCache = new ConfigCache($file, $isDebug);

        if (!$containerConfigCache->isFresh()) {
            $containerBuilder = new ContainerBuilder();
            $loader = new XmlFileLoader($containerBuilder, new FileLocator(__DIR__));
            $loader->load('/home/rene/PhpstormProjects/MVC/src/Component/DependencyContainer.xml');
            $containerBuilder->compile();
            $dumper = new PhpDumper($containerBuilder);
            $containerConfigCache->write(
                (string)
                $dumper->dump(['class'=>'MyCachedContainer']),
                $containerBuilder->getResources()
            );
        }
        require_once $file;
        $container = new \MyCachedContainer();

        return $container;
    }
}
