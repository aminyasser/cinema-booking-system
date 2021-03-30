
var myNav = document.getElementById('mynav');



const container = document.querySelector('.container-mine');
const seats = document.querySelectorAll('.row .seat:not(.occupied)');
const count = document.getElementById('num');
const total = document.getElementById('price');
const book = document.getElementById('book');



// array to add occuiped class for the seats come from database
occ_seats.forEach( function fun(element) {
        
  var l = "seat" + element.number;
  document.querySelector('[for=' + l +']').classList.toggle('occupied');

  }  
);

// array to add yours class for the seats come from database
your_seats.forEach( function fun(element) {
        
  var l = "seat" + element.number;
  document.querySelector('[for=' + l +']').classList.toggle('yours');
  
  }  
 );

        
    book.disabled = true;

  

container.addEventListener('click', function(e) {
   if (
     e.target.classList.contains('seat') &&
     !e.target.classList.contains('occupied')
   ) {

    
      
      
     e.target.classList.toggle('selected');
     book.disabled = false;
     

     var index=0;
     seats.forEach( function fun(element) {
      if (element.classList.contains('selected'))
         index++;
      }  
      
      
      );
      if(index == 0)
         book.disabled = true;
 
     updateSelectedCount();
   }
 });



 function updateSelectedCount() {
   const selectedSeats = document.querySelectorAll('.row .seat.selected');
 
   const selectedSeatsCount = selectedSeats.length;
 
   count.innerText = selectedSeatsCount + " seats";
   total.innerText = selectedSeatsCount * price + " LE";
 }



      




// navbar work

window.onscroll = function () { 
    if(window.scrollY <= 10) {
     myNav.classList.add("bg-transparent"); 
     myNav.classList.remove("all-nav");
     
    }
     else {
        myNav.classList.remove("bg-transparent"); 
        myNav.classList.add("all-nav");
     }
   


     console.log(myNav);
   

 
};

