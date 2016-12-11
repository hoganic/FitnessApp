<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Meal Planning Page</title>
    <script type="text/javascript" src="app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="index.html" class="simple-text">
                    FitGo
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="peopleUI.php">
                        <i class="pe-7s-graph"></i> 
			    <p>Meal Planner</p>
                    </a>
                </li>
                <li class="active">
                    <a href="calculatorTemplateUI.php">
                        <i class="pe-7s-calculator"></i>
                        <p>Male Calculator</p>
                    </a>
                </li>
                <li class="active">
                    <a href="femalecalcUI.php">
                        <i class="pe-7s-calculator"></i>
                        <p>Female Calculator</p>
                    </a>
                </li>
		<li class="active">
                    <a href="profile_UI.php">
                        <i class="pe-7s-user"></i>
                        <p>Profile</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Plan Your Meal for Today</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="landing-page.html">
                               About
                            </a>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="fixed">
			<div class="card">
				<div class="header">
					<h4 class="title">Instructions</h4>
					<p> Each meal should contain a source Protein, Carbs, and a Vegtable and meal creation will 
					   follow this pattern. The number of meals per today is based on the number of macros the user
						requires and how much the user wants to eat per meal, generally 3 to 6 meals. </p>
					<p> Meal Creation:</p>
					<p> 1) Choose a protein to search for in the search bar. i.e. Chicken, Steak, Pork, etc. </p>
					<p> 2) Change quantity based on desired amount and to fit macros. </p>
					<p> 3) Repeat these steps for desired carbohydrate (bread, pasta, potatoes, quinoa, rice) and vegtables.</p>
					<p> Snacks </p>
					<p> A snack is considered a meal and should be numbered as the next meal, however generally a snack is 
						small consisting of only a singular or few foods. </p>
					<p> A snack can range from a piece of fruit to chips or any desired snack food. </p>
					<p> As long as it fits in the macros, it is in your diet. </p>
					   
			</div>
			<div class="card">
				<div class="header">
					<h4 class="title">Macros</h4>
				</div>
				<form>
					User Macros <input type="text" name="UserCarbs" id="UserCarbs" value="0">Carbs
					<input type="text" name="UserProtein" id="UserProtein" value="0">Protein
					<input type="text" name="UserFat" id="UserFat" value="0">Fat
					<input type="text" name="UserCalories" id="UserCalories" value="0">Calories
				</form>
					
				<div class="header">
					<h4 class="title">Food Search</h4>
                <form>
    Food Search <input type="text" name="query" id="query">
    <input type="Submit" value="Search" onClick="return search_request()">
</form>
<p id="mealPlan"></p>   
    
<table>
    <tr>
        <td>Meal Number</td>
        <td><input type="text" id="mealno"></td>
    </tr>

    <tr>
        <td>Food:</td>
        <td><input type="text" id="food" value="" ></td>
    </tr>
    <tr>
        <td> Serving Sizes:
        <select id="serving_size" onchange="updateText()">
          <option id ="serving_size_unit" value=''>Unit</option>
          <option id ="serving_size_container" value=''>Container</option>
          <option id ="serving_size_grams" value=''>Grams</option>
          </select></td>
        <td><input type="text" value="" id="servings"></td> 
    </tr>
    <tr>
        <td>Carbs:</td>
        <td><input type="text" id="carbs" value=""></td>
    </tr>
    <tr>
        <td>Protein:</td>
        <td><input type="text" id="protein" value=""></td>
    </tr>
    <tr>
        <td>Fat:</td>
        <td><input type="text" id="fat" value=""></td>
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

<div id="mydata">
<b>Your Current Plan</b>
<table id="myTableData"  border="1" cellpadding="2">
  <tbody>
    <tr class="title">
        <td>&nbsp;</td>
        <td><b>Meal Number</b></td>
        <td><b>Food</b></td>
        <td><b>Serving Size</b></td>
        <td><b>Amount</b></td>
        <td><b>Carbs</b></td>
        <td><b>Protein</b></td>
        <td><b>Fat</b></td>
        <td><b>Calories</b></td>
    </tr>
    <tr class="totals">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td class="totalC"></td>
        <td class="totalC"></td>
        <td class="totalC"></td>
        <td class="totalC"></td>
    </tr>
  </tbody>
</table>
&nbsp;
 
</div>  
<p><input type="submit" name="submit" value="Save your meals to your profile." /></p>
  <script>
        function updateText() {
             document.getElementById("servings").value = document.getElementById("serving_size").value;
        }
  </script>
  <script>
        var totals = [0,0,0,0];
    $(document).ready(function () {
        $(document).click(function(){
	      var UserCarbs = parseFloat(document.getElementById("UserCarbs").value);
	      var UserProtein = parseFloat(document.getElementById("UserProtein").value);
	      var UserFat = parseFloat(document.getElementById("UserFat").value);
	      var UserCalories = parseFloat(document.getElementById("UserCalories").value);
              var totals = [UserCarbs,UserProtein,UserFat,UserCalories];
              var $dataRows=$("#myTableData tr:not('.totals, .title')");
              $dataRows.each(function() {
                  $(this).find('.colTotal').each(function(i){
                      totals[i]-=parseFloat( $(this).html());
                  });
              });
              $("#myTableData td.totalC").each(function(i){
                  $(this).html("Total:"+totals[i].toFixed(2));
              });
          });
    });
