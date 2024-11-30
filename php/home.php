<?php 
require_once "../includes/check.php";

$title = "Reddit";
ob_start();

include '../includes/DatabaseConnection.php';

$sql = "SELECT posts.*, CONCAT(users.first_name, ' ', COALESCE(users.middle_name, ''), ' ', users.last_name) AS full_name, avatar, module_name, module_code
        FROM posts
        INNER JOIN users ON posts.user_id = users.id
        INNER JOIN modules ON posts.module_id = modules.id";
$posts = $pdo->query($sql);
$posts = $posts->fetchAll(PDO::FETCH_ASSOC);

include "../templates/home.html.php";
$output = ob_get_clean();
include "../templates/layout.html.php";
?>