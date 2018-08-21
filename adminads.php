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

$mem_info_query ="SELECT * FROM tblmember WHERE member_id='$session_login_id'";
$memberinfo_result = mysqli_query($con, $mem_info_query);

$perpage = 5;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
$start = ($page - 1) * $perpage;
$locationmem_info_query ="SELECT * FROM tblreport_comment JOIN tblmember ON tblreport_comment.member_id=tblmember.member_id JOIN tblvote_comment ON tblreport_comment.location_id=tblvote_comment.location_id
                           WHERE tblreport_comment.vote_comment_id=tblvote_comment.vote_comment_id ORDER BY reportcomment_id DESC limit {$start} , {$perpage} ";
$locationmemberinfo_result = mysqli_query($con, $locationmem_info_query);
$i = 1;


$result_showscore = mysqli_query($con, "SELECT tbllocation.*,tblvote_comment.* FROM tbllocation,tblvote_comment WHERE tbllocation.location_id AND tblvote_comment.location_id");
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
$row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
$rowshowscore = mysqli_fetch_array($result_showscore, MYSQLI_ASSOC);

$banner_top = mysqli_query($con, "SELECT * FROM tblads_banner WHERE banner_type = 'top_banner' ");
$banner_fetch = mysqli_fetch_array($banner_top, MYSQLI_ASSOC);

$banner_mid = mysqli_query($con, "SELECT * FROM tblads_banner WHERE banner_type = 'middle_banner' ");
$banner_fetch_mid = mysqli_fetch_array($banner_mid, MYSQLI_ASSOC);

$banner_bot = "SELECT * FROM tblads_banner WHERE banner_type = 'bottom_banner' limit 3 ";
//$banner_fetch_bot = mysqli_fetch_array($banner_bot, MYSQLI_ASSOC);
$banner_query = mysqli_query($con, $banner_bot);

$banner_top = mysqli_query($con, "SELECT * FROM tblads_banner WHERE banner_type = 'top_banner' ");
$banner_fetch = mysqli_fetch_array($banner_top, MYSQLI_ASSOC);

