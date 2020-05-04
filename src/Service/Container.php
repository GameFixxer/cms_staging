<?php
namespace App\Service;
class Container
{
    private array $classes = [];

    public function set($id, object $class)
    {
        $this->classes[$id] = $class;
    }
    public function get($id)
    {
        if ((!isset($this->classes[$id]))) {
            throw new \Exception('Error! ClassID is ivalid.', 1);
        }
        return $this->classes[$id];
    }
}
