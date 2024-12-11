<?php 
require_once "../includes/check.php";
include '../includes/DatabaseConnection.php';

$sql = "DELETE FROM feedbacks WHERE id = :id";
$statement = $pdo->prepare($sql);
$statement->bindValue(':id', $_POST['id']);
$statement->execute();
header("Location: ../php/feedback-list.php");
?>