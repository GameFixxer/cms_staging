<?php
declare(strict_types=1);

namespace App\Service\File\Model;

use Symfony\Component\Filesystem\Filesystem;

class Move implements MoveInterface
{
    private Filesystem $fileSystem;

    public function __construct(Filesystem $filesystem)
    {
        $this->fileSystem = $filesystem;
    }
    public function move(\SplFileInfo $file):void
    {
        $this->fileSystem->copy(
            '/../'.$file->getPath().'/'.$file->getFilename(),
            $file->getPath().'/../dumper/'.$file->getFilename()
        );
        $this->fileSystem->remove('/../'.$file->getPath().'/'.$file->getFilename());
    }
}
