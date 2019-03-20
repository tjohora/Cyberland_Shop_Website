<?php require 'includes/DB_connection.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">       
        <link rel="stylesheet" type="text/css" href="css/common.css">
        <link rel="stylesheet" type="text/css" href="css/productPage.css">
        <link rel="icon" type="image/png" sizes="32x32" href="media/images/favicon.png">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
        <script>
            <?php include 'includes/productPage.js';?>
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
            $product = $_GET['product_ID']; //gets a value for the URL
            $query = 'SELECT product.product_ID, product.name, product.info, product.cost, product_type.product_type_info, manufacturer.manufacturer_name,manufacturer.manufacturer_contact,manufacturer.manufacturer_contact_2, product.stock'
                    .' FROM ((product'
                    .' INNER JOIN manufacturer ON manufacturer.manufacturer_ID = product.manufacturer_ID)'
                    .' INNER JOIN product_type ON product_type.product_type_ID = product.product_type_ID)'
                    .' WHERE product.product_ID = :product';
            $statement = $db->prepare($query);
            $statement->bindValue(':product', $product);
            $statement->execute();
            $all_queries = $statement->fetchAll();			
            $statement->closeCursor();
            //SELECTS all the information about the product that the user has clicked on, since some details are found in other tables, INNER JOIN is needed to get them
            //since other tables are now being used, some tables could have the same name columns, so now we have to specify table first, then
            
            foreach ($all_queries as $one_query) :
            ?>
            <p id="name"> <?php echo $one_query['name']?></p>
            <div id="infoBox"><h3>Product Description:<br/></h3><p> <?php echo $one_query['info']?></p>
                <h3>Price:</h3><p id="cost"> €<?php echo $one_query['cost']?></p>
                <h3>Product Catagory:<br/></h3><p id="type"> <?php echo $one_query['product_type_info']?></p>
                <h3>Manufacturer:<br/></h3><p id="manufacturerName"> <?php echo $one_query['manufacturer_name']?></p>
                <h3>Contact details:<br/></h3><p id="manufacturerContact"> <?php echo $one_query['manufacturer_contact']?></p>
                <p id="manufacturerContact2"> <?php echo $one_query['manufacturer_contact_2']?></p>
                <h3>Stock:<br/></h3><p id="stock"> <?php echo $one_query['stock']?></p> 
            </div>
            <div id="thumbnailList">
                <img class="thumbnail" src="media/images/productID<?php echo $one_query['product_ID']?>-1.jpg" width="80" height="80" onmouseover="showElsewhere(this)" onmouseout="dontShow()"/>
                <img class="thumbnail" src="media/images/productID<?php echo $one_query['product_ID']?>-2.jpg" width="80" height="80" onmouseover="showElsewhere(this)" onmouseout="dontShow()"/>
                <img class="thumbnail" src="media/images/productID<?php echo $one_query['product_ID']?>-3.jpg" width="80" height="80" onmouseover="showElsewhere(this)" onmouseout="dontShow()"/>
                <img class="thumbnail" src="media/images/productID<?php echo $one_query['product_ID']?>-4.jpg" width="80" height="80" onmouseover="showElsewhere(this)" onmouseout="dontShow()"/>
            </div>
		<?php $_SESSION['productID'] = $one_query['product_ID']?>
		<br/><br/>
		<div id="bigPic"></div>
            
                <br/><br/><br/><br/>
                <form id="purchase" action="orderProduct.php" method="post">
                    
                    <?php 
                    if(!isset($_SESSION['signin_user'])){
                        echo '<h2>Sign in to buy stuff!</h2>';
                    }else{
                        if($one_query['stock'] >= 1){?>
                            <h3>Quantity:<br/></h3>
                            <input id="quantity" type="number" name="quantity" value="1" min="1" max="<?php echo $one_query['stock'] ?>" required><br/><br/>
                            <input class="userButton" type='submit' value='Add to Cart' name='submit' />
                        <?php
                        }
                        else{
                            echo '<h2>Sold out!</h2>';
                        }
                    }
                    endforeach; ?>
                </form>
                <br/><br/>
            
            <footer>
                <?php include 'includes/footer.php';?>
            </footer>
        </main>
    </body>
</html>