<?php require 'includes/DB_connection.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">       
        <link rel="stylesheet" type="text/css" href="css/common.css">
        <link rel="stylesheet" type="text/css" href="css/cart.css">
        <link rel="icon" type="image/png" sizes="32x32" href="media/images/favicon.png">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function(){ //waits for page to load to run any scripts
                <?php include 'includes/common.js';?>      
            });
        </script>
        
        <title>CyberLand Cart</title>
        
    </head>
    <body>
        <?php include 'includes/nav.php';?>
        <main id="content">
            
            <?php
            if(isset($_SESSION['orderID'])){//if the order ID session is set, the user must have added something to their cart from the productPage.php. Meaning we want a waty to display what the user has added to cart, so run this
            $orderID = $_SESSION['orderID'];
            $query = "SELECT product.product_ID, product.cost,product_order.quantity,product.name FROM product_order "
                    . "INNER JOIN product ON product.product_ID = product_order.product_ID "
                    . "WHERE product_order.order_ID = :orderID";
            
            $statement = $db->prepare($query);
            $statement->bindValue(":orderID", $orderID);
            $statement->execute();			
            $all_queries = $statement->fetchAll();			
            $statement->closeCursor();
            //select the details that are relevent to the user at this time
            
            foreach ($all_queries as $one_query) : ?>
            <div class="productCart">
                <br/>
                <img class="thumbnail" src="media/images/productID<?php echo $one_query['product_ID']?>-1.jpg" width="150" height="150"/>
                <h3><?php echo $one_query['name'];?></h3>
                <p>Quantity: <?php echo $one_query['quantity'];?></p>
                <p>Cost: €<?php echo $one_query['cost'];?></p>
            </div>
            <br/>
            <?php endforeach; 
            //each item with the order_ID specific to this userID and session will be displayed here
            ?>
            <audio controls="controls"><source src="media/audio/chaChing.mp3" /></audio>
            <a href="finishOrder.php"><button class="userButton">Complete Order!</button></a>
            <?php 
            
            
            }else{
                echo '<h2>You do not have anthing in your cart!</h2>';//         
            }?>
            
            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            
            
            <footer>
                <?php include 'includes/footer.php';?>
            </footer>
        </main>
    </body>
</html>