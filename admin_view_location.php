<?php session_start();
if (!isset($_SESSION['member_id'])) {

}

 ?>
<!DOCTYPE html>
<?php
$con = @mysqli_connect("localhost", "root","", "web2")
or die("Cannot connect to MySQL Server");

mysqli_query($con, "set names utf8");
$id = $_GET['id'];

//echo "connect database successfully<br>";
$query = "SELECT * FROM tblTravel" or die("Error:" . mysqli_error());


$session_login_id = $_SESSION['member_id'];
$query_user = "SELECT * FROM tblmember WHERE member_id='$session_login_id'";
$result_user = mysqli_query($con,$query_user);
if ($result_user){
  $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
  $s_login_username = $row_user['member_name'];
  mysqli_free_result($result_user);
}

$sql = "SELECT * FROM tblTravel WHERE Attraction_ID='$id'";
$sql99 = "SELECT * FROM tbllocation_image WHERE location_id='$id'";
$sqlpd = "SELECT * FROM tblproduct_image WHERE product_id='$id'";
$sql3 = "SELECT * FROM tblProduct WHERE Product_ID='$id'";
$sqlservice = "SELECT * FROM tblService WHERE Service_ID='$id'";
$sqlrestaurant = "SELECT * FROM tblRestaurant WHERE Restaurant_ID='$id'";
$sqlhotel = "SELECT * FROM tblHotel WHERE Hotel_ID='$id'";
$sqlfestival = "SELECT * FROM tblFestival WHERE Festival_ID='$id'";
$result = mysqli_query($con, $query);
$result2 = mysqli_query($con, $sql);
$result99 = mysqli_query($con, $sql99);
$pdresult = mysqli_query($con, $sqlpd);
$result3 = mysqli_query($con, $sql3);
$resultservice = mysqli_query($con, $sqlservice);
$resultrestaurant = mysqli_query($con, $sqlrestaurant);
$resulthotel = mysqli_query($con, $sqlhotel);
$resultfestival = mysqli_query($con, $sqlfestival);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$row99 = mysqli_fetch_array($result99, MYSQLI_ASSOC);
$imgpdactive = mysqli_fetch_array($pdresult, MYSQLI_ASSOC);
$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
$row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
$rowservice = mysqli_fetch_array($resultservice, MYSQLI_ASSOC);
$rowrestaurant = mysqli_fetch_array($resultrestaurant, MYSQLI_ASSOC);
$rowhotel = mysqli_fetch_array($resulthotel, MYSQLI_ASSOC);
$rowfestival = mysqli_fetch_array($resultfestival, MYSQLI_ASSOC);


$img ="SELECT * FROM tbllocation_image WHERE location_id='$id' limit 1,10";

$resimgslide = mysqli_query($con, $img);

$location ="SELECT * FROM tbllocation WHERE location_id='$id'";
$locationresult = mysqli_query($con, $location);
$locationinfo = mysqli_fetch_array($locationresult, MYSQLI_ASSOC);

$product ="SELECT * FROM tblproduct2 WHERE product_id='$id'";
$productresult = mysqli_query($con, $product);
$productinfo = mysqli_fetch_array($productresult, MYSQLI_ASSOC);

$imgpd ="SELECT * FROM tblproduct_image WHERE product_id='$id' limit 1,10";
$resimgslidepd = mysqli_query($con, $imgpd);

$sqlsv = "SELECT * FROM tblservice2_image WHERE service_id='$id'";
$svresult = mysqli_query($con, $sqlsv);
$imgsvactive = mysqli_fetch_array($svresult, MYSQLI_ASSOC);
$imgsv ="SELECT * FROM tblservice2_image WHERE service_id='$id' limit 1,10";
$resimgslidesv = mysqli_query($con, $imgsv);
$service ="SELECT * FROM tblservice2 WHERE location_id='$id'";
$serviceresult = mysqli_query($con, $service);
$serviceinfo = mysqli_fetch_array($serviceresult, MYSQLI_ASSOC);

