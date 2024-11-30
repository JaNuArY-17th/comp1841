<?php
require_once "../includes/check.php";
?>

<div class="profile-container">
    <div class="profile-header">
        <div class="profile-avatar">
            <img class='profile-avatar' src="../images/avatars/<?= $_SESSION['user']['avatar'] ?>" />
        </div>
        <div class="user-info">
            <span class="username" style="font-size: 25px;">
                <?= $_SESSION['user']['first_name'] . " " . $_SESSION['user']['middle_name'] . " " . $_SESSION['user']['last_name'] ?>
            </span>
            <span class="timestamp">
                u/<?= $_SESSION['user']['first_name'] . " " . $_SESSION['user']['middle_name'] . " " . $_SESSION['user']['last_name'] ?>
            </span>
        </div>
    </div>

    <div class="nav-bar">
        <ul class="nav-bar-list">
            <li>
                <a href="">Edit Profile</a>
            </li>
            <li>
                <a href="">Posts</a>
            </li>
            <li>
                <a href="../php/addPost.php">Create</a>
            </li>
            <li>
                <a href="">Comments</a>
            </li>
            <li>
                <a href="">Upvoted</a>
            </li>
            <li>
                <a href="">Downvoted</a>
            </li>
        </ul>
    </div>
</div>

<?php
foreach ($posts as $post) {
    ?>

    <div style="display:block; position: relative; top: 190px; z-index: 1;">
    <div class="post">
        <div class="post-header">
            <a href="">
                <div>
                    <img class='avatar' src="../images/avatars/<?= $post['avatar'] ?>" />
                </div>

                <div>
                    <span class="username"><?= $post['full_name'] ?></span>
                    <span class="timestamp"><?= $post['post_date'] ?></span>
                </div>
            </a>

            <div class="title-module">
                <span class="title">
                    <?= $post['title'] ?>
                </span>
                •
                <span class="post-module">
                    <?= $post['module_code'] ?>
                    <?= $post['module_name'] ?>
                </span>
            </div>
        </div>

        <div class="post-content">
            <p><?= $post['content'] ?></p>
            <div class="image-container">
                <img class="back-post-image" src="../images/posts/<?= $post['image_path'] ?? 'default_image.jpg' ?>" alt="">
                <img class="post-image" src="../images/posts/<?= $post['image_path'] ?? 'default_image.jpg' ?>" alt="">
            </div>
        </div>

        <div class="post-details" style="justify-content: space-between;">
            <div style="display: flex; margin: 0px;">
            <div class="up-down">
                <button class="up-button" data-post-id="<?php echo $post['id']; ?>">
                    <i class="fa-regular fa-circle-up"></i>
                    <span id="up-count-<?php echo $post['id']; ?>">
                        <?php echo $post['upvote'] ?? 0; ?>
                    </span>
                </button>
                <button class="down-button" data-post-id="<?php echo $post['id']; ?>">
                    <i class="fa-regular fa-circle-down"></i>
                    <span id="down-count-<?php echo $post['id']; ?>">
                        <?php echo $post['downvote'] ?? 0; ?>
                    </span>
                </button>
            </div>

            <div>
                <button><i class="fa-regular fa-comment"></i> <?= $post['n_comments'] ?? 0 ?></button>
            </div>

            <div>
                <button><i class="fa-regular fa-share-from-square"></i> <?= $post['n_shares'] ?? 0 ?></button>
            </div>
            </div>

            <div style="margin-right: 10px;">
                <a href="delete-post.php">
                    <button id="deleteButton" class="delete-button">
                                <i class="fa-solid fa-trash-can"></i>
                    </button>
                </a>

            </div>
        </div>
    </div>
    <hr>
    </div>
<?php
}
?>