<?php
include '../includes/DatabaseConnection.php';

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    try {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        echo json_encode(['exists' => $count > 0]);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Database query failed.']);
    }
} else {
    echo json_encode(['error' => 'Email not provided.']);
}
?>

