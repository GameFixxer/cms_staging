<?php
namespace App\Service;

use PhpParser\Node\Expr\Cast\Object_;

class Container
{
    private array $classes = [];
    private array $classesUse =[];

    public function set($id, object $class): void
    {
        $this->classes[$id] = $class;
    }
    public function get($id)
    {
        if ((isset($this->classesUses[$id]))) {
            return$this->classesUse[$id];
        }
        if (!isset($this->classes[$id])) {
            throw new \Exception('Error! ClassID is invalid.', 1);
        }
        $class = $this->classes[$id];
        if (is_callable($class)) {
            $this->classes[$id]=$class();
        }
        return $this->classes[$id];
    }

    public function setFactory($id, callable $fnc): void
    {
        $object = $fnc();
        $this->set($id, $object);
    }
}
