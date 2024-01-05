<?php 

class database {
    private $host;
    private $username;
    private $password;
    private $database;
    public $conn;

    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    public function query($sql) {
        $result = $this->conn->query($sql);
        return $result;
    }
}

$db = new database("127.0.0.1:3307","root","","taskify");

?>