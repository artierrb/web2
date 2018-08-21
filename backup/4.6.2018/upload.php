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
$target = "img/".basename($_FILES['location_image_file']['name'][$i]);
$image = $_FILES['location_image_file']['name'][$i];
$text = $_POST['location_image_info'];







if ($result_user){
  $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
  $s_login_username = $row_user['member_name'];
  mysqli_free_result($result_user);
}







?>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $sql = "INSERT INTO tbllocation(member_id,location_name,location_type,location_info,location_address,location_latitude,location_longitude,location_fee,location_route,
            location_landmark,location_date)
            VALUES ((SELECT member_id FROM tblmember WHERE member_id = '$session_login_id'),'".$_POST["name"]."','".$_POST["type"]."','".$_POST["location_info"]."','".$_POST["address"]."','".$_POST["latitude"]."','".$_POST["longitude"]."'
            ,'".$_POST["fee"]."','".$_POST["route"]."','".$_POST["landmark"]."',CURTIME())";

    $query = mysqli_query($con,$sql);

    $last_id = mysqli_insert_id($con);

        for($i=0;$i<count($_FILES["location_image_file"]["name"]);$i++)
        {


          if(trim(move_uploaded_file($_FILES["location_image_file"]["tmp_name"],"img/".$_FILES["location_image_file"]["name"][$i])))
          {

              $sql_upload = "INSERT INTO tbllocation_image(location_id, location_image_file, location_image_info) VALUES ((SELECT location_id FROM tbllocation WHERE location_id = $last_id),'$target', '$text')";
              $query = mysqli_query($con,$sql_upload);
          }
        }




        if($query){
        echo "<script type='text/javascript'>";
        //echo "alert('เพิ่มข้อมูลสถานที่สำเร็จ');";
        echo "window.location = 'locationmemberinfo.php'; ";
        echo "</script>";
        }



      mysqli_close($con);
      ?>
  </body>
</html>
