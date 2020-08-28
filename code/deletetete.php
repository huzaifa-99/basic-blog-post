<!DOCTYPE html>
<html>
<head>
    <?php session_start();?>
	<title>Sentiments Analysis System</title>
	<!--Bootstrap css link-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--CkEditor cdn start-->
    <script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
    <!--CkEditor cdn end-->
    <!--Fontawesome fonts link start-->
    <link href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" rel="stylesheet">
    <!--Fontawesome fonts link end-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
    </script>
</head>
<body>
    <!--Modal Login trigger button start-->
            <button type="button" class="btn btn-outline-primary mx-1" style="border-width:1.45px !important;" data-toggle="modal" data-target="#myModal">
              Login
            </button>
            <!--Modal Login trigger button end-->
            <a href="signup.php"><button class="btn btn-outline-primary mx-3" style="border-width:1.45px!important;" type="submit">SignUp</button></a>';
    <!--Login Modal Start-->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <form action="login_php.php" method="post">
                    <div class="modal-header">              
                        <h4 class="modal-title">Login</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="email" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <div class="clearfix">
                                <label>Password</label>
                                <a href="#" class="pull-right text-muted"><small>Forgot?</small></a>
                            </div>
                            
                            <input type="password" name="password" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <label class="checkbox-inline pull-left"><input type="checkbox"> Remember me</label>
                        <input type="submit" name="loginsubmit" class="btn btn-primary pull-right" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>     
    <!--Login Modal End-->
    <!--CKeditor Start-->
    <!--
    <br><br><br><br>       
    <center>
    <div style="width: 80%;margin-top:2%;">
        <h1>Write Your Blog</h1>
        <form method="post" action="">
            <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fas fa-pencil-alt"></i> </span>
             </div>
            <input name="title" class="form-control" placeholder="Blog Title" type="text" required>
            </div>
            <textarea name="description">
            </textarea>
            <input type="submit" name="create" class="btn btn-primary btn-block" value="Create Blog">
        </form>
        <form action="" method="post">
            <input type="submit" name="show" value="Show Posts">
        </form>
    </div>
    </center>-->
    <!--CKeditor end-->
    <?php
            require_once 'connection.php';
            // if the user clicked create blog button ____start____
            if(isset($_POST['create'])){
                if(!isset($_SESSION['email'])){echo "You Are not logged in"; exit();}
                if(isset($_POST['description']) && $_POST['description']!==""){$description=$_POST['description'];}
                if(isset($_POST['title']) && $_POST['title']!==""){$title=$_POST['title'];}
                $sql = "INSERT into posts (P_Title,Author_Id,Author_Name,Description) VALUES ('$title','{$_SESSION['id']}','{$_SESSION['email']}','$description')";
                $res = mysqli_query($conn, $sql);
                if($res){echo "inserted";}
                elseif(!$res){echo "could'nt insert";}
                else echo "unknown error";
            }
            // if the user clicked create blog button ____end____
            // if the user clicked logout button ____start____
            if(isset($_POST['logout'])){
                session_destroy();
                header("location:index.php");
            }
            // if the user clicked logout button ____end____
        ?>
    <?php
    // if the user clicked show blogs button ____start____
        //if (isset($_POST['show'])) {
            $sql1 = "SELECT * FROM posts";
            $res1 = mysqli_query($conn, $sql1);
            if($res1){
                echo "<h1 class='text-center'>Latest Posts</h1>";
                while($row=mysqli_fetch_assoc($res1)){
                echo "<div style='width: 80%;border:1px solid #000;' id='div".$row['Post_Id']."'>";
                echo "Title: <u>".$row["P_Title"]."</u><br>";
                echo "Author: <u>".$row["Author_Name"]."</u>";
                echo $row["Description"];
                echo '<table><tr><td><form>
                        <input type="hidden" name="postid" value="'.$row['Post_Id'].'">
                        <input type="submit" name="like" id="like" value="like post" onclick="return likepost('.$row['Post_Id'].')">
                      </form></td><td id="updatelikes'.$row['Post_Id'].'">';//
                echo $row['Post_Likes'];
                echo '</td><td><form>
                         <input type="hidden" name="postid" value="'.$row['Post_Id'].'">
                         <input type="submit" name="deletereply" id="deletereply" value="delete post" onclick="return deletepost('.$row['Post_Id'].')">
                      </form></td></tr></table>';


                echo "<br>comments";


                echo '<form>
                            <input type="hidden" name="postid" value="'.$row['Post_Id'].'">
                            <textarea name="cdata" id="cdata'.$row['Post_Id'].'"></textarea>
                            <input type="submit" name="comment" id="comment" value="Addcomment" onclick="return addcommentt('.$row['Post_Id'].')">
                        </form>';


                      $sql0 = "SELECT * FROM comments WHERE Post_Id='{$row['Post_Id']}'";
                      $res0 = mysqli_query($conn,$sql0);
                      if($res0){ while ($roww = mysqli_fetch_assoc($res0)) {
                          echo "<br>";
                          echo '<table id="updatecomment'.$roww['Comment_Id'].'">
                          <tr><td>Commenter : '.$roww["Commenter_Name"].'<td></tr>
                           <tr><td>Comment : '.$roww["Comment"].'<td></tr>
                           <tr><td><form>
                                        <input type="hidden" name="commentid" value="'.$roww['Comment_Id'].'">
                                        <input type="hidden" name="postid" value="'.$row['Post_Id'].'">
                                        <input type="submit" name="likecomment" id="likecomment" value="like comment" onclick="return likecommentt('.$row['Post_Id'].','.$roww['Comment_Id'].')">
                                   </form>
                                <td>
                                <td id="updatecommentlikes'.$roww['Comment_Id'].'">'.$roww["C_Likes"].'</td>'; 
                                if($roww["Commenter_Id"]==$_SESSION['id'])
                                {
                                echo'
                                <td><form>
                                        <input type="hidden" name="commentid" value="'.$roww['Comment_Id'].'">
                                        <input type="hidden" name="postid" value="'.$row['Post_Id'].'">
                                        <input type="submit" name="deletecomment" id="deletecomment" value="delete comment" onclick="return deletecommentt('.$row['Post_Id'].','.$roww['Comment_Id'].')">
                                   </form></td>';}

                            echo '</tr>
                            <tr><td>



                            <form>
                                        <input type="hidden" name="commentid" value="'.$roww['Comment_Id'].'">
                                        <input type="hidden" name="postid" value="'.$row['Post_Id'].'">
                                        <textarea name="rdata" id="rdata'.$roww['Comment_Id'].'"></textarea>
                                        <input type="submit" name="replycomment" id="replycomment" value="Reply" onclick="return addreplyy('.$row['Post_Id'].','.$roww['Comment_Id'].')">
                                   </form>


                                <td>
                            </tr>';
                            $sqlq1 = "SELECT * FROM replys WHERE Post_Id='{$row['Post_Id']}' AND Comment_Id='{$roww['Comment_Id']}'";
                            $res01 = mysqli_query($conn,$sqlq1);
                            if($res01){ while ($roww1 = mysqli_fetch_assoc($res01)) {
                            echo '
                            <tr class="updatereply'.$roww1['Reply_Id'].'"><td></td><td></td><td>Replier : '.$roww1["Repliers_Email"].'<td></tr>
                            <tr class="updatereply'.$roww1['Reply_Id'].'"><td></td><td></td><td>Reply : '.$roww1["Reply"].'<td></tr>
                            <tr class="updatereply'.$roww1['Reply_Id'].'"><td></td><td></td><td><form>
                                        <input type="hidden" name="commentid" value="'.$roww['Comment_Id'].'">
                                        <input type="hidden" name="replyid" value="'.$roww1['Reply_Id'].'">
                                        <input type="hidden" name="postid" value="'.$row['Post_Id'].'">
                                        <input type="submit" name="likereply" id="likereply" value="like reply" onclick="return likereplyy('.$row['Post_Id'].','.$roww['Comment_Id'].','.$roww1['Reply_Id'].')">
                                   </form>
                                <td>
                                <td id="updatereplylikes'.$roww1['Reply_Id'].'">'.$roww1["R_Likes"].'</td>
                            ';
                            if($roww1["Repliers_Id"]==$_SESSION['id']){
                               echo'
                                <td><form>
                                        <input type="hidden" name="commentid" value="'.$roww['Comment_Id'].'">
                                        <input type="hidden" name="replyid" value="'.$roww1['Reply_Id'].'">
                                        <input type="hidden" name="postid" value="'.$row['Post_Id'].'">
                                        <input type="submit" name="deletereplyreply" id="deletereplyreply" value="delete reply" onclick="return deletereplyy('.$row['Post_Id'].','.$roww['Comment_Id'].','.$roww1['Reply_Id'].')">
                                   </form></td>'; 
                            }
                            echo "</tr>";
                            }}
                            echo '</table>';
                          echo "<br>";
                      }}
                      elseif(!$res0){ echo "Cannot show comments on this post";}
                      else echo "unknown error"; 
                      echo'</div>';
                }
            }
            elseif(!$res1){echo "could'nt select";}
            else echo "unknown error";
        //}


        
    // if the user clicked show blogs button ____end____
    ?>
    <!--Message From The Php Script Start-->
    <?php
    if (isset($_GET['message'])) {
        $message=$_GET['message'];
        echo "<script>alert('".$message."')</script>";
    }
    ?>
    <!--Message From The Php Script End-->
    <!---->
    <script type="text/javascript">
        $(document).ready(function () {
           $('#like').click(function(){
                var like = $(this).val();
                $.ajax({
                    url:"like.php",
                    method:"post",
                    data:{like:like},
                    success:function () {
                    }
                })
           })
        });
    </script>
    <!---->
	<!--JS, Popper.js, and jQuery ____start____-->
    <!--ye googleajax k sath masla kr rha hai<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!--JS, Popper.js, and jQuery ____end____-->
    <!--Convert Textarea To Ckeditor by name property Start-->         
    <script type="text/javascript">
        CKEDITOR.replace( 'description');
    </script>
    <!--Convert Textarea To Ckeditor by name property -->
    <?php
    // string search start
    $string = "string";
    $keyword = "keyword";
    $search = strpos($string,$keyword);
    if($search){
        echo "The keyword exists in the string";
    }
    elseif(!$search){
        echo "The keyword does'nt exist in the string";
    }
    // string search end
    ?>
</body>
</html>