
var myNav = document.getElementById('mynav');







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

