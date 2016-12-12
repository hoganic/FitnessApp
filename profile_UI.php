<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Profile</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="black" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


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
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Profile</a>
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
                            <a><span class="fb-login-button" data-max-rows="1" data-size="large" data-show-faces="false" data-auto-logout-link="true" data-scope="public_profile,email,user_friends" onlogin="checkLoginState();"></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                <form>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" id="FirstName" placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" id="LastName" placeholder="Last Name">
                                            </div>
                                        </div>
                                    </div>

																		<div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Height(in)</label>
                                                <input type="number" class="form-control" id="height" placeholder="Height">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Weight(lb)</label>
                                                <input type="number" class="form-control" id="weight" placeholder="Weight">
                                            </div>
                                        </div>
                                    </div>

																		<div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Age</label>
                                                <input type="number" class="form-control" id="age" placeholder="Age">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Gender</label><br/>
																								<input type="radio" name="gender" id="gender_female" value="female"> Female
																				        <input type="radio" name="gender" id="gender_male" value="male"> Male
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Body Fat Percentage(%)</label>
                                                <input type="number" class="form-control" id="bfp" placeholder="Body Fat Percentage">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>My Goal</label>
                                                <textarea rows="5" id="goal" class="form-control" placeholder="My goal" value="Mike"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button onclick="return checkfbstatus()" class="btn btn-info btn-fill pull-right" id="submitButton">Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" id="profilePic" src="assets/img/faces/face-3.jpg" alt="..."/>

                                      <h4 class="title">Your name<br />
                                         <small>Your FBid</small>
                                      </h4>
                                    </a>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="Facebook_link" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="index.html">
                                Home
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2016 made with love by FitGo team.
                </p>
            </div>
        </footer>

    </div>
</div>

<script>

  var foundUserFlag = false;
  var logState = false;
  var fbuid;
  var row;

  function checkfbstatus(){
    console.log("I made it here!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!")
    console.log('checkfbstatus');
    FB.getLoginStatus(function(response) {
      statusChangeCallback2(response);
    });
    console.log(logState);
    var createNew;
    if(foundUserFlag){
      createNew = "no";
    }else{
      createNew = "yes";
    }

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
    var gender = '';
    if (document.getElementById('gender_female').checked) {
      gender = document.getElementById('gender_female').value;
    }
    if (document.getElementById('gender_male').checked) {
      gender = document.getElementById('gender_male').value;
    }
    console.log("This is what the link is building to...");
    console.log("userprofile.php?fbuid="+fbuid+"&fn="+document.getElementById("FirstName").value+"&ln="+document.getElementById("LastName").value+"&h="+document.getElementById("height").value+"&w="+document.getElementById("weight").value+"&a="+document.getElementById("age").value+"&ge="+gender+"&b="+document.getElementById("bfp").value+"&go="+encodeURIComponent(document.getElementById("goal").value)+"&usertype="+createNew);
    xmlhttp.open("GET", "userprofile.php?fbuid="+fbuid+"&fn="+document.getElementById("FirstName").value+"&ln="+document.getElementById("LastName").value+"&h="+document.getElementById("height").value+"&w="+document.getElementById("weight").value+"&a="+document.getElementById("age").value+"&ge="+gender+"&b="+document.getElementById("bfp").value+"&go="+encodeURIComponent(document.getElementById("goal").value)+"&usertype="+createNew,true);
    xmlhttp.send();

    if(!(/^[A-Za-z\s]+$/.test(document.getElementById("FirstName").value))){
      logState = false;
    }
    if(!(/^[A-Za-z\s]+$/.test(document.getElementById("LastName").value))){
      logState = false;
    }
    if(document.getElementById("height").value < 1){
      logState = false;
    }
    if(document.getElementById("weight").value < 1){
      logState = false;
    }
    if(document.getElementById("weight").value < 1){
      logState = false;
    }
    if(document.getElementById("age").value < 1){
      logState = false;
    }
    //if(!document.querySelector('input[name="gender"]:checked').value){
    //  logState = false;
    //}
    if(document.getElementById("bfp").value < 1){
      logState = false;
    }


    return logState;
  }

  function statusChangeCallback2(response) {
    console.log('statusChangeCallback2');
    console.log(response);
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      logState = true;
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      logState = false;
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      logState = false;
    }
  }

  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      fbuid = response.authResponse.userID;
      console.log("Found fbuid of "+fbuid);
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1169538589774243',
      xfbml      : true,
      version    : 'v2.7'
    });
    FB.AppEvents.logPageView();
  

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
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

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      console.log('Resonse: ' + response);
      //document.getElementById('status').innerHTML =
      //  'Thanks for logging in, ' + response.name + '!';
    });

    FB.api('/me/picture?width=180&height=180', function (response) {
      console.log(response);
      //$('<img>', {
      //  src: response.data.url
      //}).appendTo('body');
      var pP = document.getElementById('profilePic');
      pP.innerHTML = '<img alt=' + response.data.url + '>';
    });

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
            $sql = "SELECT facebook_uid, first_name, last_name, height, weight, age, gender, bfp, goal FROM user_profile";
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
            foundUserFlag = true;
            user = row[x];
        }
      }
      document.getElementById("FirstName").value = user["first_name"];
      document.getElementById("LastName").value = user["last_name"];
      document.getElementById("height").value = user["height"];
      document.getElementById("weight").value = user["weight"];
      document.getElementById("age").value = user["age"];
      if(user["gender"] == "male"){
        document.getElementById("gender_male").checked = true;
      }
      if(user["gender"] == "femal"){
        document.getElementById("gender_female").checked = true;
      }
      document.getElementById("bfp").value = user["bfp"];
      document.getElementById("goal").value = user["goal"];
  }
</script>

</body>

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

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<script type="text/javascript">
	    	$(document).ready(function(){

	        	demo.initChartist();

	        	$.notify({
	            	icon: 'pe-7s-gift',
	            	message: "Update your profile!"

	            },{
	                type: 'info',
	                timer: 4000
	            });

	    	});
	</script>

</html>
