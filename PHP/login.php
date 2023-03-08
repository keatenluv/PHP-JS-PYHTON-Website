<?php
   ob_start();
   session_start();
?>

<!DOCTYPE html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
    <link rel="stylesheet" type="text/css" href="../CSS/login.css">
    <h1 id="header">The Lex Friedman Podcast Manager</h1>
</head>



<body>
    <div>
        <?php 
        

        ?>
    </div>
    <div id="login-div" class="d-flex justify-content-center gap-3 login-div">
        <div class="d-flex flex-column align-tems-center">
            <form action="getUserData.php" method="post">
                <div class="form-group login-form">
                <div class="form-group section">
                    <label for="exampleInputEmail1">User Name</label>
                    <input type="userName" class="form-control" name="userName" aria-describedby="userName" placeholder="Enter User Name">
                </div>
                <div class="form-group section">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="pass" class="form-control" name="pass" placeholder="Password">
                </div>
                <div>
                    <button name="btn" type="submit" class="btn btn-dark buttons">Login</button>
                </div>
                <div id="alert" class="alert alert-danger" role="alert"></div>
                <script>
                    var cookies = document.cookie.split(";").
                    map(function(el){ return el.split("="); }).
                    reduce(function(prev,cur){ prev[cur[0]] = cur[1]; return prev },{});
                    alert(cookies["Username"]);
                    // if (typeof(cookies["Username"]) != "undefined"){
                    //     alert("Helo");
                    //     const fail = document.getElementById("alert");
                    //     fail.innerHTML = "Username does not exist";
                    //     fail.style.display = "block";
                    // }   
                </script>
                </div>
            </form>
        </div>

</body>


</html>