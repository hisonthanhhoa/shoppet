<?php
if (empty($_SESSION['gio_hang'])) {
    $_SESSION['gio_hang'] = [];
    $_SESSION['gio_hang']['tong_san_pham'] = 0;
}

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT id, ten_san_pham, anh_san_pham, gia FROM quan_li_san_pham WHERE id = $id LIMIT 1";
    $rs = mysqli_query($conn, $sql);

    if (mysqli_num_rows($rs) == 0) {
        echo "<script>alert('Sản phẩm không phù hợp, vui lòng thử lại'); history.go(-1);</script>";
    }

    $each = mysqli_fetch_array($rs);

    if (empty($_SESSION['gio_hang'][$each['id']])) {
        $_SESSION['gio_hang'][$each['id']]['ten_san_pham'] = $each['ten_san_pham'];
        $_SESSION['gio_hang'][$each['id']]['anh_san_pham'] = $each['anh_san_pham'];
        $_SESSION['gio_hang'][$each['id']]['gia'] = $each['gia'];
        $_SESSION['gio_hang'][$each['id']]['so_luong'] = 1;
        $_SESSION['gio_hang']['tong_san_pham']++;

        echo "<script>alert('Thêm sản phẩm vào giỏ hàng thành công'); history.go(-1);</script>";
        
    } else {
        $_SESSION['gio_hang'][$each['id']]['so_luong']++;
        $_SESSION['gio_hang']['tong_san_pham']++;

        echo "<script>alert('Thêm sản phẩm vào giỏ hàng thành công'); history.go(-1);</script>";
    }
}


