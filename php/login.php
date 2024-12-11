<?php
// Check if an error message is passed in the query string
$errorMessage = isset($_GET['error']) ? $_GET['error'] : '';
session_start();
unset($_SESSION['Authorized']);
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="../style/login_style.css?version=4">
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
        <div class="forms">
            <div class="form-wrapper is-active">
                <button type="button" class="switcher switcher-login">
                    Sign In
                    <span class="underline"></span>
                </button>
                <form class="form form-login" action="../php/validateLogin.php" method="post">
                    <fieldset>
                        <legend>Please, enter your username and password for login.</legend>
                        <div class="input-block">
                            <label for="login-username">Username</label>
                            <input id="login-username" name="username" type="text" required>
                        </div>
                        <div class="input-block">
                            <label for="login-password">Password</label>
                            <input id="login-password" name="password" type="password" required>
                        </div>
                    </fieldset>
                    <div style="font-size: 14px; display: flex; justify-content: center;">
                        <?php
                        if (!empty($errorMessage)) {
                            echo "<p style='font-size: 14px; color: white; margin: 0px;'>$errorMessage</p>";
                        }
                        ?>
                    </div>
                    <button type="submit" class="btn-login">Login</button>
                </form>
            </div>
            <div class="form-wrapper">
                <button type="button" class="switcher switcher-signup">
                    Sign Up
                    <span class="underline"></span>
                </button>
                <form class="form form-signup" action="register.php" method="post" id="signup"
                    onsubmit="return validateForm()">
                    <fieldset>
                        <legend>Please, enter your email, username, password and password confirmation for sign up.
                        </legend>
                        <div class="input-block">
                            <label for="signup-fname">First Name</label>
                            <input id="signup-fname" type="text" name="fname" required>
                        </div>
                        <div class="input-block">
                            <label for="signup-mname">Middle Name</label>
                            <input id="signup-mname" type="text" name="mname">
                        </div>
                        <div class="input-block">
                            <label for="signup-lname">Last Name</label>
                            <input id="signup-lname" type="text" name="lname" required>
                        </div>
                    </fieldset>
                    <button type="submit" class="btn-signup" name="continue">Continue</button>
                </form>
            </div>
        </div>
    </section>
    <script>
        const switchers = [...document.querySelectorAll('.switcher')];

        switchers.forEach(item => {
            item.addEventListener('click', function () {
                switchers.forEach(item => item.parentElement.classList.remove('is-active'))
                this.parentElement.classList.add('is-active')
            })
        });

        function validateForm() {
            var firstName = document.getElementById("signup-fname").value.trim();
            var middleName = document.getElementById("signup-mname").value.trim();
            var lastName = document.getElementById("signup-lname").value.trim();
            var pattern = /^[a-zA-Z\s]+$/;

            if (!pattern.test(firstName)) {
                alert("First name can only contain alphabets and spaces");
                return false;
            } else if (middleName !== "" && !pattern.test(middleName)) {
                alert("Middle name can only contain alphabets and spaces");
                return false;
            } else if (!pattern.test(lastName)) {
                alert("Last name can only contain alphabets and spaces");
                return false;
            }
            return true;
        }
    </script>
</body>

</html>

