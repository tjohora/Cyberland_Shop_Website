<?php require 'includes/DB_connection.php';
session_start();


$orderID = $_SESSION['orderID'];

$query1 = "SELECT product.product_ID, product_order.quantity,product.cost,product.stock FROM product_order "
        . "INNER JOIN product ON product_order.product_ID = product.product_ID "
        . "WHERE product_order.order_ID = :orderID";

$statement = $db->prepare($query1);
$statement->bindValue(":orderID", $orderID);
$statement->execute();
$all_queries1 = $statement->fetchAll();
$statement->closeCursor();

$cost = 0;

foreach ($all_queries1 as $one_query1) :    
$newStock = $one_query1['stock'] - $one_query1['quantity'];
$cost += $one_query1['cost']*$one_query1['quantity'];

$productID = $one_query1['product_ID'];

$query3 = "UPDATE product SET stock = :newStock "
        . "WHERE product_ID = :productID";
$statement = $db->prepare($query3);
$statement->bindValue(":productID", $productID);
$statement->bindValue(":newStock", $newStock);
$statement->execute();
$statement->closeCursor();
endforeach;

$query2 = 'UPDATE an_order SET total_cost = :cost,date = NOW() WHERE order_ID = :orderID';
$statement = $db->prepare($query2);
$statement->bindValue(':cost', $cost);
$statement->bindValue(':orderID', $orderID);
$statement->execute();			
$all_queries2 = $statement->fetchAll();			
$statement->closeCursor();


$_SESSION['message'] = "Thank you for purchasing at Cyberland! Your goods will arrive never!";
unset($_SESSION['orderID']);
echo("<script> window.location.replace('index.php');</script>");


//(new stock) = stock - quantity
//update product.stock to (new stock)





?>