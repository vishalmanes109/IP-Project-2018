
<?php
session_start();
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700&amp;subset=latin-ext,vietnamese" rel="stylesheet">

<style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

    body{
         font-family: 'Raleway', sans-serif;
    }
.bg-image {
  /* The image used */
  background-image: url("image/wallpaper2.jpeg");

  /* Add the blur effect */
  filter: blur(4px);
  -webkit-filter: blur(4px);

  /* Full height */
  height: 100%;
  /* Center and scale the image nicely */
  background-position:center center;
  background-repeat:no-repeat;
  background-size: cover;

}
    a{
        text-decoration: none;

    }

/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(250,250,248, 0.4); /* Black w/opacity/see-through */
  color: purple;
  font-weight: bold;
  border: 1px solid black;
  position: absolute;
  top: 15%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 50%;
  padding: 20px;
  text-align: center;
}
.profile{
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(250,250,248, 0.4); /* Black w/opacity/see-through */
  color: purple;
  font-weight: bold;
  border: 1px solid black;
  position: absolute;
  top: 55%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 50%;
  padding: 20px;
  text-align: center;

}
</style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="RoadSideAssistance";

$conn = new mysqli($servername, $username, $password,$database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$uname1=$_SESSION['username'];
$sql = "SELECT uid FROM user where uname='$uname1'";
$result = $conn->query($sql);
$userid = $result->fetch_assoc();
echo "$userid[0]";
 ?>

<div class="bg-image"></div>

<div class="bg-text">

    <h1> <span style="color:red">W</span><span style="color:purple">e</span><span style="color:orange">l</span><span style="color:blue">c</span><span style="color:green">o</span><span style="color:indigo">m</span><span style="color:brown">e</span> </h1>
    <h4 style="color:#800060"> You Can Manage Your Account Here</h4>
        <p style="color:black;">
        </p>
</div>
<div class="profile">
  <h3 >
    Profile
  </h3>
  <img style="float:left;" src="image/profile1.png" width="20% height 20%">
  <p style="text-align:left;margin-left:25%;"> name:<?php echo "  ". $_SESSION['username'] ;?> </p>
</div>
</body>
</html>
