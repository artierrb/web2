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



$banner_top = mysqli_query($con, "SELECT * FROM tblads_banner WHERE banner_type = 'top_banner' ");
$banner_fetch = mysqli_fetch_array($banner_top, MYSQLI_ASSOC);


$result_showscore = mysqli_query($con, "SELECT tbllocation.*,tblvote_comment.* FROM tbllocation,tblvote_comment WHERE tbllocation.location_id AND tblvote_comment.location_id");
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
$row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
$rowshowscore = mysqli_fetch_array($result_showscore, MYSQLI_ASSOC);

if(isset($_POST['upload'])){
  $target = "img/".basename($_FILES['location_image_file']['name']);
  $image = $_FILES['location_image_file']['name'];
  $text = $_POST['location_image_info'];
  $sqlupload = "INSERT INTO tbllocation_image (location_id, location_image_file, location_image_info) VALUES ((SELECT location_id FROM tbllocation WHERE location_id = '$id'),'$target', '$text')";
  mysqli_query($con,$sqlupload);
}if(@move_uploaded_file($_FILES['location_image_file']['tmp_name'],'img/'.$_FILES['location_image_file']['name']))
  {

  };

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

    <link rel="stylesheet" href="jquery-timepicker-1.3.5/jquery.timepicker.min.css">
    <script src="jquery-timepicker-1.3.5/jquery.timepicker.min.js"></script>



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

<script>

