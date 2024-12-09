<?php 
require_once "../includes/check.php";

include '../includes/DatabaseConnection.php';
include '../includes/test.php';

if(isset($_POST['change'])) {
    $gender = $_POST['gender'];
    $id = $_SESSION['user']['id'];

    $sql = "UPDATE users
            SET sex = :gender
            WHERE id = :id";

    $arr1 = array($gender, $id);
    $arr2 = array(":gender", ":id");
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