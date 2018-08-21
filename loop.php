<!DOCTYPE html>
<html>
<body>


<?php
$number=@$_POST["number"];
if($number>=1){
echo"แปลงเงินดอลลาเป็นบาท จำนวน". $number ."ดอลลาร์";
?>
<br>
<?php
$i = 35.5;
	echo "$number x  $i = ".$number*$i."บาท";
}
else{
echo"fail";
}
?>

</body>
</html>
