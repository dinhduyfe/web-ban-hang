<!-- <div class="grid wide">
    <div class="row">
        <div class="path col">Trang chủ > Giày</div>
        
    </div>
</div> -->
<div class="wide grid">
    <div class="row">
            <?php

            if(isset($_GET["quanly"])){
                $quanly = $_GET["quanly"];
            }else{
                $quanly = "";
            }

            if($quanly=="trangchu"){
                include("sidebar/sidebar.php");
                include("main/index.php");
            }elseif($quanly=="gioithieu"){
                include("main/gioithieu.php");
            }elseif($quanly=="giohang"){
                include("main/giohang/giohang.php");
            }elseif($quanly=="donhang"){
                include("main/donhang/lietke.php");
            }elseif($quanly=="chitietdonhang"){
                include("main/donhang/chitietdonhang.php");
            }elseif($quanly=="tintuc"){
                include("main/tintuc.php");
            }else{
                include("sidebar/sidebar.php");
                include("main/index.php");
            }
        ?>
        
    </div>
</div>