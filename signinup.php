<?php
//session_start();

$_SESSION['message']="";
    
$servername = "localhost";
$username = "root";
$password = "";
$database="RoadSideAssistance";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user";
$result = $conn->query($sql);
$totaluid=0;                      // to find total user present
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $totaluid=$totaluid+1;
  }
}

$uid1=$totaluid+1;
$name=$_POST["username"];
$passwd=md5($_POST["password"]);
$email=$_POST['email'];
$_SESSION["username"]=$name;
var_dump($_POST);
//$sql = "INSERT INTO user (uid,uname, uemail, upasswd)
//VALUES ($uid,$name,$email,$passwd)";
$sql="INSERT INTO `user`(`uid`, `uname`, `uemail`, `upasswd`) VALUES ('$uid1','$name','$email','$passwd')";

if ($conn->query($sql) === TRUE) {
    
/* Redirect browser */
    $SESSION['message']="registration is successful";
    //   header("Location: index.php");
 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
/*
$name=$_POST["username"];
$passwd=$_POST["password"];
$_SESSION["username"]=$name;
//select
$sql = "SELECT * FROM user";
$result = $conn->query($sql);
$totaluid=0;                      // to find total user present
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $totaluid=$totaluid+1;
  }
}

echo "Total uid ".$totaluid."<br>";


$sql = "SELECT uname FROM user where uname='$name'";
$result = $conn->query($sql);

$sql = "SELECT upasswd FROM user where upasswd='$passwd'";
$result2 = $conn->query($sql);

if ($result->num_rows !=0 && $result2->num_rows !=0) {
       echo " successfully logged in <br>";
}
else {
  echo "User does not exist <br> first sign up";
}
*/

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <title> RoadSide-Assistance finder login</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content=" RoadSide-Assistance Finder login and signup">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <!-- onlinefonts -->
    <link href="//fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet">
</head>

<body>
    <header>
        <h1 >RoadSide Assistance </h1>
    </header>
    <!-- //header -->
    <section class="login-wrap">
        <div class="main_w3agile">
            <input id="tab-2" type="radio" name="tab" class="sign-up">
            <label for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">
                <!-- signin form 
                <div class="signin_wthree">
                    <form method="post" action="index.php">
                        <div class="group">
                            <label for="user" class="label">Username</label>
                            <input name="username" id="user" type="text" class="input" required>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input name="password" id="pass" type="password" class="input" data-type="password" required>
                        </div>
                        <div class="group">
                            <input id="check" type="checkbox" class="check" checked>
                            <label for="check">
                                <span class="icon"></span> Keep me Signed in</label>
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Sign In">
                        </div>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <h2><a href="#">Forgot Password?</a></h2>
                        </div>
                    </form>
                </div> -->
                <!-- //signin form -->
                <!-- signup form -->
                <div class="signup_wthree">
                    <form method="post" action="signinup.php">
                        <div class="group">
                            <label for="user1" class="label">Username</label>
                            <input  name="username" id="user1" type="text" class="input" required>
                        </div>
                          <div class="group">
                            <label for="email" class="label">Email Address</label>
                            <input  name="email" id="email" type="email" class="input" required>
                        </div>
                        <div class="group">
                            <label for="password1" class="label">Password</label>
                            <input  name="password" id="password1" type="password" class="input" data-type="password" required>
                        </div>
                        <div class="group">
                            <label for="password2" class="label">Re-Enter Password</label>
                            <input id="password2" type="password" class="input" data-type="password" required>
                        </div>

                        <div class="group">
                            <input type="submit" class="button" value="Sign Up">
                        </div>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <label for="tab-1">Already Member? </label>
                        </div>
                    </form>
                </div>
                <!-- //signup form -->
            </div>
        </div>
    </section>
    <!-- //section -->
    <footer>
      <p> © 2018 RoadSide-Assistance Login & Signup form. All rights reserved </p>
    </footer>
    <!-- //footer -->
    <!-- script for password match -->
    <script>
        window.onload = function () {
            document.getElementById("password1").onchange = validatePassword;
            document.getElementById("password2").onchange = validatePassword;
        }

        function validatePassword() {
            var pass2 = document.getElementById("password2").value;
            var pass1 = document.getElementById("password1").value;
            if (pass1 != pass2)
                document.getElementById("password2").setCustomValidity("Passwords Don't Match");
            else
                document.getElementById("password2").setCustomValidity('');
            //empty string means no validation error
        }
    </script>
    <!-- script for password match -->
    
    
</body>
<!-- //Body -->

</html>
