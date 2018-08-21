<!DOCTYPE html>
<?php
$con = @mysqli_connect("localhost", "root","", "web2")
or die("Cannot connect to MySQL Server");

mysqli_query($con, "set names utf8");

//echo "connect database successfully<br>";
$query = "SELECT * FROM tblTravel" or die("Error:" . mysqli_error());
$id = $_GET['id'];

$comment = mysqli_query($con, "SELECT * FROM tblvote_comment INNER JOIN tblmember ON tblvote_comment.member_id=tblmember.member_id WHERE location_id='$id'");
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Go! Travel.com</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style media="screen">
    @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

      body {
        font-family: 'Leelawadee UI' , sans-serif;
        font-size: 200%;
      }
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
  float: top-left;
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
<div class="visible-xs">
      <button type="button" class="btn btn-info btn-lg btn-block" data-toggle="collapse" data-target="#info">ข้อมูลที่เกี่ยวข้อง</button>
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>

<div class="collapse navbar-collapse" id="info">

<ul class="nav navbar-nav" style="color :black;">
  <li class="active"><a data-toggle="tab" href="#home" style="color :black;background-color: #ff8570;">ท่องเที่ยว</a></li>
  <li><a data-toggle="tab" href="#menu1" style="color :black;background-color: #ffee70;">สินค้า</a></li>
  <li><a data-toggle="tab" href="#menu2" style="color :black;background-color: #b7ff70;">บริการ</a></li>
  <li><a data-toggle="tab" href="#menu3" style="color :black;background-color: #70ffe0;">ร้านอาหาร</a></li>
  <li><a data-toggle="tab" href="#menu4" style="color :black;background-color: #708eff;">ที่พัก</a></li>
  <li><a data-toggle="tab" href="#menu5" style="color :black;background-color: #ff70c8;">เทศกาล</a></li>
</ul>
</div>

</div>

<div class="visible-lg">
<ul class="nav nav-tabs" style="color :black;">
  <li class="active"><a data-toggle="tab" href="#home" style="color :black;background-color: #ff8570;">ท่องเที่ยว</a></li>
  <li><a data-toggle="tab" href="#menu1" style="color :black;background-color: #ffee70;">สินค้า</a></li>
  <li><a data-toggle="tab" href="#menu2" style="color :black;background-color: #b7ff70;">บริการ</a></li>
  <li><a data-toggle="tab" href="#menu3" style="color :black;background-color: #70ffe0;">ร้านอาหาร</a></li>
  <li><a data-toggle="tab" href="#menu4" style="color :black;background-color: #708eff;">ที่พัก</a></li>
  <li><a data-toggle="tab" href="#menu5" style="color :black;background-color: #ff70c8;">เทศกาล</a></li>
