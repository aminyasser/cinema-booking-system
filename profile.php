<?php 
    include 'core/init.php';
    
    if (isset($_SESSION['user_id']) == null) 
    header('location: login.php');


    $user_id = $_SESSION['user_id'];

    $user = User::getData($user_id);

    $user_categories = Category::getUserCategories($user_id);

    $booked_show = Seats::getBookedShow($user_id);
    $movies = Cinema::getUserMovies($user_id);
    
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>YDAR | <?php echo $user->name; ?></title>
    
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
                                    <?php echo $user->name; ?>
                            </a>
                            <div class="dropdown-menu nav-menu" aria-labelledby="navbarDropdown">
                            <a  class="dropdown-item nav-menu-item" href="#">Profile</a>
                            <a  class="dropdown-item nav-menu-item" href="index.php#cinema">Book</a>
                            <div class="dropdown-divider"></div>
                            <a style="color: #C34848;
                            font-size:17px;" class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt mr-2"></i></i>Logout </a>
                            </div>
                            </li>                  
                      </ul>
                      
                    </div>
                </div>
              </nav>
                    <div class="container">

              
                   <div class="row">
                        <div class="col-md-6 ">
                            <div class="container pt-4">

                                <div class="user-con py-3">
                                    <img class="user-img"  src="assets/img/undraw_profile_pic_ic5t (1).svg" alt="">
                                    <span style="color: aliceblue;" class="user-name">
                                            <?php echo $user->name; ?>
                                    </span>
                                    <div class="hlr"></div>
                                </div>
                                <div class="user-data">
                                        <div style="color: aliceblue;" class="row">

                                            
                                            <div class="col-md-3 text-center py-4"> <span class="user-data-item">Email</span>  </div>
                                            <div class="col-md-9 py-4 user-data-i ">
                                            <?php echo $user->email; ?>
                                            </div>
                                        

                                           
                                          

                                            <div class="col-md-3 text-center py-4"> <span class="user-data-item">Categories</span> </div>
                                            <div class="col-md-9 py-4 user-data-i mt-1">
                                                <div class="">

                                                    <?php if($user_categories != []) {
                                                     foreach($user_categories as $uc) { ?>
                                                    <div class="user-cat d-inline-block ">
                                                        <?php echo $uc->name; ?>
                                                    </div>
                                                     <?php } } else { ?>

                                                        No Categories yet 
                                                    <a href="index.php#categories">  <button class="button-cat">Add Categories</button> </a> 
                                                      <?php } ?>  

                                                     

                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12 text-center py-2"> <span class="user-data-item">Next Booked Shows</span>  </div>
                                            <div class="tickets">
                                            <?php
                                            
                                           
        
                                            
                                            if($booked_show != []) {
                                                 
                                            foreach($booked_show as $show) {?>
                                               
                                                <?php 
                                              
                                                $show_data = Seats::getShowData($show->show_id);
                                                $movie = Cinema::getMovie($show_data->movie_id);
                                                $cinema = Cinema::getData($show_data->cinema_id);
                                                $price = $show_data->price*$show->count; ?>
                                            <div class="col-md-12 text-center mt-2 py-1 user-data-i bg-user-booking ">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                    <?php 
                                                       echo "$show->count Seats | $show_data->date | $show_data->time |
                                                        $price LE";
                                                     ?>
                                                    </div>
                                                    <div class="col-md-12">
                                                    <?php 
                                                       echo " $movie->name | $cinema->name Cinema ";
                                                        ?>
                                               <a href="handle/handleCancelTicket.php?s_id=<?php echo $show->show_id; ?>">
                                               
                                                       <button class="button-seat">Cancel</button>
                                               
                                               </a>
                                                    </div>
                                                   
                                                </div>
                                        
                                                  
                                                    
                                            </div>

                                            <?php }  } else { ?>

                                                <div class="col-md-12 text-center mt-2 py-1 user-data-i bg-user-booking ">
                                                    <span> No Booked Tickets Yet</span>   
                                                </div>

                                          <?php } ?>

                                          </div>

                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                                <div class="container pt-4">
                                

                                        <img class="user-left" src="assets/img/undraw_profile_details_f8b7.svg" alt="">
                                   
                                </div>
                        </div>

                   </div>
                </div>
                    <!-- <div class="user-con">
                                    
                       

                    </div> -->

                    <!-- <img class="user-left" src="img/undraw_personal_info_0okl (1).svg" alt=""> -->
                   
            


        </section>




        <section id="movies" class="py-5">

<div class="container">
    <div class="row">
        <div class="cat-title-con col-md-12 text-center">
            <h2>YOUR MOVIES MATCH</h2>
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
                <a href="cinemaChoose.php?m_id=<?php echo $m->id; ?>">
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
    <script src="assets/js/mine.js"></script>

</body>
</html>    
