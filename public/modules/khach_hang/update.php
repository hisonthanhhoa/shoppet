
<?php
    $id = $_SESSION['dang-nhap']['id'];
    $sql = "select * from khach_hang where id = $id limit 1";
    $rs = mysqli_query($conn, $sql);
?>
<div class="row">

<form class="container-fluid h-100 bg-light text-dark" action="index.php?c=khach_hang&a=process" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
    <div>
    <label for="id_khach">ID Khách hàng</label>
     <input class="form-control" type="text" readonly name="ma_khach_hang" id="id_khach" value="<?php echo $_SESSION['dang-nhap']['id'] ?>">
    </div>
    <div>
    <label for="ten_khach_hang">Tên Khách Hàng</label>
     <input class="form-control" type="text" name="ho_va_ten" id="ten_khach_hang">
    </div>
    <div>
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" name="email" >
  </div>
    <div>
    <label for="inputAddress">Địa chỉ</label>
    <input type="text" class="form-control" id="inputAddress" name='dia_chi'>
  </div>
  <div>
    <label for="inputAddress">Số Điện Thoại</label>
    <input type="text" class="form-control" id="inputcity" name='so_dien_thoai'>
</div>
  <button type="submit" class="btn btn-primary" name="cap_nhat_thong_tin">Cập Nhật</button>
</form>
</div>