<?php 
session_start();
unset($_SESSION['Authorized']);
session_destroy();
header("Location: login.php");
?>