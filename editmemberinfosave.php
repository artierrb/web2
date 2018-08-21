<!DOCTYPE html>
<?php

session_start();
if (!isset($_SESSION['member_id'])) {

}


$server = "localhost";
$username = "root";
$password = "";
$database = "web2";
$con = mysqli_connect($server, $username, $password, $database)
or die("Cannot connect database!!!");
mysqli_query($con, "set names utf8");

$session_login_id = $_SESSION['member_id'];
$query_user = "SELECT * FROM tblmember WHERE member_id='$session_login_id'";
$result_user = mysqli_query($con,$query_user);
if ($result_user){
  $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
  $s_login_username = $row_user['member_name'];
  mysqli_free_result($result_user);
}

$mem_info_query ="SELECT * FROM tblmember WHERE member_id='$session_login_id'";
$memberinfo_result = mysqli_query($con, $mem_info_query);
$memberinfo = mysqli_fetch_array($memberinfo_result);

$member_password = $_POST['pwd'];
$salt = 'tikde78uj4ujuhlaoikiksakeidke';
$hash_member_password = hash_hmac('sha256',$member_password,$salt);

$pwd = $_POST['pwd'];
$name = $_POST['name'];
$sname = $_POST['surname'];
$sex = $_POST['sex'];
$bdate = $_POST['bdate'];
#$mdate = $_POST['mdate'];
#$ydate = $_POST['ydate'];
$address = $_POST['address'];
$province = $_POST['province'];
$postcode = $_POST['postcode'];
$email = $_POST['email'];
$fb = $_POST['facebook'];
$twitt = $_POST['twitter'];
$ig = $_POST['instagram'];

$update = "UPDATE tblmember SET member_password = '$hash_member_password', member_name = '$name',member_surname = '$sname',member_sex = '$sex',member_bdate = '$bdate',member_address = '$address',member_province = '$province',member_postcode = '$postcode' , member_email = '$email'
          ,member_facebook = '$fb', member_twitter = '$twitt', member_instagram = '$ig' WHERE member_id = '$session_login_id' ";



$update_query = mysqli_query($con,$update);
if ($update_query){
  echo "<script type='text/javascript'>";
  //echo "alert('แก้ไขข้อมูลส่วนตัวสำเร็จ');";
  echo "window.location = 'memberinfo.php?memberid=$session_login_id'";
  echo "</script>";
}

 ?>
