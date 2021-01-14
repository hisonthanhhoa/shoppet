<?php
include('../config.php');

session_start();
// return $dang_nhap = isset($_SESSION['dang_nhap']) ? true : false;
//Xử lí đăng nhập
if (isset($_SESSION['dang-nhap'])) {
    echo "<script>alert('Bạn đã đăng nhập với tài khoản" . $_SESSION['ten-dang-nhap'] . "'); window.location.replace('index.php?c=dashboard&a=index');</script>";
} else {
    //Xử lí đăng nhập

    if (isset($_POST['dang_nhap'])) {

        $ten_dang_nhap = $_POST['ten_dang_nhap'];
        $mat_khau = md5(($_POST['mat_khau']));

        //Kiểm tra tên đăng nhập
        $sql = "select id, ten_dang_nhap, mat_khau from khach_hang where ten_dang_nhap = '$ten_dang_nhap'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 0) {
            echo "<script>alert('Tài khoản không tồn tại hoặc sai'); history.go(-1);</script>";
            exit;
        }
        $row = mysqli_fetch_array($result);

        if ($row['mat_khau'] != md5($salt . $mat_khau)) {
            echo "<script>alert('Tên đăng nhập hoặc mật khẩu không chính xác'); history.go(-1);</script>";
            exit;
        }
        $_SESSION['dang-nhap']['ten-dang-nhap'] = $ten_dang_nhap;
        $_SESSION['dang-nhap']['id'] = $row['id'];
        //die($_SESSION['dang-nhap']);
        echo "<script>alert('Bạn đã đăng nhập với tài khoản " . $ten_dang_nhap . "'); window.location.replace('index.php?c=dashboard&a=index');</script>";
    }
}
//Xử lí đăng kí
if (isset($_POST['dang_ki'])) {

    $ho_va_ten = $_POST['ho_va_ten'];
    $ten_dang_nhap = $_POST['ten_dang_nhap'];
    $mat_khau = md5($_POST['mat_khau']);

    //Kiểm tra tên đăng nhập đã tồn tại hay chưa
    $sql = "select ten_dang_nhap from khach_hang where ten_dang_nhap = '$ten_dang_nhap'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        echo "<script>alert('Tài khoản đã tồn tại'); history.go(-1);</script>";
        exit;
    }
    //Mã hóa mật khẩu
    $mat_khau = md5($salt . $mat_khau);
    $sql = "insert into khach_hang( ten_dang_nhap, mat_khau, ho_ten) values
            ( '$ten_dang_nhap', '$mat_khau', '$ho_va_ten') ";
           // die($sql);
    $rs = mysqli_query($conn, $sql);

    if ($rs) {
        echo "<script>alert('Bạn đã tạo tài khoản thành công'); window.location.replace('index.php?c=dashboard&a=dang_nhap')</script>";
    }
    echo "<script>alert('Có lỗi xảy ra, vui lòng thử lại sau');</script>";
}
