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
$id = $_GET['id'];

$sql = "DELETE FROM tbllocation WHERE location_id = '".$_GET["id"]."'";
$sql = mysqli_query($con, $sql);

$sql_loimg = "DELETE FROM tbllocation_image WHERE location_id = '".$_GET["id"]."'";
$sql_loimg = mysqli_query($con, $sql_loimg);

$sql_product = "DELETE FROM tblproduct2 WHERE location_id = '".$_GET["id"]."'";
$sql_product = mysqli_query($con, $sql_product);

$sql_product_img = "DELETE FROM tblproduct_image WHERE location_id = '".$_GET["id"]."'";
$sql_product_img = mysqli_query($con, $sql_product_img);

$sql_service = "DELETE FROM tblservice2 WHERE location_id = '".$_GET["id"]."'";
$sql_service = mysqli_query($con, $sql_service);

$sql_service_img = "DELETE FROM tblservice2_image WHERE location_id = '".$_GET["id"]."'";
$sql_service_img = mysqli_query($con, $sql_service_img);

$sql_restaurant = "DELETE FROM tblrestaurant2 WHERE location_id = '".$_GET["id"]."'";
$sql_restaurant = mysqli_query($con, $sql_restaurant);

$sql_restaurant_img = "DELETE FROM tblrestaurant2_image WHERE location_id = '".$_GET["id"]."'";
$sql_restaurant_img = mysqli_query($con, $sql_restaurant_img);

$sql_lodge = "DELETE FROM tbllodge WHERE location_id = '".$_GET["id"]."'";
$sql_lodge = mysqli_query($con, $sql_lodge);

$sql_lodge_img = "DELETE FROM tbllodge_image WHERE location_id = '".$_GET["id"]."'";
$sql_lodge_img = mysqli_query($con, $sql_lodge_img);

$sql_festival = "DELETE FROM tblfestival2 WHERE location_id = '".$_GET["id"]."'";
$sql_festival = mysqli_query($con, $sql_festival);

$sql_festival_img = "DELETE FROM tblfestival2_image WHERE location_id = '".$_GET["id"]."'";
$sql_festival_img = mysqli_query($con, $sql_festival_img);

if($sql){
echo "<script type='text/javascript'>";
//echo "alert('เพิ่มข้อมูลสถานที่สำเร็จ');";
echo "window.location = 'locationmemberinfo.php'; ";
echo "</script>";
}
mysqli_close($con);

?>
