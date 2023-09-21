<?php

require ('database.php');
require ('CRUD-OOP.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Transilvania</title>
</head>
<body style="margin: 100px 100px;">
    <div id = "loader"></div>
    <div id = backdrop></div>
    <div class = "container">
        <button class="btn btn-success mb-3" ><a class="text-light" href="index.php">Add user</a></button>
    </div>
    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">date</th>
      <th scope="col">message</th>
      <th scope="col">operation</th>
    </tr>
  </thead>
  <tbody>
        <?php
             $db = new Database();
             $conn = new crud($db, $_POST);
             $conn->select();
        ?>
        

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
$(document).ready(function () {
    $(".btn-danger").click(function () {
        var deleteId = $(this).data("delete-id");
        $.ajax({
            type: "POST",
            url: "ajax-delete.php",
            data: { deleteId: deleteId },
            dataType: "json",
            success: function (response) {
                if (response.status === 'success') {
                    window.location.href = 'display.php';
                } else {
                    alert("Error: " + response.message);
                }
            },
            error: function (xhr, status, error) {
                alert("Error: " + error);
            },
        });
    });
});
</script>
  </tbody>
</table>
</body>
</html>