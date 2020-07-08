<?php
declare(strict_types=1);

namespace App\Service\File\Model;

use Symfony\Component\Finder\Finder;

class Get implements GetInterface
{
    private Finder $finder;

    public function __construct(Finder $finder)
    {
        $this->finder = $finder;
    }

    public function get(string $path):Finder
    {
        return $this->finder->files()->name('*.csv')->in($path);
    }
}
