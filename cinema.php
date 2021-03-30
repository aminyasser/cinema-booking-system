<?php 
include 'core/init.php';

if (!isset($_SESSION['user_id'])) 
        header('location: login.php');

       $cinema_id = $_GET['cinema_id'];
      $cinema =   Cinema::getData($cinema_id);

      $user_id = $_SESSION['user_id'];
      $username = User::getNameById($_SESSION['user_id']);


      $movies = Cinema::getCinemaMovies($cinema_id);
        
        
        

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>YDAR | <?php echo $cinema->name; ?> </title>
    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" type="image/jpg" href="assets/img/ydar.jpg"> 



</head>
<body>

        
  <section style="background: linear-gradient( rgba(1, 1, 1 , .7) , rgba(1, 1, 1 ,.8) ) , 
  url('assets/img/cinema/<?php echo $cinema->img; ?>');
  background-size: 100% 100%;
  background-position: center center;" id="login">
            
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

                
            <div class="cinema-con">
                    <h1 style="color: aliceblue;">Welcome to</h1>
                    <h1 style="color: aliceblue;"><?php echo $cinema->name; ?> Cinema</h1>

                 <a href="#movies"> <button class="header-btn my-5">  Show Available Movies <i class="fas fa-arrow-circle-down"></i></button></a>  

            </div>



        </section>
        <section id="movies" class="py-5">

                <div class="container">
                    <div class="row">
                        <div class="cat-title-con col-md-12 text-center">
                            <h2>Available Movies</h2>
                            <div class="hl"></div>
                        </div>
                    </div>
                       
                    <div class="row pt-5">
                    <?php foreach($movies as $m) {
                      $category = Category::getData($m->category_id); ?>

                        <div class="col-md-3 pt-2">
                            <div class="movie-con text-center">
                                
                                <img class="movie-h" src="assets/img/movies/<?php echo $m->img; ?>" alt="">
                                <div class="layo-movie">
                                     <h3><?php echo $m->name; ?></h3>
                                     <h6><?php echo $category->name; ?></h6>
                                <a href="show.php?c_id=<?php echo $cinema_id; ?>&m_id=<?php echo $m->id; ?> ">
                                <button class="header-btn btn-movie">Book Your Seat</button>
                                </a> 
                                </div>
                            </div>
                        </div>
                                <?php } ?>

                        
                    </div>
                </div>

        </section>
      


        <script src="assets/js/jquery-3.4.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/mine.js?v=<?php echo time(); ?>"></script>


</body>
</html>      