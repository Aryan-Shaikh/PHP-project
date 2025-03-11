<?php
if(isset($_POST['noticebtn']))
{
include("dbconnect.php");
$notice = $_POST['notice'];

$qry = "INSERT INTO `notice`(`notice`) VALUES ('$notice')";

$result = mysqli_query($connect,$qry);

if($result)
{
	echo "notice added successfully";
}
else
{
	echo "Failed to add notice";
}






}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>
	<title>Registration Form</title>
    <!-- Bootstrap 5 CDN for styling -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
<h2 class="text-center mb-5">Welcome to Admin Page</h2>
<div class="container">
	<div class="row">
		<div class="col-md-6 mx-auto">
			<form method="post">
				<div class="form-group">
					<label>Add Notice</label>
					<textarea class="form-control" name="notice" placeholder="Enter notice here..">
						
					</textarea>
				</div>
				<div class="form-group">
					<button class="btn btn-success" name="noticebtn">Add</button>					
				</div>
			</form>
			
		</div>
	</div>
	
</div>
</body>
</html>