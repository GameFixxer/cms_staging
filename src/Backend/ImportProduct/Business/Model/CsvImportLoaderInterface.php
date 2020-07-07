<?php

namespace App\Backend\ImportProduct\Business\Model;

interface CsvImportLoaderInterface
{
    public function mapCSVToDTO(string $path): array;

    public function loadFromCSV(string $path): ?\Iterator;

    public function getHeader();
}