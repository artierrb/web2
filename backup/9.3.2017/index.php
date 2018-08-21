<!DOCTYPE html>
<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "web2";
$con = @mysqli_connect($server, $username, $password, $database)
or die("Cannot connect database!!!");
mysqli_query($con, "set names utf8");

//echo "connect database successfully<br>";
$query = "SELECT * FROM score" or die("Error:" . mysqli_error());
$query2 = "SELECT DISTINCT * FROM board ORDER BY b_score DESC LIMIT 3" or die("Error:" . mysqli_error());
$result = mysqli_query($con, $query);
$result2 = mysqli_query($con, $query2);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);


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

    <title>Go! Travel.com</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style media="screen">
      div {
        font-family: 'Leelawadee UI' , sans-serif;
      }

      ul.a {
        list-style-type: none;

      }






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
      <a class="navbar-brand" href="#">หน้าหลัก</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">บทความทั้งหมด<span class="sr-only">(current)</span></a></li>


        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ประเภทบทความ <span class="caret"></span></a>
          <ul class="dropdown-menu">

            <li><a href="#">สถานที่ท่องเที่ยว</a></li>



            <li role="separator" class="divider"></li>
            <li><a href="#">สินค้า</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">บริการ</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">ร้านอาหาร</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">ที่พัก</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">เทศกาล</a></li>

          </ul>
        </li>

      </ul>
      <form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="ค้นหาข้อมูล ชื่อสถานที่ ฯลฯ">
        </div>
        <button type="submit" class="btn btn-default">ค้นหา</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="#">Link</a></li> -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">สมาชิก<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">เข้าสู่ระบบ</a></li>




            <li><a href="#" data-toggle="modal" data-target="#example2Modal" data-whatever="@mdo">ลืมรหัสผ่าน</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#" data-toggle="modal" data-target="#registerModal" data-whatever="@mdo">สมัครสมาชิก</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<!-- บนคารูเซล -->
<div class="col-md-12">
  <div class="hidden-xs">
    <img src="img/portfolio/cafe3.jpg" class="img-responsive" width="100%">
  </div>
</div>

<div class="col-md-12">
  <p><br>
  </p>
</div>

<!-- คารูเซล -->
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
          <img src="img/portfolio/เทศกาล1.jpg" class="img-responsive" width="100%">
          <div class="carousel-caption">
            TAO FESTIVAL
          </div>
        </div>
        <div class="item">
          <img src="img/portfolio/เทศกาล2.jpg" class="img-responsive" width="100%">
          <div class="carousel-caption">
            เทศกาลผีตาโขน
          </div>
        </div>
        <div class="item">
          <img src="img/portfolio/เทศกาล3.jpg" class="img-responsive" width="100%">
          <div class="carousel-caption">
            เทศกาลปล่อยโคมลอย
          </div>
        </div>

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
  <img src="img/portfolio/ads.jpg" class="img-responsive" width="100%">
</div>

<div class="col-md-12">
  <p><br>
  </p>
</div>

<!-- เนื้อหาข้างล่าง -->
<div class="container marketing">
  <div class="row">

    <div class="col-lg-4 text-center">
      <img src="<?php echo $row2["b_image"]; ?>" alt="img-responsive" width="100%">
      <h2 style="text-align: center;"><?php echo $row2["b_name"]; ?></h2>
      <p style="text-align: center;"><?php echo $row2["b_info"]; ?></p>
      <input type="number" name="your_awesome_parameter" id="rating-readonly" class="rating" data-clearable="remove" value="<?php echo $row["score_point"]; ?>" data-readonly />
      <p><a href="p1.php" class="btn btn-default" role="button">ดูรายละเอียด</a></p>


    </div>
    <div class="col-lg-4 text-center">
      <img src="<?php echo $row2["b_image"]; ?>" alt="img-responsive" width="100%">
      <h2 style="text-align: center;"><?php echo $row2["b_name"]; ?></h2>
      <p style="text-align: center;"><?php echo $row2["b_info"]; ?>ิ</p>
      <input type="number" name="your_awesome_parameter" id="rating-readonly" class="rating" data-clearable="remove" value="<?php echo $row["score_point"]; ?>" data-readonly/>
      <p><a href="#" class="btn btn-default" role="button">ดูรายละเอียด</a></p>

    </div>
    <div class="col-lg-4 text-center">
      <img src="<?php echo $row2["b_image"]; ?>" alt="img-responsive" width="100%">
      <h2 style="text-align: center;"><?php echo $row2["b_name"]; ?></h2>
      <p style="text-align: center;"><?php echo $row2["b_info"]; ?></p>
      <input type="number" name="your_awesome_parameter" id="rating-readonly" class="rating" data-clearable="remove" value="<?php echo $row["score_point"]; ?>" data-readonly/>
      <p><a href="#" class="btn btn-default" role="button">ดูรายละเอียด</a></p>

    </div>


  </div>

