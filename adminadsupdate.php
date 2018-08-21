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


$locationmem_info_query ="SELECT * FROM tbllocation WHERE member_id='$session_login_id'";
$locationmemberinfo_result = mysqli_query($con, $locationmem_info_query);
$locationmemberinfo = mysqli_fetch_array($locationmemberinfo_result);

$type = $_GET['type'];
$bannerid = $_GET['bannerid'];

?>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<?php

print_r($_POST);

                      /*$update = "UPDATE tbllocation_image SET location_image_info = '".$_POST['location_image_info']."' WHERE location_image_id = '$loc_id' ";
                      $update_query = mysqli_query($con,$update);

                      if ($update_query){
                        echo "<script type='text/javascript'>";
                        //echo "window.location = href='javascript:history.back(1);' ";
                        //echo "window.location = href='javascript:history.go(0);' ";
                        //echo "window.location = href ='editlocationmemberinfo.php?id=$id";
                        //echo "window.location.replace('editlocationmemberinfo.php?id=$id'+ '?openmodal=1') ";
                        echo "window.location.href = 'adminads.php' ";
                        echo "</script>";

                      }*/
                      $update_time_top = "UPDATE tblads_banner SET banner_timeup = '".$_POST['timeup']."', banner_timeend = '".$_POST['timeend']."' WHERE banner_type = '$type' ";
                      $update_query_time_top = mysqli_query($con,$update_time_top);

                      $update_time_mid = "UPDATE tblads_banner SET banner_timeup = '".$_POST['timeup_mid']."', banner_timeend = '".$_POST['timeend_mid']."' WHERE banner_id = '$bannerid' ";
                      $update_query_time_mid = mysqli_query($con,$update_time_mid);

                      if($_FILES["banner_file"]["name"])
                      {

                        $target = "img/imgdb/banner/".date('dmYHis').str_replace(" ", "", basename($_FILES['banner_file']['name']));
                        $image = $_FILES['banner_file']['name'];
                        $newfilename = date('dmYHis').str_replace(" ", "", basename($_FILES["banner_file"]["name"]));

                        if(move_uploaded_file($_FILES["banner_file"]["tmp_name"],"img/imgdb/banner/" . $newfilename));
                        {
                          unlink($_POST["top_oldfile"]);
                          $sq_update = "UPDATE tblads_banner SET banner_file = '$target' WHERE banner_type = '$type'";
                          $sq_query = mysqli_query($con,$sq_update);
                        }

                      }
                      if($_FILES["banner_file"]["name"])
                      {

                        $target_mid = "img/imgdb/banner/".date('dmYHis').str_replace(" ", "", basename($_FILES['banner_file']['name']));
                        $image_mid = $_FILES['banner_file']['name'];
                        $newfilename_mid = date('dmYHis').str_replace(" ", "", basename($_FILES["banner_file"]["name"]));

                        if(move_uploaded_file($_FILES["banner_file"]["tmp_name"],"img/imgdb/banner/" . $newfilename_mid));
                        {
                          unlink($_POST["mid_oldfile"]);
                          $sq_update = "UPDATE tblads_banner SET banner_file = '$target' WHERE banner_type = '$type'";
                          $sq_query = mysqli_query($con,$sq_update);
                        }

                      }
                      if($_FILES["banner_file"]["name"])
                      {

                        $target_bot = "img/imgdb/banner/".date('dmYHis').str_replace(" ", "", basename($_FILES['banner_file']['name']));
                        $image_bot = $_FILES['banner_file']['name'];
                        $newfilename_bot = date('dmYHis').str_replace(" ", "", basename($_FILES["banner_file"]["name"]));

                        if(move_uploaded_file($_FILES["banner_file"]["tmp_name"],"img/imgdb/banner/" . $newfilename_bot));
                        {
                          unlink($_POST["bot_oldfile"]);
                          $sq_update = "UPDATE tblads_banner SET banner_file = '$target' WHERE banner_id = '$bannerid'";
                          $sq_query = mysqli_query($con,$sq_update);
                        }

                      }
                      if($_FILES["banner_file"]["name"])
                      {

                        $target_small = "img/imgdb/banner/".date('dmYHis').str_replace(" ", "", basename($_FILES['banner_file']['name']));
                        $image_small = $_FILES['banner_file']['name'];
                        $newfilename_small = date('dmYHis').str_replace(" ", "", basename($_FILES["banner_file"]["name"]));

                        if(move_uploaded_file($_FILES["banner_file"]["tmp_name"],"img/imgdb/banner/" . $newfilename_small));
                        {
                          unlink($_POST["small_oldfile"]);
                          $sq_update = "UPDATE tblads_banner SET banner_file = '$target' WHERE banner_type = '$type'";
                          $sq_query = mysqli_query($con,$sq_update);
                        }

                      }
                      if ($update_query_time_top){
                        echo "<script type='text/javascript'>";
                        //echo "window.location = href='javascript:history.back(1);' ";
                        //echo "window.location = href='javascript:history.go(0);' ";
                        //echo "window.location = href ='editlocationmemberinfo.php?id=$id";
                        //echo "window.location.replace('editlocationmemberinfo.php?id=$id'+ '?openmodal=1') ";
                        echo "window.location.href = 'adminads.php' ";
                        echo "</script>";
                        }











      ?>
  </body>
</html>
