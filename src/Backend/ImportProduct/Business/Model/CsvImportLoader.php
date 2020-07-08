<?php
declare(strict_types=1);

namespace App\Backend\ImportProduct\Business\Model;

use App\Service\Container;
use App\Service\File\FileServiceClientInterface;
use League\Csv\Reader;

class CsvImportLoader implements CsvImportLoaderInterface
{
    private array $header;
    private FileServiceClientInterface $fileServiceClient;

    public function __construct(FileServiceClientInterface $fileServiceClient)
    {
        $this->fileServiceClient = $fileServiceClient;
    }

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
        $finder = $this->fileServiceClient->get($path);
        $productList = null;
        foreach ($finder as $file) {
            $csv = Reader::createFromPath($file->getPathname());
            $csv->setHeaderOffset(0);
            $this->header = $csv->getHeader();
            $productList = $csv->getRecords();
            $this->fileServiceClient->move($file);
        }
        return $productList;
    }

    public function getHeader()
    {
        return $this->header;
    }
}
