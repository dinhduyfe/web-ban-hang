<?php
if(isset($_GET["idsanpham"])){
    include("sanpham/chitietsanpham.php");
}else{
    include("sanpham/sanpham.php");
}
?>