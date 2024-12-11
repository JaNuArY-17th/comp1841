<?php
require_once "../includes/check.php";
?>

<div class="profile-container" style="height: 11vh;">
    <div class="profile-header">
        <i class="fa-solid fa-comments" style="display: flex; font-size: 75px; align-items: center;"></i>
        <div class="user-info" style="height: 75px;">
            <span class="username" style="font-size: 25px;">
                Feedback List
            </span>
        </div>
    </div>
</div>

<div style="position: relative; top: 140px; z-index: 1;">
    <?php
    foreach ($feedbacks as $feedback) {
        ?>
        <div class="post" style="display: flex; justify-content: space-between; align-items: center;">
            <div class="post-header">
                <a href="">
                    <div>
                        <span class="timestamp">Feedback ID: <?= $feedback['id'] ?></span>
                        <span class="timestamp">Feedback User: <?= $feedback['id'] ?> • <?= $feedback['full_name'] ?></span>
                        <span class="timestamp">Feedback Title: <?= $feedback['title'] ?></span>
                        <span class="timestamp">Feedback Content: <?= $feedback['content'] ?></span>
                        <span class="timestamp">Feedback Date: <?= $feedback['feedback_date'] ?></span>
                    </div>
                </a>
            </div>

            <div style="display: flex; float: right;">
                <form action="../php/delete-feedback.php" method="post"
                    onsubmit="return confirm('Are you sure to delete this post?');">
                    <input type="hidden" name="id" value="<?= $feedback['id'] ?>">
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