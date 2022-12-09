<div class="duongdan"><img class="anh" src="../images/home.png" width=15px height=15px alt=""> | QUẢN LÝ SẢN PHẨM</div>

<h2 style="margin-left:4px">THÊM SẢN PHẨM</h2>
<form action="modules/quanlysp/xuly.php" method="POST" enctype="multipart/form-data">
    <table class="table_themsanpham" border="1" style="border-collapse:collapse">
        <tr>
            <td style ="background:#cccc">Tên sản phẩm</td>
            <td><input width=100% type="text" name="tensanpham"></td>
        </tr>
        <tr>
            <td style ="background:#cccc">Mã sản phẩm</td>
            <td><input width=100% type="text" name="masanpham"></td>
        </tr>
        <tr>
            <td style ="background:#cccc">Giá</td>
            <td><input width=100% type="text" name="giasanpham"></td>
        </tr>
        <tr>
            <td style ="background:#cccc">Số lượng</td>
            <td><input width=100% type="text" name="soluong"></td>
        </tr>
        <tr>
            <td style ="background:#cccc">Hình ảnh</td>
            <td><input type="file" name="hinhanh"></td>
        </tr>

        <tr>
            <td style ="background:#cccc">Tóm tắt</td>
            <td><textarea name="tomtat" id="" cols="50" rows="5"></textarea></td>
        </tr>
        <tr>
            <td style ="background:#cccc">Nội dung</td>
            <td><textarea name="noidung" id="" cols="50" rows="10"></textarea></td>
        </tr>
        <tr>
            <td style ="background:#cccc">Danh mục</td>
            <td>
                <select name="danhmuc" id="">
                    <?php
                        $sql_danhmuc = "SELECT * FROM tbl_danhmuc";
                        $row_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
                        while($row = mysqli_fetch_assoc($row_danhmuc)){
                    ?>
                    <option value="<?php echo $row["id_danhmuc"] ?>"><?php echo $row["tendanhmuc"] ?></option>
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
                    <option value="1">Hiển thị</option>
                    <option value="0">Ẩn</option>
                </select>
            </td>
        </tr>
        <tr>
            <td  style ="text-align:center" colspan="2"><button class="button" type="submit" name="themsanpham">Thêm</button></td>
        </tr>

    </table>
    
</form>