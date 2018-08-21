<?php
  $con = mysqli_connect('localhost','root','','web2');
    if (mysqli_connect_errno()) {
      echo "ไม่สามารถติดต่อฐานข้อมูลได้". mysqli_connect_error();
      exit;
    }
    mysqli_set_charset($con, 'utf8');

 ?>
