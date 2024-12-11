<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../style/login_style.css?version=6">
    <script src="https://kit.fontawesome.com/fd40214cfa.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <section class="forms-section">
        <div class="logos">
            <div class="logo">
                <img src="../images/logos/gw_logo.png" alt="GreenWich Logo">
            </div>
            <div class="fpt-logo">
                <img src="../images/logos/fpt_logo.png" alt="FPT Logo">
            </div>
        </div>
        <h1 class="section-title">Login & Register</h1>

        <div style="width: 25%;">
            <form action="create-user.php" method="post" class="form" enctype="multipart/form-data">
                <div class="input-block" id="register-form">
                    <label for="">First Name</label>
                    <input type="text" name="fname" value="<?= $fname ?>" required>

                    <label for="">Middle Name</label>
                    <input type="text" name="mname" value="<?= $mname ?>">

                    <label for="">Last Name</label>
                    <input type="text" name="lname" value="<?= $lname ?>" required>

                    <label for="">Gender</label>
                    <div class="toolbar">
                        <label class="select" for="slct">
                            <select id="slct" required name="gender">
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

                    <label for="">Email</label>
                    <input type="email" name="email" id="email-input" required>

                    <label for="">Phone Number</label>
                    <input type="text" name="phone" id="phone" maxlength="10" required>

                    <label for="">Username</label>
                    <input type="text" name="username" maxlength="55" required>

                    <label for="">Password</label>
                    <input type="password" name="password" id="password" maxlength="255" required>

                    <label for="">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm-password" maxlength="255" required>

                    <label for="">Avatar</label>
                    <div class="upload-container">
                        <input type="file" id="fileInput" class="file-input" name="image_path" accept="image/*"
                            required />
                        <label for="fileInput" id="upload-label">
                            <span>Upload media</span>
                            <div class="upload-icon">
                                <i class="fa-solid fa-upload"></i>
                            </div>
                        </label>
                        <div class="preview-wrapper">
                            <img id="blurredBackground" class="blurred-background" style="display: none;"
                                alt="Blurred Background" />
                            <img id="imagePreview" class="image-preview" style="display: none;" alt="Image Preview" />
                        </div>
                    </div>
                    <button type="submit" class="btn-login" name="submit" style="float: right;">Submit</button>
                </div>
            </form>
        </div>

    </section>

    <script src="../js/add_post.js"></script>
    <script>
        document.getElementById('phone').addEventListener('input', function () {
            var value = this.value;
            if (!/^\d+$/.test(value)) {
                this.value = value.replace(/[^0-9]/g, '');
            }
        });

        document.querySelector('.form').addEventListener('submit', function (event) {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirm-password').value;

            if (password !== confirmPassword) {
                event.preventDefault();
                alert('Password and Confirm Password do not match.'); 
            } 
        });
    </script>
</body>