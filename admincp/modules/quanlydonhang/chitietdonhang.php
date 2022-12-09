<?php
    session_start();
    include("../../config/config.php");
    if(isset($_GET["iddonhang"])){
        $iddonhang= $_GET["iddonhang"];
    }

    $iddangnhap = $_SESSION["dangnhap"]["id"];

    $rows_donhang = mysqli_query($mysqli,"SELECT * FROM tbl_donhang WHERE id_donhang='".$iddonhang."'");
    $row_donhang = mysqli_fetch_assoc($rows_donhang);
    
    $rows_dangki = mysqli_query($mysqli,"SELECT * FROM tbl_dangki WHERE tbl_dangki.id_dangki = '".$iddangnhap."'");
    $row_dangki = mysqli_fetch_assoc($rows_dangki);
?>

<div>
    <div>
        <p style="color: red; font-size:20; font-weight:bold;">Chi tiết đơn hàng</p>
        <p>Mã đơn: <?php echo $row_donhang["id_donhang"] ?></p>
        <p>Ngày đặt hàng: <?php echo $row_donhang["thoidiemdathang"] ?></p>
        <p>Khách hàng: <?php echo $row_dangki["hovaten"] ?></p>
        <p>Người nhận hàng: <?php echo $row_donhang["tennguoinhan"] ?></p>
        <p>Địa chỉ giao hàng: <?php echo $row_donhang["diachi"] ?></p>
        <p>Số điện thoại người nhận: <?php echo $row_donhang["dienthoai"] ?></p>
        <p>Tổng tiền: <?php echo number_format($row_donhang["tongtien"],0,',','.').'đ' ?></p>
        <p>Ghi chú của khách: <?php echo $row_donhang["ghichu"] ?></p>
    </div>
    <table border=1 style="border-collapse:collapse; width: 95%; margin: 0 auto;">
        <tr>
            <th colspan="8">Danh sách sản phẩm khách đặt hàng</th>
        </tr>
        <tr>
            <th width="5%">STT</th>
            <th width="5%">Mã sản phẩm</th>
            <th width="10%">Tên sản phẩm</th>
            <th width="10%">Hình ảnh</th>
            <th width="5%">Số lượng</th>
            <th width="10%">Giá</th>
            <th width="10%">Tổng tiền</th>
        </tr>
    <?php
        $i=-1;
        $rows_chitietdonhang = mysqli_query($mysqli,"SELECT * FROM tbl_chitietdonhang WHERE id_donhang = '".$row_donhang["id_donhang"]."'");
        $thanhtien ="";
        $tongtien= "";
        while($row_chitietdonhang =mysqli_fetch_assoc($rows_chitietdonhang)){
            $i++;
            $rows_sanpham = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham WHERE id_sanpham = '".$row_chitietdonhang["id_sanpham"]."'");
            $row_sanpham = mysqli_fetch_assoc($rows_sanpham);
            $tongtien = $row_chitietdonhang["soluong"]*$row_chitietdonhang["gia"];
            $thanhtien = $thanhtien + $tongtien;
    ?>
        <tr style="height: 140px;">
            <td align="center"><?php echo ($i+1) ?></td>
            <td align="center"><?php echo $row_sanpham["masanpham"] ?></td>
            <td align="center"><?php echo $row_sanpham["tensanpham"] ?></td>
            <td align="center"><img style="width: 140px; height: 140px;" src="../quanlysp/uploads/<?php echo $row_sanpham["hinhanh"] ?>" alt=""></td>
            <td align="center"><?php echo $row_chitietdonhang["soluong"] ?></td>
            <td align="center"><?php echo $row_chitietdonhang["gia"] ?></td>
            <td align="center"><?php echo number_format($tongtien,0,',','.').'đ' ?></td>
        </tr>
    <?php
        }
    ?>
        <tr style=" background-color:#ccc;">
            <td colspan="6">Tổng tiền</td>
            <td align="center"><?php echo number_format($thanhtien,0,',','.').'đ' ?></td>
        </tr>
    </table>
    <div style="display:flex; justify-content:end; margin:8px 5%" class="reload">
        <button type="submit" name="capnhatdonhang">cập nhật</button>
        <a href="../../index.php?action=quanlydonhang">Quay lại</a>
    </div>
</div>
