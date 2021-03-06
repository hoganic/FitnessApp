<!DOCTYPE html>
<html>
<head>
  <title>FitGO</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid" style="background-color:rgb(51,51,51);">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.html">FitGo</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.html">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Links <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="profile.php">Profile</a></li>
          <li><a href="#">Me too!</a></li>
          <li><a href="#">Not me...</a></li>
        </ul>
      </li>
      <li><a href="about.html">About</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a><span class="fb-login-button" data-max-rows="1" data-size="large" data-show-faces="false" data-auto-logout-link="true" data-scope="public_profile,email,user_friends" onlogin="checkLoginState();"></span></a></li>
    </ul>
  </div>
</nav>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.html">FitGO</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.html">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Links <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="profile.php">Profile</a></li>
          <li><a href="api.php">Nutritionix Test</a></li>
          <li><a href="people.html">Meal Planning</a></li>
          <li><a href="#">Not me...</a></li>
        </ul>
      </li>
      <li><a href="about.html">About</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a><span class="fb-login-button" data-max-rows="1" data-size="large" data-show-faces="false" data-auto-logout-link="true" data-scope="public_profile,email,user_friends" onlogin="checkLoginState();"></span></a></li>
    </ul>
  </div>
</nav>
</div>


<!--  How to use the nutritionix URL:
	search term:  search term is located in between /search/ and ?
		To change search term you can put what ever you want after search/ with %20 as spaces. 
	After the ? is results=0%3A5  => this means that there are 0:5 search results. Change these terms to change
		how many results you get from the search.
	The next two terms, cal_min and cal_max, limit the returned results by how many calories they contain per serving
	The rest of the search specifies the return items we need for the database, fat, protein, carbs, ...
	Aastha's API ID and Key are right at the end of the serach. If we need to update or use a different key
		this is where we can change it.
  -->

<?php
$returned_content = get_data("https://api.nutritionix.com/v1_1/search/pop%20tart?results=0%3A5&cal_min=0&cal_max=50000&fields=nf_total_carbohydrate%2Cnf_protein%2Cnf_total_fat%2Cnf_serving_size_qty%2Cnf_serving_size_unit%2Cnf_serving_weight_grams%2Citem_name%2Cbrand_name&appId=550ff872&appKey=c6944198d0b40c218890bc459c700fdc");

$array = json_decode($returned_content, TRUE);

foreach($array["hits"] as $hits){
	echo "Item name: ".$hits["fields"]["item_name"]."<br>";
	echo "Brand name: ".$hits["fields"]["brand_name"]."<br>";
	echo "Serving size (quantity): ".$hits["fields"]["nf_serving_size_qty"]."<br>";
	echo "Serving size (unit): ".$hits["fields"]["nf_serving_size_unit"]."<br>";
	echo "Serving size (grams): ".$hits["fields"]["nf_serving_weight_grams"]."<br>";
	echo "Total carbs: ".$hits["fields"]["nf_total_carbohydrate"]."<br>";
	echo "Total protein: ".$hits["fields"]["nf_protein"]."<br>";
	echo "Total fat: ".$hits["fields"]["nf_total_fat"]."<br><br>";
}

	function get_data($url) {
		$ch = curl_init();
		$timeout = 5;
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>