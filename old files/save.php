<?php
// save.php


// Check if the request is equal to POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//connect to database
    $conn = new mysqli('localhost', 'root', '', 'first_project');
    if ($conn->connect_error) {
        die('Please check your connection: ' . $conn->connect_error);
    }
//extract data in the form
    $userName = htmlspecialchars($_POST["userName"]);
    $email = htmlspecialchars($_POST["email"]);
    $date = htmlspecialchars($_POST["date"]);
    $message = htmlspecialchars($_POST["message"]);

//write a sql query 
    $sql_insert = "INSERT INTO users (name, email, date, message)
    VALUES ('$userName', '$email', '$date', '$message')";

//write  success and error message
    if ($conn->query($sql_insert) === TRUE) {
        // Insertion successful
        $response = array('status' => 'success');
        echo json_encode($response);
    } else {
        // Insertion failed
        $response = array('status' => 'error', 'message' => mysqli_error($conn));
        echo json_encode($response);
    }

    $conn->close();
}
?>


