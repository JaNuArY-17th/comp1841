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

                        <button id="acceptButton" class="delete-button" type="submit" style="display: none; left: 8px"
                            name="accept">
                            <i class="fa-solid fa-circle-check"></i>
                        </button>
                    </div>
                </div>
            </form>
            <button id="deleteButton" class="delete-button" style="display: none;" type="none">
                <i class="fa-solid fa-trash-can"></i>
            </button>

            <!-- Gender -->
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
                <form action="../php/edit-email.php" method="post" id="email-form">
                    <a id="email-current-input"><?= $_SESSION['user']['email'] ?></a>
                    <input type="text" name="email" id="email-new-input">
                    <input type="submit" name="confirm" id="edit-email-confirm">
                </form>

                <div style="display: flex;">
                    <button class="edit-button" id="email-edit-button">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>

                    <button class="discard-button" id="email-discard-button">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </button>

                    <button class="confirm-button" id="email-confirm-button">
                        <i class="fa-solid fa-circle-check"></i>
                    </button>
                </div>
            </div>

            <!-- Phone Number -->
            <label for="" class="timestamp">Phone Number</label>
            <div style="display: flex; justify-content: space-between;">
                <form action="../php/edit-phone.php" method="post" id="phone-form">
                    <a id="phone-current-input"><?= $_SESSION['user']['phone_number'] ?></a>
                    <input type="text" name="phone" id="phone-new-input" maxlength="10">
                    <input type="submit" name="confirm" id="edit-phone-confirm">
                </form>

                <div style="display: flex;">
                    <button class="edit-button" id="phone-edit-button">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>

                    <button class="discard-button" id="phone-discard-button">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </button>

                    <button class="confirm-button" id="phone-confirm-button">
                        <i class="fa-solid fa-circle-check"></i>
                    </button>
                </div>
            </div>
        </div>
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
                <form action="../php/edit-post.php" method="post" id="edit-post" style="flex-direction: column;"
                    enctype="multipart/form-data">
                    <input type="hidden" name="post-id" id="post-id">
                    <div>
                        <label for="" class="timestamp">Title</label>
                        <input type="text" name="title" id="title-new-input">
                    </div>

                    <div>
                        <label for="" class="timestamp">Content</label>
                        <textarea type="text" name="content" id="content-new-input"></textarea>
                    </div>

                    <div>
                        <label for="" class="timestamp">Image</label>
                        <div style="display: flex; justify-conter: space-between; align-items: center;">
                            <input type="file" name="image" id="image-new-input" accept="image/*">
                            <button type="button" id="discard-image-button" class="discard-button">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>

                    </div>
                </form>


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

        if (!pattern.test(newInput)) {
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

    // Email
    document.getElementById('email-edit-button').addEventListener('click', function () {
        var currentInput = document.getElementById('email-current-input');
        var newInput = document.getElementById('email-new-input');
        currentInput.style.display = 'none';
        newInput.style.display = 'inline-block';
        newInput.focus();
    });

    document.getElementById('email-discard-button').addEventListener('click', function () {
        var currentInput = document.getElementById('email-current-input');
        var newInput = document.getElementById('email-new-input');
        currentInput.style.display = 'inline-block';
        newInput.style.display = 'none';
        newInput.value = "";
    });

    document.getElementById('email-confirm-button').addEventListener('click', function () {
        var confirm = document.getElementById('edit-email-confirm');
        confirm.click();
    });

    document.getElementById('email-form').addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent default form submission

        const emailInput = document.getElementById('email-new-input');
        const email = emailInput.value;

        if (!email) {
            alert("Please enter an email.");
            return;
        }

        // AJAX request to check if email exists
        fetch('../php/check-email.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({ email: email })
        })
            .then(response => response.json())
            .then(data => {
                if (data.exists) {
                    alert("Email already exists.");
                } else if (data.error) {
                    alert(`Error: ${data.error}`);
                } else {
                    e.target.submit(); // Submit the form programmatically
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert("An error occurred while checking the email.");
            });
    });

    // Phone Number
    document.getElementById('phone-edit-button').addEventListener('click', function () {
        var currentInput = document.getElementById('phone-current-input');
        var newInput = document.getElementById('phone-new-input');
        currentInput.style.display = 'none';
        newInput.style.display = 'inline-block';
        newInput.focus();
    });

    document.getElementById('phone-discard-button').addEventListener('click', function () {
        var currentInput = document.getElementById('phone-current-input');
        var newInput = document.getElementById('phone-new-input');
        currentInput.style.display = 'inline-block';
        newInput.style.display = 'none';
        newInput.value = "";
    });

    document.getElementById('phone-new-input').addEventListener('input', function () {
        var value = this.value;
        if (!/^\d+$/.test(value)) {
            this.value = value.replace(/[^0-9]/g, '');
        }
    });

    document.getElementById('phone-confirm-button').addEventListener('click', function () {
        var confirm = document.getElementById('edit-phone-confirm');
        confirm.click();
    });

    document.getElementById('phone-form').addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent default form submission

        const phoneInput = document.getElementById('phone-new-input');
        const phone = phoneInput.value;

        if (!phone) {
            alert("Please enter a phone number.");
            return;
        }

        // AJAX request to check if email exists
        fetch('../php/check-phone.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({ phone: phone })
        })
            .then(response => response.json())
            .then(data => {
                if (data.exists) {
                    alert("Phone number already exists.");
                } else if (data.error) {
                    alert(`Error: ${data.error}`);
                } else {
                    e.target.submit(); // Submit the form programmatically
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert("An error occurred while checking the email.");
            });
    });

    // Post 
    document.getElementById('confirm-button').addEventListener('click', function () {
        var editPost = document.getElementById('edit-post');
        var newTitle = document.getElementById('title-new-input').value.trim();
        var newContent = document.getElementById('content-new-input').value.trim();
        var newImage = document.getElementById('image-new-input').files[0];

        if (newTitle == "" && newContent == "") {
            alert("Please enter new Title and new Content");
            return false;
        } else {
            editPost.submit();
        }
    });

    // Post Image
    var discardImage = document.getElementById('discard-image-button');
    var imageInput = document.getElementById('image-new-input');

    discardImage.addEventListener('click', () => {
        imageInput.value = '';
    });

    var modal = document.getElementById("myModal");
    var btn = document.getElementsByClassName("edit");

    for (var i = 0; i < btn.length; i++) {
        btn[i].onclick = function () {
            var id = this.getAttribute('data-post-id');
            var currentTitle = this.getAttribute('data-post-title');
            var currentContent = this.getAttribute('data-post-content');

            var postID = document.getElementById('post-id');
            var title = document.getElementById('title-new-input');
            var content = document.getElementById('content-new-input')
            title.value = currentTitle;
            content.value = currentContent;
            postID.value = id;
            modal.style.display = "block";
        }
    }

</script>
<script src="../js/add_post.js"></script>
<script src="../js/bootstrap.js"></script>