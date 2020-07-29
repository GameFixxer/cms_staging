<?php


namespace App\Frontend\ShoppingCard\Business;

use App\Client\Product\Persistence\Entity\Product;
use App\Client\ShoppingCard\Business\ShoppingCardBusinessFacadeInterface;
use App\Client\User\Persistence\Entity\User;
use App\Generated\Dto\ShoppingCardDataTransferObject;

class ShoppingCardManager implements ShoppingCardManagerInterface
{
    private ShoppingCardBusinessFacadeInterface $shoppingCardBusinessFacade;
    private \Cycle\ORM\RepositoryInterface $userRepository;
    private \Cycle\ORM\RepositoryInterface $productRepository;

    public function __construct(ShoppingCardBusinessFacadeInterface $productBusinessFacade, \Cycle\ORM\ORM $ormAttributeRepository)
    {
        $this->shoppingCardBusinessFacade = $productBusinessFacade;
        $this->userRepository = $ormAttributeRepository->getRepository(User::class);
        $this->productRepository = $ormAttributeRepository->getRepository(Product::class);
    }

    public function add(ShoppingCardDataTransferObject $shoppingCardDataTransferObject, string $articleNumber)
    {
        $productDTO = $this->getProduct($articleNumber);
        if (!$productDTO instanceof Product) {

        }
        $this->shoppingCardBusinessFacade->save($shoppingCardDataTransferObject);
    }

    public function remove(ShoppingCardDataTransferObject $shoppingCardDataTransferObject, string $articleNumber)
    {
        $productDTO = $this->getProduct($articleNumber);
        if (!$productDTO instanceof Product) {

        }
        $this->shoppingCardBusinessFacade->save($shoppingCardDataTransferObject);
    }


    public function getUser(string $username)
    {
        return $this->userRepository->findOne(['username'=>$username]);
    }
    private function getProduct(string $articleNumber)
    {
        return $this->userRepository->findOne(['article_number'=>$articleNumber]);
    }
}
