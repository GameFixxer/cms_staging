<?php

declare(strict_types=1);
namespace App\Backend\ImportComponent\Loader;

interface CsvImportLoaderInterface
{
    public function mapCSVToDTO(string $path): array;

    public function loadFromCSV(string $path): ?\Iterator;

    public function getHeader();
}