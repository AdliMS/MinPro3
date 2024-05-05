<?php

session_start();

if (isset($_SESSION['username'])) {
    header('Location: index.php');
}
require 'dbconn.php';

if (isset ($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {

        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;
    }

    $error = true;
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body class="bg-dark">


    <div class="container">
        <div class="align-items-center d-flex  justify-content-center h-100">
            <div class="card login-form">
                <div class="card-body">
                    <h5 class="card-title text-center">Login</h5>
                    <form action="" method="POST">

                        <div class="mb-3">
                            <label for="username_input" class="form-label">Username</label>
                            <input type="username" class="form-control" id="username_input" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="password_input" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password_input" name="password">
                        </div>

                        <button type="submit" name="login" class="btn btn-primary w-100">Login</button>

                        <div class="sign-up mt-4">
                            Don't have an account? <a href="register.php">Create One</a>
                        </div>

                        <?php if (isset ($error)) : ?>
                            <p style="color: red;">Username / password salah!</p>    
                        <?php endif ?>

                    </form>
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
    
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>
</html>