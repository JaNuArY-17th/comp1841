<?php 
require_once "../includes/check.php";
include '../includes/DatabaseConnection.php';

$sql = "DELETE FROM posts WHERE id = :id";
$statement = $pdo->prepare($sql);
$statement->bindValue(':id', $_POST['id']);
$statement->execute();
if ($_SESSION['user']['username'] != 'admin') {
    header("Location: ../php/profile.php");
} else {
    header("Location: ../php/post-list.php");
}
?>