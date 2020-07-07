<?php
declare(strict_types=1);
namespace App\Backend\ImportProduct\Business\Model\IntegrityManager;

use App\Model\Dto\CsvDataTransferObject;
use App\Model\Dto\DataTransferObjectInterface;

class ValueIntegrityManager implements ValueIntegrityManagerInterface
{
    public function checkValuesChanged(CsvDataTransferObject $csvDTO, DataTransferObjectInterface $dto):bool
    {
        foreach (get_class_methods($dto) as $action) {
            $getter = ''.$action;
            if (str_starts_with($getter, 'get')) {
                if ($csvDTO->$getter() !== $dto->$getter()) {
                    return true;
                }
            }
        }
        return false;
    }
}
