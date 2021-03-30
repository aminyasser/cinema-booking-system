<?php 

include '../core/init.php';


if (!User::checkLogIn())
        header('location: ../login.php');
 
    if (isset($_POST['seat'])) {

        $show_id = $_GET['show'];
        $show = Seats::getShowData($show_id);
        $movie = Cinema::getMovie($show->movie_id);
        $category = Category::getData($movie->category_id);
        
        foreach($_POST['seat'] as $seat) {
                
                $data = [
                'show_id' => $show_id ,
                'user_id' => $_SESSION['user_id'] ,     
                'number' => $seat   
                ];
                                
                Seats::create('seats' , $data );
        }
        
        // add category to user categories and then reload to profile
        header('location: handleAddCategory.php?c_id=' . $category->id)  ;

   } 

       

        
