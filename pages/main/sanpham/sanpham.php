<?php
    if(isset($_GET["iddanhmuc"])){
        $iddanhmuc = $_GET["iddanhmuc"];
    }else{
        $iddanhmuc = "";
    }

    if(($iddanhmuc == "") || $iddanhmuc == "tatca"){
        $sql_sanpham = "SELECT * FROM tbl_sanpham";
    }else{
        $sql_sanpham = "SELECT * FROM tbl_sanpham,tbl_danhmuc 
        WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc
        AND tbl_sanpham.id_danhmuc = $iddanhmuc";
    }
    $row_sanpham = mysqli_query($mysqli,$sql_sanpham);

?>

<div class="contain col s-9">
    <ul class="product_list row">
        <?php 
            while($row=mysqli_fetch_assoc($row_sanpham)){
                if($row["tinhtrang"] == 1){
        ?>
        <li class="product_item col s-3">
            <a class="product_item--link" href="?idsanpham=<?php echo $row["id_sanpham"] ?>">
                <div class="product_info">
                    <img src="admincp/modules/quanlysp/uploads/<?php echo $row["hinhanh"] ?>" alt="">
                    <p style="font-weight:bold; font-size:18px; margin-left:10px;"><?php echo $row["tensanpham"] ?></p>
                    <p style="color:red;margin-left:10px;"><?php echo number_format($row["giasanpham"],0,',','.') ?>đ</p>
                </div>
            </a>
            <div class="btn__buy btn__buy__position">
                    <a href="?quanly=giohang&idsanpham=<?php echo $row["id_sanpham"] ?>">Mua ngay</a>
            </div>
        </li>
        <?php
                }
            }
        ?>
    </ul>
</div>