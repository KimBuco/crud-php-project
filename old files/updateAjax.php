<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $conn = new mysqli('localhost', 'root', '', 'first_project');
        if (!$conn){
            die(mysqli_error($conn));
        } 

        //access the data through name fields in the form
        $userName = htmlspecialchars($_POST["userName"]);
        $email = htmlspecialchars($_POST["email"]);
        $date = htmlspecialchars($_POST["date"]);
        $message = htmlspecialchars($_POST["message"]);

        //access the ID
        $id = $_POST['id'];
        
        //Update the data referenced to the ID extracted
        $updateQuery = "UPDATE users SET  name ='$userName', email ='$email', date ='$date', message = '$message'
        WHERE id = $id ";

        //Run the query and display success and error message
        if ($conn->query($updateQuery) === TRUE) {
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

