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


error_reporting(0);
$session_login_id = $_SESSION['member_id'];
$query_user = "SELECT * FROM tblmember WHERE member_id='$session_login_id'";
$result_user = mysqli_query($con,$query_user);
if ($result_user){
  $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
  $s_login_username = $row_user['member_name'];
  mysqli_free_result($result_user);
}

$memberscore = $_POST['rating'];
$id = $_GET['id'];
$x = 2;

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
    $check = "SELECT * FROM tblvote_comment WHERE member_id = '$session_login_id' AND location_id = '$id'";
    $result = mysqli_query($con,$check);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
      echo "<script type='text/javascript'>";
      echo "alert('คุณเคยเพิ่มความคิดเห็นในบทความนี้แล้ว');";
      echo "window.location = href='javascript:history.back(1);' ";

      echo "</script>";
    }else {
      $sql = "INSERT INTO tblvote_comment(member_id,location_id,rating_comment,rating_score) VALUES ((SELECT member_id FROM tblmember WHERE member_id = '$session_login_id')
      ,(SELECT location_id FROM tbllocation WHERE location_id = '$id')
      ,'".$_POST["comment"]."','".$_POST['rating']*$x."')";
      /*('".$_SESSION["member_id"]."','".$_POST["comment"]."','".$_POST["rating"]."')*/
      $query = mysqli_query($con,$sql);
    }
      if($query){
        echo "<script type='text/javascript'>";
        //echo "alert('เพิ่มความคิดเห็นสำเร็จ');";
        echo "window.location = 'p1member.php?id=$id'";
        echo "</script>";
      }

      mysqli_close($con);
      ?>
  </body>
</html>
