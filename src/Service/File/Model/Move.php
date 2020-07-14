<?php
declare(strict_types=1);

namespace App\Service\File\Model;

use Symfony\Component\Filesystem\Filesystem;

class Move implements MoveInterface
{
    public function move(\SplFileInfo $file):void
    {
        $fileSystem = new Filesystem();
        $fileSystem->copy(
            '/../'.$file->getPath().'/'.$file->getFilename(),
            $file->getPath().'/../dumper/'.$file->getFilename()
        );
        $fileSystem->remove('/../'.$file->getPath().'/'.$file->getFilename());
    }
}
