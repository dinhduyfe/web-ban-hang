<?php
    session_start();
    include("../../../admincp/config/config.php");
    if(isset($_POST["capnhatgiohang"])){
        $sql_chitietgiohang = "SELECT * FROM tbl_chitietgiohang";
        $rows_chitietgiohang = mysqli_query($mysqli,$sql_chitietgiohang);
        $i=0;
        while($row_chitietgiohang = mysqli_fetch_assoc($rows_chitietgiohang)){
            $i++;
            mysqli_query($mysqli,"UPDATE tbl_chitietgiohang SET soluong='".($_POST["soluong".$i])."' WHERE id_sanpham = '".$row_chitietgiohang["id_sanpham"]."'");
            header("location: ../../../index.php?quanly=giohang");
        }
    }elseif(isset($_POST["dathang"])){
        $ten = $_POST["ten"];
        $sdt = $_POST["sdt"];
        $diachi = $_POST["diachi"];
        $ghichu = $_POST["ghichu"];
        $tongtien = "";
        if(isset($_SESSION["dangnhap"]["id"])){ $id_dangki = $_SESSION["dangnhap"]["id"]; }
        
        $sql_chitietgiohang = "SELECT * FROM tbl_chitietgiohang";
        $rows_chitietgiohang = mysqli_query($mysqli,$sql_chitietgiohang);
        $list_idsanpham_giohang[0] = "";
        $i = 0;
        while($row_chitietgiohang = mysqli_fetch_assoc($rows_chitietgiohang)){
            $i++;
            $sql_sanpham = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_sanpham = '".$row_chitietgiohang["id_sanpham"]."'";
            $rows_sanpham = mysqli_query($mysqli,$sql_sanpham);
            $row_sanpham = mysqli_fetch_assoc($rows_sanpham);
            (float)$tongtien = (float)$tongtien + ($row_sanpham["giasanpham"]*$row_chitietgiohang["soluong"]);
            $list_idsanpham_giohang[$i] = $row_chitietgiohang["id_sanpham"];
        }
        $sql_donhang = "INSERT INTO tbl_donhang (thoidiemdathang,tennguoinhan,dienthoai,diachi,ghichu,tongtien,trangthai,id_dangki) 
                        VALUE('".date("Y-m-d H:i:s")."','".$ten."','".$sdt."','".$diachi."','".$ghichu."','".$tongtien."',0,'".$id_dangki."')";
        mysqli_query($mysqli,$sql_donhang);
        $lastid_donhang = mysqli_insert_id($mysqli);

        for($i=1; $i<=count($list_idsanpham_giohang); $i++){
            $sql_chitietgiohang = "SELECT * FROM tbl_chitietgiohang WHERE tbl_chitietgiohang.id_sanpham = '".$list_idsanpham_giohang[$i]."'";
            $rows_chitietgiohang = mysqli_query($mysqli,$sql_chitietgiohang);
            $row_chitietgiohang = mysqli_fetch_assoc($rows_chitietgiohang);

            $sql_sanpham = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_sanpham = '".$list_idsanpham_giohang[$i]."'";
            $rows_sanpham = mysqli_query($mysqli,$sql_sanpham);
            $row_sanpham = mysqli_fetch_assoc($rows_sanpham);

            $sql_chitietdonhang = "INSERT INTO tbl_chitietdonhang (id_donhang,id_sanpham,soluong,gia) 
                            VALUE('".$lastid_donhang."','".$list_idsanpham_giohang[$i]."','".$row_chitietgiohang["soluong"]."','".$row_sanpham["giasanpham"]."')";
            mysqli_query($mysqli,$sql_chitietdonhang);
        }



        mysqli_query($mysqli,"DELETE FROM tbl_chitietgiohang");


        echo "đặt hàng thành công, vui lòng chuẩn bị số tiền ".number_format($tongtien,0,',','.').'đ'." khi nhận hàng";
?>
    <div><a href="../../../index.php?quanly=trangchu">Tiếp tục mua hàng</a></div>
<?php
    }
?>