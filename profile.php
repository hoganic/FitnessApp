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
          <li><a href="#">Meal Planning</a></li>
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
          <li><a href="people.html">Meal Plan</a></li>
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

<?php
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
          $row = $result->fetch_assoc();
  } catch (Exception $e) {
    
  }

  $FirstName = $LastName = $height = $weight = $age = $gender = $bfp = $goal = "";
  $fnerr = $lnerr = $heighterr = $weighterr = $ageerr = $gendererr = $bfperr = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["FirstName"])) {
      $fnerr = "First Name is required";
    } else {
      $FirstName = test_input($_POST["FirstName"]);
      if (!preg_match("/^[a-zA-Z ]*$/", $FirstName)) {
        $fnerr = "Only letters and white space allowed";
        $FirstName = "";
      }
    }
    if (empty($_POST["LastName"])) {
      $lnerr = "Last Name is required";
    } else {
      $LastName = test_input($_POST["LastName"]);
      if (!preg_match("/^[a-zA-Z ]*$/", $LastName)) {
        $lnerr = "Only letters and white space allowed";
        $LastName = "";
      }
    }
    if (empty($_POST["height"])) {
      $heighterr = "Height is required";
    } else {
      $height = test_input($_POST["height"]);
    }
    if (empty($_POST["weight"])) {
      $weighterr = "Weight is required";
    } else {
      $weight = test_input($_POST["weight"]);
    }
    if (empty($_POST["age"])) {
      $ageerr = "Age is required";
    } else {
      $age = test_input($_POST["age"]);
    }
    if (empty($_POST["gender"])) {
      $gendererr = "Gender is required";
    } else {
      $gender = test_input($_POST["gender"]);
    }
    $bfp = test_input($_POST["bfp"]);
    $goal = test_input($_POST["goal"]);


  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>

