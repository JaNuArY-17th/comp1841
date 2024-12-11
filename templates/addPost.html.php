<?php 
require_once "../includes/check.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="stylesheet" href="../style/add-style.css?version=8">
</head>

<body>
    <div class="container">
        <h1>Create a New Post</h1>
        <form action="../php/addPost.php" method="post" enctype="multipart/form-data">
            <div class="toolbar">
                <label class="select" for="slct">
                    <select id="slct" required="required" name="module_id">
                            <option value="" disabled="disabled" selected="selected">Select Module</option>
                            <?php
                            foreach ($modules as $module) {
                                ?>
                                <option value="<?= $module['id']; ?>">
                                    <?= $module['module_name'] ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                        <svg>
                            <use xlink:href="#select-arrow-down"></use>
                        </svg>
                </label>

                <svg class="sprites">
                    <symbol id="select-arrow-down" viewbox="0 0 10 6">
                        <polyline points="1 1 5 5 9 1"></polyline>
                    </symbol>
                </svg>
            </div>

            <div class="form-group">
                <input type="text" id="title" name="title" placeholder="Title" required>
            </div>

            <div class="form-group">
                <textarea id="content" name="content" placeholder="Content" required></textarea>
            </div>

            <div class="upload-container">
                <input type="file" id="fileInput" class="file-input" name="image_path" accept="image/*" />
                <label for="fileInput" class="upload-label">
                    <span>Upload media</span>
                    <div class="upload-icon">
                        <i class="fa-solid fa-upload"></i>
                    </div>
                </label>
                <div class="preview-wrapper">
                    <img id="blurredBackground" class="blurred-background" style="display: none;"
                        alt="Blurred Background" />
                    <img id="imagePreview" class="image-preview" style="display: none;" alt="Image Preview" />
                    <button id="deleteButton" class="delete-button" style="display: none;">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
            </div>

            <div class="btn-group">
                <button type="submit" name="post">Post</button>
            </div>
        </form>
    </div>

    <script src="../js/add_post.js"></script>
</body>

</html>