<div class="row mt-3">
    <h3>Có <?= isset($_SESSION['gio_hang']) ? $_SESSION['gio_hang']['tong_san_pham'] : 0 ?> sản phẩm trong giỏ hàng</h3>

    <table class="table table-striped mt-3">
        <tr>
            <td>Mã SP</td>
            <td>Tên Sản Phẩm</td>
            <td>Ảnh Sản Phẩm</td>
            <td>Giá</td>
            <td>Số Lượng</td>
            <td>Tổng</td>
            <td>Xóa</td>
        </tr>
        <?php
        if (isset($_SESSION['gio_hang'])) {
            $tong_gia = 0;
            foreach ($_SESSION['gio_hang'] as $key => $value) {
                if ($key != 'tong_san_pham') {
                    $tong_gia += $value['gia'] * $value['so_luong'];
        ?>
                    <tr>
                        <td><?= $key ?></td>
                        <td><?= $value['ten_san_pham'] ?></td>
                        <td><img src="<?= $value['anh_san_pham'] ?>" width="128px" alt=""></td>
                        <td><?= number_format($value['gia']) ?> VNĐ</td>
                        <td><a href="index.php?c=gio_hang&a=giam_so_luong&id=<?= $key ?>"><i class="fas fa-minus-square"></i></a> <?= $value['so_luong'] ?> <a href="index.php?c=gio_hang&a=tang_so_luong&id=<?= $key ?>"><i class="fas fa-plus-square"></i></a></td>
                        <td><?= number_format($value['gia'] * $value['so_luong']) ?> VNĐ</td>
                        <td><a href="index.php?c=gio_hang&a=xoa_san_pham&id=<?= $key ?>" class="btn btn-danger">Xóa</a></td>
                    </tr>
        <?php }
            }
        } ?>

        <tr>
            <td colspan="5" style="text-align: right;">Tổng: </td>
            <td colspan="2"><?= isset($tong_gia) ? number_format($tong_gia) : '0' ?> VNĐ</td>
        </tr>
        <tr>
            <?php if (isset($_SESSION['gio_hang']) && $_SESSION['gio_hang']['tong_san_pham'] != 0) { ?>
                <td colspan="6"><a href="index.php?c=gio_hang&a=xoa_gio_hang" class="btn btn-danger">Xóa Gió Hàng</a></td>
                <td colspan="1"><a href="index.php?c=gio_hang&a=dat_hang" class="btn btn-success">Đặt Hàng</a></td>
                 <?php } ?>

        </tr>

    </table>

</div>