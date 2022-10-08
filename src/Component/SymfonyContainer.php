<?php declare(strict_types=1);

namespace App\Component;

use Symfony\Component\Config\ConfigCache;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Finder\Finder;

class SymfonyContainer
{
    public function getContainer()
    {
        $isDebug = true;
        $file = __DIR__.'/cache-container.php';
        $containerConfigCache = new ConfigCache($file, $isDebug);

        if (!$containerConfigCache->isFresh()) {
            $containerBuilder = new ContainerBuilder();
            $loader = new XmlFileLoader($containerBuilder, new FileLocator(__DIR__));
            $finder = (new Finder())->files()->name('*.xml')->in(__DIR__.'/ContainerFiles/');
            foreach ($finder as $file) {
                $loader->load($file);


            }
            $containerBuilder->compile();
            $dumper = new PhpDumper($containerBuilder);
            $containerConfigCache->write(
                (string)
                $dumper->dump(['class'=>'MyCachedContainer']),
                $containerBuilder->getResources()
            );
            return $containerBuilder;
        }
        require_once $file;
        $container = new \MyCachedContainer();

        return $container;
    }
}
