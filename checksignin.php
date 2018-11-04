
<?php

$_SESSION['message']="";
$_SESSION['logged_in']="0";

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

/*$sql = "SELECT * FROM user";
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
$sql="INSERT INTO `user`(`uid`, `uname`, `uemail`, `upasswd`) VALUES ('$uid1','$name','$email','$passwd')";
*/


$name=$_POST["username"];
$passwd=md5($_POST["password"]);
//select
/*
$sql = "SELECT * FROM user";
$result = $conn->query($sql);
$totaluid=0;                      // to find total user present
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $totaluid=$totaluid+1;
  }
}

echo "Total uid ".$totaluid."<br>";
*/

$sql = "SELECT uname FROM user where uname='$name'";
$result = $conn->query($sql);

$sql = "SELECT upasswd FROM user where upasswd='$passwd'";
$result2 = $conn->query($sql);

if ($result->num_rows !=0 && $result2->num_rows !=0) {
       session_start();
       echo " successfully logged in <br>";
    $_SESSION["username"]=$name;

    $_SESSION['loggedin'] = true;
      //Redirect browser
    $SESSION['message']="registration is successful";
       header("Location: index.php");
}
else if($result->num_rows!=0 && $result2->num_rows ==0){?>
   <div style="margin: 5% auto; text-align: center;">
    <h2> INCORRECT PASSWORD<h2>
    <h4> Create New Account if you dont remeber password  <h4>
      <a href='signup.php'>signup</a>
    </div>
      <?php
  }

  else {?>
         <div style="margin: 5% auto; text-align: center;">
          <h2> user Doesn't exist<h2>
          <h4> Create Your Acount <h4>
            <a href='signup.php'>signup</a>
          </div>
            <?php
}
echo$_SESSION['logged_in'];

?>
