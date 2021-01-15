<?php

    if (isset($_GET['ma_san_pham'])) {
        $id = $_GET['ma_san_pham'];

        $sql = "SELECT * FROM quan_li_san_pham WHERE id = $id LIMIT 1";
        $rs = mysqli_query($conn, $sql);

        if (mysqli_num_rows($rs) == 0) {
            echo "Không có sản phẩm phù hợp";
        } 

        $each = mysqli_fetch_array($rs);
    }
?>
<div class="row mt-3 mb-3">
   <div class="col-sm-4">
       <img src="<?= $each['anh_san_pham'] ?>" alt="" class="card-img-top" style="width: 300px">
   </div>
   <div class="col-sm-6">
       <h3 class="mt-5"><?= $each['ten_san_pham'] ?></h3>
       <h4 class="mt-5">Giá: <span class="text-danger"><?= number_format($each['gia']) ?></span> VNĐ</h4>
       <h4 class="mt-5">Số lượng: <span class="text-danger"><?= $each['so_luong'] ?></span> </h4>
       <a class="btn btn-outline-danger mt-5" href="index.php?c=gio_hang&a=them_gio_hang&id=<?= $each['id'] ?>">Thêm vào giỏ hàng</a>
   </div>
</div>
<div class="row mt-3 mb-3">
    <div class="col-sm-4"></div>
    <div class="col-sm-6">
        <h3>THÔNG TIN SẢN PHẨM</h3>
    <?= $each['mo_ta'] ?>
    </div>
</div>