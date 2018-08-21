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

$memberid = $_GET['memberid'];

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

$banner_top = mysqli_query($con, "SELECT * FROM tblads_banner WHERE banner_type = 'top_banner' ");
$banner_fetch = mysqli_fetch_array($banner_top, MYSQLI_ASSOC);
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
    <link href="css/datepicker.css" rel="stylesheet" media="screen">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <title>Go! Travel.com</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-datepicker.css" rel="stylesheet">

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

<form action="editmemberinfosave.php" method="post">


<div class="container">




  <div class="col-md-4">
    <img src="img/<?php echo "$s_login_image" ?>" class="img-responsive center-block img-circle" style="margin-top : 10px; width:50%;border-radius:22px">

    <br>
    <div class="text-center">
      <label><?php echo "$s_login_username" ?></label>  <label><?php echo "$s_login_surname" ?></label>
    </div>
    <br>


    <div class="list-group visible-lg">
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

    <!--<div class="input-group">
      <span class="input-group-addon" id="basic-addon1">ชื่อผู้ใช้งาน</span>
      <input type="text" class="form-control" placeholder="<?php echo "$s_login_name" ?>" aria-describedby="basic-addon1" disabled>
    </div>
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">ชื่อ</span>
      <input type="text" class="form-control" placeholder="<?php echo "$s_login_username" ?>" aria-describedby="basic-addon1" disabled>
    </div> -->

    <?php

    while($memberinfo = mysqli_fetch_array($memberinfo_result)){
      # code...
    ?>
    <div class="col-md-8">
      <div class="page-header">
        <h1>แก้ไขข้อมูลส่วนตัว</h1>
      </div>
      <label class="control-label">ชื่อผู้ใช้งาน / Username</label>
      <input type="text" class="form-control" value="<?php echo "$s_login_name" ?>" disabled>
      <label class="control-label">รหัสผ่าน / Password</label>
      <input type="password" style="background-color : white;border:2px solid #99ff66;" name="pwd" class="form-control" value="<?php echo "$s_login_pwd" ?>">
      <label class="control-label">ชื่อ / Name</label>
      <input type="text" style="background-color : white;border:2px solid #99ff66;" name="name" class="form-control" value="<?php echo "$s_login_username" ?>">
      <label class="control-label">นามสกุล / Surname</label>
      <input type="text" style="background-color : white;border:2px solid #99ff66;" name="surname" class="form-control" value="<?php echo "$s_login_surname" ?>">
      <label class="control-label">เพศ / Gender</label>
      <select class="form-control" name="sex" style="background-color : white;border:2px solid #99ff66;">
        <option value="<?php echo "$s_login_sex" ?>" selected><?php echo "$s_login_sex" ?></option>
        <option value="ชาย">ชาย / Male</option>
        <option value="หญิง">หญิง / Female</option>
        <option value="อื่น ๆ">อื่น ๆ / Etc.</option>
      </select>
      <label class="control-label">วันเกิด / Birthday</label> <br>
      <div class="input-group date">
          <input type="text" class="form-control" name="bdate" data-provide="datepicker" data-date-language="th-th" value="<?php echo "$s_login_bdate" ?>">
          <div class="input-group-addon">
              <span class="glyphicon glyphicon-th"></span>
          </div>
      </div>
      <label class="control-label">ที่อยู่ / Address</label>
      <input type="text" style="background-color : white;border:2px solid #99ff66;" name="address" class="form-control" value="<?php echo "$s_login_address" ?>">
      <label class="control-label">จังหวัด / Province</label>
      <select class="form-control" name="province" style="background-color : white;border:2px solid #99ff66;">
          <option value="<?php echo "$s_login_province" ?>" selected><?php echo "$s_login_province" ?></option>
          <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
          <option value="กระบี่">กระบี่ </option>
          <option value="กาญจนบุรี">กาญจนบุรี </option>
          <option value="กาฬสินธุ์">กาฬสินธุ์ </option>
          <option value="กำแพงเพชร">กำแพงเพชร </option>
          <option value="ขอนแก่น">ขอนแก่น</option>
          <option value="จันทบุรี">จันทบุรี</option>
          <option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
          <option value="ชัยนาท">ชัยนาท </option>
          <option value="ชัยภูมิ">ชัยภูมิ </option>
          <option value="ชุมพร">ชุมพร </option>
          <option value="ชลบุรี">ชลบุรี </option>
          <option value="เชียงใหม่">เชียงใหม่ </option>
          <option value="เชียงราย">เชียงราย </option>
          <option value="ตรัง">ตรัง </option>
          <option value="ตราด">ตราด </option>
          <option value="ตาก">ตาก </option>
          <option value="นครนายก">นครนายก </option>
          <option value="นครปฐม">นครปฐม </option>
          <option value="นครพนม">นครพนม </option>
          <option value="นครราชสีมา">นครราชสีมา </option>
          <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
          <option value="นครสวรรค์">นครสวรรค์ </option>
          <option value="นราธิวาส">นราธิวาส </option>
          <option value="น่าน">น่าน </option>
          <option value="นนทบุรี">นนทบุรี </option>
          <option value="บึงกาฬ">บึงกาฬ</option>
          <option value="บุรีรัมย์">บุรีรัมย์</option>
          <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
          <option value="ปทุมธานี">ปทุมธานี </option>
          <option value="ปราจีนบุรี">ปราจีนบุรี </option>
          <option value="ปัตตานี">ปัตตานี </option>
          <option value="พะเยา">พะเยา </option>
          <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
          <option value="พังงา">พังงา </option>
          <option value="พิจิตร">พิจิตร </option>
          <option value="พิษณุโลก">พิษณุโลก </option>
          <option value="เพชรบุรี">เพชรบุรี </option>
          <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
          <option value="แพร่">แพร่ </option>
          <option value="พัทลุง">พัทลุง </option>
          <option value="ภูเก็ต">ภูเก็ต </option>
          <option value="มหาสารคาม">มหาสารคาม </option>
          <option value="มุกดาหาร">มุกดาหาร </option>
          <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
          <option value="ยโสธร">ยโสธร </option>
          <option value="ยะลา">ยะลา </option>
          <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
          <option value="ระนอง">ระนอง </option>
          <option value="ระยอง">ระยอง </option>
          <option value="ราชบุรี">ราชบุรี</option>
          <option value="ลพบุรี">ลพบุรี </option>
          <option value="ลำปาง">ลำปาง </option>
          <option value="ลำพูน">ลำพูน </option>
          <option value="เลย">เลย </option>
          <option value="ศรีสะเกษ">ศรีสะเกษ</option>
          <option value="สกลนคร">สกลนคร</option>
          <option value="สงขลา">สงขลา </option>
          <option value="สมุทรสาคร">สมุทรสาคร </option>
          <option value="สมุทรปราการ">สมุทรปราการ </option>
          <option value="สมุทรสงคราม">สมุทรสงคราม </option>
          <option value="สระแก้ว">สระแก้ว </option>
          <option value="สระบุรี">สระบุรี </option>
          <option value="สิงห์บุรี">สิงห์บุรี </option>
          <option value="สุโขทัย">สุโขทัย </option>
          <option value="สุพรรณบุรี">สุพรรณบุรี </option>
          <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
          <option value="สุรินทร์">สุรินทร์ </option>
          <option value="สตูล">สตูล </option>
          <option value="หนองคาย">หนองคาย </option>
          <option value="หนองบัวลำภู">หนองบัวลำภู </option>
          <option value="อำนาจเจริญ">อำนาจเจริญ </option>
          <option value="อุดรธานี">อุดรธานี </option>
          <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
          <option value="อุทัยธานี">อุทัยธานี </option>
          <option value="อุบลราชธานี">อุบลราชธานี</option>
          <option value="อ่างทอง">อ่างทอง </option>
          <option value="อื่นๆ">อื่นๆ</option>
      </select>
      <label class="control-label">รหัสไปรษณีย์ / Postcode</label>
      <input type="text" style="background-color : white;border:2px solid #99ff66;" name="postcode" class="form-control" value="<?php echo "$s_login_postcode" ?>">
      <label class="control-label">อีเมล / Email</label>
      <input type="email" style="background-color : white;border:2px solid #99ff66;" name="email" class="form-control" value="<?php echo "$s_login_email" ?>">
      <label class="control-label">เฟซบุ๊ก / Facebook</label>
      <input type="text" style="background-color : white;border:2px solid #99ff66;" name="facebook" class="form-control" value="<?php echo "$s_login_fb" ?>">
      <label class="control-label">ทวิตเตอร์ / Twitter</label>
      <input type="text" style="background-color : white;border:2px solid #99ff66;" name="twitter" class="form-control" value="<?php echo "$s_login_tw" ?>">
      <label class="control-label">อินสตาแกรม / Instagram</label>
      <input type="text" style="background-color : white;border:2px solid #99ff66;" name="instagram" class="form-control" value="<?php echo "$s_login_ig" ?>">

      <!--
      <div class="input-group input-group-lg" style="margin-top : 5px;">
        <span class="input-group-addon" id="sizing-addon1">ชื่อผู้ใช้งาน</span>
        <input style="background-color : white;" type="text" class="form-control text-right" value="<?php echo "$s_login_name" ?>" aria-describedby="sizing-addon1" disabled>
      </div>

      <div class="input-group input-group-lg" style="margin-top : 5px;">
        <span class="input-group-addon" id="sizing-addon1" style="background-color : #99ff66;">ชื่อ</span>
        <input style="background-color : white;border:2px solid #99ff66;" type="text" class="form-control text-right" name="name" value="<?php echo "$s_login_username" ?>" aria-describedby="sizing-addon1">
      </div>
      <div class="input-group input-group-lg" style="margin-top : 5px;">
        <span class="input-group-addon" id="sizing-addon1" style="background-color : #99ff66;">นามสกุล</span>
        <input style="background-color : white;border:2px solid #99ff66;" type="text" class="form-control text-right" name="surname" value="<?php echo "$s_login_surname" ?>" aria-describedby="sizing-addon1">
      </div>
      <div class="input-group input-group-lg" style="margin-top : 5px;">
        <span class="input-group-addon" id="sizing-addon1" style="background-color : #99ff66;">อีเมล</span>
        <input style="background-color : white;border:2px solid #99ff66;" type="text" class="form-control text-right" name="email" value="<?php echo "$s_login_email" ?>" aria-describedby="sizing-addon1" >
      </div>
      <div class="input-group input-group-lg" style="margin-top : 5px;">
        <span class="input-group-addon" id="sizing-addon1" style="background-color : #99ff66;">เฟซบุ๊ก</span>
        <input style="background-color : white;border:2px solid #99ff66;" type="text" class="form-control text-right" name="facebook" value="<?php echo "$s_login_fb" ?>" aria-describedby="sizing-addon1" >
      </div>
      <div class="input-group input-group-lg" style="margin-top : 5px;">
        <span class="input-group-addon" id="sizing-addon1" style="background-color : #99ff66;">ทวิตเตอร์</span>
        <input style="background-color : white;border:2px solid #99ff66;" type="text" class="form-control text-right" name="twitter" value="<?php echo "$s_login_tw" ?>" aria-describedby="sizing-addon1" >
      </div>
      <div class="input-group input-group-lg" style="margin-top : 5px;">
        <span class="input-group-addon" id="sizing-addon1" style="background-color : #99ff66;">อินสตาแกรม</span>
        <input style="background-color : white;border:2px solid #99ff66;" type="text" class="form-control text-right" name="instagram" value="<?php echo "$s_login_ig" ?>" aria-describedby="sizing-addon1" >
      </div>
    -->
      <br>
      <div class="text-right">
        <button class="btn btn-success btn-md" type="submit">บันทึก</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="history.go(-1)">ยกเลิก</button>
      </div>
    </div>
    <?php

    }
     ?>





</form>

















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
    <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
    <!-- thai extension -->
    <script type="text/javascript" src="js/bootstrap-datepicker-thai.js"></script>
    <script type="text/javascript" src="js/locales/bootstrap-datepicker.th.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="jsjquery-3.2.1.min.js"></script>
  </body>
</html>