$sqlrs = "SELECT * FROM tblrestaurant2_image WHERE restaurant_id='$id'";
$rsresult = mysqli_query($con, $sqlrs);
$imgrsactive = mysqli_fetch_array($rsresult, MYSQLI_ASSOC);
$imgrs ="SELECT * FROM tblrestaurant2_image WHERE restaurant_id='$id' limit 1,10";
$resimgsliders = mysqli_query($con, $imgrs);
$res ="SELECT * FROM tblrestaurant2 WHERE location_id='$id'";
$resresult = mysqli_query($con, $res);
$resinfo = mysqli_fetch_array($resresult, MYSQLI_ASSOC);

$sqlld = "SELECT * FROM tbllodge_image WHERE lodge_id='$id'";
$ldresult = mysqli_query($con, $sqlld);
$imgldactive = mysqli_fetch_array($ldresult, MYSQLI_ASSOC);
$imgld ="SELECT * FROM tbllodge_image WHERE lodge_id='$id' limit 1,10";
$resimgslideld = mysqli_query($con, $imgld);
$lodge ="SELECT * FROM tbllodge WHERE location_id='$id'";
$lodgeresult = mysqli_query($con, $lodge);
$lodgeinfo = mysqli_fetch_array($lodgeresult, MYSQLI_ASSOC);

$sqlfs = "SELECT * FROM tblfestival2_image WHERE festival_id='$id'";
$fsresult = mysqli_query($con, $sqlfs);
$imgfsactive = mysqli_fetch_array($fsresult, MYSQLI_ASSOC);
$imgfs ="SELECT * FROM tblfestival2_image WHERE festival_id='$id' limit 1,10";
$resimgslidefs = mysqli_query($con, $imgfs);
$fes ="SELECT * FROM tblfestival2 WHERE location_id='$id'";
$fesresult = mysqli_query($con, $fes);
$fesinfo = mysqli_fetch_array($fesresult, MYSQLI_ASSOC);

$comment = mysqli_query($con, "SELECT * FROM tblvote_comment JOIN tblmember ON tblvote_comment.member_id=tblmember.member_id WHERE location_id='$id' ORDER BY vote_comment_id DESC");
//$showname = mysqli_fetch_array($comment, MYSQLI_ASSOC);

