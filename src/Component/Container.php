<?php
declare(strict_types=1);
namespace App\Component;


class Container
{
    private array $classes = [];
    private array $classesUse = [];

    public function set($id, object $class): void
    {
        $this->classes[$id] = $class;
    }
    public function get($id)
    {
        if ((isset($this->classesUse[$id]))) {
            return$this->classesUse[$id];
        }
        if (!isset($this->classes[$id])) {
            throw new \Exception('Error! ClassID is invalid.', 1);
        }
        $class = $this->classes[$id];
        if (is_callable($class)) {
            $this->classes[$id] = $class();
        }
        return $this->classes[$id];
    }

    public function setFactory($id, callable $fnc): void
    {
        $object = $fnc($this);
        $this->set($id, $object);
    }
}
