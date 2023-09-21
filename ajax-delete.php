<?php

require ('database.php');
require ('CRUD-OOP.php');

// delete
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['deleteId'])) {
        $deleteId = $_POST['deleteId'];
        $db = new Database();
        $conn = new crud($db, $_POST);
        $conn->delete($deleteId);
    }
}

?>