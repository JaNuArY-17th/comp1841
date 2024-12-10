<?php 
require_once "../includes/check.php";

$title = "Feedback";
ob_start();

include '../includes/DatabaseConnection.php';

$output = ob_get_clean();
include "../templates/layout.html.php";
?>