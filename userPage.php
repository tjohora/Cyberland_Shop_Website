<?php
require_once('includes/DB_connection.php');
if (isset($_POST['submit'])==NULL) {
        $theError = '';
        $baddata = 2;
    }
if ($baddata==1) {
	$theError = 'Wrong password.';
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">       
        <link rel="stylesheet" type="text/css" href="css/common.css"/>
        <link rel="stylesheet" type="text/css" href="css/userPage.css"/>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function(){//waits for page to load to run any scripts
                <?php include 'includes/common.js';?>
            });
        </script>
        
        <title>CyberLand Home</title>
       
    </head>
    <body>
        <?php include 'includes/nav.php';?>
        <main id="content">
            <div id="userStatus">
            <?php
                echo '<h1>' . $_SESSION['signin_user'] . '</h1>';
                if($_SESSION['userType']==1){
                    echo '<h3>Status: Admin</h3>';
                }else{
                    echo '<h3>Status: Member</h3>';
                }
            ?> 
                <a href="signout.php"><button class="userButton">Sign out</button></a>
                
                
                <?php if(isset($_SESSION['message'])){ echo '<div class="goodDisplay">'. $_SESSION['message'] .'</div>';unset($_SESSION['message']);}?>

                <div class="errorDisplay"><p><?php echo $theError; ?></p></div>  
            </div>
            
            <div id="userOptions">
            <h2>Change password</h2>
            
            <form action="newPassword.php" method='post'>
                <input type="password" id="psw" name="oldUserPW" maxlength="50" placeholder="Old Password" required/>
                <input type="password" id="newpsw" name="newUserPW" maxlength="50" placeholder="New Password"  pattern="(?=.*\d)[0-9a-zA-Z]+.{8,}" required/>
                <br/>
                <input class="userButton" id="newPasswordButton" type='submit' value='Change Password' name='submit' />
            </form>
            
            <br/><br/><br/>
            <h2>Change/Enter address</h2>
            <form action="newAddress.php" method="post">
                <input type="text"  name="newAddress" maxlength="100" value="<?php echo $_SESSION['userAddress']; ?>" required><br/>
                <input class="userButton" id="newAddressButton" type='submit' value='Submit New Address' name='submit' /><br/><br/><br/>
            </form>
            </div>
            <br/><br/><br/><br/>
            <footer>
                <?php include 'includes/footer.php';?>
            </footer>
        </main>
    </body>
</html>