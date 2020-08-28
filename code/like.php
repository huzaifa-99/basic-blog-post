<?php
require 'connection.php';
if(isset($_POST['postid']) && $_POST['postid']!==""){$postid=$_POST['postid'];}
// function to update the posts table setting the no of total likes on each post for the current post start
function updatepostlike($idpost,$conn)
{
	$sql11 = "SELECT COUNT(Post_Id) count FROM posts_likes WHERE Post_Id='$idpost'";
	$resa = mysqli_query($conn,$sql11);
	$row1 = mysqli_fetch_assoc($resa);
	$count =$row1['count'];
	//echo $count;
	$sql = "UPDATE posts SET Post_Likes='$count' WHERE Post_Id='$idpost'";
    $res = mysqli_query($conn,$sql);
    if($res){echo $count;}
    elseif(!$res){ echo "could not insert like into the database";}
   	else echo "Unknown error";
}
// function to update the posts table setting the no of total likes on each post for the current post end
session_start();
// if the user clicked the like button start
if (isset($_POST['like']) && isset($_SESSION['id']) && $_SESSION['id']!=="") {
	$sqlqq= "SELECT * FROM posts_likes WHERE Post_Id='$postid' AND Liker_Id='{$_SESSION['id']}'";
	$resqq= mysqli_query($conn,$sqlqq);
	if(mysqli_num_rows($resqq)==0){
		$sql01 = "INSERT INTO posts_Likes (Post_Id,Liker_Id,Liker_Email) VALUES ('$postid','{$_SESSION['id']}','{$_SESSION['email']}')";
	    $res01 = mysqli_query($conn,$sql01);
	    if($res01){ updatepostlike($postid,$conn);echo'<style>.fa-heart1{color:red;}</style>';}
	    elseif(!$res01){ echo "could not insert like into the database";}
	   	else echo "Unknown error";
	}
	elseif(mysqli_num_rows($resqq)==1){
		$sql01 = "DELETE FROM posts_Likes WHERE Post_Id='$postid' AND Liker_Id='{$_SESSION['id']}' AND Liker_Email='{$_SESSION['email']}'";
	    $res01 = mysqli_query($conn,$sql01);
	    if($res01){ updatepostlike($postid,$conn);echo'<style>.fa-heart1{color:black;}</style>';}
	    elseif(!$res01){ echo "could not delete like from the database";}
	   	else echo "Unknown error";
	}
	elseif(mysqli_num_rows($resqq)>1){ echo "Unknown Error";}
	else{echo "Unknown Error";}
	    /*$sql = "UPDATE posts SET Post_Likes=Post_Likes+1 WHERE Post_Id='$postid'";
	    $res = mysqli_query($conn,$sql);
	    if($res){ header("location:index.php");}
	    elseif(!$res){ echo "could not insert like into the database";}
	   	else echo "Unknown error";*/
}
// if the user clicked the like button end

// if the user clicks on the delete post button__start
if (isset($_POST['deletereply'])) {
	$sqlqc = "DELETE FROM posts WHERE Post_Id='$postid'";
	$resqc = mysqli_query($conn,$sqlqc);
	if($resqc){echo "";} 
	elseif(!$resqc){echo "Could Not delete post from database";}
	else{ echo "Unknown error";}
}
// if the user clicks on the delete post button__end
?>