<!DOCTYPE html>
<?php

$con = @mysqli_connect("localhost", "root","", "studentdb")
or die("Cannot connect to MySQL Server");
mysqli_query($con, "SET NAMES utf8");
$id = $_GET['id'];
$sql = "SELECT * FROM student WHERE ID='$id'";
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
      <label>รหัสนิสต</label><input type="text"id="stdid" name="stdid" value="<?php echo $row['ID'];?>"/><br/>

    <label>คำนำหน้าชื่อ</label>
    <select id ="title" name="title">
      <option value="นาย" <?php if($row['title']=="นาย") echo "selected"?>>นาย</option>
      <option value="นางสาว" <?php if($row['title'] =="นางสาว") echo "selected"?>>นางสาว</option>
      <option value="นาง" <?php if($row['title']=="นาง") echo "selected"?>>นาง</option>
    </select><br/>
    <label>ชื่อ</label><input type="text"id="firstname" name="firstname" value="<?php echo $row['firstname'];?>" ><br/>
    <label>นามสกุล</label><input type="text"id="lastname" name="lastname" value="<?php echo $row['lastname'];?>"><br/>
    <label>เกรดเฉลี่ย</label><input type="text"id="gpax" name="gpax" value="<?php echo $row['gpax'];?>"><br/>
    <input type="submit"value="บันทึก">
    </form>
  </body>
</html>
