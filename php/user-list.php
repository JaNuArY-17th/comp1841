<?php 
require_once "../includes/check.php";

$title = "Admin";
ob_start();

include '../includes/DatabaseConnection.php';

$sql = "SELECT * FROM users";
$users = $pdo->query($sql);
$users = $users->fetchAll(PDO::FETCH_ASSOC);

include "../templates/user-list.html.php";
$output = ob_get_clean();
include "../templates/admin-layout.html.php";
?>