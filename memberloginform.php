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
      .cmxform fieldset p label span.error { color: red; }
      form.cmxform { width: 30em; }
      form.cmxform label {
      	width: auto;
      	display: block;
      	float: none;
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
          $("#username_error_msg").html("ชื่อผู้ใช้งานต้องเป็นภาษาอังกฤษหรือตัวเลขอย่างน้อย 4 ตัว");
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
          $("#password_error_msg").html("รหัสผ่านต้องเป็นภาษาอังกฤษหรือตัวเลขอย่างน้อย 4 ตัว");
          $("#password_error_msg").show();
          error_password = true;
        }else {
          $("#password_error_msg").hide();
          }
    }

    </script>
    <script language="javascript">
    /*function fncSubmit()
    {
    	if(document.formlogin.username.value == "")
    	{
    		alert('กรุณากรอกชื่อผู้ใช้งาน');
    		document.formlogin.username.focus();
    		return false;
    	}
    	if(document.formlogin.password.value == "")
    	{
    		alert('กรุณากรอกรหัสผ่าน');
    		document.formlogin.password.focus();
    		return false;
    	}
    	document.formlogin.submit();
    }*/
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

        <h1>เข้าสู่ระบบ / Login</h1>
      </div>

      <div class="col-md-6">
        <form action="login.php" method="post" name="formlogin">
          <div class="form-group">
            <label for="inputUsername" class="control-label" >ชื่อผู้ใช้งาน / Username</label><br><span class="error_form" id="username_error_msg" style="color :red;font-size: 15px;"></span>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fas fa-user" aria-hidden="true"></i>
                </span>
                <input type="text" class="form-control" onfocusout="return check_username()" id="username" name="username" autofocus pattern="{4,20}" minlength="4" maxlength="20" title="กรุณากรอกชื่อผู้ใช้ความยาวอย่างน้อย 4 และไม่เกิน 20" placeholder="กรุณากรอกชื่อผู้ใช้ความยาวอย่างน้อย 4 และไม่เกิน 20" oninvalid="this.setCustomValidity('กรุณากรอกชื่อผู้ใช้งานความยาวอย่างน้อย 4')" oninput="setCustomValidity('')" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword" class="control-label">รหัสผ่าน / Password</label><br><span class="error_form" id="password_error_msg" style="color :red;font-size: 15px;"></span>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fas fa-key" aria-hidden="true"></i>
                </span>
                <input type="password" class="form-control" onfocusout="return check_password()" id="password" name="password" pattern="{4,20}" minlength="4" maxlength="20" title="รหัสผ่านความยาวอย่างน้อย 4 และไม่เกิน 20" placeholder="กรุณากรอกรหัสผ่านความยาวอย่างน้อย 4 และไม่เกิน 20" oninvalid="this.setCustomValidity('กรุณากรอกรหัสผ่านความยาวอย่างน้อย 4')" oninput="setCustomValidity('')" required>
              </div>
            </div>
          </div>
        <div class="form-group text-center">
          <button class="btn btn-info btn-md" type="submit">เข้าสู่ระบบ</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="history.go(-1)">ยกเลิก</button>
        </div>
        </form>
      </div>

      <div class="col-md-6">
        <div class="text-center">
          <label>ยังไม่ได้เป็นสมาชิกใช่หรือไม่? / Register Here</label>
        </div>
        <br>
        <div class="text-center">
          <button type="button" class="btn btn-warning btn-lg" onClick="window.location='registermember.php?img=member.jpg'">สมัครสมาชิก / Register</button>
        </div>
        <br>
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
    <script src="js/jquery-3.2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="build/bootstrap-rating-input.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="jsjquery-3.2.1.min.js"></script>
  </body>
</html>
