<?php
session_start();
session_destroy(); //deletes all session variables
echo("<script>window.location.replace('index.php');</script>"); 
?>
