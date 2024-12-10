<?php
require_once "../includes/check.php";

include '../includes/DatabaseConnection.php';

if (isset($_POST['phone'])) {
    $phone = $_POST['phone'];

    try {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE phone_number = :phone_number");
        $stmt->bindParam(':phone_number', $phone, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        echo json_encode(['exists' => $count > 0]);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Database query failed.']);
    }
} else {
    echo json_encode(['error' => 'Phone number not provided.']);
}
?>
