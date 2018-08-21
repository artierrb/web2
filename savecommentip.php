<!DOCTYPE html>
<?php


$server = "localhost";
$username = "root";
$password = "";
$database = "web2";

$con = mysqli_connect($server, $username, $password, $database)
or die("Cannot connect database!!!");
mysqli_query($con, "set names utf8");





//$ipaddress = $_SERVER['REMOTE_ADDR'];
$id = $_GET['id'];
$host= gethostname();
$ip = gethostbyname($host);
/*$location ="SELECT * FROM tbllocation WHERE location_id='$id'";
$locationresult = mysqli_query($con, $location);
if ($locationresult){
  $locationinfo = mysqli_fetch_array($locationresult,MYSQLI_ASSOC);
  $s_loc_name = $locationinfo['location_name'];
  mysqli_free_result($locationresult);
}*/
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $check = "SELECT * FROM tblvote_comment WHERE ip_address = '$ip' AND location_id = '$id'";
    $result = mysqli_query($con,$check);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
      echo "<script type='text/javascript'>";
      echo "alert('คุณเคยเพิ่มความคิดเห็นในบทความนี้แล้ว');";
      echo "window.location = href='javascript:history.back(1);' ";

      echo "</script>";
    }else {
      $sql = "INSERT INTO tblvote_comment(location_id,rating_comment,rating_score,ip_address) VALUES ((SELECT location_id FROM tbllocation WHERE location_id = '$id')
      ,'".$_POST["comment"]."','".$_POST["rating"]."', '$ip')";
      /*('".$_SESSION["member_id"]."','".$_POST["comment"]."','".$_POST["rating"]."')*/
      $query = mysqli_query($con,$sql);
    }
      if($query){
        echo "<script type='text/javascript'>";
        //echo "alert('เพิ่มความคิดเห็นสำเร็จ');";
        echo "window.location = 'p1.php?id=$id'";
        echo "</script>";
      }

      mysqli_close($con);
      ?>
  </body>
</html>
