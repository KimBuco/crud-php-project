
<?php

class Database {
    private $servername = 'localhost';
    // private $username = 'root';
    // private $dbname = 'first_project';
    // private $password = '';
    private $username = 'u870715581_kimjay1';
    private $password = 'Kimjay081001';
    private $dbname = 'u870715581_first_project';
    private $conn;
 
    public function __construct(){
   
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die('Please check your connection: . $this->conn->connect_error');
        }
    }

    public function query($sql){
        return $this->conn->query($sql);
    }

    public function closeConnection() {
        return $this->conn->close();
    }

}

?>


