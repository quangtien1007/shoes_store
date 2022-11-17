<?php
require_once '../library/init.php';
    $nd = isset($_POST['noidung']) ? $_POST['noidung'] : '';
    if($nd == '') {
        $sql_get_list = "SELECT * FROM sanpham ORDER BY Id ASC";
    } else {
        $sql_get_list = "SELECT * 
        FROM sanpham 
        INNER JOIN theloai ON sanpham.TheLoaiId = theloai.Id
        WHERE (sanpham.Ten LIKE '%$nd%') OR (sanpham.MoTa LIKE '%$nd%') OR (theloai.Ten LIKE '%$nd%')";
    }
    if($db->num_rows($sql_get_list)) {
        foreach ($db->fetch_assoc($sql_get_list) as $key => $sanpham) {
            $sql_get_item_theloai = 'SELECT * FROM theloai WHERE Id = "'.$sanpham["TheLoaiId"].'"';
            $tenpb = $db->fetch_assoc($sql_get_item_theloai)[0]['Ten'];
            echo 
            '
            <tr Id="'. $sanpham["Id"] .'" >
                <td>'. ($key + 1) .'</td>
                <td>'. $sanpham["Ten"] .'</td>
                <td>'. $sanpham["MoTa"] .'</td>
                <td>'. $sanpham["Gia"] .'</td>
                <td>
                <img width="120px" height="100px" src="../'. $sanpham["Anh1"] .'">
                <img width="120px" height="100px" src="../'. $sanpham["Anh2"] .'">
                <img width="120px" height="100px" src="../'. $sanpham["Anh3"] .'">
                </td>
                <th>
                    <a class="btn btn-info" href="sua-san-pham.php?Id='.$sanpham["Id"].'">Sửa</a>
                    <a class="btn btn-danger delete" Id="'. $sanpham["Id"] .'" data-href="xoa-san-pham.php?Id='.$sanpham["Id"].'">Xóa</a>
                </th>
            </tr>
            ';
        }
    }
?>