<?php
session_start();
// resume the session
session_destroy();
// destroy that current session
header('Location: index.php');
// send you back to the login page
exit;
// exits the page
?>
