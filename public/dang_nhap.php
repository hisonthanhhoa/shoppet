
<div class="dang-nhap">
    <div class="form">
        <h2>Đăng Nhập</h2>
        <br>
        <form action="process.php" method="post" onsubmit="return formLogin()">
            <input type="text" name="ten_dang_nhap" id="ten_dang_nhap" placeholder="Tên đăng nhập">
            <br>
            <input type="password" name="mat_khau" id="mat_khau" placeholder="Mật khẩu">
            <br>
            <button type="submit" name="dang_nhap">Đăng nhập</button>
        </form>
        <br>
        <a href="index.php?c=dashboard&a=dang_ky">Chưa có tài khoản, ĐĂNG KÍ NGAY!</a>
    </div>
</div>