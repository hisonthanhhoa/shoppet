<?php

//Cập nhật thông tin khách hàng
if (isset($_POST['cap_nhat_thong_tin'])) {
    $ho_ten = $_POST['ho_va_ten'];
    $id = $_SESSION['dang-nhap']['id'];
    $dia_chi = $_POST['dia_chi'];
    $so_dien_thoai = $_POST['so_dien_thoai'];
    $email = $_POST['email'];

    $sql = "update khach_hang set
    ho_ten = '$ho_va_ten',
    dia_chi = '$dia_chi',
    so_dien_thoai = '$so_dien_thoai',
    email = '$email'
    where id = $id
    ";

    $rs = mysqli_query($conn, $sql);

    if ($rs) {
        echo "<script>alert('Cập nhật thông tin thành công'); window.location.replace('index.php');</script>";
    } else {
        echo "<script>alert('Cập nhật thông tin thất bại'); history.go(-1);</script>";
    }
}