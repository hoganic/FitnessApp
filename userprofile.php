<!DOCTYPE html>
<html>
<body>


<?php
  $fbuid = intval($_GET["fbuid"]);
  //echo "<br><br>fbuid found "; 
  //echo $fbuid;
  $fn = $_GET["fn"];
  //echo "<br><br>first name found ";
  //echo $fn;
  $ln = $_GET["ln"];
  //echo "<br><br>last name found ";
  //echo $ln;
  $h = intval($_GET["h"]);
  //echo "<br><br>height found ";
  //echo $h;
  $w = intval($_GET["w"]);
  //echo "<br><br>weight found ";
  //echo $w;
  $a = intval($_GET["a"]);
  //echo "<br><br>age found ";
  //echo $a;
  $ge = $_GET["ge"];
  //echo "<br><br>gender found ";
  //echo $ge;
  $b = intval($_GET["b"]);
  //echo "<br><br>bfp found ";
  //echo $b;
  $go = $_GET["go"];
  //echo "<br><br>goal found ";
  //echo $go;
  $createNew = $_GET["usertype"];

  $fbuid_meals = $fbuid."_meals";
  $fbuid_saved = $fbuid."_saved";

  $servername = "db-instance.cx5wifjnzcok.us-west-2.rds.amazonaws.com";
  $username = "db_user";
  $password = "fitgoapp";
  $dbname = "user_db";

  $con = mysqli_connect($servername, $username, $password, $dbname);
  if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
  }

  mysqli_select_db($con,"user_db");

  if($createNew == "yes"){
    $sql = "INSERT INTO user_profile (facebook_uid, first_name, last_name, height, weight, age, gender, bfp, goal) VALUES ($fbuid, '$fn', '$ln', $h, $w, $a, '$ge', $b, '$go');";
  } else {
    $sql = "UPDATE user_profile SET first_name='$fn', last_name='$ln', height=$h, weight=$w, age=$a, gender='$ge', bfp=$b, goal='$go' WHERE facebook_uid=$fbuid;";
  }

  $result = mysqli_query($con,$sql);
  #mysqli_close($con);

  #$dbname = "meal_db";
  #$con = mysqli_connect($servername, $username, $password, $dbname);
  mysqli_select_db($con, "meal_db");

  if($createNew == "yes"){
    $sql = "CREATE TABLE $fbuid_meals ( food_item varchar(250), serving_size int(11), serving_units varchar(25), user_amount int(11), carbs int(11), protein int(11), fat int(11), calories int(11), tags varchar(2000) )";
    $results1 = mysqli_query($con,$sql);
    
    $sql = "CREATE TABLE $fbuid_saved ( food_item varchar(250), serving_size int(11), serving_units varchar(25), user_amount int(11), carbs int(11), protein int(11), fat int(11), calories int(11), tags varchar(2000) )";
    $results2 = mysqli_query($con,$sql);
  }

  mysqli_close($con);
?>
</body>
</html>