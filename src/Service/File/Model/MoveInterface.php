<?php

namespace App\Service\File\Model;

interface MoveInterface
{
    public function move(\SplFileInfo $file): void;
}