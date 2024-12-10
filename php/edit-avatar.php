<?php 
require_once "../includes/check.php";

include '../includes/DatabaseConnection.php';
include '../includes/test.php';

if (isset($_POST['accept'])) {
    $id = $_SESSION['user']['id'];
    $image_path = NULL;
    if(isset($_FILES['image_path']) && $_FILES['image_path']['error'] === 0) {
        $filename = $_SESSION['user']['avatar'];
        move_uploaded_file($_FILES['image_path']['tmp_name'], '../images/avatars/'. $filename);
        $image_path = $filename;
    }

    $sql = "UPDATE users
            SET avatar = :avatar
            WHERE id = :id";
    
    $arr1 = array($image_path, $id);
    $arr2 = array(":avatar", ":id");
    test($pdo, $sql, $arr1, $arr2);

    $sql = "SELECT * FROM users WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $user = $statement->fetch();
    $_SESSION['user'] = $user;

    header("location: ../php/profile.php");
} else {
    include '../php/profile.php';
}
?>