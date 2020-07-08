<?php
declare(strict_types=1);
namespace App\Service\File\Model;

use Symfony\Component\Finder\Finder;

interface GetInterface
{
    public function get(string $path): Finder;
}