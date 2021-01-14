<?php

    $tim_kiem = $_GET['tim_kiem'];
    $sql = "select * from quan_li_san_pham where ten_san_pham like '%$tim_kiem%'";
    die($sql);
    $rs = mysqli_query($conn, $sql);

    if (mysqli_num_rows($rs) == 0) {
        echo "Không có sản phẩm nào phù hợp";
      }
      ?>
      
      <div class="row">
        <h3>DANH SÁCH SẢN PHẨM</h3>
        <div class="col-md-12">
          <div class="row">
            <?php while ($each = mysqli_fetch_array($rs)) { ?>
              <div class="col-md-3 mb-3">
                <div class="card text-center">
                  <img class="card-img-top" src="<?= $each['anh_san_pham'] ?>" alt="Card image cap" style="width: 300px; height: 400px;">
                  <div class="card-body">
                    <h5 class="card-title"><a href="index.php?c=dashboard&a=view_all?ma_san_pham=<?php echo $each['id']?>" class="text-decoration-none"><?= $each['ten_san_pham'] ?></a></h5>
                    <p class="card-text"><?= number_format($each['gia']) ?> VNĐ</p>
                    <a href="#" class="btn btn-primary">Thêm vào giỏ hàng</a>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      
      </div>