$banner_small = mysqli_query($con, "SELECT * FROM tblads_banner WHERE banner_type = 'small_banner' ");
$banner_fetch_small = mysqli_fetch_array($banner_small, MYSQLI_ASSOC);

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
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="jsjquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="assets/css/Footer-with-social-icons.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="js/bootstrap-datepicker.js"></script>

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
      .navbar-center
{
    position: absolute;
    width: 100%;
  }

      /*เปิด CSS เรทติ้ง */


      /* ปิด CSS เรทติ้ง */





    </style>
    <script>
    $('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    autoclose: true,
    todayHighlight: true
    });
    </script>
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

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <p class='navbar-text navbar-center'>ส่วนผู้ดูแลระบบ</p>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">






      <ul class="nav navbar-nav navbar-right">

        <!-- <li><a href="#">Link</a></li> -->

        <!--<li class="dropdown">

          <a href="memberinfoindex.php" style="background-color: lightgreen;" class="dropdown-toggle glyphicon glyphicon-user" role="button"> สวัสดีคุณ <?php echo $s_login_username ;?></a>

        </li>-->
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">

  <?php

  while($memberinfo = mysqli_fetch_array($memberinfo_result)){
    # code...
  ?>




    <!--<div class="input-group">
      <span class="input-group-addon" id="basic-addon1">ชื่อผู้ใช้งาน</span>
      <input type="text" class="form-control" placeholder="<?php echo "$s_login_name" ?>" aria-describedby="basic-addon1" disabled>
    </div>
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">ชื่อ</span>
      <input type="text" class="form-control" placeholder="<?php echo "$s_login_username" ?>" aria-describedby="basic-addon1" disabled>
    </div> -->
    <div class="col-md-4">
      <!--<img src="img/<?php echo "$s_login_image" ?>" class="img-responsive center-block img-circle" style="margin-top : 10px; width:50%">-->
      <br>
      <div class="text-center">
        <label><?php echo "$s_login_username" ?></label>  <label><?php echo "$s_login_surname" ?></label>
      </div>
      <br>

      <div class="list-group hidden-xs">
        <a href="adminindex.php" class="list-group-item" style="color :black">
          <i class="far fa-bookmark" aria-hidden="true"></i> รายงานบทความของสมาชิก
        </a>
        <a href="admincomment.php" class="list-group-item" style="color :black"><i class="far fa-comment" aria-hidden="true"></i> รายงานความคิดเห็นของสมาชิก</a>
        <a href="adminads.php" class="list-group-item" style="color :black"><i class="far fa-image" aria-hidden="true"></i> จัดการโฆษณา</a>
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
        <li class="active"><a href="adminindex.php" style="color :black;">รายงานแจ้งลบบทความ</a></li>
        <li><a href="admincomment.php" style="color :black;">รายงานแจ้งลบความคิดเห็น</a></li>
        <li><a href="adminads.php" style="color :black;">จัดการโฆษณา</a></li>
        <li><a href="logout.php" style="color :black;background-color: #ff8570;">ออกจากระบบ</a></li>

      </ul>
      </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="page-header">
        <h1><i class="far fa-image" aria-hidden="true"></i> จัดการโฆษณา</h1>
      </div>
      <ul class="nav nav-tabs visible-lg" >
        <li class="active"><a data-toggle="tab" href="#menu0" style="color:black;background-color: #99ccff;"><i class="far fa-images"></i> โฆษณาส่วนบน</a></li>
        <li><a data-toggle="tab" href="#menu1" style="color:black;background-color: #b3d9ff;"><i class="far fa-images"></i> โฆษณาส่วนกลาง</a></li>
        <li><a data-toggle="tab" href="#menu2" style="color:black;background-color: #cce6ff;"><i class="far fa-images"></i> โฆษณาส่วนล่าง</a></li>
      </ul>
      <div class="visible-xs">
            <button type="button" class="btn btn-info btn-lg btn-block" data-toggle="collapse" data-target="#infoads">เมนูจัดการข้อมูล</button>
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

      <div class="collapse navbar-collapse" id="infoads">

      <ul class="nav navbar-nav" style="color :black;">
        <li class="active"><a data-toggle="tab" href="#menu0" style="color:black;background-color: #99ccff;"><i class="far fa-images"></i> โฆษณาส่วนบน</a></li>
        <li><a data-toggle="tab" href="#menu1" style="color:black;background-color: #b3d9ff;"><i class="far fa-images"></i> โฆษณาส่วนกลาง</a></li>
        <li><a data-toggle="tab" href="#menu2" style="color:black;background-color: #cce6ff;"><i class="far fa-images"></i> โฆษณาส่วนล่าง</a></li>

      </ul>
      </div>
      </div>
      <div class="tab-content">
        <div id="menu0" class="tab-pane fade in active">

        <form class="" action="adminadsupdate.php?type=top_banner" method="post" enctype="multipart/form-data">
        <br>
        <label class="header">โฆษณาส่วนบน ขนาด 850x195 pixel</label>
        <input type="file" name="banner_file" value="banner_file"  onchange="document.getElementById('loc_imgtop').src = window.URL.createObjectURL(this.files[0])" class="img-responsive" width="50%">
        <input type="hidden" name="top_oldfile" value="<?php echo $banner_fetch["banner_file"]; ?>">
        <img id="loc_imgtop" name="banner_file"  src="<?php echo $banner_fetch["banner_file"]; ?>" height="200" class="img-responsive" width="100%">
        <br>
        <label class="control-label">ช่วงเวลาเริ่มต้น</label>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">
              <i class="fas fa-calendar-alt" aria-hidden="true"></i>
            </span>
            <input value="<?php echo $banner_fetch["banner_timeup"]; ?>" type="text" class="form-control datepicker" name="timeup" data-provide="datepicker" data-date-language="th-th" placeholder="กรุณาเลือกวันเดือนปเริ่มต้น">
          </div>
        </div>
        <label class="control-label">ช่วงเวลาสินสุด</label>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">
              <i class="fas fa-calendar-alt" aria-hidden="true"></i>
            </span>
            <input value="<?php echo $banner_fetch["banner_timeend"]; ?>" type="text" class="form-control datepicker" name="timeend" data-provide="datepicker" data-date-language="th-th" placeholder="กรุณาเลือกวันเดือนปีสิ้นสุด">
          </div>
        </div>
        <button type="submit" class="btn btn-success" name="button">บันทึก</button>
        </form>
        </div>

        <div id="menu1" class="tab-pane fade">
        <form class="" action="adminadsupdate.php?type=middle_banner" method="post" enctype="multipart/form-data">
        <br>
        <label class="header">โฆษณาส่วนกลาง ขนาด 955x220px</label>
        <input type="file" name="banner_file" value="banner_file"  onchange="document.getElementById('loc_imgmid').src = window.URL.createObjectURL(this.files[0])" class="img-responsive" width="50%">
        <input type="hidden" name="mid_oldfile" value="<?php echo $banner_fetch_mid["banner_file"]; ?>">
        <img id="loc_imgmid" name="banner_file"  src="<?php echo $banner_fetch_mid["banner_file"]; ?>" height="200" class="img-responsive" width="100%">
        <label class="control-label">ช่วงเวลาเริ่มต้น</label>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">
              <i class="fas fa-calendar-alt" aria-hidden="true"></i>
            </span>
            <input value="<?php echo $banner_fetch_mid["banner_timeup"]; ?>" type="text" class="form-control datepicker" name="timeup" data-provide="datepicker" data-date-language="th-th" placeholder="กรุณาเลือกวันเดือนปเริ่มต้น">
          </div>
        </div>
        <label class="control-label">ช่วงเวลาสินสุด</label>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">
              <i class="fas fa-calendar-alt" aria-hidden="true"></i>
            </span>
            <input value="<?php echo $banner_fetch_mid["banner_timeend"]; ?>" type="text" class="form-control datepicker" name="timeend" data-provide="datepicker" data-date-language="th-th" placeholder="กรุณาเลือกวันเดือนปีสิ้นสุด">
          </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success" name="button">บันทึก</button>
        </form>
        </div>

        <div id="menu2" class="tab-pane fade">
          <?php
          while($bottom_banner_show = mysqli_fetch_array($banner_query)){
            # code...
          ?>
        <!--<form class="" action="11adminadsupdate.php?type=bottom_banner&banner_id=<?php $banner_bot_fetch['banner_id']; ?>" method="post" enctype="multipart/form-data">-->
          <?php
          echo "<form action='adminadsupdate.php?bannerid=".$bottom_banner_show['banner_id']."' method='post' enctype='multipart/form-data' > ";
           ?>

        <br>
        <label class="header">โฆษณาส่วนล่าง <?php echo $i_no ?> ขนาด 850x250px</label>
        <input type="file" name="banner_file" value="banner_file"  onchange="document.getElementById('loc_imgbot<?php echo $i_no ?>').src = window.URL.createObjectURL(this.files[0])" class="img-responsive" width="50%">
        <input type="hidden" name="bot_oldfile" value="<?php echo $bottom_banner_show["banner_file"]; ?>">
        <img id="loc_imgbot<?php echo $i_no ?>" name="banner_file"  src="<?php echo $bottom_banner_show["banner_file"]; ?>" height="200" class="img-responsive" width="100%">
        <label class="control-label">ช่วงเวลาเริ่มต้น</label>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">
              <i class="fas fa-calendar-alt" aria-hidden="true"></i>
            </span>
            <input value="<?php echo $bottom_banner_show["banner_timeup"]; ?>" type="text" class="form-control datepicker" name="timeup_mid" data-provide="datepicker" data-date-language="th-th" placeholder="กรุณาเลือกวันเดือนปเริ่มต้น">
          </div>
        </div>
        <label class="control-label">ช่วงเวลาสินสุด</label>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">
              <i class="fas fa-calendar-alt" aria-hidden="true"></i>
            </span>
            <input value="<?php echo $bottom_banner_show["banner_timeend"]; ?>" type="text" class="form-control datepicker" name="timeend_mid" data-provide="datepicker" data-date-language="th-th" placeholder="กรุณาเลือกวันเดือนปีสิ้นสุด">
          </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success" name="button">บันทึก</button>
        </form>
        <?php
        $i_no++;
        }
         ?>

         <form class="" action="adminadsupdate.php?type=small_banner" method="post" enctype="multipart/form-data">
         <br>
         <label class="header">โฆษณาส่วนล่าง ขนาด 300x168 pixel</label>
         <input type="file" name="banner_file" value="banner_file"  onchange="document.getElementById('loc_imgsmall').src = window.URL.createObjectURL(this.files[0])" class="img-responsive" width="50%">
         <input type="hidden" name="small_oldfile" value="<?php echo $banner_fetch_small["banner_file"]; ?>">
         <img id="loc_imgsmall" name="banner_file"  src="<?php echo $banner_fetch_small["banner_file"]; ?>" height="200" class="img-responsive" width="50%">
         <label class="control-label">ช่วงเวลาเริ่มต้น</label>
         <div class="form-group">
           <div class="input-group">
             <span class="input-group-addon">
               <i class="fas fa-calendar-alt" aria-hidden="true"></i>
             </span>
             <input value="<?php echo $banner_fetch_small["banner_timeup"]; ?>" type="text" class="form-control datepicker" name="timeup" data-provide="datepicker" data-date-language="th-th" placeholder="กรุณาเลือกวันเดือนปเริ่มต้น">
           </div>
         </div>
         <label class="control-label">ช่วงเวลาสินสุด</label>
         <div class="form-group">
           <div class="input-group">
             <span class="input-group-addon">
               <i class="fas fa-calendar-alt" aria-hidden="true"></i>
             </span>
             <input value="<?php echo $banner_fetch_small["banner_timeend"]; ?>" type="text" class="form-control datepicker" name="timeend" data-provide="datepicker" data-date-language="th-th" placeholder="กรุณาเลือกวันเดือนปีสิ้นสุด">
           </div>
         </div>
         <br>
         <button type="submit" class="btn btn-success" name="button">บันทึก</button>
         </form>




        </div>
      </div>
    </div>


  <?php

  }
   ?>

</div>


















<br>

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
    <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker-thai.js"></script>
    <script type="text/javascript" src="js/locales/bootstrap-datepicker.th.js"></script>

  </body>
</html>
