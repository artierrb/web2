<!DOCTYPE html>
<?php



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
                                                         GROUP BY tblvote_comment.location_id ORDER BY SUM(rating_score) DESC limit 10");

//$sumsum = mysqli_query($con, "SELECT tbllocation.*, tbllocation_image.*, tblvote_comment.*, SUM(rating_score) FROM tbllocation
//                                                        INNER JOIN tbllocation_image ON tbllocation.location_id=tbllocation_image.location_id
//                                                         INNER JOIN tblvote_comment ON tbllocation.location_id=tblvote_comment.location_id GROUP BY location_id");

//$sumscore = mysqli_query($con, "SELECT * FROM tbllocation INNER JOIN tbllocation_image ON tbllocation.location_id=tbllocation_image.location_id
//                                                         INNER JOIN tblvote_comment ON tbllocation.location_id=tblvote_comment.location_id GROUP BY rating_score DESC limit 10");



$randomlocation = mysqli_query($con, "SELECT * FROM tbllocation INNER JOIN tbllocation_image ON tbllocation.location_id=tbllocation_image.location_id ORDER BY rand() limit 4");


$banner_top = mysqli_query($con, "SELECT * FROM tblads_banner WHERE banner_type = 'top_banner' ");
$banner_fetch = mysqli_fetch_array($banner_top, MYSQLI_ASSOC);


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
    <link rel="stylesheet" href="bootstrap-datepicker-thai-thai/css/datepicker.css">
    <link rel="stylesheet" href="bootstrap-datepicker-thai-thai/css/bootstrap.css">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <script src="js/bootstrap-datepicker.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.js"></script>
    <script src="js/inputmask.js"></script>
    <script src="js/jquery.inputmask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>



    <title>Go! Travel.com</title>

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

      function check_username(){
        $("#username_error_msg").hide();
        var error_username = false;
        var username = document.getElementById('username').value;
        var username_length = $("#username").val().length;
          if(username=="" || username_length < 4 || username.search(/[^a-zA-Z0-9]/) !==-1){
            $("#username_error_msg").html("ชื่อผู้ใช้งานต้องเป็นภาษาอังกฤษหรือตัวเลขอย่างน้อย 4 ตัวอักษร");
            $("#username_error_msg").show();
  			    error_username = true;
          }else {
      			$("#username_error_msg").hide();
  		      }
      }
      function check_password(){
        $("#password_error_msg").hide();
        var error_password = false;
        var password = document.getElementById('password').value;
        var password_length = $("#password").val().length;
          if(password=="" || password_length < 4 || password.search(/[^a-zA-Z0-9]/) !==-1){
            $("#password_error_msg").html("รหัสผ่านต้องเป็นภาษาอังกฤษหรือตัวเลขอย่างน้อย 4 ตัวอักษร");
            $("#password_error_msg").show();
  			    error_password = true;
          }else {
      			$("#password_error_msg").hide();
  		      }
      }
      function check_confirmpassword(){
        $("#confirmpassword_error_msg").hide();
        var error_confirmpassword = false;
        var password = $("#password").val();
        var confirmpassword = $("#confirmpassword").val();
          if (password != confirmpassword) {
            $("#confirmpassword_error_msg").html("รหัสผ่านของคุณไม่ตรงกัน");
            $("#confirmpassword_error_msg").show();
            error_confirmpassword = true;
          }else {
      			$("#confirmpassword_error_msg").hide();
  		      }
      }
      function check_name(){
        $("#name_error_msg").hide();
        var error_name = false;
        var name = document.getElementById('name').value;
        var name_length = $("#name").val().length;
          if(name=="" || name_length < 2){
            $("#name_error_msg").html("ชื่อต้องมีความยาวอ่างน้อย 2 ตัวอักษร");
            $("#name_error_msg").show();
  			    error_name = true;
          }else {
      			$("#name_error_msg").hide();
  		      }
      }
      function check_surname(){
        $("#surname_error_msg").hide();
        var error_surname = false;
        var surname = document.getElementById('surname').value;
        var surname_length = $("#surname").val().length;
          if(surname=="" || surname_length < 2){
            $("#surname_error_msg").html("นามสกุลต้องมีความยาวอ่างน้อย 2 ตัวอักษร");
            $("#surname_error_msg").show();
  			    error_surname = true;
          }else {
      			$("#surname_error_msg").hide();
  		      }
      }
      function check_postcode(){
        $("#postcode_error_msg").hide();
        var error_postcode = false;
        var postcode = document.getElementById('postcode').value;
        var postcode_length = $("#postcode").val().length;
          if(postcode_length < 5 || password.search(/[^0-9]/) !==-1){
            $("#postcode_error_msg").html("รหัสไปรษณีย์ต้องเป็นตัวเลขเท่านั้นและมีความยาวเท่ากับ 5 ตัว");
            $("#postcode_error_msg").show();
  			    error_postcode = true;
          }else {
      			$("#postcode_error_msg").hide();
  		      }
      }
      function check_email(){
        $("#email_error_msg").hide();
        var error_email = false;
        var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);

          if(pattern.test($("#email").val())){

            $("#email_error_msg").hide();

          }else {
            $("#email_error_msg").html("รูปแบบอีเมลไม่ถูกต้อง");
            $("#email_error_msg").show();
            error_email = true;
  		      }
      }
      function check_facebook(){
        $("#facebook_error_msg").hide();
        var error_facebook = false;
        var urlFB = /^(?:([A-Za-z]+):)?(\/{0,3})([0-9.\-A-Za-z]+)(?::(\d+))?(?:\/([^?#]*))?(?:\?([^#]*))?(?:#(.*))?$/;


          if(urlFB.test($("#facebook").val())){

            $("#facebook_error_msg").hide();

          }else {

            $("#facebook_error_msg").html("รูปแบบ URL ไม่ถูกต้อง");
            $("#facebook_error_msg").show();
            error_facebook = true;
  		      }
      }
      function check_twitter(){
        $("#twitter_error_msg").hide();
        var error_twitter = false;
        var urlTW = /^(?:([A-Za-z]+):)?(\/{0,3})([0-9.\-A-Za-z]+)(?::(\d+))?(?:\/([^?#]*))?(?:\?([^#]*))?(?:#(.*))?$/;

          if(urlTW.test($("#twitter").val())){

            $("#twitter_error_msg").hide();

          }else {
            $("#twitter_error_msg").html("รูปแบบ URL ไม่ถูกต้อง");
            $("#twitter_error_msg").show();
            error_twitter = true;
  		      }
      }
      function check_instagram(){
        $("#instagram_error_msg").hide();
        var error_instagram = false;
        var urlIG = /^(?:([A-Za-z]+):)?(\/{0,3})([0-9.\-A-Za-z]+)(?::(\d+))?(?:\/([^?#]*))?(?:\?([^#]*))?(?:#(.*))?$/;

          if(urlIG.test($("#instagram").val())){

            $("#instagram_error_msg").hide();

          }else {
            $("#instagram_error_msg").html("รูปแบบ URL ไม่ถูกต้อง");
            $("#instagram_error_msg").show();
            error_instagram = true;
  		      }
      }
      function check_loginusername(){
        $("#loginusername_error_msg").hide();
        var error_loginusername = false;
        var loginusername = document.getElementById('loginusername').value;
        var loginusername_length = $("#loginusername").val().length;
          if(loginusername=="" || loginusername_length < 4 || loginusername.search(/[^a-zA-Z0-9]/) !==-1){
            $("#loginusername_error_msg").html("ชื่อผู้ใช้งานต้องเป็นภาษาอังกฤษหรือตัวเลขอย่างน้อย 4 ตัว");
            $("#loginusername_error_msg").show();
            error_loginusername = true;
          }else {
            $("#loginusername_error_msg").hide();
            }
      }
      function check_loginpassword(){
        $("#loginpassword_error_msg").hide();
        var error_loginpassword = false;
        var loginpassword = document.getElementById('loginpassword').value;
        var loginpassword_length = $("#loginpassword").val().length;
          if(loginpassword=="" || loginpassword_length < 4 || loginpassword.search(/[^a-zA-Z0-9]/) !==-1){
            $("#loginpassword_error_msg").html("รหัสผ่านต้องเป็นภาษาอังกฤษหรือตัวเลขอย่างน้อย 4 ตัว");
            $("#loginpassword_error_msg").show();
            error_loginpassword = true;
          }else {
            $("#loginpassword_error_msg").hide();
            }
      }
    </script>
    <script>
      $(document).ready(function($){
        $('#postcode').mask("99 99 99", {placeholder:"xx xx xx"});
      });
    </script>
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
          <a class="navbar-brand" href="index.php">หน้าหลัก</a>
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

    <div class="container">
      <div class="page-header">
        <h1>สมัครสมาชิก / Register</h1>
      </div>
      <div class="col-md-6">
        <form class="register" action="savemember.php" method="post">
        <label class="control-label">ชื่อผู้ใช้งาน / Username</label><label style="color :red;">*</label><br><span class="error_form" id="username_error_msg" style="color :red;font-size: 15px;"></span>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">
              <i class="fas fa-user" aria-hidden="true"></i>
            </span>
            <input type="text" onfocusout="return check_username()" class="form-control" autofocus name="username" id="username" placeholder="ความยาวอย่างน้อย 4 ตัวอักษรห้ามมีอักขระพิเศษเป็นภาษาอังกฤษและตัวเลขเท่านั้น" pattern="[A-Za-z0-9]{4,20}" minlength="4" maxlength="20" title="ชื่อผู้ใช้งานต้องเป็นภาษาอังกฤษตัวพิมพ์ใหญ่-เล็กหรือตัวเลข ความยาวอย่างน้อย 4 และไม่เกิน 20" required>
          </div>
        </div>
        <label class="control-label">รหัสผ่าน / Password</label><label style="color :red;">*</label><br><span class="error_form" id="password_error_msg" style="color :red;font-size: 15px;"></span>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">
              <i class="fas fa-key" aria-hidden="true"></i>
            </span>
            <input type="password" onfocusout="return check_password()" class="form-control" name="password" id="password" placeholder="ความยาวอย่างน้อย 4 ตัวอักษรห้ามมีอักขระพิเศษเป็นภาษาอังกฤษและตัวเลขเท่านั้น" pattern="[A-Za-z0-9]{4,20}" minlength="4" maxlength="20" title="รหัสผ่านต้องเป็นภาษาอังกฤษตัวพิมพ์ใหญ่-เล็กหรือตัวเลข ความยาวอย่างน้อย 4 และไม่เกิน 20" required>
          </div>
        </div>
        <label class="control-label">ยืนยันรหัสผ่าน / Confirm Password</label><label style="color :red;">*</label><br><span class="error_form" id="confirmpassword_error_msg" style="color :red;font-size: 15px;"></span>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">
              <i class="fas fa-key" aria-hidden="true"></i>
            </span>
            <input type="password" onfocusout="return check_confirmpassword()" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="ความยาวอย่างน้อย 4 ตัวอักษรห้ามมีอักขระพิเศษเป็นภาษาอังกฤษและตัวเลขเท่านั้น" pattern="[A-Za-z0-9]{4,20}" minlength="4" maxlength="20" title="รหัสผ่านต้องเป็นภาษาอังกฤษตัวพิมพ์ใหญ่-เล็กหรือตัวเลข ความยาวอย่างน้อย 4 และไม่เกิน 20" required>
          </div>
        </div>
        <label class="control-label">ชื่อ / Name</label><label style="color :red;">*</label><br><span class="error_form" id="name_error_msg" style="color :red;font-size: 15px;"></span>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">
              <i class="fas fa-user" aria-hidden="true"></i>
            </span>
            <input type="text" onfocusout="return check_name()" class="form-control" name="name" id="name" placeholder="ชื่อความยาวอย่างน้อย 2 ตัวอักษร" title="ชื่อความยาวอย่างน้อย 2 ตัวอักษร" minlength="2" required>
          </div>
        </div>
        <label class="control-label">นามสกุล / Surname</label><label style="color :red;">*</label><br><span class="error_form" id="surname_error_msg" style="color :red;font-size: 15px;"></span>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">
              <i class="fas fa-user" aria-hidden="true"></i>
            </span>
            <input type="text" onfocusout="return check_surname()" class="form-control" name="surname" id="surname" placeholder="นามสกุลความยาวอย่างน้อย 2 ตัวอักษร" title="นามสกุลความยาวอย่างน้อย 2 ตัวอักษร" minlength="2" required>
          </div>
        </div>
        <label class="control-label">เพศ / Gender</label><label style="color :red;">*</label>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">
              <i class="fas fa-transgender" aria-hidden="true"></i>
            </span>
            <select class="form-control" name="sex" required>
              <option value="" selected>เลือกเพศ</option>
              <option value="ชาย">ชาย / Male</option>
              <option value="หญิง">หญิง / Female</option>
            </select>
          </div>
        </div>

        <label class="control-label">วันเกิด (วัน/เดือน/ปี) / Birthday (DD/MM/YYYY)</label>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">
              <i class="fas fa-calendar-alt" aria-hidden="true"></i>
            </span>
            <input type="text" class="form-control datepicker" name="bdate" data-provide="datepicker" data-date-language="th-th" placeholder="กรุณาเลือกวันเดือนปีเกิดจากปฏิทิน">
          </div>
        </div>
        <!--<div class="input-group">
            <input type="text" class="form-control datepicker" name="bdate" data-provide="datepicker" data-date-language="th-th" placeholder="กรุณาเลือกวันเดือนปีเกิดจากปฏิทิน">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
        </div>-->



        <!--
        <div class="col-sm-4">

          <select class="form-control" name="bdate">
            <option value="" selected>เลือกวันเกิด</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
          </select>
        </div>
        <div class="col-sm-4">
          <select class="form-control" name="mdate">
            <option value="" selected>เลือกเดือนเกิด</option>
            <option value="มกราคม">มกราคม</option>
            <option value="กุมภาพันธ์">กุมภาพันธ์</option>
            <option value="มีนาคม">มีนาคม</option>
            <option value="เมษายน">เมษายน</option>
            <option value="พฤษภาคม">พฤษภาคม</option>
            <option value="มิถุนายน">มิถุนายน</option>
            <option value="กรกฎาคม">กรกฎาคม</option>
            <option value="สิงหาคม">สิงหาคม</option>
            <option value="กันยายน">กันยายน</option>
            <option value="ตุลาคม">ตุลาคม</option>
            <option value="พฤศจิกายน">พฤศจิกายน</option>
            <option value="ธันวาคม">ธันวาคม</option>
          </select>
        </div>
        <div class="col-sm-4">
          <select class="form-control" name="ydate">
            <option value="" selected>เลือกปีเกิด</option>
            <option value="2530">2530</option>
            <option value="2531">2531</option>
            <option value="2532">2532</option>
            <option value="2533">2533</option>
            <option value="2534">2534</option>
            <option value="2535">2535</option>
            <option value="2536">2536</option>
            <option value="2537">2537</option>
            <option value="2538">2538</option>
            <option value="2539">2539</option>
            <option value="2540">2540</option>
            <option value="2541">2541</option>
            <option value="2542">2542</option>
            <option value="2543">2543</option>
            <option value="2544">2544</option>
            <option value="2545">2545</option>
            <option value="2546">2546</option>
            <option value="2547">2547</option>
            <option value="2548">2548</option>
            <option value="2549">2549</option>
            <option value="2550">2550</option>
            <option value="2551">2551</option>
            <option value="2552">2552</option>
            <option value="2553">2553</option>
            <option value="2554">2554</option>
            <option value="2555">2555</option>
            <option value="2556">2556</option>
            <option value="2557">2557</option>
            <option value="2558">2558</option>
            <option value="2559">2559</option>
            <option value="2560">2560</option>
            <option value="2561">2561</option>
          </select>
        </div>
        -->
        <label class="control-label">ที่อยู่ / Address</label>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">
              <i class="fas fa-address-card" aria-hidden="true"></i>
            </span>
            <input type="text" class="form-control" name="address" placeholder="กรุณากรอกที่อยู่">
          </div>
        </div>
        <label class="control-label">จังหวัด / Province</label>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">
              <i class="fas fa-map-marker" aria-hidden="true"></i>
            </span>
            <select class="form-control" name="province">
                <option value="" selected>เลือกจังหวัด</option>
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
          </div>
        </div>
        <label class="control-label">รหัสไปรษณีย์ / Postcode</label><label style="color :red;">*</label><br><span class="error_form" id="postcode_error_msg" style="color :red;font-size: 15px;"></span>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">
              <i class="fas fa-barcode" aria-hidden="true"></i>
            </span>
            <input class="form-control" onfocusout="return check_postcode()" type="text" name="postcode" id="postcode" pattern="[0-9]{5,5}" minlength="5" maxlength="5" placeholder="มีความยาวเท่ากับ 5 ตัวอักษรและต้องเป็นตัวเลขเท่านั้น ตัวอย่าง 11111" required>
          </div>
        </div>
        <label class="control-label">อีเมล / Email</label><label style="color :red;">*</label><br><span class="error_form" id="email_error_msg" style="color :red;font-size: 15px;"></span>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">
              <i class="fas fa-at" aria-hidden="true"></i>
            </span>
            <input type="email" onfocusout="return check_email()" class="form-control" name="email" id="email" placeholder="กรุณากรอกอีเมล ตัวอย่าง examples@email.com" required>
          </div>
        </div>
        <label class="control-label">เฟซบุ๊ก / Facebook</label><br><span class="error_form" id="facebook_error_msg" style="color :red;font-size: 15px;"></span>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">
              <i class="fab fa-facebook-square" aria-hidden="true"></i>
            </span>
            <input type="url" oninput="return check_facebook()" class="form-control" name="facebook" id="facebook" placeholder="กรุณากรอกเฟซบุ๊ก ตัวอย่าง https://www.facebook.com/examples">
          </div>
        </div>
        <label class="control-label">ทวิตเตอร์ / Twitter</label><br><span class="error_form" id="twitter_error_msg" style="color :red;font-size: 15px;"></span>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">
              <i class="fab fa-twitter-square" aria-hidden="true"></i>
            </span>
            <input type="url" oninput="return check_twitter()" class="form-control" name="twitter" id="twitter" placeholder="กรุณากรอกทวิตเตอร์ ตัวอย่าง https://twitter.com/examples">
          </div>
        </div>
        <label class="control-label">อินสตาแกรม / Instagram</label><br><span class="error_form" id="instagram_error_msg" style="color :red;font-size: 15px;"></span>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">
              <i class="fab fa-instagram" aria-hidden="true"></i>
            </span>
            <input type="url" oninput="return check_instagram()" class="form-control" name="instagram" id="instagram" placeholder="กรุณากรอกอินสตาแกรม ตัวอย่าง https://www.instagram.com/examples/">
          </div>
        </div>

        <div class="text-center">

        <br>
        <button class="btn btn-warning btn-md" type="submit" value="check password">บันทึก</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="history.go(-1)">ยกเลิก</button>

        </div>
        </form>
      </div>



      <div class="col-md-6">
        <div class="text-center">
          <label style="margin-top:10px;">เป็นสมาชิกแล้วใชไหม? / Login Here</label>
        </div>
        <br>
        <form action="login.php" method="post" name="formlogin">
        <div class="form-group">
          <label for="inputUsername" class="control-label" >ชื่อผู้ใช้งาน / Username</label><br><span class="error_form" id="loginusername_error_msg" style="color :red;font-size: 15px;"></span>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fas fa-user" aria-hidden="true"></i>
              </span>
              <input type="text" class="form-control" onfocusout="return check_loginusername()" id="loginusername" name="username" autofocus pattern="{4,20}" minlength="4" maxlength="20" title="กรุณากรอกชื่อผู้ใช้ความยาวอย่างน้อย 4 และไม่เกิน 20" placeholder="กรุณากรอกชื่อผู้ใช้ความยาวอย่างน้อย 4 และไม่เกิน 20" oninvalid="this.setCustomValidity('กรุณากรอกชื่อผู้ใช้งานความยาวอย่างน้อย 4')" oninput="setCustomValidity('')" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword" class="control-label">รหัสผ่าน / Password</label><br><span class="error_form" id="loginpassword_error_msg" style="color :red;font-size: 15px;"></span>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fas fa-key" aria-hidden="true"></i>
              </span>
              <input type="password" class="form-control" onfocusout="return check_loginpassword()" id="loginpassword" name="password" pattern="{4,20}" minlength="4" maxlength="20" title="รหัสผ่านความยาวอย่างน้อย 4 และไม่เกิน 20" placeholder="กรุณากรอกรหัสผ่านความยาวอย่างน้อย 4 และไม่เกิน 20" oninvalid="this.setCustomValidity('กรุณากรอกรหัสผ่านความยาวอย่างน้อย 4')" oninput="setCustomValidity('')" required>
            </div>
          </div>
        </div>
        <div class="form-group text-center">
          <button class="btn btn-info btn-md" type="submit">เข้าสู่ระบบ</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="history.go(-1)">ยกเลิก</button>
        </div>
        </form>
        <!--<div class="text-center">
          <button type="button" class="btn btn-info btn-lg" onClick="window.location='memberloginform.php'">เข้าสู่ระบบ / Login</button>
        </div>
      -->
          <!--<img src="img/login.png" class="img-responsive center-block" style="margin-top : 10px;">-->

      </div>

    </div>

    <div class="page-header">

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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
    <!-- thai extension -->
    <script type="text/javascript" src="js/bootstrap-datepicker-thai.js"></script>
    <script type="text/javascript" src="js/locales/bootstrap-datepicker.th.js"></script>

  </body>
</html>
