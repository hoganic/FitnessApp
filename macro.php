<!DOCTYPE html>
<html>
<body>


<?php
  $fbuid = intval($_GET["fbuid"]);
  //echo "<br><br>fbuid found "; 
  //echo $fbuid;
  $bmr = intval($_GET["bmr"]);
  //echo "<br><br>bmr found ";
  //echo $bmr;
  $pro = intval($_GET["pro"]);
  //echo "<br><br>protein found ";
  //echo $pro;
  $car = intval($_GET["car"]);
  //echo "<br><br>carbs found ";
  //echo $car;
  $fat = intval($_GET["fat"]);
  //echo "<br><br>fat found ";
  //echo $fat;
  $cal = intval($_GET["cal"]);
  //echo "<br><br>calories found ";
  //echo $cal;
  
  $servername = "db-instance.cx5wifjnzcok.us-west-2.rds.amazonaws.com";
  $username = "db_user";
  $password = "fitgoapp";
  $dbname = "user_db";

  $con = mysqli_connect($servername, $username, $password, $dbname);
  if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
  }

  mysqli_select_db($con,"user_db");

  $sql = "INSERT INTO user_macro (fbuid, bmr, protein, carbs, fat, calories) VALUES ($fbuid, $bmr, $pro, $car, $fat, $cal);";

  $result = mysqli_query($con,$sql);

  mysqli_close($con);
?>
</body>
</html>