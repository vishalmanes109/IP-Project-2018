<?php
session_start();
 ?>

<html>
<body>

Welcome <?php echo $_POST["username"]; ?><br>
Your email address is: <?php echo $_POST["password"]."<br>"; ?>
<?php
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


/*$sql = "INSERT INTO user (uid,uname, uemail, upasswd)
VALUES (3, 'sumit', 'sumit@gmail.com','123456')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}*/
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


$conn->close();

?>
    <?php
/* Redirect browser */
header("Location: http://localhost/index.php");
 
/* Make sure that code below does not get executed when we redirect. */
exit;
?>

</body>
</html>
