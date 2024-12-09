<?php 
require_once "../includes/check.php";

include '../includes/DatabaseConnection.php';
include '../includes/test.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['fname'];
    $id = $_SESSION['user']['id'];

    $sql = "UPDATE users
            SET first_name = :name
            WHERE id = :id";

    $arr1 = array($name, $id);
    $arr2 = array(":name", ":id");
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