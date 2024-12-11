<?php 
require_once "../includes/check.php";

$title = "Admin";
ob_start();

include '../includes/DatabaseConnection.php';

$output = ob_get_clean();
include "../templates/admin-layout.html.php";
?>