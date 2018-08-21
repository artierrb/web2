<!DOCTYPE html>
<?php

session_start();
if (!isset($_SESSION['member_name'])) {

}

$server = "localhost";
$username = "root";
$password = "";
$database = "web2";
$con = mysqli_connect($server, $username, $password, $database)
or die("Cannot connect database!!!");
mysqli_query($con, "set names utf8");

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
                                                         GROUP BY tblvote_comment.location_id ORDER BY AVG(rating_score) DESC limit 10");


//$sumsum = mysqli_query($con, "SELECT tbllocation.*, tbllocation_image.*, tblvote_comment.*, SUM(rating_score) FROM tbllocation
//                                                        INNER JOIN tbllocation_image ON tbllocation.location_id=tbllocation_image.location_id
//                                                         INNER JOIN tblvote_comment ON tbllocation.location_id=tblvote_comment.location_id GROUP BY location_id");

//$sumscore = mysqli_query($con, "SELECT * FROM tbllocation INNER JOIN tbllocation_image ON tbllocation.location_id=tbllocation_image.location_id
//                                                         INNER JOIN tblvote_comment ON tbllocation.location_id=tblvote_comment.location_id GROUP BY rating_score DESC limit 10");



//$randomlocation = mysqli_query($con, "SELECT * FROM tbllocation INNER JOIN tbllocation_image ON tbllocation.location_id=tbllocation_image.location_id ORDER BY rand() limit 4");
$randomlocation = mysqli_query($con, "SELECT tbllocation.*,tblproduct2.*,tblproduct_image.*
FROM tbllocation,tblproduct2,tblproduct_image
WHERE tbllocation.location_id=tblproduct2.location_id AND tbllocation.location_id=tblproduct_image.location_id
ORDER BY rand() limit 1");
$randomlocation2 = mysqli_query($con, "SELECT tbllocation.*,tblservice2.*,tblservice2_image.*
FROM tbllocation,tblservice2,tblservice2_image
WHERE tbllocation.location_id=tblservice2.location_id AND tbllocation.location_id=tblservice2_image.location_id
ORDER BY rand() limit 1");
$randomlocation3 = mysqli_query($con, "SELECT tbllocation.*,tblfestival2.*,tblfestival2_image.*
FROM tbllocation,tblfestival2,tblfestival2_image
WHERE tbllocation.location_id=tblfestival2.location_id AND tbllocation.location_id=tblfestival2_image.location_id
ORDER BY rand() limit 1");
$randomlocation4 = mysqli_query($con, "SELECT tbllocation.*,tbllodge.*,tbllodge_image.*
FROM tbllocation,tbllodge,tbllodge_image
WHERE tbllocation.location_id=tbllodge.location_id AND tbllocation.location_id=tbllodge_image.location_id
ORDER BY rand() limit 1");


$ip = $_SERVER['REMOTE_ADDR'];



$result_showscore = mysqli_query($con, "SELECT tbllocation.*,tblvote_comment.* FROM tbllocation,tblvote_comment WHERE tbllocation.location_id AND tblvote_comment.location_id");
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
$row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
$rowshowscore = mysqli_fetch_array($result_showscore, MYSQLI_ASSOC);

$banner_top = mysqli_query($con, "SELECT * FROM tblads_banner WHERE banner_type = 'top_banner' ");
$banner_fetch = mysqli_fetch_array($banner_top, MYSQLI_ASSOC);

$banner_mid = mysqli_query($con, "SELECT * FROM tblads_banner WHERE banner_type = 'middle_banner' ");
$banner_fetch_mid = mysqli_fetch_array($banner_mid, MYSQLI_ASSOC);

$banner_bot = mysqli_query($con, "SELECT * FROM tblads_banner WHERE banner_type = 'bottom_banner' limit 3 ");
$banner_fetch_bot = mysqli_fetch_array($banner_bot, MYSQLI_ASSOC);

$banner_small = mysqli_query($con, "SELECT * FROM tblads_banner WHERE banner_type = 'small_banner' ");
$banner_fetch_small = mysqli_fetch_array($banner_small, MYSQLI_ASSOC);

$i = 1;
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
    <link rel="stylesheet" href="css/text_over_image.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="jsjquery-3.2.1.min.js"></script>
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
      .hover01 {
      li:  hover {background: red;}
      }

      .navbar .navbar-nav .nav .navbar-nav .navbar-right .hover01> li > a,
      .navbar .navbar-nav .nav .navbar-nav .navbar-right .hover01> .active > a{
          color: orange;
      }

      .navbar .navbar-nav > li > a:hover,
      .navbar .navbar-nav > li > a:focus,
      .navbar .navbar-nav .navbar-nav .navbar-right .hover01 > .active > a:hover,
      .navbar .navbar-nav .navbar-nav .navbar-right .hover01 > .active > a:focus {

      }




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
      <a class="navbar-brand" href="#" >หน้าหลัก</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="location_type_all.php?id=10">บทความทั้งหมด<span class="sr-only">(current)</span></a></li>


        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ประเภทการท่องเที่ยว <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="location_type.php?id=การท่องเที่ยวเชิงนิเวศ">การท่องเที่ยวเชิงนิเวศ</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="location_type.php?id=การท่องเที่ยวเชิงศิลปะวิทยาการ">การท่องเที่ยวเชิงศิลปะวิทยาการ</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="location_type.php?id=การท่องเที่ยวเชิงประวัติศาสตร์">การท่องเที่ยวเชิงประวัติศาสตร์</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="location_type.php?id=การท่องเที่ยวเชิงธรรมชาติ">การท่องเที่ยวเชิงธรรมชาติ</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="location_type.php?id=การท่องเที่ยวเชิงนันทนาการ">การท่องเที่ยวเชิงนันทนาการ</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="location_type.php?id=การท่องเที่ยวเชิงวัฒนธรรม">การท่องเที่ยวเชิงวัฒนธรรม</a></li>

          </ul>
        </li>



      </ul>










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
    <div class="navbar-form navbar-left">
      <form action="location_type_all_search.php?search=<?php echo $search['search'] ?>">
        <div class="form-group">
        <input type="text" class="form-control" name="search" placeholder="ค้นหาข้อมูล ชื่อสถานที่ ฯลฯ" value="">
        </div>
        <input type="submit" class="btn btn-default" value="ค้นหา">
      </form>
    </div>
      </form>
        <a href="#">
        <?php
        /*echo "ยินดีต้อนรับคุณ ".@$_SESSION['member_name'] ;*/
        ?>
        </a>



      <ul class="nav navbar-nav navbar-right">

        <li><a href="memberloginform.php">สมัครสมาชิก/เข้าสู่ระบบ</a></li>
        <!-- <li><a href="#">Link</a></li> -->

        <!--<li class="dropdown">
          <a href="#" class="dropdown-toggle"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">สมาชิก<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a><?php
            echo @$_SESSION['member_name'] ;
            ?></a></li>
            <li><a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">เข้าสู่ระบบ</a></li>




            <li><a href="#" data-toggle="modal" data-target="#example2Modal" data-whatever="@mdo">ลืมรหัสผ่าน</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="registermember.php" data-toggle="modal" data-target="#" data-whatever="@mdo">สมัครสมาชิก</a></li>
            <li><a href="logout.php" style="color: red;">ออกจากระบบ</a></a></li>
          </ul>
        </li>-->

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<!-- บนคารูเซล -->
<div class="col-md-12">
  <div class="hidden-xs">
    <img src="<?php echo $banner_fetch_mid['banner_file']; ?>" class="img-responsive" width="100%">
  </div>
</div>

<div class="col-md-12">
  <p><br>
  </p>
</div>








<!-- เนื้อหาข้างล่าง -->

<div class="page-header">
  <h1 style="color:gold;text-shadow: -2px 0 black, 0 1px black, 1px 0 black, 0 -1px black;"><i class="fas fa-trophy fa-fw"></i> Top 10 สถานที่ท่องเที่ยว</h1>
</div>

<br>

<form class="" action="index.html" method="post" >
    <div class="container marketing" >
    <div class="row col-md-12" >
      <?php
      while($top10 = mysqli_fetch_array($top10rating_score)){
        # code...

       ?>

      <div class="col-md-3 hidden-xs text-center">
        <div class="content-wrapper">
        <?php
        echo "<a href='p1.php?id=".$top10['location_id']."'><img src='".$top10["location_image_file"]."' alt='img-responsive' width='100%' style='border-radius: 20px;'></a>";
        ?>
        <div class="text-wrapper">
            <h1><!--<i class="fas fa-trophy fa-fw"></i>--># <?php echo $i ?></h1>
        </div>
      </div>
      </div>

      <div class="col-md-3 hidden-xs text-center" style="background-color: #eaeaea;border-radius: 20px;border:5px solid white;margin-bottom:22px;">
        <?php
        /*echo "<h2 style='text-align: center; line-height: 32pt; height: 32pt; overflow:hidden;'>".$top10['location_name']. "</h2>";
        echo "<p style='text-align: center; line-height: 15pt; height: 45pt; overflow:hidden;'>".$top10["location_info"]."</p>";
        echo "<td><a href='p1.php?id=".$top10['location_id']."' class='btn btn-success' role='button'>ดูรายละเอียด</a></td>";*/
         ?>
         <h2  style="text-align: center;line-height: 16pt; height: 32pt; overflow:hidden;"><a style="color:black;" href="p1.php?id=<?php echo $top10['location_id'] ?>"><?php echo $top10['location_name'] ?></a></h2>
         <p style="text-align: center;line-height: 20pt; height: 39pt; overflow:hidden;"><a style="color:black;" href="p1.php?id=<?php echo $top10['location_id'] ?>"><?php echo $top10['location_info'] ?></a></p>
         <td><a style="color:white;" href="p1.php?id=<?php echo $top10['location_id'] ?>" class="btn btn-success" role="button">ดูรายละเอียด</a></td>
         <!--<input style="color: yellow;" type="number" name="your_awesome_parameter" id="rating-readonly" class="rating" data-clearable="remove" value="<?php echo $row4["rating_score"]; ?>" data-readonly />-->
          <!--<input style="color: yellow;" type="number" name="your_awesome_parameter" id="rating-readonly" class="rating" data-clearable="remove" value="<?php echo $top10["rating_score"]; ?>" data-readonly />

         <div class="row lead">
             <div style="color: orange;" id="rating-readonly" class="starrr" data-rating='<?php echo $top10["rating_score"]; ?>'></div>
         </div>-->

      </div>
      <div class="col-xs-12 visible-xs text-center">
        <div class="content">
        <?php
        echo "<a href='p1.php?id=".$top10['location_id']."'><img src='".$top10["location_image_file"]."' alt='img-responsive' width='100%' style='border-radius: 20px;'></a>";
        ?>
        <div class="text-wrapper">
            <h1><!--<i class="fas fa-trophy fa-fw"></i>--># <?php echo $i ?></h1>
        </div>
      </div>
      </div>
      <div class="col-xs-12 visible-xs text-center" style="background-color: #eaeaea;border-radius: 20px;border:5px solid white;margin-bottom:22px;">
        <?php
        /*echo "<h2 style='text-align: center; line-height: 32pt; height: 32pt; overflow:hidden;'>".$top10['location_name']. "</h2>";
        echo "<p style='text-align: center; line-height: 15pt; height: 45pt; overflow:hidden;'>".$top10["location_info"]."</p>";
        echo "<td><a href='p1.php?id=".$top10['location_id']."' class='btn btn-success' role='button'>ดูรายละเอียด</a></td>";*/
         ?>
         <h2  style="text-align: center;line-height: 16pt; height: 32pt; overflow:hidden;"><a style="color:black;" href="p1.php?id=<?php echo $top10['location_id'] ?>"><?php echo $top10['location_name'] ?></a></h2>
         <p style="text-align: center;line-height: 20pt; height: 39pt; overflow:hidden;"><a style="color:black;" href="p1.php?id=<?php echo $top10['location_id'] ?>"><?php echo $top10['location_info'] ?></a></p>
         <td><a style="color:white;" href="p1.php?id=<?php echo $top10['location_id'] ?>" class="btn btn-success" role="button">ดูรายละเอียด</a></td>
         <!--<input style="color: yellow;" type="number" name="your_awesome_parameter" id="rating-readonly" class="rating" data-clearable="remove" value="<?php echo $row4["rating_score"]; ?>" data-readonly />-->
          <!--<input style="color: yellow;" type="number" name="your_awesome_parameter" id="rating-readonly" class="rating" data-clearable="remove" value="<?php echo $top10["rating_score"]; ?>" data-readonly />

         <div class="row lead">
             <div style="color: orange;" id="rating-readonly" class="starrr" data-rating='<?php echo $top10["rating_score"]; ?>'></div>
         </div>-->

      </div>

      <?php
      $i++;
      }
       ?>

    </div>


    <br>
    <br>
    <div class="col-md-12">
      <br>
    </div>





  </div>
</form>
<div class="col-md-8">
  <div class="hidden-xs">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="<?php echo $banner_fetch_bot['banner_file']; ?>" class="img-responsive" width="100%">
        </div>
        <?php
        while($bottom_banner = mysqli_fetch_array($banner_bot)) {
          # code...
         ?>
        <div class="item">
          <img src="<?php echo $bottom_banner['banner_file']; ?>" class="img-responsive" width="100%">
        </div>
      <?php
      }
      ?>



      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>
<div class="col-md-4 hidden-sm">
  <img src="<?php echo $banner_fetch_small['banner_file']; ?>" class="img-responsive" width="100%">
</div>
<div class="col-md-12">
  <p><br>
  </p>
</div>





<br>
<br>
<br>
<!-- ไดนามิคแท็ป -->




<!--
<ul class="nav nav-tabs" style="color :black;">
  <li class="active"><a data-toggle="tab" href="#home" style="color :black;background-color: #ffbd26;">แนะนำ</a></li>
  <li><a data-toggle="tab" href="#menu1" style="color :black;background-color: #ff8570;">เชิงนิเวศ</a></li>
  <li><a data-toggle="tab" href="#menu2" style="color :black;background-color: #ffee70;">เชิงศิลปะวิทยาการ</a></li>
  <li><a data-toggle="tab" href="#menu3" style="color :black;background-color: #b7ff70;">เชิงประวัติศาสตร์</a></li>
  <li><a data-toggle="tab" href="#menu4" style="color :black;background-color: #70ffe0;">เชิงธรรมชาติ</a></li>
  <li><a data-toggle="tab" href="#menu5" style="color :black;background-color: #708eff;">เชิงนันทนาการ</a></li>
  <li><a data-toggle="tab" href="#menu6" style="color :black;background-color: #ff70c8;">เชิงวัฒนธรรม</a></li>
</ul>
-->





<br>





    <nav class="nav nav-tabs" style="color :black;">
      <h1 style="text-shadow: -2px 0 gold, 0 1px gold, 1px 0 gold, 0 -1px gold;"><i class="fas fa-random"></i> บทความแนะนำ</h1>
    </nav>
    <p></p>

    <form class="" action="index.html" method="post" >
        <div class="container marketing">

    <div class="row col-md-12">
      <?php
      while($random = mysqli_fetch_array($randomlocation)) {
        # code...
       ?>

      <div class="col-md-3 col-xs-6 col-sm-3 text-center" style="background-color: #eaeaea;border-radius: 20px;border:5px solid white;">

        <?php
        echo "<a href='p1.php?id=".$random['location_id']."'><img src='".$random["product_image_file"]."' alt='img-responsive' width='100%' style='border-radius: 20px;'></a>";

        ?>


          <?php
          echo "<a href='p1.php?id=".$random['location_id']."'><h2 style='text-align: center; line-height: 32pt; height: 32pt; overflow:hidden;'>".$random['product_store']. "</a></h2>";
          echo "<a href='p1.php?id=".$random['location_id']."'><p style='text-align: center; line-height: 15pt; height: 45pt; overflow:hidden;'>".$random["product_info"]."</a></p>";
          echo "<td><a href='p1.php?id=".$random['location_id']."' class='btn btn-success' role='button'>ดูรายละเอียด</a></td>";
           ?>



         <!-- <input style="color: yellow;" type="number" name="your_awesome_parameter" id="rating-readonly" class="rating" data-clearable="remove" value="<?php echo $row4["rating_score"]; ?>" data-readonly /> -->

      </div>
      <?php
      }
       ?>

       <?php
       while($random2 = mysqli_fetch_array($randomlocation2)) {
         # code...
        ?>
      <div class="col-md-3 col-xs-6 col-sm-3 text-center" style="background-color: #eaeaea;border-radius: 20px;border:5px solid white;">

        <?php
        echo "<a href='p1.php?id=".$random2['location_id']."'><img src='".$random2["service_image_file"]."' alt='img-responsive' width='100%' style='border-radius: 20px;'></a>";
        ?>


          <?php
          echo "<a href='p1.php?id=".$random2['location_id']."'><h2 style='text-align: center; line-height: 32pt; height: 32pt; overflow:hidden;'>".$random2['service_name']. "</a></h2>";
          echo "<a href='p1.php?id=".$random2['location_id']."'><p style='text-align: center; line-height: 15pt; height: 45pt; overflow:hidden;'>".$random2["service_info"]."</a></p>";
          echo "<td><a href='p1.php?id=".$random2['location_id']."' class='btn btn-success' role='button'>ดูรายละเอียด</a></td>";
           ?>


         <!-- <input style="color: yellow;" type="number" name="your_awesome_parameter" id="rating-readonly" class="rating" data-clearable="remove" value="<?php echo $row4["rating_score"]; ?>" data-readonly /> -->

      </div>
      <?php
      }
       ?>

       <?php
       while($random3 = mysqli_fetch_array($randomlocation3)) {
         # code...
        ?>
      <div class="col-md-3 col-xs-6 col-sm-3 text-center" style="background-color: #eaeaea;border-radius: 20px;border:5px solid white;">

        <?php
        echo "<a href='p1.php?id=".$random3['location_id']."'><img src='".$random3["festival_image_file"]."' alt='img-responsive' width='100%' style='border-radius: 20px;'></a>";
        ?>


          <?php
          echo "<a href='p1.php?id=".$random3['location_id']."'><h2 style='text-align: center; line-height: 32pt; height: 32pt; overflow:hidden;'>".$random3['festival_name']. "</a></h2>";
          echo "<a href='p1.php?id=".$random3['location_id']."'><p style='text-align: center; line-height: 15pt; height: 45pt; overflow:hidden;'>".$random3["festival_info"]."</a></p>";
          echo "<td><a href='p1.php?id=".$random3['location_id']."' class='btn btn-success' role='button'>ดูรายละเอียด</a></td>";
           ?>


         <!-- <input style="color: yellow;" type="number" name="your_awesome_parameter" id="rating-readonly" class="rating" data-clearable="remove" value="<?php echo $row4["rating_score"]; ?>" data-readonly /> -->

      </div>
      <?php
      }
       ?>

       <?php
       while($random4 = mysqli_fetch_array($randomlocation4)) {
         # code...
        ?>
      <div class="col-md-3 col-xs-6 col-sm-3 text-center" style="background-color: #eaeaea;border-radius: 20px;border:5px solid white;">

        <?php
        echo "<a href='p1.php?id=".$random4['location_id']."'><img src='".$random4["lodge_image_file"]."' alt='img-responsive' width='100%' style='border-radius: 20px;'></a>";
        ?>


          <?php
          echo "<a href='p1.php?id=".$random4['location_id']."'><h2 style='text-align: center; line-height: 32pt; height: 32pt; overflow:hidden;'>".$random4['lodge_name']. "</a></h2>";
          echo "<a href='p1.php?id=".$random4['location_id']."'><p style='text-align: center; line-height: 15pt; height: 45pt; overflow:hidden;'>".$random4["lodge_info"]."</a></p>";
          echo "<td><a href='p1.php?id=".$random4['location_id']."' class='btn btn-success' role='button'>ดูรายละเอียด</a></td>";
           ?>


         <!-- <input style="color: yellow;" type="number" name="your_awesome_parameter" id="rating-readonly" class="rating" data-clearable="remove" value="<?php echo $row4["rating_score"]; ?>" data-readonly /> -->

      </div>

      <?php
      }
       ?>



    </div>
    </div>
    </form>


    <div class="page-header">

    </div>


<!-- ฟูทเตอร์ -->
<footer id="myFooter">
    <div class="container">
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
