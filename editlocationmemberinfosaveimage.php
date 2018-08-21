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

$id = $_GET['id'];
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

//print_r($_POST);

                      $update = "UPDATE tbllocation_image SET location_image_info = '".$_POST['location_image_info']."' WHERE location_image_id = '$loc_id' ";
                      $update_query = mysqli_query($con,$update);

                      $updatepd = "UPDATE tblproduct_image SET product_image_info = '".$_POST['product_image_info']."' WHERE product_image_id = '$loc_id' ";
                      $update_querypd = mysqli_query($con,$updatepd);

                      $updatesv = "UPDATE tblservice2_image SET service_image_info = '".$_POST['service_image_info']."' WHERE service_image_id = '$loc_id' ";
                      $update_querysv = mysqli_query($con,$updatesv);

                      $updaters = "UPDATE tblrestaurant2_image SET restaurant_image_info = '".$_POST['restaurant_image_info']."' WHERE restaurant_image_id = '$loc_id' ";
                      $update_queryrs = mysqli_query($con,$updaters);

                      $updateld = "UPDATE tbllodge_image SET lodge_image_info = '".$_POST['lodge_image_info']."' WHERE lodge_image_id = '$loc_id' ";
                      $update_queryld = mysqli_query($con,$updateld);

                      $updatefs = "UPDATE tblfestival2_image SET festival_image_info = '".$_POST['festival_image_info']."' WHERE festival_image_id = '$loc_id' ";
                      $update_queryfs = mysqli_query($con,$updatefs);

                      if ($update_query){
                        echo "<script type='text/javascript'>";
                        //echo "window.location = href='javascript:history.back(1);' ";
                        //echo "window.location = href='javascript:history.go(0);' ";
                        //echo "window.location = href ='editlocationmemberinfo.php?id=$id";
                        //echo "window.location.replace('editlocationmemberinfo.php?id=$id'+ '?openmodal=1') ";
                        echo "window.location.href = 'editlocationmemberinfoimage.php?openmodal=1&id=$id' ";
                        echo "</script>";

                      }

                      if($_FILES["location_image_file"]["name"])
                      {

                        $target = "img/imgdb/location/".date('dmYHis').str_replace(" ", "", basename($_FILES['location_image_file']['name']));
                        $image = $_FILES['location_image_file']['name'];
                        $newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["location_image_file"]["name"]));

                        if(move_uploaded_file($_FILES["location_image_file"]["tmp_name"],"img/imgdb/location/" . $newfilename));
                        {
                          unlink($_POST["hdnOldFile"]);
                          $sq_update = "UPDATE tbllocation_image SET location_image_file = '$target' WHERE location_image_id = '$loc_id'";
                          $sq_query = mysqli_query($con,$sq_update);
                        }

                      }

                      if($_FILES["product_image_file"]["name"])
                      {

                        $target_pd = "img/imgdb/product/".date('dmYHis').str_replace(" ", "", basename($_FILES['product_image_file']['name']));
                        $image_pd = $_FILES['product_image_file']['name'];
                        $newfilename_pd = date('dmYHis').str_replace(" ", "", basename($_FILES["product_image_file"]["name"]));

                        if(move_uploaded_file($_FILES["product_image_file"]["tmp_name"],"img/imgdb/product/" . $newfilename_pd));
                        {
                          unlink($_POST["hdnOldFile_pd"]);
                          $sq_update_pd = "UPDATE tblproduct_image SET product_image_file = '$target_pd' WHERE product_image_id = '$loc_id'";
                          $sq_query_pd = mysqli_query($con,$sq_update_pd);
                        }

                      }

                      if($_FILES["service_image_file"]["name"])
                      {

                        $target_sv = "img/imgdb/service/".date('dmYHis').str_replace(" ", "", basename($_FILES['service_image_file']['name']));
                        $image_sv = $_FILES['service_image_file']['name'];
                        $newfilename_sv = date('dmYHis').str_replace(" ", "", basename($_FILES["service_image_file"]["name"]));

                        if(move_uploaded_file($_FILES["service_image_file"]["tmp_name"],"img/imgdb/service/" . $newfilename_sv));
                        {
                          unlink($_POST["hdnOldFile_sv"]);
                          $sq_update_sv = "UPDATE tblservice2_image SET service_image_file = '$target_sv' WHERE service_image_id = '$loc_id'";
                          $sq_query_sv = mysqli_query($con,$sq_update_sv);
                        }

                      }

                      if($_FILES["restaurant_image_file"]["name"])
                      {

                        $target_rs = "img/imgdb/restaurant/".date('dmYHis').str_replace(" ", "", basename($_FILES['restaurant_image_file']['name']));
                        $image_rs = $_FILES['restaurant_image_file']['name'];
                        $newfilename_rs = date('dmYHis').str_replace(" ", "", basename($_FILES["restaurant_image_file"]["name"]));

                        if(move_uploaded_file($_FILES["restaurant_image_file"]["tmp_name"],"img/imgdb/restaurant/" . $newfilename_rs));
                        {
                          unlink($_POST["hdnOldFile_rs"]);
                          $sq_update_rs = "UPDATE tblrestaurant2_image SET restaurant_image_file = '$target_rs' WHERE restaurant_image_id = '$loc_id'";
                          $sq_query_rs = mysqli_query($con,$sq_update_rs);
                        }

                      }

                      if($_FILES["lodge_image_file"]["name"])
                      {

                        $target_ld = "img/imgdb/lodge/".date('dmYHis').str_replace(" ", "", basename($_FILES['lodge_image_file']['name']));
                        $image_ld = $_FILES['lodge_image_file']['name'];
                        $newfilename_ld = date('dmYHis').str_replace(" ", "", basename($_FILES["lodge_image_file"]["name"]));

                        if(move_uploaded_file($_FILES["lodge_image_file"]["tmp_name"],"img/imgdb/lodge/" . $newfilename_ld));
                        {
                          unlink($_POST["hdnOldFile_ld"]);
                          $sq_update_ld = "UPDATE tbllodge_image SET lodge_image_file = '$target_ld' WHERE lodge_image_id = '$loc_id'";
                          $sq_query_ld = mysqli_query($con,$sq_update_ld);
                        }

                      }

                      if($_FILES["festival_image_file"]["name"])
                      {

                        $target_fs = "img/imgdb/festival/".date('dmYHis').str_replace(" ", "", basename($_FILES['festival_image_file']['name']));
                        $image_fs = $_FILES['festival_image_file']['name'];
                        $newfilename_fs = date('dmYHis').str_replace(" ", "", basename($_FILES["festival_image_file"]["name"]));

                        if(move_uploaded_file($_FILES["festival_image_file"]["tmp_name"],"img/imgdb/festival/" . $newfilename_fs));
                        {
                          unlink($_POST["hdnOldFile_fs"]);
                          $sq_update_fs = "UPDATE tblfestival2_image SET festival_image_file = '$target_fs' WHERE festival_image_id = '$loc_id'";
                          $sq_query_fs = mysqli_query($con,$sq_update_fs);
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
