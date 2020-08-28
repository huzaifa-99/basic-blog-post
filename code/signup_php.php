<?php
require 'connection.php';
if(isset($_POST['email1']) && $_POST['email1']!==""){$email1=$_POST['email1'];}
if(isset($_POST['password1']) && $_POST['password1']!==""){$password1=$_POST['password1'];}
if(isset($_POST['username']) && $_POST['username']!==""){$username=$_POST['username'];}
$uploads_dir = './images';
$tmp_name = $_FILES["profilepic"]["tmp_name"];
$name = rand().$_FILES["profilepic"]["name"];
$x=move_uploaded_file($tmp_name, "$uploads_dir/$name");
if($x){
	$profilepic=$name;
}

	$sqlquery3 = "SELECT * FROM users WHERE Email='$email1'";
	$resultsqlquery3 = mysqli_query($conn,$sqlquery3);
	if(mysqli_num_rows($resultsqlquery3)==0){
	$sql00 ="INSERT INTO users (Username,Email,Password,UserType,Image_Name,Status) VALUES ('$username','$email1','$password1','General','$profilepic','Active')";
	$res00 = mysqli_query($conn,$sql00);
	if($res00){
		echo "You Have Been Signed Up Successfully";
	}
	else{
		echo "Could Not Insert Data";
	}
	}
	elseif(mysqli_num_rows($resultsqlquery3)>0){
		echo "This Email Is Already Registered";
	}
	else
	{
		echo "Error";
	}

?>