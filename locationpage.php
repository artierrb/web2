<!DOCTYPE html>
<?php
$con = @mysqli_connect("localhost", "root","", "web2")
or die("Cannot connect to MySQL Server");

mysqli_query($con, "set names utf8");

//echo "connect database successfully<br>";
$query = "SELECT * FROM tblTravel" or die("Error:" . mysqli_error());
$id = $_GET['id'];
$sql = "SELECT * FROM tbllocation INNER JOIN tbllocation_image ON tbllocation.location_id=tbllocation_image.location_id
                                                         INNER JOIN tblvote_comment ON tbllocation.location_id=tblvote_comment.location_id
                                                         WHERE tbllocation_image.location_id='$id'";


$resultlocationimage = mysqli_query($con, "SELECT * FROM tbllocation_image WHERE location_id='$id'");

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
                <div id="ภาพท่องเที่ยว" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#ภาพท่องเที่ยว" data-slide-to="0" class="active"></li>
                    <li data-target="#ภาพท่องเที่ยว" data-slide-to="1"></li>
                    <li data-target="#ภาพท่องเที่ยว" data-slide-to="2"></li>
                    <li data-target="#ภาพท่องเที่ยว" data-slide-to="3"></li>
                    <li data-target="#ภาพท่องเที่ยว" data-slide-to="4"></li>
                    <li data-target="#ภาพท่องเที่ยว" data-slide-to="5"></li>
                  </ol>

                  <?php
                  while($rowlocationimage = mysqli_fetch_array($resultlocationimage)) {
                    # code...
                   ?>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    <div class="item active">
                      <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                        <img src="<?php echo $rowlocationimage["location_image_file"]; ?>" class="img-responsive" width="100%">
                      </a>

                    </div>
                  </div>

                  <?php
                  }
                   ?>
