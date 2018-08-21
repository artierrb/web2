<?php
require 'connectdb.php';

  $member_username = mysqli_real_escape_String($con,$_POST['username']);
  $member_password = mysqli_real_escape_String($con,$_POST['password']);


  $salt = 'tikde78uj4ujuhlaoikiksakeidke';
  $hash_member_password = hash_hmac('sha256',$member_password,$salt);

  $sql = "SELECT * FROM tblmember WHERE member_username=? AND member_password=?";
  $stmt = mysqli_prepare($con,$sql);
  mysqli_stmt_bind_param($stmt,"ss",$member_username,$hash_member_password);
  mysqli_execute($stmt);
  $result_user = mysqli_stmt_get_result($stmt);
  $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
  if(!$row_user)
  {
    echo "<script>
          alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
          window.location = href='javascript:history.back(1);';
          </script>";
  }
  else
  {
    session_start();

    $_SESSION['member_id'] = $row_user['member_id'];
    $_SESSION['member_role'] = $row_user['member_role'];

    if ($row_user["member_role"] == "Admin") {
      echo "<script>
            window.location.href='adminindex.php';
            </script>";
    }
    else {
      echo "<script>
            window.location.href='memberinfoindex.php';
            </script>";
    }
  }
  /*
  if ($result_user->num_rows == 1) {
  session_start();
    $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
    $_SESSION['member_id'] = $row_user['member_id'];
    echo "<script>
          //alert('ยินดีต้อนรับคุณ ".$row_user['member_name']."');
          //window.location.href='memberinfoindex.php';
          window.location.href='adminindex.php';
          </script>";
  } else {
    echo "<script>
          alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
          //window.location = href='javascript:history.back(1);';
          window.location.href='memberinfoindex.php';
          </script>";
  }*/
  /*if($objResult["member_role"] == "Admin")
			{
				header("location:admin_page.php");
			}
			else
			{
				header("location:memberinfoindex.php");
			}*/



 ?>
