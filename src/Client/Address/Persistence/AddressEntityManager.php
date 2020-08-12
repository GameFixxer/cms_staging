<?php
declare(strict_types=1);

namespace App\Client\Address\Persistence;

use App\Client\Address\Persistence\Entity\Address;
use App\Generated\AddressDataProvider;
use Cycle\ORM\ORM;
use Cycle\ORM\Transaction;

class AddressEntityManager implements AddressEntityManagerInterface
{
    /**
     * @var AddressRepository
     */
    private AddressRepository $addressRepository;
    private \Cycle\ORM\RepositoryInterface $repository;

    private ORM $orm;

    public function __construct(ORM $orm, AddressRepository $addressRepository)
    {
        $this->addressRepository = $addressRepository;
        $this->orm = $orm;
        $this->repository = $orm->getRepository(Address::class);
    }



    public function delete(AddressDataProvider $address):void
    {
        $transaction = new Transaction($this->orm);
        $transaction->delete($this->repository->findOne(['address_id'=>$address->getAddress_id()]));
        $transaction->run();

        $this->addressRepository->getAddressList();
    }

    public function save(AddressDataProvider $address): AddressDataProvider
    {
        $transaction = new Transaction($this->orm);


        $entity = $this->repository->findOne(['address_id'=>$address->getAddress_id()]);
        if (!$entity instanceof Address) {
            $entity = new Address();
        }
        $entity->setActive($address->getActive());
        $entity->setType($address->getType());
        $entity->setTown($address->getTown());
        $entity->setStreet($address->getStreet());
        $entity->setPostCode($address->getPostCode());
        $entity->setCountry($address->getCountry());
        $entity->setUser($address->getUser());
        $entity->setFirstName($address->getFirstName());
        $entity->setLastName($address->getLastName());


        $transaction->persist($entity);
        $transaction->run();
        $address->setAddress_id($entity->getAddressId());

        return $address;
    }
}