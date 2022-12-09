<?php
    $iddanhmuc = $_GET["iddanhmuc"];
    $sql_suadanhmuc = "SELECT * FROM tbl_danhmuc WHERE '".$iddanhmuc."' = id_danhmuc ";
    $row_suadanhmuc = mysqli_query($mysqli,$sql_suadanhmuc);
    $row = mysqli_fetch_assoc($row_suadanhmuc);
?>

<h2 style="margin-left:4px">SỬA DANH MỤC SẢN PHẨM</h2 >

<form method="POST" action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row["id_danhmuc"] ?>">
    <table border=1 class="table_suadanhmuc"  style="border-collapse:collapse">
        <tr>
            <td>Tên danh mục</td>
            <td><input type="text" name="tendanhmuc" value="<?php echo $row["tendanhmuc"] ?>"></td>
        </tr>
        <tr>
            <td>Số thứ tự</td>
            <td><input type="text" name="sothutu" value="<?php echo $row["thutu"] ?>"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center" ><button class="button" type="submit" name="suadanhmuc">Sửa</button> </td>
        </tr>
    </table>
    
</form>