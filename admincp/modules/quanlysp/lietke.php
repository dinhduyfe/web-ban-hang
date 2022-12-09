<?php
    $sql_lietke_sp = "SELECT * FROM tbl_sanpham";;
    $row_sanpham = mysqli_query($mysqli,$sql_lietke_sp);
?>
<div class="duongdan"><img class="anh" src="../images/home.png" width=15px height=15px alt=""> | QUẢN LÝ SẢN PHẨM</div>

<div>
    <h2 style="display:block;">DANH SÁCH SẢN PHẨM</h2>
    <a href="?action=quanlysp&query=them"><button class="button1">THÊM SẢN PHẨM</button></a>
</div> 
<form action="modules/quanlysp/xuly.php" method="POST" enctype="multipart/form-data">
    <table class="table_sanpham" border="1" style="border-collapse:collapse;text-align: center">
        <tr style="background: #cccc">
            <th>Tên sản phẩm</th>
            <th>Mã sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Hình ảnh</th>
            <th>Tóm tắt</th>
            <th>Nội dung</th>
            <th>Danh mục</th>
            <th>Tình trạng</th>
            <th>Quản lý</th>
        </tr>
        <?php
            while($row = mysqli_fetch_assoc($row_sanpham)){

        ?>
        <tr>
            <td><?php echo $row['tensanpham'] ?></td>
            <td><?php echo $row['masanpham'] ?></td>
            <td><?php echo $row['giasanpham'] ?></td>
            <td><?php echo $row['soluong'] ?></td>
            <td style="text-align: center"><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" alt="" width=50px height=50px></td>
            <td><?php echo $row['tomtat'] ?></td>
            <td><?php echo $row['noidung'] ?></td>
            <?php
                $sql_sanpham_danhmuc = "SELECT * FROM tbl_danhmuc,tbl_sanpham WHERE tbl_danhmuc.id_danhmuc = tbl_sanpham.id_danhmuc AND tbl_sanpham.id_sanpham = '".$row["id_sanpham"]."'";
                $row_sanpham_danhmuc = mysqli_query($mysqli,$sql_sanpham_danhmuc);
                $row_danhmuc = mysqli_fetch_assoc($row_sanpham_danhmuc);
            ?>
            <td><?php echo $row_danhmuc['tendanhmuc'] ?></td>
            <td><?php if($row['tinhtrang']){echo "Hiển thị";}else{echo "Ẩn";} ?></td>
            <td style="text-align: center">
                <a href="?action=quanlysp&query=sua&idsanpham=<?php echo $row["id_sanpham"] ?>">Sửa</a>
                |
                <a href="modules/quanlysp/xuly.php?query=xoa&idsanpham=<?php echo $row["id_sanpham"] ?>">Xóa</a>
            </td>
        </tr>
            <?php
            }   
            ?>
    </table>
    
    
</form>