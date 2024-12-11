<?php 
require_once "../includes/check.php";
include '../includes/DatabaseConnection.php';

$sql = "DELETE FROM users WHERE id = :id";
$statement = $pdo->prepare($sql);
$statement->bindValue(':id', $_POST['id']);
$statement->execute();
header("Location: ../php/user-list.php");
?>