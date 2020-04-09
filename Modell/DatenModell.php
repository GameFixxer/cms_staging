<?php

class DatenModell
{
    private array $listarray;

    public function __construct()
    {
        $this->listarray = array();
        $this->createList();

    }

    public function createList()
    {
        $path = 'Pages/';

        if (is_dir($path)) {
            if ($handle = opendir($path)) {
                while (($file = readdir($handle)) !== false) {

                    {
                        $this->listarray[] = str_replace('_.html', '', (String)$file);
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
    }

}