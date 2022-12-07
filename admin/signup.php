<?php
require_once '../library/config.php';
session_start();
if (isset($_POST['Login'])) {
    // echo 'ok';
    // Xử lý các giá trị 
    $Password = isset($_POST['Password']) ? trim(htmlspecialchars(addslashes($_POST['Password']))) : '';
    $Name = isset($_POST['Name']) ? trim(htmlspecialchars(addslashes($_POST['Name']))) : '';
    $Email = isset($_POST['Email']) ? trim(htmlspecialchars(addslashes($_POST['Email']))) : '';
    $Loai = 2;
    if ($Email == "" || $Password == "") {
        echo '<script>alert("Không được để trống Username và Password")</script>';
    } else {
        $insertStmt = $db_conn->prepare("INSERT INTO account (LoaiTK, HoVaTen, Password, Email) VALUES (:loai, :hovaten, :password, :email);");

        $insertStmt->bindParam(':loai', $Loai);
        $insertStmt->bindParam(':hovaten', $Name);
        $insertStmt->bindParam(':password', $Password);
        $insertStmt->bindParam(':email', $Email);

        $insertStmt->execute();

        $arr = explode("@", $Email, 2);
        $cartName = $arr[0] . '_cart';

        $createTableSql = "CREATE TABLE $cartName (
        Id INT(40) AUTO_INCREMENT PRIMARY KEY,
        IdSP INT(40) NOT NULL,
        TenSP VARCHAR(60) NOT NULL,
        Gia FLOAT(50) NOT NULL,
        HinhAnh VARCHAR(255) NOT NULL,
        Size INT(11) NOT NULL,
        DiaChi VARCHAR(255) NOT NULL,
        SoLuong INT(20) NOT NULL,
        ThanhTien FLOAT(50) NOT NULL
        );";

        $db_conn->exec($createTableSql);

        header("location: login.php");
        $_SESSION['email'] = $Email;
    }
}
?>



<!DOCTYPE HTML>
<html>

<head>
    <title>Signup</title>
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
    <!--signup start here-->
    <div class="login">
        <div class="container-signup">
            <div class="signup-main">
                <h1>Sign up</h1>
                <div class="col-md-6 login-left">
                    <h2>Create new account</h2>
                    <form action="signup.php" method="post">
                        <input type="text" name="Name" placeholder="Your name" required="">
                        <input type="text" name="Email" placeholder="Email" required="">
                        <input type="Password" name="Password" placeholder="Password" required="">
                        <input type="submit" name="Login" value="Login">
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!--sign up end here-->
    <style>
        .container-signup {
            width: 50%;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</body>

</html>