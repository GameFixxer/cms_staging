<?php


namespace App\Frontend\ShoppingCard\Business;

use App\Client\Product\Persistence\Entity\Product;
use App\Client\ShoppingCard\Business\ShoppingCardBusinessFacadeInterface;
use App\Generated\Dto\ShoppingCardDataTransferObject;

class ShoppingCardManager implements ShoppingCardManagerInterface
{
    private ShoppingCardBusinessFacadeInterface $shoppingCardBusinessFacade;

    public function __construct(ShoppingCardBusinessFacadeInterface $productBusinessFacade)
    {
        $this->shoppingCardBusinessFacade = $productBusinessFacade;
    }

    public function delete(ShoppingCardDataTransferObject $shoppingCardDataTransferObject): void
    {
        if ($this->shoppingCardBusinessFacade->get($shoppingCardDataTransferObject->getUser()) instanceof ShoppingCardDataTransferObject) {
            $this->shoppingCardBusinessFacade->delete($shoppingCardDataTransferObject);
        }
    }

    public function save(ShoppingCardDataTransferObject $shoppingCardDataTransferObject): void
    {
        $productDTO = $this->shoppingCardBusinessFacade->get($shoppingCardDataTransferObject->getUser()());
        if (!$productDTO instanceof ShoppingCardDataTransferObject) {
            $shoppingCardDataTransferObject->getUser()((string)rand(1, 2229));
        }
        $this->shoppingCardBusinessFacade->save($shoppingCardDataTransferObject);
    }
}
