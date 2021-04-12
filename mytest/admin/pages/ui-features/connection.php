<?php 

$servername = "localhost";
$username = "phpmyadmin";
$password = "root";
$dbname = "mytest";



$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(!$conn)
{
	echo"not connected" . mysqli_error($conn);
}

?>