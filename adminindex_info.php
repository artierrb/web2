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

$mem_info_query ="SELECT * FROM tblmember WHERE member_id='$session_login_id'";
$memberinfo_result = mysqli_query($con, $mem_info_query);
$id = $_GET['id'];
$perpage = 5;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
$start = ($page - 1) * $perpage;
$locationmemberinfo_result = mysqli_query($con,"SELECT * FROM tblreport_location JOIN tblmember ON tblreport_location.member_id=tblmember.member_id
                            JOIN tbllocation ON tblreport_location.location_id=tbllocation.location_id WHERE tblreport_location.location_id = '$id'

                           ORDER BY report_id DESC limit {$start} , {$perpage} ");
//$locationfinfo_fetch = mysqli_fetch_array($locationmemberinfo_result);
$i = 1;

$location_name = mysqli_query($con,"SELECT * FROM tblreport_location JOIN tblmember ON tblreport_location.member_id=tblmember.member_id
JOIN tbllocation ON tblreport_location.location_id=tbllocation.location_id
                      WHERE tbllocation.location_id = '$id'     ORDER BY report_id DESC");
$locationfinfo_fetch = mysqli_fetch_array($location_name);

$memberbyname = mysqli_query($con,"SELECT * FROM tblreport_location JOIN tblmember
 ON tblreport_location.member_id=tblmember.member_id WHERE tblreport_location.by_member_id=tblmember.member_id ORDER BY report_id DESC");
$memberbyname_fetch = mysqli_fetch_array($memberbyname);

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
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="jsjquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="assets/css/Footer-with-social-icons.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

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
      .navbar-center
{
    position: absolute;
    width: 100%;
  }

      /*เปิด CSS เรทติ้ง */


      /* ปิด CSS เรทติ้ง */





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

<div class="container">

  <?php

  while($memberinfo = mysqli_fetch_array($memberinfo_result)){
    # code...
  ?>




    <!--<div class="input-group">
      <span class="input-group-addon" id="basic-addon1">ชื่อผู้ใช้งาน</span>
      <input type="text" class="form-control" placeholder="<?php echo "$s_login_name" ?>" aria-describedby="basic-addon1" disabled>
    </div>
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">ชื่อ</span>
      <input type="text" class="form-control" placeholder="<?php echo "$s_login_username" ?>" aria-describedby="basic-addon1" disabled>
    </div> -->
    <div class="col-md-4">
      <!--<img src="img/<?php echo "$s_login_image" ?>" class="img-responsive center-block img-circle" style="margin-top : 10px; width:50%">-->
      <br>
      <!--<div class="text-center">
        <label><?php echo "$s_login_username" ?></label>  <label><?php echo "$s_login_surname" ?></label>
      </div>-->
      <br>

      <div class="list-group hidden-xs">
        <a href="adminindex.php" class="list-group-item" style="color :black">
          <i class="far fa-bookmark" aria-hidden="true"></i> รายงานบทความของสมาชิก
        </a>
        <a href="admincomment.php" class="list-group-item" style="color :black"><i class="far fa-comment" aria-hidden="true"></i> รายงานความคิดเห็นของสมาชิก</a>
        <a href="adminads.php" class="list-group-item" style="color :black"><i class="far fa-image" aria-hidden="true"></i> จัดการโฆษณา</a>
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
        <li class="active"><a href="admincomment.php" style="color :black;">เพิ่มบทความ</a></li>
        <li><a href="adminads.php" style="color :black;">จัดการข้อมูลบทความ</a></li>
        <li><a href="logout.php" style="color :black;background-color: #ff8570;">ออกจากระบบ</a></li>

      </ul>
      </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="page-header">
        <h1><i class="far fa-bookmark" aria-hidden="true"></i> รายงานบทความ <a href="admin_view_location.php?id=<?php echo  $locationfinfo_fetch["location_id"]; ?>"> <?php echo $locationfinfo_fetch["location_name"] ?></h1></a>
      </div>
      <div>
        <div class="panel panel-default">
        <!-- Table -->
        <div class="table-responsive-sm">

            <h3></h3>

        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th scope="col">ข้อความที่แจ้ง</th>
              <th scope="col">แจ้งโดย</th>
              <th scope="col">วันที</th>

            </tr>
          </thead>
          <tbody>
            <?php
            while($locationmemberinfo = mysqli_fetch_array($locationmemberinfo_result)){
            ?>
            <tr>
              <td><?php echo $i ?></td>
              <td scope="row"><a data-toggle="modal" data-target="#myModal<?php echo $locationmemberinfo["report_id"];?> "><?php echo $locationmemberinfo["report_message"]; ?></a></></td>
              <td scope="row"><?php echo $locationmemberinfo["by_member_name"]; ?> <?php echo $locationmemberinfo["by_member_surname"]; ?></></td>
              <td scope="row">
              <?php echo $locationmemberinfo["report_date"] ?>
              </td>

            </tr>


            <div class="modal fade" id="myModal<?php echo $locationmemberinfo["report_id"];?>" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">ข้อมูลการรายงานของบทความ</h4>
                  </div>
                  <div class="modal-body">
                    <p>ข้อความที่ผู้ใช้แจ้ง เกี่ยวกับบทความ <?php echo $locationmemberinfo["location_name"];?></p>
                    <textarea class="form-control" rows="5" name="report_message"><?php echo $locationmemberinfo["report_message"];?></textarea>
                    <br>
                    <div class="text-center">
                      <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                    </div>
                  </div>

                </div>

              </div>
            </div>
            <?php
            $i++;
            }
             ?>
          </tbody>


        </table>
        <div class="text-right">
          <button type="button" class="btn btn-warning" name="button"><a href="report_locationdelete.php?id=<?php echo $id ?>" onclick="return checkDelete()" style="color:white;">ลบข้อมูล</a></button>
          <script language="JavaScript" type="text/javascript">
          function checkDelete(){
              return confirm('ลบข้อมูลใช่หรือไม่?');
          }
          </script>
        </div>

        </div>
        </div>
        <?php
        $sql2 = "SELECT * FROM tblreport_location WHERE location_id = '$id' ORDER BY report_id DESC";
        $query2 = mysqli_query($con, $sql2);
        $total_record = mysqli_num_rows($query2);
        $total_page = ceil($total_record / $perpage);
        ?>
      <div class="col-md-12">
        <nav class="text-center">
         <ul class="pagination">
         <li>
         <a href="adminindex_info.php?id=<?php echo $id ?>&page=1" aria-label="Previous">
         <span aria-hidden="true">&laquo;</span>
         </a>
         </li>
         <?php for($i=1;$i<=$total_page;$i++){ ?>
         <li><a href="adminindex_info.php?id=<?php echo $id ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
         <?php } ?>
         <li>
         <a href="adminindex_info.php?id=<?php echo $id ?>&page=<?php echo $total_page;?>" aria-label="Next">
         <span aria-hidden="true">&raquo;</span>
         </a>
         </li>
         </ul>
         </nav>
      </div>




      </div>

    </div>


    <!-- Modal -->




    <!--
    <div class="col-md-8">
      <label class="control-label">ชื่อผู้ใช้งาน / Username</label>
      <input type="text" style="background-color : white;" class="form-control" value="<?php echo "$s_login_name" ?>" disabled>
      <label class="control-label">รหัสผ่าน / Password</label>
      <input type="password" style="background-color : white;" class="form-control" value="<?php echo "$s_login_pwd" ?>" disabled>
      <label class="control-label">ชื่อ / Name</label>
      <input type="text" style="background-color : white;" class="form-control" value="<?php echo "$s_login_username" ?>" disabled>
      <label class="control-label">นามสกุล / Surname</label>
      <input type="text" style="background-color : white;" class="form-control" value="<?php echo "$s_login_surname" ?>" disabled>
      <label class="control-label">เพศ / Gender</label>
      <input type="text" style="background-color : white;" class="form-control" value="<?php echo "$s_login_sex" ?>" disabled>
      <label class="control-label">วันเกิด / Birthday</label> <br>
      <div class="col-sm-12">
      </div>
      <div class="col-sm-4">
        <input type="text" style="background-color : white;" class="form-control" value="<?php echo "$s_login_bdate" ?>" disabled>
      </div>
      <div class="col-sm-4">
        <input type="text" style="background-color : white;" class="form-control" value="<?php echo "$s_login_mdate" ?>" disabled>
      </div>
      <div class="col-sm-4">
        <input type="text" style="background-color : white;" class="form-control" value="<?php echo "$s_login_ydate" ?>" disabled>
      </div>
      <label class="control-label">ที่อยู่ / Address</label>
      <input type="text" style="background-color : white;" class="form-control" value="<?php echo "$s_login_address" ?>" disabled>
      <label class="control-label">จังหวัด / Province</label>
      <input type="text" style="background-color : white;" class="form-control" value="<?php echo "$s_login_province" ?>" disabled>
      <label class="control-label">รหัสไปรษณีย์ / Postcode</label>
      <input type="text" style="background-color : white;" class="form-control" value="<?php echo "$s_login_postcode" ?>" disabled>
      <label class="control-label">อีเมล / Email</label>
      <input type="text" style="background-color : white;" class="form-control" value="<?php echo "$s_login_email" ?>" disabled>
      <label class="control-label">เฟซบุ๊ก / Facebook</label>
      <input type="text" style="background-color : white;" class="form-control" value="<?php echo "$s_login_fb" ?>" disabled>
      <label class="control-label">ทวิตเตอร์ / Twitter</label>
      <input type="text" style="background-color : white;" class="form-control" value="<?php echo "$s_login_tw" ?>" disabled>
      <label class="control-label">อินสตาแกรม / Instagram</label>
      <input type="text" style="background-color : white;" class="form-control" value="<?php echo "$s_login_ig" ?>" disabled>

      <!--
      <div class="input-group input-group-lg" style="margin-top : 5px;">
        <span class="input-group-addon" id="sizing-addon1">ชื่อผู้ใช้งาน</span>
        <input style="background-color : white;" type="text" class="form-control text-right" value="<?php echo "$s_login_name" ?>" aria-describedby="sizing-addon1" disabled>
      </div>
      <div class="input-group input-group-lg" style="margin-top : 5px;">
        <span class="input-group-addon" id="sizing-addon1">รหัสผ่าน</span>
        <input style="background-color : white;" type="password" class="form-control text-right" value="<?php echo "$s_login_pwd" ?>" aria-describedby="sizing-addon1" disabled>
      </div>
      <div class="input-group input-group-lg" style="margin-top : 5px;">
        <span class="input-group-addon" id="sizing-addon1">ชื่อ</span>
        <input style="background-color : white;" type="text" class="form-control text-right" value="<?php echo "$s_login_username" ?>" aria-describedby="sizing-addon1" disabled>
      </div>
      <div class="input-group input-group-lg" style="margin-top : 5px;">
        <span class="input-group-addon" id="sizing-addon1">นามสกุล</span>
        <input style="background-color : white;" type="text" class="form-control text-right" value="<?php echo "$s_login_surname" ?>" aria-describedby="sizing-addon1" disabled>
      </div>
      <div class="input-group input-group-lg" style="margin-top : 5px;">
        <span class="input-group-addon" id="sizing-addon1">เพศ</span>
        <input style="background-color : white;" type="text" class="form-control text-right" value="<?php echo "$s_login_sex" ?>" aria-describedby="sizing-addon1" disabled>
      </div>
      <div class="input-group input-group-lg" style="margin-top : 5px;">
        <span class="input-group-addon" id="sizing-addon1">อีเมล</span>
        <input style="background-color : white;" type="text" class="form-control text-right" value="<?php echo "$s_login_email" ?>" aria-describedby="sizing-addon1" disabled>
      </div>
      <div class="input-group input-group-lg" style="margin-top : 5px;">
        <span class="input-group-addon" id="sizing-addon1">เฟซบุ๊ก</span>
        <input style="background-color : white;" type="text" class="form-control text-right" value="<?php echo "$s_login_fb" ?>" aria-describedby="sizing-addon1" disabled>
      </div>
      <div class="input-group input-group-lg" style="margin-top : 5px;">
        <span class="input-group-addon" id="sizing-addon1">ทวิตเตอร์</span>
        <input style="background-color : white;" type="text" class="form-control text-right" value="<?php echo "$s_login_tw" ?>" aria-describedby="sizing-addon1" disabled>
      </div>
      <div class="input-group input-group-lg" style="margin-top : 5px;">
        <span class="input-group-addon" id="sizing-addon1">อินสตาแกรม</span>
        <input style="background-color : white;" type="text" class="form-control text-right" value="<?php echo "$s_login_ig" ?>" aria-describedby="sizing-addon1" disabled>
      </div>

      <br>
      <div class="text-right">
        <button type="button" class="btn btn-default" data-dismiss="modal" onClick="window.location='editmemberinfo.php?memberid=<?php echo $memberinfo["member_id"]; ?>'">แก้ไขข้อมูล</button>
      </div>
    </div>-->



  <?php

  }
   ?>

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






<!-- ปิดคอนเทนเนอร์ -->
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