<div class="container-fluid">
  <h1>Profile</h1>
  <p>Your profile</p>
  <div class="row" style="padding-bottom: 5px">
    <div id="profilePic" class="col-xs-4"></div>
  </div>
  <style>.error {color: #FF0000;}</style>
  <form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return checkfbstatus()">
    <div class="row" style="padding-bottom: 5px"><br>
      <div class="col-xs-12"><span class="error"> * required field.</span></div>
      <div class="col-xs-2">First Name: <input class="form-control" type="text" id="FirstName" name="FirstName" value=<?php echo $FirstName;?>>
      <span class="error" id="fnerror">* <?php echo $fnerr;?></span></div>
    </div>
    <div class="row" style="padding-bottom: 5px">
      <div class="col-xs-2">Last Name: <input class="form-control" type="text" id="LastName" name="LastName" value=<?php echo $LastName;?>>
      <span class="error">* <?php echo $lnerr;?></span></div>
    </div>
    <div class="row" style="padding-bottom: 5px">
      <div class="col-xs-2">Height (in): <input class="form-control" type="number" id="height" name="height" min="1" value=<?php echo $height;?>>
      <span class="error">* <?php echo $heighterr;?></span></div>
    </div>
    <div class="row" style="padding-bottom: 5px">
      <div class="col-xs-2">Weight: <input class="form-control" type="number" id="weight" name="weight" min="1" value=<?php echo $weight;?>>
      <span class="error">* <?php echo $weighterr;?></span></div>
    </div>
    <div class="row" style="padding-bottom: 5px">
      <div class="col-xs-2">Age: <input class="form-control" type="number" id="age" name="age" min="1" value=<?php echo $age;?>>
      <span class="error">* <?php echo $ageerr;?></span></div>
    </div>
    <div class="row" style="padding-bottom: 5px">
      <div class="col-xs-1">Gender: 
        <br>Female<input class="form-control" type="radio" id="gender_female" name="gender" value="female" <?php echo ($gender=='female')?'checked':'' ?>>
        Male<input class="form-control" type="radio" id="gender_male" name="gender" value="male" <?php echo ($gender=='male')?'checked':'' ?>>
        <span class="error">* <?php echo $gendererr;?></span>
      </div>
    </div>
    <div class="row" style="padding-bottom: 5px">
      <div class="col-xs-2">Body Fat Percentage: <input class="form-control" type="number" id="bfp" name="bfp" min="1" value=<?php echo $bfp;?>>
      <span class="error"> <?php echo $bfperr;?></span></div>
    </div>
    <div class="row" style="padding-bottom: 5px">
      <div class="col-xs-8">Goal:</div>
      <div class="col-xs-8"><textarea id="goal" name="goal" rows="2" cols="40"><?php echo $goal;?></textarea></div>
    </div>
    <div class="row" style="padding-bottom: 5px">
      <input type="hidden" id="fbuid" name="fbuid" value="">
      <div class="col-xs-8"><input type="submit" id="submitButton" value="Save"></button></div>
    </div>
    <div class="row" style="padding-bottom: 5px">
      <div class="col-xs-8">Must be logged into Facebook to submit.</div>
    </div>
  </form>

<br><br>
<?php
echo "<h3>Your Inputs</h3>";
echo $FirstName;
echo "<br>";
echo $LastName;
echo "<br>";
echo $height;
echo "<br>";
echo $weight;
echo "<br>";
echo $age;
echo "<br>";
echo $gender;
echo "<br>";
echo $bfp;
echo "<br>";
echo $goal;
?>
<br><br>

  <br><br><div id="status"></div>

  <div
    class="fb-like"
    data-share="true"
    data-width="450"
    data-show-faces="true">
  </div>
</div>
<script>

  var foundUserFlag = false;
  var logState = false;
  var fbuid;
  var row;

  function checkfbstatus(){
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
    console.log("This is what the link is building to...");
    console.log("userprofile.php?fbuid="+fbuid+"&fn="+document.getElementById("FirstName").value+"&ln="+document.getElementById("LastName").value+"&h="+document.getElementById("height").value+"&w="+document.getElementById("weight").value+"&a="+document.getElementById("age").value+"&ge="+document.querySelector('input[name="gender"]:checked').value+"&b="+document.getElementById("bfp").value+"&go="+encodeURIComponent(document.getElementById("goal").value)+"&usertype="+createNew);
    xmlhttp.open("GET", "userprofile.php?fbuid="+fbuid+"&fn="+document.getElementById("FirstName").value+"&ln="+document.getElementById("LastName").value+"&h="+document.getElementById("height").value+"&w="+document.getElementById("weight").value+"&a="+document.getElementById("age").value+"&ge="+document.querySelector('input[name="gender"]:checked').value+"&b="+document.getElementById("bfp").value+"&go="+encodeURIComponent(document.getElementById("goal").value)+"&usertype="+createNew,true);
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
    if(!document.querySelector('input[name="gender"]:checked').value){
      logState = false;
    }
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
      pP.innerHTML = '<img src=' + response.data.url + '>';
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
    console.log(row[1]["facebook_uid"]);
    console.log(Object.keys(row).length);
    /*for(var i = 0; i < Object.keys(row).length; i++){
      if( row[i]["facebook_uid"] == fbuid){
        foundUserFlag = true;
        console.log("FirstName: "+row[i]["first_name"]);
        document.getElementById("FirstName").value = row[i]["first_name"];
        document.getElementById("LastName").value = row[i]["last_name"];
        document.getElementById("height").value = row[i]["height"];
        document.getElementById("weight").value = row[i]["weight"];
        document.getElementById("age").value = row[i]["age"];
        if(row[i]["gender"] == "male"){
          document.getElementById("gender_male").checked = true;
        }
        if(row[i]["gender"] == "femal"){
          document.getElementById("gender_female").checked = true;
        }
        document.getElementById("bfp").value = row[i]["bfp"];
        document.getElementById("goal").value = row[i]["goal"];
        document.getElementById("fbuid").value = row[i]["facebook_uid"];
      }
    }*/
  }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
