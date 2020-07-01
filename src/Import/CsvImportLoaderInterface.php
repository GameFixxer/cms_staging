<?php

namespace App\Import;

interface CsvImportLoaderInterface
{
    public function mapCSVToDTO(string $path): array;

    public function loadFromCSV(string $path): ?\Iterator;

    public function getHeader();
}