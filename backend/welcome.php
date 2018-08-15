<?php

session_start();

include('connection.php');

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>View Data</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="form">
        <h2>View Data</h2></center>
      <table width="100%" border="1" style="border-collapse:collapse;">
        <thead>
          <tr><th><strong>No</strong></th><th><strong>Name</strong></th><th><strong>City</strong></th><th><strong>Phone</strong></th><th><strong>Update</strong></th><th><strong>Delete</strong></th></tr>
        </thead>
        <tbody>
​
          <!--
​
$result = mysqli_query($link,"SELECT * FROM subscribers WHERE email='" . $_POST["email"] . "' and password = '". $passwordString."'");
$row = mysqli_fetch_array($result);
-->
<!--
​
          $sel_query="SELECT * FROM subscribers ORDER BY id asc;";
          $result = mysqli_query($link,$sel_query);
-->
          <?php
          $count=1;
          $result = mysqli_query($link,"SELECT * FROM subscribers ORDER BY id asc");
          while($row = mysqli_fetch_array($result)) { ?>
          <tr><td align="center"><?= $count; ?></td><td align="center"><?= $row["firstName"]; ?></td><td align="center"><?= $row["lastName"]; ?></td><td align="center"><?= $row["email"]; ?></td><td align="center"><a href="edit.php?id=<?= $row["id"]; ?>">Update</a></td><td align="center"><a href="delete.php?id=<?= $row["id"]; ?>">Delete</a></td></tr>
          <?php $count++; } ?>
        </tbody>
      </table>
    </div>
​
    <a href="logout.php"> <button type="button" class="btn btn-info">Logout</button> </a>
  </body>
</html>