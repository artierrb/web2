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

$id = $_GET['id'];

//echo "connect database successfully<br>";
$query = "SELECT * FROM score";
$query2 = "SELECT DISTINCT * FROM board";
$result = mysqli_query($con, "SELECT rating_score FROM tblvote_comment");
$result2 = mysqli_query($con, "SELECT * FROM board");
$result3 = mysqli_query($con, "SELECT DISTINCT * FROM board ORDER BY rand() LIMIT 10");

//$sum = "SELECT SUM(rating_score) FROM tblvote_comment WHERE location_id=location_id";
//$sum = mysqli_query("SELECT * FROM tblvote_comment GROUP BY location_id");

//$avg = mysqli_query($con, "SELECT AVG(rating_score) FROM tblvote_comment");
$avgscore = mysqli_query($con, "SELECT AVG(rating_score) FROM tblvote_comment");

$top10rating_score = mysqli_query($con, "SELECT * FROM tbllocation INNER JOIN tbllocation_image ON tbllocation.location_id=tbllocation_image.location_id
                                                         INNER JOIN tblvote_comment ON tbllocation.location_id=tblvote_comment.location_id
                                                         GROUP BY tblvote_comment.location_id ORDER BY SUM(rating_score) DESC limit 10");

//$sumsum = mysqli_query($con, "SELECT tbllocation.*, tbllocation_image.*, tblvote_comment.*, SUM(rating_score) FROM tbllocation
//                                                        INNER JOIN tbllocation_image ON tbllocation.location_id=tbllocation_image.location_id
//                                                         INNER JOIN tblvote_comment ON tbllocation.location_id=tblvote_comment.location_id GROUP BY location_id");

//$sumscore = mysqli_query($con, "SELECT * FROM tbllocation INNER JOIN tbllocation_image ON tbllocation.location_id=tbllocation_image.location_id
//                                                         INNER JOIN tblvote_comment ON tbllocation.location_id=tblvote_comment.location_id GROUP BY rating_score DESC limit 10");



$randomlocation = mysqli_query($con, "SELECT * FROM tbllocation INNER JOIN tbllocation_image ON tbllocation.location_id=tbllocation_image.location_id ORDER BY rand() limit 4");


$locationmem_info_query ="SELECT * FROM tbllocation WHERE location_id='$id'";
$locationmemberinfo_result = mysqli_query($con, $locationmem_info_query);
$locationmemberinfo = mysqli_fetch_array($locationmemberinfo_result);

$locationmem_info_showimg ="SELECT * FROM tbllocation_image WHERE location_id='$id'";
$locationmemberinfo_showimg = mysqli_query($con, $locationmem_info_showimg);

$locationmem_info_showimgpd ="SELECT * FROM tblproduct_image WHERE location_id='$id'";
$locationmemberinfo_showimgpd = mysqli_query($con, $locationmem_info_showimgpd);

$locationmem_info_showimgsv ="SELECT * FROM tblservice2_image WHERE location_id='$id'";
$locationmemberinfo_showimgsv = mysqli_query($con, $locationmem_info_showimgsv);

$locationmem_info_showimgrs ="SELECT * FROM tblrestaurant2_image WHERE location_id='$id'";
$locationmemberinfo_showimgrs = mysqli_query($con, $locationmem_info_showimgrs);

$locationmem_info_showimgld ="SELECT * FROM tbllodge_image WHERE location_id='$id'";
$locationmemberinfo_showimgld = mysqli_query($con, $locationmem_info_showimgld);

$locationmem_info_showimgfs ="SELECT * FROM tblfestival2_image WHERE location_id='$id'";
$locationmemberinfo_showimgfs = mysqli_query($con, $locationmem_info_showimgfs);


$locationmem_info_image_query ="SELECT tbllocation.*,tbllocation_image.* FROM tbllocation,tbllocation_image
WHERE tbllocation.location_id='$id' AND tbllocation_image.location_id='$id'";
$locationmemberinfo_image_result = mysqli_query($con, $locationmem_info_image_query);
$locationmemberinfo_image = mysqli_fetch_array($locationmemberinfo_image_result);



$banner_top = mysqli_query($con, "SELECT * FROM tblads_banner WHERE banner_type = 'top_banner' ");
$banner_fetch = mysqli_fetch_array($banner_top, MYSQLI_ASSOC);


$result_showscore = mysqli_query($con, "SELECT tbllocation.*,tblvote_comment.* FROM tbllocation,tblvote_comment WHERE tbllocation.location_id AND tblvote_comment.location_id");
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
$row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
$rowshowscore = mysqli_fetch_array($result_showscore, MYSQLI_ASSOC);



$i_no = 1;

/*
    echo $row["score_id"];
    echo $row["score_point"];

*/

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Footer-with-social-icons.css">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <title>Go! Travel.com</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">

    <style media="screen">
    body {
      /*font-family: 'Leelawadee UI' , sans-serif;*/
      font-family: 'Itim', cursive;
      font-size: 200%;
    }
    div {
      /*font-family: 'Leelawadee UI' , sans-serif;*/
      font-family: 'Itim', cursive;
    }
      ul.a {
        list-style-type: none;

      }

      /*เปิด CSS เรทติ้ง */


      /* ปิด CSS เรทติ้ง */





    </style>
  </head>

  <body>

<!-- เปิดคอนเทนเนอร์ -->
    <div class="container">

<!-- เฮดเดอร์ -->
<div class="row">
<div class="col-lg-3 col-xs-12 visible-xs-* hidden-md">
<img src="img/portfolio/go.png" class="img-responsive" width="100%">

</div>
<div class="col-lg-9 hidden-xs">
<img src="<?php echo $banner_fetch['banner_file']; ?>" class="img-responsive" width="100%">
</div>
</div>

<!-- แนฟบาร์ -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="indexmember.php">หน้าหลัก</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="location_type_all_member.php">บทความทั้งหมด<span class="sr-only">(current)</span></a></li>


        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ประเภทการท่องเที่ยว <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="location_type_member.php?id=การท่องเที่ยวเชิงนิเวศ">การท่องเที่ยวเชิงนิเวศ</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="location_type_member.php?id=การท่องเที่ยวเชิงศิลปะวิทยาการ">การท่องเที่ยวเชิงศิลปะวิทยาการ</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="location_type_member.php?id=การท่องเที่ยวเชิงประวัติศาสตร์">การท่องเที่ยวเชิงประวัติศาสตร์</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="location_type_member.php?id=การท่องเที่ยวเชิงธรรมชาติ">การท่องเที่ยวเชิงธรรมชาติ</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="location_type_member.php?id=การท่องเที่ยวเชิงนันทนาการ">การท่องเที่ยวเชิงนันทนาการ</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="location_type_member.php?id=การท่องเที่ยวเชิงวัฒนธรรม">การท่องเที่ยวเชิงวัฒนธรรม</a></li>
          </ul>
        </li>

      </ul>
      <div class="navbar-form navbar-left">
        <!--
        <form action="location_type_all_search.php?search=<?php echo $search['search'] ?>">
        <?php
        //echo "<form action='location_type_all_search.php?search='".$search."'' method='get' enctype='multipart/form-data' > ";
         ?>

          <div class="form-group">

            <input type="text" name="search" class="form-control" placeholder="ค้นหาข้อมูล ชื่อสถานที่ ฯลฯ" >

          </div>

            <button type="submit" class="btn btn-default" >ค้นหา</button>

            </input>
        </form>
      -->

      <form action="location_type_all_member_search.php?search=<?php echo $search['search'] ?>">
        <div class="form-group">
        <input type="text" class="form-control" name="search" placeholder="ค้นหาข้อมูล ชื่อสถานที่ ฯลฯ" value="">
        </div>
        <input type="submit" class="btn btn-default" value="ค้นหา">
      </form>
    </div>
        <a href="#"></a>




      <ul class="nav navbar-nav navbar-right">

        <!-- <li><a href="#">Link</a></li> -->

        <li class="dropdown">

          <a href="memberinfoindex.php" style="background-color: lightgreen;" class="dropdown-toggle glyphicon glyphicon-user" role="button"> สวัสดีคุณ <?php echo $s_login_username ;?></a>

        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
  <div class="col-md-4">
    <img src="img/<?php echo "$s_login_image" ?>" class="img-responsive center-block img-circle" style="margin-top : 10px; width:50%;border-radius:22px">
    <br>
    <div class="text-center">
      <label><?php echo "$s_login_username" ?></label>  <label><?php echo "$s_login_surname" ?></label>
    </div>
    <br>

    <div class="list-group hidden-xs">
      <a href="memberinfoindex.php" class="list-group-item" style="color :black">
      <i class="fas fa-user" aria-hidden="true"></i> ส่วนจัดการข้อมูลสมาชิก
      </a>
      <a href="addlocation.php" class="list-group-item list-group-item-success" style="color :black"><i class="fas fa-plus-square" aria-hidden="true"></i> เพิ่มบทความ</a>
      <a href="locationmemberinfo.php" class="list-group-item list-group-item-info" style="color :black"><i class="fas fa-cogs" aria-hidden="true"></i> จัดการข้อมูลบทความ</a>
      <a href="memberinfo.php" class="list-group-item list-group-item-warning" style="color :black"><i class="fas fa-cog" aria-hidden="true"></i> จัดการข้อมูลส่วนตัว</a>
      <a href="logout.php" class="list-group-item list-group-item-danger" style="color :black"><i class="fas fa-sign-out-alt" aria-hidden="true"></i> ออกจากระบบ</a>
    </div>
    <div class="visible-xs">
          <button type="button" class="btn btn-info btn-lg btn-block" data-toggle="collapse" data-target="#info">เมนูจัดการข้อมูล</button>
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>

    <div class="collapse navbar-collapse" id="info">

    <ul class="nav navbar-nav" style="color :black;">
      <li class="active"><a href="memberinfoindex.php" style="color :black;"><i class="fas fa-user" aria-hidden="true"></i> ข้อมูลสมาชิก</a></li>
      <li><a href="addlocation.php" style="color :black;background-color: #adebad;"><i class="fas fa-plus-square" aria-hidden="true"></i> เพิ่มบทความ</a></li>
      <li><a href="locationmemberinfo.php" style="color :black;background-color: #b3e6ff;"><i class="fas fa-cogs" aria-hidden="true"></i> จัดการข้อมูลบทความ</a></li>
      <li><a href="memberinfo.php" style="color :black;background-color: #ffeb99;"><i class="fas fa-cog" aria-hidden="true"></i> จัดการข้อมูลส่วนตัว</a></li>
      <li><a href="logout.php" style="color :black;background-color: #ff9980;"><i class="fas fa-sign-out-alt" aria-hidden="true"></i> ออกจากระบบ</a></li>

    </ul>
    </div>
  </div>
  </div>
  <div class="col-lg-8 col-md-6">




     <ul class="nav nav-tabs hidden-xs" >
       <li class="active"><a data-toggle="tab" href="#menu0" style="color:black;background-color: #ffcccc;"><i class="fas fa-plane" aria-hidden="true"></i> สถานที่</a></li>
       <li><a data-toggle="tab" href="#menu1" style="color:black;background-color: #fff0b3;"><i class="fas fa-gift"></i> สินค้า</a></li>
       <li><a data-toggle="tab" href="#menu2" style="color:black;background-color: #b7ff70;"><i class="far fa-smile"></i> บริการ</a></li>
       <li><a data-toggle="tab" href="#menu3" style="color:black;background-color: #99ffff;"><i class="fas fa-utensils"></i> ร้านอาหาร</a></li>
       <li><a data-toggle="tab" href="#menu4" style="color:black;background-color: #d1b3ff;"><i class="fas fa-home"></i> ที่พัก</a></li>
       <li><a data-toggle="tab" href="#menu5" style="color:black;background-color: #ffb3ff;"><i class="fab fa-fort-awesome"></i> เทศกาล</a></li>
     </ul>
     <br>
     <div class="visible-xs">
           <button type="button" class="btn btn-info btn-lg btn-block" data-toggle="collapse" data-target="#type_data">แก้ไขข้อมูล</button>
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>

     <div class="collapse navbar-collapse" id="type_data">

     <ul class="nav navbar-nav" style="color :black;">
       <li class="active"><a data-toggle="tab" href="#menu0" style="color:black;background-color: #ffcccc;"><i class="fas fa-plane" aria-hidden="true"></i> สถานที่</a></li>
       <li><a data-toggle="tab" href="#menu1" style="color:black;background-color: #fff0b3;"><i class="fas fa-gift"></i> สินค้า</a></li>
       <li><a data-toggle="tab" href="#menu2" style="color:black;background-color: #b7ff70;"><i class="far fa-smile"></i> บริการ</a></li>
       <li><a data-toggle="tab" href="#menu3" style="color:black;background-color: #99ffff;"><i class="fas fa-utensils"></i> ร้านอาหาร</a></li>
       <li><a data-toggle="tab" href="#menu4" style="color:black;background-color: #d1b3ff;"><i class="fas fa-home"></i> ที่พัก</a></li>
       <li><a data-toggle="tab" href="#menu5" style="color:black;background-color: #ffb3ff;"><i class="fab fa-fort-awesome"></i> เทศกาล</a></li>

     </ul>
     </div>
   </div>

  <div class="tab-content">
    <div id="menu0" class="tab-pane fade in active">





    <div class="page-header">
      <h1>รูปภาพสถานที่ท่องเที่ยว</h1>
    </div>
    <br>



    <?php
    while($showimg = mysqli_fetch_array($locationmemberinfo_showimg)){
      # code...
    ?>
    <?php
    echo "<form name='softwareform' action='editlocationmemberinfosaveimage.php?id=".$locationmemberinfo['location_id']."&loc_img_id=".$showimg['location_image_id']."' id='gosubmit' method='post' enctype='multipart/form-data' > ";
     ?>
    <div class="col-lg-6">

      <input type="file" name="location_image_file" value="location_image_file"  onchange="document.getElementById('loc_img<?php echo $i_no ?>').src = window.URL.createObjectURL(this.files[0])">
      <input type="hidden" name="hdnOldFile" value="<?php echo $showimg["location_image_file"]; ?>">
      <img id="loc_img<?php echo $i_no ?>" name="location_image_file"  src="<?php echo $showimg["location_image_file"]; ?>" height="200">
      <label for="usr">คำอธิบายภาพ:</label>
      <textarea type="text" class="form-control" rows="5" name="location_image_info" id="location_image_info" ><?php echo $showimg["location_image_info"]; ?></textarea>
      <!--<input class="form-control"type="text" placeholder="<?php echo $showimg["location_image_file"]; ?>" name="" value="">-->
      <!--<td scope="row"><button type="button" class="btn btn-primary" onClick="window.location='editlocationmemberinfosaveimage.php?loc_img_id=<?php echo $showimg["location_image_id"]; ?>'">แก้ไข</button>-->
      <div class="text-center">
        <br>
        <button type="submit" class="btn btn-success">แก้ไข</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="history.go(-1)">ยกเลิก</button>
      </div>
      <br>
      <!--<button type="button" class="btn btn-success" onClick="window.location='editlocationmemberinfoimage.php?loc_img_id=<?php echo $showimg["location_image_id"]; ?>'">แก้ไข</button>-->
    </div>
    </form>
    <?php
    $i_no++;
    }
     ?>





    </div>



    <div id="menu1" class="tab-pane fade">
    <div class="page-header">
      <h1>รูปภาพสินค้า</h1>
    </div>
    <br>



    <?php
    while($showimgpd = mysqli_fetch_array($locationmemberinfo_showimgpd)){
      # code...
    ?>
    <?php
    echo "<form name='softwareform' action='editlocationmemberinfosaveimage.php?id=".$locationmemberinfo['location_id']."&loc_img_id=".$showimgpd['product_image_id']."' id='gosubmit' method='post' enctype='multipart/form-data' > ";
     ?>
    <div class="col-lg-6">

      <input type="file" name="product_image_file" value="product_image_file"  onchange="document.getElementById('loc_img<?php echo $i_no ?>').src = window.URL.createObjectURL(this.files[0])">
      <input type="hidden" name="hdnOldFile_pd" value="<?php echo $showimgpd["product_image_file"]; ?>">
      <img id="loc_img<?php echo $i_no ?>" name="product_image_file"  src="<?php echo $showimgpd["product_image_file"]; ?>" height="200">
      <label for="usr">คำอธิบายภาพ:</label>
      <textarea type="text" class="form-control" rows="5" name="product_image_info" id="product_image_info" ><?php echo $showimgpd["product_image_info"]; ?></textarea>
      <!--<input class="form-control"type="text" placeholder="<?php echo $showimg["location_image_file"]; ?>" name="" value="">-->
      <!--<td scope="row"><button type="button" class="btn btn-primary" onClick="window.location='editlocationmemberinfosaveimage.php?loc_img_id=<?php echo $showimg["location_image_id"]; ?>'">แก้ไข</button>-->
      <div class="text-center">
        <br>
        <button type="submit" class="btn btn-success">แก้ไข</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="history.go(-1)">ยกเลิก</button>
      </div>
      <br>
      <!--<button type="button" class="btn btn-success" onClick="window.location='editlocationmemberinfoimage.php?loc_img_id=<?php echo $showimg["location_image_id"]; ?>'">แก้ไข</button>-->
    </div>
    </form>
    <?php
    $i_no++;
    }
     ?>





    </div>

    <div id="menu2" class="tab-pane fade">
    <div class="page-header">
      <h1>รูปภาพบริการ</h1>
    </div>
    <br>

    <?php
    while($showimgsv = mysqli_fetch_array($locationmemberinfo_showimgsv)){
      # code...
    ?>
    <?php
    echo "<form name='softwareform' action='editlocationmemberinfosaveimage.php?id=".$locationmemberinfo['location_id']."&loc_img_id=".$showimgsv['service_image_id']."' id='gosubmit' method='post' enctype='multipart/form-data' > ";
     ?>
    <div class="col-lg-6">

      <input type="file" name="service_image_file" value="service_image_file"  onchange="document.getElementById('loc_img<?php echo $i_no ?>').src = window.URL.createObjectURL(this.files[0])">
      <input type="hidden" name="hdnOldFile_sv" value="<?php echo $showimgsv["service_image_file"]; ?>">
      <img id="loc_img<?php echo $i_no ?>" name="service_image_file"  src="<?php echo $showimgsv["service_image_file"]; ?>" height="200">
      <label for="usr">คำอธิบายภาพ:</label>
      <textarea type="text" class="form-control" rows="5" name="service_image_info" id="service_image_info" ><?php echo $showimgsv["service_image_info"]; ?></textarea>
      <!--<input class="form-control"type="text" placeholder="<?php echo $showimg["location_image_file"]; ?>" name="" value="">-->
      <!--<td scope="row"><button type="button" class="btn btn-primary" onClick="window.location='editlocationmemberinfosaveimage.php?loc_img_id=<?php echo $showimg["location_image_id"]; ?>'">แก้ไข</button>-->
      <div class="text-center">
        <br>
        <button type="submit" class="btn btn-success">แก้ไข</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="history.go(-1)">ยกเลิก</button>
      </div>
      <br>
      <!--<button type="button" class="btn btn-success" onClick="window.location='editlocationmemberinfoimage.php?loc_img_id=<?php echo $showimg["location_image_id"]; ?>'">แก้ไข</button>-->
    </div>
    </form>
    <?php
    $i_no++;
    }
     ?>

    </div>

    <div id="menu3" class="tab-pane fade">
    <div class="page-header">
      <h1>รูปภาพร้านอาหาร</h1>
    </div>
    <br>

    <?php
    while($showimgrs = mysqli_fetch_array($locationmemberinfo_showimgrs)){
      # code...
    ?>
    <?php
    echo "<form name='softwareform' action='editlocationmemberinfosaveimage.php?id=".$locationmemberinfo['location_id']."&loc_img_id=".$showimgrs['restaurant_image_id']."' id='gosubmit' method='post' enctype='multipart/form-data' > ";
     ?>
    <div class="col-lg-6">

      <input type="file" name="restaurant_image_file" value="restaurant_image_file"  onchange="document.getElementById('loc_img<?php echo $i_no ?>').src = window.URL.createObjectURL(this.files[0])">
      <input type="hidden" name="hdnOldFile_rs" value="<?php echo $showimgrs["restaurant_image_file"]; ?>">
      <img id="loc_img<?php echo $i_no ?>" name="restaurant_image_file"  src="<?php echo $showimgrs["restaurant_image_file"]; ?>" height="200">
      <label for="usr">คำอธิบายภาพ:</label>
      <textarea type="text" class="form-control" rows="5" name="restaurant_image_info" id="restaurant_image_info" ><?php echo $showimgrs["restaurant_image_info"]; ?></textarea>
      <!--<input class="form-control"type="text" placeholder="<?php echo $showimg["location_image_file"]; ?>" name="" value="">-->
      <!--<td scope="row"><button type="button" class="btn btn-primary" onClick="window.location='editlocationmemberinfosaveimage.php?loc_img_id=<?php echo $showimg["location_image_id"]; ?>'">แก้ไข</button>-->
      <div class="text-center">
        <br>
        <button type="submit" class="btn btn-success">แก้ไข</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="history.go(-1)">ยกเลิก</button>
      </div>
      <br>
      <!--<button type="button" class="btn btn-success" onClick="window.location='editlocationmemberinfoimage.php?loc_img_id=<?php echo $showimg["location_image_id"]; ?>'">แก้ไข</button>-->
    </div>
    </form>
    <?php
    $i_no++;
    }
     ?>

    </div>

    <div id="menu4" class="tab-pane fade">
    <div class="page-header">
      <h1>รูปภาพที่พัก</h1>
    </div>
    <br>

    <?php
    while($showimgld = mysqli_fetch_array($locationmemberinfo_showimgld)){
      # code...
    ?>
    <?php
    echo "<form name='softwareform' action='editlocationmemberinfosaveimage.php?id=".$locationmemberinfo['location_id']."&loc_img_id=".$showimgld['lodge_image_id']."' id='gosubmit' method='post' enctype='multipart/form-data' > ";
     ?>
    <div class="col-lg-6">

      <input type="file" name="lodge_image_file" value="lodge_image_file"  onchange="document.getElementById('loc_img<?php echo $i_no ?>').src = window.URL.createObjectURL(this.files[0])">
      <input type="hidden" name="hdnOldFile_ld" value="<?php echo $showimgld["lodge_image_file"]; ?>">
      <img id="loc_img<?php echo $i_no ?>" name="lodge_image_file"  src="<?php echo $showimgld["lodge_image_file"]; ?>" height="200">
      <label for="usr">คำอธิบายภาพ:</label>
      <textarea type="text" class="form-control" rows="5" name="lodge_image_info" id="lodge_image_info" ><?php echo $showimgld["lodge_image_info"]; ?></textarea>
      <!--<input class="form-control"type="text" placeholder="<?php echo $showimg["location_image_file"]; ?>" name="" value="">-->
      <!--<td scope="row"><button type="button" class="btn btn-primary" onClick="window.location='editlocationmemberinfosaveimage.php?loc_img_id=<?php echo $showimg["location_image_id"]; ?>'">แก้ไข</button>-->
      <div class="text-center">
        <br>
        <button type="submit" class="btn btn-success">แก้ไข</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="history.go(-1)">ยกเลิก</button>
      </div>
      <br>
      <!--<button type="button" class="btn btn-success" onClick="window.location='editlocationmemberinfoimage.php?loc_img_id=<?php echo $showimg["location_image_id"]; ?>'">แก้ไข</button>-->
    </div>
    </form>
    <?php
    $i_no++;
    }
     ?>

    </div>

    <div id="menu5" class="tab-pane fade">
    <div class="page-header">
      <h1>รูปภาพเทศกาล</h1>
    </div>
    <br>

    <?php
    while($showimgfs = mysqli_fetch_array($locationmemberinfo_showimgfs)){
      # code...
    ?>
    <?php
    echo "<form name='softwareform' action='editlocationmemberinfosaveimage.php?id=".$locationmemberinfo['location_id']."&loc_img_id=".$showimgfs['festival_image_id']."' id='gosubmit' method='post' enctype='multipart/form-data' > ";
     ?>
    <div class="col-lg-6">

      <input type="file" name="festival_image_file" value="festival_image_file"  onchange="document.getElementById('loc_img<?php echo $i_no ?>').src = window.URL.createObjectURL(this.files[0])">
      <input type="hidden" name="hdnOldFile_fs" value="<?php echo $showimgfs["festival_image_file"]; ?>">
      <img id="loc_img<?php echo $i_no ?>" name="festival_image_file"  src="<?php echo $showimgfs["festival_image_file"]; ?>" height="200">
      <label for="usr">คำอธิบายภาพ:</label>
      <textarea type="text" class="form-control" rows="5" name="festival_image_info" id="festival_image_info" ><?php echo $showimgfs["festival_image_info"]; ?></textarea>
      <!--<input class="form-control"type="text" placeholder="<?php echo $showimg["location_image_file"]; ?>" name="" value="">-->
      <!--<td scope="row"><button type="button" class="btn btn-primary" onClick="window.location='editlocationmemberinfosaveimage.php?loc_img_id=<?php echo $showimg["location_image_id"]; ?>'">แก้ไข</button>-->
      <div class="text-center">
        <br>
        <button type="submit" class="btn btn-success">แก้ไข</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="history.go(-1)">ยกเลิก</button>
      </div>
      <br>
      <!--<button type="button" class="btn btn-success" onClick="window.location='editlocationmemberinfoimage.php?loc_img_id=<?php echo $showimg["location_image_id"]; ?>'">แก้ไข</button>-->
    </div>
    </form>
    <?php
    $i_no++;
    }
     ?>

    </div>











  </div>




  </div>



















<br>


<!-- ฟูทเตอร์ -->

<footer id="myFooter">
    <div class="container">
        <div class="col-md-12">
          <div class="page-header">

          </div>
          <div class="row">
              <div class="col-sm-3 myCols">
                  <h5>Go Travel</h5>
                  <ul>
                      <li><a href="#">Home</a></li>
                      <li><a href="#">Register</a></li>
                      <li><a href="#">Login</a></li>
                  </ul>
              </div>
              <div class="col-sm-3 myCols">
                  <h5>เกี่ยวกับเรา</h5>
                  <ul>
                      <li><a href="#">ข้อมูลบริษัท</a></li>
                      <li><a href="#">ติดต่อเรา</a></li>
                      <li><a href="#">รีวิว</a></li>
                  </ul>
              </div>
              <div class="col-sm-3 myCols">
                  <h5>สนับสนุน</h5>
                  <ul>
                      <li><a href="#">FAQ</a></li>
                      <li><a href="#">Help desk</a></li>
                      <li><a href="#">Forums</a></li>
                  </ul>
              </div>
              <div class="col-sm-3 myCols">
                  <h5>นโยบายความเป็นส่วนตัว</h5>
                  <ul>
                      <li><a href="#">Terms of Service</a></li>
                      <li><a href="#">Terms of Use</a></li>
                      <li><a href="#">Privacy Policy</a></li>
                  </ul>
              </div>
          </div>
        </div>
    </div>
    <div class="social-networks">
        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="facebook"><i class="fa fa-facebook-official"></i></a>
        <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
    </div>
    <div class="footer-copyright">
        © 2017 Copyright: <a href="https://www.gotravel.com"> GoTravel.com </a>
    </div>
</footer>








<!-- ปิดคอนเทนเนอร์ -->
    </div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script>
                                              // Starrr plugin (https://github.com/dobtco/starrr)
                                              var __slice = [].slice;

                                              (function($, window) {
                                                var Starrr;

                                                Starrr = (function() {
                                                  Starrr.prototype.defaults = {
                                                    rating: void 0,
                                                    numStars: 5,
                                                    change: function(e, value) {}
                                                  };

                                                  function Starrr($el, options) {
                                                    var i, _, _ref,
                                                      _this = this;

                                                    this.options = $.extend({}, this.defaults, options);
                                                    this.$el = $el;
                                                    _ref = this.defaults;
                                                    for (i in _ref) {
                                                      _ = _ref[i];
                                                      if (this.$el.data(i) != null) {
                                                        this.options[i] = this.$el.data(i);
                                                      }
                                                    }
                                                    this.createStars();
                                                    this.syncRating();
                                                    this.$el.on('mouseover.starrr', 'span', function(e) {
                                                      return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
                                                    });
                                                    this.$el.on('mouseout.starrr', function() {
                                                      return _this.syncRating();
                                                    });
                                                    this.$el.on('click.starrr', 'span', function(e) {
                                                      return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
                                                    });
                                                    this.$el.on('starrr:change', this.options.change);
                                                  }

                                                  Starrr.prototype.createStars = function() {
                                                    var _i, _ref, _results;

                                                    _results = [];
                                                    for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
                                                      _results.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"));
                                                    }
                                                    return _results;
                                                  };

                                                  Starrr.prototype.setRating = function(rating) {
                                                    if (this.options.rating === rating) {
                                                      rating = void 0;
                                                    }
                                                    this.options.rating = rating;
                                                    this.syncRating();
                                                    return this.$el.trigger('starrr:change', rating);
                                                  };

                                                  Starrr.prototype.syncRating = function(rating) {
                                                    var i, _i, _j, _ref;

                                                    rating || (rating = this.options.rating);
                                                    if (rating) {
                                                      for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
                                                        this.$el.find('span').eq(i).removeClass('glyphicon-star-empty').addClass('glyphicon-star');
                                                      }
                                                    }
                                                    if (rating && rating < 5) {
                                                      for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
                                                        this.$el.find('span').eq(i).removeClass('glyphicon-star').addClass('glyphicon-star-empty');
                                                      }
                                                    }
                                                    if (!rating) {
                                                      return this.$el.find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
                                                    }
                                                  };

                                                  return Starrr;

                                                })();
                                                return $.fn.extend({
                                                  starrr: function() {
                                                    var args, option;

                                                    option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
                                                    return this.each(function() {
                                                      var data;

                                                      data = $(this).data('star-rating');
                                                      if (!data) {
                                                        $(this).data('star-rating', (data = new Starrr($(this), option)));
                                                      }
                                                      if (typeof option === 'string') {
                                                        return data[option].apply(data, args);
                                                      }
                                                    });
                                                  }
                                                });
                                              })(window.jQuery, window);

                                              $(function() {
                                                return $(".starrr").starrr();
                                              });

                                              $( document ).ready(function() {

                                                $('#stars').on('starrr:change', function(e, value){
                                                  $('#count').html(value);
                                                });

                                                $('#stars-existing').on('starrr:change', function(e, value){
                                                  $('#count-existing').html(value);
                                                });
                                              });

    </script> <!-- JS เรทติ้ง -->
    <!-- สคริปดาว -->
    <script src="build/bootstrap-rating-input.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="jsjquery-3.2.1.min.js"></script>
  </body>
</html>
