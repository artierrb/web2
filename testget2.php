<!DOCTYPE html>
<?php

$con = @mysqli_connect("localhost", "root","", "web2")
or die("Cannot connect to MySQL Server");
mysqli_query($con, "SET NAMES utf8");
$id = $_GET['id'];
$sql = "SELECT * FROM page WHERE p_id='$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
 ?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Add Student data</title>
  </head>

  <body>
    <h3>แก้ไขข้อมูลนสิต</h3>
    <form action="updateStudent.php" method="post">
      <label>รหัส</label><input type="text"id="b_id" name="b_id" value="<?php echo $row['p_id'];?>"/><br/>
    <label>ชื่อ</label><input type="text"id="b_name" name="b_name" value="<?php echo $row['p_header'];?>" ><br/>
    <label>คะแนน</label><input type="text"id="b_score" name="b_score" value="<?php echo $row['p_address'];?>"><br/>
    <label>รายละเอียด</label><input type="text"id="b_info" name="b_info" value="<?php echo $row['p_info'];?>"><br/>
    <label>รูปภาพ</label><input type="text"id="b_image" name="b_image" value="<?php echo $row['p_price'];?>"><br/>
    <input type="submit"value="บันทึก">
    </form>
  </body>
</html>
