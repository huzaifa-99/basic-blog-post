<?php
require 'connection.php';
session_start();

// function for the replys table updating the no of total likes on each reply for the current post__start
function updatereplylike($idreply,$conn)
	{
		$sql11 = "SELECT COUNT(Reply_Id) count FROM replys_likes WHERE Reply_Id='$idreply'";
		$resa = mysqli_query($conn,$sql11);
		$row1 = mysqli_fetch_assoc($resa);
		$count =$row1['count'];
		//echo $count;
		$sql = "UPDATE replys SET R_Likes='$count' WHERE Reply_Id='$idreply'";
	    $res = mysqli_query($conn,$sql);
	    if($res){echo $count;}
	    elseif(!$res){ echo "could not insert like into the database";}
	   	else echo "Unknown error";
	}
// function for the replys table updating the no of total likes on each reply for the current post__end

// function for the comments table updating the no of total replys on each comment for the current post__start
function updatecommentreplycount($idcomment,$conn)
	{
		$sql11 = "SELECT COUNT(Comment_Id) count FROM replys WHERE Comment_Id='$idcomment'";
		$resa = mysqli_query($conn,$sql11);
		$row1 = mysqli_fetch_assoc($resa);
		$count =$row1['count'];
		//echo $count;
		$sql = "UPDATE comments SET C_Replys='$count' WHERE Comment_Id='$idcomment'";
	    $res = mysqli_query($conn,$sql);
	    if($res){}
	    elseif(!$res){ echo "could not insert replys count into the database";}
	   	else echo "Unknown error";
	}
// function for the comments table updating the no of total replys on each comment for the current post__end

// if the user fills the reply box and clicks on replycomment button__start
if(isset($_POST['postid']) && $_POST['postid']!==""){$postid=$_POST['postid'];}
if(isset($_POST['commentid']) && $_POST['commentid']!==""){$commentid=$_POST['commentid'];}
if(isset($_POST['rdata']) && $_POST['rdata']!==""){$rdata=$_POST['rdata'];}
if (isset($_POST['replycomment'])) {
	    $sql = "INSERT INTO replys (Post_Id,Comment_Id,Repliers_Id,Repliers_Email,Reply) VALUES ('$postid','$commentid','{$_SESSION['id']}','{$_SESSION['email']}','$rdata')";
	    $res = mysqli_query($conn,$sql);
	    if($res){ updatecommentreplycount($commentid,$conn);}
	    elseif(!$res){ echo "could not insert reply into the database";}
	   	else echo "Unknown error";
}
// if the user fills the reply box and clicks on replycomment button__end

// if the user clicks on the like reply button__start
if(isset($_POST['replyid']) && $_POST['replyid']!==""){$replyid=$_POST['replyid'];}
if (isset($_POST['likereply'])) {
	$sqlqa = "SELECT * FROM replys_likes WHERE Reply_Id='$replyid' AND Liker_Id='{$_SESSION['id']}'";
	$resa = mysqli_query($conn,$sqlqa);
	// add a like if the user hasnot liked yet
	if(mysqli_num_rows($resa)==0){
		$sql01 = "INSERT INTO replys_likes (Post_Id,Comment_Id,Reply_Id,Liker_Id,Liker_Email) VALUES ('$postid','$commentid','$replyid','{$_SESSION['id']}','{$_SESSION['email']}')";
	    $res01 = mysqli_query($conn,$sql01);
	    if($res01){updatereplylike($replyid,$conn);echo'<style>.fa-thumbs-up2{color:blue;}</style>';}
	    elseif(!$res01){ echo "could not insert like into the database";}
	   	else echo "Unknown error";
	}
	// delete the like if the user has added it already
	elseif(mysqli_num_rows($resa)==1){
		$sqlab = "DELETE FROM replys_likes WHERE Reply_Id='$replyid' AND Liker_Id='{$_SESSION['id']}' AND Liker_Email='{$_SESSION['email']}'";
		$resqb = mysqli_query($conn,$sqlab);
		if($resqb){updatereplylike($replyid,$conn);echo'<style>.fa-thumbs-up2{color:black;}</style>';}
		elseif(!$resqb){echo "could not delete like from the database";}
		else{echo "Unknown error";}
	}
	// error handling
	elseif(mysqli_num_rows($resa)>1){echo "Unknown error";}
	else{echo "Unknown error";}
}
// if the user clicks on the like reply button__end

// if the user clicks on the delete reply button__start
if(isset($_POST['replyid']) && $_POST['replyid']!==""){$replyid=$_POST['replyid'];}
if (isset($_POST['deletereplyreply'])) {
	$sqlqc = "DELETE FROM replys WHERE Reply_Id='$replyid' AND Comment_Id='$commentid' AND Post_Id='$postid'";
	$resqc = mysqli_query($conn,$sqlqc);
	if($resqc){updatecommentreplycount($commentid,$conn);} 
	elseif(!$resqc){echo "Could Not delete reply from database";}
	else{ echo "Unknown error";}
}
// if the user clicks on the delete reply button__end

?>