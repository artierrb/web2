<!DOCTYPE html>
<?php
$con = @mysqli_connect("localhost", "root","", "web2")
or die("Cannot connect to MySQL Server");

mysqli_query($con, "set names utf8");

//echo "connect database successfully<br>";
$query = "SELECT * FROM tblTravel" or die("Error:" . mysqli_error());
$id = $_GET['id'];
$sql = "SELECT * FROM tblTravel WHERE Attraction_ID='$id'";
$sql3 = "SELECT * FROM tblProduct WHERE Product_ID='$id'";
$sqlservice = "SELECT * FROM tblService WHERE Service_ID='$id'";
$sqlrestaurant = "SELECT * FROM tblRestaurant WHERE Restaurant_ID='$id'";
$sqlhotel = "SELECT * FROM tblHotel WHERE Hotel_ID='$id'";
$sqlfestival = "SELECT * FROM tblFestival WHERE Festival_ID='$id'";
$result = mysqli_query($con, $query);
$result2 = mysqli_query($con, $sql);
$result3 = mysqli_query($con, $sql3);
$resultservice = mysqli_query($con, $sqlservice);
$resultrestaurant = mysqli_query($con, $sqlrestaurant);
$resulthotel = mysqli_query($con, $sqlhotel);
$resultfestival = mysqli_query($con, $sqlfestival);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
$row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
$rowservice = mysqli_fetch_array($resultservice, MYSQLI_ASSOC);
$rowrestaurant = mysqli_fetch_array($resultrestaurant, MYSQLI_ASSOC);
$rowhotel = mysqli_fetch_array($resulthotel, MYSQLI_ASSOC);
$rowfestival = mysqli_fetch_array($resultfestival, MYSQLI_ASSOC);

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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <title>Go! Travel.com</title>


    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style media="screen">
    @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
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
      th, td {
        padding: 3px;
        text-align: left;
      }
      .animated {
        -webkit-transition: height 0.2s;
        -moz-transition: height 0.2s;
        transition: height 0.2s;
      }

      .stars
      {
        margin: 20px 0;
        font-size: 24px;
        color: #d17581;
      }



fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

.rating {
  border: none;
  float: top-right;
}

.rating > input { display: none; }
.rating > label:before {
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before {
  content: "\f089";
  position: absolute;
}

.rating > label {
  color: #ddd;
 float: right;
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  }


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


<div class="col-md-3">
ประเภทการท่องเที่ยว
</div>
<div class="col-md-3">
  <div class="panel panel-default">
    <div class="panel-body">
      ประเภทการท่องเที่ยว
    </div>
    <div class="panel-footer">การท่องเที่ยวเชิงวัฒนธรรม</div>
    <div class="panel-footer">การท่องเที่ยวเชิงนิเวศ</div>
    <div class="panel-footer">การท่องเที่ยวเชิงเกษตร</div>
  </div>

</div>
<div class="col-md-3">
  <div class="panel panel-default">
    <div class="panel-body">
      etc...
    </div>
    <div class="panel-footer">etc...</div>
    <div class="panel-footer">etc...</div>
    <div class="panel-footer">etc...</div>
  </div>

</div>
<div class="col-md-3">
  <div class="panel panel-default">
    <div class="panel-body">
      etc...
    </div>
    <div class="panel-footer">etc...</div>
    <div class="panel-footer">etc...</div>
    <div class="panel-footer">etc...</div>
  </div>

</div>


  <div class="col-md-3">
  เลือกรูปภาพ
  </div>


  <div class="col-md-9">
    <div class="row">
      <div class="col-md-3">
        <a href="#" class="thumbnail">
          <img src="img/171x180.jpg" alt="...">
        </a>
        <p><a href="#" class="btn btn-primary" role="button">Browse...</a></p>
      </div>
      <div class="col-md-3">
        <a href="#" class="thumbnail">
          <img src="img/171x180.jpg" alt="...">
        </a>
        <p><a href="#" class="btn btn-primary" role="button">Browse...</a></p>
      </div>
      <div class="col-md-3">
        <a href="#" class="thumbnail">
          <img src="img/171x180.jpg" alt="...">
        </a>
        <p><a href="#" class="btn btn-primary" role="button">Browse...</a></p>
      </div>
      <div class="col-md-3">
        <a href="#" class="thumbnail">
          <img src="img/171x180.jpg" alt="...">
        </a>
        <p><a href="#" class="btn btn-primary" role="button">Browse...</a></p>
      </div>

    </div>
  </div>

  <div class="col-md-3">
  คำอธิบายภาพที่ 1
  </div>
  <div class="col-md-9">
    <input type="text" name="" value="" size="">
  </div>
  <div class="col-md-12">
    <br>
  </div>
  <div class="col-md-3">
  คำอธิบายภาพที่ 2
  </div>
  <div class="col-md-9">
    <input type="text" name="" value="" size="">
  </div>
  <div class="col-md-12">
    <br>
  </div>
  <div class="col-md-3">
  คำอธิบายภาพที่ 3
  </div>
  <div class="col-md-9">
    <input type="text" name="" value="" size="">
  </div>
  <div class="col-md-12">
    <br>
  </div>
  <div class="col-md-3">
  คำอธิบายภาพที่ 4
  </div>
  <div class="col-md-9">
    <input type="text" name="" value="" size="">
  </div>
  <div class="col-md-12">
    <br>
  </div>
  <div class="col-md-3">
  คำอธิบายภาพที่ 5
  </div>
  <div class="col-md-9">
    <input type="text" name="" value="" size="">
  </div>
  <div class="col-md-12">
    <br>
  </div>
  <div class="col-md-3">
  คำอธิบายภาพที่ 6
  </div>
  <div class="col-md-9">
    <input type="text" name="" value="" size="">
  </div>
  <div class="col-md-12">
    <br>
  </div>
  <div class="col-md-3">
  คำอธิบายภาพที่ 7
  </div>
  <div class="col-md-9">
    <input type="text" name="" value="" size="">
  </div>
  <div class="col-md-12">
    <br>
  </div>
  <div class="col-md-3">
  คำอธิบายภาพที่ 8
  </div>
  <div class="col-md-9">
    <input type="text" name="" value="" size="">
  </div>
  <div class="col-md-12">
    <br>
  </div>









<div class="col-md-12">
  <br>

</div>






<!-- ฟูทเตอร์ -->
<div class="container">
  <div class="row">
    <div class="col-md-12 col-xs-12 text-center" style="background-color: #eeeeee;">

        <br>
        © 2017 Copyright: <a href="https://www.gotravel.com"> GoTravel.com </a>
        <p><br></p>



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
