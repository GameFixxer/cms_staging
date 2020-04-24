<?php
declare(strict_types=1);

namespace App\Service;


Class SQLConnector
{
    private \mysqli $db_link;

    public function __construct()
    {

    }

    public function __destruct()
    {
        $this->db_link->close();
    }

    public function connect(): void
    {
        $this->db_link = new \mysqli('127.0.01:3336', 'root', 'pass123', 'mvc');
        $this->db_link->set_charset('utf8');
        if ($this->db_link->connect_errno) {
            echo "Failed to connect to MySQL: (" . $this->db_link->connect_errno . ") " . $this->db_link->connect_error;
        }
    }

    public function findProduct(int $id, string $table, string $selection)
    {
        return $this->db_link->query('SELECT ' . $id . ' FROM ' . $table . ' ' . $selection);
    }

    public function findAll(string $table)
    {
        return $this->db_link->query('SELECT * FROM ' . $table);


    }

}