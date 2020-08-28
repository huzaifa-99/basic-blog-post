<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    require 'connection.php';session_start();
    if (isset($_GET['message'])) {
        $message=$_GET['message'];
        echo "<script>alert('".$message."')</script>";
    }
    function custom_echo($string,$length){
    //if(strlen($string)<$length){
    //    echo $string;
    //}
    //elseif(strlen($string)>$length)
    //{
      $cut_string=substr($string,0,$length);
      echo $cut_string;
    //}
    }
  ?>

  <title>Sentiments Analysis System</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">

  <!--Fontawesome fonts link start-->
  <link href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" rel="stylesheet">
  <!--Fontawesome fonts link end-->

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

  <script type="text/javascript">
  // function for logging the user into the system throught ajax
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
                  <label>Email</label>
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

    <!--Signup Modal Start-->
    <div id="myModalSIGNUP" class="modal fade">
      <div class="modal-dialog modal-login">
        <div class="modal-content" style="margin-top: 100px;"><!--https://stackoverflow.com/questions/34755770/modal-appear-behind-fixed-navbar----modal appear behind fixed navbar::::The navbar is fixed, meaning z-index is only relative to it's children. The simple fix is to simply increase the top margin on the outer modal container to push it down the page slightly and out from behind the navbar.
        Otherwise, your modal markup has to sit in your header and you need to give it a higher z-index than the z-index of the parent navbar.-->
          <form enctype="multipart/form-data" method="post" id="form1">
            <div class="modal-header">              
              <h4 class="modal-title">Signup</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">  
              <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" id="username" class="form-control" required="required">
              </div>              
              <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email1" id="email1" class="form-control" required="required">
              </div>
              <div class="form-group">
                  <div class="clearfix">
                      <label>Password</label>
                  </div>
                  
                  <input type="password" name="password1" id="password1" class="form-control" required="required">
              </div>
              <div class="form-group">
                  <div class="clearfix">
                      <label>Profile Pic</label>
                  </div>
                  
                  <input type="file" name="profilepic" id="profilepic" class="form-control" required="required">
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" name="signupsubmit" id="signupsubmit" class="btn btn-primary pull-right" value="Signup">
            </div>
          </form>
        </div>
      </div>
    </div>     
    <!--Signup Modal End-->


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
  


    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12">
            <h2>Recent Posts</h2>
          </div>
        </div>
        <div class="row">

        <?php
        $sql = "SELECT * FROM posts";
        $res = mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)>0){ 
        while($row=mysqli_fetch_assoc($res)){ 
          $time = $row['Time'];$explode = explode(' ', $time);
          $explodedtime = $explode[0];
          $time=strtotime($explodedtime);
          $month=date("F",$time);
          $year=date("Y",$time);
          $day=date("j",$time);
          $date = $month." ".$day." ".$year;
          $sql00 = "SELECT * FROM users WHERE Id='{$row['Author_Id']}'";
          $res00 = mysqli_query($conn,$sql00);
          if($res00){
            $row00 = mysqli_fetch_assoc($res00);
          echo ''; 
        ?>
          <?php $idd=$row['Post_Id'];?>
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="single.php?id=<?=$idd?>"><img src="images/<?=$row['P_Thumbnail']?>" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <!--<span class="post-category text-white bg-secondary mb-3">Politics</span>-->
              
              <h2><a href="single.php?id=<?=$idd?>"><?=$row['P_Title']?></a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="images/<?=$row00['Image_Name']?>" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#"><?=$row00['Username']?></a></span>
                <span>&nbsp;-&nbsp; <?=$date?></span>
              </div>

              <?php
              $sqll="SELECT Liker_Id FROM posts_likes";
              $res00l=mysqli_query($conn,$sqll);
              if($res00l){
                if(mysqli_num_rows($res00l)==1){
                echo '<style type="text/css">.heartclass{color:red;}</style>';
                }
                elseif(mysqli_num_rows($res00l)==0){
                echo '<style type="text/css">.heartclass{color:black;}</style>';
                }
              }  
              ?>

                <p><i class='far fa-heart heartclass'></i>&nbsp;<?=$row['Post_Likes']?>&ensp;<i class='far fa-comment'></i>&nbsp;<?=$row['T_Comments']?>&ensp;</p>  
                <p><?php custom_echo($row['Description'],25);?></p>
                <p><a href="single.php?id=<?=$idd?>">Read More</a></p>
              </div>
            </div>
          </div>

          <?php '';}}}?>

        </div>

        <div class="row text-center pt-5 border-top">
          <div class="col-md-12">
            <div class="custom-pagination">
              <span>1</span>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <span>...</span>
              <a href="#">15</a>
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
    $(document).ready(function() {

    $("#form1").submit(function(e){
      e.preventDefault();
     var data = new FormData(this);
     $.ajax({
        type: 'POST',
        url: 'signup_php.php',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
         success: function (data) {
           alert(data);
           if(data == "You Have Been Signed Up Successfully")
           {
            window.location.reload(false);
           }
         },
      });
  });

});
  </script>

  </body>
</html>

<!--  // 245 - 258 tak fix karna hai  -->
