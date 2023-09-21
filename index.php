<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        <?php include "css/styles.css" ?>
    </style>
</head>

<body>
    <section>
        <header id="hero-section">
            <a class="logo" href="#">TagaytayVille</a>
            <nav class="menu">
                <ul class="nav">
                    <li>Home</li>
                    <li>Contact us</li>
                    <li>Help</li>
                </ul>
            </nav>
        </header>
        <div class="try">
            <section id="left-col">
                <h1 class="slogan">When you’re here, experience what life is all about</h1>
                <p class="description">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quibusdam enim qui impedit,
                    quidem ut quod praesentium quaerat dolore voluptatem similique consequuntur natus sit
                    aliquam reiciendis labore corrupti placeat culpa ex.
                </p>
                <div id="hotel-achievements">
                    <h1 class="achievement">Included in top hotels in Tagaytay</h1>
                    <h1 class="achievement">5 star ratings from foreign visitors</h1>
                    <h1 class="achievement">Most recommended hotel in Tagaytay</h1>
                    <img src="css/confetti.png" class="confetti" alt="">
                </div>
            </section>
            <section id="right-col">
                <div class="picture-one"></div>
                <div class="picture-two"></div>
                <div class="picture-three"></div>
            </section>
        </div>
        </div>
    </section>
    <section>
        <footer id="main-footer">

            <section id="footer-header">
                <h1>Would like to book?</h1>
                <p>We would love to hear from you. Please fill up the form and we will get back to you as soon as possible</p>
            </section>

            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="contactUs">
                <div id="loader"></div>
                <div id=backdrop></div>
                <h1 class="top-header">Contact us</h1>

                <div>
                    <div id='message'></div>
                    <label for="userName">Name</label><br>
                    <input type="text" name="userName" id="userName" class="inputBox"><br>
                    <i class="fa-sharp fa-solid fa-circle-exclamation" id="error"></i>
                    <small><?php echo isset($errors['userName']) ? $errors['userName'] : '' ?></small>
                </div>

                <div>
                    <label for="email">Email Address</label><br>
                    <input type="email" name="email" id="email" placeholder="example@sample.com"><br>
                    <i class="fa-sharp fa-solid fa-circle-exclamation" id="error"></i>
                    <small><?php echo isset($errors['email']) ? $errors['email'] : '' ?></small>
                </div>

                <div>
                    <label for="date">Booking date</label><br>
                    <input type="date" name="date" id="date" min="7/14/2023">
                </div>

                <div class="bottom">
                    <label for="message">Leave a message if you have any concerns</label><br>
                    <textarea rows="6" cols="80" maxlength="1000" placeholder="maximum of 1000 characters" class="4" name="textArea" id="textArea"></textarea>
                </div>

                <button type="submit" name="submit" class="button" id="sbt-button">Submit form
                </button>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

                <script>
                    $(document).ready(function() {

                        $("#contactUs").submit(function(e) {
                            e.preventDefault();

                            var userName = $('#userName').val();
                            var email = $('#email').val();
                            var date = $('#date').val();
                            var message = $('#textArea').val();

                            $.ajax({
                                type: "POST",
                                url: "ajax-save.php",
                                data: {
                                    userName: userName,
                                    email: email,
                                    date: date,
                                    message: message
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
                                success: function(response) {
                                    if (response.status === 'success') {
                                        window.location.href = 'display.php';
                                    } else {
                                        $('#message').html("Error: " + response.message);
                                    }
                                },
                                error: function(xhr, status, error) {
                                    $('#message').html("Error: " + error);
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