function disableTxt() {
    document.getElementById("fee").disabled = true;
}
function undisableTxt() {
    document.getElementById("fee").disabled = false;
  }


  function filePreview(input){
    if(input.files && input.files[0]){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#uploadForm + img').remove();
        $('#uploadForm').after('<img src ="'+e.target.result+'" width="450" height="300"/>');
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $('$file').change(function(){
    filePreview(this);
  });

  $('.timepicker').timepicker({
    timeFormat: 'h:mm p',
    interval: 60,
    minTime: '00',
    maxTime: '23:00',
    defaultTime: '00',
    startTime: '00:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});

  /*function check_lo_name(){
    $("#lo_name_error_msg").hide();
    var error_lo_name = false;
    var lo_name = document.getElementById('lo_name').value;
    var lo_name_length = $("#lo_name").val().length;
      if(lo_name=="" || lo_name_length < 4 || username.search(/[^a-zA-Z0-9]/) !==-1){
        $("#lo_name_error_msg").html("ชื่อสถานที่ต้องมีความยาวอย่างน้อย 4 ตัวอักษร");
        $("#lo_name_error_msg").show();
        error_lo_name = true;
      }else {
        $("#lo_name_error_msg").hide();
        }
  }*/


  function check_latitude(){
        $("#latitude_error_msg").hide();
        var error_latitude = false;
        var latitude = document.getElementById('latitude').value;
        var latitude_length = $("#latitude").val().length;
          if(latitude_length < 0 || latitude.search(/[^0-9.+-]/) !==-1){
            $("#latitude_error_msg").html("ละติจูดต้องเป็นตัวเลข เครื่องหมาย - และ . เท่านั้น");
            $("#latitude_error_msg").show();
  			    error_latitude = true;
          }else {
      			$("#latitude_error_msg").hide();
  		      }
      }

  function check_longitude(){
        $("#longtitude_error_msg").hide();
        var error_longitude = false;
        var longitude = document.getElementById('longitude').value;
        var longitude_length = $("#longitude").val().length;
          if(longitude_length < 0 || longitude.search(/[^0-9.+-]/) !==-1){
            $("#longitude_error_msg").html("ลองจิจูดต้องเป็นตัวเลข เครื่องหมาย - และ . เท่านั้น");
            $("#longitude_error_msg").show();
      	    error_longitude = true;
          }else {
      			$("#longitude_error_msg").hide();
    	      }
      }
  function check_fee(){
        $("#fee_error_msg").hide();
        var error_fee = false;
        var fee = document.getElementById('fee').value;
        var fee_length = $("#fee").val().length;
          if(fee_length < 0 || fee.search(/[^0-9]/) !==-1){
            $("#fee_error_msg").html("ค่าธรรมเนียมต้องเป็นตัวเลขเท่านั้น");
            $("#fee_error_msg").show();
             error_fee = true;
          }else {
        		$("#fee_error_msg").hide();
          		  }
      }
  function check_productprice(){
        $("#productprice_error_msg").hide();
        var error_productprice = false;
        var productprice = document.getElementById('productprice').value;
        var productprice_length = $("#productprice").val().length;
          if(productprice_length < 0 || productprice.search(/[^0-9]/) !==-1){
            $("#productprice_error_msg").html("ราคาสินค้าต้องเป็นตัวเลขเท่านั้น");
            $("#productprice_error_msg").show();
              error_productprice = true;
          }else {
            $("#productprice_error_msg").hide();
          		  }
      }

  function check_serviceprice(){
        $("#productprice_error_msg").hide();
        var error_serviceprice = false;
        var serviceprice = document.getElementById('serviceprice').value;
        var serviceprice_length = $("#serviceprice").val().length;
          if(serviceprice_length < 0 || serviceprice.search(/[^0-9]/) !==-1){
            $("#serviceprice_error_msg").html("ราคาบริการต้องเป็นตัวเลขเท่านั้น");
            $("#serviceprice_error_msg").show();
              error_serviceprice = true;
          }else {
            $("#serviceprice_error_msg").hide();
                }
      }
  function check_resttell(){
        $("#resttell_error_msg").hide();
        var error_resttell = false;
        var resttell = document.getElementById('resttell').value;
        var resttell_length = $("#resttell").val().length;
          if(resttell_length < 0 || resttell.search(/[^0-9]/) !==-1){
            $("#resttell_error_msg").html("เบอร์โทรศัพท์ต้องเป็นตัวเลขเท่านั้น");
            $("#resttell_error_msg").show();
          	  error_resttell = true;
          }else {
        		$("#resttell_error_msg").hide();
        	    }
      }
  function check_restweb(){
    $("#restweb_error_msg").hide();
    var error_restweb = false;
    var urlTW = /^(?:([A-Za-z]+):)?(\/{0,3})([0-9.\-A-Za-z]+)(?::(\d+))?(?:\/([^?#]*))?(?:\?([^#]*))?(?:#(.*))?$/;

      if(urlTW.test($("#restweb").val())){

        $("#restweb_error_msg").hide();

      }else {
        $("#restweb_error_msg").html("รูปแบบ URL ไม่ถูกต้อง");
        $("#restweb_error_msg").show();
        error_restweb = true;
  		    }
  }
  function check_lodgetell(){
        $("#lodgetell_error_msg").hide();
        var error_lodgetell = false;
        var lodgetell = document.getElementById('lodgetell').value;
        var lodgetell_length = $("#lodgetell").val().length;
          if(lodgetell_length < 0 || lodgetell.search(/[^0-9]/) !==-1){
            $("#lodgetell_error_msg").html("เบอร์โทรศัพท์ต้องเป็นตัวเลขเท่านั้น");
            $("#lodgetell_error_msg").show();
          	  error_lodgetell = true;
          }else {
        		$("#lodgetell_error_msg").hide();
        	    }
      }
  function check_lodgeprice(){
        $("#lodgeprice_error_msg").hide();
        var error_lodgeprice = false;
        var lodgeprice = document.getElementById('lodgeprice').value;
        var lodgeprice_length = $("#lodgeprice").val().length;
          if(lodgeprice_length < 0 || lodgeprice.search(/[^0-9]/) !==-1){
            $("#lodgeprice_error_msg").html("ราคาที่พักต้องเป็นตัวเลขเท่านั้น");
            $("#lodgeprice_error_msg").show();
              error_lodgeprice = true;
          }else {
            $("#lodgeprice_error_msg").hide();
                }
      }
  function check_lodgeweb(){
    $("#lodgeweb_error_msg").hide();
    var error_lodgeweb = false;
    var urlTW = /^(?:([A-Za-z]+):)?(\/{0,3})([0-9.\-A-Za-z]+)(?::(\d+))?(?:\/([^?#]*))?(?:\?([^#]*))?(?:#(.*))?$/;

      if(urlTW.test($("#lodgeweb").val())){

        $("#lodgeweb_error_msg").hide();

      }else {
        $("#lodgeweb_error_msg").html("รูปแบบ URL ไม่ถูกต้อง");
        $("#lodgeweb_error_msg").show();
        error_restweb = true;
            }
    }



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
</div>


<div class="container">

  <div class="col-lg-4">
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
      <li class="active"><a href="addlocation.php" style="color :black;background-color: #b7ff70;">เพิ่มบทความ</a></li>
      <li><a href="locationmemberinfo.php" style="color :black;background-color: #70ffe0;">จัดการข้อมูลบทความ</a></li>
      <li><a href="memberinfo.php" style="color :black;background-color: #ffee70;">จัดการข้อมูลส่วนตัว</a></li>
      <li><a href="logout.php" style="color :black;background-color: #ff8570;">ออกจากระบบ</a></li>

    </ul>
    </div>
    </div>
  </div>


  <div class="col-lg-8">

    <form class="" action="upload.php" method="post" enctype="multipart/form-data">
      <div class="page-header">
        <h1>เพิ่มบทความ</h1>
      </div>
      <ul class="nav nav-tabs visible-lg" >
        <li class="active"><a data-toggle="tab" href="#menu0" style="color:black;background-color: #ffcccc;"><i class="fas fa-plane" aria-hidden="true"></i> สถานที่</a></li>
        <li><a data-toggle="tab" href="#menu1" style="color:black;background-color: #fff0b3;"><i class="fas fa-gift"></i> สินค้า</a></li>
        <li><a data-toggle="tab" href="#menu2" style="color:black;background-color: #b7ff70;"><i class="far fa-smile"></i> บริการ</a></li>
        <li><a data-toggle="tab" href="#menu3" style="color:black;background-color: #99ffff;"><i class="fas fa-utensils"></i> ร้านอาหาร</a></li>
        <li><a data-toggle="tab" href="#menu4" style="color:black;background-color: #d1b3ff;"><i class="fas fa-home"></i> ที่พัก</a></li>
        <li><a data-toggle="tab" href="#menu5" style="color:black;background-color: #ffb3ff;"><i class="fab fa-fort-awesome"></i> เทศกาล</a></li>
      </ul>
      <div class="visible-xs">
            <button type="button" class="btn btn-info btn-lg btn-block" data-toggle="collapse" data-target="#infoaddlo">เพิ่มบทความ</button>
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

      <div class="collapse navbar-collapse" id="infoaddlo">

      <ul class="nav navbar-nav" style="color :black;">
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
          <div class="form-group">
          <label for="usr">ชื่อสถานที่:</label> <span class="error_form" id="lo_name_error_msg" style="color :red;font-size: 15px;"></span>
          <input type="text" onfocusout="return check_lo_name()" class="form-control" id="lo_name" name="name" minlength="4" maxlength="120" placeholder="ชื่อสถานที่ความยาวไม่เกิน 120 ตัวอักษร">



            <label>ประเภท</label>
            <select class="form-control" id="location_type" name="type">
              <option value="การท่องเที่ยวเชิงนิเวศ">การท่องเที่ยวเชิงนิเวศ</option>
              <option value="การท่องเที่ยวเชิงศิลปะวิทยาการ">การท่องเที่ยวเชิงศิลปะวิทยาการ</option>
              <option value="การท่องเที่ยวเชิงประวัติศาสตร์">การท่องเที่ยวเชิงประวัติศาสตร์</option>
              <option value="การท่องเที่ยวเชิงธรรมชาติ">การท่องเที่ยวเชิงธรรมชาติ</option>
              <option value="การท่องเที่ยวเชิงนันทนาการ">การท่องเที่ยวเชิงนันทนาการ</option>
              <option value="การท่องเที่ยวเชิงวัฒนธรรม">การท่องเที่ยวเชิงวัฒนธรรม</option>
            </select>
          <label for="usr">รายละเอียดเกี่ยวกับสถานที่:</label>
          <textarea class="form-control" rows="2" id="location_info" name="location_info" placeholder="รายละเอียดสถานที่"></textarea>
          <label for="usr">ที่อยู่:</label>
          <textarea class="form-control" rows="2" id="location_address" name="address" placeholder="ที่อยู่สถานที่"></textarea>
          <label for="usr">ละติจูด:</label> <span class="error_form" id="latitude_error_msg" style="color :red;font-size: 15px;"></span>
          <input type="text" onfocusout="return check_latitude()" class="form-control" id="latitude" name="latitude" pattern="[0-9.+-]{0,12}" minlength="0" maxlength="12" placeholder="ละติจูดต้องเป็นตัวเลข เครื่องหมาย - และ . เท่านั้น">
          <label for="usr">ลองจิจูด:</label> <span class="error_form" id="longitude_error_msg" style="color :red;font-size: 15px;"></span>
          <input type="text" onfocusout="return check_longitude()" class="form-control" id="longitude" name="longitude"pattern="[0-9.+-]{0,12}" minlength="0" maxlength="12" placeholder="ลองจิจูดต้องเป็นตัวเลข เครื่องหมาย - และ . เท่านั้น">
          <label for="usr">ค่าธรรมเนียม(บาท):</label> <span class="error_form" id="fee_error_msg" style="color :red;font-size: 15px;"></span><br>
          <div class="col-lg-6">
            <input type="text" onfocusout="return check_fee()" class="form-control" id="fee" name="fee" minlength="0" placeholder="ค่าธรรมเนียม เช่น ค่าเข้ารับชมสถานที่">
          </div>
          <div class="col-lg-6">
              <input type="radio" name="fee" value="ไม่มีค่าธรรมเนียม" onclick="disableTxt()" id="location_fee" name="fee"> ไม่มีค่าธรรมเนียม
          </div>
          <br>
          <br>
          <label for="usr">การเดินทาง:</label>
          <textarea class="form-control" rows="2" id="location_route" name="route" placeholder="รายละเอียดการเดินทาง"></textarea>
          <label for="usr">จุดสังเกต:</label>
          <input type="text" class="form-control" id="location_landmark" name="landmark" placeholder="สุดสังเกตสถานที่">

          <div class="page-header">
            รูปภาพสถานที่ท่องเที่ยว
          </div>


                  <div class="col-lg-6">
                    <label for="usr">ภาพที่ 1:</label>
                    <input type='file' name="location_image_file[]" onchange="document.getElementById('loc_img1').src = window.URL.createObjectURL(this.files[0])">
                    <img id="loc_img1" src="" height="200">
                    <label for="usr">คำอธิบายภาพที่ 1:</label>
                    <textarea class="form-control" rows="5" name="location_image_info[]"></textarea>
                  </div>

                  <div class="col-lg-6">
                    <label for="usr">ภาพที่ 2:</label>
                    <input type='file' name="location_image_file[]" onchange="document.getElementById('loc_img2').src = window.URL.createObjectURL(this.files[0])">
                    <img id="loc_img2" src="" height="200">
                    <label for="usr">คำอธิบายภาพที่ 2:</label>
                    <textarea class="form-control" rows="5" name="location_image_info[]"></textarea>
                  </div>

                  <div class="col-lg-6">
                    <label for="usr">ภาพที่ 3:</label>
                    <input type='file' name="location_image_file[]" onchange="document.getElementById('loc_img3').src = window.URL.createObjectURL(this.files[0])">
                    <img id="loc_img3" src="" height="200">
                    <label for="usr">คำอธิบายภาพที่ 3:</label>
                    <textarea class="form-control" rows="5" name="location_image_info[]"></textarea>
                  </div>

                  <div class="col-lg-6">
                    <label for="usr">ภาพที่ 4:</label>
                    <input type='file' name="location_image_file[]" onchange="document.getElementById('loc_img4').src = window.URL.createObjectURL(this.files[0])">
                    <img id="loc_img4" src="" height="200">
                    <label for="usr">คำอธิบายภาพที่ 4:</label>
                    <textarea class="form-control" rows="5" name="location_image_info[]"></textarea>
                  </div>

                  <div class="col-lg-6">
                    <label for="usr">ภาพที่ 5:</label>
                    <input type='file' name="location_image_file[]" onchange="document.getElementById('loc_img5').src = window.URL.createObjectURL(this.files[0])">
                    <img id="loc_img5" src="" height="200">
                    <label for="usr">คำอธิบายภาพที่ 5:</label>
                    <textarea class="form-control" rows="5" name="location_image_info[]"></textarea>
                  </div>

                  <div class="col-lg-6">
                    <label for="usr">ภาพที่ 6:</label>
                    <input type='file' name="location_image_file[]" onchange="document.getElementById('loc_img6').src = window.URL.createObjectURL(this.files[0])">
                    <img id="loc_img6" src="" height="200">
                    <label for="usr">คำอธิบายภาพที่ 6:</label>
                    <textarea class="form-control" rows="5" name="location_image_info[]"></textarea>
                  </div>

                  <div class="col-lg-6">
                    <label for="usr">ภาพที่ 7:</label>
                    <input type='file' name="location_image_file[]" onchange="document.getElementById('loc_img7').src = window.URL.createObjectURL(this.files[0])">
                    <img id="loc_img7" src="" height="200">
                    <label for="usr">คำอธิบายภาพที่ 7:</label>
                    <textarea class="form-control" rows="5" name="location_image_info[]"></textarea>
                  </div>

                  <div class="col-lg-6">
                    <label for="usr">ภาพที่ 8:</label>
                    <input type='file' name="location_image_file[]" onchange="document.getElementById('loc_img8').src = window.URL.createObjectURL(this.files[0])">
                    <img id="loc_img8" src="" height="200">
                    <label for="usr">คำอธิบายภาพที่ 8:</label>
                    <textarea class="form-control" rows="5" name="location_image_info[]"></textarea>
                  </div>

                  <div class="col-lg-6">
                    <label for="usr">ภาพที่ 9:</label>
                    <input type='file' name="location_image_file[]" onchange="document.getElementById('loc_img9').src = window.URL.createObjectURL(this.files[0])">
                    <img id="loc_img9" src="" height="200">
                    <label for="usr">คำอธิบายภาพที่ 9:</label>
                    <textarea class="form-control" rows="5" name="location_image_info[]"></textarea>
                  </div>

                  <div class="col-lg-6">
                    <label for="usr">ภาพที่ 10:</label>
                    <input type='file' name="location_image_file[]" onchange="document.getElementById('loc_img10').src = window.URL.createObjectURL(this.files[0])">
                    <img id="loc_img10" src="" height="200">
                    <label for="usr">คำอธิบายภาพที่ 10:</label>
                    <textarea class="form-control" rows="5" name="location_image_info[]"></textarea>
                  </div>

              <br>




          </div>


        </div>

        <div id="menu1" class="tab-pane fade">
          <div class="form-group">
          <label for="usr">ชื่อร้านค้า:</label>
          <input type="text" class="form-control" id="location_name" name="product_name" maxlength="120" placeholder="ชื่อร้านค้าความยาวไม่เกิน 120 ตัวอักษร">
          <label for="usr">รายละเอียดร้านค้า:</label>
          <textarea class="form-control" rows="5" id="location_info" name="product_info" placeholder="รายละเอียดร้านค้า"></textarea>
          <label for="usr">ราคา(บาท):</label> <span class="error_form" id="productprice_error_msg" style="color :red;font-size: 15px;"></span>
          <input type="text" onfocusout="return check_productprice()" class="form-control" id="productprice" name="product_price" minlength="0" placeholder="ราคาสินค้าต้องเป็นตัวเลขเท่านั้น">
          <label for="usr">ที่อยู่:</label>
          <input type="text" class="form-control" id="location_map" name="product_address" placeholder="รายละเอียดบริเวณที่ตั้ง">
          <div class="page-header">
            รูปภาพร้านค้า/สินค้า
          </div>


          <div class="col-lg-6">
            <label for="usr">ภาพที่ 1:</label>
            <input type='file' name="product_image_file[]" onchange="document.getElementById('pro_img1').src = window.URL.createObjectURL(this.files[0])">
            <img id="pro_img1" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 1:</label>
            <textarea class="form-control" rows="5" name="product_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 2:</label>
            <input type='file' name="product_image_file[]" onchange="document.getElementById('pro_img2').src = window.URL.createObjectURL(this.files[0])">
            <img id="pro_img2" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 2:</label>
            <textarea class="form-control" rows="5" name="product_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 3:</label>
            <input type='file' name="product_image_file[]" onchange="document.getElementById('pro_img3').src = window.URL.createObjectURL(this.files[0])">
            <img id="pro_img3" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 3:</label>
            <textarea class="form-control" rows="5" name="product_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 4:</label>
            <input type='file' name="product_image_file[]" onchange="document.getElementById('pro_img4').src = window.URL.createObjectURL(this.files[0])">
            <img id="pro_img4" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 4:</label>
            <textarea class="form-control" rows="5" name="product_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 5:</label>
            <input type='file' name="product_image_file[]" onchange="document.getElementById('pro_img5').src = window.URL.createObjectURL(this.files[0])">
            <img id="pro_img5" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 5:</label>
            <textarea class="form-control" rows="5" name="product_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 6:</label>
            <input type='file' name="product_image_file[]" onchange="document.getElementById('pro_img6').src = window.URL.createObjectURL(this.files[0])">
            <img id="pro_img6" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 6:</label>
            <textarea class="form-control" rows="5" name="product_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 7:</label>
            <input type='file' name="product_image_file[]" onchange="document.getElementById('pro_img7').src = window.URL.createObjectURL(this.files[0])">
            <img id="pro_img7" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 7:</label>
            <textarea class="form-control" rows="5" name="product_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 8:</label>
            <input type='file' name="product_image_file[]" onchange="document.getElementById('pro_img8').src = window.URL.createObjectURL(this.files[0])">
            <img id="pro_img8" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 8:</label>
            <textarea class="form-control" rows="5" name="product_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 9:</label>
            <input type='file' name="product_image_file[]" onchange="document.getElementById('pro_img9').src = window.URL.createObjectURL(this.files[0])">
            <img id="pro_img9" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 9:</label>
            <textarea class="form-control" rows="5" name="product_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 10:</label>
            <input type='file' name="product_image_file[]" onchange="document.getElementById('pro_img10').src = window.URL.createObjectURL(this.files[0])">
            <img id="pro_img10" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 10:</label>
            <textarea class="form-control" rows="5" name="product_image_info[]"></textarea>
          </div>

              <br>

          </div>
        </div>
        <div id="menu2" class="tab-pane fade">
          <div class="form-group">
          <label for="usr">ชื่อบริการ:</label>
          <input type="text" class="form-control" id="location_name" name="service_name" placeholder="ชื่อบริการความยาวไม่เกิน 120 ตัวอักษร">
          <label for="usr">รายละเอียดบริการ:</label>
          <textarea class="form-control" rows="5" id="location_info" name="service_info" placeholder="รายละเอียดบริการ"></textarea>
          <label for="usr">ราคา:</label> <span class="error_form" id="serviceprice_error_msg" style="color :red;font-size: 15px;"></span>
          <input type="text" onfocusout="return check_serviceprice()" class="form-control" id="serviceprice" name="service_fee" minlength="0" placeholder="ราคาบริการต้องเป็นตัวเลขเท่านั้น">
          <label for="usr">ที่อยู่:</label>
          <input type="text" class="form-control" id="location_map" name="service_address" placeholder="รายละเอียดบริเวณที่ตั้ง">
          <div class="page-header">
            รูปภาพบริการ
          </div>


          <div class="col-lg-6">
            <label for="usr">ภาพที่ 1:</label>
            <input type='file' name="service_image_file[]" onchange="document.getElementById('ser_img1').src = window.URL.createObjectURL(this.files[0])">
            <img id="ser_img1" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 1:</label>
            <textarea class="form-control" rows="5" name="service_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 2:</label>
            <input type='file' name="service_image_file[]" onchange="document.getElementById('ser_img2').src = window.URL.createObjectURL(this.files[0])">
            <img id="ser_img2" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 2:</label>
            <textarea class="form-control" rows="5" name="service_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 3:</label>
            <input type='file' name="service_image_file[]" onchange="document.getElementById('ser_img3').src = window.URL.createObjectURL(this.files[0])">
            <img id="ser_img3" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 3:</label>
            <textarea class="form-control" rows="5" name="service_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 4:</label>
            <input type='file' name="service_image_file[]" onchange="document.getElementById('ser_img4').src = window.URL.createObjectURL(this.files[0])">
            <img id="ser_img4" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 4:</label>
            <textarea class="form-control" rows="5" name="service_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 5:</label>
            <input type='file' name="service_image_file[]" onchange="document.getElementById('ser_img5').src = window.URL.createObjectURL(this.files[0])">
            <img id="ser_img5" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 5:</label>
            <textarea class="form-control" rows="5" name="service_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 6:</label>
            <input type='file' name="service_image_file[]" onchange="document.getElementById('ser_img6').src = window.URL.createObjectURL(this.files[0])">
            <img id="ser_img6" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 6:</label>
            <textarea class="form-control" rows="5" name="service_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 7:</label>
            <input type='file' name="service_image_file[]" onchange="document.getElementById('ser_img7').src = window.URL.createObjectURL(this.files[0])">
            <img id="ser_img7" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 7:</label>
            <textarea class="form-control" rows="5" name="service_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 8:</label>
            <input type='file' name="service_image_file[]" onchange="document.getElementById('ser_img8').src = window.URL.createObjectURL(this.files[0])">
            <img id="ser_img8" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 8:</label>
            <textarea class="form-control" rows="5" name="service_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 9:</label>
            <input type='file' name="service_image_file[]" onchange="document.getElementById('ser_img9').src = window.URL.createObjectURL(this.files[0])">
            <img id="ser_img9" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 9:</label>
            <textarea class="form-control" rows="5" name="service_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 10:</label>
            <input type='file' name="service_image_file[]" onchange="document.getElementById('ser_img10').src = window.URL.createObjectURL(this.files[0])">
            <img id="ser_img10" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 10:</label>
            <textarea class="form-control" rows="5" name="service_image_info[]"></textarea>
          </div>


              <br>

          </div>
        </div>
        <div id="menu3" class="tab-pane fade">
          <div class="form-group">
          <label for="usr">ชื่อร้านอาหาร:</label>
          <input type="text" class="form-control" id="location_name" name="rest_name" placeholder="ชื่อร้านอาหารความยาวไม่เกิน 120 ตัวอักษร">
          <label for="usr">รายละเอียดร้านอาหาร:</label>
          <textarea class="form-control" rows="5" id="location_info" name="rest_info" placeholder="รายละเอียดร้านอาหาร"></textarea>
          <label for="usr">อาหารแนะนำ:</label>
          <input type="text" class="form-control" id="location_map" name="rest_reccomment" placeholder="เมนูอาหารแนะนำ">
          <label for="usr">ที่อยู่:</label>
          <input type="text" class="form-control" id="location_map" name="rest_address" placeholder="รายละเอียดที่ตั้งร้านอาหาร">
          <label for="usr">เบอร์โทรศัพท์:</label> <span class="error_form" id="resttell_error_msg" style="color :red;font-size: 15px;"></span>
          <input type="text" onfocusout="return check_resttell()" class="form-control" id="resttell" name="rest_tell" pattern="[0-9]{10,10}" minlength="0" maxlength="10" placeholder="เบอร์โทรศัพท์เป็นตัวเลขเท่านั้น">
          <label for="usr">เว็บไซต์:</label> <span class="error_form" id="restweb_error_msg" style="color :red;font-size: 15px;"></span>
          <input type="url" oninput="return check_restweb()" class="form-control" id="restweb" name="rest_website" placeholder="กรุณากรอก url เว็บไซต์">
          <label for="usr">ช่วงเวลาเปิดทำการ:</label>
          <input type="time" class="form-control" id="example" name="rest_opentime">
          <label for="usr">ช่วงเวลาปิดทำการ:</label>
          <input type="time" class="form-control" id="timePicker" name="rest_closetime">
          <label>รูปแบบร้านอาหาร</label>
          <select class="form-control" id="location_type" name="rest_type">
            <option value="อาหารไทย">อาหารไทย</option>
            <option value="อาหารนานาชาติ">อาหารนานาชาติ</option>
            <option value="อาลาคาร์ท์">อาลาคาร์ท</option>
            <option value="บุฟเฟต์">บุฟเฟต์</option>
            <option value="ฟรีโฟลว">ฟรีโฟลว</option>
            <option value="อื่น ๆ">อื่น ๆ</option>
          </select>
          <div class="page-header">
            รูปภาพร้านอาหาร
          </div>


          <div class="col-lg-6">
            <label for="usr">ภาพที่ 1:</label>
            <input type='file' name="restaurant_image_file[]" onchange="document.getElementById('rest_img1').src = window.URL.createObjectURL(this.files[0])">
            <img id="rest_img1" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 1:</label>
            <textarea class="form-control" rows="5" name="restaurant_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 2:</label>
            <input type='file' name="restaurant_image_file[]" onchange="document.getElementById('rest_img2').src = window.URL.createObjectURL(this.files[0])">
            <img id="rest_img2" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 2:</label>
            <textarea class="form-control" rows="5" name="restaurant_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 3:</label>
            <input type='file' name="restaurant_image_file[]" onchange="document.getElementById('rest_img3').src = window.URL.createObjectURL(this.files[0])">
            <img id="rest_img3" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 3:</label>
            <textarea class="form-control" rows="5" name="restaurant_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 4:</label>
            <input type='file' name="restaurant_image_file[]" onchange="document.getElementById('rest_img4').src = window.URL.createObjectURL(this.files[0])">
            <img id="rest_img4" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 4:</label>
            <textarea class="form-control" rows="5" name="restaurant_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 5:</label>
            <input type='file' name="restaurant_image_file[]" onchange="document.getElementById('rest_img5').src = window.URL.createObjectURL(this.files[0])">
            <img id="rest_img5" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 5:</label>
            <textarea class="form-control" rows="5" name="restaurant_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 6:</label>
            <input type='file' name="restaurant_image_file[]" onchange="document.getElementById('rest_img6').src = window.URL.createObjectURL(this.files[0])">
            <img id="rest_img6" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 6:</label>
            <textarea class="form-control" rows="5" name="restaurant_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 7:</label>
            <input type='file' name="restaurant_image_file[]" onchange="document.getElementById('rest_img7').src = window.URL.createObjectURL(this.files[0])">
            <img id="rest_img7" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 7:</label>
            <textarea class="form-control" rows="5" name="restaurant_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 8:</label>
            <input type='file' name="restaurant_image_file[]" onchange="document.getElementById('rest_img8').src = window.URL.createObjectURL(this.files[0])">
            <img id="rest_img8" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 8:</label>
            <textarea class="form-control" rows="5" name="restaurant_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 9:</label>
            <input type='file' name="restaurant_image_file[]" onchange="document.getElementById('rest_img9').src = window.URL.createObjectURL(this.files[0])">
            <img id="rest_img9" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 9:</label>
            <textarea class="form-control" rows="5" name="restaurant_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 10:</label>
            <input type='file' name="restaurant_image_file[]" onchange="document.getElementById('rest_img10').src = window.URL.createObjectURL(this.files[0])">
            <img id="rest_img10" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 10:</label>
            <textarea class="form-control" rows="5" name="restaurant_image_info[]"></textarea>
          </div>


              <br>

          </div>
        </div>
        <div id="menu4" class="tab-pane fade">
          <div class="form-group">
          <label for="usr">ชื่อที่พัก:</label>
          <input type="text" class="form-control" id="location_name" name="lodge_name" maxlength="120" placeholder="ชื่อที่พักความยาวไม่เกิน 120 ตัวอักษร">
          <label for="usr">รายละเอียดที่พัก:</label>
          <textarea class="form-control" rows="5" id="location_info" name="lodge_info" placeholder="รายละเอียดที่พัก"></textarea>
          <label for="usr">เบอร์โทรศัพท์:</label> <span class="error_form" id="lodgetell_error_msg" style="color :red;font-size: 15px;"></span>
          <input type="text" onfocusout="return check_lodgetell()" class="form-control" id="lodgetell" name="lodge_tell" pattern="[0-9]{10,10}" minlength="0" maxlength="10" placeholder="เบอร์โทรศัพท์เป็นตัวเลขเท่านั้น">
          <label for="usr">ราคาเริ่มต้น:</label> <span class="error_form" id="lodgeprice_error_msg" style="color :red;font-size: 15px;"></span>
          <input type="text" onfocusout="return check_lodgeprice()" class="form-control" id="lodgeprice" name="lodge_price" minlength="0" placeholder="ราคาเริ่มต้นต้องเป็นตัวเลขเท่านั้น">
          <label for="usr">เว็บไซต์:</label> <span class="error_form" id="lodgeweb_error_msg" style="color :red;font-size: 15px;"></span>
          <input type="url" onfocusout="return check_lodgeweb()" class="form-control" id="lodgeweb" name="lodge_website" placeholder="กรุณากรอก url เว็บไซต์">
          <label for="usr">ที่อยู่:</label>
          <input type="text" class="form-control" id="location_map" name="lodge_address" placeholder="รายละเอียดที่ตั้งที่พัก">
          <label>ประเภทที่พัก</label>
          <select class="form-control" id="location_type" name="lodge_type">
            <option value="รีสอร์ต">รีสอร์ต</option>
            <option value="โรงแรม">โรงแรม</option>
            <option value="โมเต็ล">โมเต็ล</option>
            <option value="เกสต์เฮาส์์">เกสต์เฮาส์</option>
            <option value="อพาร์ตเมนท์,คอนโดมิเนียม">อพาร์ตเมนท์,คอนโดมิเนียม</option>
            <option value="อื่น ๆ">อื่น ๆ</option>
          </select>
          <div class="page-header">
            รูปภาพที่พัก
          </div>


          <div class="col-lg-6">
            <label for="usr">ภาพที่ 1:</label>
            <input type='file' name="lodge_image_file[]" onchange="document.getElementById('lodge_img1').src = window.URL.createObjectURL(this.files[0])">
            <img id="lodge_img1" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 1:</label>
            <textarea class="form-control" rows="5" name="lodge_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 2:</label>
            <input type='file' name="lodge_image_file[]" onchange="document.getElementById('lodge_img2').src = window.URL.createObjectURL(this.files[0])">
            <img id="lodge_img2" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 2:</label>
            <textarea class="form-control" rows="5" name="lodge_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 3:</label>
            <input type='file' name="lodge_image_file[]" onchange="document.getElementById('lodge_img3').src = window.URL.createObjectURL(this.files[0])">
            <img id="lodge_img3" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 3:</label>
            <textarea class="form-control" rows="5" name="lodge_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 4:</label>
            <input type='file' name="lodge_image_file[]" onchange="document.getElementById('lodge_img4').src = window.URL.createObjectURL(this.files[0])">
            <img id="lodge_img4" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 4:</label>
            <textarea class="form-control" rows="5" name="lodge_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 5:</label>
            <input type='file' name="lodge_image_file[]" onchange="document.getElementById('lodge_img5').src = window.URL.createObjectURL(this.files[0])">
            <img id="lodge_img5" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 5:</label>
            <textarea class="form-control" rows="5" name="lodge_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 6:</label>
            <input type='file' name="lodge_image_file[]" onchange="document.getElementById('lodge_img6').src = window.URL.createObjectURL(this.files[0])">
            <img id="lodge_img6" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 6:</label>
            <textarea class="form-control" rows="5" name="lodge_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 7:</label>
            <input type='file' name="lodge_image_file[]" onchange="document.getElementById('lodge_img7').src = window.URL.createObjectURL(this.files[0])">
            <img id="lodge_img7" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 7:</label>
            <textarea class="form-control" rows="5" name="lodge_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 8:</label>
            <input type='file' name="lodge_image_file[]" onchange="document.getElementById('lodge_img8').src = window.URL.createObjectURL(this.files[0])">
            <img id="lodge_img8" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 8:</label>
            <textarea class="form-control" rows="5" name="lodge_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 9:</label>
            <input type='file' name="lodge_image_file[]" onchange="document.getElementById('lodge_img9').src = window.URL.createObjectURL(this.files[0])">
            <img id="lodge_img9" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 9:</label>
            <textarea class="form-control" rows="5" name="lodge_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 10:</label>
            <input type='file' name="lodge_image_file[]" onchange="document.getElementById('lodge_img10').src = window.URL.createObjectURL(this.files[0])">
            <img id="lodge_img10" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 10:</label>
            <textarea class="form-control" rows="5" name="lodge_image_info[]"></textarea>
          </div>


              <br>

          </div>
        </div>
        <div id="menu5" class="tab-pane fade">
          <div class="form-group">
          <label for="usr">ชื่อเทศกาล:</label>
          <input type="text" class="form-control" id="location_name" name="fest_name" maxlength="120" placeholder="ชื่อเทศกาลความยาวไม่เกิน 120 ตัวอักษร">
          <label for="usr">รายละเอียดเทศกาล:</label>
          <textarea class="form-control" rows="5" id="location_info" name="fest_info" placeholder="รายละเอียดเทศกาล"></textarea>
          <label for="usr">ช่วงเวลาเริ่มเทศกาล:</label>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fas fa-calendar-alt" aria-hidden="true"></i>
              </span>
              <input type="text" class="form-control datepicker" name="fest_up" data-provide="datepicker" data-date-language="th-th" placeholder="กรุณาเลือกช่วงเวลาเริ่มต้นเทศกาลจากปฏิทิน">
            </div>
          </div>
          <label for="usr">ช่วงเวลาสิ้นสุดเทศกาล:</label>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fas fa-calendar-alt" aria-hidden="true"></i>
              </span>
              <input type="text" class="form-control datepicker" name="fest_end" data-provide="datepicker" data-date-language="th-th" placeholder="กรุณาเลือกช่วงเวลาสิ้นสุดเทศกาลจากปฏิทิน">
            </div>
          </div>
          <div class="page-header">
            รูปภาพเทศกาล
          </div>


          <div class="col-lg-6">
            <label for="usr">ภาพที่ 1:</label>
            <input type='file' name="festival_image_file[]" onchange="document.getElementById('fest_img1').src = window.URL.createObjectURL(this.files[0])">
            <img id="fest_img1" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 1:</label>
            <textarea class="form-control" rows="5" name="festival_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 2:</label>
            <input type='file' name="festival_image_file[]" onchange="document.getElementById('fest_img2').src = window.URL.createObjectURL(this.files[0])">
            <img id="fest_img2" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 2:</label>
            <textarea class="form-control" rows="5" name="festival_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 3:</label>
            <input type='file' name="festival_image_file[]" onchange="document.getElementById('fest_img3').src = window.URL.createObjectURL(this.files[0])">
            <img id="fest_img3" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 3:</label>
            <textarea class="form-control" rows="5" name="festival_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 4:</label>
            <input type='file' name="festival_image_file[]" onchange="document.getElementById('fest_img4').src = window.URL.createObjectURL(this.files[0])">
            <img id="fest_img4" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 4:</label>
            <textarea class="form-control" rows="5" name="festival_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 5:</label>
            <input type='file' name="festival_image_file[]" onchange="document.getElementById('fest_img5').src = window.URL.createObjectURL(this.files[0])">
            <img id="fest_img5" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 5:</label>
            <textarea class="form-control" rows="5" name="festival_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 6:</label>
            <input type='file' name="festival_image_file[]" onchange="document.getElementById('fest_img6').src = window.URL.createObjectURL(this.files[0])">
            <img id="fest_img6" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 6:</label>
            <textarea class="form-control" rows="5" name="festival_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 7:</label>
            <input type='file' name="festival_image_file[]" onchange="document.getElementById('fest_img7').src = window.URL.createObjectURL(this.files[0])">
            <img id="fest_img7" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 7:</label>
            <textarea class="form-control" rows="5" name="festival_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 8:</label>
            <input type='file' name="festival_image_file[]" onchange="document.getElementById('fest_img8').src = window.URL.createObjectURL(this.files[0])">
            <img id="fest_img8" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 8:</label>
            <textarea class="form-control" rows="5" name="festival_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 9:</label>
            <input type='file' name="festival_image_file[]" onchange="document.getElementById('fest_img9').src = window.URL.createObjectURL(this.files[0])">
            <img id="fest_img9" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 9:</label>
            <textarea class="form-control" rows="5" name="festival_image_info[]"></textarea>
          </div>

          <div class="col-lg-6">
            <label for="usr">ภาพที่ 10:</label>
            <input type='file' name="festival_image_file[]" onchange="document.getElementById('fest_img10').src = window.URL.createObjectURL(this.files[0])">
            <img id="fest_img10" src="" height="200">
            <label for="usr">คำอธิบายภาพที่ 10:</label>
            <textarea class="form-control" rows="5" name="festival_image_info[]"></textarea>
          </div>


              <br>

          </div>





        </div>

        <div class="col-md-12">
          <div class="text-center">
            <br>
            <label for=""></label>
            <button type="submit" class="btn btn-success">บันทึก</button>
            <a href="indexmember.php" class="btn btn-danger" role="button">ยกเลิก</a>
          </div>
        </div>

        </form>
        </div>






















<br>



<!--ฟูทเตอร์ -->



</div>

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















    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>

    <!-- สคริปดาว -->
    <script src="build/bootstrap-rating-input.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="jsjquery-3.2.1.min.js"></script>
  </body>
</html>
