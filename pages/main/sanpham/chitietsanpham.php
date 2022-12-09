<?php
    if(isset($_GET["idsanpham"])){
        $idsanpham = $_GET["idsanpham"];
    }
    $sql_sanpham = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_sanpham = '".$idsanpham."'";
    $row_sanpham = mysqli_query($mysqli,$sql_sanpham);
    $row=mysqli_fetch_assoc($row_sanpham);

    $sql_danhmuc = "SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc = '".$row["id_danhmuc"]."'";
    $row_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
    $row2=mysqli_fetch_assoc($row_danhmuc);
    
?>


<div class="product__detail col s-9">
    <p class="title__detail">Chi tiết sản phẩm</p>
    <div class="contain__detail">
        <div class="img__detail">
            <img src="admincp/modules/quanlysp/uploads/<?php echo $row["hinhanh"] ?>" alt="">
        </div>
        <div class="info__detail">
            <h4 class="info__detail--list">Tên sản phẩm: <?php echo $row["tensanpham"] ?></h4>
            <p class="info__detail--list">Mã sản phẩm: <?php echo $row["masanpham"] ?></p>
            <p class="info__detail--list">Giá sản phẩm: <?php echo $row["giasanpham"] ?></p>
            <p class="info__detail--list">Số lượng còn: <?php echo $row["soluong"] ?></p>
            <p class="info__detail--list">Danh mục: <?php echo $row2["tendanhmuc"] ?></p>
            <div class="buy">
                <div class="btn__buy buy__now">
                    <a href="?quanly=giohang&idsanpham=<?php echo $idsanpham ?>">Mua ngay</a>
                </div>
                <!-- <div class="btn__buy add__product">
                    <a href="">Thêm giỏ hàng</a>
                </div> -->
            </div>
        </div>
    </div>
    <div class="contain__detail--des">
        <div class="des__title">
            <pre><?php echo $row["tomtat"] ?></pre>
        </div>
        <div class="des__contain">
            <pre><?php echo $row["noidung"] ?></pre>
        </div>
    </div>
</div>