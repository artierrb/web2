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




$result_showscore = mysqli_query($con, "SELECT tbllocation.*,tblvote_comment.* FROM tbllocation,tblvote_comment WHERE tbllocation.location_id AND tblvote_comment.location_id");
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
$row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
$rowshowscore = mysqli_fetch_array($result_showscore, MYSQLI_ASSOC);


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
    <title>Go! Travel.com</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style media="screen">
      body {
        font-family: 'Leelawadee UI' , sans-serif;
        font-size: 200%;
      }
      div {
        font-family: 'Leelawadee UI' , sans-serif;


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
        <img src="img/portfolio/go.png" class="img-responsive" alt="Slice of cake" width="100%">

      </div>
      <div class="col-lg-9 hidden-xs">
        <img src="img/portfolio/cafe2.jpg" class="img-responsive" alt="Slice of cake" width="100%">


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
        <li class="active"><a href="location_type_all.php?id=10">บทความทั้งหมด<span class="sr-only">(current)</span></a></li>


        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ประเภทการท่องเที่ยว <span class="caret"></span></a>
          <ul class="dropdown-menu">



<!-- echo "<td><a href='p1.php?id=".$row4['location_id']."' class='btn btn-default' role='button'>ดูรายละเอียด</a></td>"; -->


            <li><a href="location_type.php?id=1">การท่องเที่ยวเชิงนิเวศ</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="location_type.php?id=2">การท่องเที่ยวเชิงศิลปะวิทยาการ</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="location_type.php?id=3">การท่องเที่ยวเชิงประวัติศาสตร์</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="location_type.php?id=4">การท่องเชิงธรรมชาติ</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="location_type.php?id=5">การท่องเที่ยวเชิงนันทนาการ</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="location_type.php?id=6">การท่องเที่ยวเชิงวัฒนธรรม</a></li>


          </ul>
        </li>

      </ul>
      <form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="ค้นหาข้อมูล ชื่อสถานที่ ฯลฯ">
        </div>
        <button type="submit" class="btn btn-default">ค้นหา</button>
      </form>
        <a href="#">
        <?php
        /*echo "ยินดีต้อนรับคุณ ".@$_SESSION['member_name'] ;*/
        ?>
        </a>

        <?phpecho @$_SESSION['member_name'] ;?>


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
      <img src="img/<?php echo "$s_login_image" ?>" class="img-responsive center-block img-circle" style="margin-top : 10px; width:50%">
      <br>
      <div class="text-center">
        <label><?php echo "$s_login_username" ?></label>  <label><?php echo "$s_login_surname" ?></label>
      </div>
      <br>

      <div class="list-group visible-lg">
        <a href="memberinfoindex.php" class="list-group-item">
          ส่วนจัดการข้อมูลสมาชิก
        </a>
        <a href="addlocation.php" class="list-group-item list-group-item-success">เพิ่มบทความ</a>
        <a href="locationmemberinfo.php" class="list-group-item list-group-item-info">จัดการข้อมูลบทความ</a>
        <a href="memberinfo.php" class="list-group-item list-group-item-warning">จัดการข้อมูลส่วนตัว</a>
        <a href="logout.php" class="list-group-item list-group-item-danger">ออกจากระบบ</a>
      </div>
      <div class="visible-xs">
            <button type="button" class="btn btn-info btn-lg btn-block" data-toggle="collapse" data-target="#info">เมนูจัดการข้อมูล</button>
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

      <div class="collapse navbar-collapse" id="info">

      <ul class="nav navbar-nav" style="color :black;">
        <li class="active"><a href="addlocation.php" style="color :black;background-color: #b7ff70;">เพิ่มบทความ</a></li>
        <li><a href="locationmemberinfo.php" style="color :black;background-color: #70ffe0;">จัดการข้อมูลบทความ</a></li>
        <li><a href="memberinfo.php" style="color :black;background-color: #ffee70;">จัดการข้อมูลส่วนตัว</a></li>
        <li><a href="logout.php" style="color :black;background-color: #ff8570;">ออกจากระบบ</a></li>

      </ul>
      </div>

      </div>
    </div>
    <div class="col-md-8">
      <div class="page-header">
        <h1>ส่วนจัดการข้อมูลสมาชิก</h1>
      </div>
    </div>




    <!--
    <div class="col-md-8">
      <label class="control-label">ชื่อผู้ใช้งาน / Username</label>
      <input type="text" style="background-color : white;" class="form-control" value="<?php echo "$s_login_name" ?>" disabled>
      <label class="control-label">รหัสผ่าน / Password</label>
      <input type="password" style="background-color : white;" class="form-control" value="<?php echo "$s_login_pwd" ?>" disabled>
      <label class="control-label">ชื่อ / Name</label>
      <input type="text" style="background-color : white;" class="form-control" value="<?php echo "$s_login_username" ?>" disabled>
      <label class="control-label">นามสกุล / Surname</label>
      <input type="text" style="background-color : white;" class="form-control" value="<?php echo "$s_login_surname" ?>" disabled>
      <label class="control-label">เพศ / Gender</label>
      <input type="text" style="background-color : white;" class="form-control" value="<?php echo "$s_login_sex" ?>" disabled>
      <label class="control-label">วันเกิด / Birthday</label> <br>
      <div class="col-sm-12">
      </div>
      <div class="col-sm-4">
        <input type="text" style="background-color : white;" class="form-control" value="<?php echo "$s_login_bdate" ?>" disabled>
      </div>
      <div class="col-sm-4">
        <input type="text" style="background-color : white;" class="form-control" value="<?php echo "$s_login_mdate" ?>" disabled>
      </div>
      <div class="col-sm-4">
        <input type="text" style="background-color : white;" class="form-control" value="<?php echo "$s_login_ydate" ?>" disabled>
      </div>
      <label class="control-label">ที่อยู่ / Address</label>
      <input type="text" style="background-color : white;" class="form-control" value="<?php echo "$s_login_address" ?>" disabled>
      <label class="control-label">จังหวัด / Province</label>
      <input type="text" style="background-color : white;" class="form-control" value="<?php echo "$s_login_province" ?>" disabled>
      <label class="control-label">รหัสไปรษณีย์ / Postcode</label>
      <input type="text" style="background-color : white;" class="form-control" value="<?php echo "$s_login_postcode" ?>" disabled>
      <label class="control-label">อีเมล / Email</label>
      <input type="text" style="background-color : white;" class="form-control" value="<?php echo "$s_login_email" ?>" disabled>
      <label class="control-label">เฟซบุ๊ก / Facebook</label>
      <input type="text" style="background-color : white;" class="form-control" value="<?php echo "$s_login_fb" ?>" disabled>
      <label class="control-label">ทวิตเตอร์ / Twitter</label>
      <input type="text" style="background-color : white;" class="form-control" value="<?php echo "$s_login_tw" ?>" disabled>
      <label class="control-label">อินสตาแกรม / Instagram</label>
      <input type="text" style="background-color : white;" class="form-control" value="<?php echo "$s_login_ig" ?>" disabled>

      <!--
      <div class="input-group input-group-lg" style="margin-top : 5px;">
        <span class="input-group-addon" id="sizing-addon1">ชื่อผู้ใช้งาน</span>
        <input style="background-color : white;" type="text" class="form-control text-right" value="<?php echo "$s_login_name" ?>" aria-describedby="sizing-addon1" disabled>
      </div>
      <div class="input-group input-group-lg" style="margin-top : 5px;">
        <span class="input-group-addon" id="sizing-addon1">รหัสผ่าน</span>
        <input style="background-color : white;" type="password" class="form-control text-right" value="<?php echo "$s_login_pwd" ?>" aria-describedby="sizing-addon1" disabled>
      </div>
      <div class="input-group input-group-lg" style="margin-top : 5px;">
        <span class="input-group-addon" id="sizing-addon1">ชื่อ</span>
        <input style="background-color : white;" type="text" class="form-control text-right" value="<?php echo "$s_login_username" ?>" aria-describedby="sizing-addon1" disabled>
      </div>
      <div class="input-group input-group-lg" style="margin-top : 5px;">
        <span class="input-group-addon" id="sizing-addon1">นามสกุล</span>
        <input style="background-color : white;" type="text" class="form-control text-right" value="<?php echo "$s_login_surname" ?>" aria-describedby="sizing-addon1" disabled>
      </div>
      <div class="input-group input-group-lg" style="margin-top : 5px;">
        <span class="input-group-addon" id="sizing-addon1">เพศ</span>
        <input style="background-color : white;" type="text" class="form-control text-right" value="<?php echo "$s_login_sex" ?>" aria-describedby="sizing-addon1" disabled>
      </div>
      <div class="input-group input-group-lg" style="margin-top : 5px;">
        <span class="input-group-addon" id="sizing-addon1">อีเมล</span>
        <input style="background-color : white;" type="text" class="form-control text-right" value="<?php echo "$s_login_email" ?>" aria-describedby="sizing-addon1" disabled>
      </div>
      <div class="input-group input-group-lg" style="margin-top : 5px;">
        <span class="input-group-addon" id="sizing-addon1">เฟซบุ๊ก</span>
        <input style="background-color : white;" type="text" class="form-control text-right" value="<?php echo "$s_login_fb" ?>" aria-describedby="sizing-addon1" disabled>
      </div>
      <div class="input-group input-group-lg" style="margin-top : 5px;">
        <span class="input-group-addon" id="sizing-addon1">ทวิตเตอร์</span>
        <input style="background-color : white;" type="text" class="form-control text-right" value="<?php echo "$s_login_tw" ?>" aria-describedby="sizing-addon1" disabled>
      </div>
      <div class="input-group input-group-lg" style="margin-top : 5px;">
        <span class="input-group-addon" id="sizing-addon1">อินสตาแกรม</span>
        <input style="background-color : white;" type="text" class="form-control text-right" value="<?php echo "$s_login_ig" ?>" aria-describedby="sizing-addon1" disabled>
      </div>

      <br>
      <div class="text-right">
        <button type="button" class="btn btn-default" data-dismiss="modal" onClick="window.location='editmemberinfo.php?memberid=<?php echo $memberinfo["member_id"]; ?>'">แก้ไขข้อมูล</button>
      </div>
    </div>-->



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



<!-- โมดัลเข้าสู่ระบบ -->
<form class="" action="login.php" method="post">


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="loginModalLabel">เข้าสู่ระบบ</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="inputUsername" class="control-label" >ชื่อผู้ใช้งาน</label>
            <input type="text" class="form-control" id="username" name="username" autofocus placeholder="กรุณากรอกชื่อผู้ใช้งาน">
          </div>
          <div class="form-group">
            <label for="inputPassword" class="control-label">รหัสผ่าน</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="กรุณากรอกรหัสผ่าน">

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-md" type="submit">เข้าสู่ระบบ</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>

      </div>
    </div>
  </div>
</div>
</form>


<!-- โมดัลเปลี่ยนรหัสผ่าน -->
<div class="modal fade" id="example2Modal" tabindex="-1" role="dialog" aria-labelledby="example2ModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="loginModalLabel">ลืมรหัสผ่าน</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="inputUseremail" class="control-label">อีเมล</label>
            <input type="text" class="form-control" id="inputUseremail" placeholder="กรุณากรอกอีเมล">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">ขอรหัสผ่านใหม่</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>

      </div>
    </div>
  </div>
</div>


<!-- โมดัลสมัครสมาชิก -->
<form class="" action="savemember.php" method="post">


<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="registerModalLabel">สมัครสมาชิก</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="registerUsername" class="control-label">ชื่อผู้ใช้งาน</label><label style="color :red;">*</label>
            <input type="text" class="form-control" id="registerUserename" autofocus name="username" placeholder="กรุณากรอกชื่อผู้ใช้งาน" required>
          </div>
          <div class="form-group">
            <label for="registerPassword" class="control-label">รหัสผ่าน</label><label style="color :red;">*</label>
            <input type="password" class="form-control" id="registerPassword" name="password" placeholder="กรุณากรอกรหัสผ่าน" required>
          </div>
          <div class="form-group">
            <label for="registerName" class="control-label">ชื่อ</label><label style="color :red;">*</label>
            <input type="text" class="form-control" id="registerName" name="name" placeholder="กรุณากรอกชื่อ" required>
          </div>
          <div class="form-group">
            <label for="registerLastname" class="control-label">นามสกุล</label><label style="color :red;">*</label>
            <input type="text" class="form-control" id="registerLastname" name="surname" placeholder="กรุณากรอกนามสกุล" required>
          </div>

          <div class="form-group">
            <label for="registerName" class="control-label">อีเมล</label><label style="color :red;">*</label>
            <input type="email" class="form-control" id="registerName" name="email" placeholder="กรุณากรอกอีเมล" required>
          </div>
          <div class="form-group">
            <label for="registerETC" class="control-label">เฟซบุ๊ก</label>
            <input type="text" class="form-control" id="registerETC" name="facebook" placeholder="กรุณากรอกเฟซบุ๊ก">
          </div>
          <div class="form-group">
            <label for="registerETC" class="control-label">ทวิตเตอร์</label>
            <input type="text" class="form-control" id="registerETC" name="twitter" placeholder="กรุณากรอกทวิตเตอร">
          </div>
          <div class="form-group">
            <label for="registerETC" class="control-label">อินสตาแกรม</label>
            <input type="text" class="form-control" id="registerETC" name="instagram" placeholder="กรุณากรอกอินสตาแกรม">
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-md" type="submit">บันทึก</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>

      </div>
    </div>
  </div>
</div>

</form>





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
  </body>
</html>
