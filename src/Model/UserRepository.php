<?php

declare(strict_types=1);

namespace App\Model;

use App\Service\SQLConnector;
use App\Model\Mapper\UserMapper;
use App\Model\Dto\UserDataTransferObject;

class UserRepository
{
    private array $list;
    private SQLConnector $connect;
    private UserMapper $usermapper;

    public function __construct(SQLConnector $connector)
    {
        $this->connect = $connector;
        $this->usermapper = new UserMapper();
        $this->getFromDB('user');
    }

    private function getFromDB(string $data): void
    {
        $tmp = [];
        $this->list = [];
        if ($this->connect->connect('root', 'pass123')) {
            $array = $this->makeArrayResult($this->connect->get('Select * from '.$data, '', $tmp));
            if (!empty($array)) {
                foreach ($array as $product) {
                    $this->list[(int)$product['id']] = $this->usermapper->map($product);
                }
            } else {
                echo('Database is empty...');
            }
        } else {
            echo('Could not establish Connection with Database');
        }
    }

    private function makeArrayResult(object $resultobj): array
    {
        if ($resultobj->num_rows === 0) {
            return array();
        } else {
            $array = array();
            while ($line = $resultobj->fetch_array()) {
                $array[] = $line;
            }

            return $array;
        }
    }

    /**
     * @return UserDataTransferObject[]
     */
    public function getList(): array
    {
        $this->getFromDB('product');

        return $this->list;
    }

    public function getUser(string $username): UserDataTransferObject
    {
        if (!$this->hasUser($username)) {
            throw new \Exception('Error! Productid is ivalid.', 1);
            {
            }
        }

        return $this->list[$username];
    }

    public function hasUser(string $username): bool
    {
        return isset($this->list[$username]);
    }

}

