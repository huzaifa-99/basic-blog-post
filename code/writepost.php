<!DOCTYPE html>
<html>
<head>
	<?php require 'connection.php';session_start();?>
	<title>Write Post</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

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

    <style type="text/css">
    #tags{
      float:left;
      border:1px solid #ccc;
      padding:4px;
      font-family:Arial;
    }
    #tags span.tag{
      cursor:pointer;
      display:block;
      float:left;
      color:#555;
      background:#add;
      padding:5px 10px;
      padding-right:30px;
      margin:4px;
    }
    #tags span.tag:hover{
      opacity:0.7;
    }
    #tags span.tag:after{
     position:absolute;
     content:"×";
     border:1px solid;
     border-radius:10px;
     padding:0 4px;
     margin:3px 0 10px 7px;
     font-size:10px;
    }
    #tags input{
      background:#eee;
      border:0;
      margin:4px;
      padding:7px;
      width:auto;
    }
    </style>

    <script type="text/javascript">
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
         function hide_label_show_inputTYPEfile(){
            if(document.getElementById('img').value=="")
            {
                console.log("skcns");
                document.getElementById('img').style.display="none";
                document.getElementById('img').classList.remove("form-control");
                document.getElementById('labell').style.display="block";
            }
            else
            {
                console.log("bkscksb");
                document.getElementById('img').style.display="block";
                document.getElementById('img').classList.add("form-control");
                document.getElementById('labell').style.display="none";
            }
         }

         $(function(){
          $('#tags input').on('focusout', function(){    
            var txt= this.value.replace(/[^a-zA-Z0-9\+\-\.\#]/g,''); // allowed characters list
            if(txt) $(this).before('<span class="tag">'+ txt +'</span>');
            this.value="";
            this.focus();
          }).on('keyup',function( e ){
            // comma|enter (add more keyCodes delimited with | pipe)
            if(/(188|13)/.test(e.which)) $(this).focusout();
          });
          
          $('#tags').on('click','.tag',function(){
            $(this).remove(); 
          });

        });
    </script>
	<!--CkEditor cdn start-->
    <script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
    <!--CkEditor cdn end-->
    <style type="text/css">
        
    </style>
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
                <li><?php
                    if(!isset($_SESSION['id'])){
                    echo '<a data-toggle="modal" data-target="#myModal" style="cursor: pointer;">Login</a>';}
                    elseif(isset($_SESSION['id'])){
                    echo '<a href="logout.php">Logout</a>';
                    }
                    ?>
                    </li>
                <li class="nav-item"><?php
                    if(!isset($_SESSION['id'])){
                    echo '<button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#myModal">Write Your Post</button>';}
                    elseif(isset($_SESSION['id'])){
                    echo '<a href="writepost.php"><button class="btn btn-primary">Write Your Post</button></a>';
                    }
                    ?></li>
                <li class="d-none d-lg-inline-block"><a href="#" class="js-search-toggle"><span class="icon-search"></span></a></li>
              </ul>
            </nav>
            <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span class="icon-menu h3"></span></a></div>
          </div>

      </div>
    </header>
    <!--Div Left Side Start-->
    <div style="float: left;width: 70%;border-right: 1px solid #000;position: static;">
        <!--CKeditor Start-->      
	    <center>
	    <div style="width: 80%;margin-top:2%;">
	        <h1>Write Your Blog</h1>
	        <form method="post" action="" enctype="multipart/form-data">
	            <div class="form-group input-group">
	            <div class="input-group-prepend">
	                <span class="input-group-text"> <i class="fas fa-pencil-alt"></i> </span>
	             </div>
	            <input name="title" class="form-control" style="padding-left: 1.5rem;" placeholder="Blog Title" type="text" required>
	            </div>
                <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="far fa-image"></i> </span>
                 </div>
                <label for="img" id="labell" class="form-control" style="text-align: left;padding-left: 1.5rem;">Thumbnail Image </label>
                <input type="file" class="" name="pictures" id="img" style="display:none;" oninput="return hide_label_show_inputTYPEfile()" required />
                
                </div>

                <!--<div class="form-group input-group">
                    <div class="input-group-prepend"><span class="input-group-text"> <i class="fas fa-tags"></i> </span></div>
                    <div id="tags" class="form-control" style="padding: 0.01rem 0.75rem;">
                        <input type="text" style="background-color: transparent;outline: none;float: left;font-size: 1rem;flex: 1 1 auto;" value="" placeholder="Add Tags" />
                    </div>
                </div>-->


	            <textarea name="description">
	            </textarea>
	            <input type="submit" name="create" class="btn btn-primary btn-block" value="Create Blog">
	        </form>
	        <a href="index.php">
	            <button name="show" class="btn btn-primary btn-block" style="margin-top:5px !important;" value="Show Posts">Show Posts</button>
	        </a>
	    </div>
	    </center>
	    <br><br><br><br>
	    <!--CKeditor end-->
	    <?php
            // if the user clicked create blog button ____start____
            if(isset($_POST['create'])){
                if(!isset($_SESSION['email'])){echo "You Are not logged in"; exit();}
                if(isset($_POST['description']) && $_POST['description']!==""){$description=$_POST['description'];}
                if(isset($_POST['title']) && $_POST['title']!==""){$title=$_POST['title'];}
                if(isset($_POST['pictures']) && $_POST['pictures']!==""){$pictures=$_POST['pictures'];}

                $uploads_dir = './images';
                $tmp_name = $_FILES["pictures"]["tmp_name"];
                $name = rand().$_FILES["pictures"]["name"];
                $x=move_uploaded_file($tmp_name, "$uploads_dir/$name");
                if($x) {
                    echo "Uploaded";sleep(1);
                    //header("Refresh:5");
                } 
                else {
                   echo "File was not uploaded";
                }

                $sql = "INSERT into posts (P_Title,Author_Id,Author_Name,Description,P_Thumbnail) VALUES ('$title','{$_SESSION['id']}','{$_SESSION['email']}','$description','$name')";
                $res = mysqli_query($conn, $sql);
                if($res){
                    //copy($tmp_name,"$uploads_dir/$name");
                    


                    echo '<script type="text/javascript">
                				window.location.href = "index.php";
								</script>';
				}
                elseif(!$res){echo "could'nt insert";}
                else echo "unknown error";
            }
            // if the user clicked create blog button ____end____
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!--JS, Popper.js, and jQuery ____end____-->
    <!--Convert Textarea To Ckeditor by name property Start-->         
    <script type="text/javascript">
        CKEDITOR.replace( 'description');
    </script>
    <!--Convert Textarea To Ckeditor by name property -->

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
</body>
</html>