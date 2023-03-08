<?php 

session_start();

$username = $_POST["userName"];
$password = $_POST["password"];

$servername = "localhost:3300";
$usernamedb = "root";
$password = "Kjll1800^";
$dbname = "phpTest";

// Create connection
$conn = new mysqli($servername, $usernamedb, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users WHERE userName='$username' AND password='$password'";
$result = $conn->query($sql);

setCookie("userName", $username);

if (mysqli_num_rows($result) == 1){
    $_SESSION['userName'] = $username;
    header('Location: index.php');
} else {
    header('Location: login.php');
    echo "<p>Incorrect email or password.</p>";
}

?>