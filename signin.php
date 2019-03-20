<?php
if (isset($_POST['submit'])==NULL) {
    $theError = '';	
    $baddata = 2;
}

if ($baddata==1) {
    $theError = 'Either the username or password is incorrect';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">       
        <link rel="stylesheet" type="text/css" href="css/common.css">
        <link rel="stylesheet" type="text/css" href="css/signin.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function(){ //waits for page to load to run any scripts
                <?php include 'includes/common.js';?>
            });
        </script>
        
        <title>CyberLand Sign-in</title>
        
    </head>
    
    
    <body>
        <?php include 'includes/nav.php';?>
        <main id="content">
            <div id="signInContent">
                <h1>Sign-in</h1>
                <div id="errorDisplay"><?php echo $theError; ?></div>
                
                <form action="signinCheck.php" method="post">
                    <input type="text" name="theUsername" maxlength="30" id="userName" placeholder="Username">
                    <br/>
                    <input type="password" name="thePassword" id="userPassword" placeholder="Password">
                    <br/><br/>
                    <input id="signinButton" type='submit' value='Sign in' name='submit' />
		</form>
                
                <p class="bigBold">Don't have an account? <a href='signUp.php'>Sign up here</a></p>
            </div>
            
            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            

            <footer>
                <?php include 'includes/footer.php';?>
            </footer>
        </main>
    </body>
</html>