<?php

if(array_key_exists("submit", $_POST)){
    
    include ("connection.php");

    $options = [
        'cost' => 11,
    ];

    $passwordFromInput = $_POST['password'];

// variable to hash pasword 
    $hash = password_hash($passwordFromInput, PASSWORD_BCRYPT, $options);

    // mysqli_real_escape_string makes sure that can only input strings and not commands to database
    $query = "INSERT INTO subscribers (firstName, lastName, email, password) 
                VALUES ('".mysqli_real_escape_string($link, $_POST['fname'])."', '".mysqli_real_escape_string($link, $_POST['lname'])."','".mysqli_real_escape_string($link, $_POST['email'])."', 
                '".mysqli_real_escape_string($link, $hash)."')";

    mysqli_query($link, $query);

    if(isset($_POST['submit'])){
        header("Location: /backendRnR/");
    }
    
}

?>

    <!DOCTYPE html>
    <html>

    <title>Register</title>

    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>

    <body>
        <div class="container">
            <div class="card card-container">
                <p id="profile-name" class="profile-name-card"></p>
                <form method="POST" class="form-signin">
                    <span id="reauth-email" class="reauth-email"></span>
                    <input type="text" id="inputEmail" name="fname" class="form-control" placeholder="First Name" required autofocus>
                    <input type="text" id="inputEmail" name="lname" class="form-control" placeholder="Last Name" required autofocus>
                    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                    <input class="btn btn-lg btn-primary btn-block btn-signin" type = "submit" name = "submit" id = "btn_sub" value = "Register">
                </form>
                <!-- /form -->
            </div>
            <!-- /card-container -->
        </div>
        <!-- /container -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="myscripts.js"></script>
    </body>

    </html>