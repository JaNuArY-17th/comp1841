<?php 
require_once "../includes/check.php";

$title = $_SESSION['user']['first_name'] . " " . $_SESSION['user']['middle_name'] . " " . $_SESSION['user']['last_name'];
ob_start();

include '../includes/DatabaseConnection.php';

$id = $_SESSION['user']['id'];

$sql = "SELECT posts.*, CONCAT(users.first_name, ' ', COALESCE(users.middle_name, ''), ' ', users.last_name) AS full_name, avatar, module_name, module_code
        FROM posts 
        INNER JOIN users ON posts.user_id = users.id
        INNER JOIN modules ON posts.module_id = modules.id
        WHERE posts.user_id = :user_id
        ORDER BY post_date DESC";
$statement = $pdo->prepare($sql);
$statement->bindValue(':user_id', $id);
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

include "../templates/profile.html.php";
$output = ob_get_clean();
include "../templates/layout.html.php";
?>