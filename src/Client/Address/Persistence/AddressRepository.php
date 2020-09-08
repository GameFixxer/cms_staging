<?php
declare(strict_types=1);

namespace App\Client\Address\Persistence;

use App\Client\Address\Persistence\Entity\Address;
use App\Client\Address\Persistence\Mapper\AddressMapperInterface;
use App\Client\User\Persistence\Entity\User;
use App\Generated\AddressDataProvider;
use App\Generated\UserDataProvider;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class AddressRepository implements AddressRepositoryInterface
{
    private AddressMapperInterface $addressMapper;
    private EntityRepository $entityRepository;

    public function __construct(AddressMapperInterface $addressMapper, EntityManager $entityManager)
    {
        $this->addressMapper = $addressMapper;
        $this->entityRepository = $entityManager->getRepository(Address::class);
    }

    /**
     * @return AddressDataProvider[]
     */
    public function getAddressList(): array
    {
        $addressList = [];

        $addressEntityList = (array)$this->entityRepository->findAll();
        /** @var  Address $address */
        foreach ($addressEntityList as $address) {
            $addressList[] = $this->addressMapper->map($address);
        }

        return $addressList;
    }

    public function getAddress(UserDataProvider $user, string $type, int $postcode): ?AddressDataProvider
    {
        $addressEntity = $this->entityRepository->findBy([
            'user_id' => $user->getId(),
            'type' => $type,
            'post_code' => $postcode
        ]);
        if (isset($addressEntity)) {
            return $this->addressMapper->map($addressEntity[0]);
        }
        return null;
    }

    public function getAddressListFromUser(int $userId):array
    {
        $addressList = [];
        $userAddressEntityList = $this->entityRepository->createQueryBuilder('userAddress')
            ->select()
            ->where('user_id', $userId)
            ->getQuery()
            ->getResult();
        foreach ($userAddressEntityList as $address) {
            $addressList[] = $this->addressMapper->map($address);
        }

        return $addressList;
    }
}
