	<?php

// Connect to the database using mysqli
$connect = mysqli_connect("localhost", "root", "", "project1");

// Check the connection
if (!$connect) {
    echo "Connection failed: "; 
}

?>
