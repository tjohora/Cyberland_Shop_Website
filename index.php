<?php require 'includes/DB_connection.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">       
        <link rel="stylesheet" type="text/css" href="css/common.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="icon" type="image/png" sizes="32x32" href="media/images/favicon.png">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function(){ //waits for page to load to run any scripts
                <?php include 'includes/common.js';?>
                <?php include 'includes/index.js';?>
            });
        </script>
        
        <title>CyberLand Home</title>
        
    </head>
    
    
    <body>
        <?php include 'includes/nav.php';?>
        
        <main id="content">
            <?php
            if (isset($_SESSION['signin_user'])) {//if this session is set, display the message
                echo '<p id=greeting> Welcome to Cyberland, ' . $_SESSION['signin_user'] . '! Hope you find what you are looking for today!</p>';
            }
            if(isset($_SESSION['message'])){ echo '<div class="goodDisplay">'. $_SESSION['message'] .'</div><br/>';unset($_SESSION['message']);}?>
            <!--In another page when ran, will set the message session, and when set, will display it and immediately unset. This allows for the message to disappear on refresh -->
            <div id="ads">
                <div>
                    <img class="adImg" src='media/images/ad1.png' alt="ad"/>  
                </div>
                <div>
                    <img class="adImg" src='media/images/ad2.png' alt="ad"/>
                </div>
                <div>
                    <img class="adImg" src='media/images/ad3.png' alt="ad"/>
                </div>
            </div><!-- div that contains other dives of ad banners-->
            
            <p id="timer"></p>
            <!-- Timer for the sales-->
            <?php
           $defineDate = "25/04/2018";//date of last update
           $DateNow = date("d/m/Y");//current date
           
           
           if($DateNow !== $defineDate){ //if date of last update is not the same as current date,run this
                $defineDate = $DateNow;// update date is now current date
                $query1 = 'SELECT product_ID FROM product';//select all product_ID from table product
                $statement = $db->prepare($query1);
                $statement->execute();			
                $all_queries1 = $statement->fetchAll();	
                $statement->closeCursor();
                
                //for($i=0;$i<=3;$i+1){
                   // $featuredItem.$i = $all_queries1[rand(1,count($all_queries1))][0];
                //}
                // attempt to using a loop to simplify code beneath this comment
                
                $featuredItem0 = $all_queries1[rand(1,count($all_queries1)-2)][0]; //a random product ID is set in a variable. The random number min=1,max=number of product ID's. 
                $featuredItem1 = $all_queries1[rand(1,count($all_queries1)-2)][0]; //the product ID is in an array, so the index is pulled and printed out
                $featuredItem2 = $all_queries1[rand(1,count($all_queries1)-2)][0]; //since arrays start at 0 and counts start at 1, we need to subtract from the count
                $featuredItem3 = $all_queries1[rand(1,count($all_queries1)-2)][0]; //all_queries1 is actually an array of arrays, however each array only has one element, so we have to pull the "first" element of each array, thus the [0] at the end of each line
                
                $query3 = 'UPDATE featured SET product_ID = :featuredItem0 WHERE featured_ID = 0; '
                        . 'UPDATE featured SET product_ID = :featuredItem1 WHERE featured_ID = 1; '
                        . 'UPDATE featured SET product_ID = :featuredItem2 WHERE featured_ID = 2; '
                        . 'UPDATE featured SET product_ID = :featuredItem3 WHERE featured_ID = 3'; 
                
                $statement = $db->prepare($query3);
                $statement->bindValue(':featuredItem0', $featuredItem0);
                $statement->bindValue(':featuredItem1', $featuredItem1);
                $statement->bindValue(':featuredItem2', $featuredItem2);
                $statement->bindValue(':featuredItem3', $featuredItem3);
                $statement->execute();						
                $statement->closeCursor();
                //updating featured table elemenst to new products
                }
                
            $query2 = 'SELECT product.product_ID,product.name,product.cost,manufacturer_name FROM product '
                    . 'INNER JOIN manufacturer ON product.manufacturer_ID = manufacturer.manufacturer_ID '
                    . 'INNER JOIN featured ON product.product_ID = featured.product_ID';
            $statement = $db->prepare($query2);
            $statement->execute();			
            $all_queries2 = $statement->fetchAll();			
            $statement->closeCursor(); 
            //select all details needed for the display, join with featured table to show only featured products
            
            foreach ($all_queries2 as $one_query2) :
                ?>
            
            <a href="productPage.php?product_ID=<?php echo $one_query2['product_ID'];?>"><div class="productDisplay" onclick="productPage.php">
                <div class="image"><img src="media/images/productID<?php echo $one_query2['product_ID'];?>-1.jpg" alt="Pic of product" width="200" height="120"></div>​
                    <?php echo "<h3 class='nameDisplay'>". $one_query2['name'] ."</h3>";?>
                    <?php echo "<p class='costDisplay'>€". $one_query2['cost'] ."</p><br/><br/>";?>
                    <?php echo "<p class='manufacturerDisplay'> Made by ". $one_query2['manufacturer_name'] ."</p>";?>
                </div>
            </a>
            <?php endforeach; 
            //all_queries2 is another array of arrays,however now each array has multiple elements. using a foreach allows for us to loop through each of these arrays and pull out the individual elements and display in whatever way we want
            ?>
            
            <br/><br/><br/><br/>
            
            
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4471.881951637783!2d-6.394266304810133!3d53.98145253080902!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4860cc141c2b808f%3A0xb715ddc5b28051!2sP.J.+Carroll+Building%2C+Dundalk+Rd%2C+Dundalk%2C+Co.+Louth!5e0!3m2!1sen!2sie!4v1524515914490" width="460" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            
            <iframe width="460" height="255" src="https://www.youtube.com/embed/ewUD4RquoEU?showinfo=0" frameborder="0" allowfullscreen style="float: right;"></iframe>
                    
            <footer>
                <?php include 'includes/footer.php';?>
            </footer>
        </main>
    </body>
</html>