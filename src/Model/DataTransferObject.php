<?php

namespace App\Model;

use \App\Model\DataRepository;

class DataTransferObject
{
    public function __construct(DataRepository $dr, int $id, bool $list)
    {
        if($list===true){
            $this->productlist=$dr->list;
        }
        else {
            $this->id = (int)$dr->list[$id]->id;
            $this->name = (string)$dr->list[$id]->productname;
            $this->description = (string)$dr->list[$id]->description;
        }
    }
    public function getProductList(){
        return $this->productlist;
    }
    public function getProductId():string
    {
        return $this->id;
    }

    public function getProductName():string
    {
        return $this->name;
    }

    public function getProductDescription():string
    {
        return $this->description;
    }
}