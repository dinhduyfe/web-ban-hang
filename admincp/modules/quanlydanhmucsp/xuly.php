
<?php
    include("../../config/config.php");
    $tendanhmucsp = $_POST["tendanhmuc"];
    $sothutu = $_POST["sothutu"];

    if(isset($_POST['themdanhmuc'])){
        $sql_them = "INSERT INTO tbl_danhmuc(tendanhmuc,thutu) VALUE ('".$tendanhmucsp."','".$sothutu."')";
        mysqli_query($mysqli,$sql_them);
        header("location: ../../index.php?action=quanlydanhmucsp&query=them");
    }elseif($_GET['query'] == "xoa"){
        $iddanhmuc =  $_GET['iddanhmuc'];
        $sql_xoadanhmuc = "DELETE FROM tbl_danhmuc WHERE id_danhmuc = '".$iddanhmuc."'  ";
        mysqli_query($mysqli,$sql_xoadanhmuc);
        header("location: ../../index.php?action=quanlydanhmucsp&query=them");
    }elseif(isset($_POST['suadanhmuc'])){
        $iddanhmuc = $_GET['iddanhmuc'];
        echo $iddanhmuc;
        $tendanhmucsp =$_POST['tendanhmuc'];
        $sothutu = $_POST['sothutu'];
        $sql_sua = "UPDATE tbl_danhmuc SET tendanhmuc = '".$tendanhmucsp."', thutu = '".$sothutu."' WHERE '".$iddanhmuc."' = id_danhmuc";
        mysqli_query($mysqli,$sql_sua);
        header("location: ../../index.php?action=quanlydanhmucsp&query=them");
    }
?>