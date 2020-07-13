<?php


namespace App\Backend\ImportComponent\StringConverter;

class StringConverter implements StringConverterInterface
{
    private $attributes;
    private $lowerCamelCase;

    public function camelCaseToSnakeCase(string $propertyName)
    {
        $camelCasedName = preg_replace_callback('/(^|_|\.)+(.)/', function($match) {
            return ('.' === $match[1] ? '_' : '').strtoupper($match[2]);
        }, $propertyName);

        if ($this->lowerCamelCase) {
            $camelCasedName = lcfirst($camelCasedName);
        }

        if (null === $this->attributes || \in_array($camelCasedName, $this->attributes)) {
            return $camelCasedName;
        }

        return $propertyName;
    }
}
