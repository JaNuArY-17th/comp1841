<?php 
session_start();
if (!isset($_SESSION['Authorized']) && $_SESSION['Authorized'] != TRUE) {
    header('Location: ../php/login.php');
}
?>