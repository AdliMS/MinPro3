<?php

session_start();
require 'dbconn.php';


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
  <body>


    <div class="container">
        <div class="wrapper d-flex align-items-center justify-content-center h-100">
            <div class="card login-form">
                <div class="card-body">
                    <h5 class="card-title text-center">Login Form</h5>
                    <form action="" method="POST">

                        <div class="mb-3">
                            <label for="username_input" class="form-label">Username</label>
                            <input type="username" class="form-control" id="username_input">
                        </div>
                        <div class="mb-3">
                            <label for="password_input" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password_input">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Login</button>
                        <input type="checkbox" name="remember" id="remember">  <label class="ml-3" for="remember">Ingat Saya</label>

                        <div class="sign-up mt-4">
                            Don't have an account? <a href="register.php">Create One</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>
</html>