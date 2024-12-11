<?php
require_once "../includes/check.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../mail/PHPMailer/src/Exception.php';
require '../mail/PHPMailer/src/PHPMailer.php';
require '../mail/PHPMailer/src/SMTP.php';

$title = "Feedback";
ob_start();

include '../includes/DatabaseConnection.php';
include '../includes/test.php';

if (isset($_POST['sending'])) {
    $user_id = $_SESSION['user']['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $feedback_date = date('Y-m-d');
    $mail = new PHPMailer();

    try {
        //Sender
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'longnhgch230179@fpt.edu.vn';
        $mail->Password = 'wrum pxao laqz trzg';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        //Recipient
        $mail->addAddress('longnhgch230179@fpt.edu.vn');
        //Content
        $mail->isHTML(true);
        $mail->Subject = $title;
        $mail->Body = $content;
        //Send mail
        $mail->send();
        echo 'Message has been sent';

        $sql = "INSERT INTO feedbacks (user_id, title, content, feedback_date)
                VALUES (:user_id, :title, :content, :feedback_date)";

        $arr1 = array($user_id, $title, $content, $feedback_date);
        $arr2 = array(":user_id", ":title", ":content", ":feedback_date");
        test($pdo, $sql, $arr1, $arr2);

        header("location: ../php/home.php");

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

include "../templates/feedback.html.php";
$output = ob_get_clean();
include "../templates/layout.html.php";
?>