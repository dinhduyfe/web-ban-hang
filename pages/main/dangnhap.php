<?php
session_start();
if(isset($_GET["account"]) && $_GET["account"]=="dangxuat"){
    unset($_SESSION["dangnhap"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/dangky.css" >
    <title>ĐĂNG NHẬP TÀI KHOẢN</title>
</head>
<body>
<div class="form">

<form action="" method="POST">
    <table class="table_dangky" >
        <th colspan="2" style="text-align: center"><b>ĐĂNG NHẬP PAUGET SNEAKER</b></th>
        <tr>
            <td colspan="2" style="text-align: center"><img  src="../../images/1.png" alt="Logo" width="60" height="60"></td>
        </tr>
        <tr>
            <td>Tên đăng nhập</td>
            <td><input value=""  type="text" name="username" placeholder="Tên đăng nhập"></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input value="" type="password" name="matkhau" placeholder="Mật Khẩu"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center"><button type="submit" class="button" name="dangnhapuser" >ĐĂNG NHẬP</button></td>
        </tr>
        <tr>
            <td colspan="2"  ><p style="margin-left: 20px; text-align:right;color:blue"> <i>Bạn quên mật khẩu?</i></p></td>
        </tr>
        <tr><a href="../../index.php">Quay lại</a></tr>
    </table>
</form>
</body>
</html>


<?php
    include("../../admincp/config/config.php");
    if(isset($_POST['dangnhapuser'])){
        $taikhoan=$_POST['username'];
        $matkhau=md5($_POST['matkhau']);
        $sql=" SELECT * FROM  tbl_dangki  WHERE tendangnhap='".$taikhoan."' AND matkhau='".$matkhau."' ";
        $rows=mysqli_query($mysqli,$sql);
        $row=mysqli_fetch_assoc($rows);
        if($row)
        {
            $_SESSION['dangnhap']["id"] = $row["id_dangki"];
            $_SESSION['dangnhap']["name"] = $row["hovaten"];
            header("Location:../../index.php");
        }
        else
        {
            echo "Tài khoản hoặc mật khẩu không đúng"; 
        }
    }
?>