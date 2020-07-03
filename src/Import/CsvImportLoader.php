<?php
declare(strict_types=1);

namespace App\Import;

use League\Csv\Reader;

class CsvImportLoader implements CsvImportLoaderInterface
{
    private array $header;

    public function mapCSVToDTO(string $path): array
    {
        $csvDTOList = [];

        $objects = $this->loadFromCSV($path);
        $mappingAssistant = new MappingAssistant();

        $headerList = $mappingAssistant->createMappingList($this->header);
        if (isset($headerList)) {
            foreach ($objects as $product) {
                $csvDTOList[] = $mappingAssistant->mapInputToDTO($headerList, $product);
            }
        }
        return $csvDTOList;
    }

    public function loadFromCSV(string $path): ?\Iterator
    {
        $fileFinder = new  FileManager();
        $finder = $fileFinder->getFiles($path);
        $productList = null;
        foreach ($finder as $file) {
            $csv = Reader::createFromPath($file->getPathname());
            $csv->setHeaderOffset(0);
            $this->header = $csv->getHeader();
            $productList = $csv->getRecords();
            $fileFinder->moveImportedFilesToDumper($file);
        }
        return $productList;
    }

    public function getHeader()
    {
        return $this->header;
    }
}