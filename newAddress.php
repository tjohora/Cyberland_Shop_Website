<?php require 'includes/DB_connection.php';
session_start();

$newAddress = $_POST['newAddress'];
$username = $_SESSION['signin_ID'];

$query = 'UPDATE user_account SET user_address = :newAddress WHERE user_name=:username';
$statement = $db->prepare($query);
$statement->bindValue(':newAddress', $newAddress);//binding to sanatize the code/prevent sql attacks
$statement->bindValue(':username', $username);
$statement->execute();
$statement->closeCursor();

$_SESSION['userAddress'] = $newAddress; //sets the session variable to be the new address
$_SESSION['message'] = "Successful! You're Address has been updated."; // the message that appears when returned to the userPage
echo("<script> window.location.replace('userPage.php');</script>"); //scrpt that brings us back to the UserPage
?>