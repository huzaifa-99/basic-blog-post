<?php
$conn =mysqli_connect("localhost","root","");
mysqli_select_db($conn,"test_users_blogDB");
if(!$conn){
	echo "Connection failed";
	exit();
}
?>