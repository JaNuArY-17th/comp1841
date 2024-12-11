<?php
require_once "../includes/check.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/add-style.css?version=8">
    <link rel="stylesheet" href="../style/feedback.css?version=">
</head>

<body>
    <div class="profile-container" style="height: 11vh; background-color: ">
        <div class="profile-header">
            <i class="fa-solid fa-comments" style="display: flex; font-size: 75px; align-items: center;"></i>
            <div class="user-info" style="height: 75px;">
                <span class="username" style="font-size: 25px;">
                    User Feedback
                </span>
            </div>
        </div>
    </div>

    <div style="position: relative; top: 140px; z-index: 1;">
        <form action="feedback.php" method="post">
            <div class="form-group">
                <label for="" class="timestamp">Title</label>
                <input type="text" id="title" name="title" placeholder="Title" required>
            </div>

            <div class="form-group">
                <label for="" class="timestamp">Content</label>
                <textarea id="content" name="content" placeholder="Content" required></textarea>
            </div>

            <div class="btn-group">
                <button type="submit" name="sending" value="send mail">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>