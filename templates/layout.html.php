<?php 
require_once "../includes/check.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../style/layout-styles.css?version=19">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/fd40214cfa.js" crossorigin="anonymous"></script>
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

        <div class="search-bar">
            <i id="search" class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="searchInput" placeholder="Search">
            <i id="clear" class="fa-regular fa-circle-xmark"></i>
        </div>
                
        <div class="profile">
            <div class="add-post">
                <a href="addPost.php"><i class="fa-solid fa-plus"></i> Create</a>
            </div>

            <img class='header-avatar' src="../images/avatars/<?= $_SESSION['user']['avatar'] ?>"/>
            <div class="avatar-hover-box">
                <ul>
                    <li>
                        <a href="profile.php" style="display: flex;">
                            <div>
                                <img class='avatar' src="../images/avatars/<?= $_SESSION['user']['avatar'] ?>"/>
                            </div>
                            <div style="display: flex; align-items: center;">
                                <span class="username"><?= $_SESSION['user']['first_name'] . " " . $_SESSION['user']['middle_name'] . " " . $_SESSION['user']['last_name'] ?></span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a style="width: 100%;" href="logout.php"><i style="padding-right: 10px;" class="fa-solid fa-right-from-bracket"></i>Log Out</a>
                    </li>
                </ul>
            </div>
        </div>

    </header>
    <main>
        <aside class="sidebar">
            <div class="home">
                <blockquote><a href="home.php" style="padding-left: 10px;"><i class="fa-solid fa-house"></i> Home</a></blockquote>
                <blockquote><a href="" style="padding-left: 10px;"><i class="fa-solid fa-arrow-trend-up"></i> Popular</a></blockquote>
            </div>
            <hr>

            <p style="margin-left: 45px; margin-bottom: 10px; font-size: smaller; color: #748791;">MODULES</h1>
            <div class="modules">
                <?php 
                    include "../includes/DatabaseConnection.php";

                    $sql = "SELECT * FROM modules";
                    $modules = $pdo->query($sql);

                    foreach($modules as $module) {
                ?>
                <blockquote>
                    <a href="#">
                        <?= $module['module_code'] ?>
                        <br>
                        <?= $module['module_name'] ?>
                    </a>
                </blockquote>
                <?php 
                    }
                ?>
            </div>
        </aside>

        <section class="content">
            <?= $output ?>
        </section>
        
        <aside class="recent-access">
            <h3>RECENT ACCESS</h3>
        </aside>
    </main>
    <script src="../js/script.js"></script>
</body>
</html>

