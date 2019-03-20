<?php
    if (isset($_POST['submit'])==NULL) {
        $theError = '';
        $baddata = 2;
    }
    if ($baddata==1) {
	$theError = 'This account already exists: try again';
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">       
        <link rel="stylesheet" type="text/css" href="css/common.css">
        <link rel="stylesheet" type="text/css" href="css/signUp.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function(){ //waits for page to load to run any scripts
                <?php include 'includes/signUp.js';?>
            });
        </script>
        
        <title>CyberLand Sign-in</title>
        
    </head>
    <body>
        <?php include 'includes/nav.php';?>
        <main id="content">
            <div id="signUpForm">
                <div class="errorDisplay"><?php echo $theError; ?></div>
                <form action="newUserCheck.php" method='post'>
                    <h1>Create an account</h1>
                    <p class="bigBold" >Having an account will allow you to save products to your cart!</p>

                    <h3>Enter your username</h3>
                    <input type="text" name="usernameSignup" maxlength="20" placeholder="Username" required pattern="[0-9a-zA-Z]+">

                    <h3>Enter your Password</h3>
                    <input type="password" id="psw" name="userPWSignup" maxlength="50" placeholder="Password"  pattern="(?=.*\d)[0-9a-zA-Z]+.{8,}" required>
                    <div id="message">
                        <h3>Password must contain the following:</h3>
                        <p id="number" class="invalid">At least one <b>number</b></p>
                        <p id="length" class="invalid">Minimum of <b>8 characters</b></p>
                        <p>(WebDev comment: <b>Please</b> do not use any passwords that you use for other accounts)</p>
                    </div>
                    
                    <!--
                    <h3>Re-enter your Password</h3>
                    <input type="password" maxlength="50" placeholder="Re-enter Password" required pattern="[0-9a-zA-Z]+">
                    -->
                    
                    <!--
                    <h3>Enter your Postal code/Eircode (Optional)</h3>
                    <input type="text" name="userAddress" maxlength="10" placeholder="Address" pattern="[0-9a-zA-Z]+">
                    -->
                    
                    <br/>
                    <br/>
                    <br/>

                    <input id="signupButton" type='submit' value='Create account' name='submit' />
                </form>
                <br/><br/>
                <p class="bigBold">Already have an account? <a href='signin.php'>Sign in here</a></p>
            </div>
            
            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            
            <footer>
                <?php include 'includes/footer.php';?>
            </footer>
        </main>
    </body>
</html>