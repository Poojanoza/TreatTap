<?php 
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect the user to the homepage or login page
header("Location: ../index.php");
exit();

?>
