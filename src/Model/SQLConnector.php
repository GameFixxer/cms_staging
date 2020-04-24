<?php
declare(strict_types=1);

namespace App\Model;

use phpDocumentor\Reflection\Types\This;

Class SQLConnector
{
    private \mysqli $db_link;

    public function __construct()
    {
        error_reporting(E_ALL);
        $this->connect();
        $this->get();
    }

    public function connect(): void
    {
        $this->db_link = new \mysqli('127.0.01:3336', 'root', 'pass123', 'mvc');
        $this->db_link->set_charset('utf8');
        if ($this->db_link->connect_errno) {
            echo "Failed to connect to MySQL: (" . $this->db_link->connect_errno . ") " . $this->db_link->connect_error;
        }
    }

    public function post(): void
    {
        // Das ist ein POST Query Test
        if (!$this->db_link->query('USE mvc') ||
            !$this->db_link->query('DROP TABLE IF EXISTS test') ||
            !$this->db_link->query('CREATE TABLE IF NOT EXISTS test(id INT, name VARCHAR(100), description VARCHAR(200))') ||
            !$this->db_link->query('INSERT INTO test(id, name, description) VALUES (1, "Shirt", "black shirt, different sizes with nice printing:")')) {
            echo "Table creation failed: (" . $this->db_link->errno . ") " . $this->db_link->error;
        }
    }

    public function get()
    {
        $this->db_link->prepare('SELECT * FROM product');
        return $this->db_link->query('SELECT * FROM product');


    }

}