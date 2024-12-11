<?php 
include "../includes/DatabaseConnection.php";

$username = $_POST['username'];
$password = $_POST['password'];
$password = md5($password);

$sql = "SELECT * FROM users WHERE username = :username";
$statement = $pdo->prepare($sql);
$statement->bindValue(':username', $username);
$statement->execute();

$user = $statement->fetch();

if ($user && $password == $user['password']) {
    session_start();
    $_SESSION['Authorized'] = TRUE;
    $_SESSION['user'] = $user;
    
    if ($_SESSION['user']['username'] != "admin") {
        header("Location: ../php/index.php");
    } else {
        header("Location: ../php/admin.php");
    }
    exit;
} else {
    header("Location: ../php/login.php?error=Incorrect username or password");
    exit;
}
?>