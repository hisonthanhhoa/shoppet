<?php
if (empty($_SESSION['gio_hang'][$_GET['id']]) || !isset($_GET['id'])) {
    echo "<script>alert('Đã có lỗi xảy ra, vui lòng thử lại'); history.go(-1);</script>";
    return false;
}

if ($_SESSION['gio_hang'][$_GET['id']]['so_luong'] == 1) {
    echo "<script>alert('Không thể giảm số lượng được nữa, hãy thử xóa'); history.go(-1);</script>";
    return false;
} else{
    $_SESSION['gio_hang'][$id]['so_luong']--;
$_SESSION['gio_hang']['tong_san_pham']--;

echo "<script>alert('Giảm số lượng sản phẩm thành công'); history.go(-1);</script>";
}
