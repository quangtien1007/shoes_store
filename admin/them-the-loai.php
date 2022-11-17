<?php 
    require_once '../library/init.php';
    if (isset($_POST['Them'])) {
        // echo 'ok';
        // Xử lý các giá trị 
        $Ten = isset($_POST['Ten']) ? trim(htmlspecialchars(addslashes($_POST['Ten']))) : '';
        if($Ten == "") {
            echo '<script>alert("Không được để trống tên")</script>';
        } else {
            $sql = "INSERT INTO theloai (Ten)
            VALUES ('$Ten');";
           $db->query($sql);
           new Redirect('the-loai.php');
        }
    }
?>

<?php 
    $title = 'Thêm thể loại';
    require_once 'layouts/header.php'; 
?>
    <!-- main -->
    <div class="main theloai">
        <div class="container">
            <h4 class="label label-primary">Thêm thể loại</h4>
            <form action="them-the-loai.php" method="post">
                <div class="form-group">
                  <label for="Ten">Tên thể loại</label>
                  <input type="text" name="Ten" class="form-control" id="Ten" required>
                </div>
                <button type="submit" class="btn btn-default" name="Them">Thêm</button>
              </form>
        </div>
    </div>
    <!-- //main -->
<?php 
    require_once 'layouts/footer.php'; 
?>