<!DOCTYPE html>

<?php 

if(!isset($_SESSION['userName'])){
    header('Location: login.php');
    exit();
}
?>



<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<link rel="stylesheet" type="text/css" href="../CSS/index.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    

<!--  Navigation  -->
<nav class="navbar navbar-expand-lg navbar-light bg-light nav">
  <div class="container-fluid">
    <a class="a" href="#you-should-hire-me.php">Welcome <?php echo $_SESSION["userName"]; ?></a>
    <div class="justify-content-center" id="navbarNav">
        <a class="a" href="#you-should-hire-me.php">Why Me?</a>
      
    </div>
    <div class="justify-content-end">
        <a class="a" href="login.php">Logout</a>
    </div>
  </div>
</nav>


<head>    
</head>

<body>
    <button type="button" onclick="alert('welcome')" name="help">Help</button>
    <form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
</body>


</html>