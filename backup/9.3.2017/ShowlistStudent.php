<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "studentdb";
$con = @mysqli_connect($server, $username, $password, $database)
or die("Cannot connect database!!!");
mysqli_query($con, "set names utf8");

//echo "connect database successfully<br>";
$result = mysqli_query($con, "SELECT * FROM student");
echo "จำนวนเรคคอร์ด". mysqli_num_rows($result);
?>
<br/>
<a href="addStudent.html">เพิ่มข้อมูล</a><br/>
<table border="1" cellspanding = "0">
  <tr>
    <th>รหัสนิสิต</th><th>คำนำหน้า</th><th>ชื่อ</th><th>นามสกุล</th><th>สาขา</th><th>เกรดเฉลี่ย</th><th>status</th>
<th colspan="2">ดำเนิดการ</th>
  </tr>

<?php
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
echo "<tr>";
echo "<td>".$row['ID']. "</td>";
echo "<td>".$row['title']. "</td>";
echo "<td>".$row['firstname']. "</td>";
echo "<td>".$row['lastname']. "</td>";
echo "<td>".$row['majid']. "</td>";
echo "<td>".$row['gpax']. "</td>";
echo "<td>".$row['status']."</td>";
echo "<td><a href='frmUpdateStudent.php?id=".$row['ID']."'>แก้ไข</a></td>";//query String
echo "<td><a href ='deleteStudent.php?id=".$row['ID']."'>ลบ</a></td>";
echo "<td><a onclick ='return confirm(\"คุณต้องการลบหรือไหม\");' ></a></td>" ;
echo "</tr>";
}
?>
</table>
<?php
//mysqli_free_result($result);
mysqli_close($con);

 ?>
