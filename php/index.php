<?php 
require "check.php";

$title = "Reddit";
ob_start();
$output = ob_get_clean();
header('Location: home.php');
?>