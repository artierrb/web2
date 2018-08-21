<?php
// Include คลาส class.upload.php เข้ามา เพื่อจัดการรูปภาพ


// ส่วนกำหนดการเชื่อมต่อฐานข้อมูล
$hostname_connection = "localhost";
$database_connection = "web2";
$username_connection = "root";
$password_connection = "";
$connection = mysql_pconnect($hostname_connection, $username_connection, $password_connection)
		or trigger_error(mysql_error(),E_USER_ERROR);
mysql_query( "SET NAMES UTF8" ) ;


//  ถ้าหากหน้านี้ถูกเรียก เพราะการ submit form
//  ประโยคนี้จะเป็นจริงกรณีเดียวก็ด้วยการ submit form



        }// END if ( $upload_image->processed )

    }//END if ( $upload_image->uploaded )


}
?>
