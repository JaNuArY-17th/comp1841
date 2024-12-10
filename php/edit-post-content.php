<?php 
require_once "../includes/check.php";

include '../includes/DatabaseConnection.php';
include '../includes/test.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['content'] != '') {
    $content = $_POST['content'];
    $id = $_POST['post-id'];

    $sql = "UPDATE posts
            SET content = :content
            WHERE id = :id";

    $arr1 = array($content, $id);
    $arr2 = array(":content", ":id");
    test($pdo, $sql, $arr1, $arr2);

    header("location: ../php/profile.php");
} else {
    include '../templates/profile.html.php';
}
?>