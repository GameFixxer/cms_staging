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
     * @var AddressRepositoryInterface
     */
    private AddressRepositoryInterface $addressRepository;
    private \Cycle\ORM\RepositoryInterface $repository;
    private \Spiral\Database\DatabaseInterface $database;

    private ORM $orm;

    public function __construct(ORM $orm, AddressRepositoryInterface $addressRepository)
    {
        $this->addressRepository = $addressRepository;
        $this->orm = $orm;
        $this->repository = $orm->getRepository(Address::class);
        $this->database = $orm->getSource(Address::class)->getDatabase();
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
        $entity = $this->repository->findOne(['address_id'=>$address->getAddress_id()]);
        $values = [
            'town'         => $address->getTown(),
            'country'         => $address->getCountry(),
            'street'         => $address->getStreet(),
            'post_code'        => $address->getPostCode(),
            'first_name'        => $address->getFirstName(),
            'last_name'      =>$address->getLastName(),
            'user_id'      =>$address->getUser()->getId(),
            'type'      =>$address->getType()
        ];

        if (!$entity instanceof Address) {
            $transaction= $this->database->insert('address')->values($values);
        } else {
            $values ['address_id'] =  $entity->getId();
            $transaction = $this->database->update('address')->values($values)->where('address_id', '=', $entity->getId());
        }

        $transaction->run();

        $address = $this->addressRepository->getAddress($address->getUser(), $address->getType(), $address->getPostcode());

        if (!$address instanceof AddressDataProvider) {
            throw new \Exception('Critical RepositoryError', 1);
        }

        return $address;
    }
}
