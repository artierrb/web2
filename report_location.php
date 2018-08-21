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
  $s_login_name = $row_user['member_username'];
  $s_login_pwd = $row_user['member_password'];
  $s_login_surname = $row_user['member_surname'];
  $s_login_sex = $row_user['member_sex'];
  $s_login_bdate = $row_user['member_bdate'];
  #$s_login_mdate = $row_user['member_mdate'];
  #$s_login_ydate = $row_user['member_ydate'];
  $s_login_address = $row_user['member_address'];
  $s_login_province = $row_user['member_province'];
  $s_login_postcode = $row_user['member_postcode'];
  $s_login_email = $row_user['member_email'];
  $s_login_fb = $row_user['member_facebook'];
  $s_login_tw = $row_user['member_twitter'];
  $s_login_ig = $row_user['member_instagram'];
  $s_login_image = $row_user['member_image'];
  mysqli_free_result($result_user);
}

$session_login_id = $_SESSION['member_id'];
$query_user = "SELECT * FROM tblmember WHERE member_id='$session_login_id'";
$result_user = mysqli_query($con,$query_user);

if ($result_user){
  $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
  $s_login_username = $row_user['member_name'];
  mysqli_free_result($result_user);
}

$id = $_GET['id'];
$member_id = $_GET['member'];
$report_byname = $_GET['reportbyname'];
$report_bysurname = $_GET['reportbysurname'];

print_r($_POST);
$report_sql = "INSERT INTO tblreport_location(location_id,member_id,by_member_name,by_member_surname,report_message,report_date)
VALUES ((SELECT location_id FROM tbllocation WHERE location_id = $id),
              (SELECT member_id FROM tblmember WHERE member_id = $member_id),(SELECT member_name FROM tblmember WHERE member_id = $report_byname)
              ,(SELECT member_surname FROM tblmember WHERE member_id = $report_bysurname),'".$_POST["report_message"]."'
              ,CURTIME())";
$query_sql = mysqli_query($con,$report_sql);

if ($query_sql) {
  echo "<script type='text/javascript'>";
  //echo "alert('เพิ่มข้อมูลสถานที่สำเร็จ');";
  echo "window.location = href='javascript:history.back(1);'; ";
  echo "</script>";
  }



?>
