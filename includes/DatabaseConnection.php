<?php 
try {
    $pdo = new PDO("mysql:host=localhost;dbname=reddit;charset=utf8mb4", "root", "");
} catch (PDOException $e) {
    echo '<h1>Connect to DB failed</h1>'. $e;
}
?>