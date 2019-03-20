<?php 
require 'includes/DB_connection.php'; 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">       
        <link rel="stylesheet" type="text/css" href="css/common.css">
        <link rel="stylesheet" type="text/css" href="css/adminPage.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
        <script>
            
            <?php include 'includes/adminPage.js';?>
                
            $(document).ready(function(){ //waits for page to load to run any scripts
                <?php include 'includes/common.js';?>
            });
        </script>
        
        <title>CyberLand Home</title>
        
    </head>
    
    
    <body>
        <?php include 'includes/nav.php';?>
        
        <main id="content">
            <br/>
            <div id="userOptions">
            <?php
            $product = $_GET['product_ID'];
            $query = 'SELECT product.name, product.info, product.cost,product_type.product_type_ID, product_type.product_type_info,manufacturer.manufacturer_name,manufacturer.manufacturer_contact,manufacturer.manufacturer_contact_2, product.stock,product.product_ID'
                    . ' FROM ((product'
                    . ' INNER JOIN manufacturer ON manufacturer.manufacturer_ID = product.manufacturer_ID)'
                    . ' INNER JOIN product_type ON product_type.product_type_ID = product.product_type_ID)'
                    . ' WHERE product_ID=:product'; 
            $statement = $db->prepare($query);
            $statement->bindValue(':product', $product);
            $statement->execute();			
            $all_queries = $statement->fetchAll();			
            $statement->closeCursor();
            
            foreach ($all_queries as $one_query) :
            ?>
                <h2>UPDATING <?php echo $one_query['name'];?></h2>
                <form id="addForm" action="updateProduct2.php?product_ID=<?php echo $one_query['product_ID'];?>" method="post">
                    <h3>Product Name</h3>
                    <input type="text" name="productName" placeholder="Name" value="<?php echo $one_query['name'];?>" required/><br/><br/>
                    
                    <h3>Product Info</h3>
                    <textarea id="productInfo" name="productInfo" placeholder="What is the product? What can it do? What makes it different? Really sell it!"><?php echo $one_query['info'];?></textarea><br/><br/>
                    
                    <h3>Product Cost</h3>
                    <input type="number" name="productCost" placeholder="Cost"  value="<?php echo $one_query['cost'];?>"  required><br/><br/>
                    
                    <h3>Product Stock</h3>
                    <input type="number" name="productStock" placeholder="Stock" value="<?php echo $one_query['stock'];?>" required><br/><br/>
                    
                   
                    <h3>Product Type</h3>
                    <?php
                    $query1 = 'SELECT * FROM product_type';
                    $statement = $db->prepare($query1);
                    $statement->execute();			
                    $all_queries1 = $statement->fetchAll();			
                    $statement->closeCursor();
                    ?>
                    <select name="productType" required>
                        <option value="<?php echo $one_query['product_type_ID'];?>"><?php echo $one_query['product_type_info'];?></option>
                    <?php foreach ($all_queries1 as $one_query1) :?>
                        <option value="<?php echo $one_query1['product_type_ID'];?>"><?php echo $one_query1['product_type_info'];?></option>
                    <?php endforeach?>
                    </select><br/><br/>

                    <h3>Product Manufacturer</h3>
                    <?php
                    $query2 = 'SELECT `manufacturer_ID`,`manufacturer_name` FROM `manufacturer`';
                    $statement = $db->prepare($query2);
                    $statement->execute();			
                    $all_queries2 = $statement->fetchAll();			
                    $statement->closeCursor();
                    ?>
                    <select name="productManufacturer" required>
                        <option value="<?php echo $one_query['manufacturer_ID'];?>"><?php echo $one_query['manufacturer_name'];?></option>
                    <?php foreach ($all_queries2 as $one_query2) :?>
                        <option value="<?php echo $one_query2['manufacturer_ID'];?>"><?php echo $one_query2['manufacturer_name'];?></option>
                    <?php endforeach?>
                    </select><br/><br/>
                    <input class="userButton" id="updateButton" type='submit' value='Update Product' name='submit' />
                </form>
                <?php 
                    endforeach;
                ?>
                    
            </div>
            <br/><br/><br/><br/><br/><br/><br/><br/>
            <footer>
                <?php include 'includes/footer.php';?>
            </footer>
        </main>
    </body>
</html>