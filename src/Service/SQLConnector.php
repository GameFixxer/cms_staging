<?php
declare(strict_types=1);

namespace App\Service;

class SQLConnector
{
    private \mysqli $db_link;

    public function __construct()
    {
    }

    public function __destruct()
    {
        $this->db_link->close();
    }

    public function connect():void
    {
        $this->db_link = new \mysqli('127.0.01:3336', 'root', 'pass123', 'mvc');
        $this->db_link->set_charset('utf8');
        if ($this->db_link->connect_errno) {
            echo "Failed to connect to MySQL: (" . $this->db_link->connect_errno . ") " . $this->db_link->connect_error;
        }
    }

    public function get(string $sql, string $whitespace, array $data): object
    {
        $stmt =\mysqli_stmt_init($this->db_link);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo('Something went wrong with the sql query.');
        } else {
            if (!isset($data)) {
                mysqli_stmt_bind_param($stmt, $whitespace, $data);
            }
            mysqli_stmt_execute($stmt);
        }
        if (mysqli_stmt_get_result($stmt) === false) {
            throw new \Exception('Database error', 1);
        }
        return mysqli_stmt_get_result($stmt);
    }

    public function set(string $sql, string $whitespace, array $data): void
    {
        $stmt = \mysqli_stmt_init($this->db_link);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo('Something went wrong with the sql query.');
        } else {
            if (!empty($data)) {
                mysqli_stmt_bind_param($stmt, $whitespace, ...$data);
            }
            mysqli_stmt_execute($stmt);
        }
    }
}
