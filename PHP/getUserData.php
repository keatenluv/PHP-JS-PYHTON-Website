<?php 
session_start();

if (isset($_POST["Username"]) && isset($_POST["pass"])) {
  $username = $_POST["Username"];
  $pass = $_POST["pass"];
    
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

  $sql = "SELECT * FROM users WHERE Username='$username' AND Pass='$pass'";
  try {
  $result = $conn->query($sql);
  $row= mysqli_fetch_assoc($result);
} catch(Exception $e) { header("Location: login.php");}

  if (empty($username)) {
    header("Location: login.php?error=Username required");
    exit();
  } else if(empty($pass)){
    header("Location: login.php?error=Password required");
    exit();
  } else {
    echo "Valid Input";
  }

  // User with login info is found
  if (!is_null($row)){
    header('Location: index.php');
  }
  // User is not found
  else {
    header('Location: login.php?error= User Not Found');
  }

} else {

}
?>