function showElsewhere(x) {
    document.getElementById("bigPic").style.visibility="visible";
    document.getElementById("bigPic").innerHTML = "<img src='" + x.src + "' width='350' height='500' />";				
}
function dontShow() {
    //document.getElementById("bigPic").style.visibility="hidden";			
    document.getElementById("bigPic").innerHTML = "";			
}