<?php
if(!isset($sess)){ //check to see if the session has started, if the varibale "$sess" has NOT been set, the a seesion hasnt started yet, meaning run this function 
    session_start(); //session has started
    $sess=1; //$sess has been started. This is so that if baddata is given a value and bounced us back to userPage, the session in the nav include wont give us an arror for starting another session in one page
}

require_once('includes/DB_connection.php');

$baddata = 0;//baddata is set to 0 at the start for every run of this page

$oldPassword = $_POST['oldUserPW'];
$newPassword = $_POST['newUserPW'];//variables set for what was posted from the page previously

if($_SESSION['signin_password'] != $oldPassword) { //if the old password does not match with what the user had entered, baddata is set to one and bounces us back to userPage
    $baddata = 1;
}else{ //if they do match, run this
$query = "UPDATE user_account SET user_pw = :newPassword WHERE user_name = :username";
$statement = $db->prepare($query);
$statement->bindValue(":username", $_SESSION['signin_user']);
$statement->bindValue(":newPassword", $newPassword);
$statement->execute();					
$statement->closeCursor();
$_SESSION['signin_password']=$newPassword; //the session variable is now set to the new password in case the user wishes to chage the password again
$_SESSION['message']="Your password has been successfully changed!"; //message that is printed when returned to the userPage
echo("<script> window.location.replace('userPage.php');</script>");  //script that brings us back to the userPage
}

if ($baddata == 1) {
    include ("userPage.php"); //bounce back code that includes the entirety of the userPage.php, but now baddata is set to 1, displaying an error message
}