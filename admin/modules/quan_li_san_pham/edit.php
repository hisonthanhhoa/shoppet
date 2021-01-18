<?php

$id = isset($_GET['id']) ? $_GET['id'] : '';

$query = "SELECT id, ten_loai_san_pham FROM quan_li_loai_san_pham";

$rs = mysqli_query($conn, $query);

$query2 = "SELECT * FROM quan_li_san_pham WHERE id = $id";

$rs2 = mysqli_query($conn, $query2);

$each = mysqli_fetch_array($rs2);

?>

<form action="index.php?c=san_pham&a=process" method="post" enctype="multipart/form-data">
    <table class="table table-content">
        <input type="hidden" name="id" value="<?= $each['id'] ?>">
        <tr>
            <td>Loại sản phẩm: </td>
            <td>
                <select name="loai_san_pham" id="loai_san_pham">
                    <?php while ($row = mysqli_fetch_array($rs)) { ?>
                        <option value="<?= $row['id'] ?>"><?= $row['ten_loai_san_pham'] ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tên sản phẩm</td>
            <td><input type="text" name="ten_san_pham" id="ten_san_pham" value="<?= $each['ten_san_pham'] ?>"></td>
        </tr>
        <tr>
            <td>Ảnh sản phẩm</td>
            <td>
                <img src="<?= $each['anh_san_pham'] ?>" style="height: 128px" alt="">
                <input type="hidden" name="anh_cu" value="<?=  $each['anh_san_pham'] ?>">
                <input type="file" name="anh_san_pham" id="anh_san_pham">

            </td>
        </tr>
        <tr>
            <td>Giá</td>
            <td><input type="text" name="gia" id="gia" value="<?= $each['gia'] ?>"></td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td><input type="text" name="so_luong" id="so_luong" value="<?= $each['so_luong'] ?>"></td>
        </tr>
        <tr>
            <td>Mô tả</td>
            <td><textarea cols="80" id="mo_ta" name="mo_ta" rows="10"><?= $each['mo_ta'] ?></textarea></td>
        </tr>
        <tr>
            <td>Tình trạng</td>
            <td>
                <select name="tinh_trang" id="tinh_trang">
                    <option value="1">Còn hàng</option>
                    <option value="0">Hết hàng</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><button type="submit" name="sua_san_pham">Sửa Sản Phẩm</button></td>
        </tr>
        <tr>
            <td colspan="2"><a href="index.php?c=san_pham&a=index">Xem sản phẩm</a></td>
        </tr>
    </table>



</form>
<script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('mo_ta', {
        height: 400,
        baseFloatZIndex: 10005
    });
</script>