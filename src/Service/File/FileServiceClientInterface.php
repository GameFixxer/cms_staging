<?php
declare(strict_types=1);
namespace App\Service\File;

use Symfony\Component\Finder\Finder;

interface FileServiceClientInterface
{
    public function get(string $path): Finder;

    public function move(\SplFileInfo $file): void;
}