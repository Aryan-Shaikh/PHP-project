<?php

include("dbconnect.php");

if (isset($_POST["changepwdbtn"])) {
    $id = $_SESSION["uid"];
    $un = $_POST["username"];
    $cp = $_POST["cpassword"];
    $np = md5($_POST["npassword"]);

    $qry = "SELECT * FROM `user` WHERE username = '$un' AND password = '$cp'";
    $result = mysqli_query($connect, $qry);
    $data = mysqli_fetch_assoc($result);
    $id = $data["id"];
    $row = mysqli_num_rows($result);
    if($row>0)
    {
        $qry = "UPDATE `user` SET `password` = '$np' WHERE id = '$id'";
        $result = mysqli_query($connect, $qry);
        if($result)
        {
            ?><script> alert("Password changed");</script><?php
        }
        else
        {
            ?><script>alert("Error try again");</script><?php
        }
    } 
    else
    {
        ?><script>alert("Invalid Username or Password");</script><?php
    }
}
    
?>



    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <style>
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
        <div class="card">
        <div class="form-container">
        <h2 class="card-head text-center mb-4">Change Password</h2>
        <form method="POST">
            
            <div class="mb-3">
                <label class="form-label">username</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Current Password</label>
                <input type="password" name="cpassword" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">New Password</label>
                <input type="password" name="npassword" class="form-control" required>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100" name="changepwdbtn">Submit</button>

        </form>
    </div>
    </div>
    </body>
    </html>