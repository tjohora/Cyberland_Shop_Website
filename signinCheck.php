<?php require_once('includes/DB_connection.php');

$baddata = 0; //bad data set to 0 every run of this page

$username = $_POST['theUsername'];
$password = $_POST['thePassword'];

$query = "SELECT * FROM user_account WHERE user_name = :username";
$statement = $db->prepare($query);
$statement->bindValue(":username", $username);
$statement->execute();			
$all_queries = $statement->fetchAll();			
$statement->closeCursor();
//selecting all the usernames from the user_account table that is the same as the user input to see if it exists

$arrayLength = count($all_queries);
if ($arrayLength != 1) {
    $baddata = 1;// if the number of search results found is NOT 1, it means the search is not unique. BAD DATA
} else { //username exists and is unique, so now we check the password
    foreach ($all_queries as $one_query) : 
	$dbPassword = $one_query['user_pw'];
	$dbUserType = $one_query['user_type'];
        $dbUserAddress = $one_query['user_address'];
        $user_ID= $one_query['user_ID'];
    endforeach; //setting search results as variables
    
    if($dbPassword != $password){ //checking to see if the password is valid,run this if the database password does not match with the inputed one
        $baddata = 1; //if not, BAD DATA
    }else{
        session_start(); //start a session
        $_SESSION['userType'] = $dbUserType; 
        $_SESSION['signin_user'] = $username;
        $_SESSION['signin_password'] = $dbPassword;
        $_SESSION['user_ID'] = $user_ID; //session varibales set, until session is destroyed
        if($dbUserAddress = NULL){ // if the user has not made an address:
            $_SESSION['userAddress'] = "";//the session is set to blank
        }else{
            $_SESSION['userAddress']=$dbUserAddress;//otehrwise set it as a session variable
        }       
        if ($dbUserType == 1) {
            header("Location: index.php?user=" . $_SESSION['signin_user'] . "admin");
        } else if ($dbUserType == 0) {
            header("Location: index.php?user=" . $_SESSION['signin_user'] . "member");
        } else {
            header("Location: index.php?user=" . $_SESSION['signin_user'] . "unknown");
        } //depending on the user type, the url will appear different
    exit;   
    } 
}
if ($baddata == 1) {
    include ("signin.php");
}
?>