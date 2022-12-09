<?php
    $idsanpham = $_GET["idsanpham"];
    $sql_suasanpham = "SELECT * FROM tbl_sanpham WHERE '".$idsanpham."' = id_sanpham ";
    $row_suasanpham = mysqli_query($mysqli,$sql_suasanpham);
    $row = mysqli_fetch_assoc($row_suasanpham);
?>

<h2>  SỬA SẢN PHẨM</h2>
<form method="POST" action="modules/quanlysp/xuly.php?idsanpham=<?php echo $row["id_sanpham"] ?>" enctype="multipart/form-data">
    <table class="table_suasanpham" border="1" style="border-collapse:collapse">
        <tr>
            <td style ="background:#cccc">Tên sản phẩm</td>
            <td><input type="text" name="tensanpham" value="<?php echo $row["tensanpham"] ?>"></td>
        </tr>
        <tr>
            <td style ="background:#cccc">Mã sản phẩm</td>
            <td><input type="text" name="masanpham" value="<?php echo $row["masanpham"] ?>"></td>
        </tr>
        <tr>
            <td style ="background:#cccc">Giá</td>
            <td><input type="text" name="giasanpham" value="<?php echo $row["giasanpham"] ?>"></td>
        </tr>
        <tr>
            <td style ="background:#cccc">Số lượng</td>
            <td><input type="text" name="soluong" value="<?php echo $row["soluong"] ?>"></td>
        </tr>
        <tr>
            <td style ="background:#cccc">Hình ảnh</td>
            <td>
                <input type="file" name="hinhanh">
                <img width=50px height=50px src="<?php echo "modules/quanlysp/uploads/".$row["hinhanh"] ?>" alt="">
            </td>

        </tr>
        <tr>
            <td style ="background:#cccc">Tóm tắt</td>
            <td><textarea name="tomtat" id="" cols="50" rows="5"><?php echo $row["tomtat"] ?></textarea></td>
        </tr>
        <tr>
            <td style ="background:#cccc">Nội dung</td>
            <td><textarea name="noidung" id="" cols="50" rows="10"><?php echo $row["noidung"] ?></textarea></td>
        </tr>
        <tr>
            <td style ="background:#cccc">Danh mục</td>
            <td>
                <select name="danhmuc" id="">
                    <?php
                        $sql_danhmuc = "SELECT * FROM tbl_danhmuc";
                        $row_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
                        while($_row = mysqli_fetch_assoc($row_danhmuc)){
                    ?>
                    <option <?php if($row["id_danhmuc"] == $_row["id_danhmuc"]) echo "selected" ?> value="<?php echo $_row["id_danhmuc"] ?>"><?php echo $_row["tendanhmuc"] ?></option>
                    <?php
                        }     
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td style ="background:#cccc">Tình trạng</td>
            <td>
                <select name="tinhtrang" id="">
                    <option <?php if($row["tinhtrang"]==1) echo "selected"  ?> value="1">Hiển thị</option>
                    <option <?php if($row["tinhtrang"]==0) echo "selected"  ?> value="0">Ẩn</option>
                </select>
            </td>
        </tr>
        <tr >
            <td colspan="2" style="text-align: center"><button type="submit" class="button" name="suasanpham">Sửa</button></td>
        </tr>      
    </table>
    
</form>