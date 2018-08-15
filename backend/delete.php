<?php
include('connection.php');
// connect to database
$id=$_REQUEST['id'];
// get id from welcome page selection
$query = "DELETE FROM subscribers WHERE id=$id";
// sql command to delet row from database
$result = mysqli_query($link, $query) or die ( mysql_error());
// store the database query result
header("Location: welcome.php");
// send back to same page without showing refresh
?>
