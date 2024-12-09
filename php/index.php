<?php 
require_once "../includes/check.php";

$title = "Reddit";
ob_start();
$output = ob_get_clean();
header('Location: ../php/home.php');
?>