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
        <div class="tab-list">
            <button class="tablinks" onclick="openTab(event, 'editProfile')" id="defaultOpen">
                Profile
            </button>
            <button class="tablinks" onclick="openTab(event, 'posts')">
                Posts
            </button>
            <a class="tablinks" href="../php/addPost.php">
                Create
            </a>
            <button class="tablinks" onclick="openTab(event, 'comments')">
                Comments
            </button>
            <button class="tablinks" onclick="openTab(event, 'upvoted')">
                Upvoted
            </button>
            <button class="tablinks" onclick="openTab(event, 'downvoted')">
                Downvoted
            </button>
        </div>
    </div>
</div>

<!-- Edit Profile Tab -->
<div id="editProfile" class="tabcontent" style="position: relative; top: 180px; z-index: 1;">
    <div class="edit-profile">
        <div class="personal-info">
            <h1>Personal Information</h1>
            <!-- First Name -->
            <label for="" class="timestamp">First Name</label>
            <div style="display: flex; justify-content: space-between;">
                <form action="../php/edit-fname.php" method="post" id="fname-form">
                    <a id="fname-current-input"><?= $_SESSION['user']['first_name'] ?></a>
                    <input type="text" name="fname" id="fname-new-input">
                    <input type="submit" name="confirm">
                </form>

                <div style="display: flex;">
                    <button class="edit-button" id="fname-edit-button">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>

                    <button class="discard-button" id="fname-discard-button">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </button>

                    <button class="confirm-button" id="fname-confirm-button">
                        <i class="fa-solid fa-circle-check"></i>
                    </button>
                </div>
            </div>

            <!-- Middle Name -->
            <label for="" class="timestamp">Middle Name</label>
            <div style="display: flex; justify-content: space-between;">
                <form action="../php/edit-mname.php" method="post" id="mname-form">
                    <a id="mname-current-input"><?= $_SESSION['user']['middle_name'] ?? "<p> </p>" ?></a>
                    <input type="text" name="mname" id="mname-new-input">
                    <input type="submit" name="confirm">
                </form>

                <div style="display: flex;">
                    <button class="edit-button" id="mname-edit-button">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>

                    <button class="discard-button" id="mname-discard-button">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </button>

                    <button class="confirm-button" id="mname-confirm-button">
                        <i class="fa-solid fa-circle-check"></i>
                    </button>
                </div>
            </div>

            <!-- Last Name -->
            <label for="" class="timestamp">Last Name</label>
            <div style="display: flex; justify-content: space-between;">
                <form action="../php/edit-lname.php" method="post" id="lname-form">
                    <a id="lname-current-input"><?= $_SESSION['user']['last_name'] ?></a>
                    <input type="text" name="lname" id="lname-new-input">
                    <input type="submit" name="confirm">
                </form>

                <div style="display: flex;">
                    <button class="edit-button" id="lname-edit-button">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>

                    <button class="discard-button" id="lname-discard-button">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </button>

                    <button class="confirm-button" id="lname-confirm-button">
                        <i class="fa-solid fa-circle-check"></i>
                    </button>
                </div>
            </div>

            <!-- Avatar -->
            <label for="" class="timestamp">Avatar</label>
            <form action="../php/edit-avatar.php" method="post" enctype="multipart/form-data" style="margin-top: 5px;">
                <div class="upload-container">
                    <input type="file" id="fileInput" class="file-input" name="image_path" accept="image/*" />
                    <label for="fileInput" class="upload-label">
                        <span>Upload avatar</span>
                        <div class="upload-icon">
                            <i class="fa-solid fa-upload"></i>
                        </div>
                    </label>
                    <div class="preview-wrapper">
                        <img id="blurredBackground" class="blurred-background" style="display: none;"
                            alt="Blurred Background" />
                        <img id="imagePreview" class="image-preview" style="display: none;" alt="Image Preview" />

                        <button id="deleteButton" class="delete-button" style="display: none;" type="none">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>

                        <button id="acceptButton" class="delete-button" type="submit" style="display: none; left: 8px"
                            name="accept">
                            <i class="fa-solid fa-circle-check"></i>
                        </button>
                    </div>
                </div>
            </form>

            <label for="" class="timestamp">Gender</label>
            <form action="../php/edit-gender.php" method="post"
                style="justify-content: space-between; margin-top: 5px;">
                <div class="toolbar">
                    <label class="select" for="slct">
                        <select id="slct" required="required" name="gender">
                            <option value="" disabled="disabled" selected="selected"><?= $_SESSION['user']['sex'] ?>
                            </option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
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

                <button class="confirm-button" id="fname-confirm-button" type="submit" name="change">
                    <i class="fa-solid fa-circle-check"></i>
                </button>
            </form>
        </div>

        <div>
            <h1>Contact Information</h1>
            <!-- Email -->
            <label for="" class="timestamp">Email</label>
            <div style="display: flex; justify-content: space-between;">
                <form action="" method="post">
                    <a><?= $_SESSION['user']['email'] ?></a>
                </form>
            </div>

            <!-- Phone Number -->
            <label for="" class="timestamp">Phone Number</label>
            <div style="display: flex; justify-content: space-between;">
                <form action="" method="post">
                    <a><?= $_SESSION['user']['phone_number'] ?></a>
                </form>
            </div>
        </div>

        <form action="" method="post">

        </form>
    </div>
