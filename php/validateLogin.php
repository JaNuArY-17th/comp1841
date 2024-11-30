<?php 
include "../includes/DatabaseConnection.php";

$email = $_POST['email'];
$password = $_POST['password'];
$password = md5($password);

$sql = "SELECT * FROM users WHERE email = :email";
$statement = $pdo->prepare($sql);
$statement->bindValue(':email', $email);
$statement->execute();

$user = $statement->fetch();

if ($user && $password == $user['password']) {
    session_start();
    $_SESSION['Authorized'] = TRUE;
    $_SESSION['user'] = $user;
    header("Location: index.php");
    exit;
} else {
    header("Location: login.php?error=Incorrect email or password");
    exit;
}
?>