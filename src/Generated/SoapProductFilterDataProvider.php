<?php
declare(strict_types=1);
namespace App\Generated;

/**
 * Auto generated data provider
 */
final class SoapProductFilterDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var string */
    protected $material;

    /** @var string */
    protected $modell;

    /** @var string */
    protected $frameGlassFocusNo;

    /** @var string */
    protected $frameServiceNumber;

    /** @var string */
    protected $tintNo;

    /** @var string */
    protected $antireflectionNo;

    /** @var string */
    protected $glass;

    /** @var string */
    protected $equipmentMaterialNumber;

    /** @var string */
    protected $contentText;


    /**
     * @return string
     */
    public function getMaterial(): string
    {
        return $this->material;
    }


    /**
     * @param string $material
     * @return SoapProductFilterDataProvider
     */
    public function setMaterial(string $material)
    {
        $this->material = $material;

        return $this;
    }


    /**
     * @return SoapProductFilterDataProvider
     */
    public function unsetMaterial()
    {
        $this->material = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasMaterial()
    {
        return ($this->material !== null && $this->material !== []);
    }


    /**
     * @return string
     */
    public function getModell(): string
    {
        return $this->modell;
    }


    /**
     * @param string $modell
     * @return SoapProductFilterDataProvider
     */
    public function setModell(string $modell)
    {
        $this->modell = $modell;

        return $this;
    }


    /**
     * @return SoapProductFilterDataProvider
     */
    public function unsetModell()
    {
        $this->modell = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasModell()
    {
        return ($this->modell !== null && $this->modell !== []);
    }


    /**
     * @return string
     */
    public function getFrameGlassFocusNo(): ?string
    {
        return $this->frameGlassFocusNo;
    }


    /**
     * @param string $frameGlassFocusNo
     * @return SoapProductFilterDataProvider
     */
    public function setFrameGlassFocusNo(?string $frameGlassFocusNo = null)
    {
        $this->frameGlassFocusNo = $frameGlassFocusNo;

        return $this;
    }


    /**
     * @return SoapProductFilterDataProvider
     */
    public function unsetFrameGlassFocusNo()
    {
        $this->frameGlassFocusNo = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasFrameGlassFocusNo()
    {
        return ($this->frameGlassFocusNo !== null && $this->frameGlassFocusNo !== []);
    }


    /**
     * @return string
     */
    public function getFrameServiceNumber(): ?string
    {
        return $this->frameServiceNumber;
    }


    /**
     * @param string $frameServiceNumber
     * @return SoapProductFilterDataProvider
     */
    public function setFrameServiceNumber(?string $frameServiceNumber = null)
    {
        $this->frameServiceNumber = $frameServiceNumber;

        return $this;
    }


    /**
     * @return SoapProductFilterDataProvider
     */
    public function unsetFrameServiceNumber()
    {
        $this->frameServiceNumber = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasFrameServiceNumber()
    {
        return ($this->frameServiceNumber !== null && $this->frameServiceNumber !== []);
    }


    /**
     * @return string
     */
    public function getTintNo(): ?string
    {
        return $this->tintNo;
    }


    /**
     * @param string $tintNo
     * @return SoapProductFilterDataProvider
     */
    public function setTintNo(?string $tintNo = null)
    {
        $this->tintNo = $tintNo;

        return $this;
    }


    /**
     * @return SoapProductFilterDataProvider
     */
    public function unsetTintNo()
    {
        $this->tintNo = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasTintNo()
    {
        return ($this->tintNo !== null && $this->tintNo !== []);
    }


    /**
     * @return string
     */
    public function getAntireflectionNo(): ?string
    {
        return $this->antireflectionNo;
    }


    /**
     * @param string $antireflectionNo
     * @return SoapProductFilterDataProvider
     */
    public function setAntireflectionNo(?string $antireflectionNo = null)
    {
        $this->antireflectionNo = $antireflectionNo;

        return $this;
    }


    /**
     * @return SoapProductFilterDataProvider
     */
    public function unsetAntireflectionNo()
    {
        $this->antireflectionNo = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasAntireflectionNo()
    {
        return ($this->antireflectionNo !== null && $this->antireflectionNo !== []);
    }


    /**
     * @return string
     */
    public function getGlass(): ?string
    {
        return $this->glass;
    }


    /**
     * @param string $glass
     * @return SoapProductFilterDataProvider
     */
    public function setGlass(?string $glass = null)
    {
        $this->glass = $glass;

        return $this;
    }


    /**
     * @return SoapProductFilterDataProvider
     */
    public function unsetGlass()
    {
        $this->glass = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasGlass()
    {
        return ($this->glass !== null && $this->glass !== []);
    }


    /**
     * @return string
     */
    public function getEquipmentMaterialNumber(): ?string
    {
        return $this->equipmentMaterialNumber;
    }


    /**
     * @param string $equipmentMaterialNumber
     * @return SoapProductFilterDataProvider
     */
    public function setEquipmentMaterialNumber(?string $equipmentMaterialNumber = null)
    {
        $this->equipmentMaterialNumber = $equipmentMaterialNumber;

        return $this;
    }


    /**
     * @return SoapProductFilterDataProvider
     */
    public function unsetEquipmentMaterialNumber()
    {
        $this->equipmentMaterialNumber = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasEquipmentMaterialNumber()
    {
        return ($this->equipmentMaterialNumber !== null && $this->equipmentMaterialNumber !== []);
    }


    /**
     * @return string
     */
    public function getContentText(): ?string
    {
        return $this->contentText;
    }


    /**
     * @param string $contentText
     * @return SoapProductFilterDataProvider
     */
    public function setContentText(?string $contentText = null)
    {
        $this->contentText = $contentText;

        return $this;
    }


    /**
     * @return SoapProductFilterDataProvider
     */
    public function unsetContentText()
    {
        $this->contentText = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasContentText()
    {
        return ($this->contentText !== null && $this->contentText !== []);
    }


    /**
     * @return array
     */
    protected function getElements(): array
    {
        return array (
          'material' =>
          array (
            'name' => 'material',
            'allownull' => false,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'modell' =>
          array (
            'name' => 'modell',
            'allownull' => false,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'frameGlassFocusNo' =>
          array (
            'name' => 'frameGlassFocusNo',
            'allownull' => true,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'frameServiceNumber' =>
          array (
            'name' => 'frameServiceNumber',
            'allownull' => true,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'tintNo' =>
          array (
            'name' => 'tintNo',
            'allownull' => true,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'antireflectionNo' =>
          array (
            'name' => 'antireflectionNo',
            'allownull' => true,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'glass' =>
          array (
            'name' => 'glass',
            'allownull' => true,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'equipmentMaterialNumber' =>
          array (
            'name' => 'equipmentMaterialNumber',
            'allownull' => true,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'contentText' =>
          array (
            'name' => 'contentText',
            'allownull' => true,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
        );
    }
}
