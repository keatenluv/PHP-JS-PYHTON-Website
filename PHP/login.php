<?php
   ob_start();
   session_start();
?>

<!DOCTYPE html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
    <link rel="stylesheet" type="text/css" href="../CSS/login.css">
    <script>
        function showUsername(){
            alert("You can use mine\n\tUsername: keaton\n\tPassword: love");
        }
    </script>  
    <h1 id="header">The Lex Friedman Podcast Manager</h1>
</head>

<body>
    <div id="login-div" class="d-flex justify-content-center gap-3 login-div">
        <div class="d-flex flex-column align-tems-center">
                <?php 
                    if (isset($_GET['error'])) {
                        echo "<div id='alert' class='alert alert-danger' role='alert'>" . $_GET['error'] . "</div>" ;
                    }
                ?>
            <form action="getUserData.php" method="post">
                <div class="form-group login-form">
                <div class="form-group section">
                    <label for="exampleInputEmail1">User Name</label>
                    <input type="text" class="form-control" name="Username" aria-describedby="userName" placeholder="Enter User Name">
                </div>
                <div class="form-group section">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="pass" class="form-control" name="pass" placeholder="Password">
                </div>
                <div>
                    <button name="btn" type="submit" class="btn btn-dark buttons">Login</button>
                </div>
                <div>
                    <a class="noLogin" onclick="showUsername()">I don't have a login.</a>
                </div>
                </div>
            </form>
        </div>
    </div>
</body>


</html>