<style>
*{
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
<div class="dang-nhap">
        <div class="form">
            <h2>Đăng Kí Thành Viên</h2>
            <br>
            <form action="process.php" method="post">
                <input type="text" name="ho_va_ten" id="ho_va_ten" placeholder="Họ và Tên">
                <br>
                <input type="text" name="ten_dang_nhap" id="ten_dang_nhap" placeholder="Tên đăng nhập">
                <br>
                <input type="password" name="mat_khau" id="mat_khau" placeholder="Mật khẩu">
                <br>
                <input type="password" name="nhap_lai_mat_khau" id="nhap_lai_mat_khau" placeholder="Nhập lại mật khẩu">
                <br>
                <button type="submit" name="dang_ki">Đăng Kí</button>
            </form>
            <br>
            <a href="index.php?c=dashboard&a=dang_nhap">Đã có tài khoản, ĐĂNG NHÂP?</a>
        </div>
    </div>
