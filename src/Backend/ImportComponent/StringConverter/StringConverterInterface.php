<?php

namespace App\Backend\ImportComponent\StringConverter;

interface StringConverterInterface
{
    public function camelCaseToSnakeCase(string $propertyName);
}