<?php 
require 'includes/DB_connection.php'; 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">       
        <link rel="stylesheet" type="text/css" href="css/common.css">
        <link rel="stylesheet" type="text/css" href="css/adminPage.css">
        <link rel="icon" type="image/png" sizes="32x32" href="media/images/favicon.png">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
        <script>
            
            <?php include 'includes/adminPage.js';?>
                
            $(document).ready(function(){ //waits for page to load to run any scripts
                <?php include 'includes/common.js';?>
            });
        </script>
        
        <title>CyberLand Admin Page</title>
        
    </head>
    
    
    <body>
        <?php include 'includes/nav.php';?>       
        <main id="content"><br/><br/><br/>
                <?php if(isset($_SESSION['message'])){ echo '<div class="goodDisplay">'. $_SESSION['message'] .'</div>';unset($_SESSION['message']);}?>
            <div id="userOptions">
            
                <br/><br/><br/>
                <h1 style=text-align:center>--------------ADMIN TOOLS--------------</h1>
                <br/><br/><br/>
                <h2>NEW PRODUCT</h2>
                <button class="userButton" onclick="showContents1()">Toggle Form View</button><br/><br/>

                <form class="hide" id="addForm" action="newProduct.php" method="post">
                    <h3>Product Name</h3>
                    <input type="text" name="productName" placeholder="Name" required/><br/><br/>

                    <h3>Product Info</h3>
                    <textarea id="productInfo" name="productInfo" placeholder="What is the product? What can it do? What makes it different? Really sell it!" required></textarea><br/><br/>

                    <h3>Product Cost</h3>
                    <input type="number" name="productCost" placeholder="Cost" required/><br/><br/>

                    <h3>Product Stock</h3>
                    <input type="number" name="productStock" placeholder="Stock" required><br/><br/>

                    <h3>Product Type</h3>
                    <?php
                    $query1 = 'SELECT * FROM product_type';
                    $statement = $db->prepare($query1);
                    $statement->execute();			
                    $all_queries1 = $statement->fetchAll();			
                    $statement->closeCursor(); 
                    //select all values for table product_type
                    ?>
                    <select name="productType" required>
                        <option value="">Select</option>
                    <?php foreach ($all_queries1 as $one_query1) :?>
                        <option value="<?php echo $one_query1['product_type_ID'];?>"><?php echo $one_query1['product_type_info'];?></option>
                    <?php endforeach
                    //foreach loop to insert all the product types as options in a select tag. this allows for new product types to be added without having to fix this if it was hard coded
                    ?>
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
                        <option value="">Select</option>
                    <?php foreach ($all_queries2 as $one_query2) :?>
                        <option value="<?php echo $one_query2['manufacturer_ID'];?>"><?php echo $one_query2['manufacturer_name'];?></option>
                    <?php endforeach
                    //same as the product types
                    ?>
                    </select><br/><br/>
                    <input class="userButton" id="newProduct" type='submit' value='Submit Product' name='submit' />
                </form>

                <h2>UPDATE/DELETE PRODUCT</h2><br/>

                <button class="userButton" onclick="showContents2()">Toggle Table View</button><br/><br/>  

                <table class="hide" id="updateTable" >
                   <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Info</th>   
                        <th>Cost</th>
                        <th>Manufacturer Name</th>
                        <th>Manufacturer Contact</th>
                        <th>Manufacturer Conatact 2</th>
                        <th>Stock</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr> 

                <?php
                $query2 = 'SELECT product.name, product.info, product.cost,product_type.product_type_ID, product_type.product_type_info,manufacturer.manufacturer_name,manufacturer.manufacturer_contact,manufacturer.manufacturer_contact_2, product.stock,product.product_ID'
                        . ' FROM ((product'
                        . ' INNER JOIN manufacturer ON manufacturer.manufacturer_ID = product.manufacturer_ID)'
                        . ' INNER JOIN product_type ON product_type.product_type_ID = product.product_type_ID)';  
                $statement = $db->prepare($query2);
                $statement->execute();
                $all_queries2 = $statement->fetchAll();			
                $statement->closeCursor();
                //select all details about a product

                    foreach ($all_queries2 as $one_query2) :
                    ?>
                    <tr>
                        <td> <?php echo $one_query2['product_ID']?></td>
                        <td> <?php echo $one_query2['name']?></td>
                        <td> <?php echo $one_query2['info']?></td>
                        <td> <?php echo $one_query2['cost']?></td>
                        <td> <?php echo $one_query2['manufacturer_name']?></td>
                        <td> <?php echo $one_query2['manufacturer_contact']?></td>
                        <td> <?php echo $one_query2['manufacturer_contact_2']?></td>
                        <td> <?php echo $one_query2['stock']?></td>
                        <td> <a href="updateProduct.php?product_ID=<?php echo $one_query2['product_ID'];?>">Update</a></td><!--The "?product_ID=" in the href allows us to take a value after the "=" in the URL by using the $_GET function in the next page.-->
                        <td> <a href="deleteProduct.php?product_ID=<?php echo $one_query2['product_ID'];?>">Delete</a></td><!--The value is determined by the one_query2 within the foreach loop-->
                    </tr>
                    
                <?php 
                endforeach;
                //display all products in a table so that the admin may review them and see if they need to be deleted or have it's details updated
                ?>
                </table>
            </div>
            <br/><br/><br/><br/>
            <footer>
                <?php include 'includes/footer.php';?>
            </footer>
        </main>
    </body>
</html>