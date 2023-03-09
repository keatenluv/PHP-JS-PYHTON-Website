<!DOCTYPE html>

<head>
<!--  Navigation  -->
<nav class="navbar navbar-expand-lg navbar-light bg-light nav">
  <div class="container-fluid">
    <a class="a" href="index.php">Home <?php //echo $_SESSION["userName"]; ?></a>
    <div class="justify-content-center" id="navbarNav">
        <a class="a" href="#you-should-hire-me.php">Why Me?</a>
      
    </div>
    <div class="justify-content-end">
        <a class="a" href="login.php">Logout</a>
    </div>
    
  </div>
</nav>
</head>



<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<link rel="stylesheet" type="text/css" href="../CSS/index.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    




<head>    
</head>

<body>
  <div class="container">
    <div>
      <div class="col">
          <h1 class="pt-5">Podcast Manager</h1>
      </div>
      <table>
      <tr>
        <th>Episode #</th>
        <th>Guest</th>
        <th>Title</th>
        <th>Duration</th>
        <th>Release Date</th>
        <th>Notes</th>
      </tr>  
      </table>
    </div>
  </div>  
</body>


</html>