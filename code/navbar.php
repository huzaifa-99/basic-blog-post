
<!--Nav Module Bootstrap Start-->
    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top" style="border-bottom:1px solid #c1c7c2 !important;background-color: #FFFFFF !important;">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="navbar-brand" href="index.php">Blog-Post</a>
                </li>
            </ul>
        </div>
        <input class="form-control" type="text" placeholder="Search" aria-label="Search" style="box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.2) !important;">
        <input type="submit" class="btn btn-primary" name="" value="Search">
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <?php
                    if(!isset($_SESSION['id'])){
                    echo '<button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#myModal">Write Your Post</button>';}
                    else{
                    echo '<a class="btn btn-primary" href="writepost.php">Write Your Post</a>';
                    }
                    ?>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <?php
                        if(isset($_SESSION['id'])){
                            include 'displayprofilepic.php';
                        }
                        else{
                            echo "Login";
                        }
                      ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        
                          <?php
                            if(isset($_SESSION['id'])){
                                echo '<a class="dropdown-item" href="logout.php">Logout</a>';
                            }
                            else{
                                echo '<!--Modal Login trigger button start-->
                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#myModal">
                                        Login
                                        </button>
                                        <!--Modal Login trigger button end-->';
                            }
                          ?>
                        
                        <?php
                            if(isset($_SESSION['id'])){
                            }
                            else{
                                echo '<a class="dropdown-item" href="signup.php">SignUp</a>';
                            }
                        ?>
                        <?php
                            if(isset($_SESSION['id'])){
                                echo '<a class="dropdown-item" href="#">Profile Settings</a>';
                            }
                            else{
                            }
                        ?>  
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item mx-1" href="#">About Us</a> 
                    </div>
              </li>
            </ul>
        </div>   
    </nav>
    <!--Nav Module Bootstrap End-->
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
    </script>
    <!--Login Modal Start-->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
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