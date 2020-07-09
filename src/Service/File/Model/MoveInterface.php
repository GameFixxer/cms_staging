<?php
declare(strict_types=1);
namespace App\Service\File\Model;

interface MoveInterface
{
    public function move(\SplFileInfo $file): void;
}