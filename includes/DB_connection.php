<?php
$dsn = 'mysql:host=localhost;dbname=cyberland';
$username = 'root';
$password = '';
try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo "<h1>DATABASE PROBLEM: " . $error_message . ".</h1>";
exit();
}
?>
<!--Connection code to get into the database -->