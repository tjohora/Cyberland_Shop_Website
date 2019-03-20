<?php
if(!isset($sess)){
    session_start();
    $sess=1;
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
<a href="index.php"><img src="media/images/CyberLand_Banner.png" alt="Banner" class="banner"></a>


<nav id="navbar">

    <a href="index.php"><img src="media/images/CyberLand_Logo.png" alt="Logo" class="imageLink floatLeft" width="54" height="54"></a>

    
    <?php
    
    if (isset($_SESSION['signin_user'])) {
        if($_SESSION['userType']==1){
            echo '<a href="adminPage.php"><button class="rightButton" type="button">Admin<br/>commands</button></a>';
    }
        echo '<a href="userPage.php"><button class="rightButton" type="button">user account<br/> settings</button></a>';
        echo '<a href="cart.php"><img src="media/images/cart.png" alt="cart" class="cart"></a>';
    } else {
        echo '<a href="signin.php"><button class="rightButton" type="button">Sign in</button></a>';
    }
    
    ?>
    <ul>
        <li>
            <div class="dropdown">
                <button class="dropButton">Desktop</button>
                <div class="dropdownContent">
                    <a href="searchProduct.php?productSearch=1">Monitors</a>
                    <a href="searchProduct.php?productSearch=2">Keyboards</a>
                    <a href="searchProduct.php?productSearch=3">Mouse</a>
                </div>
            </div>
        </li>
        <li>
            <div class="dropdown">
                <button class="dropButton">Sound</button>
                <div class="dropdownContent">
                    <a href="searchProduct.php?productSearch=4">HeadPhones</a>
                    <a href="searchProduct.php?productSearch=5">Speakers</a>
                    <a href="searchProduct.php?productSearch=6">Microphones</a>
                </div>
            </div>   
        </li>
        <li>
            <div class="dropdown">
                <button class="dropButton">Accessories</button>
                <div class="dropdownContent">
                    <a href="searchProduct.php?productSearch=7">Mouse Mat</a>
                    <a href="searchProduct.php?productSearch=8">WebCam</a>
                    <a href="searchProduct.php?productSearch=9">Cables</a>
                    <a href="searchProduct.php?productSearch=10">Miscellaneous</a>
                </div>
            </div>   
        </li>
    </ul>
    <input type="image" class="menu" onclick="menuScript()" src="media/images/menuIcon.png"/>
    <form action="searchBarProduct.php" method="post">
        <input type="text" name="searchBar" placeholder="Search...">
        <input type="image" class="search" src="media/images/search.png"/>
    </form>
    
</nav>

<?php// if (isset($_SESSION['message'])) { ?>
    <!--<script type='text/javascript'>
        alert('<?php //echo $_SESSION["message"] ?>');
    </script>-->
    <?php
    //unset($_SESSION['message']);
//}
?>