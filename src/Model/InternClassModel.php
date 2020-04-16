<?php


namespace App\Model;


class InternClassModel
{
    private array $listarray;
    public function __construct()
    {
        $this->listarray = array();


    }
    public function createListOfController()
    {
        $path = dirname(__DIR__, 2) . '/src/Controller';

        if (is_dir($path)) {
            if ($handle = opendir($path)) {
                while (($file = readdir($handle)) !== false) {

                    {
                        if ($file !== 'Controller.php') {

                        $this->listarray[] = str_replace('Controll.php', '', (string)$file);
                    }

                    }


                }
                closedir($handle);
            }
        }
       // array_change_key_case($this->listarray, CASE_LOWER);
        return $this->listarray;

    }
}