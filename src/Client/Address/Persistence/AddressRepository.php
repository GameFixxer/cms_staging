<?php
declare(strict_types=1);

namespace App\Client\Address\Persistence;

use App\Client\Address\Persistence\Entity\Address;
use App\Client\Address\Persistence\Mapper\AddressMapperInterface;
use App\Client\User\Persistence\Entity\User;
use App\Generated\Dto\AddressDataTransferObject;

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
     * @return AddressDataTransferObject[]
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

    public function getAddress(User $user, string $type, bool $primary): ?AddressDataTransferObject
    {
        $addressEntity = $this->repository->findOne([
            'user' => $user,
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
