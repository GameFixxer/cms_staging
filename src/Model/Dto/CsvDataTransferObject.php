<?php


namespace App\Model\Dto;

class CsvDataTransferObject
{
    private ProductDataTransferObject $productDTO;
    private UserDataTransferObject $userDTO;
    private CategoryDataTransferObject $categoryDTO;

    public function getProduct():?ProductDataTransferObject
    {
        if (isset($this->productDTO)) {
            return $this->productDTO;
        }
        return null;
    }
    public function setProduct(ProductDataTransferObject $product):void
    {
        $this->productDTO = $product;
    }
    public function getUser():?UserDataTransferObject
    {
        if (isset($this->userDTO)) {
            return $this->userDTO;
        }
        return null;
    }
    public function setUser(UserDataTransferObject $user):void
    {
        $this->userDTO = $user;
    }
    public function getCategory():?CategoryDataTransferObject
    {
        if (isset($this->categoryDTO)) {
            return $this->categoryDTO;
        }
        return null;
    }
    public function setCategory(CategoryDataTransferObject $category):void
    {
        $this->categoryDTO = $category;
    }
}
