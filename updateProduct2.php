<?php require 'includes/DB_connection.php';
session_start();

$productID = $_GET['product_ID'];
$productName = $_POST["productName"];
$productInfo = $_POST["productInfo"];
$productCost = $_POST["productCost"];
$productType = $_POST["productType"];
$productManufacturer = $_POST["productManufacturer"];
$productStock = $_POST["productStock"];

$query = "UPDATE product SET "
        . "name=:productName,"
        . "info=:productInfo,"
        . "cost=:productCost,"
        . "product_type_ID=:productType,"
        . "manufacturer_ID=:productManufacturer,"
        . "stock=:productStock"
        . " WHERE product_ID = :productID";
$statement = $db->prepare($query);

$statement->bindValue(":productName", $productName);
$statement->bindValue(":productInfo", $productInfo);
$statement->bindValue(":productCost", $productCost);
$statement->bindValue(":productType", $productType);
$statement->bindValue(":productManufacturer", $productManufacturer);
$statement->bindValue(":productStock", $productStock);
$statement->bindValue(":productID", $productID);
$statement->execute();			
$all_queries = $statement->fetchAll();			
$statement->closeCursor();

$_SESSION['message'] = "Successful! The product has been updated.";
echo("<script> window.location.replace('adminPage.php');</script>");


?>
