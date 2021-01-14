<?php
if(empty($_SESSION['dang-nhap'])) {
    echo "<script>alert('bạn cần đăng nhập'); window.location.replace('index.php?c=dashboard&a=dang_nhap');</script>";
}
else{
    $id=$_SESSION['dang-nhap']['id'];
    $sql = "select * from khach_hang where id = $id";
    $rs = mysqli_query($conn, $sql);
    while ($each = mysqli_fetch_array($rs)) {
        if (!$each['dia_chi'] || !$each['so_dien_thoai'] || !$each['email']) {
            echo "<script>alert('Bạn chưa cập nhật đầy đủ thông tin, mời xác nhận thông tin'); window.location.replace('index.php?c=khach_hang&a=cap_nhat')</script>";
        }
        else{
            
        }
    }
}

?>