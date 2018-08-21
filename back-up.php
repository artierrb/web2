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
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
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

<script>
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

</script>


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
</div>


<div class="container">

  <div class="col-lg-4">
    <img src="img/<?php echo "$s_login_image" ?>" class="img-responsive center-block img-circle" style="margin-top : 10px; width:50%">
    <br>
    <div class="text-center">
      <label><?php echo "$s_login_username" ?></label>  <label><?php echo "$s_login_surname" ?></label>
    </div>
    <br>

    <div class="list-group">
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

    <form class="" action="upload.php" method="post">
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



      <div class="tab-content">
        <div id="menu0" class="tab-pane fade in active">
          <div class="form-group">
          <label for="usr">ชื่อสถานที่:</label>
          <input type="text" class="form-control" id="location_name" name="name">

            <label>ประเภท</label>
            <select class="form-control" id="location_type" name="type">
              <option value="1">การท่องเที่ยวเชิงนิเวศ</option>
              <option value="2">การท่องเที่ยวเชิงศิลปะวิทยาการ</option>
              <option value="3">การท่องเที่ยวเชิเชิงประวัติศาสตร์</option>
              <option value="4">การท่องเที่ยวเชิเชิงธรรมชาติ</option>
              <option value="5">การท่องเที่ยวเชิงนันทนาการ</option>
              <option value="6">การท่องเที่ยวเชิงวัฒนธรรม</option>
            </select>
          <label for="usr">รายละเอียดเกี่ยวกับสถานที่:</label>
          <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>
          <label for="usr">ที่อยู่:</label>
          <textarea class="form-control" rows="5" id="location_address" name="address"></textarea>
          <label for="usr">ละติจูด:</label>
          <input type="text" class="form-control" id="location_map" name="latitude">
          <label for="usr">ลองจิจูด:</label>
          <input type="text" class="form-control" id="location_map" name="longitude">
          <label for="usr">ค่าธรรมเนียม:</label><br>
          <input type="text" class="form-control" id="location_fee" name="fee">
          <label class="radio-inline">

            <input type="radio" name="fee" value="ไม่มีค่าธรรมเนียม"> ไม่มีค่าธรรมเนียม
          </label>
          <br>
          <label for="usr">การเดินทาง:</label>
          <textarea class="form-control" rows="5" id="location_route" name="route"></textarea>
          <label for="usr">จุดสังเกต:</label>
          <input type="text" class="form-control" id="location_landmark" name="landmark">

          <div class="page-header">
            รูปภาพสถานที่ท่องเที่ยว
          </div>


                  <div class="col-lg-6">
                    <label for="usr">ภาพที่ 1:</label>
                    <input type='file' id="imgInp" onchange="document.getElementById('loc_img1').src = window.URL.createObjectURL(this.files[0])">
                    <img id="loc_img1" src="" height="200">
                    <label for="usr">คำอธิบายภาพที่ 1:</label>
                    <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>
                  </div>

                  <div class="col-lg-6">
                    <label for="usr">ภาพที่ 2:</label>
                    <input type='file' id="imgInp" onchange="document.getElementById('loc_img2').src = window.URL.createObjectURL(this.files[0])">
                    <img id="loc_img2" src="" height="200">
                    <label for="usr">คำอธิบายภาพที่ 2:</label>
                    <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>
                  </div>





              <!--
              <div class="col-md-6">
                <label for="usr">ภาพที่ 3:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('loc_img3').src = window.URL.createObjectURL(this.files[0])">
                  <img id="loc_img3" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 3:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 4:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('loc_img4').src = window.URL.createObjectURL(this.files[0])">
                  <img id="loc_img4" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 4:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 5:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('loc_img5').src = window.URL.createObjectURL(this.files[0])">
                  <img id="loc_img5" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 5:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 6:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('loc_img6').src = window.URL.createObjectURL(this.files[0])">
                  <img id="loc_img6" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 6:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 7:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('loc_img7').src = window.URL.createObjectURL(this.files[0])">
                  <img id="loc_img7" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 7:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 8:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('loc_img8').src = window.URL.createObjectURL(this.files[0])">
                  <img id="loc_img8" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 8:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 9:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('loc_img9').src = window.URL.createObjectURL(this.files[0])">
                  <img id="loc_img9" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 9:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 10:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('loc_img10').src = window.URL.createObjectURL(this.files[0])">
                  <img id="loc_img10" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 10:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              -->
              <br>




          </div>


        </div>
        <!--
        <div id="menu1" class="tab-pane fade">
          <div class="form-group">
          <label for="usr">ชื่อร้านค้า:</label>
          <input type="text" class="form-control" id="location_name" name="product_name">
          <label for="usr">รายละเอียดสินค้า:</label>
          <textarea class="form-control" rows="5" id="location_info" name="product_info"></textarea>
          <label for="usr">ราคา:</label>
          <input type="text" class="form-control" id="location_map" name="product_fee">
          <label for="usr">ที่อยู่:</label>
          <input type="text" class="form-control" id="location_map" name="product_address">
          <div class="page-header">
            รูปภาพร้านค้า/สินค้า
          </div>


              <div class="col-md-6">
                <label for="usr">ภาพที่ 1:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('product_img1').src = window.URL.createObjectURL(this.files[0])">
                  <img id="product_img1" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 1:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 2:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('product_img2').src = window.URL.createObjectURL(this.files[0])">
                  <img id="product_img2" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 2:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 3:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('product_img3').src = window.URL.createObjectURL(this.files[0])">
                  <img id="product_img3" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 3:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 4:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('product_img4').src = window.URL.createObjectURL(this.files[0])">
                  <img id="product_img4" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 4:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 5:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('product_img5').src = window.URL.createObjectURL(this.files[0])">
                  <img id="product_img5" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 5:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 6:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('product_img6').src = window.URL.createObjectURL(this.files[0])">
                  <img id="product_img6" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 6:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 7:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('product_img7').src = window.URL.createObjectURL(this.files[0])">
                  <img id="product_img7" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 7:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 8:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('product_img8').src = window.URL.createObjectURL(this.files[0])">
                  <img id="product_img8" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 8:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 9:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('product_img9').src = window.URL.createObjectURL(this.files[0])">
                  <img id="product_img9" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 9:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 10:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('productproduct_img10').src = window.URL.createObjectURL(this.files[0])">
                  <img id="product_img10" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 10:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <br>

          </div>
        </div>
        <div id="menu2" class="tab-pane fade">
          <div class="form-group">
          <label for="usr">ชื่อบริการ:</label>
          <input type="text" class="form-control" id="location_name" name="service_name">
          <label for="usr">รายละเอียดบริการ:</label>
          <textarea class="form-control" rows="5" id="location_info" name="service_info"></textarea>
          <label for="usr">ราคา:</label>
          <input type="text" class="form-control" id="location_map" name="service_fee">
          <label for="usr">ที่อยู่:</label>
          <input type="text" class="form-control" id="location_map" name="service_address">
          <div class="page-header">
            รูปภาพบริการ
          </div>


              <div class="col-md-6">
                <label for="usr">ภาพที่ 1:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('service_img1').src = window.URL.createObjectURL(this.files[0])">
                  <img id="service_img1" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 1:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 2:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('service_img2').src = window.URL.createObjectURL(this.files[0])">
                  <img id="service_img2" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 2:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 3:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('service_img3').src = window.URL.createObjectURL(this.files[0])">
                  <img id="service_img3" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 3:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 4:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('service_img4').src = window.URL.createObjectURL(this.files[0])">
                  <img id="service_img4" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 4:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 5:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('service_img5').src = window.URL.createObjectURL(this.files[0])">
                  <img id="service_img5" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 5:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 6:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('service_img6').src = window.URL.createObjectURL(this.files[0])">
                  <img id="service_img6" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 6:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 7:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('service_img7').src = window.URL.createObjectURL(this.files[0])">
                  <img id="service_img7" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 7:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 8:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('service_img8').src = window.URL.createObjectURL(this.files[0])">
                  <img id="service_img8" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 8:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 9:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('service_img9').src = window.URL.createObjectURL(this.files[0])">
                  <img id="service_img9" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 9:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 10:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('service_img10').src = window.URL.createObjectURL(this.files[0])">
                  <img id="service_img10" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 10:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <br>

          </div>
        </div>
        <div id="menu3" class="tab-pane fade">
          <div class="form-group">
          <label for="usr">ชื่อร้านอาหาร:</label>
          <input type="text" class="form-control" id="location_name" name="rest_name">
          <label for="usr">รายละเอียดร้านอาหาร:</label>
          <textarea class="form-control" rows="5" id="location_info" name="rest_info"></textarea>
          <label for="usr">อาหารแนะนำ:</label>
          <input type="text" class="form-control" id="location_map" name="rest_rec">
          <label for="usr">ที่อยู่:</label>
          <input type="text" class="form-control" id="location_map" name="rest_address">
          <label for="usr">ข้อมูลติดต่อ:</label>
          <input type="text" class="form-control" id="location_map" name="rest_tell">
          <label for="usr">เว็บไซต์:</label>
          <input type="text" class="form-control" id="location_map" name="rest_web">
          <label for="usr">ช่วงเวลาเปิดทำการ:</label>
          <input type="text" class="form-control" id="location_map" name="rest_open">
          <label for="usr">รูปแบบร้านอาหาร:</label>
          <input type="text" class="form-control" id="location_map" name="rest_type">
          <div class="page-header">
            รูปภาพร้านอาหาร
          </div>


              <div class="col-md-6">
                <label for="usr">ภาพที่ 1:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('rest_img1').src = window.URL.createObjectURL(this.files[0])">
                  <img id="rest_img1" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 1:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 2:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('rest_img2').src = window.URL.createObjectURL(this.files[0])">
                  <img id="rest_img2" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 2:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 3:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('rest_img3').src = window.URL.createObjectURL(this.files[0])">
                  <img id="rest_img3" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 3:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 4:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('rest_img4').src = window.URL.createObjectURL(this.files[0])">
                  <img id="rest_img4" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 4:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 5:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('rest_img5').src = window.URL.createObjectURL(this.files[0])">
                  <img id="rest_img5" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 5:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 6:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('rest_img6').src = window.URL.createObjectURL(this.files[0])">
                  <img id="rest_img6" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 6:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 7:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('rest_img7').src = window.URL.createObjectURL(this.files[0])">
                  <img id="rest_img7" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 7:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 8:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('rest_img8').src = window.URL.createObjectURL(this.files[0])">
                  <img id="rest_img8" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 8:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 9:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('rest_img9').src = window.URL.createObjectURL(this.files[0])">
                  <img id="rest_img9" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 9:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 10:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('rest_img10').src = window.URL.createObjectURL(this.files[0])">
                  <img id="rest_img10" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 10:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <br>

          </div>
        </div>
        <div id="menu4" class="tab-pane fade">
          <div class="form-group">
          <label for="usr">ชื่อที่พัก:</label>
          <input type="text" class="form-control" id="location_name" name="lodge_name">
          <label for="usr">รายละเอียดที่พัก:</label>
          <textarea class="form-control" rows="5" id="location_info" name="lodge_info"></textarea>
          <label for="usr">ข้อมูลติดต่อ:</label>
          <input type="text" class="form-control" id="location_map" name="lodge_tell">
          <label for="usr">ราคาเริ่มต้น:</label>
          <input type="text" class="form-control" id="location_map" name="lodge_fee">
          <label for="usr">เว็บไซต์:</label>
          <input type="text" class="form-control" id="location_map" name="lodge_web">
          <label for="usr">ที่อยู่:</label>
          <input type="text" class="form-control" id="location_map" name="lodge_address">
          <label for="usr">ประเภท:</label>
          <input type="text" class="form-control" id="location_map" name="lodge_type">
          <div class="page-header">
            รูปภาพที่พัก
          </div>


              <div class="col-md-6">
                <label for="usr">ภาพที่ 1:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('lodge_img1').src = window.URL.createObjectURL(this.files[0])">
                  <img id="lodge_img1" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 1:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 2:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('lodge_img2').src = window.URL.createObjectURL(this.files[0])">
                  <img id="lodge_img2" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 2:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 3:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('lodge_img3').src = window.URL.createObjectURL(this.files[0])">
                  <img id="lodge_img3" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 3:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 4:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('lodge_img4').src = window.URL.createObjectURL(this.files[0])">
                  <img id="lodge_img4" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 4:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 5:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('lodge_img5').src = window.URL.createObjectURL(this.files[0])">
                  <img id="lodge_img5" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 5:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 6:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('lodge_img6').src = window.URL.createObjectURL(this.files[0])">
                  <img id="lodge_img6" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 6:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 7:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('lodge_img7').src = window.URL.createObjectURL(this.files[0])">
                  <img id="lodge_img7" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 7:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 8:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('lodge_img8').src = window.URL.createObjectURL(this.files[0])">
                  <img id="lodge_img8" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 8:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 9:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('lodge_img9').src = window.URL.createObjectURL(this.files[0])">
                  <img id="lodge_img9" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 9:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 10:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('lodge_img10').src = window.URL.createObjectURL(this.files[0])">
                  <img id="lodge_img10" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 10:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <br>

          </div>
        </div>
        <div id="menu5" class="tab-pane fade">
          <div class="form-group">
          <label for="usr">ชื่อเทศกาล:</label>
          <input type="text" class="form-control" id="location_name" name="fest_name">
          <label for="usr">รายละเอียดเทศกาล:</label>
          <textarea class="form-control" rows="5" id="location_info" name="fest_info"></textarea>
          <label for="usr">ช่วงเวลาเริ่มเทศกาล:</label>
          <input type="text" class="form-control" id="location_map" name="fest_begin">
          <label for="usr">ช่วงเวลาสิ้นสุดเทศกาล:</label>
          <input type="text" class="form-control" id="location_map" name="fest_end">
          <div class="page-header">
            รูปภาพเทศกาล
          </div>


              <div class="col-md-6">
                <label for="usr">ภาพที่ 1:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('fest_img1').src = window.URL.createObjectURL(this.files[0])">
                  <img id="fest_img1" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 1:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 2:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('fest_img2').src = window.URL.createObjectURL(this.files[0])">
                  <img id="fest_img2" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 2:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 3:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('fest_img3').src = window.URL.createObjectURL(this.files[0])">
                  <img id="fest_img3" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 3:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 4:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('fest_img4').src = window.URL.createObjectURL(this.files[0])">
                  <img id="fest_img4" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 4:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 5:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('fest_img5').src = window.URL.createObjectURL(this.files[0])">
                  <img id="fest_img5" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 5:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 6:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('fest_img6').src = window.URL.createObjectURL(this.files[0])">
                  <img id="fest_img6" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 6:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 7:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('fest_img7').src = window.URL.createObjectURL(this.files[0])">
                  <img id="fest_img7" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 7:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 8:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('fest_img8').src = window.URL.createObjectURL(this.files[0])">
                  <img id="fest_img8" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 8:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 9:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('fest_img9').src = window.URL.createObjectURL(this.files[0])">
                  <img id="fest_img9" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 9:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <div class="col-md-6">
                <label for="usr">ภาพที่ 10:</label>
                  <input type='file' id="imgInp" onchange="document.getElementById('fest_img10').src = window.URL.createObjectURL(this.files[0])">
                  <img id="fest_img10" src="" height="200">
                  <label for="usr">คำอธิบายภาพที่ 10:</label>
                  <textarea class="form-control" rows="5" id="location_info" name="info"></textarea>

              </div>
              <br>

          </div>
        -->




        </div>
        <div class="text-center">
          <label for=""></label>
          <button type="submit" class="btn btn-success">ตกลง</button>
          <a href="indexmember.php" class="btn btn-danger" role="button">ยกเลิก</a>
        </div>
        </form>
        </div>


























<!--ฟูทเตอร์ -->

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
