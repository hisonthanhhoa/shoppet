<?php
if (empty($_SESSION['gio_hang'][$_GET['id']]) || !isset($_GET['id'])) {
    echo "<script>alert('Đã có lỗi xảy ra, vui lòng thử lại'); history.go(-1);</script>";
    return false;
}

$id = $_GET['id'];

$query = "SELECT * FROM quan_li_san_pham WHERE id = $id LIMIT 1";

$rs = mysqli_query($conn, $query);

$each = mysqli_fetch_array($rs);

if ($_SESSION['gio_hang'][$_GET['id']]['so_luong'] == $each['so_luong']) {
    echo "<script>alert('Đã đạt số lượng tối đa của sản phẩm'); history.go(-1);</script>";
    return false;
}

$_SESSION['gio_hang'][$id]['so_luong']++;
$_SESSION['gio_hang']['tong_san_pham']++;

echo "<script>alert('Tăng số lượng sản phẩm thành công'); history.go(-1);</script>";