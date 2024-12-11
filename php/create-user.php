<?php
include '../includes/DatabaseConnection.php';
include '../includes/test.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);
    $image_path = NULL;

    if(isset($_FILES['image_path']) && $_FILES['image_path']['error'] === 0) {
        $filename = basename($_FILES['image_path']['name']);
        move_uploaded_file($_FILES['image_path']['tmp_name'], '../images/avatars/'. $filename);
        $image_path = $filename;
    }

    $sql = "INSERT INTO users (first_name, middle_name, last_name, email, phone_number, avatar, sex, password, username)
        VALUES (:first_name, :middle_name, :last_name, :email, :phone_number, :avatar, :sex, :password, :username)";

    $arr1 = array($fname, $mname, $lname, $email, $phone, $image_path, $gender, $password, $username);
    $arr2 = array(":first_name", ":middle_name", ":last_name", ":email", ":phone_number", ":avatar", ":sex", ":password", ":username");
    test($pdo, $sql, $arr1, $arr2);

    header("location:../php/login.php");
}
?>