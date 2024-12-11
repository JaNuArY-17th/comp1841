<?php
require_once "../includes/check.php";
?>

<div class="profile-container" style="height: 11vh;">
    <div class="profile-header">
        <i class="fa-solid fa-clipboard" style="display: flex; font-size: 75px; align-items: center;"></i>
        <div class="user-info" style="height: 75px;">
            <span class="username" style="font-size: 25px;">
                Post List
            </span>
        </div>
    </div>
</div>

<div style="position: relative; top: 140px; z-index: 1;">
    <?php
    foreach ($posts as $post) {
        ?>
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
                    <img class="back-post-image" src="../images/posts/<?= $post['image_path'] ?? 'default_image.jpg' ?>"
                        alt="">
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

                <div class="post-tool">
                    <form action="../php/delete-post.php" method="post"
                        onsubmit="return confirm('Are you sure to delete this post?');">
                        <input type="hidden" name="id" value="<?= $post['id'] ?>">
                        <button type="submit">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <?php
    }
    ?>
</div>