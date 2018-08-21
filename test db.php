<!DOCTYPE html>
<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "web2";
$con = @mysqli_connect($server, $username, $password, $database)
or die("Cannot connect database!!!");
mysqli_query($con, "set names utf8");

//echo "connect database successfully<br>";
$query = "SELECT * FROM board ORDER BY b_score DESC LIMIT 0,3" or die("Error:" . mysqli_error());
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>







<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Go! Travel.com</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style media="screen">
      div {
        font-family: 'Leelawadee UI' , sans-serif;
      }

      ul.a {
        list-style-type: none;


      }
      .carousel-caption {
      position: relative;
      left: auto;
      right: auto;
      }





    </style>
  </head>

  <body>


<table border="1" cellspanding = "0">
  <tr>
    <th>ชื่อ</th>
    <th>คะแนน</th>
  </tr>
  <?php
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
  echo "<tr>";
  echo "<td>".$row['b_name']. "</td>";
  echo "<td>".$row['b_score']. "</td>";
  echo "</tr>";
  }
  ?>
  </table>







    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <!-- สคริปดาว -->
    <script src="build/bootstrap-rating-input.min.js"></script>
  </body>
</html>
