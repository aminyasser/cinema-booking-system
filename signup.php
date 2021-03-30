<?php
    include 'core/init.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>YDAR | SignUp</title>
    
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
                          <a class="nav-link" href="#"><i class="fas fa-backward mr-2"></i>Home </a>
                        </li>                    
                      </ul>
                      
                    </div>
                </div>
              </nav>


            <div class="login-con">
                    <div class="row justify-content-center">
                        <div class="login-input py-5">
                            <h2 class="title">Login to continue</h2>
                            <span class="title-span">Already have an account ? 
                            <a href="login.php"> 
                            <button class="btn btn-primary login-btn ml-1">Login</button>
                            </a> 
                            </span>

                            <form action="handle/handleSignUp.php" method="POST">
                               
                            

                             <div class="form-group pt-1">
                                  <label class="label-n" for="exampleInputEmail1">Name</label>
                                  <input name="name" type="text" class="form-control login-text" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                                
                                </div>

                                <div class="form-group pt-1">
                                  <label class="label-n" for="exampleInputEmail1">Email address</label>
                                  <input name="email" type="email" class="form-control login-text" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                
                                </div>
                                <div class="form-group">
                                  <label class="label-n"for="exampleInputPassword1">Password</label>
                                  <input name="password" type="password" class="form-control login-text" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="text-center">

                             <button name="signup" type="submit" class="btn btn-primary login-btn ">Sign Up</button>
                                    <?php  if (isset($_SESSION['errors_signup'] )) {  ?>
                    
                    <?php foreach ($_SESSION['errors_signup'] as $error) { ?>

                    <div  class="alert alert-danger mt-2 border-rounded" role="alert">
                        <p style="font-size: 18px;
                        font-weight:500;" class="text-center"> <?php echo $error ; ?> </p>  
                    </div> 
                    <?php }   ?> 

                     <?php }  unset($_SESSION['errors_signup'])  ?>
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