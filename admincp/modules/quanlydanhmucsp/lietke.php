
<?php
    $sql_lietke_danhmucsp = "SELECT * FROM tbl_danhmuc ORDER BY thutu DESC";
    $row_lietke_danhmucsp = mysqli_query($mysqli,$sql_lietke_danhmucsp);
?>


    <table  class="table_lietke" border=1 style="border-collapse:collapse; margin-top:40px">
        <tr>
            <th colspan="3">DANH SÁCH</th>
        </tr>
        <tr align="left" style="background: #cccc">
            <th >STT</th>
            <th>Tên danh mục sản phẩm</th>
            <th align="center">Quản lý</th>
        </tr>
    <?php
        $i=0;
        while($row = mysqli_fetch_array($row_lietke_danhmucsp)){
            $i++;
    ?>
        <tr>
            <td><?php echo $i?></td>
            <td><?php echo $row["tendanhmuc"]?></td>
            <td style="text-align: center">
                <a href="modules/quanlydanhmucsp/xuly.php?query=xoa&iddanhmuc=<?php echo $row["id_danhmuc"] ?>">Xóa</a> 
                | 
                <a href="?action=quanlydanhmucsp&query=sua&iddanhmuc=<?php echo $row["id_danhmuc"] ?>">Sửa</a>
            </td>
        </tr>
    <?php
        }
    ?>
    </table>
