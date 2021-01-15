<?php
if (empty($_SESSION['dang-nhap'])) {
    echo "<script>alert('bạn cần đăng nhập'); window.location.replace('index.php?c=dashboard&a=dang_nhap');</script>";
} else {
    $id = $_SESSION['dang-nhap']['id'];
    $so_dien_thoai = $_POST['so_dien_thoai'];
    $dia_chi = $_POST['dia_chi'];
    $sql = "select * from khach_hang where id = $id LIMIT 1";
    $rs = mysqli_query($conn, $sql);
    $each = mysqli_fetch_array($rs);
    if (!$each['dia_chi'] || !$each['so_dien_thoai'] || !$each['email']) {
        echo "<script>alert('Bạn chưa cập nhật đầy đủ thông tin, mời xác nhận thông tin'); window.location.replace('index.php?c=khach_hang&a=cap_nhat')</script>";
    } else {
        $sql = "insert into quan_li_hoa_don(id_khach_hang, so_dien_thoai, dia_chi) values
    ($id, '$so_dien_thoai', '$dia_chi')";
        $rs = mysqli_query($conn, $sql);
        //Chọn mã hóa đơn
        $ma_hoa_don = mysqli_query($conn, "select max(id) as id from quan_li_hoa_don where id_khach_hang = $id");
        $each = mysqli_fetch_assoc($ma_hoa_don);

        $ma_hoa_don = $each['id'];
        foreach ($_SESSION['gio_hang'] as $ma_san_pham => $san_pham) :
            if ($ma_san_pham != 'tong_san_pham') {
                $gia = $san_pham['gia'];
                $so_luong = $san_pham['so_luong'];
                $sql = "insert into quan_li_chi_tiet_hoa_don(id_hoa_don, id_san_pham, gia, so_luong) values ($ma_hoa_don, $ma_san_pham, $gia, $so_luong)";
                $rs = mysqli_query($conn, $sql);


                if (!$rs) {
                    echo "<script>alert('Đặt hàng thất bại, vui lòng thử lại sau'); history.go(-1);</script>";
                } else {
                    unset($_SESSION['gio_hang']);
                    // echo "<script>alert('Đặt hàng thành công'); window.location.replace('index.php');</script>";

                }
            }
        endforeach;
    }
}
?>
<script>
    alert('Đặt hàng thành công, đơn hàng của bạn sẽ được cửa hàng xác nhận trong thời gian tới!');
    window.location.replace('index.php');
</script>