</div>

<!-- Posts Tab -->
<div id="posts" class="tabcontent" style="position: relative; top: 180px; z-index: 1;">
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
                    <button type="button" data-toggle="modal" data-target="#myModal" class="edit"
                        data-post-id="<?php echo $post['id']; ?>" data-post-title="<?php echo $post['title']; ?>"
                        data-post-content="<?php echo $post['content']; ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>

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

<div id="comments" class="tabcontent"></div>

<div id="upvoted" class="tabcontent"></div>

<div id="downvoted" class="tabcontent"></div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <i class="fa-solid fa-circle-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="edit-post">
                    <!-- Title -->
                    <label for="" class="timestamp">Title</label>
                    <div style="display: flex; justify-content: space-between;">
                        <form action="../php/edit-post-title.php" method="post" id="title-form">
                            <a id="title-current-input"></a>
                            <input type="hidden" name="post-id" id="post-id-title">
                            <input type="text" name="title" id="title-new-input">
                        </form>

                        <div style="display: flex;">
                            <button class="edit-button" id="title-edit-button">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>

                            <button class="discard-button" id="title-discard-button">
                                <i class="fa-solid fa-circle-xmark"></i>
                            </button>

                            <!-- <button class="confirm-button" id="title-confirm-button">
                                <i class="fa-solid fa-circle-check"></i>
                            </button> -->
                        </div>
                    </div>

                    <!-- Content -->
                    <label for="" class="timestamp">Content</label>
                    <div style="display: flex; justify-content: space-between;">
                        <form action="../php/edit-post-content.php" method="post" id="content-form">
                            <a id="content-current-input"></a>
                            <input type="hidden" name="post-id" id="post-id-content">
                            <textarea type="text" name="content" id="content-new-input"></textarea>
                        </form>

                        <div style="display: flex;">
                            <button class="edit-button" id="content-edit-button">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>

                            <button class="discard-button" id="content-discard-button">
                                <i class="fa-solid fa-circle-xmark"></i>
                            </button>

                            <!-- <button class="confirm-button" id="content-confirm-button">
                                <i class="fa-solid fa-circle-check"></i>
                            </button> -->
                        </div>
                    </div>

                    <!-- Image -->
                    <label for="" class="timestamp">Image</label>
                    <div style="display: flex; justify-content: space-between;">
                        <form action="../php/edit-post-image.php" method="post" id="image-form"
                            enctype="multipart/form-data">
                            <input type="hidden" name="post-id" id="post-id-image">
                            <input type="file" name="image" id="image-new-input" accept="image/*"
                                style="display: inline-block;">
                        </form>

                        <div style="display: flex;">
                            <button class="discard-button" id="image-discard-button">
                                <i class="fa-solid fa-circle-xmark"></i>
                            </button>

                            <!-- <button class="confirm-button" id="image-confirm-button">
                                <i class="fa-solid fa-circle-check"></i>
                            </button> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="confirm" id="confirm-button">
                    <i class="fa-solid fa-circle-check"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("defaultOpen").click();

    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;

        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // First Name
    document.getElementById('fname-edit-button').addEventListener('click', function () {
        var currentInput = document.getElementById('fname-current-input');
        var newInput = document.getElementById('fname-new-input');
        currentInput.style.display = 'none';
        newInput.style.display = 'inline-block';
        newInput.focus();
    });

    document.getElementById('fname-discard-button').addEventListener('click', function () {
        var currentInput = document.getElementById('fname-current-input');
        var newInput = document.getElementById('fname-new-input');
        currentInput.style.display = 'inline-block';
        newInput.style.display = 'none';
        newInput.value = "";
    });

    document.getElementById('fname-confirm-button').addEventListener('click', function () {
        var form = document.getElementById('fname-form');
        var newInput = document.getElementById('fname-new-input').value.trim();
        var pattern = /^[a-zA-Z\s]+$/;

        if (newInput == "" || newInput == null) {
            alert("Please enter a new first name.");
            return false;
        } else if (!pattern.test(newInput)) {
            alert("First name can only contain alphabets and spaces.");
            return false;
        } else {
            form.submit();
        }
    });


    // Middle Name
    document.getElementById('mname-edit-button').addEventListener('click', function () {
        var currentInput = document.getElementById('mname-current-input');
        var newInput = document.getElementById('mname-new-input');
        currentInput.style.display = 'none';
        newInput.style.display = 'inline-block';
        newInput.focus();
    });

    document.getElementById('mname-discard-button').addEventListener('click', function () {
        var currentInput = document.getElementById('mname-current-input');
        var newInput = document.getElementById('mname-new-input');
        currentInput.style.display = 'inline-block';
        newInput.style.display = 'none';
        newInput.value = "";
    });

    document.getElementById('mname-confirm-button').addEventListener('click', function () {
        var form = document.getElementById('mname-form');
        var newInput = document.getElementById('mname-new-input').value.trim();
        var pattern = /^[a-zA-Z\s]+$/;

        if (newInput != "" && !pattern.test(newInput)) {
            alert("Middle name can only contain alphabets and spaces.");
            return false;
        } else {
            form.submit();
        }
    });

    // Last Name
    document.getElementById('lname-edit-button').addEventListener('click', function () {
        var currentInput = document.getElementById('lname-current-input');
        var newInput = document.getElementById('lname-new-input');
        currentInput.style.display = 'none';
        newInput.style.display = 'inline-block';
        newInput.focus();
    });

    document.getElementById('lname-discard-button').addEventListener('click', function () {
        var currentInput = document.getElementById('lname-current-input');
        var newInput = document.getElementById('lname-new-input');
        currentInput.style.display = 'inline-block';
        newInput.style.display = 'none';
        newInput.value = "";
    });

    document.getElementById('lname-confirm-button').addEventListener('click', function () {
        var form = document.getElementById('lname-form');
        var newInput = document.getElementById('lname-new-input').value.trim();
        var pattern = /^[a-zA-Z\s]+$/;

        if (newInput == "" || newInput == null) {
            alert("Please enter a new last name.");
            return false;
        } else if (!pattern.test(newInput)) {
            alert("Last name can only contain alphabets and spaces.");
            return false;
        } else {
            form.submit();
        }
    });

    // Post Title
    document.getElementById('title-edit-button').addEventListener('click', function () {
        var currentInput = document.getElementById('title-current-input');
        var newInput = document.getElementById('title-new-input');
        currentInput.style.display = 'none';
        newInput.style.display = 'inline-block';
        newInput.focus();
    });

    document.getElementById('title-discard-button').addEventListener('click', function () {
        var currentInput = document.getElementById('title-current-input');
        var newInput = document.getElementById('title-new-input');
        currentInput.style.display = 'inline-block';
        newInput.style.display = 'none';
        newInput.value = "";
    });

    document.getElementById('confirm-button').addEventListener('click', function () {
        var titleForm = document.getElementById('title-form');
        var contentForm = document.getElementById('content-form');
        var imageForm = document.getElementById('image-form');
        var newTitle = document.getElementById('title-new-input').value.trim();
        var newContent = document.getElementById('content-new-input').value.trim();
        var newImage = document.getElementById('image-new-input').files[0];

        // if (newTitle == "" || newContent == "") {
        //     alert("Please enter");
        //     return false;
        // } else {
            titleForm.submit();
            contentForm.submit();
            imageForm.submit();
        // }
    });

    // Post Content
    document.getElementById('content-edit-button').addEventListener('click', function () {
        var currentInput = document.getElementById('content-current-input');
        var newInput = document.getElementById('content-new-input');
        currentInput.style.display = 'none';
        newInput.style.display = 'inline-block';
        newInput.focus();
    });

    document.getElementById('content-discard-button').addEventListener('click', function () {
        var currentInput = document.getElementById('content-current-input');
        var newInput = document.getElementById('content-new-input');
        currentInput.style.display = 'inline-block';
        newInput.style.display = 'none';
        newInput.value = "";
    });

    // Post Image
    var deleteImage = document.getElementById('image-discard-button');
    var imageInput = document.getElementById('image-new-input');
    deleteImage.addEventListener('click', () => {
        imageInput.value = '';
    });

    var modal = document.getElementById("myModal");
    var btn = document.getElementsByClassName("edit");

    for (var i = 0; i < btn.length; i++) {
        btn[i].onclick = function () {
            var id = this.getAttribute('data-post-id');
            var title = this.getAttribute('data-post-title');
            var content = this.getAttribute('data-post-content');
            document.getElementById('title-current-input').innerHTML = title;
            document.getElementById('content-current-input').innerHTML = content;
            var postIDtitle = document.getElementById('post-id-title');
            var postIDcontent = document.getElementById('post-id-content');
            var postIDimage =document.getElementById('post-id-image');
            postIDtitle.value = id;
            postIDcontent.value = id;
            postIDimage.value = id;
            console.log(postIDtitle.value, postIDcontent.value, postIDimage.value);
            modal.style.display = "block";
        }
    }

</script>
<script src="../js/add_post.js"></script>
<script src="../js/bootstrap.js"></script>