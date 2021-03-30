<?php
include 'core/init.php';

if (!isset($_SESSION['user_id'])) 
        header('location: login.php');

        $show_details = Seats::getShowData($_POST['time']);
        $movie = Cinema::getMovie($show_details->movie_id);
        $cinema = Cinema::getData($show_details->cinema_id);

        $username = User::getNameById($_SESSION['user_id']);

        $occ_seats = Seats::getOccupiedSeats($show_details->id);
        $your_seats = Seats::getYourSeats($show_details->id);


        $cat = Category::getAll();




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>YDAR | Choose Seat</title>
    
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
                                            <div class="steps p-2">
                                                <i style="font-size: 40px;" class="fas fa-dice-one step-i"></i>
                                                <span class="step-title d-inline-block ">Choose Your Show</span>
                                                
                                            </div>
                                            <div class="steps p-2 form-active">
                                                <i style="font-size: 40px;" class="fas fa-dice-two step-i"></i>
                                                <span class="step-title d-inline-block ">Choose Your Seats</span>
                                                
                                            </div>
                                        </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="container container-mine ">

                                    
                                        <ul class="showcase">
                                            <li>
                                              <div class="seat-li"></div>
                                              <small>N/A</small>
                                            </li>
                                            <li>
                                              <div class="seat selected-li"></div>
                                              <small>Selected</small>
                                            </li>
                                            <li>
                                              <div class="seat occupied"></div>
                                              <small>Occupied</small>
                                            </li>
                                            <li>
                                              <div class="seat yours"></div>
                                              <small>Yours</small>
                                            </li>
                                          </ul>
                                          <div class="seats-con py-3 text-center">
                                        <div class="screen"> </div>
                                        <div class="row">

                                      <form action="handle/handleSeats.php?show=<?php echo $show_details->id; ?>" 
                                        method="POST">
                                        
                                            
                                        
                                            <div class="col-md-12 text-center">

                                          
                                              
                                          

                                            
                                            <label  for="seat1" class="seat" name="seat[]">
                                            </label>
                                            <input id="seat1" type="checkbox" name="seat[]" value="1">
                                            </input>

                                           
                                          
                                            <label  for="seat2" class="seat" name="seat[]" ></label>
                                            <input id="seat2" type="checkbox" name="seat[]" value="2"></input>
                                            <label for="seat3" class="seat" name="seat[]" ></label>
                                            <input id="seat3" type="checkbox" name="seat[]" value="3"></input>
                                            <label for="seat4" class="seat" name="seat[]" ></label>
                                            <input id="seat4" type="checkbox" name="seat[]" value="4"></input>
                                            <label for="seat5" class="seat" name="seat[]" ></label>
                                            <input id="seat5" type="checkbox" name="seat[]" value="5"></input>
                                            <label for="seat6" class="seat" name="seat[]" ></label>
                                            <input id="seat6" type="checkbox" name="seat[]" value="6"></input>
                                            <label for="seat7" class="seat" name="seat[]"></label>
                                            <input id="seat7" type="checkbox" name="seat[]" value="7"></input>
                                            <label for="seat8" class="seat" name="seat[]"></label>
                                            <input id="seat8" type="checkbox" name="seat[]" value="8"></input>
                                            <label for="seat9" class="seat" name="seat[]"></label>
                                            <input id="seat9" type="checkbox" name="seat[]" value="9"></input>
                                            <label for="seat10" class="seat" name="seat[]"></label>
                                            <input id="seat10" type="checkbox" name="seat[]" value="10"></input>
                                            <label for="seat11" class="seat" name="seat[]"></label>
                                            <input id="seat11" type="checkbox" name="seat[]" value="11"></input>
                                            <label for="seat12" class="seat" name="seat[]"></label>
                                            <input id="seat12" type="checkbox" name="seat[]" value="12"></input>
                                            </div>

                                            <div class="col-md-12">
                                            <label for="seat13" class="seat" name="seat[]"></label>
                                            <input id="seat13" type="checkbox" name="seat[]" value="13"></input>
                                            <label for="seat14" class="seat" name="seat[]"></label>
                                            <input id="seat14" type="checkbox" name="seat[]" value="14"></input>
                                            <label for="seat15" class="seat" name="seat[]"></label>
                                            <input id="seat15" type="checkbox" name="seat[]" value="15"></input>
                                            <label for="seat16" class="seat" name="seat[]"></label>
                                            <input id="seat16" type="checkbox" name="seat[]" value="16"></input>
                                            <label for="seat17" class="seat" name="seat[]"></label>
                                            <input id="seat17" type="checkbox" name="seat[]" value="17"></input>
                                            <label for="seat18" class="seat" name="seat[]"></label>
                                            <input id="seat18" type="checkbox" name="seat[]" value="18"></input>
                                            <label for="seat19" class="seat" name="seat[]"></label>
                                            <input id="seat19" type="checkbox" name="seat[]" value="19"></input>
                                            <label for="seat20" class="seat" name="seat[]"></label>
                                            <input id="seat20" type="checkbox" name="seat[]" value="20"></input>
                                            <label for="seat21" class="seat" name="seat[]"></label>
                                            <input id="seat21" type="checkbox" name="seat[]" value="21"></input>
                                            <label for="seat22" class="seat" name="seat[]"></label>
                                            <input id="seat22" type="checkbox" name="seat[]" value="22"></input>
                                            <label for="seat23" class="seat" name="seat[]"></label>
                                            <input id="seat23" type="checkbox" name="seat[]" value="23"></input>
                                            <label for="seat24" class="seat" name="seat[]"></label>
                                            <input id="seat24" type="checkbox" name="seat[]" value="24"></input>
                                            </div>

                                            <div class="col-md-12">
                                            <label for="seat25" class="seat" name="seat[]"></label>
                                            <input id="seat25" type="checkbox" name="seat[]" value="25"></input>
                                            <label for="seat26" class="seat" name="seat[]"></label>
                                            <input id="seat26" type="checkbox" name="seat[]" value="26"></input>
                                            <label for="seat27" class="seat" name="seat[]"></label>
                                            <input id="seat27" type="checkbox" name="seat[]" value="27"></input>
                                            <label for="seat28" class="seat" name="seat[]"></label>
                                            <input id="seat28" type="checkbox" name="seat[]" value="28"></input>
                                            <label for="seat29" class="seat" name="seat[]"></label>
                                            <input id="seat29" type="checkbox" name="seat[]" value="29"></input>
                                            <label for="seat30" class="seat" name="seat[]"></label>
                                            <input id="seat30" type="checkbox" name="seat[]" value="30"></input>
                                            <label for="seat31" class="seat" name="seat[]"></label>
                                            <input id="seat31" type="checkbox" name="seat[]" value="31"></input>
                                            <label for="seat32" class="seat" name="seat[]"></label>
                                            <input id="seat32" type="checkbox" name="seat[]" value="32"></input>
                                            <label for="seat33" class="seat" name="seat[]"></label>
                                            <input id="seat33" type="checkbox" name="seat[]" value="33"></input>
                                            <label for="seat34" class="seat" name="seat[]"></label>
                                            <input id="seat34" type="checkbox" name="seat[]" value="34"></input>
                                            <label for="seat35" class="seat" name="seat[]"></label>
                                            <input id="seat35" type="checkbox" name="seat[]" value="35"></input>
                                            <label for="seat36" class="seat" name="seat[]"></label>
                                            <input id="seat36" type="checkbox" name="seat[]" value="36"></input>
                                            </div>

                                            <div class="col-md-12">
                                            <label for="seat37" class="seat" name="seat[]"></label>
                                            <input id="seat37" type="checkbox" name="seat[]" value="37"></input>
                                            <label for="seat38" class="seat" name="seat[]"></label>
                                            <input id="seat38" type="checkbox" name="seat[]" value="38"></input>
                                            <label for="seat39" class="seat" name="seat[]"></label>
                                            <input id="seat39" type="checkbox" name="seat[]" value="39"></input>
                                            <label for="seat40" class="seat" name="seat[]"></label>
                                            <input id="seat40" type="checkbox" name="seat[]" value="40"></input>
                                            <label for="seat41" class="seat" name="seat[]"></label>
                                            <input id="seat41" type="checkbox" name="seat[]" value="41"></input>
                                            <label for="seat42" class="seat" name="seat[]"></label>
                                            <input id="seat42" type="checkbox" name="seat[]" value="42"></input>
                                            <label for="seat43" class="seat" name="seat[]"></label>
                                            <input id="seat43" type="checkbox" name="seat[]" value="43"></input>
                                            <label for="seat44" class="seat" name="seat[]"></label>
                                            <input id="seat44" type="checkbox" name="seat[]" value="44"></input>
                                            <label for="seat45" class="seat" name="seat[]"></label>
                                            <input id="seat45" type="checkbox" name="seat[]" value="45"></input>
                                            <label for="seat46" class="seat" name="seat[]"></label>
                                            <input id="seat46" type="checkbox" name="seat[]" value="46"></input>
                                            <label for="seat47" class="seat"  name="seat[]"></label>
                                            <input id="seat47" type="checkbox" name="seat[]" value="47"></input>
                                            <label for="seat48" class="seat" name="seat[]"></label>
                                            <input id="seat48" type="checkbox" name="seat[]" value="48"></input>
                                            </div>
                                           
                                          
                                       
                                        </div>

                                        </div>
                                        <span class="seat-final-span d-inline-block mt-2">You have selected 
                                            <span id="num" class="seat-price"> 0 seats </span>
                                            with <span id="price" class="seat-price"> 0 LE</span>  price </span>
                                        <button id="book" type="submit" class="header-btn btn-seat" >Book Ticket Now!</button>
                                        </form>  
                                    </div>
                            </div>
                            <div class="offset-md-1 col-md-3">
                                    <div class="mb-2 text-center">

                                <img class="show-img " src="assets/img/movies/<?php echo $movie->img; ?> " alt="">
                                <h2 class="show-title"><?php echo $movie->name; ?> Movie</h2>
                                <span class="show-span"><?php echo $cinema->name; ?>  Cinema</span>
                                    </div>
                            </div>
                        </div>
            </div>





    </section>




      <script>
          
      </script>



    <script src="assets/js/jquery-3.4.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript"> var price = <?php echo json_encode($show_details->price);  ?>; 
     var occ_seats = <?php echo json_encode($occ_seats); ?>;
     var your_seats = <?php echo json_encode($your_seats); ?>;

     </script>
    <script src="assets/js/seats.js?v=<?php echo time(); ?>">
    </script>

</body>
</html>      