$locationmem_info_query = mysqli_query($con,"SELECT * FROM tbllocation JOIN tblmember ON tbllocation.member_id=tblmember.member_id WHERE location_id='$id'");
$locationmemberinfo_result = mysqli_fetch_array($locationmem_info_query, MYSQLI_ASSOC);

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
        font-size: 240%;
        color: #d17581;
      }
      .star-rating {
        line-height:32px;
        font-size:6.25em;
      }

      .star-rating .fa-star{
        color: gold;
      }
      #map {
        width: 100%;
        height: 400px;
        background-color: grey;
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

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <p class='navbar-text navbar-center'>ส่วนผู้ดูแลระบบ</p>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">






      <ul class="nav navbar-nav navbar-right">

        <!-- <li><a href="#">Link</a></li> -->

        <!--<li class="dropdown">

          <a href="memberinfoindex.php" style="background-color: lightgreen;" class="dropdown-toggle glyphicon glyphicon-user" role="button"> สวัสดีคุณ <?php echo $s_login_username ;?></a>

        </li>-->
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
    <div class="col-md-12" style="background-color: #eaeaea;  margin-bottom:5px; margin-top:5px;border-radius: 22px; border-color: white; border:5px solid white;">
      <div class="col-md-4">
        <td><?php echo $locationinfo["location_name"]; ?></td>
      </div>
      <div class="col-md-4">
      <table>
        <td>วันที่ : <?php echo $locationinfo["location_date"]; ?></td>
      </table>
      </div>
      <div class="col-md-4">
      <table class="text-right">
        <td>บทความโดย : <?php echo $locationmemberinfo_result["member_name"]; ?> <?php echo $locationmemberinfo_result["member_surname"]; ?></td>
      </table>
      </div>
    <br>
    </div>






    <p></p>
    <!-- คารูเซล -->
    <div class="col-md-6">
      <div class="">
        <div id="ภาพท่องเที่ยว" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <!--<a href="#" data-toggle="modal" data-target="#LO_IMG<?php echo $row99["location_image_id"]; ?>">-->
                <img src="<?php echo $row99["location_image_file"]; ?>" class="img-responsive" width="100%">
                <div class="carousel-caption"  style="color:black;">
                  <h1><?php echo $row99["location_image_info"]; ?></h1>
                </div>
              <!--</a>-->
            </div>
            <?php
            while($imgslide = mysqli_fetch_array($resimgslide)){
            ?>
            <div class="item">
              <!--<a href="#" data-toggle="modal" data-target="#LO_IMG_02<?php echo $imgslide["location_image_id"]; ?>">-->
                <img src="<?php echo $imgslide["location_image_file"]; ?>" class="img-responsive" width="100%">
                <div class="carousel-caption"  style="color:black;">
                  <h1><?php echo $imgslide["location_image_info"]; ?></h1>
                </div>
              <!--</a>-->
            </div>

            <?php
            }
             ?>

          </div>
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
    <!--
    <div class="modal fade" id="LO_IMG<?php echo $row99["location_image_id"]; ?>" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="carousel-inner" role="listbox">
            <div class="item active">
             <img src="<?php echo $row99["location_image_file"]; ?>" class="img-responsive" width="100%">
              <div class="carousel-caption"  style="color:black;">
                <h1><?php echo $row99["location_image_info"]; ?></h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="LO_IMG_02<?php echo $imgslide["location_image_id"]; ?>" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="carousel-inner" role="listbox">
            <div class="item active">
             <img src="<?php echo $imgslide["location_image_file"]; ?>" class="img-responsive" width="100%">
              <div class="carousel-caption"  style="color:black;">
                <h1><?php echo $imgslide["location_image_info"]; ?></h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>-->


    <div class="col-md-6">

      <table style="width:100%">
        <tr>
          <th colspan="2"><h3><?php echo $locationinfo["location_name"]; ?></h3></th>
        </tr>
        <tr>
          <td width="125"><label>ประเภทการท่องเที่ยว :</label></td>
          <td></label> <?php echo $locationinfo["location_type"]; ?></td>
        </tr>
        <tr>
          <td width="125"><label>รายละเอียด :</label></td>
          <td></label> <?php echo $locationinfo["location_info"]; ?></td>
        </tr>
        <tr>
          <td><label>ที่อยู่ :</label></td>
          <td></label> <?php echo $locationinfo["location_address"]; ?></td>
        </tr>

        <tr>
          <td><label>ค่าบริการ :</label></td>
          <td></label> <?php echo $locationinfo["location_fee"]; ?></td>
        </tr>
        <tr>
          <td><label>จุดสังเกต :</label></td>
          <td></label> <?php echo $locationinfo["location_landmark"]; ?></td>
        </tr>
      </table>


    </div>
    <div class="col-md-12">
      <br>
    </div>


      <div class="col-md-6">
        <h3>การเดินทาง</h3>
        <?php echo $locationinfo["location_route"]; ?>
      </div>
<br>

      <div class="col-md-6 text-center">
        <div id="map"></div>
        <script>
          function initMap() {
            var uluru = {lat: <?php echo $locationinfo["location_latitude"];?>, lng: <?php echo $locationinfo["location_longitude"];?>};
            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 8,
              center: uluru
            });
            var marker = new google.maps.Marker({
              position: uluru,
              map: map
            });
          }
        </script>
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSUza3x3TUzMyq6yeUnP-Yk1WSt0TUzTs&callback=initMap">
        </script>


      </div>

  </div>



