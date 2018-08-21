<?php

$con = @mysqli_connect("localhost", "root","", "web2")
or die("Cannot connect to MySQL Server");
mysqli_query($con, "SET NAMES utf8");
$id = $_GET['b_id'];
$sql = "SELECT * FROM page WHERE p_id='$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
 ?>

 <!DOCTYPE html>
 <html>
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
     <form class="" action="index.php" method="post">
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
     </form>


     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="js/jquery-3.2.1.min.js"></script>
     <!-- Include all compiled plugins (below), or include individual files as needed -->
     <script src="js/bootstrap.min.js"></script>

     <!-- สคริปดาว -->
     <script src="build/bootstrap-rating-input.min.js"></script>
   </body>
 </html>
