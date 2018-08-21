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

$loc_id = $_GET['loc_img_id'];

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

print_r($_POST);

                    if($_FILES["location_image_file"]["name"])
                    {

                      $target = "img/".basename($_FILES['location_image_file']['name']);
                      $image = $_FILES['location_image_file']['name'];

                      if(move_uploaded_file($_FILES["location_image_file"]["tmp_name"],"img/".$_FILES["location_image_file"]["name"])!= "")
                      {
                        $sq_update = "UPDATE tbllocation_image SET location_image_file = '$target' WHERE location_image_id = '$loc_id'";
                        $sq_query = mysqli_query($con,$sq_update);
                      }

                    }
                    if ($sq_query){
                      echo "<script type='text/javascript'>";
                      echo "window.location = href='javascript:history.back(1);' ";
                      echo "</script>";
                    }

                    /*for($i=0;$i<count($_FILES["location_image_file"]["name"]);$i++)
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



                      //$target = "img/".basename($_FILES['location_image_file']['name']);
                      //$image = $_FILES['location_image_file']['name'];
                      /*if(move_uploaded_file($_FILES["location_image_file"]["tmp_name"],"img/".$_FILES["location_image_file"]["name"]))
                      {
                          $sql_update = "UPDATE tbllocation_image SET location_image_file = '".$_FILES['location_image_file']['name']."' WHERE location_image_id = '$loc_id'";
                          $query = mysqli_query($con,$sql_update);
                      }*/


                     /*for($i=0;$i<count($_FILES["location_image_file"]["name"]);$i++)
                      {
                        $target = "img/".basename($_FILES['location_image_file']['name'][$i]);
                        $image = $_FILES['location_image_file']['name'][$i];
                        $text = $_POST['location_image_info'][$i];


                        if(move_uploaded_file($_FILES["location_image_file"]["tmp_name"][$i],"img/".$_FILES["location_image_file"]["name"][$i]) != "")
                        {

                            $sql_upload = "INSERT INTO tbllocation_image(location_id, location_image_file, location_image_info) VALUES ((SELECT location_id FROM tbllocation WHERE location_id = $last_id),'$target', '$text')";
                            $query = mysqli_query($con,$sql_upload);
                        }
                      }*/








      ?>
  </body>
</html>
