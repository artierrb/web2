<?php
        session_start();
        if (!isset($_SESSION['login_id'])) {
            header("Location: testlogin2.php");
        }
        require 'connectdb.php';
        $session_login_id = $_SESSION['member_id'];

        $qry_user = "SELECT * FROM tblmember WHERE member_id='$session_login_id'";
        $result_user = mysqli_query($dbcon,$qry_user);
        if ($result_user) {
            $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
            $s_login_username = $row_user['member_username'];
            $s_login_email = $row_user['member_email'];
            mysqli_free_result($result_user);
        }
        mysqli_close($con);
        ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
                echo "รหัสสมาชิก: ".$_SESSION['login_id'];
                echo "<br>";
                echo "ยินดีต้อนรับคุณ $s_login_username อีเมล์ $s_login_email" ;
        ?>
        <hr>
        <a href="logout.php">ออกจากระบบ</a>
    </body>
</html>
