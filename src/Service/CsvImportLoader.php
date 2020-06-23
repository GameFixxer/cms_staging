<?php
declare(strict_types=1);

namespace App\Service;

use League\Csv\Reader;
use function PHPUnit\Framework\isEmpty;

class CsvImportLoader
{
    private array $header;

    public function mapCSVToDTO(string $path): array
    {
        $productList = [];

        $objects = $this->loadFromCSV($path);

        $mappingAssistant = new MappingAssistant();

        $headerList = $mappingAssistant->createMappingList($this->header);

        if (!isEmpty($headerList)) {
            foreach ($objects as $product) {
                $mappingAssistant->mapInputToDTO($headerList, $product);
            }
        }
        return $productList;
    }

    private function loadFromCSV(string $path) : ?\Iterator
    {
        $fileFinder = new  FileManager();
        $finder = $fileFinder->getFiles($path);
        $productList = null;
        foreach ($finder as $file) {
            $csv = Reader::createFromPath($file->getPathname());
            $csv->setHeaderOffset(0);
            $this->header= $csv->getHeader();
            $productList = $csv->getRecords();
            $fileFinder->moveImportedFilesToDumper($file);
        }
        return $productList;
    }
}
