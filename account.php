<?php
session_start();

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
$name=$_POST["username1"];
$passwd=md5($_POST["password1"]);
$email=$_POST['email1'];
$_SESSION["username"]=$name;
//var_dump($_POST);
$possible=1;
$getemail = "SELECT uemail FROM user";
$resultemail = $conn->query($getemail);
if ($resultemail->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      if($row["uemail"]==$email)
      $possible=0;
  }
}
if($possible==1){
$sql="INSERT INTO `user`(`uid`, `uname`, `uemail`, `upasswd`) VALUES ('$uid1','$name','$email','$passwd')";

if ($conn->query($sql) === TRUE) {

/* Redirect browser */
    $SESSION['message']="registration is successful";
    //  header("Location: index.php");

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
else{
  ?>
<script type="text/javascript">

</script>
   getElementById('ispossible').innerHtml="Email id already exixt";
</script>

<?php } ?>
<?php
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
  background-image: url("image/computer-2048983_1920.jpg");

  /* Add the blur effect */
  filter: blur(4px);
  -webkit-filter: blur(4px);

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
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
  top: 50%;
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

<div class="bg-image"></div>

<div class="bg-text">

    <h1> <span style="color:red">W</span><span style="color:purple">e</span><span style="color:orange">l</span><span style="color:blue">c</span><span style="color:green">o</span><span style="color:indigo">m</span><span style="color:brown">e</span> <?php echo $_POST["username1"] ?></h1>
    <h4  id="ispossible" style="color:#800060"> Your Account is Succesfully Created</h4>
        <p style="color:black;">
        Now You can Sign in
        </p>
        <a href="signin.php">Sign In</a>
</div>

</body>
</html>
