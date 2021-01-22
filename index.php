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



    <title>Ger's Garage | Home Page</title>
</head>

<body>

    <header style="background-image:url('img/8960.jpg');">


        <div class="overlay"></div>
        <nav>
            <div class="logo"><a href="index.php"> Ger's Garage</a></div>

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

        <div class="booking-home">
            <h2>Welcome to Ger's Garage</h2>
            <h3>Your accountable place</h3>
            <form action="userdash.php">
                <button type="submit"> Make an appoitment with us <i class="fa fa-chevron-right" aria-hidden="true"></i></button>
            </form>
        </div>
        <!-- maybe add contact -->

    </header>

    <script src="script.js"> </script>

</body>

</html>