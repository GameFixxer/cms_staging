<?php

namespace App\Model;

use App\Service\SQLConnector;

class ProductEntityManager
{
    private SQLConnector $connect;

    private function encodeArray(array $params): string
    {
        $tmp = '';
        foreach ($params as $key) {
            switch ($key) {
                case is_int(gettype($key)):
                    $tmp .= 'i';
                    break;
                case is_string(gettype($key)):
                    $tmp .= 's';
                    break;
                case is_float(gettype($key)):
                    $tmp .= 'd';
                    break;
            }
        }

        return $tmp;
    }
    public function setToDB(string $sql, array $data): void
    {
        if ($this->connect->connect('root', 'pass123')) {
            $this->connect->set($sql, $this->encodeArray($data), $data);
        } else {
            echo('Could not establish Connection with Database');
        }
    }
}
