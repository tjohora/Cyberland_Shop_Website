<?php require 'includes/DB_connection.php';
session_start();

$productName = $_POST["productName"];
$productInfo = $_POST["productInfo"];
$productCost = $_POST["productCost"];
$productType = $_POST["productType"];
$productManufacturer = $_POST["productManufacturer"];
$productStock = $_POST["productStock"]; //variables are set

$query = "INSERT INTO product VALUES (NULL,:productName,:productInfo,:productCost,:productType,:productManufacturer, :productStock)"; //the NULL is the primary key and is set to AUTO-INCREMENT within the database
$statement = $db->prepare($query);
$statement->bindValue(":productName", $productName);
$statement->bindValue(":productInfo", $productInfo);
$statement->bindValue(":productCost", $productCost);
$statement->bindValue(":productType", $productType);
$statement->bindValue(":productManufacturer", $productManufacturer);
$statement->bindValue(":productStock", $productStock); //variables are sanitized
$statement->execute();					
$statement->closeCursor();

$_SESSION['message'] = "Successful! The new product has been added."; //message that appears when returned to the adminPage
echo("<script> window.location.replace('adminPage.php');</script>"); //script that brings us back to the adminPage
?>