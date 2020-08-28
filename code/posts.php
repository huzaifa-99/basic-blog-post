<!DOCTYPE html>
<html>
<head>
    <?php
    require 'connection.php';
    session_start();
    ?>
	<title>Posts</title>
	<!--Css BootstrapCdn Start-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--Css BootstrapCdn end-->

    <!--CkEditorCdn start-->
    <script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
    <!--CkEditorCdn end-->

    <!--Fontawesome fonts link start-->
    <link href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" rel="stylesheet">
    <!--Fontawesome fonts link end-->
    <!--Fontawesome fonts for firefox link start-->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!--Fontawesome fonts for firefox link end-->
    <!--Ajax GoogleCdn Start-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--Ajax GoogleCdn end-->
    <script type="text/javascript">
        // function for liking the post with ajax
        function likepost(idofpost) {
            var postid = idofpost;
            var like = document.getElementById('like').value;
            $.ajax({
                type:"post",
                url:"like.php",
                data:{postid: postid,like: like},
                cache:false,
                success:function(html){
                    $('#updatelikes'+idofpost).html(html);
                }
            });
            return false;
        }
        // function for deleting the post using ajax
        function deletepost(idofpost) {
            var postid = idofpost;
            var deletereply = document.getElementById('deletereply').value;
            if(confirm('Are You Sure You Want To Delete Post')){
                $.ajax({
                type:"post",
                url:"like.php",
                data:{postid: postid,deletereply: deletereply},
                cache:false,
                success:function(html){
                    $('#div'+idofpost).hide('slow');
                }
            });
            }
            return false;
        }
        // function for liking the comment with ajax 
        function likecommentt(idofpost,idofcomment) {
            var postid = idofpost;
            var commentid = idofcomment;
            var likecomment = document.getElementById('likecomment').value;
            $.ajax({
                type:"post",
                url:"comment.php",
                data:{postid: postid,commentid: commentid,likecomment: likecomment},
                cache:false,
                success:function(htmlz){
                    $('#updatecommentlikes'+idofcomment).html(htmlz);
                }
            });
            return false;
        }
        
        // function for liking the reply with ajax
        function likereplyy(idofpost,idofcomment,idofreply) {
            var postid = idofpost;
            var commentid = idofcomment;
            var replyid = idofreply;
            var likereply = document.getElementById('likereply').value;
            $.ajax({
                type:"post",
                url:"reply.php",
                data:{postid: postid,commentid: commentid,replyid: replyid,likereply: likereply},
                cache:false,
                success:function(html1){
                    $('#updatereplylikes'+idofreply).html(html1);
                }
            });
            return false;
        }
        // function for deleting the comment using ajax
        function deletecommentt(idofpost,idofcomment) {
            var postid = idofpost;
            var commentid = idofcomment;
            var deletecomment = document.getElementById('deletecomment').value;
            if(confirm('Are You Sure You Want To Delete Comment')){
                $.ajax({
                type:"post",
                url:"comment.php",
                data:{postid: postid,commentid: commentid,deletecomment: deletecomment},
                cache:false,
                success:function(html){
                    $('#updatecomment'+idofcomment).hide('slow');
                }  
            });
            }
            return false;
        }
        // function for deleting the reply using ajax
        function deletereplyy(idofpost,idofcomment,idofreply) {
            var postid = idofpost;
            var commentid = idofcomment;
            var replyid = idofreply;
            var deletereplyreply = document.getElementById('deletereplyreply').value;
            if(confirm('Are You Sure You Want To Delete reply')){
                $.ajax({
                type:"post",
                url:"reply.php",
                data:{postid: postid,commentid: commentid,replyid: replyid,deletereplyreply: deletereplyreply},
                cache:false,
                success:function(html){
                    console.log(html);
                    $('.updatereply'+idofreply).hide('slow');
                }  
            });
            }
            return false;
        }
        function addcommentt(idofpost){
            event.preventDefault();
            var postid = idofpost;
            var cdata = document.getElementById('cdata'+idofpost).value;
            var comment = document.getElementById('comment').value;
            $.ajax({
                type:"post",
                url:"comment.php",
                data:{postid: postid,cdata: cdata,comment: comment},
                cache: false,
                success:function(){
                    console.log('success');
                    // reload the page
                    document.location.reload(true);
                }
            });
        }


        function addreplyy(idofpost,idofcomment){
            event.preventDefault();
            var postid = idofpost;
            var commentid = idofcomment;
            var rdata = document.getElementById('rdata'+idofcomment).value;
            var replycomment = document.getElementById('replycomment').value;
            $.ajax({
                type:"post",
                url:"reply.php",
                data:{postid: postid,commentid: commentid,rdata: rdata,replycomment: replycomment},
                cache: false,
                success:function(){
                    console.log('success');
                    // reload the page
                    document.location.reload(true);
                }
            });
        }
        function loginuser() {
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var loginsubmit = document.getElementById('loginsubmit').value;
            $.ajax({
                type:"post",
                url:"login_php.php",
                data:{email: email,password: password,loginsubmit: loginsubmit},
                cache:false,
                success:function(){
                    window.location.reload(false);
                }
            });
            return false;
        }
    </script>
