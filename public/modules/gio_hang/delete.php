<?php 
    if (empty($_SESSION['gio_hang'][$_GET['id']]) || !isset($_GET['id'])) {
        echo "<script>alert('Đã có lỗi xảy ra, vui lòng thử lại'); history.go(-1);</script>";
        return false;
    }

    $_SESSION['gio_hang']['tong_san_pham'] -= $_SESSION['gio_hang'][$_GET['id']]['so_luong'];
    unset($_SESSION['gio_hang'][$_GET['id']]);

    echo "<script>alert('Xóa sản phẩm khỏi giỏ hàng thành công'); history.go(-1);</script>";