</script> 
  
<script>
    var results;
    function search_request(){
      $.ajax({
          url: 'https://api.nutritionix.com/v1_1/search/'+ encodeURI(document.getElementById('query').value) +'?results=0%3A1&cal_min=0&cal_max=50000&fields=nf_total_carbohydrate%2Cnf_protein%2Cnf_total_fat%2Cnf_serving_size_qty%2Cnf_serving_size_unit%2Cnf_serving_weight_grams%2Cnf_servings_per_container%2Citem_name%2Cbrand_name&appId=550ff872&appKey=c6944198d0b40c218890bc459c700fdc',
          cache:false,
          success: function(data){
              console.log(data);
              console.log(data["hits"][0]["fields"]["nf_servings_per_container"]);
              console.log(data["hits"][0]["fields"]["nf_serving_size_unit"]);
              document.getElementById("food").value = data["hits"][0]["fields"]["item_name"];
              document.getElementById("serving_size_grams").value = data["hits"][0]["fields"]["nf_serving_weight_grams"];
              document.getElementById("serving_size_container").value = data["hits"][0]["fields"]["nf_servings_per_container"];
              document.getElementById("serving_size_unit").value = data["hits"][0]["fields"]["nf_serving_size_unit"];
              document.getElementById("carbs").value = data["hits"][0]["fields"]["nf_total_carbohydrate"];
              document.getElementById("protein").value = data["hits"][0]["fields"]["nf_protein"];
              document.getElementById("fat").value = data["hits"][0]["fields"]["nf_total_fat"];
          }
      });
      return false;
    }
</script>

<script>

  var logState = false;

  function checkfbstatus(){
    console.log('checkfbstatus');
    FB.getLoginStatus(function(response) {
      statusChangeCallback2(response);
    });

    if(window.XMLHttpRequest){
      xmlhttp = new XMLHttpRequest();
    }else{
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    
    xmlhttp.onreadystatechange = function() {
      if(this.readyState == 4 && this.status == 200){
        //If I need to add a response from PHP
      }
    };
    console.log("macro.php?fbuid="+document.getElementById("fbuid").value+"&bmr="+document.getElementById("BMR").value+"&pro="+document.getElementById("protein").value+"&car="+document.getElementById("carbs").value+"&fat="+document.getElementById("fat").value+"&cal="+document.getElementById("calories").value)
    //xmlhttp.open("GET", "macro.php?fbuid="+document.getElementById("fbuid").value+"&bmr="+document.getElementById("BMR").value+"&pro="+document.getElementById("protein").value+"&car="+document.getElementById("carbs").value+"&fat="+document.getElementById("fat").value+"&cal="+document.getElementById("calories").value,true);
    //xmlhttp.send();

    return logState;
  }

  function statusChangeCallback2(response) {
    console.log('statusChangeCallback2');
    console.log(response);
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      logState = true;
      fbuid = response.authResponse.userID;
      row = <?php 
        $servername = "db-instance.cx5wifjnzcok.us-west-2.rds.amazonaws.com";
        $username = "db_user";
        $password = "fitgoapp";
        $dbname = "user_db";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        try {
            $sql = "SELECT facebook_uid, bmr, protein, carbs, fat, calories FROM user_macro";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                $sql_out = "{";
                $counter = 0;
                $row = $result->fetch_assoc();
                $sql_out = $sql_out.$counter.": ".json_encode($row);
                $counter = $counter + 1;
                while($row = $result->fetch_assoc()){
                  $sql_out = $sql_out.",".$counter.": ".json_encode($row);
                  $counter = $counter + 1;
                }
              }
              $sql_out = $sql_out."}";
        } catch (Exception $e) {

        }
        echo $sql_out;
        ?>;
      console.log("test print row")
      console.log(row);
      var user;
      for(x in row){
        if(row[x]["facebook_uid"] == fbuid){
            user = row[x];
        }
      }
      console.log(user["facebook_uid"]);
      document.getElementById("UserCalories").value = user["calories"];
      document.getElementById("UserFat").value = user["fat"];
      document.getElementById("UserProtein").value = user["protein"];
      document.getElementById("UserCarbs").value = user["carbs"];
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      logState = false;
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      logState = false;
    }
  }

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1169538589774243',
      xfbml      : true,
      version    : 'v2.7'
    });
    FB.AppEvents.logPageView();

  FB.getLoginStatus(function(response) {
    statusChangeCallback2(response);
  });
  };
  // Load the SDK asynchronously
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>

</div>
</div>
</div>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js"></script>
</html>
