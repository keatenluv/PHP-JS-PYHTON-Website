<!DOCTYPE html>

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<link rel="stylesheet" type="text/css" href="../CSS/index.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">   
<script src="../js/headerElem.js" type="text/javascript" defer></script> 
<header-component></header-component>
</head>

<body>
  <div class="container">
    <div>
      <div class="col">
          <h1 class="pt-5">Podcast Manager</h1>
      </div>
      <?php 
        include_once 'db.php';
        $result = mysqli_query($conn, "SELECT * FROM Podcasts")  ;
      ?>
      <table id="sortMe" class="table table-striped sortTable">
      <tr>
        <th>Episode #</th>
        <th>Guest</th>
        <th>Title</th>
        <th>Release Date</th>
        <th>Length</th>
      </tr>  
      <?php 
        while($row = mysqli_fetch_array($result)) {
      ?>
      <tr>
        <td><?php echo $row['ID']; ?></td>
        <td><?php echo $row['Guest']; ?></td>
        <td><?php echo $row['Title']; ?></td>
        <td><?php echo $row['Releasedate']; ?></td>
        <td><?php echo $row['DurationMins']; ?></td>
      </tr>
      <?php
      }
      ?>

      </table>
      <?php

      ?>
    </div>
  </div>  
</body>

</html>