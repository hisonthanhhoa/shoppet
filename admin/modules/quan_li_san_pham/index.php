<?php
$trang = 2; //khởi tạo trang ban đầu
$gioi_han = 5; //số bản ghi trên 1 trang 

$rs = mysqli_query($conn, "select count(id) as tong_san_pham from quan_li_san_pham");

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

// //tính start (vị trí bản ghi sẽ bắt đầu lấy):
$vi_tri = ($trang - 1) * $gioi_han;

$query = "SELECT * FROM quan_li_san_pham ORDER BY id desc limit $vi_tri, $gioi_han";

$rs = mysqli_query($conn, $query);

?>

<table class="table table-striped">
    <tr>
        <td>ID</td>
        <td>Tên sản phẩm</td>
        <td>Ảnh sản phẩm</td>
        <td>Giá</td>
        <td>Số Lượng</td>
        <td>Mô Tả</td>
        <td>Loại Sản Phẩm</td>
        <td>Tình Trạng</td>
        <td>Hành Động</td>
    </tr>
    <?php while ($row = mysqli_fetch_array($rs)) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['ten_san_pham'] ?></td>
            <td><img src="<?= $row['anh_san_pham'] ?>" style="width: 128px; height: 128px;"></td>
            <td><?= $row['gia'] ?> VNĐ</td>
            <td><?= $row['so_luong'] ?></td>
            <td>
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModalCenter_<?= $row['id'] ?>">
                    Xem chi tiết
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter_<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Mô Tả</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row col-sm-12">
                                        <?= $row['mo_ta'] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <?php
                $id_loai_san_pham = $row['id_loai_san_pham'];
                $query2 = "SELECT ten_loai_san_pham FROM quan_li_loai_san_pham WHERE id = $id_loai_san_pham LIMIT 1";
                $rs2 = mysqli_query($conn, $query2);
                $each = mysqli_fetch_array($rs2);
                ?>
                <?= $each['ten_loai_san_pham'] ?>
            </td>
            <td>
                <?php if ($row['tinh_trang'] == '1') {
                    echo "Đang bán";
                } else {
                    echo "Đã Hết Hàng";
                } ?>
            </td>
            <td>
                <a href="index.php?c=san_pham&a=edit&id=<?= $row['id'] ?>" class="btn btn-primary">Sửa</a>
                <a href="index.php?c=san_pham&a=delete&id=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')">Xóa</a>
            </td>
        </tr>


    <?php } ?>
    <tr>
        <td colspan="9"><a href="index.php?c=san_pham&a=add">Thêm sản phẩm mới</a></td>
    </tr>
</table>
<ul class="pagination">
    <?php for ($i = 1; $i <= $tong_trang; $i++) {  ?>
        <li class="page-item">
            <a href="index.php?c=san_pham&a=index&trang=<?php echo $i; ?>" class="page-link"><?php echo $i ?></a>

        </li>
    <?php } ?>
</ul>