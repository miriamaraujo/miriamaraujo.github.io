<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie-edge" />
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css" />



    <title>Ger's Garage | Login</title>
</head>

<body>
    <header>
        <nav>
            <div class="logo"><a href="index.php">Ger's Garage</a></div>
            <ul class="nav-links">
            <li><a><i class="fa fa-phone" aria-hidden="true"></i>+353 1 6333444</a> </li>
                <li><a href="about.php"><i class="fa fa-car" aria-hidden="true"></i>About Us</a></li>
               
                <?php
                if (isset($_SESSION['userId'])) {

                    echo '<li><a href="userdash.php"><i class="fa fa-user-o" aria-hidden="true"></i>My Account</a></li>';
                    echo '<li><a href="includes/logout.inc.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>';
                } else {
                    echo '<li><a href="userdash.php"><i class="fa fa-user-o" aria-hidden="true"></i>My Account</a></li>';
                }

                ?>
                <li><a href="https://www.facebook.com/cctcollegedublin" class="fa fa-facebook"></a>
                    <a href="https://www.instagram.com/cctcollege/" class="fa fa-instagram"></a>
                    <a href="https://www.linkedin.com/school/college-of-computer-training-cct" class="fa fa-linkedin"></a></li>
            </ul>
            <div class="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav>
        <div class="flex-container">
            <div class="flex-div">
                <h3> Login here</h3>
                <form action="includes/login.inc.php" method="POST">
                    <input type="email" name="umail" placeholder="E-mail">
                    <input type="password" name="pwd" placeholder="Password">
                    <input type="submit" name="login-submit" value="Login">
                    <?php
                    if(isset($_GET["signup"])){
                        if($_GET["signup"] == "success"){
                            echo '<h4> Account created with success!</h4>
                            <h5> Login to continue</h5>';

                        }

                    }

                    ?>
                    <!-- <div class="rememberme">
                        <input type="checkbox" name="remember" id="remember"><label for="remember">Remember me </label>
                    </div> -->
                </form>
            </div>
            <div class="flex-div">
                <h3>Create Account</h3>
                <form action="includes/signup.inc.php" method="POST">
                    <input type="text" name="uname" placeholder="Username">
                    <input type="text" name="umail" placeholder="E-mail">
                    <input type="password" name="pwd" placeholder="Password">
                    <input type="password" name="pwd-repeat" placeholder="Confirm password">
                    <input type="submit" name="signup-submit" value="Create Account">
                </form>


                <?php
                // Displaying the error handling when creating new user
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyfields") {
                        echo '<p class="p-alert">Empty fields, check the form to proceed!</p>';
                    } else if ($_GET["error"] == "invalidmailname") {
                        echo '<p class="p-alert">Invalid username and e-mail!</p>';
                    } else if ($_GET["error"] == "invalidmail") {
                        echo '<p class="p-alert">Invalid e-mail!</p>';
                    } else if ($_GET["error"] == "passwordcheckname") {
                        echo '<p class="p-alert">Your passwords do not match!</p>';
                    } else if ($_GET["error"] == "usertaken") {
                        echo '<p class="p-alert">Sorry! Username is already taken!</p>';
                    }
                }


                ?>




            </div>
        </div>
    </header>
    <script src="script.js"> </script>
</body>

</html>