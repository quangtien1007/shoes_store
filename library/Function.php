<?php
 
// Hàm điều hướng trang
class Redirect {
    public function __construct($url = null) {
        if ($url)
        {
            echo '<script>location.href="'.$url.'";</script>';
        }
    }
}


class UploadImage {
    private $check;
    
    public function get_check() {
        return $this->check;
    }

    public function __construct($name = null) {
        $this->check = 0;
        $target_dir = "../images/";
        // Kiểm tra là ảnh giả hay ảnh thật
        $check = getimagesize($_FILES[$name]["tmp_name"]);
        if($check == false) {
            echo '<script>alert("File ' .basename($_FILES[$name]["name"]). 'is not an image")</script>';
        } else {
            // kiểm tra kích thước cho phép đơn vị byte
            if ($_FILES[$name]["size"] > 5000000) {
                echo "<script>alert('Sorry, your file ".basename($_FILES[$name]["name"]). " is too large.')</script>";
            } else {
                // Kiểm tra file có tồn tại trong sever hay chưa, nếu tồn tại thì đổi tên file
                $target_file = $target_dir . basename($_FILES[$name]["name"]);
                // cái target_file_out này để lấy đường link lưu vào cơ sở dữ liệu
                $target_file_out = "images/".basename($_FILES[$name]["name"]);
                $i = 0;
                while (file_exists($target_file)) {
                    $target_file = $target_dir . $i .basename($_FILES[$name]["name"]);
                    $target_file_out = "images/". $i .basename($_FILES[$name]["name"]);
                    $i = $i + 1;
                }
                // Kiểm tra định dạng ảnh cho phép
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
                } else {
                    if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
                        $this->check = $target_file_out;
                    } else {
                        echo "<script>alert('Sorry, there was an error uploading your file ".basename($_FILES[$name]["name"]). "')</script> ";
                    }
                }
            }
        }
    }
}


 
?>