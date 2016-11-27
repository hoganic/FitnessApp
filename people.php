<!DOCTYPE html>
<html>
<head>
  <title> Meal Planning Page</title>
  <meta charset="UTF-8">
  <script type="text/javascript" src="app.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid" style="background-color:rgb(51,51,51);"
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
</div>

<style type="text/css">
.right-message {
    position:absolute;
    top:5px;
    right:5px;
}
.container{
    display: flex;
}
.fixed{
    width: 500px;
}
.flex-item{
    flex-grow: 1;
    position:absolute;
    top:100px;
    right:5px;
}
</style>

<body onload="load()">
<<div class="fixed">
<b><strong>MEAL PLANNING</strong></b>
<table>
    <tr>
        <td>Meal Number</td>
        <td><input type="text" id="mealno"></td>
    </tr>

    <tr>
        <td>Food:</td>
        <td><input type="text" id="food" value="<?php echo htmlspecialchars($name); ?>" ></td>
    </tr>
    <tr>
        <td>Serving Size (Units):</td>
        <td><input type="text" id="serving_size_unit" value="<?php echo htmlspecialchars($serving_size_unit); ?>"></td>
    </tr>
    <tr>
        <td>Carbs:</td>
        <td><input type="text" id="carbs" value="<?php echo htmlspecialchars($carbs); ?>"></td>
    </tr>
    <tr>
        <td>Protein:</td>
        <td><input type="text" id="protein" value="<?php echo htmlspecialchars($protein); ?>"></td>
    </tr>
    <tr>
        <td>Fat:</td>
        <td><input type="text" id="fat" value="<?php echo htmlspecialchars($fat); ?>"></td>
    </tr>
    <tr>
        <td>Calories:</td>
        <td><input type="text" id="calories"></td>
    </tr>
    <tr>
        <td>Amount:</td>
        <td><input type="text" id="amount">
        <td><input type="button" id="add" value="Add" onclick="Javascript:addRow()"></td>
    </tr>

    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
</table>
</div>
	
<div class="flex-item">
<?php
$returned_content = get_data("https://api.nutritionix.com/v1_1/search/pop%20tart?results=0%3A1&cal_min=0&cal_max=50000&fields=nf_total_carbohydrate%2Cnf_protein%2Cnf_total_fat%2Cnf_serving_size_qty%2Cnf_serving_size_unit%2Cnf_serving_weight_grams%2Citem_name%2Cbrand_name&appId=550ff872&appKey=c6944198d0b40c218890bc459c700fdc");
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
	$name = $hits["fields"]["item_name"];
	$serving_size_unit = $hits["fields"]["nf_serving_size_unit"];
	$carbs = $hits["fields"]["nf_total_carbohydrate"];
	$protein = $hits["fields"]["nf_protein"];
	$fat = $hits["fields"]["nf_total_fat"];
	echo $fat;
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
	</div>
	
<div id="mydata">
<b>Your Current Plan</b>
<table id="myTableData"  border="1" cellpadding="2">
    <tr>
        <td>&nbsp;</td>
        <td><b>Meal Number</b></td>
        <td><b>Food</b></td>
        <td><b>Serving Size (Units)</b></td>
        <td><b>Amount</b></td>
        <td><b>Carbs</b></td>
        <td><b>Protein</b></td>
        <td><b>Fat</b></td>
        <td><b>Calories</b></td>
    </tr>
</table>
&nbsp;
 
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

	Currently set for only 1 result for simplicity
  -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
