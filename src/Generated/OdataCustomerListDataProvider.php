<?php
declare(strict_types=1);
namespace App\Generated;

/**
 * Auto generated data provider
 */
final class OdataCustomerListDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var \App\Generated\OdataCustomerDataProvider[] */
    protected $OdataCustomers = [];


    /**
     * @return \App\Generated\OdataCustomerDataProvider[]
     */
    public function getOdataCustomers(): array
    {
        return $this->OdataCustomers;
    }


    /**
     * @param \App\Generated\OdataCustomerDataProvider[] $OdataCustomers
     * @return OdataCustomerListDataProvider
     */
    public function setOdataCustomers(array $OdataCustomers)
    {
        $this->OdataCustomers = $OdataCustomers;

        return $this;
    }


    /**
     * @return OdataCustomerListDataProvider
     */
    public function unsetOdataCustomers()
    {
        $this->OdataCustomers = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasOdataCustomers()
    {
        return ($this->OdataCustomers !== null && $this->OdataCustomers !== []);
    }


    /**
     * @param \App\Generated\OdataCustomerDataProvider $OdataCustomer
     * @return OdataCustomerListDataProvider
     */
    public function addOdataCustomer(OdataCustomerDataProvider $OdataCustomer)
    {
        $this->OdataCustomers[] = $OdataCustomer; return $this;
    }


    /**
     * @return array
     */
    protected function getElements(): array
    {
        return array (
          'OdataCustomers' =>
          array (
            'name' => 'OdataCustomers',
            'allownull' => false,
            'default' => '',
            'type' => '\\App\\Generated\\OdataCustomerDataProvider[]',
            'is_collection' => true,
            'is_dataprovider' => false,
            'isCamelCase' => false,
            'singleton' => 'OdataCustomer',
            'singleton_type' => '\\App\\Generated\\OdataCustomerDataProvider',
          ),
        );
    }
}
