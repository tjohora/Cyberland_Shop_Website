//sticky navbar script
window.onscroll = function() {stickyNavbar();};//runs the function when window is scrolled
var navbar = document.getElementById("navbar"); 
var content = document.getElementById("content");//setting variables
var sticky = navbar.offsetTop;
function stickyNavbar() { //function that is always running for the actual sticky navbar
if (window.pageYOffset >= sticky) { //if the page is scrolled down enough, it will run this if statement
    navbar.classList.add("sticky"); //adds the class to the navbar that allows it to be 'stuck to the top of the screen'
    content.classList.add("content"); //allows the text to move aswell to prevent a jump in the main to happen
} else {
    navbar.classList.remove("sticky");
    content.classList.remove("content");//if the navbar isnt scrolled enough, remove the classes
    }
}

//search bar focus/blur script
$("input").focus(function(){ //when the search bar is focused, it will run this function
    $(this).css("background-color", "#cccccc"); //changes color of the search box
});
$("input").blur(function(){
    $(this).css("background-color", "#ffffff");
});