</div>

<!-- ไดนามิคแท็ป -->

<ul class="nav nav-tabs" style="color :black;">
  <li class="active"><a data-toggle="tab" href="#home" style="color :black;background-color: #ffbd26;">แนะนำ</a></li>
  <li><a data-toggle="tab" href="#menu1" style="color :black;background-color: #ff8570;">ท่องเที่ยว</a></li>
  <li><a data-toggle="tab" href="#menu2" style="color :black;background-color: #ffee70;">สินค้า</a></li>
  <li><a data-toggle="tab" href="#menu3" style="color :black;background-color: #b7ff70;">บริการ</a></li>
  <li><a data-toggle="tab" href="#menu4" style="color :black;background-color: #70ffe0;">ร้านอาหาร</a></li>
  <li><a data-toggle="tab" href="#menu5" style="color :black;background-color: #708eff;">ที่พัก</a></li>
  <li><a data-toggle="tab" href="#menu6" style="color :black;background-color: #ff70c8;">เทศกาล</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <h3>บทความแนะนำ</h3>
    <p></p>
    <div class="row">
      <div class="col-sm-4 portfolio-item text-center">

              <img src="img/portfolio/วัด.png" class="img-responsive" alt="Game controller">
              <h2 style="text-align: center;">วัดพระธาตุเชิงชุม</h2>
              <p style="text-align: center;">ภายในวัดมีสิ่งศักดิ์สิทธิ์สำคัญของจังหวัด ได้แก่ พระธาตุเชิงชุม หลวงพ่อองค์แสน บ่อน้ำศักดิ์สิทธิ์</p>
              <input type="number" name="your_awesome_parameter" id="rating-readonly" class="rating" data-clearable="remove" value="<?php echo $row["score_point"]; ?>" data-readonly/>
              <p><a href="#" class="btn btn-default" role="button">ดูรายละเอียด</a></p>


      </div>
      <div class="col-sm-4 portfolio-item text-center">

              <img src="img/portfolio/หนองหาร.png" class="img-responsive" alt="Safe">
              <h2 style="text-align: center;">หนองหาร</h2>
              <p style="text-align: center;">เป็นหนองน้ำขนาดใหญ่ เป็นแห่งประมง ที่พักผ่อนหย่อนใจ ของชาวสกลนครมีตำนานถึง พยานาคเป็นผู้ทำลายเมืองจนยุบตัวลงเป็นหนองหารในที่สุดิ์</p>
              <input type="number" name="your_awesome_parameter" id="rating-readonly" class="rating" data-clearable="remove" value="<?php echo $row["score_point"]; ?>" data-readonly/>
              <p><a href="#" class="btn btn-default" role="button">ดูรายละเอียด</a></p>

      </div>
      <div class="col-sm-4 portfolio-item text-center">

              <img src="img/portfolio/หมู่บ้าน.png" class="img-responsive" alt="Submarine">
              <h2 style="text-align: center;">ย่านชุมชนโบราณท่าแร่</h2>
              <p style="text-align: center;">ท่าแร่เป็นเมืองโบราณของชาวเวียดนาม  มีอาคารบ้านเรือนแบบโบราณมากมาย ห่างจากตัวเมืองประมาณ 21 กม. เป็นหมู่บ้านที่มีประชากรนับถือคริสต์มากที่สุดในประเทศไทย</p>
              <input type="number" name="your_awesome_parameter" id="rating-readonly" class="rating" data-clearable="remove" value="<?php echo $row["score_point"]; ?>" data-readonly/>
              <p><a href="#" class="btn btn-default" role="button">ดูรายละเอียด</a></p>


      </div>
    </div>
  </div>

  <div id="menu1" class="tab-pane fade">
    <h3>ท่องเที่ยว</h3>
    <p></p>
    <div class="row">
      <div class="col-sm-4 portfolio-item text-center">

              <img src="img/portfolio/โฮงเจ้าฟองคำ.png" class="img-responsive" alt="Safe">
              <h2 style="text-align: center;">โฮงเจ้าฟองคำ</h2>
              <p style="text-align: center;">เดิมเป็นบ้านพักของ เจ้าศรีตุมมา-หลานเจ้ามหาวงศ์ อยู่ติดกับคุ้มแก้ว ที่พำนักของเจ้าผู้ครองนครน่านในเวียงเหนือ</p>
              <input type="number" name="your_awesome_parameter" id="rating-readonly" class="rating" data-clearable="remove" value="<?php echo $row["score_point"]; ?>" data-readonly/>
              <p><a href="#" class="btn btn-default" role="button">ดูรายละเอียด</a></p>

      </div>
      <div class="col-sm-4 portfolio-item text-center">

              <img src="img/portfolio/ประตู.png" class="img-responsive" alt="Safe">
              <h2 style="text-align: center;">เขื่อนกั้นน้ำอุทกวิภาชประสิทธิ์</h2>
              <p style="text-align: center;">โครงการพัฒนาพื้นที่ลุ่มน้ำปากพนัง อันเนื่องมาจากพระราชดำริ ที่เปรียบเสมือนอู่ข้าวอู่น้ำในพื้นที่ภาคใต้</p>
              <input type="number" name="your_awesome_parameter" id="rating-readonly" class="rating" data-clearable="remove" value="<?php echo $row["score_point"]; ?>" data-readonly/>
              <p><a href="#" class="btn btn-default" role="button">ดูรายละเอียด</a></p>

      </div>
      <div class="col-sm-4 portfolio-item text-center">

              <img src="img/portfolio/ตลาด.png" class="img-responsive" alt="Safe">
              <h2 style="text-align: center;">ตลาด 100 ปี เมืองปากพนัง</h2>
              <p style="text-align: center;">ตลาดสด และศูนย์จำหน่ายของฝากประจำจังหวัด มีตั้งแต่ของสดจากทะเลทั้ง ปลา ปู กุ้ง หอย ผักพื้นเมือง ไปจนถึง กุ้งแห้ง กะปิ ขนมลา และผลไม้ชนิดต่างๆ</p>
              <input type="number" name="your_awesome_parameter" id="rating-readonly" class="rating" data-clearable="remove" value="<?php echo $row["score_point"]; ?>" data-readonly/>
              <p><a href="#" class="btn btn-default" role="button">ดูรายละเอียด</a></p>

      </div>
    </div>
  </div>
  <div id="menu2" class="tab-pane fade">
    <h3>สินค้า</h3>

    <div class="row">
      <div class="col-sm-4 portfolio-item">

              <img src="img/portfolio/1.png" class="img-responsive" alt="Game controller">


      </div>
      <div class="col-sm-4 portfolio-item">

              <img src="img/portfolio/1.png" class="img-responsive" alt="Safe">


      </div>
      <div class="col-sm-4 portfolio-item">

              <img src="img/portfolio/1.png" class="img-responsive" alt="Submarine">


      </div>
    </div>
  </div>
  <div id="menu3" class="tab-pane fade">
    <h3>บริการ</h3>

    <div class="row">
      <div class="col-sm-4 portfolio-item">

              <img src="img/portfolio/1.png" class="img-responsive" alt="Game controller">


      </div>
      <div class="col-sm-4 portfolio-item">

              <img src="img/portfolio/1.png" class="img-responsive" alt="Safe">


      </div>
      <div class="col-sm-4 portfolio-item">

              <img src="img/portfolio/1.png" class="img-responsive" alt="Submarine">


      </div>
    </div>
  </div>
  <div id="menu4" class="tab-pane fade">
    <h3>ร้านอาหาร</h3>

    <div class="row">
      <div class="col-sm-4 portfolio-item">

              <img src="img/portfolio/1.png" class="img-responsive" alt="Game controller">


      </div>
      <div class="col-sm-4 portfolio-item">

              <img src="img/portfolio/1.png" class="img-responsive" alt="Safe">


      </div>
      <div class="col-sm-4 portfolio-item">

              <img src="img/portfolio/1.png" class="img-responsive" alt="Submarine">


      </div>
    </div>
  </div>
  <div id="menu5" class="tab-pane fade">
    <h3>ที่พัก</h3>

    <div class="row">
      <div class="col-sm-4 portfolio-item">

              <img src="img/portfolio/1.png" class="img-responsive" alt="Game controller">


      </div>
      <div class="col-sm-4 portfolio-item">

              <img src="img/portfolio/1.png" class="img-responsive" alt="Safe">


      </div>
      <div class="col-sm-4 portfolio-item">

              <img src="img/portfolio/1.png" class="img-responsive" alt="Submarine">


      </div>
    </div>
  </div>
  <div id="menu6" class="tab-pane fade">
    <h3>เทศกาล</h3>

    <div class="row">
      <div class="col-sm-4 portfolio-item">

              <img src="img/portfolio/1.png" class="img-responsive" alt="Game controller">


      </div>
      <div class="col-sm-4 portfolio-item">

              <img src="img/portfolio/1.png" class="img-responsive" alt="Safe">


      </div>
      <div class="col-sm-4 portfolio-item">

              <img src="img/portfolio/1.png" class="img-responsive" alt="Submarine">


      </div>
    </div>
  </div>
