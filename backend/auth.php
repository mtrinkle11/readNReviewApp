<?php

session_start();
include ("connection.php");

$message = "";

if(!empty($_POST["email"])) {

        $hashedPasswordFromDB = mysqli_query($link,"SELECT password FROM subscribers WHERE email='" . $_POST["email"]."'");

        $pass = mysqli_fetch_row($hashedPasswordFromDB);

        $passwordString = $pass[0];

        $result = mysqli_query($link,"SELECT * FROM subscribers WHERE email='" . $_POST["email"] . "' and password = '". $passwordString."'");

        $row = mysqli_fetch_array($result);
        
  // $auth is a boolean function
        $auth = password_verify($_POST['password'],$passwordString);

        if ($auth === true){
            echo json_encode(true);

        } else {
            echo json_encode(false);
        }

        if(!empty($_POST["logout"])) {
            $_SESSION["name"] = "";
            session_destroy();
        }

    }


?>