<?php 
require_once "check.php";

$title = "Submit Post";
ob_start();

include '../includes/DatabaseConnection.php';
include '../includes/test.php';

if(isset($_POST['post'])) {
    $module = $_POST['module_id'];
    $user = $_SESSION['user']['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $post_date = date('Y-m-d');

    $image_path = NULL;
    if(isset($_FILES['image_path']) && $_FILES['image_path']['error'] === 0) {
        $filename = basename($_FILES['image_path']['name']);
        move_uploaded_file($_FILES['image_path']['tmp_name'], '../images/posts/'. $filename);
        $image_path = $filename;
    }

    $sql = "INSERT INTO posts (module_id, user_id, title, content, image_path, post_date)
            VALUES (:module, :user, :title, :content, :image_path, :post_date)";

    $arr1 = array($module, $user, $title, $content, $image_path, $post_date);
    $arr2 = array(":module", ":user", ":title", ":content", ":image_path", ":post_date");
    test($pdo, $sql, $arr1, $arr2);

    header("location: home.php");

} else {
    $sql = "SELECT * FROM modules";
    $modules = $pdo->query($sql);

    include '../templates/addPost.html.php';
}

$output = ob_get_clean();
include "../templates/layout.html.php";
?>