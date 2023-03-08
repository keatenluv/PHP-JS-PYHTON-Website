<?php 

session_start();

$username = $_POST["userName"];
$pass = $_POST["pass"];

$servername = "localhost:3300";
$usernamedb = "root";
$password = "Kjll1800^";
$dbname = "phpTest";

setcookie('Username', '', time() -3600);

// Create connection
$conn = new mysqli($servername, $usernamedb, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users WHERE Username='$username' AND Pass='$pass'";
$result = $conn->query($sql);

$row = mysqli_fetch_assoc($result);
setcookie("Username", $row["Username"]);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
      header('Location: http://localhost:3000/PHP/index.php');
      exit();
} else {
      header('Location: login.php');
      echo "<p>Incorrect email or password.</p>";
}

// if (mysqli_num_rows($result) == 1){
//     $_SESSION['userName'] = $username;
//     header('Location: index.php');
// } else {
//     
// }

?>