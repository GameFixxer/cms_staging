<?php
declare(strict_types=1);

namespace App\Model\Mapper;

use App\Model\Dto\CategoryDataTransferObject;
use App\Model\Dto\CsvDataTransferObject;
use App\Model\Entity\Category;
use App\Model\Entity\EntityInterface;
use App\Model\Entity\Product;
use App\Model\Entity\User;
use function Amp\call;

class CsvMapper
{
    public function map(EntityInterface $entity): CsvDataTransferObject
    {
        $csvDataTransferObject= new CsvDataTransferObject();
        switch ($entity) {
            case $entity instanceof Product:
                $csvDataTransferObject->setProduct($entity);
                break;
            case $entity instanceof User:
                $csvDataTransferObject->setUser($entity);
                break;
            case $entity instanceof Category:
                $csvDataTransferObject->setCategory($entity);
                break;
        }

        return $csvDataTransferObject;
    }
}
