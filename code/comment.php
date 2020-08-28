<?php
require 'connection.php';
session_start();
// function for the comments table updating the no of total likes on each comment for the current post__start
function updatecommentlike($idcomment,$conn)
	{
		$sql11 = "SELECT COUNT(Comment_Id) count FROM comments_likes WHERE Comment_Id='$idcomment'";
		$resa = mysqli_query($conn,$sql11);
		$row1 = mysqli_fetch_assoc($resa);
		$count =$row1['count'];
		//echo $count;
		$sql = "UPDATE comments SET C_Likes='$count' WHERE Comment_Id='$idcomment'";
	    $res = mysqli_query($conn,$sql);
	    if($res){echo $count;}
	    elseif(!$res){ echo "could not insert like count into the database";}
	   	else echo "Unknown error";
	}
// function for the comments table updating the no of total likes on each comment for the current post__end

// if the user fills the comment box and clicks on addcomment button__start
if(isset($_POST['postid']) && $_POST['postid']!==""){$postid=$_POST['postid'];}
if(isset($_POST['cdata']) && $_POST['cdata']!==""){$cdata=$_POST['cdata'];}
if (isset($_POST['comment'])) {
	    $sql = "INSERT INTO comments (Post_Id,Commenter_Id,Commenter_Name,Comment) VALUES ('$postid','{$_SESSION['id']}','{$_SESSION['email']}','$cdata')";
	    $res = mysqli_query($conn,$sql);
	    if($res){}
	    elseif(!$res){ echo "could not insert comment into the database";}
	   	else echo "Unknown error";
}
// if the user fills the comment box and clicks on addcomment button__end

// if the user clicks on the like comment button__start
if(isset($_POST['commentid']) && $_POST['commentid']!==""){$commentid=$_POST['commentid'];}
if (isset($_POST['likecomment'])) {
	$sqlqa = "SELECT * FROM comments_likes WHERE Comment_Id='$commentid' AND Liker_Id='{$_SESSION['id']}'";
	$resa = mysqli_query($conn,$sqlqa);
	// add a like if the user hasnot liked yet
	if(mysqli_num_rows($resa)==0){
		$sql01 = "INSERT INTO comments_likes (Post_Id,Comment_Id,Liker_Id,Liker_Email) VALUES ('$postid','$commentid','{$_SESSION['id']}','{$_SESSION['email']}')";
	    $res01 = mysqli_query($conn,$sql01);
	    if($res01){updatecommentlike($commentid,$conn);echo'<style>#thumbs-up1'.$commentid.'{color:blue;}</style>';}
	    elseif(!$res01){ echo "could not insert like into the database";}
	   	else echo "Unknown error";
	}
	// delete the like if the user has added it already
	elseif(mysqli_num_rows($resa)==1){
		$sqlab = "DELETE FROM comments_likes WHERE Comment_Id='$commentid' AND Liker_Id='{$_SESSION['id']}' AND Liker_Email='{$_SESSION['email']}'";
		$resqb = mysqli_query($conn,$sqlab);
		if($resqb){updatecommentlike($commentid,$conn);echo'<style>#thumbs-up1'.$commentid.'{color:black;}</style>';}
		elseif(!$resqb){echo "could not delete like from the database";}
		else{echo "Unknown error";}
	}
	// error handling
	elseif(mysqli_num_rows($resa)>1){echo "Unknown error";}
	else{echo "Unknown error";}
}
// if the user clicks on the like comment button__end

// if the user clicks on the delete comment button__start
if(isset($_POST['commentid']) && $_POST['commentid']!==""){$commentid=$_POST['commentid'];}
if (isset($_POST['deletecomment'])) {
	$sqlqc = "DELETE FROM comments WHERE Comment_Id='$commentid' AND Post_Id='$postid'";
	$resqc = mysqli_query($conn,$sqlqc);
	if($resqc){} 
	elseif(!$resqc){echo "Could Not delete comment from database";}
	else{ echo "Unknown error";}
}
// if the user clicks on the delete comment button__end

?>