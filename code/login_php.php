<?php
require 'connection.php';
if(isset($_POST['email']) && $_POST['email']!==""){$email=$_POST['email'];}
if(isset($_POST['password']) && $_POST['password']!==""){$password=$_POST['password'];}
if(isset($_POST['loginsubmit'])){
	$sqlquery3 = "SELECT * FROM users WHERE Email='$email' AND Password='$password'";
	$resultsqlquery3 = mysqli_query($conn,$sqlquery3);
	if(mysqli_num_rows($resultsqlquery3)>0){
	$row=mysqli_fetch_assoc($resultsqlquery3);
	// here we will create user session
		session_start();
		$_SESSION['email']=$row['Email'];
		$_SESSION['id']=$row['Id'];
	// till here
	}
	elseif(mysqli_num_rows($resultsqlquery3)==0){
		header("location:index.php?message= Wrong Email Or Password");
	}
	else
	{
		echo 'error';
	}
}
?>