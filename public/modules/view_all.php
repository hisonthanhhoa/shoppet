  
<?php
$trang = 1; //khởi tạo trang ban đầu
$gioi_han = 8; //số bản ghi trên 1 trang 

$tim_kiem = $_GET['q'] ?? '';
$sql = "select count(id) as tong_san_pham from quan_li_san_pham where tinh_trang = 1 and ten_san_pham like '%$tim_kiem%'";
$rs = mysqli_query($conn, $sql);


$tong_san_pham = mysqli_fetch_array($rs); //tính tổng số bản ghi 

$tong_trang = ceil($tong_san_pham['tong_san_pham'] / $gioi_han); //tính tổng số trang sẽ chia


//xem trang có vượt giới hạn không:
if (isset($_GET["trang"])) {
  $trang = $_GET["trang"]; //nếu biến $_GET["page"] tồn tại thì trang hiện tại là trang $_GET["page"]
  if ($trang < 1) {
    $trang = 1;
  } //nếu trang hiện tại nhỏ hơn 1 thì gán bằng 1
  if ($trang > $tong_trang) {
    $trang = $tong_trang;
  }
} //nếu trang hiện tại vượt quá số trang được chia thì sẽ bằng trang cuối cùng

//tính start (vị trí bản ghi sẽ bắt đầu lấy):
$vi_tri = ($trang - 1) * $gioi_han;

$sql = "select * from quan_li_san_pham where tinh_trang = 1 and ten_san_pham like '%$tim_kiem%' limit $vi_tri, $gioi_han";
$rs = mysqli_query($conn, $sql);

if (mysqli_num_rows($rs) == 0) {
  echo "Không có sản phẩm nào phù hợp";
}
?>

<div class="row">
  <h3>DANH SÁCH SẢN PHẨM <?php if ($tim_kiem != '') echo "CÓ TÊN <label class='text-uppercase'>$tim_kiem</label>" ?></h3>
  <div class="col-md-12">
    <div class="row">
      <?php while ($each = mysqli_fetch_array($rs)) { ?>
        <div class="col-md-3 mb-3">
          <div class="card text-center">
            <img class="card-img-top" src="<?= $each['anh_san_pham'] ?>" alt="Card image cap" style="width: 300px; height: 400px;">
            <div class="card-body">
              <h5 class="card-title"><a href="index.php?c=xem_san_pham&a=xem_chi_tiet&ma_san_pham=<?php echo $each['id'] ?>" class="text-decoration-none"><?= $each['ten_san_pham'] ?></a></h5>
              <p class="card-text"><?= number_format($each['gia']) ?> VNĐ</p>
              <a href="index.php?c=gio_hang&a=them_gio_hang&id=<?= $each['id'] ?>" class="btn btn-primary">Thêm vào giỏ hàng</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <div class="col-sm-12">
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item"><a id="previous" class="page-link" href="index.php?c=xem_san_pham&a=xem_tat_ca<?php if ($tim_kiem != '') echo "&q=".$tim_kiem ?>&trang=<?= $trang - 1 ?>">Previous</a></li>
        <?php for ($i = 1; $i <= $tong_trang; $i++) {  ?>
          <li class="page-item">
            <a href="index.php?c=xem_san_pham&a=xem_tat_ca<?php if ($tim_kiem != '') echo "&q=".$tim_kiem ?>&trang=<?php echo $i; ?>" class="page-link"><?php echo $i ?></a>

          </li>
        <?php } ?>

        <li class="page-item"><a class="page-link" id="next" href="index.php?c=xem_san_pham&a=xem_tat_ca<?php if ($tim_kiem != '') echo "&q=".$tim_kiem ?>&trang=<?= $trang + 1 ?>">Next</a></li>
      </ul>
    </nav>
  </div>

  <script>
    var getUrlParameter = function getUrlParameter(sParam) {
      var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

      for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
          return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
      }
    };

    var trang = getUrlParameter('trang');

    if (trang <= 1 || !trang) {
      $(function() {
        $('#previous').on('click', function(event) {
          event.preventDefault();
        }).addClass('disabled').removeAttr('href');
      });
    }

    if (trang >= <?= $tong_trang ?>) {
      $(function() {
        $('#next').on('click', function(event) {
          event.preventDefault();
        }).addClass('disabled').removeAttr('href');
      });
    }
  </script>
