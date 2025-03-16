<?php
include("dbconnect.php");
if(isset($_POST["resetbtn"]))
{
	$un = $_POST["username"];
	$mob = $_POST["mobile"];

	$qry = "SELECT * FROM `user` WHERE username = '$un' AND mobile = '$mob' ";
	$result = mysql_query($connect, $qry);
	$data = mysqli_fetch_assoc($result);
	$id = $data["id"];

	mysqli_num_row($result);

	if($row>0)
	{
		$pwd = randomPassword();
		$qry = "UPDATE `user` SET `password` = '$pwd' WHERE id = '$id'";
		$result = mysql_query($connect, $qry);
		?><script>alert("Password Reset Successfully");</script><?php
	}
	else
	{
		?><script>alert("Invalid Username or Password");</script><?php
	}

}

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890@#$_-';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reset Form</title>
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
<div class="form-container">
        <h2 class="text-center mb-4">Login</h2>
        <form method="POST">

            <div class="mb-3">
                <label for="email" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mobile</label>
                <input type="tel" name="mobile" class="form-control" required>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100" name="resetbtn">Reset</button>
            </div>
            <div onclick="resetbtn">
            	Password = <font color="green"> <?php echo $pwd ?> </font>,Copy New Password
            </div>
        </form>
    </div>
</body>
</html>