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
              $target = "img/".basename($_FILES['location_image_file']['name'][$i]);
              $image = $_FILES['location_image_file']['name'][$i];
              $text = $_POST['location_image_info'][$i];


              if(move_uploaded_file($_FILES["location_image_file"]["tmp_name"][$i],"img/".$_FILES["location_image_file"]["name"][$i]) != "")
              {

                  $sql_upload = "INSERT INTO tbllocation_image(location_id, location_image_file, location_image_info) VALUES ((SELECT location_id FROM tbllocation WHERE location_id = $last_id),'$target', '$text')";
                  $query = mysqli_query($con,$sql_upload);
              }
            }

        $sql_product = "INSERT INTO tblproduct2(location_id,product_id,member_id,product_store,product_info,product_price,product_address)
        VALUES ((SELECT location_id FROM tbllocation WHERE location_id = $last_id),(SELECT location_id FROM tbllocation WHERE location_id = $last_id),(SELECT member_id FROM tblmember WHERE member_id = '$session_login_id'),'".$_POST["product_name"]."','".$_POST["product_info"]."','".$_POST["product_price"]."','".$_POST["product_address"]."')";

        $query_product = mysqli_query($con,$sql_product);

        //$last_id_product = mysqli_insert_id($con);

            for($i=0;$i<count($_FILES["product_image_file"]["name"]);$i++)
            {
              $target_product = "img/".basename($_FILES['product_image_file']['name'][$i]);
              $image_product = $_FILES['product_image_file']['name'][$i];
              $text_product = $_POST['product_image_info'][$i];


              if(move_uploaded_file($_FILES["product_image_file"]["tmp_name"][$i],"img/".$_FILES["product_image_file"]["name"][$i]) != "")
              {

                  $sql_upload_product = "INSERT INTO tblproduct_image(location_id,product_id, product_image_file, product_image_info) VALUES ((SELECT location_id FROM tbllocation WHERE location_id = $last_id),(SELECT location_id FROM tbllocation WHERE location_id = $last_id),'$target_product', '$text_product')";
                  $query_product = mysqli_query($con,$sql_upload_product);
              }
            }

        $sql_service = "INSERT INTO tblservice2(location_id,service_id,member_id,service_name,service_info,service_fee,service_address)
        VALUES ((SELECT location_id FROM tbllocation WHERE location_id = $last_id),(SELECT location_id FROM tbllocation WHERE location_id = $last_id),(SELECT member_id FROM tblmember WHERE member_id = '$session_login_id'),'".$_POST["service_name"]."','".$_POST["service_info"]."','".$_POST["service_fee"]."','".$_POST["service_address"]."')";

        $query_product = mysqli_query($con,$sql_service);

            for($i=0;$i<count($_FILES["service_image_file"]["name"]);$i++)
            {
              $target_service = "img/".basename($_FILES['service_image_file']['name'][$i]);
              $image_service = $_FILES['service_image_file']['name'][$i];
              $text_service = $_POST['service_image_info'][$i];


              if(move_uploaded_file($_FILES["service_image_file"]["tmp_name"][$i],"img/".$_FILES["service_image_file"]["name"][$i]) != "")
              {

                  $sql_upload_service = "INSERT INTO tblservice2_image(location_id,service_id, service_image_file, service_image_info) VALUES ((SELECT location_id FROM tbllocation WHERE location_id = $last_id),(SELECT location_id FROM tbllocation WHERE location_id = $last_id),'$target_service', '$text_service')";
                  $query_service = mysqli_query($con,$sql_upload_service);
              }
            }

        $sql_restaurant = "INSERT INTO tblrestaurant2(location_id,restaurant_id,member_id,restaurant_name,restaurant_info,restaurant_reccomment,restaurant_address,restaurant_tell,restaurant_website,restaurant_opentime,restaurant_closetime,restaurant_type)
        VALUES ((SELECT location_id FROM tbllocation WHERE location_id = $last_id),(SELECT location_id FROM tbllocation WHERE location_id = $last_id),(SELECT member_id FROM tblmember WHERE member_id = '$session_login_id'),'".$_POST["rest_name"]."','".$_POST["rest_info"]."','".$_POST["rest_reccomment"]."','".$_POST["rest_address"]."','".$_POST["rest_tell"]."','".$_POST["rest_website"]."','".$_POST["rest_opentime"]."','".$_POST["rest_closetime"]."','".$_POST["rest_type"]."')";

        $query_restaurant = mysqli_query($con,$sql_restaurant);

            for($i=0;$i<count($_FILES["restaurant_image_file"]["name"]);$i++)
            {
              $target_restaurant = "img/".basename($_FILES['restaurant_image_file']['name'][$i]);
              $image_restaurant = $_FILES['restaurant_image_file']['name'][$i];
              $text_restaurant = $_POST['restaurant_image_info'][$i];


              if(move_uploaded_file($_FILES["restaurant_image_file"]["tmp_name"][$i],"img/".$_FILES["restaurant_image_file"]["name"][$i]) != "")
              {

                  $sql_upload_restaurant = "INSERT INTO tblrestaurant2_image(location_id,restaurant_id, restaurant_image_file, restaurant_image_info) VALUES ((SELECT location_id FROM tbllocation WHERE location_id = $last_id),(SELECT location_id FROM tbllocation WHERE location_id = $last_id),'$target_restaurant', '$text_restaurant')";
                  $query_restaurant = mysqli_query($con,$sql_upload_restaurant);
              }
            }

        $sql_lodge = "INSERT INTO tbllodge(location_id,lodge_id,member_id,lodge_name,lodge_info,lodge_price,lodge_tell,lodge_website,lodge_address,lodge_type)
        VALUES ((SELECT location_id FROM tbllocation WHERE location_id = $last_id),(SELECT location_id FROM tbllocation WHERE location_id = $last_id),(SELECT member_id FROM tblmember WHERE member_id = '$session_login_id'),'".$_POST["lodge_name"]."','".$_POST["lodge_info"]."','".$_POST["lodge_price"]."','".$_POST["lodge_tell"]."','".$_POST["lodge_website"]."','".$_POST["lodge_address"]."','".$_POST["lodge_type"]."')";

        $query_lodge = mysqli_query($con,$sql_lodge);

            for($i=0;$i<count($_FILES["lodge_image_file"]["name"]);$i++)
            {
              $target_lodge = "img/".basename($_FILES['lodge_image_file']['name'][$i]);
              $image_lodge = $_FILES['lodge_image_file']['name'][$i];
              $text_lodge = $_POST['lodge_image_info'][$i];


              if(move_uploaded_file($_FILES["lodge_image_file"]["tmp_name"][$i],"img/".$_FILES["lodge_image_file"]["name"][$i]) != "")
              {

                  $sql_upload_lodge = "INSERT INTO tbllodge_image(location_id,lodge_id, lodge_image_file, lodge_image_info) VALUES ((SELECT location_id FROM tbllocation WHERE location_id = $last_id),(SELECT location_id FROM tbllocation WHERE location_id = $last_id),'$target_lodge', '$text_lodge')";
                  $query_lodge = mysqli_query($con,$sql_upload_lodge);
              }
            }

        $sql_festival = "INSERT INTO tblfestival2(location_id,festival_id,member_id,festival_name,festival_info,festival_timeup,festival_timeend)
        VALUES ((SELECT location_id FROM tbllocation WHERE location_id = $last_id),(SELECT location_id FROM tbllocation WHERE location_id = $last_id),(SELECT member_id FROM tblmember WHERE member_id = '$session_login_id'),'".$_POST["fest_name"]."','".$_POST["fest_info"]."','".$_POST["fest_up"]."','".$_POST["fest_end"]."')";

        $query_festival = mysqli_query($con,$sql_festival);

            for($i=0;$i<count($_FILES["festival_image_file"]["name"]);$i++)
            {
              $target_festival = "img/".basename($_FILES['festival_image_file']['name'][$i]);
              $image_festival = $_FILES['festival_image_file']['name'][$i];
              $text_festival = $_POST['festival_image_info'][$i];


              if(move_uploaded_file($_FILES["festival_image_file"]["tmp_name"][$i],"img/".$_FILES["festival_image_file"]["name"][$i]) != "")
              {

                  $sql_upload_festival = "INSERT INTO tblfestival2_image(location_id,festival_id, festival_image_file, festival_image_info) VALUES ((SELECT location_id FROM tbllocation WHERE location_id = $last_id),(SELECT location_id FROM tbllocation WHERE location_id = $last_id),'$target_festival', '$text_festival')";
                  $query_festival = mysqli_query($con,$sql_upload_festival);
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
