<?php
declare(strict_types=1);

namespace App\Client\Address\Persistence;

use App\Client\Address\Persistence\Entity\Address;
use App\Client\Address\Persistence\Mapper\AddressMapperInterface;
use App\Client\User\Persistence\Entity\User;
use App\Generated\AddressDataProvider;
use App\Generated\UserDataProvider;

class AddressRepository implements AddressRepositoryInterface
{
    private AddressMapperInterface $addressMapper;
    private \Cycle\ORM\RepositoryInterface $repository;

    public function __construct(AddressMapperInterface $addressMapper, \Cycle\ORM\ORM $ORM)
    {
        $this->addressMapper = $addressMapper;
        $this->repository = $ORM->getRepository(Address::class);
    }

    /**
     * @return AddressDataProvider[]
     */
    public function getAddressList(): array
    {
        $addressList = [];

        $addressEntityList = (array)$this->repository->select()->fetchALl();
        /** @var  Address $address */
        foreach ($addressEntityList as $address) {
            $addressList[] = $this->addressMapper->map($address);
        }

        return $addressList;
    }

    public function getAddress(UserDataProvider $user, string $type, bool $primary): ?AddressDataProvider
    {
        $addressEntity = $this->repository->findOne([
            'user_id' => $user->getId(),
            'type' => $type,
            'primary' => $primary
        ]);
        if ($addressEntity instanceof Address) {
            return $this->addressMapper->map($addressEntity);
        }
        return null;
    }

    public function getAddressListFromUser(int $userId):array
    {
        $addressList = [];
        $userAddressEntityList = $this->repository
            ->select()
            ->with('user')->where('user_id', $userId)
            ->fetchAll();
        foreach ($userAddressEntityList as $address) {
            $addressList[] = $this->addressMapper->map($address);
        }

        return $addressList;
    }
}
