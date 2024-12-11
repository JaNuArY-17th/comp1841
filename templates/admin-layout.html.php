<?php
require_once "../includes/check.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../style/bootstrap.css?version=6">
    <link rel="stylesheet" href="../style/layout-styles.css?version=1">
    <link rel="stylesheet" href="../style/edit-post.css">
    <link rel="stylesheet" href="../style/admin-layout.css?version=3">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/fd40214cfa.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <header>
        <div class="logos">
            <div class="logo">
                <img src="../images/logos/gw_logo.png" alt="GreenWich Logo">
            </div>
            <div class="fpt-logo">
                <img src="../images/logos/fpt_logo.png" alt="FPT Logo">
            </div>
        </div>

        <div class="search-bar" style="background-color: #1A1A1B; border: none; justify-content: center;">
            <div style="display: none;">
                <i id="search" class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="searchInput" placeholder="Search">
                <i id="clear" class="fa-regular fa-circle-xmark"></i>
            </div>
            <a href="../php/admin.php">
                <h1 style="font-size: 45px; font-weight: bold; font-style: italic; color: #EE721E;">ADMIN</h1>
            </a>
        </div>

        <div class="profile" style="width: 143px; justify-content: right;">
            <img class='header-avatar' src="../images/avatars/<?= $_SESSION['user']['avatar'] ?>" />
            <div class="avatar-hover-box" style="top: 125%;">
                <ul>
                    <li>
                        <a href="" style="display: flex;">
                            <div>
                                <img class='avatar' style=" width: 30px; height: 30px;"
                                    src="../images/avatars/<?= $_SESSION['user']['avatar'] ?>" />
                            </div>
                            <div style="display: flex; align-items: center;">
                                <span
                                    class="username"><?= $_SESSION['user']['first_name'] . " " . $_SESSION['user']['middle_name'] . " " . $_SESSION['user']['last_name'] ?></span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a style="width: 100%;" href="logout.php"><i style="padding-right: 10px;"
                                class="fa-solid fa-right-from-bracket"></i>Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <main>
        <aside class="sidebar">
            <div class="home">
                <a href="../php/user-list.php" style="padding-left: 10px;"><i class="fa-solid fa-users"
                        style="width: 30px"></i> Users</a>
                <a href="../php/module-list.php" style="padding-left: 10px;"><i class="fa-solid fa-layer-group"
                        style="width: 30px"></i> Modules</a>
                <a href="../php/post-list.php" style="padding-left: 10px;"><i class="fa-solid fa-clipboard"
                        style="width: 30px"></i> Posts</a>
                <a href="../php/feedback-list.php" style="padding-left: 10px;"><i class="fa-solid fa-comments"
                        style="width: 30px"></i> Feedbacks</a>
            </div>
        </aside>

        <section class="content">
            <?= $output ?>
        </section>
    </main>
    <script src="../js/script.js"></script>

</body>

</html>