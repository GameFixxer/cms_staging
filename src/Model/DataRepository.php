<?php
declare(strict_types=1);

namespace App\Model;

use http\Exception\InvalidArgumentException;

class DataRepository
{
    private array $list;
    private string $path;

    public function __construct()
    {

        $url = dirname(__DIR__, 2) . '/database/data.json';
        $data = file_get_contents($url);
        $array = json_decode($data);
        foreach ($array as $product) {
            $this->list[(int)$product->id] = $product;
        }
    }


    public function getList(): array
    {
        return $this->list;
    }

    public function getProduct(int $index): object
    {
        return $this->list[$index];
    }

    public function hasProduct(int $id): bool
    {
        $exists = false;
        try {
            if ($this->list[$id] !== null) {
                $exists = true;
            }
        } catch (\Exception $exception) {
            return $exists;
        }
        return $exists;
    }

}