<?php
require_once "../includes/check.php";
?>

<div class="profile-container" style="height: 11vh;">
    <div class="profile-header">
        <i class="fa-solid fa-users" style="display: flex; font-size: 75px; align-items: center;"></i>
        <div class="user-info" style="height: 75px;">
            <span class="username" style="font-size: 25px;">
                User List
            </span>
        </div>
    </div>
</div>

<div style="position: relative; top: 140px; z-index: 1;">
    <?php
    foreach ($users as $user) {
        if ($user['id'] != $_SESSION['user']['id']) {
            ?>
            <div class="post" style="display: flex; justify-content: space-between; align-items: center;">
                <div class="post-header">
                    <a href="">
                        <div>
                            <img class='avatar' src="../images/avatars/<?= $user['avatar'] ?>" />
                        </div>

                        <div>
                            <span class="timestamp">User ID:   <?= $user['id'] ?></span>
                            <span class="timestamp">Full Name:   <?= $user['first_name'] . " " . $user['middle_name'] . " " . $user['last_name'] ?></span>
                            <span class="timestamp">Email:   <?= $user['email'] ?></span>
                            <span class="timestamp">Phone Number:  <?= $user['phone_number'] ?></span>
                            <span class="timestamp">Username:  <?= $user['username'] ?></span>
                            <span class="timestamp">Gender:  <?= $user['sex'] ?></span>
                        </div>
                    </a>
                </div>

                <div style="display: flex; float: right;">
                <form action="../php/delete-user.php" method="post"
                        onsubmit="return confirm('Are you sure to delete this post?');">
                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                        <button type="submit" class="edit-button">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form>
                </div>
            </div>
            <hr>
            <?php
        }
    }
    ?>
</div>