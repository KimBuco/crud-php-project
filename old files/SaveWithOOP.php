<?php

require ('database.php');

class InsertUser {


    public function saveUser($userName, $email, $date, $message) {
        $userName = htmlspecialchars($userName);
        $email = htmlspecialchars($email);
        $date = htmlspecialchars($date);
        $message = htmlspecialchars($message);

        //Get the connection from the Database instance
        $database = new Database();
      
        $sql_insert = "INSERT INTO users (name, email, date, message) VALUES ('$userName', '$email', '$date', '$message')";

        if ($conn->query($sql_insert) === TRUE) {
            // Insertion successful
            return array('status' => 'success');
        } else {
            // Insertion failed
            return array('status' => 'error', 'message' => mysqli_error($conn));
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Extract data from the form
    $userName = $_POST["userName"];
    $email = $_POST["email"];
    $date = $_POST["date"];
    $message = $_POST["message"];

    // Save user data
    $saveUser = new saveUser($userName, $email, $date, $message);

    // Output JSON response
    echo json_encode($response);

    // Close the database connection
    $closeConnection = new Database();
    $closeConnection->closeConnection();
}

?>