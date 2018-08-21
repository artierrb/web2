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
$query = "SELECT * FROM page" or die("Error:" . mysqli_error());
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);


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
      .carousel-caption {
      position: relative;
      left: auto;
      right: auto;
      }





    </style>
  </head>

  <body>

<!-- เปิดคอนเทนเนอร์ -->
    <div class="container">

<!-- เฮดเดอร์ -->
    <div class="row">
      <div class="col-md-3 col-xs-12 visible-xs-*">
        <img src="img/portfolio/go.png" class="img-responsive" alt="Slice of cake" width="100%">

      </div>
      <div class="col-md-9 hidden-xs">
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
      <a class="navbar-brand" href="index.php">หน้าหลัก</a>
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

<!-- ไดนามิคแท็ป -->

<ul class="nav nav-tabs" style="color :black;">
  <li class="active"><a data-toggle="tab" href="#home" style="color :black;background-color: #ff8570;">ท่องเที่ยว</a></li>
  <li><a data-toggle="tab" href="#menu1" style="color :black;background-color: #ffee70;">สินค้า</a></li>
  <li><a data-toggle="tab" href="#menu2" style="color :black;background-color: #b7ff70;">บริการ</a></li>
  <li><a data-toggle="tab" href="#menu3" style="color :black;background-color: #70ffe0;">ร้านอาหาร</a></li>
  <li><a data-toggle="tab" href="#menu4" style="color :black;background-color: #708eff;">ที่พัก</a></li>
  <li><a data-toggle="tab" href="#menu5" style="color :black;background-color: #ff70c8;">เทศกาล</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <h3>ท่องเที่ยว</h3>
    <p></p>
    <!-- คารูเซล -->
    <div class="col-md-6">
      <div class="">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            <li data-target="#carousel-example-generic" data-slide-to="4"></li>
            <li data-target="#carousel-example-generic" data-slide-to="5"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $row["p_img1"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $row["p_img2"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $row["p_img3"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $row["p_img4"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $row["p_img5"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $row["p_img6"]; ?>" class="img-responsive" width="100%">
              </a>

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

    <div class="col-md-6">
      <h3><?php echo $row["p_header"]; ?></h3>
      <label>ที่อยู่ : </label> <?php echo $row["p_address"]; ?>
      <br>
      <label>รายละเอียด : </label> <?php echo $row["p_info"]; ?>
      <br>
      <label>ค่าบริการ :</label> <?php echo $row["p_price"]; ?>
      <br>
      <label>จุดสังเกต :</label> <?php echo $row["p_lm"]; ?>
    </div>
    <div class="col-md-12">
      <br>
    </div>


      <div class="col-md-6">
        <h3>การเดินทาง</h3>
        <?php echo $row["p_travel"]; ?>
      </div>

      <div class="col-md-6 hidden-xs text-center">
        <iframe src=" <?php echo $row["p_map"]; ?>"
        width="550" height="450" frameborder="0" style="border:0" ></iframe>
      </div>
      <div class="col-xs-12 visible-xs-* hidden-md hidden-lg hidden-sm text-center">
        <iframe src="<?php echo $row["p_map"]; ?>"
        width="100%" height="100%" frameborder="0" style="border:0" ></iframe>
      </div>

  </div>
<div class="container text-center">


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div id="carousel-example-generic2" class="carousel slide" data-ride="carousel">



  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
     <img src="<?php echo $row["p_img1"]; ?>" class="img-responsive" width="100%">
      <div class="carousel-caption"  style="color:black;">
        <h1>Farm Hug</h1>
        <?php echo $row["p_imginfo1"]; ?>
      </div>
    </div>
    <div class="item">
      <img src="<?php echo $row["p_img2"]; ?>" class="img-responsive" width="100%">
      <div class="carousel-caption"  style="color:black;">
        <h1>Farm Hug</h1>
        <?php echo $row["p_imginfo2"]; ?>
      </div>
    </div>
    <div class="item">
      <img src="<?php echo $row["p_img3"]; ?>" class="img-responsive" width="100%">
      <div class="carousel-caption"  style="color:black;">
        <h1>Farm Hug</h1>
        <?php echo $row["p_imginfo3"]; ?>
      </div>
    </div>
    <div class="item">
      <img src="<?php echo $row["p_img4"]; ?>" class="img-responsive" width="100%">
      <div class="carousel-caption"  style="color:black;">
        <h1>Farm Hug</h1>
        <?php echo $row["p_imginfo4"]; ?>
      </div>
    </div>
    <div class="item">
      <img src="<?php echo $row["p_img5"]; ?>" class="img-responsive" width="100%">
      <div class="carousel-caption"  style="color:black;">
        <h1>Farm Hug</h1>
        <?php echo $row["p_imginfo5"]; ?>
      </div>
    </div>
    <div class="item">
      <img src="<?php echo $row["p_img6"]; ?>" class="img-responsive" width="100%">
      <div class="carousel-caption"  style="color:black;">
        <h1>Farm Hug</h1>
        <?php echo $row["p_imginfo6"]; ?>
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic2" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic2" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
    </div>
  </div>
</div>
</div>
  <div id="menu1" class="tab-pane fade">
    <h3>สินค้า</h3>
    <div class="col-md-6">
      <div class="">
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
              <img src="img/p1/10.jpg" class="img-responsive" width="100%">
              <div class="carousel-caption">
                <label>Farm Hug</label>
              </div>
            </div>
            <div class="item">
              <img src="img/p1/11.jpg" class="img-responsive" width="100%">
              <div class="carousel-caption">
                <label>Farm Hug</label>
              </div>
            </div>
            <div class="item">
              <img src="img/p1/8.jpg" class="img-responsive" width="100%">
              <div class="carousel-caption">
                <label>Farm Hug</label>
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

    <div class="col-md-6">
      <h3>ร้านโคขุนคุณทอง ฟาร์มฮัก</h3>
      <label>รายละเอียดสินค้า : </label> มีตั้งแต่ตุ๊กตา ของเล่นที่ระลึก นมในแพ็คเกจวินเทจเก๋ ๆ ผลิตภัณฑ์เนื้อจากฟาร์ม
      <br>
      <label>ราคาสินค้า : </label> 25 - 800 บาท
      <br>
      <label>ที่อยู่ :</label> ร้านโคขุนคุณทอง หน้าฟาร์มฮัก
      <br>

    </div>
    <div class="col-md-12">
      <br>
    </div>
  </div>
  <div id="menu2" class="tab-pane fade">
    <h3>บริการ</h3>
    <div class="col-md-6">
      <div class="">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>

          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="img/p1/13.jpg" class="img-responsive" width="100%">
              <div class="carousel-caption">
                <label>Farm Hug</label>
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

    <div class="col-md-6">
      <h3>บริการสปาเท้า</h3>
      <label>รายละเอียดบริการ : </label> มีบริการสปาเท้า บริการนวดน้ำมัน และบริการนวดแผนไทย
      <br>
      <label>ราคาบริการ : </label> 450 - 2500 บาท
      <br>
      <label>ที่อยู่ :</label> ร้านสปาคุณทอง บริเวณข้างฟาร์มแกะ
      <br>

    </div>
    <div class="col-md-12">
      <br>
    </div>
  </div>
  <div id="menu3" class="tab-pane fade">
    <h3>ร้านอาหาร</h3>
    <div class="col-md-6">
      <div class="">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>

          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="img/p1/12.jpg" class="img-responsive" width="100%">
              <div class="carousel-caption">
                <label>Farm Hug</label>
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

    <div class="col-md-6">
      <h3>ร้านโคขุนคุณทอง โคขุน สเต็ก และสลัดบาร์</h3>
      <label>รายละเอียดร้านอาหาร : </label> มีบริการอาหารประเภทเนื้อวัวโคขุน สเต็ก และสลัดบาร์
      <br>
      <label>อาหารแนะนำ : </label> Tomahawk Ribeye Steak
      <br>
      <label>ที่อยู่ :</label> ร้านโคขุนคุณทอง บริเวณหน้าฟาร์มแกะ
      <br>
      <label>ข้อมูลติดต่อ :</label> 091-111-1111
      <br>
      <label>เว็บไซต์ :</label> <a href="#">http://www.nusr-et.com.tr/en/home.aspx</a>
      <br>
      <label>ช่วงเวลาเปิดทำการ :</label> 11.00 - 22.00 น.
      <br>
      <label>รูปแบบ :</label> ฟรีโฟล - อาลาคาร์ท
      <br>

    </div>
    <div class="col-md-12">
      <br>
    </div>
  </div>
  <div id="menu4" class="tab-pane fade">
    <h3>ที่พัก</h3>
    <div class="col-md-6">
      <div class="">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>

          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="img/p1/12.jpg" class="img-responsive" width="100%">
              <div class="carousel-caption">
                <label>Farm Hug</label>
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

    <div class="col-md-6">
      <h3>ร้านโคขุนคุณทอง โคขุนและสเต็กบาร์</h3>
      <label>รายละเอียดบริการ : </label> มบริการสปาเท้า บริการนวดน้ำมัน และบริการนวดแผนไทย
      <br>
      <label>ราคาบริการ : </label> 450 - 2500 บาท
      <br>
      <label>ที่อยู่ :</label> ร้านสปาคุณทอง บริเวณข้างฟาร์มแกะ
      <br>

    </div>
    <div class="col-md-12">
      <br>
    </div>
  </div>
  <div id="menu5" class="tab-pane fade">
    <h3>เทศกาล</h3>
    <div class="col-md-6">
      <div class="">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>

          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="img/p1/13.jpg" class="img-responsive" width="100%">
              <div class="carousel-caption">
                <label>Farm Hug</label>
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

    <div class="col-md-6">
      <h3>บริการสปาเท้า</h3>
      <label>รายละเอียดบริการ : </label> มบริการสปาเท้า บริการนวดน้ำมัน และบริการนวดแผนไทย
      <br>
      <label>ราคาบริการ : </label> 450 - 2500 บาท
      <br>
      <label>ที่อยู่ :</label> ร้านสปาคุณทอง บริเวณข้างฟาร์มแกะ
      <br>

    </div>
    <div class="col-md-12">
      <br>
    </div>
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


<div class="col-md-12">
  <br>
</div>

<!-- ฟูทเตอร์ -->
<div class="col-md-12 col-xs-12 text-center" style="background-color: #eeeeee;">

    <br>
    © 2017 Copyright: <a href="https://www.gotravel.com"> GoTravel.com </a>
    <p><br></p>



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
