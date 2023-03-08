<?php
$servername = "localhost:3300";
$username = "root";
$password = "Kjll1800^";
$dbname = "phpTest";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, userName, password FROM users";
$result = $conn->query($sql);

function Redirect($url, $permanent = false)
{
  header('Location: ' . $url, true, $permanent ? 301 : 302);
  exit();
}

if ($result->num_rows > 0){
  while ($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"] . " - username: " . $row["userName"] . " " . $row["password"]. "<br>";
  }
} else {
  Redirect('login.php', false);
  echo "<script>alert('That Username does not exist!')</script>";
}


// $sql = "INSERT INTO Podcasts (episodeNumber, guest)
// VALUES (332, 'Doe1')";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

$conn->close();
?>