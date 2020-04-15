<?php

namespace App\Model;
class DataModel
{
    private array $listarray;

    public function __construct()
    {
        $this->listarray = array();
        $this->createList();

    }

    public function createList()
    {
        $path = dirname(__DIR__, 2) . '/templates/';

        if (is_dir($path)) {
            if ($handle = opendir($path)) {
                while (($file = readdir($handle)) !== false) {

                    {
                        $this->listarray[] = str_replace('_.html', '', (string)$file);
                        //$this->extractID($file);
                    }


                }
                closedir($handle);
            }
        }


    }

    public function pingListe(): array
    {
        return $this->listarray;
    }

    private function extractID(string $filename)
    {
        echo('Ausgabe der FilegetContent' . file_get_contents(dirname(__DIR__, 1) . '/templates/detail_1_.html'));
    }

}