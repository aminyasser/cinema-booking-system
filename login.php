<?php 
    include 'core/init.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>YDAR | Login</title>
    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" type="image/jpg" href="assets/img/ydar.jpg"> 



</head>
<body>

        <section id="login">


            <nav id="mynav" class="navbar navbar-expand-lg navbar-dark  position-fixed w-100">
                <div class="container">

                    <a class="navbar-brand" href="#">Y D A R</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                          <a class="nav-link" href="index.php"><i class="fas fa-backward mr-2"></i>Home </a>
                        </li>                    
                      </ul>
                      
                    </div>
                </div>
              </nav>


            <div class="login-con">
                    <div class="row justify-content-center">
                        <div class="login-input py-5">
                            <h2 class="title">Login to continue</h2>
                            <span class="title-span">Don't have an account ? 
                            <a href="signup.php"> 
                            <button class="btn btn-primary login-btn ml-1">Sign Up</button>
                            </a> 
                            </span>

                            <form action="handle/handleLogin.php" method="POST">
                               
                            <?php  if (isset($_SESSION['errors'] )) {  ?>
                    
                            <?php foreach ($_SESSION['errors'] as $error) { ?>

                            <div  class="alert alert-danger" role="alert">
                                <p style="font-size: 15px;" class="text-center"> <?php echo $error ; ?> </p>  
                            </div> 
                            <?php }   ?> 

                             <?php }  unset($_SESSION['errors']);  ?>


                                <div class="form-group py-3">
                                  <label class="label-n" for="exampleInputEmail1">Email address</label>
                                  <input name="email" type="email" class="form-control login-text" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                
                                </div>
                                <div class="form-group pb-3">
                                  <label class="label-n"for="exampleInputPassword1">Password</label>
                                  <input name="password" type="password" class="form-control login-text" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="text-center">

                                    <button name="login" type="submit" class="btn btn-primary login-btn ">Login</button>
                                </div>
                              </form>
                        </div>
                    </div>
            </div>

            <div class="login-bg">
                <div class="row justify-content-center">
                        <h3 class="welcome">Welcome to </h3>
                        <h3 class="ydar">Y D A R</h3>
                </div>
            </div>

        </section>










    <script src="assets/js/jquery-3.4.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/mine.js"></script>


</body>
</html>