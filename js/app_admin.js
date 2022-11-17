$(document).ready(function() {
    // Xoa thể loại
    $('.theloai .delete').click(function() {
        let Id = $(this).parent().parent().attr('Id');
        let href = $(this).attr('data-href');
        $.ajax({
            url: href,
            type: 'GET',
        }).done(function(ketqua) {
            $('tr[Id='+Id+']').html("");
        });
    });

    // Xoa sản phẩm
    $('.sanpham .delete').click(function() {
        let Id = $(this).parent().parent().attr('Id');
        let href = $(this).attr('data-href');
        $.ajax({
            url: href,
            type: 'GET',
        }).done(function(ketqua) {
            $('tr[Id='+Id+']').html("");
        });
    });

    // Tìm kiếm sản phẩm ở client
    $('.sanpham #noidung').keyup(function(e) {
        $.ajax({
            url: 'tim-san-pham.php',
            type: 'POST',
            dataType: 'text',
            data: {
                noidung: $(".sanpham #noidung").val(),
            }
        }).done(function(ketqua) {
            $('.body-table-san-pham').html("");
            $('.body-table-san-pham').append(ketqua);
            });
    });
});