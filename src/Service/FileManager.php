<?php
declare(strict_types=1);

namespace App\Service;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

class FileManager
{
    public function getFiles(string $path):Finder
    {
        $finder = new Finder();
        return $finder->files()->name('*.csv')->in($path);
    }

    public function moveImportedFilesToDumper(\SplFileInfo $file):void
    {
        $filesystem = new Filesystem();
        $filesystem->copy(
            '/../'.$file->getPath().'/'.$file->getFilename(),
            $file->getPath().'/../dumper/'.$file->getFilename()
        );
        $filesystem->remove('/../'.$file->getPath().'/'.$file->getFilename());
    }
}
