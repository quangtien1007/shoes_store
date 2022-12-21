<?php
require_once '../library/init.php';
if (isset($_POST['Login'])) {
    // echo 'ok';
    // Xử lý các giá trị 
    $Email = isset($_POST['Email']) ? trim(htmlspecialchars(addslashes($_POST['Email']))) : '';
    $Password = isset($_POST['Password']) ? trim(htmlspecialchars(addslashes($_POST['Password']))) : '';

    if ($Email == "" || $Password == "") {
        echo '<script>alert("Không được để trống Email và Password")</script>';
    } else {
        $sql = "SELECT Email, Password FROM account WHERE Email = '$Email' AND Password = '$Password' AND LoaiTK = 1";
        $sql1 = "SELECT Email, Password FROM account WHERE Email = '$Email' AND Password = '$Password' AND LoaiTK = 2";
        $sql2 = "SELECT Id, Email, Password FROM account WHERE Email = '$Email' AND Password = '$Password' AND LoaiTK = 2";
        if ($db->num_rows($sql)) {
            $db->close(); // Giải phóng
            $session->send($Email);
            new Redirect("the-loai.php");
        } else if ($db->num_rows($sql1)) {
            $id = $db->fetch_assoc($sql2)[0];
            $_SESSION["id_kh"] = $id["Id"];
            $_SESSION["email"] = $Email;
            $db->close(); // Giải phóng
            $session->send($Email);
            new Redirect("../index.php");
        } else {
            echo '<script>alert("Email hoặc Password không đúng")</script>';
        }
    }
}
?>



<!DOCTYPE HTML>
<html>

<head>
    <title>Login</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <!-- Custom Theme files -->
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="js/bootstrap.min.js"></script>
</head>

<body>

    <!--header end here-->
    <!--log in start here-->
    <div class="login">
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
    </div>
    <!--log in end here-->
    <style>
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
    </style>
</body>

</html>