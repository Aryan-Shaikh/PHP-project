<?php

session_start();
if(isset($_SESSION['uid']))
{
    header("location:user.php");
}
 

if(isset($_POST["loginButton"]))
{
include("dbconnect.php");

$us = $_POST["username"];
$pwd = $_POST["password"];

if($us=="admin" && $pwd=="admin")
{
    header("location:admin.php"); 
}
   
else
{
$qry = "SELECT * FROM `register` WHERE username = '$us' AND password = '$pwd'";

$result = mysqli_query($connect, $qry);

$row = mysqli_num_rows($result);
if($row>0)
{
 $data = mysqli_fetch_assoc($result);
 $_SESSION["uid"] = $data["id"];
 header("location:user.php");
}
else
{
    ?><script> alert("Invalid Username or Password ") </script> <?php
}
}

} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap 5 CDN for styling -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        body {
            background-color: #f4f4f9;
        }
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            margin: auto;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2 class="text-center mb-4">Login</h2>
        <form method="POST">

            <div class="mb-3">
                <label for="email" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100" name="loginButton">Login</button>
            </div>

            <div class="text-center mt-3">
            <p>Don't have an account? <a href="register.php">Register</a></p>
        </div>

        </form>
    </div>

   <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>