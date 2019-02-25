<?php 

session_start();

if (isset($_POST['submit'])) {
	
	include_once 'dbh.inc.php';

	$state = mysqli_real_escape_string($conn, $_POST['state']);
	$city = mysqli_real_escape_string($conn, $_POST['city']);
	
	$username = $_SESSION["username"];

	if(empty($_SESSION)){
		$sql = "INSERT INTO location (username,state,city) VALUES ('$username', '$state', '$city');";
		mysqli_query($conn, $sql);
	}else{
		$sql = "UPDATE location SET state='$state', city='$city' WHERE username='$username';";
		mysqli_query($conn, $sql);
	}


	$_SESSION['city']=$city;
	$_SESSION['state']=$state;
	header("Location: profile.php");
	exit();
}
?>