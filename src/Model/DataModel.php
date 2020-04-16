<?php
declare(strict_types=1);

namespace App\Model;
class DataModel
{
    private array $list;

    public function __construct()
    {
        $this->list = array();
        $this->createPageList();

    }

    public function createPageList()
    {
        $path = dirname(__DIR__, 2) . '/templates/';

        if (is_dir($path)) {
            if ($handle = opendir($path)) {
                while (($file = readdir($handle)) !== false) {

                    {
                        $this->list[] = str_replace('.tpl', '', (string)$file);
                        //$this->extractID($file);
                    }


                }
                closedir($handle);
            }
        }


    }


    public function createListOfIds()
    {
        $path = dirname(__DIR__, 2) . '/templates/';

    }

    public function pingListe(): array
    {
        return $this->list;
    }

    private function extractID(string $filename)
    {
        echo('Ausgabe der FilegetContent' . file_get_contents(dirname(__DIR__, 1) . '/templates/detail_1_.html'));
    }

}