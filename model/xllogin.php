<?php
require_once '../library/init.php';
if (isset($_POST['Signin'])) {
    // echo 'ok';
    // Xử lý các giá trị 
    $Email = isset($_POST['Email']) ? trim(htmlspecialchars(addslashes($_POST['Email']))) : '';
    $Password = isset($_POST['Password']) ? trim(htmlspecialchars(addslashes($_POST['Password']))) : '';
    $Pass = md5($Password);

    if ($Email == "" || $Password == "") {
        echo '<script>alert("Không được để trống Email và Password")</script>';
    } else {
        $sql = "SELECT Email, Password FROM account WHERE Email = '$Email' AND Password = '$Pass' AND LoaiTK = 1";
        $sql1 = "SELECT Email, Password FROM account WHERE Email = '$Email' AND Password = '$Pass' AND LoaiTK = 2";
        $sql2 = "SELECT Id, Email, Password FROM account WHERE Email = '$Email' AND Password = '$Pass' AND LoaiTK = 2";
        if ($db->num_rows($sql)) {
            $db->close(); // Giải phóng
            $session->send($Email);
            new Redirect("../admin/the-loai.php");
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
        $insertStmt->bindParam(':password', md5($Password));
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
