<?php
require_once "../includes/check.php";
?>

<div class="profile-container" style="height: 11vh;">
    <div class="profile-header">
        <i class="fa-solid fa-layer-group" style="display: flex; font-size: 75px; align-items: center;"></i>
        <div class="user-info" style="height: 75px;">
            <span class="username" style="font-size: 25px;">
                Module List
            </span>
        </div>
    </div>
</div>

<div style="position: relative; top: 140px; z-index: 1;">
    <?php
    foreach ($modules as $module) {
        ?>
        <div class="post" style="display: flex; justify-content: space-between; align-items: center;">
            <div class="post-header">
                <a href="">
                    <div>
                        <span class="timestamp">Module ID: <?= $module['id'] ?></span>
                        <span class="timestamp">Module Code: <?= $module['module_code'] ?></span>
                        <span class="timestamp">Module Name: <?= $module['module_name'] ?></span>
                    </div>
                </a>
            </div>

            <div style="display: flex; float: right;">
                <form action="../php/delete-module.php" method="post"
                    onsubmit="return confirm('Are you sure to delete this post?');">
                    <input type="hidden" name="id" value="<?= $module['id'] ?>">
                    <button type="submit" class="edit-button">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </form>
            </div>
        </div>
        <hr>
        <?php

    }
    ?>
</div>