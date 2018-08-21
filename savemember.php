<?php
  require 'connectdb.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php



    $serverName = "localhost";
    $userName = "root";
    $userPassword = "";
    $dbName = "web2";


    $con = mysqli_connect($serverName,$userName,$userPassword,$dbName);
    mysqli_set_charset($con, 'utf8');

    $member_username = $_POST['username'];
    $member_password = $_POST['password'];
    $member_name = $_POST['name'];
    $member_surname = $_POST['surname'];
    $member_sex = $_POST['sex'];
    $member_bdate = $_POST['bdate'];
    #$member_mdate = $_POST['mdate'];
    #$member_ydate = $_POST['ydate'];
    $member_address = $_POST['address'];
    $member_province = $_POST['province'];
    $member_postcode = $_POST['postcode'];
    $member_email = $_POST['email'];
    $member_facebook = $_POST['facebook'];
    $member_twitter = $_POST['twitter'];
    $member_instagram = $_POST['instagram'];
    //$member_img = $_GET['img'];

    $salt = 'tikde78uj4ujuhlaoikiksakeidke';
    $hash_member_password = hash_hmac('sha256',$member_password,$salt);

    if($_POST['password']!= $_POST['confirmpassword']){
      echo "<script type='text/javascript'>";
      echo "alert('รหัสผ่านไม่ตรงกัน');";
      echo "window.location = href='javascript:history.back(1);' ";
      echo "</script>";
      exit();
    }

    $query = "INSERT INTO tblmember(member_username,member_password,member_name,member_surname,member_sex,member_bdate,member_address,member_province,member_postcode,member_email,member_facebook,member_twitter,member_instagram,member_image)
            VALUES ('$member_username','$hash_member_password','$member_name','$member_surname','$member_sex','$member_bdate','$member_address','$member_province','$member_postcode','$member_email','$member_facebook','$member_twitter','$member_instagram','member.jpeg')";
    $result = mysqli_query($con,$query);

      if($result){
        echo "<script type='text/javascript'>";
        //echo "alert('สมัครสมาชิกสำเร็จ');";
        echo "window.location = 'memberloginform.php'; ";
        echo "</script>";
        exit();
      }
      else {
        echo "<script type='text/javascript'>";
        echo "alert('มีชื่อผู้ใช้อยู่ในระบบแล้ว');";
        echo "window.location = href='javascript:history.back(1);' ";
        echo "</script>";

      }

      mysqli_close($con);
      ?>
  </body>
</html>
