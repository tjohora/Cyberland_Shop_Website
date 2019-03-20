<?php require 'includes/DB_connection.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">       
        <link rel="stylesheet" type="text/css" href="css/common.css">
        <link rel="stylesheet" type="text/css" href="css/searchProduct.css">
        <link rel="icon" type="image/png" sizes="32x32" href="media/images/favicon.png">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function(){ //waits for page to load to run any scripts
                <?php include 'includes/common.js';?>
                
            });
        </script>
        
        <title>CyberLand Products</title>
        
    </head>
    
    
    <body>
        <?php include 'includes/nav.php';?>
        
        <main id="content">
            <?php
            $product = "%" . $_POST['searchBar'] . "%";
            $query = 'SELECT product.product_ID,product.name,product.cost,manufacturer_name FROM product '
                    . 'INNER JOIN manufacturer ON product.manufacturer_ID = manufacturer.manufacturer_ID '
                    . 'WHERE product.name LIKE :product';
            $statement = $db->prepare($query);
            $statement->bindValue(':product', $product);
            $statement->execute();			
            $all_queries = $statement->fetchAll();			
            $statement->closeCursor();
            
            $recordsFound =0;
            
            foreach ($all_queries as $one_query) :
            ?>            
            <a href="productPage.php?product_ID=<?php echo $one_query['product_ID'];?>"><div class="productDisplay" onclick="productPage.php">
                <div class="image"><img src="media/images/productID<?php echo $one_query['product_ID']?>-1.jpg" alt="Pic of product" width="200" height="120"></div>​
                <?php echo "<h3 class='nameDisplay'>". $one_query['name'] ."</h3>";?>
                <?php echo "<p class='costDisplay'>€". $one_query['cost'] ."</p><br/><br/>";?>
                <?php echo "<p class='manufacturerDisplay'> Made by ". $one_query['manufacturer_name'] ."</p>";?>
                </div>
            </a>
            <?php    
            $recordsFound++;
            endforeach;
            if ($recordsFound==1){
                echo '<p>1 product have been found.</p>';
            }else{
                echo '<p id="recordsFound">'. $recordsFound .' products have been found.</p>';
            }           
            ?>
            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            <br/><br/><br/><br/><br/>
            
            <footer>
                <?php include 'includes/footer.php';?>
            </footer>
        </main>
    </body>
</html>