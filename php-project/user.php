
<script> alert("Welcome User ") </script>
<?php 
session_start();
if(!isset($_SESSION["uid"]))
{
	header("location:login.php");
}

include("dbconnect.php");

$qry = "SELECT * FROM `notice` order by id desc limit 5";
$result = mysqli_query($connect,$qry);
$row = mysqli_num_rows($result);




 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<title>Registration Form</title>
    <!-- Bootstrap 5 CDN for styling -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
    	.card-body{
    		padding-left: 0;
    	}
    	ul li{
    		line-height: 35px;
    		font-size: 22px;
    	}
    </style>
</head>
<body>
<h2>Welcome User</h2>
<div class="container">
	<div class="row">
		<div class="col-md-6 ">
			<div class="card">
				<div class="card-header bg-dark text-light">Notice</div>
				<marquee direction="up" onmouseover="this.stop();" onmouseout="this.start();">
				<div class="card-body">
					<ul>

					<?php	if($row>0)
						{
							while($data = mysqli_fetch_assoc($result))
							{ ?>
								<li> <?php echo $data["notice"] ?></li> 
							<?php }
						}
						else
						{ ?>
							<li>No Notice Found</li>
						<?php } ?>

						
					</ul>
				</div>
				</marquee>
				
			</div>
		</div>
	</div>
</div>
</body>
</html>