</head>
<body style="background-color: #f7f5f5;">
    <div style="height:70px;"></div><!--dummy div for nav fixed-->
    <!--Nav Module Bootstrap Start-->
    <?php
    include 'navbar.php';
    ?>
    <!--Nav Module Bootstrap End-->

    <style>
            .postshow{
                margin:auto;
                border:1px solid #000;
                width:90%;
                background-color:#FFFFFF;
                padding:20px;
            }
            a{
                color:inherit;
                text-decoration:inherit;
            }
            a:hover{ 
                color:inherit;
                text-decoration:inherit;
            }
            .useruser
            {
                left: 72px;
                font-size: 18px;
                margin-top: -120px;
                font-weight: bold;
                margin-top: -101px;
                width: 80%;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                z-index: 10;
                color:#8c8c8c;
            }
            </style>
    <!--Div Left Side Start-->
    <div style="float: left;width: 70%;border-right: 1px solid #000;position: static;">
        <?php
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            if(isset($_SESSION['id'])){
            $sql101 = "SELECT * FROM posts_likes WHERE Post_Id='$id' AND Liker_Id='{$_SESSION['id']}'";
                $res101 = mysqli_query($conn, $sql101);
                if(mysqli_num_rows($res101)==1){
                    echo'<style>.fa-heart1{color:red;}</style>';
                }
            }
            $sql1 = "SELECT * FROM posts WHERE Post_Id='$id'";
                $res1 = mysqli_query($conn, $sql1);
                if($res1){
                    $row=mysqli_fetch_assoc($res1);
                    echo "<div class='postshow' id='div".$row['Post_Id']."'>";
                    echo "<img src='x.jpg' style='height:250px;width:105%;margin:-20px -20px 20px -20px;'>";
                    echo "<h1 style='padding-top:50px;'>".$row["P_Title"]."</h1>";
                    echo "<img src='x.jpg' style='border-radius:50%;height:30px;width:30px;margin-right:20px;'>";
                    echo "<span class='useruser'>".$row["Author_Name"]."</span>";


                    echo '<table><tr><td><form>
                            <input type="hidden" name="postid" value="'.$row['Post_Id'].'">
                            <button  style="background:none;border: none;text-decoration: none;display: inline-block;" name="like" id="like" value="like"';
                            if(isset($_SESSION['id'])){echo 'type="submit" onclick="return likepost('.$row['Post_Id'].')"';}
                            else{echo 'type="button" data-toggle="modal" data-target="#myModal"';}
                            //elseif(!isset($_SESSION['id']) && $_SESSION['id']==""){echo 'type="button" data-toggle="modal" data-target="#myModal"';}
                            echo '><i class="far fa-heart fa-heart1" id="liker"></i></button>
                          </form></td><td id="updatelikes'.$row['Post_Id'].'">';//
                    echo $row['Post_Likes'];
                    echo '</td><td><i class="far fa-comment"></i> '.$row['T_Comments'].'</td>';
                    if(isset($_SESSION['id']) && $_SESSION['id']===$row["Author_Id"]){
                           echo '<td>
                            <form>
                             <input type="hidden" name="postid" value="'.$row['Post_Id'].'">
                             <button type="submit" style="background:none;border: none;text-decoration: none;display: inline-block;" name="deletereply" id="deletereply" value="delete post"';
                             if(isset($_SESSION['id'])){echo 'type="submit" onclick="return deletepost('.$row['Post_Id'].')"';}
                             else{echo 'type="button" data-toggle="modal" data-target="#myModal"';}
                             echo '><i class="far fa-trash-alt"></i></button>
                          </form></td>';}
                    echo '</tr></table>';
                    echo "<br>";
                    echo $row["Description"];
                    echo "<div style='margin-top:10px;'></div>";

                    echo '<form>
                    <div class="form-group">
                                <input type="hidden" name="postid" value="'.$row['Post_Id'].'">
                                <textarea name="cdata" class="form-control" id="cdata'.$row['Post_Id'].'"></textarea>
                                <input type="submit" class="btn btn-primary form-control" name="comment" id="comment" value="Addcomment" onclick="return addcommentt('.$row['Post_Id'].')">
                                </div>
                            </form>';


                          $sql0 = "SELECT * FROM comments WHERE Post_Id='{$row['Post_Id']}'";
                          $res0 = mysqli_query($conn,$sql0);
                          if($res0){ while ($roww = mysqli_fetch_assoc($res0)) {
                              echo "<br>";
                              if(isset($_SESSION['id'])){
                              $sql102 = "SELECT * FROM comments_likes WHERE Post_Id='$id' AND Liker_Id='{$_SESSION['id']}'
                                            AND Comment_Id='{$roww['Comment_Id']}'";
                                            $res102 = mysqli_query($conn, $sql102);
                                            if(mysqli_num_rows($res102)==1){
                                                $co =1;
                                                if($co=1){
                                                echo'<style>.fa-thumbs-up1{color:blue;}</style>';}
                                                $co++;
                                            }
                                }
                              echo '<table  id="updatecomment'.$roww['Comment_Id'].'">
                              <tr><td><img src="x.jpg" style="border-radius:50%;height:30px;width:30px;margin-right:20px;"> '.$roww["Commenter_Name"].'<td></tr>
                               <tr><td>&emsp;&emsp;&emsp;&ensp;'.$roww["Comment"].'<td></tr>
                               <tr><td>&emsp;&emsp;&emsp;<form style="display:inline;">
                                            <input type="hidden" name="commentid" value="'.$roww['Comment_Id'].'">
                                            <input type="hidden" name="postid" value="'.$row['Post_Id'].'">

                                            <button style="background:none;border: none;text-decoration: none;display: inline-block;" name="likecomment" id="likecomment" value="like comment"';
                                            if(isset($_SESSION['id'])){echo 'type="submit" onclick="return likecommentt('.$row['Post_Id'].','.$roww['Comment_Id'].')"';}
                                            else{echo 'type="button" data-toggle="modal" data-target="#myModal"';}
                                            echo '><i class="far fa-thumbs-up fa-thumbs-up1" id="thumbs-up1"></i></button><span id="updatecommentlikes'.$roww['Comment_Id'].'">'.$roww["C_Likes"].'</span>
                                       </form>
                                    '; 
                                    
                                    if(isset($_SESSION['id']) && $roww["Commenter_Id"]==$_SESSION['id'])
                                    {
                                    echo'
                                    <form style="display:inline;">
                                            <input type="hidden" name="commentid" value="'.$roww['Comment_Id'].'">
                                            <input type="hidden" name="postid" value="'.$row['Post_Id'].'">
                                            <button type="submit" style="background:none;border: none;text-decoration: none;display: inline-block;" name="deletecomment" id="deletecomment" value="delete comment" onclick="return deletecommentt('.$row['Post_Id'].','.$roww['Comment_Id'].')"><i class="far fa-trash-alt"></i></button>
                                       </form>';}

                                echo '
                                <td>



                                <form style="display:inline-block;">
                                            <input type="hidden" name="commentid" value="'.$roww['Comment_Id'].'">
                                            <input type="hidden" name="postid" value="'.$row['Post_Id'].'">
                                            <textarea class="" name="rdata" id="rdata'.$roww['Comment_Id'].'" rows="1"></textarea>
                                            <input type="submit" class="btn btn-primary btn-sm" style="vertical-align: top;" name="replycomment" id="replycomment" value="Reply" onclick="return addreplyy('.$row['Post_Id'].','.$roww['Comment_Id'].')">
                                       </form>


                                    </td>
                                </tr>';
                                $sqlq1 = "SELECT * FROM replys WHERE Post_Id='{$row['Post_Id']}' AND Comment_Id='{$roww['Comment_Id']}'";
                                $res01 = mysqli_query($conn,$sqlq1);
                                if($res01){ while ($roww1 = mysqli_fetch_assoc($res01)) {
                                    if(isset($_SESSION['id'])){
                                    $sql103 = "SELECT * FROM replys_likes WHERE Post_Id='$id' AND Liker_Id='{$_SESSION['id']}' AND Comment_Id='{$roww['Comment_Id']}' AND Reply_Id='{$roww1['Reply_Id']}'";
                                    $res103 = mysqli_query($conn, $sql103);
                                    if(mysqli_num_rows($res103)==1){
                                        echo'<style>.fa-thumbs-up2{color:blue;}</style>';
                                    }}
                                echo '
                                <tr class="updatereply'.$roww1['Reply_Id'].'"><td></td><td><img src="x.jpg" style="border-radius:50%;height:30px;width:30px;margin-right:20px;"> '.$roww1["Repliers_Email"].'<td></tr>
                                <tr class="updatereply'.$roww1['Reply_Id'].'"><td></td><td>&emsp;&emsp;&emsp;&ensp; '.$roww1["Reply"].'<td></tr>
                                <tr class="updatereply'.$roww1['Reply_Id'].'"><td></td><td>&emsp;&emsp;&emsp;&ensp;<form style="display:inline;">
                                            <input type="hidden" name="commentid" value="'.$roww['Comment_Id'].'">
                                            <input type="hidden" name="replyid" value="'.$roww1['Reply_Id'].'">
                                            <input type="hidden" name="postid" value="'.$row['Post_Id'].'">



                                            <button style="background:none;border: none;text-decoration: none;display: inline-block;" name="likereply" id="likereply" value="like reply" ';
                                            if(isset($_SESSION['id'])){echo 'type="submit" onclick="return likereplyy('.$row['Post_Id'].','.$roww['Comment_Id'].','.$roww1['Reply_Id'].')"';}
                                            else{echo 'type="button" data-toggle="modal" data-target="#myModal"';}
                                            echo'><i class="far fa-thumbs-up fa-thumbs-up2"></i></button>
                                       </form><span id="updatereplylikes'.$roww1['Reply_Id'].'">'.$roww1["R_Likes"].'</span>
                                ';
                                if(isset($_SESSION['id']) && $roww1["Repliers_Id"]==$_SESSION['id']){
                                   echo'
                                        <form style="display:inline;">
                                            <input type="hidden" name="commentid" value="'.$roww['Comment_Id'].'">
                                            <input type="hidden" name="replyid" value="'.$roww1['Reply_Id'].'">
                                            <input type="hidden" name="postid" value="'.$row['Post_Id'].'">
                                            <button type="submit" style="background:none;border: none;text-decoration: none;display: inline-block;" name="deletereplyreply" id="deletereplyreply" value="delete reply" onclick="return deletereplyy('.$row['Post_Id'].','.$roww['Comment_Id'].','.$roww1['Reply_Id'].')"><i class="far fa-trash-alt"></i></button>
                                       </form>'; 
                                }
                                echo "</td></tr>";
                                }}
                                echo '</table>';
                              echo "<br>";
                          }}
                          elseif(!$res0){ echo "Cannot show comments on this post";}
                          else echo "unknown error"; 
                          echo'</div>';
                          echo '<div style="margin-top:100px;"></div>';
                }
                elseif(!$res1){echo "No Post Found";}
                else echo "unknown error";

        }
        elseif(!isset($_GET['id'])){
           echo "Something Went Wrong";
        }
    ?>
    </div>
    <!--Div Left Side End-->
    <!--Div Right Side Start-->
    <div style="float: left;width: 30%;position: static;">
        <div style="position:fixed;padding: 20px;width:inherit;">
            <div class="text-center" style="
                font-size: 35px;
                font-weight: bold;
                margin-top:50px;
                margin-bottom:10px;
                overflow: hidden;
                color:#8c8c8c;"><?php if(!isset($_SESSION['id'])){echo 'Join Us';}else {echo 'Logout Here';}?></div>
            <?php if(!isset($_SESSION['id'])){
                    echo'
                    <!--Modal Login trigger button start-->
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal">
                      Login
                    </button>
                    <!--Modal Login trigger button end-->
                    <br>
                    <a href="signup.php">
                    <button type="button" class="btn btn-primary btn-block">Signup</button>
                    </a>';
                }
                else{
                    echo '<a href="logout.php">
                    <button type="button" class="btn btn-primary btn-block">Logout</button>
                    </a>';
                }
                ?>
        </div>
    </div>
    <!--Div Right Side End-->

	<!--JS, Popper.js, and jQuery ____start____-->
    <!--ye googleajax k sath masla kr rha hai<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!--JS, Popper.js, and jQuery ____end____-->
</body>
</html>