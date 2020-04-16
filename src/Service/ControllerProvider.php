<?php
declare(strict_types=1);

namespace App\Service;

use App\Controller\DetailControll;
use App\Controller\ErrorControll;
use App\Controller\HomeControll;
use App\Controller\ListControll;

class ControllerProvider
{
    private array $list;// = array();
    public function __construct()
    {
        $this->createListOfController();
    }

    public function createListOfController(): void
    {
        /*           $list[] = array([DetailControll::class]['detail']);
                    $this->list[] = array([ErrorControll::class]['error']);
                    $this->list[] = array([HomeControll::class]['home']);
                    $this->list[] = array([ListControll::class]['list']);
                    return $this->list;
            */
        $this->list = array(
            (0) => Array
            (
                ('class') => DetailControll::class,
                ('code') => 'detail',
            ),

            (1) => Array
            (
                ('class') => ErrorControll::class,
                ('code') => 'error',
            ),

            (2) => Array
            (
                ('class') => HomeControll::class,
                ('code') => 'home',
            ),
            (2) => Array
            (
                ('class') => ListControll::class,
                ('code') => 'list',
            )
        );
    }

    public function returnList(): array
    {
        return $this->list;
    }

    public function inArrayMultidimension(string $needle, string $column): bool
    {
        if(in_array($needle, array_column($this->list, $column))) {
            return true;

        }
        else {
            return false;

        }
    }

    public function getKeyInMultiArray(string $needle, string $column)
    {
        return array_search($needle, array_column($this->list, $column));
    }

    public function returnObject(int $key)
    {
        return $this->list[$key]('class');
    }
}