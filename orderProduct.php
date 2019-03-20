<?php require 'includes/DB_connection.php';//page to add products to the cart
session_start();

$userID = $_SESSION['user_ID'];

if(!isset($_SESSION['orderID'])){//if the orderID session is NOT set, then we need to make one, meaning run this
    
    $query1 = "INSERT INTO an_order VALUES (NULL,NOW(),0,:userID)";//NULL is an AUTO-INCREMENT primary key,NOW() is an SQL function that gets the current date,0 is cost that will be calculated when the order is finished

    $statement = $db->prepare($query1);
    $statement->bindValue(":userID", $userID);
    $statement->execute();
    $statement->closeCursor();

    $query2 = "SELECT MAX(order_ID) AS orderID FROM an_order WHERE user_ID = :userID"; //MAX finds the highest integer from the order_ID column made by the current user and calls and is goven the name "orderID" using AS
    $statement = $db->prepare($query2);
    $statement->bindValue(":userID", $userID);
    $statement->execute();
    $all_queries2 = $statement->fetchAll();	
    $statement->closeCursor();

    foreach ($all_queries2 as $one_query2) : 
        $_SESSION['orderID'] = $one_query2['orderID'];//sets the orderID as a session variable
    endforeach;
    //this whole process basically lets us crate a new order in the "an_order" table, so that we may update later when all orders are finalized.
    //The orderID is set to a session so that any product ordered by the user will have it set ti the same Order ID 
}else{}

$productID = $_SESSION['productID'];
$quantity = $_POST['quantity'];
$orderID = $_SESSION['orderID'];

$query3 = "INSERT INTO product_order VALUES (:quantity,:productID,:orderID)";
$statement = $db->prepare($query3);
$statement->bindValue(":quantity", $quantity);
$statement->bindValue(":productID", $productID);
$statement->bindValue(":orderID", $orderID);
$statement->execute();					
$statement->closeCursor(); 


echo("<script> window.location.replace('cart.php');</script>"); //return us to cart page

?>
    
