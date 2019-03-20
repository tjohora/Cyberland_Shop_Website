<?php require 'includes/DB_connection.php'; 

$baddata = 0; //baddata is set to 0 for everytime this page is run

$signupUsername = $_POST["usernameSignup"];
$signupUserPW = $_POST["userPWSignup"]; //variables are set

$query1 = "SELECT * FROM user_account WHERE user_name = :signupUsername"; //selecting all names that the user has entered
                
$statement = $db->prepare($query1);              
$statement->bindValue(":signupUsername",$signupUsername);
$statement->execute();	
$all_queries1 = $statement->fetchAll();
$statement->closeCursor();

$arrayLength = count($all_queries1);//counting how many elements there are in the all_queries1 array. This is so that we can see if the SELECT previously has found any names that match that the user has entered
echo("<script>alert('number of records: " . $arrayLength . ".');</script>"); //this alerts to the user if there are any matches with the name they entered

if ($arrayLength != 0){ // if the result returned is NOT 0(meaning it has to be 1 or more),BAD! Set baddata to 1 and bounce back to the signupPage to show error
    $baddata = 1;
} else{//if array length is 0, then the name is unique, which is good! run the INSERT
    $query2 = "INSERT INTO user_account VALUES (NULL,:signupUsername,:signupUserPW,0,NULL)"; //The NULL here is the user address which is allowed within database, the user can change this in the userPage
                
    $statement = $db->prepare($query2);              
    $statement->bindValue(":signupUsername",$signupUsername);
    $statement->bindValue(":signupUserPW",$signupUserPW);
    $statement->execute();	
    $statement->closeCursor();
    
    echo("<script> window.location.replace('signin.php');</script>"); //script to bring us to the signin page 
}
if ($baddata ==1){
    include("signUp.php"); //signup is included, now with baddata set to 1 to show error
}
?>