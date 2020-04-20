<?php
declare(strict_types=1);

namespace App\Model;
class DataModel
{
    private array $list;
    private string $path;

    public function __construct()
    {
        $this->navigate();
        $url = $this->path . '/database/data.json';
        $data = file_get_contents($url);
        $this->list = json_decode($data);
    }

    public function navigate(): void
    {
        $this->path = dirname(__DIR__, 2);

    }

    public function returnList(): array
    {
        return $this->list;
    }

    public function existId(string $id): bool
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

    public function getProduct(int $index): string
    {
        return $this->list[$index]->productname;
    }

    public function getDescription(int $index): string
    {
        return $this->list[$index]->description;
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

    public function getListofIds():array
    {
        $counter = 0;
        $ids = array();
        foreach ($this->list as $row) {
            $ids [] = $this->list[$counter]->id;
            $counter++;
        }
        var_dump($ids);
        return $ids;
   }

    public function getListofNames():array
    {
        $counter = 0;
        $names = array();
        foreach ($this->list as $row) {
            $names [] = $this->list[$counter]->productnames;
            $counter++;
        }
        return $names;
    }
}