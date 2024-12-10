<?php
require_once "../includes/check.php";

include '../includes/DatabaseConnection.php';
include '../includes/test.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['post-id'];

    $image_path = NULL;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $filename = basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], '../images/posts/' . $filename);
        $image_path = $filename;
    }

    $sql = "UPDATE posts
    SET image_path = :image_path
    WHERE id = :id";

    $arr1 = array($image_path, $id);
    $arr2 = array(":image_path", ":id");
    test($pdo, $sql, $arr1, $arr2);

    header("location: ../php/profile.php");
} else {
    include '../templates/profile.html.php';
}
?>