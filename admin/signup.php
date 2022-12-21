<?php
require_once '../library/config.php';
session_start();
if (isset($_POST['Signup'])) {
    // echo 'ok';
    // Xử lý các giá trị 
    $Password = isset($_POST['Password']) ? trim(htmlspecialchars(addslashes($_POST['Password']))) : '';
    $Name = isset($_POST['Name']) ? trim(htmlspecialchars(addslashes($_POST['Name']))) : '';
    $Email = isset($_POST['Email']) ? trim(htmlspecialchars(addslashes($_POST['Email']))) : '';
    $DiaChi = isset($_POST['DiaChi']) ? trim(htmlspecialchars(addslashes($_POST['DiaChi']))) : '';
    $SDT = isset($_POST['SDT']) ? trim(htmlspecialchars(addslashes($_POST['SDT']))) : '';
    $Loai = 2;
    if ($Email == "" || $Password == "") {
        echo '<script>alert("Không được để trống Username và Password")</script>';
    } else {
        $insertStmt = $db_conn->prepare("INSERT INTO account (LoaiTK, HoVaTen, SDT, DiaChi, Password, Email) VALUES (:loai, :hovaten, :sdt, :diachi, :password, :email);");

        $insertStmt->bindParam(':loai', $Loai);
        $insertStmt->bindParam(':hovaten', $Name);
        $insertStmt->bindParam(':sdt', $SDT);
        $insertStmt->bindParam(':diachi', $DiaChi);
        $insertStmt->bindParam(':password', $Password);
        $insertStmt->bindParam(':email', $Email);

        $insertStmt->execute();

        $arr = explode("@", $Email, 2);
        $cartName = $arr[0] . '_cart';

        //tao bang cho user moi dang ky tai khoan
        $createTableSql = "CREATE TABLE $cartName (
        Id INT(40) AUTO_INCREMENT PRIMARY KEY,
        IdSP INT(40) NOT NULL,
        IdKH INT(11) NOT NULL,
        TenSP VARCHAR(60) NOT NULL,
        Gia FLOAT(50) NOT NULL,
        HinhAnh VARCHAR(255) NOT NULL,
        Size INT(11) NOT NULL,
        SoLuong INT(20) NOT NULL,
        ThanhTien FLOAT(50) NOT NULL
        );";

        $db_conn->exec($createTableSql);

        header("location: login.php");
        $_SESSION['email'] = $Email;
    }
}
/*
$updateCart = "UPDATE $cartName SET Size='$Size', DiaChi='$DiaChi', SoLuong='$SoLuong' WHERE Id = $Id_Cart";
        $updateDonhang = "UPDATE donhang SET Size='$Size', SoLuong='$SoLuong', DiaChi='$DiaChi', GhiChu='$GhiChu' WHERE Id = $Id_Cart";
*/
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
                        <input type="text" name="Name" placeholder="Họ tên" required="">
                        <input type="text" name="Email" placeholder="Email" required="">
                        <input type="text" name="DiaChi" placeholder="Địa chỉ" required="">
                        <input type="text" name="SDT" placeholder="Số điện thoại" required="">
                        <input type="Password" name="Password" placeholder="Password" required="">
                        <input type="submit" name="Signup" value="Signup">
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