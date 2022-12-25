<!DOCTYPE HTML>
<html>

<head>
    <title>Login</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <!-- Custom Theme files -->
    <link href="../css/login.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="../model/xllogin.php" method="post">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span></span>
                <input type="text" name="Name" placeholder="Tên" />
                <input type="email" name="Email" placeholder="Email" />
                <input type="password" name="Password" placeholder="Password" />
                <input type="text" name="DiaChi" placeholder="Địa chỉ" />
                <input type="text" name="SDT" placeholder="Số điện thoại" />
                <button class="signup" name="Signup">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="../model/xllogin.php" method="post">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span></span>
                <input type="email" name="Email" placeholder="Email" />
                <input type="password" name="Password" placeholder="Password" />
                <a href="#">Forgot your password?</a>
                <button class="signin" name="Signin">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal details</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hi There!</h1>
                    <p>Enter your personal details to open an account with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/app_client.js" charset="utf-8"></script>
    <!--header end here-->
    <!--log in start here-->
    <!-- <div class="login">
        <div class="container-login">
            <div class="logins-main">
                <h1>Login</h1>
                <div class="col-md-6 login-left">
                    <h2>Existing User</h2>
                    <form action="login.php" method="post">
                        <input type="text" name="Email" placeholder="Email" required="">
                        <input type="Password" name="Password" placeholder="Password" required="">
                        <div class="item-login">
                            <ul class="li-login">
                                <li><input type="submit" name="Login" value="Login"></li>
                            </ul>
                            <ul class="li-login">
                                You don't have account? <li><a class="btn-signup" href="signup.php">Signup</a></li>
                            </ul>
                        </div>
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div> -->
    <!--log in end here-->
    <!-- <style>
        .container-login {
            width: 50%;
            margin-left: auto;
            margin-right: auto;
        }

        .item-login {
            display: flex;
            justify-content: space-between;
        }

        ul.li-login li {
            display: inline-block;
        }

        .li-login li a.btn-signup {
            font-size: 1em;
            color: #fff;
            padding: 0.4em 1.5em;
            border: none;
            background: #006340;
            outline: none;
            display: block;
            margin-top: 1em;
        }

        .li-login li a.btn-signup:hover {
            background: #847057;
        }
    </style> -->
</body>

</html>