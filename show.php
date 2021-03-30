<?php 
include 'core/init.php';

if (!isset($_SESSION['user_id'])) 
        header('location: login.php');

        $cinema_id = $_GET['c_id'];
        $movie_id = $_GET['m_id'];

        $cinema = Cinema::getData($cinema_id);
        $movie = Cinema::getMovie($movie_id);

        $username = User::getNameById($_SESSION['user_id']);


        $show_date = Cinema::getShowDate($cinema_id , $movie_id);
        $show_time = Cinema::getShowTime($cinema_id , $movie_id);






?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>YDAR | <?php echo $cinema->name; ?> Booking </title>
    
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

            <div class="container">
                        <div class="row">
                            <div class="col-md-12 div-height">
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
                            </div>

                            <div class="col-md-8">
                                    <form action="seats.php" method="POST">
                                        <div class="form-group pt-5">
                                         
                                            <select name="date" class="form-control show-select">
                                              <option selected disabled>Date of The Show</option>

                                              <?php foreach($show_date as $d) { ?>
                                              <option value="<?php echo $d->date; ?>" ><?php echo $d->date; ?></option>
                                               <?php } ?>

                                            </select>
                                          </div>

                                          <div class="form-group pt-5">
                                          
                                            <select name="time"  class="form-control show-select">
                                              <option selected disabled>Time Of The Show</option>

                                              <?php foreach($show_time as $t) { ?>
                                              <option value="<?php echo $t->id; ?>"><?php echo $t->time; ?></option>
                                               <?php } ?>
                                              
                                            </select>
                                          </div>
                                            <div class="text-center w-75 pt-1">

                                                <button type="submit" name="show" class="header-btn mt-5">Next</button>
                                            </div>
                                    </form>
                            </div>
                            <div class="offset-md-1 col-md-3">
                                    <div class="mb-2 text-center">

                                        <img class="show-img " src="assets/img/movies/<?php echo $movie->img; ?>" alt="">
                                        <h2 class="show-title"><?php echo $movie->name; ?></h2>
                                        <span class="show-span"><?php echo $cinema->name; ?></span>
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