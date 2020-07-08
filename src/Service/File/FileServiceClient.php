<?php
declare(strict_types=1);

namespace App\Service\File;

use App\Service\Container;
use App\Service\File\Model\GetInterface;
use App\Service\File\Model\MoveInterface;
use Symfony\Component\Finder\Finder;

class FileServiceClient implements FileServiceClientInterface
{
    private GetInterface $getFiles;
    private MoveInterface $moveFiles;

    public function __construct(GetInterface $getFiles, MoveInterface $moveFiles)
    {
        $this->getFiles = $getFiles;
        $this->moveFiles = $moveFiles;
    }

    public function get(string $path):Finder
    {
        return $this->getFiles->get($path);
    }
    public function move(\SplFileInfo $file):void
    {
        $this->moveFiles->move($file);
    }
}
