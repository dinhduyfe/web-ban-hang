

<?php
    session_start();
    $iddangnhap = $_SESSION["dangnhap"]["id"];
    
    
?>
<div class="col s-12">

    <form action="index.php?action=quanlydonhang" method="POST">
        <table border=1 style="border-collapse:collapse; width: 100%; margin: 32px auto;">
        <tr>
            <th colspan="11">DANH SÁCH</th>
        </tr>
            <tr style="background-color:#ccc;">
                <th width="5%">STT</th>
                <th width="5%">Mã đơn</th>
                <th width="10%">Khách hàng</th>
                <th width="10%">Người nhận</th>
                <th width="10%">Địa chỉ giao hàng</th>
                <th width="10%">SĐT người nhận</th>
                <th width="15%">Tổng tiền</th>
                <th width="10%">Ghi chú của bạn</th>
                <th width="10%">Ngày đặt</th>
                <th width="10%">Trạng thái</th>
                <th width="10%">Chi tiết</th>
            </tr>
        <?php
            $rows_donhang = mysqli_query($mysqli,"SELECT * FROM tbl_donhang WHERE id_dangki = '".$iddangnhap."'");
            $i=-1;
            while($row_donhang =mysqli_fetch_assoc($rows_donhang)){
                $i++;
                $rows_dangki = mysqli_query($mysqli,"SELECT * FROM tbl_dangki WHERE tbl_dangki.id_dangki = '".$iddangnhap."'");
                $row_dangki = mysqli_fetch_assoc($rows_dangki);
        ?>
            <tr>
                <td align="center"><?php echo ($i+1) ?></td>
                <td align="center"><?php echo $row_donhang["id_donhang"] ?></td>
                <td align="center"><?php echo $row_dangki["hovaten"] ?></td>
                <td align="center"><?php echo $row_donhang["tennguoinhan"] ?></td>
                <td align="center"><?php echo $row_donhang["diachi"] ?></td>
                <td align="center"><?php echo $row_donhang["dienthoai"] ?></td>
                <td align="center"><?php echo number_format($row_donhang["tongtien"],0,',','.').'đ' ?></td>
                <td align="center"><textarea name="" id="" cols="20" rows="5"><?php echo $row_donhang["ghichu"] ?></textarea></td>
                <td align="center"><?php echo $row_donhang["thoidiemdathang"] ?></td>
                <td align="center">
                    <?php
                        if($row_donhang["trangthai"] == 0){ echo "Chờ xác nhận";}
                        if($row_donhang["trangthai"] == 1){ echo "Đã xác nhận";}
                        if($row_donhang["trangthai"] == 2){ echo "Đang giao hàng";}
                        if($row_donhang["trangthai"] == 3){ echo "Đã giao hàng";}
                        if($row_donhang["trangthai"] == 4){ echo "Hủy đơn";}
                    ?>
                </td>
                <td align="center">
                    <a href="?quanly=chitietdonhang&iddonhang=<?php echo $row_donhang["id_donhang"] ?>">Chi tiết đơn hàng</a>
                </td>
            </tr>
        <?php
            }
        ?>
        </table>
    </form>
</div>