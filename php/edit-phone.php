<?php
require_once "../includes/check.php";

include '../includes/DatabaseConnection.php';
include '../includes/test.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phone = $_POST['phone'];
    $id = $_SESSION['user']['id'];

    $sql = "UPDATE users
            SET phone_number = :phone
            WHERE id = :id";

    $arr1 = array($phone, $id);
    $arr2 = array(":phone", ":id");
    test($pdo, $sql, $arr1, $arr2);

    $sql = "SELECT * FROM users WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $user = $statement->fetch();
    $_SESSION['user'] = $user;

    header("location: ../php/profile.php");
} else {
    include '../templates/profile.html.php';
}
?>
