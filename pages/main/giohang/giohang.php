<?php
    session_start();
    $iddangki = $_SESSION["dangnhap"]["id"];
    $rows_giohang =  mysqli_query($mysqli,"SELECT * FROM tbl_giohang WHERE id_dangki = '".$iddangki."'");
    $row_giohang = mysqli_fetch_assoc($rows_giohang);
    if(!$row_giohang["id_dangki"]){
        mysqli_query($mysqli,"INSERT INTO tbl_giohang(id_dangki) VALUES( '".$iddangki."' )");
    }
    
?>

<!-- xử lý khi người dùng thao tác trên giỏ hàng -->
<?php
    if(!empty($_GET["idsanphamxoa"]) && $_GET["query"]=="xoa"){
        mysqli_query($mysqli,"DELETE FROM tbl_chitietgiohang WHERE tbl_chitietgiohang.id_chitietgiohang = $_GET[idsanphamxoa]");
    }elseif(!empty($_GET["idsanphamcapnhat"]) && $_GET["query"]=="capnhat"){
        // mysqli_query($mysqli,"UPDATE tbl_chitietgiohang SET soluong='$GET' WHERE 1");
    }elseif(($_GET["query"]=="xoatatca")){
        mysqli_query($mysqli,"DELETE FROM tbl_chitietgiohang");
    }
?>

<?php
    

    if(isset($_GET["idsanpham"])){
        $idsanpham = $_GET["idsanpham"];
    }else{
        $idsanpham = "rỗng";
    }

    $sql_sanpham = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_sanpham = '".$idsanpham."'";
    $rows_sanpham = mysqli_query($mysqli,$sql_sanpham);
    $row_sanpham = mysqli_fetch_assoc($rows_sanpham);
    
    $sql_giohang = "SELECT * FROM tbl_giohang WHERE tbl_giohang.id_dangki = '".$iddangki."'";
    $rows_giohang = mysqli_query($mysqli,$sql_giohang);
    $row_giohang = mysqli_fetch_assoc($rows_giohang);


    $sql_chitietgiohang = "SELECT * FROM tbl_chitietgiohang WHERE tbl_chitietgiohang.id_giohang = '".$row_giohang["id_giohang"]."'";
    $rows_chitietgiohang = mysqli_query($mysqli,$sql_chitietgiohang);
    $i=0;
    while($row_chitietgiohang = mysqli_fetch_assoc($rows_chitietgiohang)){
        if($row_chitietgiohang["id_sanpham"] == $idsanpham){
            $i++;
            mysqli_query($mysqli,"UPDATE tbl_chitietgiohang SET soluong='".($row_chitietgiohang["soluong"]+1)."' WHERE id_sanpham = '".$row_chitietgiohang["id_sanpham"]."'");
        }
    }
    if($i == 0){
        mysqli_query($mysqli,"INSERT INTO tbl_chitietgiohang (id_giohang, id_sanpham, soluong) 
        VALUE('".$row_giohang["id_giohang"]."','".$idsanpham."','1')");
    }
    

    $sql_chitietgiohang = "SELECT * FROM tbl_chitietgiohang WHERE tbl_chitietgiohang.id_giohang = '".$row_giohang["id_giohang"]."'";
    $rows_chitietgiohang = mysqli_query($mysqli,$sql_chitietgiohang);
    
?>

        <!-- danh sách sản phẩm trong giỏ hàng -->
<div class="col s-12" >
    <div class="wraper__cart" style="border: 1px solid #ccc; padding:8px; margin: 8px 0;">
    <p class="title__cart" style="font-weight:bold; font-size:24px; display:block; padding:0 0 8px 8px">Giỏ hàng</p>
        <form action="pages/main/giohang/xuly.php" method="POST">
        <table border=1 style="border-collapse:collapse;">
            <tr>
                <th width="5%">STT</th>
                <th width="30%">Tên sản phẩm</th>
                <th width="20%" >Ảnh sản phẩm</th>
                <th width="10%" style=" color:red;">giá bán</th>
                <th width="10%">Số lượng</th>
                <th width="15%">Thành tiền</th>
                <th width="10%">Xóa</th>
            </tr>
            <?php
                $i=0;
                $tongtien ="";
                $thanhtien="";
                while($row_chitietgiohang = mysqli_fetch_assoc($rows_chitietgiohang)){
                    $i++;
                    $sql_sanpham = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_sanpham = '".$row_chitietgiohang["id_sanpham"]."'";
                    $rows_sanpham = mysqli_query($mysqli,$sql_sanpham);
                    $row_sanpham = mysqli_fetch_assoc($rows_sanpham);
                    $tongtien = $row_sanpham["giasanpham"] * $row_chitietgiohang["soluong"];
                    (float)$thanhtien= (float)$thanhtien + $tongtien;
            ?>
            <tr>
                <td align="center"><?php echo $i ?></td>
                <td align="center"><?php echo $row_sanpham["tensanpham"] ?></td>
                <td align="center" height="160px"><img style="width: 140px; height: 140px;" src="admincp/modules/quanlysp/uploads/<?php echo $row_sanpham["hinhanh"] ?>" alt=""></td>
                <td align="center" style=" color:red;"><?php echo number_format($row_sanpham["giasanpham"],0,',','.').'đ' ?></td>
                <td align="center"><input style="width:25%;" type="text" name="soluong<?php echo $i ?>" value="<?php echo $row_chitietgiohang["soluong"]?>"></td>
                <td align="center"><?php echo number_format($tongtien,0,',','.').'đ' ?></td>
                <td align="center">
                    <a href="index.php?quanly=giohang&query=xoa&idsanphamxoa=<?php echo $row_chitietgiohang["id_chitietgiohang"] ?>">Xóa</a>
                </td>
            </tr>
                <?php
                }
                ?>
            <tr style=" background-color:#ccc;">
                <td colspan="5">Tổng tiền</td>
                <td align="center"><?php echo number_format($thanhtien,0,',','.').'đ' ?></td>
                <td align="center"><a href="index.php?quanly=giohang&query=xoatatca" >Xóa tất cả</a></td>
            </tr>
        </table>

        <div style="display:flex; justify-content:end;" class="reload">
            <button type="submit" name="capnhatgiohang">cập nhật</button>
        </div>
        </form>
        <div class="line" style="border-top: 1px solid #ccc; margin:8px"></div>
       



                <!-- thông tin người mua -->
    <form action="pages/main/giohang/xuly.php" method="POST">
        <div>
            <p style="display:inline-block;width: 100px;">Người nhận:</p>
            <input name="ten" type="text">
        </div>
        <br>
        <div>
            <p style="display:inline-block;width: 100px;">Điện thoại:</p>
            <input name="sdt" type="text">
        </div>
        <br>
        <div>
            <p style="display:inline-block;width: 100px;">Địa chỉ:</p>
            <input name="diachi" type="text">
        </div>
        <br>
        <div style="display:flex;">
            <p style="display:inline-block;width: 100px;">Ghi chú:</p>
            <textarea name="ghichu" id="" cols="30" rows="5"></textarea>
        </div>
        <br>
        <div style="margin-bottom:12px;">
            <button style="height:28px" typy="submit" name="dathang">Đặt hàng</button>
        </div>
    </form>
    </div>
</div>

