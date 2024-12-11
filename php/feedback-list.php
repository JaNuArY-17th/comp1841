<?php 
require_once "../includes/check.php";

$title = "Admin";
ob_start();

include '../includes/DatabaseConnection.php';

$sql = "SELECT feedbacks.*, CONCAT(users.first_name, ' ', COALESCE(users.middle_name, ''), ' ', users.last_name) AS full_name 
        FROM feedbacks
        INNER JOIN users ON feedbacks.user_id = users.id";
$feedbacks = $pdo->query($sql);
$feedbacks = $feedbacks->fetchAll(PDO::FETCH_ASSOC);

include "../templates/feedback-list.html.php";
$output = ob_get_clean();
include "../templates/admin-layout.html.php";
?>