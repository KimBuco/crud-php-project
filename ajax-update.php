<?php

require ('database.php');
require ('CRUD-OOP.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $db = new Database();
    $conn = new crud($db, $_POST);
    $conn->update();
}

?>