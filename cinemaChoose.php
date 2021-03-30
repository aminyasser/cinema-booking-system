<?php 
include 'core/init.php';

if (!isset($_SESSION['user_id'])) 
        header('location: login.php');

      
        $movie_id = $_GET['m_id'];
       
        $movie = Cinema::getMovie($movie_id);

        $username = User::getNameById($_SESSION['user_id']);

        $movie_cinema = Cinema::getMoviesCinemas($movie_id) ;




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>YDAR | Choose Cinema </title>
    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" type="image/jpg" href="assets/img/ydar.jpg"> 



</head>
<body>
    
    
    <section id="login">

        <nav id="mynav" class="navbar navbar-expand-lg navbar-dark w-100">
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
                    
                    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle nav-account-item" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $username; ?>
                            </a>
                            <div class="dropdown-menu nav-menu" aria-labelledby="navbarDropdown">
                            <a  class="dropdown-item nav-menu-item" href="profile.php">Profile</a>
                            <a  class="dropdown-item nav-menu-item" href="index.php#cinema">Book</a>
                            <div class="dropdown-divider"></div>
                            <a style="color: #C34848;
                            font-size:17px" class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt mr-2"></i></i>Logout </a>
                            </div>
                            </li> 

                  </ul>
                  
                </div>
            </div>
          </nav>

            <div class="container py-5">
                        <div class="row">
                            <!-- <div class="col-md-12 div-height">
                                <div class="steps-con">
                                        <div class="d-flex">
                                            <div class="steps p-2 form-active">
                                                <i style="font-size: 40px;" class="fas fa-dice-one step-i"></i>
                                                <span class="step-title d-inline-block ">Choose Your Show</span>
                                                
                                            </div>
                                            <div class="steps p-2">
                                                <i style="font-size: 40px;" class="fas fa-dice-two step-i"></i>
                                                <span class="step-title d-inline-block ">Choose Your Seats</span>
                                                
                                            </div>
                                        </div>
                                </div>
                            </div> -->
                            <div class="w-100 py-3 text-light">
                                <h2 class="text-center">Choose Cinema</h2>
                            </div>

                            <div class="col-md-8">
                                    <form action="show.php" method="GET">
                                         

                                        <div class="form-group pt-5">
                                            
                                            <select name="c_id" class="form-control show-select">
                                              <option selected disabled>Choose Cinema</option>

                                              <?php foreach($movie_cinema as $m) { ?>
                                              <option value="<?php echo $m->id; ?>" ><?php echo $m->name; ?></option>
                                               <?php } ?>

                                            </select>
                                          </div>

                                          <input type="hidden" name="m_id" value="<?php echo $movie_id ?>">

                                          
                                            <div class="text-center w-75 pt-1">

                                                <button type="submit" class="header-btn mt-5">Next</button>
                                            </div>
                                    </form>
                            </div>
                            <div class="offset-md-1 col-md-3">
                                    <div class="mb-2 text-center">

                                        <img class="show-img " src="assets/img/movies/<?php echo $movie->img; ?>" alt="">
                                        <h2 class="show-title"><?php echo $movie->name; ?></h2>
                                      
                                    </div>
                            </div>
                        </div>
            </div>





    </section>








    <script src="assets/js/jquery-3.4.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/mine.js"></script>

</body>
</html>      