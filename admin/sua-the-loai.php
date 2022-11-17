<?php 
    require_once '../library/init.php';
    if(isset($_GET['Id'])) {
        $get_Id = $_GET['Id'];
        $url = 'sua-the-loai.php?Id='.$get_Id;
        $sql_get_item = "SELECT * FROM theloai WHERE Id='$get_Id'";
        $theloai = $db->fetch_assoc($sql_get_item)[0];
    }
    if (isset($_POST['Sua'])) {
        // Xử lý các giá trị 
        $Ten = isset($_POST['Ten']) ? trim(htmlspecialchars(addslashes($_POST['Ten']))) : '';
        $Id = isset($_POST['Id']) ? trim(htmlspecialchars(addslashes($_POST['Id']))) : '';
        $url = isset($_POST['url']) ? trim(htmlspecialchars(addslashes($_POST['url']))) : '';
        if($Ten == "") {
            echo '<script>alert("Không được để trống")</script>';
            new Redirect("$url");
        } else {
            $sql = "UPDATE theloai
                    SET Ten = '$Ten'
                    WHERE Id = '$Id';";
           $db->query($sql);
           new Redirect("the-loai.php");
        }
    }
?>

<?php 
    $title = 'Sửa thể loại';
    require_once 'layouts/header.php'; 
?>
    <!-- main -->
    <div class="main theloai">
        <div class="container">
            <h4 class="label label-primary">Sửa thể loại</h4>
            <form action="sua-the-loai.php" method="post">
                <div class="form-group">
                  <label for="Ten">Tên thể loại</label>
                  <input type="text" name="Ten" class="form-control" id="Ten" value="<?php echo $theloai['Ten'] ?>" required>
                </div>
                <input type="hidden" name="Id" value="<?php echo $theloai['Id'] ?>">
                <input type="hidden" name="url" value="<?php echo $url ?>">
                <button type="submit" class="btn btn-default" name="Sua">Sửa</button>
              </form>
        </div>
    </div>
    <!-- //main -->
<?php 
    require_once 'layouts/footer.php'; 
?>