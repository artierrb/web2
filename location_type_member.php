<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['member_id'])) {

}
$con = @mysqli_connect("localhost", "root","", "web2")
or die("Cannot connect to MySQL Server");

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

$id_type = $_GET['id'];



$perpage = 16;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
 $start = ($page - 1) * $perpage;

$sql = "SELECT tbllocation.*,tbllocation_image.*,tblmember.* FROM tbllocation,tbllocation_image,tblmember
WHERE tbllocation.location_id = tbllocation_image.location_id AND tbllocation.member_id = tblmember.member_id AND location_type='$id_type'
GROUP BY tbllocation.location_id ORDER BY tbllocation.location_id DESC limit {$start} , {$perpage}";

$banner_top = mysqli_query($con, "SELECT * FROM tblads_banner WHERE banner_type = 'top_banner' ");
$banner_fetch = mysqli_fetch_array($banner_top, MYSQLI_ASSOC);

$result = mysqli_query($con, $sql);

$i_no = 1;


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
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="jsjquery-3.2.1.min.js"></script>
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

      }a {
          color: black;
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
      <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="#">Link</a></li> -->
        <li class="dropdown">

          <a href="memberinfoindex.php" style="background-color: lightgreen;" class="dropdown-toggle glyphicon glyphicon-user" role="button"> สวัสดีคุณ <?php echo $s_login_username ;?></a>

        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>




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





<div class="container">
  <div class="row col-md-12">
    <div class="page-header">
      <h1><?php echo $id_type ?> <!--<div class="btn-group right">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          รูปแบบการแสดงผล <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
          <li><a href="location_type_desc_member.php?id=<?php echo $id_type ?>"><?php echo $id_type ?>ล่าสุด</a></li>
        </ul>
      </div>--></h1>
    </div>






        <?php
        while($row = mysqli_fetch_array($result)) {
          # code...
        ?>
        <div class="col-md-3 text-center" style="background-color: #eaeaea;  margin-bottom:5px; margin-top:5px;border-radius: 22px; border-color: white; border:5px solid white;">
          <p></p>
          <a href="p1member.php?id=<?php echo $row["location_id"]; ?>"><img src="<?php echo $row["location_image_file"]; ?>" alt="img-responsive" width="100%"></a>
          <link rel="stylesheet" >
          <a href="p1member.php?id=<?php echo $row["location_id"]; ?>"><h2 style="text-align: center; line-height: 32pt; height: 32pt; overflow:hidden;"><?php echo $row['location_name'] ?> </h2></a>
          <p style="background-color: #eaeaea; text-align: center; line-height: 15pt; height: 45pt; overflow:hidden;"><?php echo $row["location_info"];  ?></p>
          <p style="background-color: #cccccc;border-radius: 22px;">วันที่ <?php echo $row["location_date"]; ?></p>
          <p style="border: 2px solid #cccccc;border-radius: 12px;">โดย <a href="view_history.php?id=<?php echo $row["member_id"]; ?>"><?php echo $row["member_name"]; ?> <?php echo $row["member_surname"]; ?></a> </p>

          <br>
          <br>
        </div>
        <?php
        $i_no++;
        }
         ?>



    <?php


    $sql2 = "SELECT tbllocation.*,tbllocation_image.*,tblmember.* FROM tbllocation,tbllocation_image,tblmember
    WHERE tbllocation.location_id = tbllocation_image.location_id AND tbllocation.member_id = tblmember.member_id AND location_type='$id_type'
    GROUP BY tbllocation.location_id ORDER BY tbllocation.location_id";
    $query2 = mysqli_query($con, $sql2);
    $total_record = mysqli_num_rows($query2);
    $total_page = ceil($total_record / $perpage);
    ?>

    <div class="col-md-12">
      <nav class="text-center">
       <ul class="pagination">
       <li>
       <a href="location_type_member.php?id=<?php echo $id_type?>&page=1" aria-label="Previous">
       <span aria-hidden="true">&laquo;</span>
       </a>
       </li>
       <?php for($i=1;$i<=$total_page;$i++){ ?>
       <li><a href="location_type_member.php?id=<?php echo $id_type?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
       <?php } ?>
       <li>
       <a href="location_type_member.php?id=<?php echo $id_type?>&page=<?php echo $total_page;?>" aria-label="Next">
       <span aria-hidden="true">&raquo;</span>
       </a>
       </li>
       </ul>
       </nav>
    </div>



  </div>

</div>





















<div class="col-md-12">
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

    <!-- สคริปดาว -->
    <script src="build/bootstrap-rating-input.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="jsjquery-3.2.1.min.js"></script>
  </body>
</html>
