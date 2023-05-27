<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/base.css">
</head>

<body>
    <div class="login-wrap">
        <section class="login-form-section">
            <input id="tab-1" type="radio" name="tab" class="sign-in-rdbtn" checked><label for="tab-1" class="tab">Sign In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up-rdbtn"><label for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">
                <!-- START of SIGN IN FORM  -->
                <form class="sign-in-form" action="controller/login_controller.php" method="post">
                    <div class="group">
                        <label for="user-sign-in" class="label">Username</label>
                        <input type="text" id="user-sign-in" class="input" name="name">
                    </div>
                    <div class="group">
                        <label for="password-sign-in" class="label">Password</label>
                        <input type="password" id="password-sign-in" class="input" name="password">
                    </div>
                    <div class="group">
                        <input type="checkbox" id="check" class="check" checked>
                        <label for="check"><span class="icon"></span> Keep me Signed in</label>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign In" name="Sign-In">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-link">
                        <a href="#forgot">Forgot Password?</a>
                    </div>
                </form>
                <!-- END of SIGN IN FORM  -->

                <!-- START of SIGN UP FORM  -->
                <form class="sign-up-form" action="./controller/login_controller.php" method="POST">
                    <div class="group">
                        <label for="user-sign-up" class="label">Username</label>
                        <input type="text" id="user-sign-up" class="input" name="name">
                    </div>
                    <div class="group">
                        <label for="email" class="label">Email address</label>
                        <input type="email" id="email" class="input" name="email">
                    </div>
                    <div class="group">
                        <label for="phone" class="label">Phone (recently used)</label>
                        <input type="tel" id="phone" class="input" name="phone">
                    </div>
                    <div class="group">
                        <label for="password-sign-up" class="label">Password</label>
                        <input type="password" id="password-sign-up" class="input" name="password">
                    </div>
                    <div class="group">
                        <label for="address" class="label">Current Address (For delivery)</label>
                        <input type="text" id="address" class="input" name="password">
                    </div>
                    <!-- <div class="group">
                        <label for="pass" class="label">Repeat Password</label>
                        <input id="pass" type="password" class="input" data-type="password">
                    </div> -->

                    <!-- <div class="social">
                        <h4>Sign Up with </h4>
                        <div class="go"><i class="fab fa-google"></i> Google</div>
                        <div class="fb"><i class="fab fa-facebook"></i> Facebook</div>
                    </div> -->
                    <div class="group button-flex">
                        <input type="submit" class="button success-border" value="Sign Up" name="Sign-Up">
                        <input type="reset" class="button warning-border" value="Cancel">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-link">
                        <a for="tab-1" id="reloadLink">Already Sign Up?</a>
                    </div>

                </form>
                <!-- END of SIGN UP FORM  -->
            </div>
        </section>
    </div>
    <?php
    if (isset($_SESSION["status-login"])) {
        $status = $_SESSION["status-login"];
        if ($status === "invalid") {
    ?>
            <div id="user-authentication-noti-overlay"></div>
            <div id="user-authentication-noti-form">
                <div>
                    <i class="fa-solid fa-face-grin-beam-sweat" id="sad-emoji"></i>
                    <h2>Wrong password or username </h2>
                </div>
                <a href="./login.php" class="information-bg">OK</a>
            </div>
        <?php
        } else if ($status === "valid") {
        ?>
            <div id="user-authentication-cart-noti-overlay"></div>
            <div id="user-authentication-noti-form">
                <div>
                    <i class="fa-regular fa-face-laugh-beam" id="smilly-emoji"></i>
                    <h2>Yey!, login successfully </h2>
                </div>
                <a href="./index.php" class="information-bg">OK</a>
            </div>
    <?php
        }
        unset($_SESSION["status-login"]); // Clear the status once it's displayed
    }
    ?>
    <script>
        var link = document.getElementById('reloadLink');
        link.addEventListener('click', function(event) {
            // Reload the page
            location.reload();
        });
    </script>
</body>

</html>