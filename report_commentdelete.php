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
$commentid = $_GET['commentid'];

$sql_report = "DELETE FROM tblreport_comment WHERE vote_comment_id = '".$_GET["commentid"]."'";
$sql_report = mysqli_query($con, $sql_report);

$sql_comment = "DELETE FROM tblvote_comment WHERE vote_comment_id = '".$_GET["commentid"]."'";
$sql_comment = mysqli_query($con, $sql_comment);

if($sql_comment){
echo "<script type='text/javascript'>";
//echo "alert('เพิ่มข้อมูลสถานที่สำเร็จ');";
echo "window.location = 'admincomment.php'; ";
echo "</script>";
}
mysqli_close($con);

?>
