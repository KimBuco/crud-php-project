<?php

require ('database.php');
require ('CRUD-OOP.php');

if (isset($_GET['updateId'])) {
    $db = new Database();
    $user = new crud($db, $_POST);
    $userData = $user->getbyId($_GET['updateId']);
   
    $name = $userData['name'];
    $email = $userData['email'];
    $date = $userData['date'];
    $message = $userData['message'];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/css.css">
    <!-- <script defer src="Positioning-Form.js"></script> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
</head>
        <footer id="main-footer">
            <section id="footer-header">
                <h1>Update the Form</h1>
                <p>Please fill up the form and we will get back to you as soon as possible</p>
             </section>
            <form action="" method = "post" id="contactUs">
                <div id = "loader"></div>
                <div id = backdrop></div>
                <h1 class="top-header">Contact us</h1>
                <div>   
                    <div id = 'error'></div>
                    <label for="userName">Name</label><br>
                    <input type="text" name="userName" id="userName" value=<?php echo $name;?>><br>
                    <input type="text" name="update-id" id="update-id" value=<?php echo $_GET['updateId']; ?> hidden><br>
                    <small class="">Error message</small>
                 </div>
                 <div>
                    <label for="email">Email Address</label><br>
                    <input type="email" name="email" id="email" placeholder="example@sample.com" value=<?php echo $email;?>><br>
                    <small class="">Error message</small>
                 </div>
                 <div>
                    <label for="date">Booking date</label><br>
                    <input type="date" name="date" id="date" min="7/14/2023" value=<?php echo $date;?>>
                    <small class="">Error message</small>
                 </div>
                 <div class="bottom">
                    <label for="message">Leave a message if you have any concerns</label><br>
                    <textarea rows="6" cols="80" maxlength="1000" placeholder="maximum of 1000 characters" name="textArea" id="text-area"><?php echo $message;?></textarea>
                 </div>
                 <button type="submit" name ="submit" class="button">Update form</button>

                 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

                        <script>

                        // 
                        $(document).ready(function () {
                        //Triggered when the form is submitted
                        //preventDefault means preventing the page to reload
                            $("#contactUs").submit(function (e) {
                                e.preventDefault();

                                //access the data submitted by the user by getting their ID or Class and store them in a variable
                                const userName = $('#userName').val();
                                const email = $('#email').val();
                                const date = $('#date').val();
                                const message = $('textarea#text-area').val();
                                const id = $('#update-id').val();
                                // const id = 

                                console.log(id);

                                $.ajax({
                                    type: "POST",
                                    url: "ajax-update.php",
                                    data: {
                                    //access the user input through the variables stated at top
                                        userName: userName,
                                        email: email,
                                        date: date,
                                        message: message,
                                        id : id 
                                    },
                                    beforeSend: () => {
                                    $('#loader').show();
                                    $('#backdrop').show();
                                    },
                                    complete: () => {
                                    $('#loader').hide();
                                    $('#backdrop').hide();
                                    },
                                    dataType: "json",
                                    success: function (response) {
                                        if (response.status === 'success') {
                                            window.location.href = 'display.php';
                                        } else {
                                            console.log(response)
                                            $('#error').html("Error: " + response.message);
                                        }
                                    },
                                    error: function (xhr, status, error) {
                                        console.log(status, error);
                                        $('#error').html("Error: " + error);
                                    },
                                });
                            });
                        });
                        </script>
            </form>
        </footer>
    </section>
</body>
</html>