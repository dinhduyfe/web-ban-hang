<?php
    $sql_danhmuc = "SELECT * FROM tbl_danhmuc";
    $row_danhmuc = mysqli_query($mysqli,$sql_danhmuc);

?>

<div class="sidebar col s-3">
    <div class="sidebar__title">Danh Mục sản phẩm</div>
    <ul class="sidebar__list">
            <a href="?quanly=danhmucsanpham&iddanhmuc=tatca">
                <li class="sidebar__item">Tất cả</li>
            </a>
        <?php 
            $i = 0;
            while($row=mysqli_fetch_array($row_danhmuc)){
                $i++;
        ?>
            <a href="?quanly=danhmucsanpham&iddanhmuc=<?php echo $row["id_danhmuc"] ?>">
                <li class="sidebar__item"><?php echo $row["tendanhmuc"] ?></li>
            </a>
        <?php
            }
        ?>
            <!-- <a href="?quanly=danhmucsanpham&iddanhmuc='khac'">
                <li class="sidebar__item">Khác...</li>
            </a> -->
            
    </ul>
</div>