<?php
include("../../admincp/config/config.php");
if(isset($_POST['dangky'])){
    $hovaten=$_POST['hovaten'];
    $gioitinh=$_POST['gioitinh'];
    $sodienthoai=$_POST['sodienthoai'];
    $diachi=$_POST['diachi'];
    $tendn=$_POST['username'];
    $matkhau=md5($_POST['matkhau']);

    $sql_dangki="INSERT INTO tbl_dangki(hovaten,gioitinh,sodienthoai,tendangnhap,matkhau,diachi)
    VALUE('".$hovaten."','".$gioitinh."','".$sodienthoai."','".$tendn."','".$matkhau."','".$diachi."')";
    mysqli_query($mysqli,$sql_dangki);
    header("location: dangnhap.php");
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="~/css/variabledocument.css" type="text/css" />
    <link rel="stylesheet" href="../../css/dangky.css" >
    <title>ĐĂNG KÍ TÀI KHOẢN</title>
</head>
<body>
    <div class="form">

<form action="dangky.php" method="POST">
    <table class="table_dangky" >
        <th colspan="2" style="text-align: center"><b>ĐĂNG KÝ THÀNH VIÊN</b></th>
        <tr>
            <td colspan="2" style="text-align: center"><img  src="../../images/1.png" alt="Logo" width="60" height="60"></td>
        </tr>
        <tr>
            <td>Họ và tên</td>
            <td><input  type="text" name="hovaten" placeholder="Họ và tên..."></td>
            
        </tr>
        
        <tr>
            <td>Giới tính</td>
            <td>
                <select name="gioitinh" >
                    <option value=0 >Nam</option>
                    <option value=1 >Nữ</option>
                </select>
             </td>
        </tr>
         <tr>
            <td>Địa chỉ</td>
            <td><input  type="text" name="diachi"></td>
        </tr>
        <tr>

            <td>Email</td>
            <td><input  type="text" name="email" placeholder="abc@gmail.com"></td>
        </tr>
        <tr>
            <td>Số điện thoại</td>
            <td><input  type="text" name="sodienthoai" placeholder="Số điện thoại"></td>
        </tr>
        <tr>
            <td>Tên đăng nhập</td>
            <td><input  type="text" name="username" placeholder="Tên đăng nhập"></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input  type="password" name="matkhau" placeholder="Mật Khẩu"></td>
        </tr>
        <tr>
            <td>Nhắc lại mật khẩu</td>
            <td><input type="password" name="repassword" placeholder="Nhắc lại mật khẩu"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center"><button type="submit" class="button" name="dangky" >ĐĂNG KÝ</button></td>
        </tr>
        <tr>
            <td colspan="2"  ><p style="margin-left: 20px"> <i>Bạn đã có tài khoản? <a style="color:blue" href="dangnhap.php">ĐĂNG NHẬP</a></i></p></td>
        </tr>

    </table>
</form>

    </div>
</body>
</html>