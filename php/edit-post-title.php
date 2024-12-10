<?php 
require_once "../includes/check.php";

include '../includes/DatabaseConnection.php';
include '../includes/test.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['title'] != '') {
    $title = $_POST['title'];
    $id = $_POST['post-id'];

    $sql = "UPDATE posts
            SET title = :title
            WHERE id = :id";

    $arr1 = array($title, $id);
    $arr2 = array(":title", ":id");
    test($pdo, $sql, $arr1, $arr2);

    echo $title;
    echo $id;

    // header("location: ../php/profile.php");
} else {
    include '../templates/profile.html.php';
}
?>