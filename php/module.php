<?php
require_once "../includes/check.php";

$title = "Reddit";
$moduleCode = $_GET['module_code'];
$moduleName = $_GET['module_name'];
ob_start();

include '../includes/DatabaseConnection.php';

$sql = "SELECT posts.*, CONCAT(users.first_name, ' ', COALESCE(users.middle_name, ''), ' ', users.last_name) AS full_name, avatar, module_name, module_code
        FROM posts
        INNER JOIN users ON posts.user_id = users.id
        INNER JOIN modules ON posts.module_id = modules.id
        WHERE module_code = :module_code
        ORDER BY post_date DESC";
// $posts = $pdo->query($sql);
// $posts->bindValue(':module_code', $moduleCode);
// $posts = $posts->fetchAll(PDO::FETCH_ASSOC);
$statement = $pdo->prepare($sql);
$statement->bindValue(':module_code', $moduleCode);
$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

include "../templates/module.html.php";
$output = ob_get_clean();
include "../templates/layout.html.php";
?>