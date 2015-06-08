<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
include 'dbpass.php';
session_start();
$username = $_POST['name'];
$password = $_POST['pwd'];
//$mysqli=mysqli_connect('localhost','root','','ci_user');

$mysqli = new mysqli("oniddb.cws.oregonstate.edu","blackbe-db", $dbpassword, "blackbe-db");
if ($mysqli->connect_errno)
{
	echo "Connection error ".$mysqli->connect_errno ." ".$mysqli->connect_error;
}
else
{

	$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";

	//$query = $mysqli->prepare("SELECT * FROM user VALUES ('ss', ?, ?)");
	//$query->bind_param("ss", $username, $password);

	//$username = $_POST['name'];
	//$password = $_POST['pwd'];

	$result = mysqli_query($mysqli,$query)or die(mysqli_error());
	$num_row = mysqli_num_rows($result);
			$row=mysqli_fetch_array($result);
			if( $num_row >=1 ) {
				echo 'true';
				$_SESSION['user_name']=$row['username'];
			}
			else{
				echo 'false';
			}
}
?>