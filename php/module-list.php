<?php 
require_once "../includes/check.php";

$title = "Admin";
ob_start();

include '../includes/DatabaseConnection.php';

$sql = "SELECT * FROM modules";
$modules = $pdo->query($sql);
$modules = $modules->fetchAll(PDO::FETCH_ASSOC);

include "../templates/module-list.html.php";
$output = ob_get_clean();
include "../templates/admin-layout.html.php";
?>