</div>


<!-- ฟูทเตอร์ -->
<div class="row" style="background-color: #eeeeee;">
  <div class="col-md-12 col-xs-12 text-center">
    <br>
    © 2017 Copyright: <a href="https://www.gotravel.com"> GoTravel.com </a>
    <p><br></p>
  </div>


</div>



<!-- โมดัลเข้าสู่ระบบ -->
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
            <label for="inputUsername" class="control-label">ชื่อผู้ใช้งาน</label>
            <input type="text" class="form-control" id="inputUsername" placeholder="กรุณากรอกชื่อผู้ใช้งาน">
          </div>
          <div class="form-group">
            <label for="inputPassword" class="control-label">รหัสผ่าน</label>
            <input type="password" class="form-control" id="inputPassword" placeholder="กรุณากรอกรหัสผ่าน">

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">เข้าสู่ระบบ</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>

      </div>
    </div>
  </div>
</div>



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
            <label for="registerUsername" class="control-label">ชื่อผู้ใช้งาน</label>
            <input type="text" class="form-control" id="registerUserename" placeholder="กรุณากรอกชื่อผู้ใช้งาน">
          </div>
          <div class="form-group">
            <label for="registerPassword" class="control-label">รหัสผ่าน</label>
            <input type="password" class="form-control" id="registerPassword" placeholder="กรุณากรอกรหัสผ่าน">
          </div>
          <div class="form-group">
            <label for="registerName" class="control-label">ชื่อ</label>
            <input type="text" class="form-control" id="registerName" placeholder="กรุณากรอกชื่อ">
          </div>
          <div class="form-group">
            <label for="registerLastname" class="control-label">นามสกุล</label>
            <input type="text" class="form-control" id="registerLastname" placeholder="กรุณากรอกนามสกุล">
          </div>

          <div class="form-group">
            <label class="radio-inline"><input type="radio" id="registerMale" name="optradio">ชาย</label>
            <label class="radio-inline"><input type="radio" id="registerFemale" name="optradio">หญิง</label>
          </div>

          <div class="form-group">
            <label for="registerETC" class="control-label">etc.</label>
            <input type="text" class="form-control" id="registerETC" placeholder="etc.">
          </div>


        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">สมัครสมาชิก</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>

      </div>
    </div>
  </div>
</div>





<!-- ปิดคอนเทนเนอร์ -->
    </div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <!-- สคริปดาว -->
    <script src="build/bootstrap-rating-input.min.js"></script>
  </body>
</html>
