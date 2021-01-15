<?php
    include_once('check_login.php');
    require_once('../config.php');

    if ($dang_nhap) {
        header('location: index.php');
    }

    if (isset($_POST['dang_nhap'])) {
        $ten_dang_nhap = $_POST['ten_dang_nhap'];
        $mat_khau = $_POST['mat_khau'];

        $query = "SELECT id, ten_dang_nhap, mat_khau, level FROM admin WHERE ten_dang_nhap = '$ten_dang_nhap' LIMIT 1";

        $rs = mysqli_query($conn, $query);

        if (!$rs) {
            // Hiển thị ra thông báo không tồn tại tài khoản
            
        }

        $row = mysqli_fetch_array($rs);

        if (!hash_equals($row['mat_khau'], crypt($mat_khau, $row['mat_khau']))) {
            // Hiển thị ra thông báo sai mật khẩu
    
        } else {
            $_SESSION['admin_login']['id'] = $row['id'];
            $_SESSION['admin_login']['ten_dang_nhap'] = $row['ten_dang_nhap'];
            $_SESSION['admin_login']['level'] = $row['level'];

            header('location: index.php');
        }

    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>*{
    margin: 0;
    padding: 0;
}
body{
    margin: auto;
    padding: 0;
}
.dang-nhap{
    width: 600px;
    padding: 14% 0 0;
    margin: auto;
}
.form {
    position: relative;
    z-index: 1;
    background: #FFFFFF;
    max-width: 600px;
    margin: 0 auto 50px;
    padding: 50px;
    text-align: center;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
  }
  .form input {
    font-family: "Roboto", sans-serif;
    outline: 0;
    background: #f2f2f2;
    width: 80%;
    border: 0;
    margin: 0 0 15px;
    padding: 15px;
    box-sizing: border-box;
    font-size: 14px;
  }
  .form button {
    font-family: "Roboto", sans-serif;
    text-transform: uppercase;
    outline: 0;
    background: #4CAF50;
    width: 80%;
    border: 0;
    padding: 15px;
    color: #FFFFFF;
    font-size: 14px;
    -webkit-transition: all 0.3 ease;
    transition: all 0.3 ease;
    cursor: pointer;
  }
  .form button:hover, .form button:active, .form button:focus {
    background: #43A047;
  }</style>
<body>
    <?= isset($_COOKIE['error_login']) ? $_COOKIE['error_login'] : '' ?>
    <div class="dang-nhap">
        <div class="form">
           <h2>ADMIN</h2>
    <form action="login.php" method="post">
        <br>
        <input type="text" name="ten_dang_nhap" placeholder="tên đăng nhập" id="">
        <br>
        <input type="password" name="mat_khau"  placeholder="mật khẩu" id="">
        <br>
        <button type="submit" name="dang_nhap">Đăng Nhập</button>
    </form>
    </div>
    </div>
    
</body>
</html>