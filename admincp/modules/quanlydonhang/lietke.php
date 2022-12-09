<div class="duongdan"><img class="anh" src="../images/home.png" width=15px height=15px alt=""> | QUẢN LÝ ĐƠN HÀNG</div>


<?php
    session_start();
    $iddangnhap = $_SESSION["dangnhap"]["id"];
    
    $rows_donhang = mysqli_query($mysqli,"SELECT * FROM tbl_donhang");
    if(isset($_POST["capnhatdonhang"])){
        $i=-1;
        while($row_donhang = mysqli_fetch_assoc($rows_donhang)){
            $i++;
            if($_POST["trangthai".$i] == 4){
                mysqli_query($mysqli,"DELETE FROM tbl_donhang WHERE tbl_donhang.id_donhang = '".$row_donhang["id_donhang"]."'");
            }elseif($row_donhang["trangthai"] != $_POST["trangthai".$i]){
                mysqli_query($mysqli,"UPDATE tbl_donhang SET trangthai='".($_POST["trangthai".$i])."' WHERE id_donhang = '".$row_donhang["id_donhang"]."'");
            }
        }
        
    }
?>

<form action="index.php?action=quanlydonhang" method="POST">
    <table border=1 style="border-collapse:collapse; width: 95%; margin: 32px auto;">
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
            <th width="10%">Tổng tiền</th>
            <th width="10%">Ghi chú của khách</th>
            <th width="10%">Ngày đặt</th>
            <th width="5%">Trạng thái</th>
            <th width="10%">Chi tiết</th>
        </tr>
    <?php
        $rows_donhang = mysqli_query($mysqli,"SELECT * FROM tbl_donhang");
        $i=-1;
        while($row_donhang =mysqli_fetch_assoc($rows_donhang)){
            $i++;
            $rows_dangki = mysqli_query($mysqli,"SELECT * FROM tbl_dangki WHERE tbl_dangki.id_dangki = '".$row_donhang["id_dangki"]."'");
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
                <select style="background:#ccc" name="trangthai<?php echo $i ?>">
                    <option <?php if($row_donhang["trangthai"] == 0) echo "selected"?>  value="0">Chờ xác nhận</option>
                    <option <?php if($row_donhang["trangthai"] == 1) echo "selected"?> value="1">Đã xác nhận</option>
                    <option <?php if($row_donhang["trangthai"] == 2) echo "selected"?> value="2">Đang giao hàng</option>
                    <option <?php if($row_donhang["trangthai"] == 3) echo "selected"?> value="3">Đã giao hàng</option>
                    <option <?php if($row_donhang["trangthai"] == 4) echo "selected"?> value="4">Hủy đơn</option>
                </select>
            </td>
            <td align="center">
                <a href="modules/quanlydonhang/chitietdonhang.php?iddonhang=<?php echo $row_donhang["id_donhang"] ?>">Chi tiết đơn hàng</a>
            </td>
        </tr>
    <?php
        }
    ?>
    </table>
    <div style="display:flex; justify-content:end; margin:8px 5%" class="reload">
        <button type="submit" name="capnhatdonhang">cập nhật</button>
    </div>
</form>