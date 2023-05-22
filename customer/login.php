<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                        <label for="user" class="label">Username</label>
                        <input id="user" type="text" class="input" name="name">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass" type="password" class="input" data-type="password" name="password">
                    </div>
                    <div class="group">
                        <input id="check" type="checkbox" class="check" checked>
                        <label for="check"><span class="icon"></span> Keep me Signed in</label>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign In" name="Sign-In">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a href="#forgot">Forgot Password?</a>
                    </div>
                </form>
                <!-- END of SIGN IN FORM  -->

                <!-- START of SIGN UP FORM  -->
                <form class="sign-up-form" action="./controller/login_controller.php" method="POST">
                    <div class="group">
                        <label for="user" class="label">Username</label>
                        <input id="user" type="text" class="input" name="name">
                    </div>
                    <div class="group">
                        <label for="email" class="label">Email address</label>
                        <input id="email" type="email" class="input" name="email">
                    </div>
                    <div class="group">
                        <label for="phone" class="label">Phone (recently used)</label>
                        <input id="phone" type="number" class="input" name="phone">
                    </div>
                    <div class="group">
                        <label for="password" class="label">Password</label>
                        <input id="password" type="password" class="input" data-type="password" name="password">
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
                    <div class="foot-lnk">
                        <label for="tab-1">Already Sign Up?</a>
                    </div>

                </form>
                <!-- END of SIGN UP FORM  -->
            </div>
        </section>
    </div>
</body>

</html>