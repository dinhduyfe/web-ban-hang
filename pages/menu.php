<?php
    session_start();
    if(!empty($_SESSION['dangnhap']["id"])){
        $rows_dangky = mysqli_query($mysqli,"SELECT * FROM tbl_dangki WHERE id_dangki= '".$_SESSION['dangnhap']["id"]."'");
        $row_dangky = mysqli_fetch_assoc($rows_dangky);
    }
?>
<div class="menu">
    <ul class="menu__list">
        <a href="index.php?quanly=trangchu&iddanhmuc=tatca">
            <li class="menu__item">Trang chủ</li>
        </a>
        <a href="index.php?quanly=gioithieu">
            <li class="menu__item">Giới thiệu</li>
        </a>
        <a href="index.php?quanly=tintuc">
            <li class="menu__item">Tin tức</li>
        </a>
        <a href="index.php?quanly=giohang">
            <li class="menu__item">Giỏ hàng</li>
        </a>
        <a href="index.php?quanly=donhang">
            <li class="menu__item">Đơn hàng</li>
        </a>
        <?php
            if(empty($_SESSION['dangnhap']["name"])){
        ?>
        <li style="list-style:none;" class="menu__item">
            <a style="display:inline-block; height: 40px; width:80px;" href="pages/main/dangky.php">Đăng ký</a>
            |
            <a style="display:inline-block; height: 40px;width:80px;" href="pages/main/dangnhap.php">Đăng nhập</a>
        </li>
        <?php
            }else{
        ?>
            <li class="user">
                <img style="width: 20px; height: 20px; border-radius: 50%; " src="images/avater.png" alt="">
                <p style="display:inline;">
                    <?php echo ($_SESSION['dangnhap']["name"]) ?>
                </p>
                <a href="pages/main/dangnhap.php?account=dangxuat" class="logout">Đăng xuất</a>
            </li>
        <?php
            }   
        ?>
    </ul>
</div>
<div class="search__input">
    <input type="text">
</div>