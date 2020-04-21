<?php
declare(strict_types=1);

namespace App\Model;

use http\Exception\InvalidArgumentException;

class DataRepository
{
    public array $list;
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
}