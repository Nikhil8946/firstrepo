<?php

namespace App\Libraries;

/**
 * Database
 * database class creates a database connection and has all the values to create a connection
 */
class Database
{
    private $host = "localhost";
    private $user = "nikhil";
    private $pass = "Nikhil@123";
    private $dbname = "todo_app";
    private $conn;
    public function __construct()
    {
        $this->conn = new \mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->dbname,
        );
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        } else {
        }
    }
    /**
     * execute
     *executes any query
     * @param  string $query
     * @return mixed
     */
    public function execute($query)
    {
        $result = $this->conn->query($query);
        return $result;
    }
    public function close()
    {
        // Close the database connection
        $this->conn->close();
    }
    public function error()
    {
        // Close the database connection
        $this->conn->error;
    }
}
