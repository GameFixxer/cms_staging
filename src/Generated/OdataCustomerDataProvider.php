<?php
declare(strict_types=1);
namespace App\Generated;

/**
 * Auto generated data provider
 */
final class OdataCustomerDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var bool */
    protected $C_x1ANx6d20413acf4d018 = false;

    /** @var string */
    protected $C_BpInternalId = '';

    /** @var string */
    protected $C_BpStatus = '';

    /** @var string */
    protected $C_RelCpWpaEmailUriContent = '';

    /** @var string */
    protected $T_BpFrmtdName = '';


    /**
     * @return bool
     */
    public function getC_x1ANx6d20413acf4d018(): bool
    {
        return $this->C_x1ANx6d20413acf4d018;
    }


    /**
     * @param bool $C_x1ANx6d20413acf4d018
     * @return OdataCustomerDataProvider
     */
    public function setC_x1ANx6d20413acf4d018(bool $C_x1ANx6d20413acf4d018 = false)
    {
        $this->C_x1ANx6d20413acf4d018 = $C_x1ANx6d20413acf4d018;

        return $this;
    }


    /**
     * @return OdataCustomerDataProvider
     */
    public function unsetC_x1ANx6d20413acf4d018()
    {
        $this->C_x1ANx6d20413acf4d018 = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasC_x1ANx6d20413acf4d018()
    {
        return ($this->C_x1ANx6d20413acf4d018 !== null && $this->C_x1ANx6d20413acf4d018 !== []);
    }


    /**
     * @return string
     */
    public function getC_BpInternalId(): string
    {
        return $this->C_BpInternalId;
    }


    /**
     * @param string $C_BpInternalId
     * @return OdataCustomerDataProvider
     */
    public function setC_BpInternalId(string $C_BpInternalId = '')
    {
        $this->C_BpInternalId = $C_BpInternalId;

        return $this;
    }


    /**
     * @return OdataCustomerDataProvider
     */
    public function unsetC_BpInternalId()
    {
        $this->C_BpInternalId = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasC_BpInternalId()
    {
        return ($this->C_BpInternalId !== null && $this->C_BpInternalId !== []);
    }


    /**
     * @return string
     */
    public function getC_BpStatus(): string
    {
        return $this->C_BpStatus;
    }


    /**
     * @param string $C_BpStatus
     * @return OdataCustomerDataProvider
     */
    public function setC_BpStatus(string $C_BpStatus = '')
    {
        $this->C_BpStatus = $C_BpStatus;

        return $this;
    }


    /**
     * @return OdataCustomerDataProvider
     */
    public function unsetC_BpStatus()
    {
        $this->C_BpStatus = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasC_BpStatus()
    {
        return ($this->C_BpStatus !== null && $this->C_BpStatus !== []);
    }


    /**
     * @return string
     */
    public function getC_RelCpWpaEmailUriContent(): string
    {
        return $this->C_RelCpWpaEmailUriContent;
    }


    /**
     * @param string $C_RelCpWpaEmailUriContent
     * @return OdataCustomerDataProvider
     */
    public function setC_RelCpWpaEmailUriContent(string $C_RelCpWpaEmailUriContent = '')
    {
        $this->C_RelCpWpaEmailUriContent = $C_RelCpWpaEmailUriContent;

        return $this;
    }


    /**
     * @return OdataCustomerDataProvider
     */
    public function unsetC_RelCpWpaEmailUriContent()
    {
        $this->C_RelCpWpaEmailUriContent = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasC_RelCpWpaEmailUriContent()
    {
        return ($this->C_RelCpWpaEmailUriContent !== null && $this->C_RelCpWpaEmailUriContent !== []);
    }


    /**
     * @return string
     */
    public function getT_BpFrmtdName(): string
    {
        return $this->T_BpFrmtdName;
    }


    /**
     * @param string $T_BpFrmtdName
     * @return OdataCustomerDataProvider
     */
    public function setT_BpFrmtdName(string $T_BpFrmtdName = '')
    {
        $this->T_BpFrmtdName = $T_BpFrmtdName;

        return $this;
    }


    /**
     * @return OdataCustomerDataProvider
     */
    public function unsetT_BpFrmtdName()
    {
        $this->T_BpFrmtdName = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasT_BpFrmtdName()
    {
        return ($this->T_BpFrmtdName !== null && $this->T_BpFrmtdName !== []);
    }


    /**
     * @return array
     */
    protected function getElements(): array
    {
        return array (
          'C_x1ANx6d20413acf4d018' =>
          array (
            'name' => 'C_x1ANx6d20413acf4d018',
            'allownull' => false,
            'default' => 'false',
            'type' => 'bool',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'C_BpInternalId' =>
          array (
            'name' => 'C_BpInternalId',
            'allownull' => false,
            'default' => '\'\'',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'C_BpStatus' =>
          array (
            'name' => 'C_BpStatus',
            'allownull' => false,
            'default' => '\'\'',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'C_RelCpWpaEmailUriContent' =>
          array (
            'name' => 'C_RelCpWpaEmailUriContent',
            'allownull' => false,
            'default' => '\'\'',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'T_BpFrmtdName' =>
          array (
            'name' => 'T_BpFrmtdName',
            'allownull' => false,
            'default' => '\'\'',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
        );
    }
}
