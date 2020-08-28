<!DOCTYPE html>
<html lang="en">
<head>
  <?php require 'connection.php';session_start();?>

  <title>Mini Blog</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">

  <!--Fontawesome fonts link start-->
  <link href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" rel="stylesheet">
  <!--Fontawesome fonts link end-->

  <!--Ajax GoogleCdn Start-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!--Ajax GoogleCdn end-->

  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <!--Login Modal Start-->
  <div id="myModal" class="modal fade">
    <div class="modal-dialog modal-login">
      <div class="modal-content" style="margin-top: 100px;"><!--https://stackoverflow.com/questions/34755770/modal-appear-behind-fixed-navbar----modal appear behind fixed navbar::::The navbar is fixed, meaning z-index is only relative to it's children. The simple fix is to simply increase the top margin on the outer modal container to push it down the page slightly and out from behind the navbar.
      Otherwise, your modal markup has to sit in your header and you need to give it a higher z-index than the z-index of the parent navbar.-->
        <form>
          <div class="modal-header">              
            <h4 class="modal-title">Login</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">                
            <div class="form-group">
                <label>Username</label>
                <input type="email" name="email" id="email" class="form-control" required="required">
            </div>
            <div class="form-group">
                <div class="clearfix">
                    <label>Password</label>
                    <a href="#" class="pull-right text-muted"><small>Forgot?</small></a>
                </div>
                
                <input type="password" name="password" id="password" class="form-control" required="required">
            </div>
          </div>
          <div class="modal-footer">
            <label class="checkbox-inline pull-left"><input type="checkbox"> Remember me</label>
            <input type="submit" name="loginsubmit" id="loginsubmit" class="btn btn-primary pull-right" value="Login" onclick="return loginuser()">
          </div>
        </form>
      </div>
    </div>
  </div>     
  <!--Login Modal End-->