</ul>
</div>

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

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $row2["Attraction_Img1"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $row2["Attraction_Img2"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $row2["Attraction_Img3"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $row2["Attraction_Img4"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $row2["Attraction_Img5"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $row2["Attraction_Img6"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>

          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#ภาพท่องเที่ยว" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#ภาพท่องเที่ยว" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-6">

      <table style="width:100%">
        <tr>
          <th colspan="2"><h3><?php echo $row2["Attraction_Header"]; ?></h3></th>
        </tr>
        <tr>
          <td width="125"><label>รายละเอียด :</label></td>
          <td></label> <?php echo $row2["Attraction_Info"]; ?></td>
        </tr>
        <tr>
          <td><label>ที่อยู่ :</label></td>
          <td></label> <?php echo $row2["Attraction_Address"]; ?></td>
        </tr>

        <tr>
          <td><label>ค่าบริการ :</label></td>
          <td></label> <?php echo $row2["Attraction_Fee"]; ?></td>
        </tr>
        <tr>
          <td><label>จุดสังเกต :</label></td>
          <td></label> <?php echo $row2["Attraction_Nearlm"]; ?></td>
        </tr>
      </table>


    </div>
    <div class="col-md-12">
      <br>
    </div>


      <div class="col-md-6">
        <h3>การเดินทาง</h3>
        <?php echo $row2["Attraction_Travel"]; ?>
      </div>
<br>

      <div class="col-md-6 hidden-xs text-center">
        <iframe src=" <?php echo $row2["Attraction_Map"]; ?>"
        width="550" height="450" frameborder="0" style="border:0" ></iframe>
      </div>
      <div class="col-xs-12 hidden-md hidden-lg hidden-sm text-center">
        <iframe src="<?php echo $row2["Attraction_Map"]; ?>"
        width="100%" height="100%" frameborder="0" style="border:0" ></iframe>
      </div>

  </div>


<div class="container text-center">


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div id="ท่องเที่ยว" class="carousel slide" data-ride="carousel">



  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
     <img src="<?php echo $row2["Attraction_Img1"]; ?>" class="img-responsive" width="100%">
      <div class="carousel-caption"  style="color:black;">
        <h1>  <?php echo $row2["Attraction_Header"]; ?></h1>
        <?php echo $row2["Attraction_Imginfo1"]; ?>
      </div>
    </div>
    <div class="item">
      <img src="<?php echo $row2["Attraction_Img2"]; ?>" class="img-responsive" width="100%">
      <div class="carousel-caption"  style="color:black;">
        <h1>  <?php echo $row2["Attraction_Header"]; ?></h1>
        <?php echo $row2["Attraction_Imginfo2"]; ?>
      </div>
    </div>
    <div class="item">
      <img src="<?php echo $row2["Attraction_Img3"]; ?>" class="img-responsive" width="100%">
      <div class="carousel-caption"  style="color:black;">
        <h1>  <?php echo $row2["Attraction_Header"]; ?></h1>
        <?php echo $row2["Attraction_Imginfo3"]; ?>
      </div>
    </div>
    <div class="item">
      <img src="<?php echo $row2["Attraction_Img4"]; ?>" class="img-responsive" width="100%">
      <div class="carousel-caption"  style="color:black;">
        <h1>  <?php echo $row2["Attraction_Header"]; ?></h1>
        <?php echo $row2["Attraction_Imginfo4"]; ?>
      </div>
    </div>
    <div class="item">
      <img src="<?php echo $row2["Attraction_Img5"]; ?>" class="img-responsive" width="100%">
      <div class="carousel-caption"  style="color:black;">
        <h1>  <?php echo $row2["Attraction_Header"]; ?></h1>
        <?php echo $row2["Attraction_Imginfo5"]; ?>
      </div>
    </div>
    <div class="item">
      <img src="<?php echo $row2["Attraction_Img6"]; ?>" class="img-responsive" width="100%">
      <div class="carousel-caption"  style="color:black;">
        <h1>  <?php echo $row2["Attraction_Header"]; ?></h1>
        <?php echo $row2["Attraction_Imginfo6"]; ?>
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#ท่องเที่ยว" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#ท่องเที่ยว" role="button" data-slide="next">
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
        <div id="สินค้า" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#สินค้า" data-slide-to="1" class="active"></li>
            <li data-target="#สินค้า" data-slide-to="2"></li>
            <li data-target="#สินค้า" data-slide-to="3"></li>
            <li data-target="#สินค้า" data-slide-to="4"></li>
            <li data-target="#สินค้า" data-slide-to="5"></li>
            <li data-target="#สินค้า" data-slide-to="6"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $row3["Product_Img1"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $row3["Product_Img2"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $row3["Product_Img3"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $row3["Product_Img4"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $row3["Product_Img5"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $row3["Product_Img6"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>

          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#สินค้า" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#สินค้า" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-6">

      <table style="width:100%">
        <tr>
          <th colspan="2"><h3><?php echo $row3["Product_Header"]; ?></h3></th>
        </tr>
        <tr>
          <td width="125"><label>รายละเอียดสินค้า :</label></td>
          <td></label> <?php echo $row3["Product_Header"]; ?></td>
        </tr>
        <tr>
          <td><label>ราคาสินค้า :</label></td>
          <td></label> <?php echo $row3["Product_Price"]; ?></td>
        </tr>

        <tr>
          <td><label>ที่อยู่ :</label></td>
          <td></label> <?php echo $row3["Product_Address"]; ?></td>
        </tr>

      </table>

      <div class="container text-center">


      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div id="มอดัลสินค้า" class="carousel slide" data-ride="carousel">



        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
           <img src="<?php echo $row3["Product_Img1"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $row3["Product_Header"]; ?></h1>
              <?php echo $row3["Product_Imginfo1"]; ?>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo $row3["Product_Img2"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $row3["Product_Header"]; ?></h1>
              <?php echo $row3["Product_Imginfo2"]; ?>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo $row3["Product_Img3"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $row3["Product_Header"]; ?></h1>
              <?php echo $row3["Product_Imginfo3"]; ?>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo $row3["Product_Img4"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $row3["Product_Header"]; ?></h1>
              <?php echo $row3["Product_Imginfo4"]; ?>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo $row3["Product_Img5"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $row3["Product_Header"]; ?></h1>
              <?php echo $row3["Product_Imginfo5"]; ?>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo $row3["Product_Img6"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $row3["Product_Header"]; ?></h1>
              <?php echo $row3["Product_Imginfo6"]; ?>
            </div>
          </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#มอดัลสินค้า" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#มอดัลสินค้า" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>
          </div>
        </div>
      </div>
      </div>

    </div>
    <div class="col-md-12">
      <br>
    </div>
  </div>


  <div id="menu2" class="tab-pane fade">
    <h3>บริการ</h3>
    <div class="col-md-6">
      <div class="">
        <div id="บริการ" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#บริการ" data-slide-to="0" class="active"></li>
            <li data-target="#บริการ" data-slide-to="1"></li>
            <li data-target="#บริการ" data-slide-to="2"></li>
            <li data-target="#บริการ" data-slide-to="3"></li>
            <li data-target="#บริการ" data-slide-to="4"></li>
            <li data-target="#บริการ" data-slide-to="5"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $rowservice["Service_Img1"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $rowservice["Service_Img2"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $rowservice["Service_Img3"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $rowservice["Service_Img4"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $rowservice["Service_Img5"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $rowservice["Service_Img6"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>

          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#บริการ" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#บริการ" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-6">

      <table style="width:100%">
        <tr>
          <th colspan="2"><h3><?php echo $rowservice["Service_Header"]; ?></h3></th>
        </tr>
        <tr>
          <td width="125"><label>รายละเอียดบริการ :</label></td>
          <td></label> <?php echo $rowservice["Service_Info"]; ?></td>
        </tr>
        <tr>
          <td><label>ราคาบริการ :</label></td>
          <td></label> <?php echo $rowservice["Service_Price"]; ?></td>
        </tr>

        <tr>
          <td><label>ที่อยู่ :</label></td>
          <td></label> <?php echo $rowservice["Service_Address"]; ?></td>
        </tr>

      </table>

      <div class="container text-center">


      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div id="มอดัลบริการ" class="carousel slide" data-ride="carousel">



        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
           <img src="<?php echo $rowservice["Service_Img1"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $rowservice["Service_Header"]; ?></h1>
              <?php echo $rowservice["Service_Imginfo1"]; ?>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo $rowservice["Service_Img2"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $rowservice["Service_Header"]; ?></h1>
              <?php echo $rowservice["Service_Imginfo2"]; ?>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo $rowservice["Service_Img3"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $rowservice["Service_Header"]; ?></h1>
              <?php echo $rowservice["Service_Imginfo3"]; ?>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo $rowservice["Service_Img4"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $rowservice["Service_Header"]; ?></h1>
              <?php echo $rowservice["Service_Imginfo4"]; ?>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo $rowservice["Service_Img5"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $rowservice["Service_Header"]; ?></h1>
              <?php echo $rowservice["Service_Imginfo5"]; ?>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo $rowservice["Service_Img6"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $rowservice["Service_Header"]; ?></h1>
              <?php echo $rowservice["Service_Imginfo6"]; ?>
            </div>
          </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#มอดัลบริการ" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#มอดัลบริการ" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>
          </div>
        </div>
      </div>
      </div>

    </div>

    <div class="col-md-12">
      <br>
    </div>
  </div>
  <div id="menu3" class="tab-pane fade">
    <h3>ร้านอาหาร</h3>
    <div class="col-md-6">
      <div class="">
        <div id="ร้านอาหาร" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#ร้านอาหาร" data-slide-to="0" class="active"></li>
            <li data-target="#ร้านอาหาร" data-slide-to="1"></li>
            <li data-target="#ร้านอาหาร" data-slide-to="2"></li>
            <li data-target="#ร้านอาหาร" data-slide-to="3"></li>
            <li data-target="#ร้านอาหาร" data-slide-to="4"></li>
            <li data-target="#ร้านอาหาร" data-slide-to="5"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $rowrestaurant["Restaurant_Img1"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $rowrestaurant["Restaurant_Img2"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $rowrestaurant["Restaurant_Img3"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $rowrestaurant["Restaurant_Img4"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $rowrestaurant["Restaurant_Img5"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $rowrestaurant["Restaurant_Img6"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>

          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#ร้านอาหาร" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#ร้านอาหาร" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-6">

      <table style="width:100%">
        <tr>
          <th colspan="2"><h3><?php echo $rowrestaurant["Restaurant_Header"]; ?></h3></th>
        </tr>
        <tr>
          <td width="125"><label>รายละเอียดร้านอาหาร :</label></td>
          <td></label> <?php echo $rowrestaurant["Restaurant_Info"]; ?></td>
        </tr>
        <tr>
          <td><label>อาาหารแนะนำ :</label></td>
          <td></label> <?php echo $rowrestaurant["Restaurant_Recommend"]; ?></td>
        </tr>
        <tr>
          <td><label>ที่อยู่ :</label></td>
          <td></label> <?php echo $rowrestaurant["Restaurant_Address"]; ?></td>
        </tr>
        <tr>
          <td><label>ข้อมูลติดต่อ :</label></td>
          <td></label> <?php echo $rowrestaurant["Restaurant_Telephone"]; ?></td>
        </tr>
        <tr>
          <td><label>เว็บไซต์ :</label></td>
          <td></label> <?php echo $rowrestaurant["Restaurant_Website"]; ?></td>
        </tr>
        <tr>
          <td><label>ช่วงเวลาเปิดทำการ :</label></td>
          <td></label> <?php echo $rowrestaurant["Restaurant_Opening"]; ?></td>
        </tr>
        <tr>
          <td><label>รูปแบบ :</label></td>
          <td></label> <?php echo $rowrestaurant["Restaurant_Type"]; ?></td>
        </tr>

      </table>

      <div class="container text-center">


      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div id="มอดัลร้านอาหาร" class="carousel slide" data-ride="carousel">



        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
           <img src="<?php echo $rowrestaurant["Restaurant_Img1"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $rowrestaurant["Restaurant_Header"]; ?></h1>
              <?php echo $rowrestaurant["Restaurant_Info1"]; ?>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo $rowrestaurant["Restaurant_Img2"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $rowrestaurant["Restaurant_Header"]; ?></h1>
              <?php echo $rowrestaurant["Restaurant_Imginfo2"]; ?>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo $rowrestaurant["Restaurant_Img3"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $rowrestaurant["Restaurant_Header"]; ?></h1>
              <?php echo $rowrestaurant["Restaurant_Imginfo3"]; ?>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo $rowrestaurant["Restaurant_Img4"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $rowrestaurant["Restaurant_Header"]; ?></h1>
              <?php echo $rowrestaurant["Restaurant_Imginfo4"]; ?>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo $rowrestaurant["Restaurant_Img5"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $rowrestaurant["Restaurant_Header"]; ?></h1>
              <?php echo $rowrestaurant["Restaurant_Imginfo5"]; ?>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo $rowrestaurant["Restaurant_Img6"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $rowrestaurant["Restaurant_Header"]; ?></h1>
              <?php echo $rowrestaurant["Restaurant_Imginfo6"]; ?>
            </div>
          </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#มอดัลร้านอาหาร" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#มอดัลร้านอาหาร" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>
          </div>
        </div>
      </div>
      </div>

    </div>
    <div class="col-md-12">
      <br>
    </div>
  </div>
  <div id="menu4" class="tab-pane fade">
    <h3>ที่พัก</h3>
    <div class="col-md-6">
      <div class="">
        <div id="ที่พัก" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#ที่พัก" data-slide-to="0" class="active"></li>
            <li data-target="#ที่พัก" data-slide-to="1"></li>
            <li data-target="#ที่พัก" data-slide-to="2"></li>
            <li data-target="#ที่พัก" data-slide-to="3"></li>
            <li data-target="#ที่พัก" data-slide-to="4"></li>
            <li data-target="#ที่พัก" data-slide-to="5"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $rowhotel["Hotel_Img1"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $rowhotel["Hotel_Img2"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $rowhotel["Hotel_Img3"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $rowhotel["Hotel_Img4"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $rowhotel["Hotel_Img5"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $rowhotel["Hotel_Img6"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>

          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#ที่พัก" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#ที่พัก" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-6">

      <table style="width:100%">
        <tr>
          <th colspan="2"><h3><?php echo $rowhotel["Hotel_Header"]; ?></h3></th>
        </tr>
        <tr>
          <td width="125"><label>รายละเอียดที่พัก :</label></td>
          <td></label> <?php echo $rowhotel["Hotel_Info"]; ?></td>
        </tr>
        <tr>
          <td><label>ข้อมูลติดต่อ :</label></td>
          <td></label> <?php echo $rowhotel["Hotel_Telephone"]; ?></td>
        </tr>
        <tr>
          <td><label>ราคาเริ่มต้น :</label></td>
          <td></label> <?php echo $rowhotel["Hotel_Price"]; ?></td>
        </tr>


      </table>

      <div class="container text-center">


      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div id="มอดัลที่พัก" class="carousel slide" data-ride="carousel">



        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
           <img src="<?php echo $rowhotel["Hotel_Img1"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $rowhotel["Hotel_Header"]; ?></h1>
              <?php echo $rowhotel["Hotel_Imginfo1"]; ?>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo $rowhotel["Hotel_Img2"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $rowhotel["Hotel_Header"]; ?></h1>
              <?php echo $rowhotel["Hotel_Imginfo2"]; ?>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo $rowhotel["Hotel_Img3"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $rowhotel["Hotel_Header"]; ?></h1>
              <?php echo $rowhotel["Hotel_Imginfo3"]; ?>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo $rowhotel["Hotel_Img4"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $rowhotel["Hotel_Header"]; ?></h1>
              <?php echo $rowhotel["Hotel_Imginfo4"]; ?>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo $rowhotel["Hotel_Img5"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $rowhotel["Hotel_Header"]; ?></h1>
              <?php echo $rowhotel["Hotel_Imginfo5"]; ?>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo $rowhotel["Hotel_Img6"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $rowhotel["Hotel_Header"]; ?></h1>
              <?php echo $rowhotel["Hotel_Imginfo6"]; ?>
            </div>
          </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#มอดัลที่พัก" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#มอดัลที่พัก" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>
          </div>
        </div>
      </div>
      </div>

    </div>

    <div class="col-md-12">
      <br>
    </div>
  </div>
  <div id="menu5" class="tab-pane fade">
    <h3>เทศกาล</h3>
    <div class="col-md-6">
      <div class="">
        <div id="เทศกาล" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#เทศกาล" data-slide-to="0" class="active"></li>
            <li data-target="#เทศกาล" data-slide-to="1"></li>
            <li data-target="#เทศกาล" data-slide-to="2"></li>
            <li data-target="#เทศกาล" data-slide-to="3"></li>
            <li data-target="#เทศกาล" data-slide-to="4"></li>
            <li data-target="#เทศกาล" data-slide-to="5"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $rowfestival["Festival_Img1"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $rowfestival["Festival_Img2"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $rowfestival["Festival_Img3"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $rowfestival["Festival_Img4"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $rowfestival["Festival_Img5"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>
            <div class="item">
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
                <img src="<?php echo $rowfestival["Festival_Img6"]; ?>" class="img-responsive" width="100%">
              </a>

            </div>

          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#เทศกาล" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#เทศกาล" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-6">

      <table style="width:100%">
        <tr>
          <th colspan="2"><h3><?php echo $rowfestival["Festival_Header"]; ?></h3></th>
        </tr>
        <tr>
          <td width="125"><label>รายละเอียดเทศกาล :</label></td>
          <td></label> <?php echo $rowfestival["Festival_Info"]; ?></td>
        </tr>
        <tr>
          <td><label>ช่วงเวลาเทศกาล :</label></td>
          <td></label> <?php echo $rowfestival["Festival_Season"]; ?></td>
        </tr>



      </table>

      <div class="container text-center">


      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div id="มอดัลเทศกาล" class="carousel slide" data-ride="carousel">



        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
           <img src="<?php echo $rowfestival["Festival_Img1"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $rowfestival["Festival_Header"]; ?></h1>
              <?php echo $rowfestival["Festival_Imginfo1"]; ?>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo $rowfestival["Festival_Img2"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $rowfestival["Festival_Header"]; ?></h1>
              <?php echo $rowfestival["Festival_Imginfo2"]; ?>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo $rowfestival["Festival_Img3"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $rowfestival["Festival_Header"]; ?></h1>
              <?php echo $rowfestival["Festival_Imginfo3"]; ?>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo $rowfestival["Festival_Img4"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $rowfestival["Festival_Header"]; ?></h1>
              <?php echo $rowfestival["Festival_Imginfo4"]; ?>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo $rowfestival["Festival_Img5"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $rowfestival["Festival_Header"]; ?></h1>
              <?php echo $rowfestival["Festival_Imginfo5"]; ?>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo $rowfestival["Festival_Img6"]; ?>" class="img-responsive" width="100%">
            <div class="carousel-caption"  style="color:black;">
              <h1>  <?php echo $rowfestival["Festival_Header"]; ?></h1>
              <?php echo $rowfestival["Festival_Imginfo6"]; ?>
            </div>
          </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#มอดัลทีเทศกาล" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#มอดัลเทศกาล" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>
          </div>
        </div>
      </div>
      </div>

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






<div class="container">
  <div class="row">
    <div class="col-md-12">
      <form class="" action="savecomment.php" method="post">
        <div class="row" id="post-review-box" >
                  <div class="col-md-12>

                      <form accept-charset="UTF-8" action="savecomment.php" method="post">
                          <input id="ratings-hidden" name="rating" type="hidden">


                          <label style="margin-bot: 10px;" for=""></label>



                          <fieldset class="rating" style="font-size: 48px;float: left;margin-right: 25px;">

                            <input required type="radio" onclick="undisableTxt()" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                            <input required type="radio" onclick="undisableTxt()" id="star4half" name="rating" value="4.5" and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                            <input required type="radio" onclick="undisableTxt()" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                            <input required type="radio" onclick="undisableTxt()" id="star3half" name="rating" value="3.5" and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                            <input required type="radio" onclick="undisableTxt()" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                            <input required type="radio" onclick="undisableTxt()" id="star2half" name="rating" value="2.5 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                            <input required type="radio" onclick="undisableTxt()" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                            <input required type="radio" onclick="undisableTxt()" id="star1half" name="rating" value="1.5" and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                            <input required type="radio" onclick="undisableTxt()" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                            <input required type="radio" onclick="undisableTxt()" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>

                          </fieldset>


                          <br><br><br><br>
                          <label for="" style="margin-bottom: 10px;">ความคิดเห็นโดย (ไม่บังคับ)</label>
                          <input type="text" disabled class="form-control animated" cols="50" id="ss2" name="comment" placeholder="ใส่ชื่อของคุณที่นี่..." />
                          <label for="" style="margin-bottom: 10px;margin-top: 10px;">ความคิดเห็นของคุณ</label>
                          <textarea class="form-control animated" disabled cols="50" id="myTextarea" required name="comment" placeholder="แสดงความคิดเห็นของคุณที่นี่..." rows="5"></textarea>

                          <div class="text-right">
                            <br>
                            <button class="btn btn-success btn-lg" type="submit">บันทึก</button>

                          </div>
                      </form>
                  </div>
        </div>
      </form>
    </div>

  </div>

</div>

<div class="container">
  <div class="row col-md-12">
    <nav class="nav nav-tabs" style="color :black;">
      <h3>ความคิดเห็น</h3>
    </nav>
    <?php while($ratingscore = mysqli_fetch_array($comment)) {
      # code...

     ?>
    <div class="col-md-12">
          <br>
          <div style="color: orange;" id="rating-readonly" class="starrr" data-rating='<?php echo $ratingscore["rating_score"]; ?>'></div>


    </div>

    <div class="col-md-6">
      ความคิดเห็นโดย <?php echo $ratingscore["member_username"]; ?>
      <br>
      <?php echo $ratingscore["rating_comment"]; ?>
      <br>
    </div>
    <div class="col-md-12">
      <nav class="nav nav-tabs" style="color :black;">

        <br>
      </nav>
    </div>


    <?php
    }
     ?>
    <br>
  </div>
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

    <script>
    function disableTxt() {
        document.getElementById("myTextarea").disabled = true;
    }
    function undisableTxt() {
        document.getElementById("myTextarea").disabled = false;
        document.getElementById("ss2").disabled = false;
      }
    </script>

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
  </body>
</html>
