<?php

session_start();

include ("connection.php");

$message = "";

if(!empty($_POST["login"])) {

        $hashedPasswordFromDB = mysqli_query($link,"SELECT password FROM subscribers WHERE email='" . $_POST["email"]."'");

        $pass = mysqli_fetch_row($hashedPasswordFromDB);

        $passwordString = $pass[0];

        $result = mysqli_query($link,"SELECT * FROM subscribers WHERE email='" . $_POST["email"] . "' and password = '". $passwordString."'");

        $row = mysqli_fetch_array($result);
        
  // $auth is a boolean function
        $auth = password_verify($_POST['password'],$passwordString);

        if ($auth === true){
            $_SESSION['name'] = $row['firstName'];

            header("Location: /readNReview/welcome.php");

        } else {
            $message = "Email and Password do not match. Please try again!";
            echo $message;
        }

        if(!empty($_POST["logout"])) {
            $_SESSION["name"] = "";
            session_destroy();
        }

    }


?>

    <!DOCTYPE html>
    <html>

    <title>Login</title>

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
                    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                    <input class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="login" id="btn_sub" value="Login">
                </form>
                <!-- /form -->
                <a href="/backendRnR/register.php" class="forgot-password">
                    Register!
                </a>
            </div>
            <!-- /card-container -->
        </div>
        <!-- /container -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="myscripts.js"></script>
    </body>

    </html>