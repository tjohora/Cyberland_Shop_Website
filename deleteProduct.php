<?php require 'includes/DB_connection.php';
    session_start();

$productID = $_GET['product_ID']; //this gets the value from the URL

$query = "DELETE FROM product WHERE product_ID=:productID";
$statement = $db->prepare($query);
$statement->bindValue(":productID", $productID);
$statement->execute();			
$all_queries = $statement->fetchAll();			
$statement->closeCursor();

$_SESSION['message'] = "Successful! The product has been deleted."; // the message that appears when returned to the admin page
echo("<script> window.location.replace('adminPage.php');</script>"); //script that returns us to the admin page
?>