<?php
// save.php

class UserSaver {
    private $conn;
//connect to the database
    public function __construct($hostname, $username, $password, $database) {
        $this->conn = new mysqli($hostname, $username, $password, $database);
        if ($this->conn->connect_error) {
            die('Please check your connection: ' . $this->conn->connect_error);
        }
    }

//sanitize the data using htmlspecialchars
    public function saveUser($userName, $email, $date, $message) {
        $userName = htmlspecialchars($userName);
        $email = htmlspecialchars($email);
        $date = htmlspecialchars($date);
        $message = htmlspecialchars($message);

//SQL query to insert data to the database
        $sql_insert = "INSERT INTO users (name, email, date, message)
                       VALUES ('$userName', '$email', '$date', '$message')";

//Run the query and RETURN an error/success after the run.
        if ($this->conn->query($sql_insert) === TRUE) {
            // Insertion successful
            return array('status' => 'success');
        } else {
            // Insertion failed
            return array('status' => 'error', 'message' => $this->conn->error);
        }
    }

//close the database connection
    public function closeConnection() {
        $this->conn->close();
    }
}

//checks if the request is in POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Create an instance of the UserSaver class with database credentials
    $userSaver = new UserSaver('localhost', 'root', '', 'first_project');

    // Extract data from the form
    $userName = $_POST["userName"];
    $email = $_POST["email"];
    $date = $_POST["date"];
    $message = $_POST["message"];

    // Save user data
    $response = $userSaver->saveUser($userName, $email, $date, $message);

    // Output JSON response
    echo json_encode($response);

    // Close the database connection
    $userSaver->closeConnection();
}
?>