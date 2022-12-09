<?php
    $mysqli = mysqli_connect('localhost','root','','mywebphp');
    if (!$mysqli) {
        die("Lỗi kết nối: " . mysqli_connect_error());
      }
?>