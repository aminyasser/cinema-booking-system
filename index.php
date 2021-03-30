<?php 
include 'core/init.php';

if (isset($_SESSION['user_id'])) {
        $username = User::getNameById($_SESSION['user_id']);
        $user_id = $_SESSION['user_id'];
}

$categories = Category::getAll();


$cinemas = Cinema::getAll();




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>YDAR | Home</title>
    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" type="image/jpg" href="assets/img/ydar.jpg"> 




</head>
<body>
        <!-- Header Section -->

        <header id="header">

            <nav id="mynav" class="navbar navbar-expand-lg navbar-dark  position-fixed w-100">
                <div class="container">

                    <a class="navbar-brand" href="#">Y D A R</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                          <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#categories">Categories</a>
                          </li> 
                          <li class="nav-item">
                            <a class="nav-link" href="#">Cinema</a>
                          </li> 
                          <?php if (!isset($_SESSION['user_id'])) { ?>
                          <li class="nav-item">
                            <a style="color:#C34848; 
                            font-weight:800;" class="nav-link" href="login.php">Login</a>
                          </li> 
                          <?php } ?>
                          <?php if (isset($_SESSION['user_id'])) { ?>

                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle nav-account-item" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $username; ?>
                            </a>
                            <div class="dropdown-menu nav-menu" aria-labelledby="navbarDropdown">
                            <a  class="dropdown-item nav-menu-item" href="profile.php">Profile</a>
                            <a  class="dropdown-item nav-menu-item" href="#cinema">Book</a>
                            <div class="dropdown-divider"></div>
                            <a style="color: #C34848;
                            font-size:17px" class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt mr-2"></i></i>Logout </a>
                            </div>
                            </li>

                            <?php } ?>
                          <!-- <li class="nav-item">
                            
                            <button class="btn btn-primary nav-link">Login</button>
                          </li>  -->
                        
                      </ul>
                      
                    </div>
                </div>
              </nav>

              <div class="header-h-after">
                    
              </div>
              <div class="header-v-after">
                    
            </div>
              
                <div class="header-h-before before-animated-1 ">

                </div>
                <div class="header-v-before before-animated-2 ">

                </div>


              <div class="header-con text-center mt-1">
                <h1 class="mt-5">Cinema Booking</h1>
                <h1>System</h1>

         <a href="#cinema"><button class="header-btn header-btn-animate btn-header mt-5">Book Now</button></a> 
            
            </div>





        </header>
          
        <!-- End Header -->


        <!-- About Section -->

        <section id="about" class="">
           
          <div class="container">
                <div class="row">
                  <div class="col-md-6">
                      <div class="about-title">

                        <h3>About</h3>
                        <div class="hl2"></div>
                      </div>

                      <p class="pt-3">I am <span>AMIN YASSER </span> from Faculty of Science Alexandria University and this project for 
                        The web programing course.  </p> 
                        
                       
                        
                     <p>I try to make a Cinema Boking System named <span>Y D A R</span> </p>
                     <p> The system includes choocing the cinema and the movie and book your seat and add category to your account with authentication system.</p>




                  </div>
                  <div class="col-md-6">
                    <img src="assets/img/undraw_Booking_re_gw4j.svg" alt="">
                  </div>
                </div>

          </div>

      </section>

          <!-- End About Section -->
          

         <!-- Categories Section -->

        <section id="categories" class="py-5">
            <div class="container">

          
                <div class="row">
                  <div class="cat-title-con col-md-12 text-center">
                    <h2>Categories</h2>
                    <div class="hl"></div>
                  </div>
                </div>


                <div class="row py-5">

                    <?php foreach($categories as $c) { ?>
                  <div class="col-md-4 pt-3">
                     <div class="img-con position-relative">
                       
                       <img src="assets/img/category/<?php echo $c->img; ?>" alt="">

                       <div class="layo">
                            
                                <h3><?php echo $c->name; ?></h3>
                              
                              <?php if (User::checkLogIn()) { ?>  
                         <?php if(Category::checkIfUserHaveCategory($c->id , $user_id )) { ?>

                            <a href="handle/handleRemoveCategory.php?c_id=<?php echo $c->id; ?>">
                                <button class="bg-remove">Remove Category</button>
                            </a>  
                           <?php } else { ?> 
                            <a href="handle/handleAddCategory.php?c_id=<?php echo $c->id; ?>">
                                <button class="">Add Category</button>
                            </a>  
                            <?php } ?>
                            <?php } else { ?>
                              <a href="handle/handleAddCategory.php?c_id=<?php echo $c->id; ?>">
                                <button class="">Add Category</button>
                            </a>  
                            <?php } ?>

                             
                       </div>
                       
                     </div>
                  
                  </div>

                  <?php } ?>

              </div>
              
             

        </section>

        <!-- End Categories -->


        <!-- Cinemas Section -->
        <section id="cinema" class="py-5">
              <div class="container">
                <div class="row">
                  <div class="cat-title-con col-md-12 text-center">
                    <h6>MOST POPULAR</h6>
                    <h2>Cinemas</h2>
                    <div class="hl"></div>
                  </div>
                    

                    <?php foreach($cinemas as $cinema) {?>

                    <div class="col-md-4 pt-5">
                          
                      <div class="card">
                        <div class="card__side card__side--front">
                         <div class="card__img ">
                           <img src="assets/img/cinema/<?php echo $cinema->img; ?>" alt="">
                         </div>
                         
                        <h4 class="card__head">
                            <span class="card__head--top card__head--bg-1">
                                  <?php echo $cinema->name; ?>
                            </span>
                            <span class="card__head--foot card__head--bg-1">
                                  Cinema
                            </span>
                        </h4>
                       
                         <div class="card__content">
                              <ul>
                                  <li>4 movies showing per day</li>
                                  <li>up to 48 people</li>
                                  <li>3 times in day</li>
                                  <li>Vip tickets</li>
                                  
                              </ul>
                         </div>
                        </div>
                        <div class="card__side card__side--back card__side--back-1">
                            <div class="card__cta">
                                 <div class="card__book-box">
                                    <p class="card__book-title">Click to see the available movies</p>
                                   
                                </div>
                               

                        <a href="cinema.php?cinema_id=<?php echo $cinema->id; ?>">
                            <button class="header-btn btn-card">Book your seat Now!</button>
                        </a>   


                            </div>
                       </div>
                    </div>
                          
                    </div>
                  <?php } ?>


                </div>
              </div>
            
        </section>

        <!-- End Cinemas -->

       <footer id="foot">
             <p> &copy; All rights reserved to <span>AMIN YASSER</span> </p>
       </footer>


    

    <script src="assets/js/jquery-3.4.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/mine.js?v=<?php echo time(); ?>"></script>

</body>
</html>
