<?php
declare(strict_types=1);

namespace App\Backend\ImportComponent;

use App\Component\Container;
use App\Generated\Dto\DataTransferObjectInterface;

class ImportFilterProvider
{
    private Container $container;
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function getAllFilterList()
    {
    }

    public function getProductFilterList(DataTransferObjectInterface $importDTO)
    {
       return[
           'Key',
           'articleNumber',
           'description'
       ];
    }

    public function getCategoryFilterList()
    {
        return [
            'Key'
        ];
    }
}
