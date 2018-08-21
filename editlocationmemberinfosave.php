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

$id = $_GET['id'];

$locationmem_info_query ="SELECT * FROM tbllocation WHERE member_id='$session_login_id'";
$locationmemberinfo_result = mysqli_query($con, $locationmem_info_query);
$locationmemberinfo = mysqli_fetch_array($locationmemberinfo_result);

?>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<?php



//print_r($_POST);





                    $update = "UPDATE tbllocation SET location_name = '".$_POST['name']."', location_type = '".$_POST['type']."', location_info = '".$_POST['location_info']."',
                    location_address = '".$_POST['address']."', location_latitude = '".$_POST['latitude']."', location_longitude = '".$_POST['longitude']."',
                    location_fee = '".$_POST['fee']."', location_route = '".$_POST['route']."', location_landmark = '".$_POST['landmark']."'
                    WHERE location_id = '$id' ";

                    $update_query = mysqli_query($con,$update);

                    $update_pd = "UPDATE tblproduct2 SET product_store = '".$_POST['product_name']."', product_info = '".$_POST['product_info']."',
                    product_price = '".$_POST['product_price']."', product_address = '".$_POST['product_address']."'
                    WHERE location_id = '$id'";
                    $update_querypd = mysqli_query($con,$update_pd);

                    $update_sv = "UPDATE tblservice2 SET service_name = '".$_POST['service_name']."', service_info = '".$_POST['service_info']."',
                    service_fee = '".$_POST['service_fee']."', service_address = '".$_POST['service_address']."' WHERE location_id = '$id'    ";
                    $update_querysv = mysqli_query($con,$update_sv);

                    $update_rt = "UPDATE tblrestaurant2 SET restaurant_name = '".$_POST['rest_name']."',restaurant_info = '".$_POST['rest_info']."',
                    restaurant_reccomment = '".$_POST['rest_reccomment']."', restaurant_address = '".$_POST['rest_address']."',
                    restaurant_tell = '".$_POST['rest_tell']."', restaurant_website = '".$_POST['rest_website']."',
                    restaurant_opentime = '".$_POST['rest_opentime']."', restaurant_closetime = '".$_POST['rest_closetime']."',
                    restaurant_type = '".$_POST['rest_type']."' WHERE location_id = '$id'  ";
                    $update_queryrt = mysqli_query($con,$update_rt);

                    $update_ld = "UPDATE tbllodge SET lodge_name = '".$_POST['lodge_name']."', lodge_info = '".$_POST['lodge_info']."',
                    lodge_tell = '".$_POST['lodge_tell']."', lodge_price = '".$_POST['lodge_price']."', lodge_website = '".$_POST['lodge_website']."',
                    lodge_address = '".$_POST['lodge_address']."', lodge_type = '".$_POST['lodge_type']."' WHERE location_id = '$id' ";
                    $update_queryld = mysqli_query($con,$update_ld);

                    $update_fs = "UPDATE tblfestival2 SET festival_name = '".$_POST['fest_name']."', festival_info = '".$_POST['fest_info']."',
                    festival_timeup = '".$_POST['fest_up']."', festival_timeend = '".$_POST['fest_end']."' WHERE location_id = '$id'  ";
                    $update_queryfs = mysqli_query($con,$update_fs);

                    if ($update_query){
                      echo "<script type='text/javascript'>";
                      //echo "alert('แก้ไขบทความสำเร็จ');";
                      //echo "window.location = 'locationmemberinfo.php'";
                      echo "window.location.href = 'editlocationmemberinfo.php?id=$id' ";
                      echo "</script>";
                    }

      ?>
  </body>
</html>
