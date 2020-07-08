<?php

namespace App\Service\File\Model;

use Symfony\Component\Finder\Finder;

interface GetInterface
{
    public function get(string $path): Finder;
}