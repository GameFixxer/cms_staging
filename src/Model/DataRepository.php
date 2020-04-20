<?php
declare(strict_types=1);

namespace App\Model;
class DataRepository
{
    private array $list;
    private string $path;

    public function __construct()
    {

        $url =  dirname(__DIR__, 2).'/database/data.json';
        $data = file_get_contents($url);
        $array = json_decode($data);
        foreach($array as $product){
          $this->list[$product->id] = $product;
        }
        var_dump($this->list);
    }



    public function getList(): array
    {
        return $this->list->product;
    }

    public function hasProduct(string $id): bool
    {
        $exists = false;
        //$tmp = json_encode($id);
        //return in_array($tmp, $this->list->id,false);
        foreach ($this->list as $entry) {
            if ($entry->id = $id) {
                $exists = true;
            }
        }
        return $exists;
    }




    public function getIndex(string $number): int
    {
        $tmp = 0;
        foreach ($this->list as $row) {
            echo($tmp);
            var_dump($this->list[$tmp]->id);
            if ((string)$this->list[$tmp]->id === $number) {
                $tmp = $this->list[$tmp]->id - 1;
                return $tmp;
            }
            ++$tmp;
        }

    }

    }