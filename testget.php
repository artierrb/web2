<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "web2";
$con = @mysqli_connect($server, $username, $password, $database)
or die("Cannot connect database!!!");
mysqli_query($con, "set names utf8");

//echo "connect database successfully<br>";
$result = mysqli_query($con, "SELECT * FROM board ORDER BY b_score DESC LIMIT 3");
echo "จำนวนเรคคอร์ด". mysqli_num_rows($result);
?>
<br/>
<a href="addStudent.html">เพิ่มข้อมูล</a><br/>
<table border="1" cellspanding = "0">
  <tr>
    <th>รหัส</th><th>ชื่อ</th><th>คะแนน</th><th>รายละเอียด</th><th>รูปภาพ</th>
<th colspan="2">ดำเนินการ</th>
  </tr>

<?php
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
echo "<tr>";
echo "<td>".$row['b_id']. "</td>";
echo "<td>".$row['b_name']. "</td>";
echo "<td>".$row['b_score']. "</td>";
echo "<td>".$row['b_info']. "</td>";
echo "<td>".$row['b_image']. "</td>";
echo "<td><img src='".$row["b_image"]."' alt='img-responsive' width='100%'></td>";
echo "<td><a href='testget2.php?id=".$row['b_id']."'>แก้ไข</a></td>";//query String
//echo "<td><a href ='deleteStudent.php?id=".$row['ID']."'>ลบ</a></td>";
//echo "<td><a onclick ='return confirm(\"คุณต้องการลบหรือไหม\");' ></a></td>" ;
echo "</tr>";


}
?>

</table>

<div class="col-lg-4 text-center">

  <input type="number" name="your_awesome_parameter" id="rating-readonly" class="rating" data-clearable="remove" value="<?php echo $row["score_point"]; ?>" data-readonly />
    <?php echo "<td><a href='p1.php?id=".$row['b_id']."' class='btn btn-default' role='button'>ดูรายละเอียด</a></td>";
   ?>

</div>
<?php
//mysqli_free_result($result);
mysqli_close($con);

 ?>

 <img src="">
