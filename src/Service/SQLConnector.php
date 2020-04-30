<?php
declare(strict_types=1);

namespace App\Service;

use function PHPUnit\Framework\isEmpty;

class SQLConnector
{
    private \mysqli $db_link;
    private bool $connection;

    public function __construct()
    {

        $this->connection = true;
    }

    public function __destruct()
    {
        $this->db_link->close();
    }

    public function connect(string $user, string $pw): bool
    {
        $this->db_link = new \mysqli('127.0.01:3336', $user, $pw, 'mvc');
        $this->db_link->set_charset('utf8');
        if ($this->db_link->connect_errno) {
            echo "Failed to connect to MySQL: (" . $this->db_link->connect_errno . ") " . $this->db_link->connect_error;
            $this->connection = false;
        }
        return $this->connection;
    }

    public function get(string $sql, string $whitespace, array $data): object
    {
        $stmt = \mysqli_stmt_init($this->db_link);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo('Something went wrong with the sql query.');
        } else {
            if (!isEmpty($data)) {
                mysqli_stmt_bind_param($stmt, $whitespace, $data);
            }
            mysqli_stmt_execute($stmt);

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
