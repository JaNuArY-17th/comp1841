<?php 
if (isset($_POST['continue'])) {
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];

    include "../templates/register.html.php";
}
?>