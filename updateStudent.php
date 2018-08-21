<?php
$con = mysqli_connect("localhost", "root","", "studentdb")
or die("Cannot connect to MySQL Server");
mysqli_set_charset($con, "utf8");

$id = $_POST['stdid'];
$title = $_POST['title'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gpax = $_POST['gpax'];
$sql = "UPDATE student SET title = '$title',firstname ='$firstname',lastname ='$lastname',gpax='$gpax'
 WHERE ID='$id'";
 $result = mysqli_query($con, $sql) ;
 mysqli_close($con);

if($result){
echo "Student updated";
echo "<meta http-equiv='refresh' content ='1;url =showListStudent.php' />";
}else($result){
  echo "Updated successfully";
  echo "<meta http-equiv='refresh' content ='1;url =showListStudent.php' />";
}
 ?>
