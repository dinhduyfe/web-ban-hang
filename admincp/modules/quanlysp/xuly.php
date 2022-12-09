
<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
    include("../../config/config.php");
    $tensp = $_POST["tensanpham"];
    $masp = $_POST["masanpham"];
    $giasp = $_POST["giasanpham"];
    $soluong = $_POST["soluong"];
    $tomtat = $_POST["tomtat"];
    $noidung = $_POST["noidung"];
    $tinhtrang = $_POST["tinhtrang"];
    $iddanhmuc = $_POST["danhmuc"];
    
    if(isset($_POST['themsanpham'])){
        $hinhanh = time().'_'.$_FILES["hinhanh"]["name"];
        $hinhanh_tmp = $_FILES["hinhanh"]["tmp_name"];
        $sql_them = "INSERT INTO tbl_sanpham (tensanpham,masanpham,giasanpham,soluong,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc) 
        VALUE ('".$tensp."','".$masp."','".$giasp."','".$soluong."','".$hinhanh."','".$tomtat."','".$noidung."','".$tinhtrang."','".$iddanhmuc."')";
        mysqli_query($mysqli,$sql_them);
        move_uploaded_file($hinhanh_tmp,"uploads/".$hinhanh);
        header("location: ../../index.php?action=quanlysp");
    }elseif($_GET['query'] == "xoa"){
        $idsanpham =  $_GET['idsanpham'];
        $sql_xoaanhsanpham = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '".$idsanpham."'  ";
        $row_xoaanhsanpham = mysqli_query($mysqli,$sql_xoaanhsanpham);
        $row = mysqli_fetch_assoc($row_xoaanhsanpham);
        unlink("uploads/".$row['hinhanh']);
        $sql_xoasanpham = "DELETE FROM tbl_sanpham WHERE id_sanpham = '".$idsanpham."'  ";
        mysqli_query($mysqli,$sql_xoasanpham);
        header("location: ../../index.php?action=quanlysp");
    }elseif(isset($_POST['suasanpham'])){
        
        $idsanpham =  $_GET['idsanpham'];
        $sql_xoaanhsanpham = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '".$idsanpham."'  ";
        $row_xoaanhsanpham = mysqli_query($mysqli,$sql_xoaanhsanpham);
        $row = mysqli_fetch_assoc($row_xoaanhsanpham);
        if(!empty($_FILES["hinhanh"]["name"])){
            $hinhanh = time().'_'.$_FILES["hinhanh"]["name"];
            $hinhanh_tmp = $_FILES["hinhanh"]["tmp_name"];
            unlink("uploads/".$row['hinhanh']);
            move_uploaded_file($hinhanh_tmp,"uploads/".$hinhanh);
        }else{
            $hinhanh = $row['hinhanh'];
        }

        $sql_sua = "UPDATE tbl_sanpham 
        SET tensanpham = '".$tensp."', masanpham = '".$masp."',giasanpham = '".$giasp."',soluong = '".$soluong."',hinhanh = '".$hinhanh."',tomtat = '".$tomtat."',noidung = '".$noidung."',tinhtrang = '".$tinhtrang."',id_danhmuc = '".$iddanhmuc."' 
        WHERE '".$idsanpham."' = id_sanpham";
        mysqli_query($mysqli,$sql_sua);
        header("location: ../../index.php?action=quanlysp");
    }
?>