<div class="container text-center">
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel1" id="LO_IMG" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div id="ภาพสไลด์1" class="carousel slide" data-ride="carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
     <img src="<?php echo $row99["location_image_file"]; ?>" class="img-responsive" width="100%">
      <div class="carousel-caption"  style="color:black;">
        <h1><?php echo $row99["location_image_info"]; ?></h1>

      </div>
    </div>
    <?php

    while($imgslide = mysqli_fetch_array($resimgslide)){
      # code...
    ?>
    <div class="item">
      <img src="<?php echo $imgslide["location_image_file"]; ?>" class="img-responsive" width="100%">
      <div class="carousel-caption"  style="color:black;">
        <h1>  <?php echo $imgslide["location_image_info"]; ?></h1>
      </div>
    </div>
    <?php

    }
     ?>
  </div>

  <!-- Controls -->

  <a class="left carousel-control" href="#ภาพสไลด์1" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#ภาพสไลด์1" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

</div>
    </div>
  </div>
</div>
</div>

  <div id="menu1" class="tab-pane fade">
    <div class="col-md-12" style="background-color: #eaeaea;  margin-bottom:5px; margin-top:5px;border-radius: 22px; border-color: white; border:5px solid white;">
      <div class="col-md-4">
        <td><?php echo $locationinfo["location_name"]; ?></td>
      </div>
      <div class="col-md-4">
      <table>
        <td>วันที่ : <?php echo $locationinfo["location_date"]; ?></td>
      </table>
      </div>
      <div class="col-md-4">
      <table class="text-right">
        <td>บทความโดย : <a href="view_history.php?id=<?php echo $locationmemberinfo_result["member_id"]; ?>"><?php echo $locationmemberinfo_result["member_name"]; ?> <?php echo $locationmemberinfo_result["member_surname"]; ?></a></td>
      </table>
      </div>
    <br>
    </div>
    <div class="col-md-6">
      <div class="">
        <div id="ภาพสินค้า" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <!--<a href="#" data-toggle="modal" data-target="#PD_IMG">-->
                <img src="<?php echo $imgpdactive["product_image_file"]; ?>" class="img-responsive" width="100%">
                <div class="carousel-caption"  style="color:black;">
                  <h1><?php echo $imgpdactive["product_image_info"]; ?></h1>
                </div>
              <!--</a>-->
            </div>
            <?php
            while($imgslidepd = mysqli_fetch_array($resimgslidepd)){
            ?>
            <div class="item">
              <!--<a href="#" data-toggle="modal" data-target="#PD_IMG">-->
                <img src="<?php echo $imgslidepd["product_image_file"]; ?>" class="img-responsive" width="100%">
                <div class="carousel-caption"  style="color:black;">
                  <h1><?php echo $imgslidepd["product_image_info"]; ?></h1>
                </div>
              <!--</a>-->
            </div>
            <?php
            }
             ?>
          </div>
          <a class="left carousel-control" href="#ภาพสินค้า" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#ภาพสินค้า" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-6">

      <table style="width:100%">
        <tr>
          <th colspan="2"><h3><?php echo $productinfo["product_store"]; ?></h3></th>
        </tr>
        <tr>
          <td width="125"><label>รายละเอียดสินค้า :</label></td>
          <td></label> <?php echo $productinfo["product_info"]; ?></td>
        </tr>
        <tr>
          <td><label>ราคาสินค้า :</label></td>
          <td></label> <?php echo $productinfo["product_price"]; ?></td>
        </tr>

        <tr>
          <td><label>ที่อยู่ :</label></td>
          <td></label> <?php echo $productinfo["product_address"]; ?></td>
        </tr>

      </table>



    </div>
    <div class="col-md-12">
      <br>
    </div>
  </div>


  <div id="menu2" class="tab-pane fade">
    <div class="col-md-12" style="background-color: #eaeaea;  margin-bottom:5px; margin-top:5px;border-radius: 22px; border-color: white; border:5px solid white;">
      <div class="col-md-4">
        <td><?php echo $locationinfo["location_name"]; ?></td>
      </div>
      <div class="col-md-4">
      <table>
        <td>วันที่ : <?php echo $locationinfo["location_date"]; ?></td>
      </table>
      </div>
      <div class="col-md-4">
      <table class="text-right">
        <td>บทความโดย : <a href="view_history.php?id=<?php echo $locationmemberinfo_result["member_id"]; ?>"><?php echo $locationmemberinfo_result["member_name"]; ?> <?php echo $locationmemberinfo_result["member_surname"]; ?></a></td>
      </table>
      </div>
    <br>
    </div>
    <div class="col-md-6">
      <div class="">
        <div id="บริการ" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->


          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">

            <div class="item active">

                <img src="<?php echo $imgsvactive["service_image_file"]; ?>" class="img-responsive" width="100%">
                <div class="carousel-caption"  style="color:black;">
                  <h1><?php echo $imgsvactive["service_image_info"]; ?></h1>
                </div>


            </div>

            <?php

            while($imgslidesv = mysqli_fetch_array($resimgslidesv)){
              # code...
            ?>

            <!--<?php/*
            $isFirst = true;
            @foreach($data as $imgslide)
              <div class="item{{{ $isFirst ? ' active' : '' }}}">
                  <img src="{{ $imgslide['location_image_file']}}" alt="Second Slide">
              </div>
            $isFirst = false;
            @endforeach
             */?>-->

            <div class="item">

                <img src="<?php echo $imgslidesv["service_image_file"]; ?>" class="img-responsive" width="100%">
                <div class="carousel-caption"  style="color:black;">
                  <h1><?php echo $imgslidesv["service_image_info"]; ?></h1>
                </div>

            </div>

            <?php

            }
             ?>



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
          <th colspan="2"><h3><?php echo $serviceinfo["service_name"]; ?></h3></th>
        </tr>
        <tr>
          <td width="125"><label>รายละเอียดบริการ :</label></td>
          <td></label> <?php echo $serviceinfo["service_info"]; ?></td>
        </tr>
        <tr>
          <td><label>ราคาบริการ :</label></td>
          <td></label> <?php echo $serviceinfo["service_fee"]; ?></td>
        </tr>

        <tr>
          <td><label>ที่อยู่ :</label></td>
          <td></label> <?php echo $serviceinfo["service_address"]; ?></td>
        </tr>

      </table>



    </div>

    <div class="col-md-12">
      <br>
    </div>
  </div>
  <div id="menu3" class="tab-pane fade">
    <div class="col-md-12" style="background-color: #eaeaea;  margin-bottom:5px; margin-top:5px;border-radius: 22px; border-color: white; border:5px solid white;">
      <div class="col-md-4">
        <td><?php echo $locationinfo["location_name"]; ?></td>
      </div>
      <div class="col-md-4">
      <table>
        <td>วันที่ : <?php echo $locationinfo["location_date"]; ?></td>
      </table>
      </div>
      <div class="col-md-4">
      <table class="text-right">
        <td>บทความโดย : <a href="view_history.php?id=<?php echo $locationmemberinfo_result["member_id"]; ?>"><?php echo $locationmemberinfo_result["member_name"]; ?> <?php echo $locationmemberinfo_result["member_surname"]; ?></a></td>
      </table>
      </div>
    <br>
    </div>
    <div class="col-md-6">
      <div class="">
        <div id="ร้านอาหาร" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->


          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">

            <div class="item active">

                <img src="<?php echo $imgrsactive["restaurant_image_file"]; ?>" class="img-responsive" width="100%">
                <div class="carousel-caption"  style="color:black;">
                  <h1><?php echo $imgrsactive["restaurant_image_info"]; ?></h1>
                </div>


            </div>

            <?php

            while($imgsliders = mysqli_fetch_array($resimgsliders)){
              # code...
            ?>

            <!--<?php/*
            $isFirst = true;
            @foreach($data as $imgslide)
              <div class="item{{{ $isFirst ? ' active' : '' }}}">
                  <img src="{{ $imgslide['location_image_file']}}" alt="Second Slide">
              </div>
            $isFirst = false;
            @endforeach
             */?>-->

            <div class="item">

                <img src="<?php echo $imgsliders["restaurant_image_file"]; ?>" class="img-responsive" width="100%">
                <div class="carousel-caption"  style="color:black;">
                  <h1><?php echo $imgsliders["restaurant_image_info"]; ?></h1>
                </div>

            </div>

            <?php

            }
             ?>



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
          <th colspan="2"><h3><?php echo $resinfo["restaurant_name"]; ?></h3></th>
        </tr>
        <tr>
          <td width="125"><label>รายละเอียดร้านอาหาร :</label></td>
          <td></label> <?php echo $resinfo["restaurant_info"]; ?></td>
        </tr>
        <tr>
          <td><label>อาาหารแนะนำ :</label></td>
          <td></label> <?php echo $resinfo["restaurant_reccomment"]; ?></td>
        </tr>
        <tr>
          <td><label>ที่อยู่ :</label></td>
          <td></label> <?php echo $resinfo["restaurant_address"]; ?></td>
        </tr>
        <tr>
          <td><label>ข้อมูลติดต่อ :</label></td>
          <td></label> <?php echo $resinfo["restaurant_tell"]; ?></td>
        </tr>
        <tr>
          <td><label>เว็บไซต์ :</label></td>
          <td></label> <?php echo $resinfo["restaurant_website"]; ?></td>
        </tr>
        <tr>
          <td><label>ช่วงเวลาเปิดทำการ :</label></td>
          <td></label> <?php echo $resinfo["restaurant_opentime"]; ?></td>
        </tr>
        <tr>
          <td><label>ช่วงเวลาปิดทำการ :</label></td>
          <td></label> <?php echo $resinfo["restaurant_closetime"]; ?></td>
        </tr>
        <tr>
          <td><label>รูปแบบ :</label></td>
          <td></label> <?php echo $resinfo["restaurant_type"]; ?></td>
        </tr>

      </table>



    </div>
    <div class="col-md-12">
      <br>
    </div>
  </div>
  <div id="menu4" class="tab-pane fade">
    <div class="col-md-12" style="background-color: #eaeaea;  margin-bottom:5px; margin-top:5px;border-radius: 22px; border-color: white; border:5px solid white;">
      <div class="col-md-4">
        <td><?php echo $locationinfo["location_name"]; ?></td>
      </div>
      <div class="col-md-4">
      <table>
        <td>วันที่ : <?php echo $locationinfo["location_date"]; ?></td>
      </table>
      </div>
      <div class="col-md-4">
      <table class="text-right">
        <td>บทความโดย : <a href="view_history.php?id=<?php echo $locationmemberinfo_result["member_id"]; ?>"><?php echo $locationmemberinfo_result["member_name"]; ?> <?php echo $locationmemberinfo_result["member_surname"]; ?></a></td>
      </table>
      </div>
    <br>
    </div>
    <div class="col-md-6">
      <div class="">
        <div id="ที่พัก" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->


          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">

            <div class="item active">

                <img src="<?php echo $imgldactive["lodge_image_file"]; ?>" class="img-responsive" width="100%">
                <div class="carousel-caption"  style="color:black;">
                  <h1><?php echo $imgldactive["lodge_image_info"]; ?></h1>
                </div>

            </div>

            <?php

            while($imgslideld = mysqli_fetch_array($resimgslideld)){
              # code...
            ?>

            <!--<?php/*
            $isFirst = true;
            @foreach($data as $imgslide)
              <div class="item{{{ $isFirst ? ' active' : '' }}}">
                  <img src="{{ $imgslide['location_image_file']}}" alt="Second Slide">
              </div>
            $isFirst = false;
            @endforeach
             */?>-->

            <div class="item">

                <img src="<?php echo $imgslideld["lodge_image_file"]; ?>" class="img-responsive" width="100%">
                <div class="carousel-caption"  style="color:black;">
                  <h1><?php echo $imgslideld["lodge_image_info"]; ?></h1>
                </div>
            </div>

            <?php

            }
             ?>



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
          <th colspan="2"><h3><?php echo $lodgeinfo["lodge_name"]; ?></h3></th>
        </tr>
        <tr>
          <td width="125"><label>รายละเอียดที่พัก :</label></td>
          <td></label> <?php echo $lodgeinfo["lodge_info"]; ?></td>
        </tr>
        <tr>
          <td><label>ข้อมูลติดต่อ :</label></td>
          <td></label> <?php echo $lodgeinfo["lodge_tell"]; ?></td>
        </tr>
        <tr>
          <td><label>ราคาเริ่มต้น :</label></td>
          <td></label> <?php echo $lodgeinfo["lodge_price"]; ?></td>
        </tr>
        <tr>
          <td><label>เว็บไซต์ :</label></td>
          <td></label> <?php echo $lodgeinfo["lodge_website"]; ?></td>
        </tr>
        <tr>
          <td><label>ที่อยู่ :</label></td>
          <td></label> <?php echo $lodgeinfo["lodge_address"]; ?></td>
        </tr>
        <tr>
          <td><label>ประเภท :</label></td>
          <td></label> <?php echo $lodgeinfo["lodge_type"]; ?></td>
        </tr>


      </table>



    </div>

    <div class="col-md-12">
      <br>
    </div>
  </div>
  <div id="menu5" class="tab-pane fade">
    <div class="col-md-12" style="background-color: #eaeaea;  margin-bottom:5px; margin-top:5px;border-radius: 22px; border-color: white; border:5px solid white;">
      <div class="col-md-4">
        <td><?php echo $locationinfo["location_name"]; ?></td>
      </div>
      <div class="col-md-4">
      <table>
        <td>วันที่ : <?php echo $locationinfo["location_date"]; ?></td>
      </table>
      </div>
      <div class="col-md-4">
      <table class="text-right">
        <td>บทความโดย : <a href="view_history.php?id=<?php echo $locationmemberinfo_result["member_id"]; ?>"><?php echo $locationmemberinfo_result["member_name"]; ?> <?php echo $locationmemberinfo_result["member_surname"]; ?></a></td>
      </table>
      </div>
    <br>
    </div>
    <div class="col-md-6">
      <div class="">
        <div id="เทศกาล" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->


          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">

            <div class="item active">

                <img src="<?php echo $imgfsactive["festival_image_file"]; ?>" class="img-responsive" width="100%">
                <div class="carousel-caption"  style="color:black;">
                  <h1><?php echo $imgfsactive["festival_image_info"]; ?></h1>
                </div>

            </div>

            <?php

            while($imgslidefs = mysqli_fetch_array($resimgslidefs)){
              # code...
            ?>

            <!--<?php/*
            $isFirst = true;
            @foreach($data as $imgslide)
              <div class="item{{{ $isFirst ? ' active' : '' }}}">
                  <img src="{{ $imgslide['location_image_file']}}" alt="Second Slide">
              </div>
            $isFirst = false;
            @endforeach
             */?>-->

            <div class="item">

                <img src="<?php echo $imgslidefs["festival_image_file"]; ?>" class="img-responsive" width="100%">
                <div class="carousel-caption"  style="color:black;">
                  <h1><?php echo $imgslidefs["festival_image_info"]; ?></h1>
                </div>
            </div>

            <?php

            }
             ?>



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
          <th colspan="2"><h3><?php echo $fesinfo["festival_name"]; ?></h3></th>
        </tr>
        <tr>
          <td width="125"><label>รายละเอียดเทศกาล :</label></td>
          <td></label> <?php echo $fesinfo["festival_info"]; ?></td>
        </tr>
        <tr>
          <td><label>ช่วงเวลาเริ่มเทศกาล :</label></td>
          <td></label> <?php echo $fesinfo["festival_timeup"]; ?></td>
        </tr>
        <tr>
          <td><label>ช่วงเวลาสิ้นสุดเทศกาล :</label></td>
          <td></label> <?php echo $fesinfo["festival_timeend"]; ?></td>
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














<div class="col-md-12" style="margin-bottom: 200px;">
  <br>
</div>










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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="jsjquery-3.2.1.min.js"></script>
  </body>
</html>
