<?php
require_once '../library/init.php';
if (isset($_POST['Login'])) {
    // echo 'ok';
    // Xử lý các giá trị 
    $Username = isset($_POST['Username']) ? trim(htmlspecialchars(addslashes($_POST['Username']))) : '';
    $Password = isset($_POST['Password']) ? trim(htmlspecialchars(addslashes($_POST['Password']))) : '';

    if ($Username == "" || $Password == "") {
        echo '<script>alert("Không được để trống Username và Password")</script>';
    } else {
        $sql = "SELECT Username, Password FROM account WHERE Username = '$Username' AND Password = '$Password' AND LoaiTK = '1'";
        $sql1 = "SELECT Username, Password FROM account WHERE Username = '$Username' AND Password = '$Password' AND LoaiTK = '2'";
        if ($db->num_rows($sql)) {
            $db->close(); // Giải phóng
            $session->send($Username);
            new Redirect("the-loai.php");
        } else if ($db->num_rows($sql1)) {
            $db->close(); // Giải phóng
            $session->send($Username);
            new Redirect("../index.php");
        } else {
            echo '<script>alert("Username hoặc Password không đúng")</script>';
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
        <div class="container">
            <div class="login-main">
                <h1>Login</h1>
                <div class="col-md-6 login-left">
                    <h2>Existing User</h2>
                    <form action="login.php" method="post">
                        <input type="text" name="Username" placeholder="Username" required="">
                        <input type="Password" name="Password" placeholder="Password" required="">
                        <input type="submit" name="Login" value="Login">
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!--log in end here-->

</body>

</html>