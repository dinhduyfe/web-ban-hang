<div class="duongdan"><img class="anh" src="../images/home.png" width=15px height=15px alt=""> | QUẢN LÝ DANH MỤC SẢN PHẨM</div>
<h2 style="margin-left:4px">DANH MỤC SẢN PHẨM</h2>
<form action="modules/quanlydanhmucsp/xuly.php" method="POST">
    <table class="table_them" border="1" style="border-collapse:collapse" >
        <tr>
            <th colspan="3">THÊM DANH MỤC</th>
        </tr>
        <tr style="background-color:#ccc;">
            <td>Tên danh mục</td>
            <td><input type="text" name="tendanhmuc" style="border: none; outline:none; width:95%;" placeholder="tên danh mục..."></td>
        </tr>
        <tr style="background-color:#ccc;">
            <td>Số thứ tự</td>
            <td><input type="text" name="sothutu" style="border: none; outline:none; width:95%;" placeholder="thứ tự hiển thị..."></td>
        </tr>
        
    </table>
    <button class="button" type="submit" name="themdanhmuc" >Thêm</button>
    
</form>