<div class="site-wrap">

  <div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>
  
  <!--Nav Bar Start-->
  <header class="site-navbar" role="banner">
    <div class="container-fluid">
      <div class="row align-items-center">
        
        <div class="col-12 search-form-wrap js-search-form">
          <form method="get" action="#">
            <input type="text" id="s" class="form-control" placeholder="Search...">
            <button class="search-btn" type="submit"><span class="icon-search"></span></button>
          </form>
        </div>

        <div class="col-4 site-logo">
          <a href="index.html" class="text-black h2 mb-0">Sentiments Analysis</a>
        </div>

        <div class="col-8 text-right">
          <nav class="site-navigation" role="navigation">
            <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
              <li><a href="index.php">Home</a></li>
              <?php
                  if(!isset($_SESSION['id'])){
                  echo '<li><a data-toggle="modal" data-target="#myModal" style="cursor: pointer;">Login</a></li>';
                  echo '<li><a data-toggle="modal" data-target="#myModalSIGNUP" style="cursor: pointer;">Signup</a></li>';
                  }
                  elseif(isset($_SESSION['id'])){
                  echo '<li><a href="logout.php">Logout</a></li>';
                  }
              ?>    
              <li class="nav-item"><?php
                  if(!isset($_SESSION['id'])){
                  echo '<button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#myModal">Write Your Post</button>';
                  }
                  elseif(isset($_SESSION['id'])){
                  echo '<a href="writepost.php"><button class="btn btn-primary">Write Your Post</button></a>';
                  }
                  ?>
              </li>
              <li class="d-none d-lg-inline-block"><a href="#" class="js-search-toggle"><span class="icon-search"></span></a></li>
            </ul>
          </nav>
          <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span class="icon-menu h3"></span></a>
        </div>
      </div>
    </div>
  </header>
  <!--Nav Bar End-->
  
  <?php 
  //if(!isset($_GET['id'])){header("location:index.php");}
  /*else*/if(isset($_GET['id'])){
  $sql3 ="SELECT * FROM posts Where Post_Id='{$_GET['id']}'";
  $res3 = mysqli_query($conn,$sql3);
  $row=mysqli_fetch_array($res3);

  $sql4 ="SELECT * FROM users Where Id='{$row['Author_Id']}'";
  $res4 = mysqli_query($conn,$sql4);
  $row1=mysqli_fetch_array($res4);

  $time = $row['Time'];$explode = explode(' ', $time);
  $explodedtime = $explode[0];
  $time=strtotime($explodedtime);
  $month=date("F",$time);
  $year=date("Y",$time);
  $day=date("j",$time);
  $date = $month." ".$day." ".$year;
  echo '';
  ?>
  <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('images/<?=$row['P_Thumbnail'];?>');">
    <div class="container">
      <div class="row same-height justify-content-center">
        <div class="col-md-12 col-lg-10">
          <div class="post-entry text-center">
            <span class="post-category text-white bg-success mb-3">Nature</span>
            <h1 class="mb-4"><a href="#"><?=$row['P_Title'];?></a></h1>
            <div class="post-meta align-items-center text-center">
              <figure class="author-figure mb-0 mr-3 d-inline-block"><img src="images/<?=$row1['Image_Name'];?>" alt="Image" class="img-fluid"></figure>
              <span class="d-inline-block mt-1">By&nbsp;<?=$row1['Username'];?></span>
              <span>&nbsp;-&nbsp; <?=$date;?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php '';}?>
  
  <section class="site-section py-lg">
    <div class="container">
      <div class="row blog-entries element-animate">
        <div class="col-md-12 col-lg-8 main-content">
          <div class="post-content-body">


            <p><form style="float: left;">
                <input type="hidden" name="postid" value="<?=$row['Post_Id']?>">
                <?php echo'<button style="background:none;border: none;text-decoration: none;display: inline-block;outline:none;" name="like" id="like" value="like"';?>
                <?php if(isset($_SESSION['id'])){
                  echo 'type="submit" onclick="return likepost('.$row['Post_Id'].')"';}
                elseif(!isset($_SESSION['id'])){echo 'type="button" data-toggle="modal" data-target="#myModal"';}
                //elseif(!isset($_SESSION['id']) && $_SESSION['id']==""){echo 'type="button" data-toggle="modal" data-target="#myModal"';}
                echo '';?><i class="far fa-heart fa-heart1" id="liker"></i></button>
                <?php echo "<span id='updatelikes".$row['Post_Id']."'>".$row['Post_Likes']."</span>";?>&nbsp;
              </form>
              <?php
              if(isset($_SESSION['id']) && $_SESSION['id']===$row["Author_Id"]){
               echo '<form>
                    <input type="hidden" name="postid" value="'.$row['Post_Id'].'">
                    <button type="submit" style="background:none;border: none;text-decoration: none;display: inline-block;outline:none;" name="deletereply" id="deletereply" value="delete post"';
                    if(isset($_SESSION['id'])){echo 'type="submit" onclick="return deletepost('.$row['Post_Id'].')"';}
                    else{echo 'type="button" data-toggle="modal" data-target="#myModal"';}
                    echo '><i class="far fa-trash-alt"></i></button>
                    </form>';
              }
              ?>
            </p>
            <p><?=$row['Description'];?></p>
          </div>
          <div class="pt-5">
            <p>Categories:  <a href="#">Food</a>, <a href="#">Travel</a>  Tags: <a href="#">#manila</a>, <a href="#">#asia</a></p>
          </div>

          <div class="comment-form-wrap pt-5">
              <h3 class="mb-5">Leave a comment</h3>
              <form class="p-4 bg-light">
                <div class="form-group">
                  <label for="message">Message</label>
                  <input type="hidden" name="postid" value="<?=$row['Post_Id']?>">
                  <textarea name="cdata" id="cdata<?=$row['Post_Id']?>" cols="30" rows="3" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <?php
                  if(!isset($_SESSION['id'])){
                  echo '<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary" style="cursor: pointer;">Addcomment</button>';
                  }
                  elseif(isset($_SESSION['id'])){
                  echo '<input type="submit" name="comment" id="comment" value="Addcomment" class="btn btn-primary" onclick="return addcommentt('.$row['Post_Id'].')">';
                  }
                  ?>  
                  
                </div>

              </form>
            </div>
          <?php
            $sql5 ="SELECT * FROM comments Where Post_Id='{$_GET['id']}'";
            $res5 = mysqli_query($conn,$sql5);
          ?>
          <div class="pt-5">
            <h3 class="mb-5"><?php echo mysqli_num_rows($res5);?>&nbsp;Comment/s</h3>
            <ul class="comment-list">
              <?php
              while($row2=mysqli_fetch_array($res5)){
              $time = $row2['Timee'];$explode = explode(' ', $time);
              $explodedtime = $explode[0];
              $time=strtotime($explodedtime);
              $month=date("F",$time);
              $year=date("Y",$time);
              $day=date("j",$time);
              $date = $month." ".$day." ".$year;
              echo '';
              ?>
              <li class="comment" id="updatecomment<?=$row2['Comment_Id']?>">
                <div class="vcard">
                  <img src="images/person_1.jpg" alt="Image placeholder">
                </div>
                <div class="comment-body">
                  <h3><?=$row2['Commenter_Name']?></h3>
                  <div class="meta"><?=$date?> at 2:21pm</div>
                  <p><?=$row2['Comment']?></p>

                  <form style="display:inline;">
                      <input type="hidden" name="commentid" value="<?=$row2['Comment_Id']?>">
                      <input type="hidden" name="postid" value="<?=$row['Post_Id']?>">
                      
                      <?php 
                      echo "<button style='background:none;border: none;text-decoration: none;display: inline-block;outline: none;' name='likecomment' id='likecomment".$row2['Comment_Id']."' value='like comment'";
                      if(isset($_SESSION['id'])){echo 'type="submit" onclick="return likecommentt('.$row['Post_Id'].','.$row2['Comment_Id'].')"';}
                      else{echo 'type="button" data-toggle="modal" data-target="#myModal"';}
                      echo '>';?><i class="far fa-thumbs-up fa-thumbs-up1" id="thumbs-up1<?=$row2['Comment_Id']?>"></i></button><span id="updatecommentlikes<?=$row2['Comment_Id']?>"><?=$row2["C_Likes"]?></span>
                  </form>

                  <?php 
                  if(isset($_SESSION['id']) && $row2["Commenter_Id"]==$_SESSION['id'])
                  {
                  echo'
                  <form style="display:inline;">
                    <input type="hidden" name="commentid" value="'.$row2['Comment_Id'].'">
                    <input type="hidden" name="postid" value="'.$row['Post_Id'].'">
                    <button type="submit" style="background:none;border: none;text-decoration: none;display: inline-block;outline:none;" name="deletecomment" id="deletecomment" value="delete comment" onclick="return deletecommentt('.$row['Post_Id'].','.$row2['Comment_Id'].')"><i class="far fa-trash-alt"></i></button>
                  </form>';}
                  ?>

                  <script type="text/javascript">
                    function togglecommentbox(commentid){
                    if(document.getElementById('commentbox'+commentid).style.display==='block'){
                      document.getElementById('commentbox'+commentid).style.display='none';
                    }
                    else if(document.getElementById('commentbox'+commentid).style.display==='none'){
                      document.getElementById('commentbox'+commentid).style.display='block';
                    }}
                  </script>
                  <p style="float: left;"><button class="reply rounded" onclick="return togglecommentbox(<?=$row2['Comment_Id']?>)" style="border:none;outline:none;">Reply</button></p>
                  <form class="p-4 bg-light" id="commentbox<?=$row2['Comment_Id']?>" style="display: none;">
                        <div class="form-group">
                          <input type="hidden" name="commentid" value="<?=$row2['Comment_Id']?>">
                          <input type="hidden" name="postid" value="<?=$row['Post_Id']?>">
                          <textarea name="rdata" id="rdata<?=$row2['Comment_Id']?>" cols="30" rows="2" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                          <input type="submit" name="replycomment" id="replycomment" value="Reply" class="btn btn-primary" onclick="return addreplyy(<?=$row['Post_Id']?>,<?=$row2['Comment_Id']?>)">
                        </div>
                  </form>

                </div>
                <?php if(($row2['C_Replys'])>0){
                $sql6 = "SELECT * FROM replys WHERE Comment_Id='{$row2['Comment_Id']}'";
                $res6 = mysqli_query($conn,$sql6);
                if($res6){
                  while ($row3=mysqli_fetch_assoc($res6)){
                    $time = $row3['Time'];$explode = explode(' ', $time);
                    $explodedtime = $explode[0];
                    $time=strtotime($explodedtime);
                    $month=date("F",$time);
                    $year=date("Y",$time);
                    $day=date("j",$time);
                    $date = $month." ".$day." ".$year;
                    echo '';
                ?>
                <ul class="children updatereply<?=$row3['Reply_Id']?>">
                  <li class="comment">
                    <div class="vcard">
                      <img src="images/person_1.jpg" alt="Image placeholder">
                    </div>
                    <div class="comment-body">
                      <h3><?=$row3['Repliers_Email']?></h3>
                      <div class="meta"><?=$row3['Time']?> at 2:21pm</div>
                      <p><?=$row3['Reply']?></p>
                      <!----<p><a href="#" class="reply rounded">Reply</a></p>---->


                  <form style="display:inline;">
                    <input type="hidden" name="commentid" value="<?=$row2['Comment_Id']?>">
                    <input type="hidden" name="replyid" value="<?=$row3['Reply_Id']?>">
                    <input type="hidden" name="postid" value="<?=$row['Post_Id']?>">
                    <?php
                    echo '<button style="background:none;border: none;text-decoration: none;display: inline-block;outline:none;" name="likereply" id="likereply" value="like reply"'; 
                    if(isset($_SESSION['id'])){echo 'type="submit" onclick="return likereplyy('.$row['Post_Id'].','.$row2['Comment_Id'].','.$row3['Reply_Id'].')"';}
                    else{echo 'type="button" data-toggle="modal" data-target="#myModal"';}
                    echo'><i class="far fa-thumbs-up fa-thumbs-up2"></i></button>';
                    echo '<span id="updatereplylikes'.$row3['Reply_Id'].'">'.$row3["R_Likes"].'</span>';
                    ?>
                    </form>

                    <?php
                    if(isset($_SESSION['id']) && $row3["Repliers_Id"]==$_SESSION['id']){
                    echo'
                      <form style="display:inline;">
                        <input type="hidden" name="commentid" value="'.$row2['Comment_Id'].'">
                        <input type="hidden" name="replyid" value="'.$row3['Reply_Id'].'">
                        <input type="hidden" name="postid" value="'.$row['Post_Id'].'">
                        <button type="submit" style="background:none;border: none;text-decoration: none;display: inline-block;outline:none;" name="deletereplyreply" id="deletereplyreply" value="delete reply" onclick="return deletereplyy('.$row['Post_Id'].','.$row2['Comment_Id'].','.$row3['Reply_Id'].')"><i class="far fa-trash-alt"></i></button>
                      </form>'; 
                    }
                    ?>





                      
           


                    </div>
                  </li>
                </ul>
                <?php '';}}}?>
              </li>
              <?php '';} ?>
          </div>

        </div>

        <!-- END main-content -->

        <div class="col-md-12 col-lg-4 sidebar">
          <div class="sidebar-box search-form-wrap">
            <form action="#" class="search-form">
              <div class="form-group">
                <span class="icon fa fa-search"></span>
                <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
              </div>
            </form>
          </div>
          <!-- END sidebar-box -->
          <div class="sidebar-box">
            <div class="bio text-center">
              <img src="images/<?=$row1['Image_Name'];?>" alt="Image Placeholder" class="img-fluid mb-5">
              <div class="bio-body">
                <h2><?=$row1['Username'];?></h2>
                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facilis sunt repellendus excepturi beatae porro debitis voluptate nulla quo veniam fuga sit molestias minus.</p>
                <p><a href="#" class="btn btn-primary btn-sm rounded px-4 py-2">Read my bio</a></p>
                <p class="social">
                  <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                  <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                  <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                  <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                </p>
              </div>
            </div>
          </div>
          <!-- END sidebar-box -->  
          <div class="sidebar-box">
            <h3 class="heading">Popular Posts</h3>
            <div class="post-entry-sidebar">
              <ul>
                <li>
                  <a href="">
                    <img src="images/img_1.jpg" alt="Image placeholder" class="mr-4">
                    <div class="text">
                      <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                      <div class="post-meta">
                        <span class="mr-2">March 15, 2018 </span>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="">
                    <img src="images/img_2.jpg" alt="Image placeholder" class="mr-4">
                    <div class="text">
                      <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                      <div class="post-meta">
                        <span class="mr-2">March 15, 2018 </span>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="">
                    <img src="images/img_3.jpg" alt="Image placeholder" class="mr-4">
                    <div class="text">
                      <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                      <div class="post-meta">
                        <span class="mr-2">March 15, 2018 </span>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- END sidebar-box -->

          <div class="sidebar-box">
            <h3 class="heading">Categories</h3>
            <ul class="categories">
              <li><a href="#">Food <span>(12)</span></a></li>
              <li><a href="#">Travel <span>(22)</span></a></li>
              <li><a href="#">Lifestyle <span>(37)</span></a></li>
              <li><a href="#">Business <span>(42)</span></a></li>
              <li><a href="#">Adventure <span>(14)</span></a></li>
            </ul>
          </div>
          <!-- END sidebar-box -->

          <div class="sidebar-box">
            <h3 class="heading">Tags</h3>
            <ul class="tags">
              <li><a href="#">Travel</a></li>
              <li><a href="#">Adventure</a></li>
              <li><a href="#">Food</a></li>
              <li><a href="#">Lifestyle</a></li>
              <li><a href="#">Business</a></li>
              <li><a href="#">Freelancing</a></li>
              <li><a href="#">Travel</a></li>
              <li><a href="#">Adventure</a></li>
              <li><a href="#">Food</a></li>
              <li><a href="#">Lifestyle</a></li>
              <li><a href="#">Business</a></li>
              <li><a href="#">Freelancing</a></li>
            </ul>
          </div>
        </div>
        <!-- END sidebar -->

      </div>
    </div>
  </section>

  <div class="site-section bg-light">
    <div class="container">

      <div class="row mb-5">
        <div class="col-12">
          <h2>More Related Posts</h2>
        </div>
      </div>

      <div class="row align-items-stretch retro-layout">
        
        <div class="col-md-5 order-md-2">
          <a href="single.html" class="hentry img-1 h-100 gradient" style="background-image: url('images/img_4.jpg');">
            <span class="post-category text-white bg-danger">Travel</span>
            <div class="text">
              <h2>The 20 Biggest Fintech Companies In America 2019</h2>
              <span>February 12, 2019</span>
            </div>
          </a>
        </div>

        <div class="col-md-7">
          
          <a href="single.html" class="hentry img-2 v-height mb30 gradient" style="background-image: url('images/img_1.jpg');">
            <span class="post-category text-white bg-success">Nature</span>
            <div class="text text-sm">
              <h2>The 20 Biggest Fintech Companies In America 2019</h2>
              <span>February 12, 2019</span>
            </div>
          </a>
          
          <div class="two-col d-block d-md-flex">
            <a href="single.html" class="hentry v-height img-2 gradient" style="background-image: url('images/img_2.jpg');">
              <span class="post-category text-white bg-primary">Sports</span>
              <div class="text text-sm">
                <h2>The 20 Biggest Fintech Companies In America 2019</h2>
                <span>February 12, 2019</span>
              </div>
            </a>
            <a href="single.html" class="hentry v-height img-2 ml-auto gradient" style="background-image: url('images/img_3.jpg');">
              <span class="post-category text-white bg-warning">Lifestyle</span>
              <div class="text text-sm">
                <h2>The 20 Biggest Fintech Companies In America 2019</h2>
                <span>February 12, 2019</span>
              </div>
            </a>
          </div>  
          
        </div>
      </div>

    </div>
  </div>


  <div class="site-section bg-lightx">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-md-5">
          <div class="subscribe-1 ">
            <h2>Subscribe to our newsletter</h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a explicabo, ipsam nostrum.</p>
            <form action="#" class="d-flex">
              <input type="text" class="form-control" placeholder="Enter your email address">
              <input type="submit" class="btn btn-primary" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
  <div class="site-footer">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-4">
          <h3 class="footer-heading mb-4">About Us</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat reprehenderit magnam deleniti quasi saepe, consequatur atque sequi delectus dolore veritatis obcaecati quae, repellat eveniet omnis, voluptatem in. Soluta, eligendi, architecto.</p>
        </div>
        <div class="col-md-3 ml-auto">
          <!-- <h3 class="footer-heading mb-4">Navigation</h3> -->
          <ul class="list-unstyled float-left mr-5">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Advertise</a></li>
            <li><a href="#">Careers</a></li>
            <li><a href="#">Subscribes</a></li>
          </ul>
          <ul class="list-unstyled float-left">
            <li><a href="#">Travel</a></li>
            <li><a href="#">Lifestyle</a></li>
            <li><a href="#">Sports</a></li>
            <li><a href="#">Nature</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          

          <div>
            <h3 class="footer-heading mb-4">Connect With Us</h3>
            <p>
              <a href="#"><span class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
              <a href="#"><span class="icon-twitter p-2"></span></a>
              <a href="#"><span class="icon-instagram p-2"></span></a>
              <a href="#"><span class="icon-rss p-2"></span></a>
              <a href="#"><span class="icon-envelope p-2"></span></a>
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 text-center">
          <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>
      </div>
    </div>
  </div>
  
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/aos.js"></script>

<script src="js/main.js"></script>

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
            var likecomment = document.getElementById('likecomment'+commentid).value;
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
                  console.log('nkns');
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

</body>
</html>