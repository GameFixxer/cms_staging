<?php

declare(strict_types=1);

namespace App\Model;

use App\Service\SQLConnector;
use App\Model\Mapper\UserMapper;
use App\Model\Dto\UserDataTransferObject;

class UserRepository
{
    private array $userList;
    private SQLConnector $connector;
    private UserMapper $userMapper;

    public function __construct(SQLConnector $connector)
    {
        $this->connector = $connector;
        $this->userMapper = new UserMapper();
    }

    /**
     * @return UserDataTransferObject[]
     */
    public function getUserList(): array
    {
        $this->userList = [];

        $array = $this->makeArrayResult($this->connector->get('Select * from user', '', []));

        foreach ($array as $product) {
            $this->userList[(int)$product['id']] = $this->userMapper->map($product);
        }

        return $this->userList;
    }

    public function getUser(string $username, string $password): UserDataTransferObject
    {
        if (!$this->hasUser($username, $password)) {
            throw new \Exception('Error! Productid is ivalid.', 1);
        }

        return $this->userList[$username];
    }

    public function hasUser(string $username, string $passwort): bool
    {
        if (!isset($this->productList)) {
            $this->getUserList();
        }
        foreach ($this->userList as $user) {
            if ($user->getUsername() === $username && $user->getUserPassword() === $passwort) {
                return true;
            }
        }

        return false;
    }

    private function makeArrayResult(object $resultobj): array
    {
        $result = [];
        if ($resultobj->num_rows > 0) {
            while ($line = $resultobj->fetch_array()) {
                $result[] = $line;
            }
        }

        return $result;
    }
}
