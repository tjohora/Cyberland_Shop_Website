//timer countdown loop
setInterval(function time(){ //sets the function to run in intervals of 1000ms(1s)
var now = new Date(); //getting the current time
var hours = 23 - now.getHours(); //using the current time to minus from a full 24 hours to show the remaining time of the day
var min = 60 - now.getMinutes(); // same as the hours to get remianing minutes of the hour
if((min + '').length === 1){
    min = '0' + min;
} //this is to attach a '0' to the left of the number if it starts to show single digits eg "03m" instead of "3m"
var sec = 60 - now.getSeconds();
if((sec + '').length === 1){
    sec = '0' + sec;
    }
jQuery('#timer').html(hours+'h '+min+'m '+sec+"s "+" until the next sale!") //displays the timer

if(hours===0&&min===0&&sec===0){
    //run something to get 4 random products from database and display with sale
    };
}, 1000);

//banner slide show
$("#ads div:gt(0)").hide();
setInterval(function() { 
$('#ads div:first')
.fadeOut(1000)
.next()
.fadeIn(1000)
.end()
.appendTo('#ads');
},6000);

/*var adNum =1;
//banner ad change every 10s
setInterval(function(){
var adInsert="";
adNum+=1;
if (adNum > 3){
    adNum=1;
}
adInsert = "<img src='media/images/ad"+adNum+".png'/>";
document.getElementById('ad').innerHTML = adInsert;
},5000);*/



