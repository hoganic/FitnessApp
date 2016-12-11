<!DOCTYPE html>
<html>
<body>


<?php
  $mealNum = array();
  $servSize = array();
  $amount = array();
  $carbs = array();
  $prot = array();
  $fat = array();
  $calor = array(); 
  $food = array();
  $fbuid = intval($_GET["fbuid"]);
  $fbuid_meals = $fbuid."_meals";
  $today = date("m.d.y");

  foreach ($_GET as $key => $value) {
    $key = preg_replace('/[0-9]+/', '', $key);
    if ($key == "mealNum") {
      array_push($mealNum, $value);
    } else if ($key == "food") {
      array_push($food, $value);
    } else if ($key == "servSize") {
      array_push($servSize, $value);
    } else if ($key == "amount") {
      array_push($amount, $value);
    } else if ($key == "carbs") {
      array_push($carbs, $value);
    } else if ($key == "prot") {
      array_push($prot, $value);
    } else if ($key == "fat") {
      array_push($fat, $value);
    } else if ($key == "calor") {
      array_push($calor, $value);
    }
  }
  
  $servername = "db-instance.cx5wifjnzcok.us-west-2.rds.amazonaws.com";
  $username = "db_user";
  $password = "fitgoapp";
  $dbname = "meal_db";

  $con = mysqli_connect($servername, $username, $password, $dbname);
  if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
  }

  mysqli_select_db($con,"meal_db");

  for ($i = 0; $i<=count($mealNum); $i++) {
    $sql = "INSERT INTO $fbuid_meals (food_item, serving_size, user_amount, carbs, protein, fat, calories, tags) VALUES ($food[$i], $servSize[$i], $amount[$i], $carbs[$i], $prot[$i], $fat[$i], $calor[$i], $mealNum[$i].\"\n\".$today);";
  }

  $result = mysqli_query($con,$sql);

  mysqli_close($con);
?>
</body>
</html>