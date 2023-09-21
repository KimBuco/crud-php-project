<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $conn = new mysqli('localhost', 'root', '', 'first_project');
        if (!$conn){
            die(mysqli_error($conn));
        } 
    }

//access the embedded ID
//use the variable stated in the AJAX
    $id = $_POST['id'];
//SQL statement to delete a specific row
    $sql_delete = "DELETE FROM users WHERE id = $id";
//Run the query
    if ($conn->query($sql_delete) === TRUE) {
        // Insertion successful
        $response = array('status' => 'success');
        echo json_encode($response);
        } else {
        // Insertion failed
        $response = array('status' => 'error', 'message' => mysqli_error($conn));
        echo json_encode($response);
        }
        $conn->close();

?>


