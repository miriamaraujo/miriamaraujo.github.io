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



    <title>Ger's Garage | Dashboard</title>
</head>

<body>
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

    <div class="user-prof">
        <img src="img/p4.jpg" alt="" width="90px" style="border-radius: 50%;">
        <h4><?php echo  $_SESSION['userName'] ?></h4>
        <a href="userdash.php" class="home-btn"><i class="fa fa-home" aria-hidden="true"></i></a>
        <a href="profile.php" class="profile-btn">My Profile</a>
        <a href="newbooking.php" class="new-book">+ New Booking</a>

    </div>


    <?php

    ?>


    <h3>My Profile</h3>
    <div class="flex-container">
        <div class="details" style="text-align: center;">
            <h4>Update Profile Details</h4>
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyfields") {
                    echo '<p>Empty fields, fill up the form to proceed!</p>';
                }
            }
            ?>
            <form action="includes/update.inc.php" method="POST">
                <input type="text" name="id" value="<?php echo $_SESSION['userId'] ?>" style="display: none;">
                <br><label for="n_name">Your Name</label><br>
                <input type="text" name="n_name" value="<?php echo $_SESSION['userName'] ?>">
                <br><label for="n_mail">Your e-mail</label><br>
                <input type="text" name="n_mail" value="<?php echo $_SESSION['userMail'] ?>">
                <br><label for="n_phone">Phone</label><br>
                <input type="text" name="n_phone" value="<?php echo $_SESSION['userPhone'] ?>">
                <br><label for="c_type">Vehicle Type</label><br>
                <input type="text" name="c_type" value="<?php echo $_SESSION['vehicleType'] ?>">
                <br><label for="c_make">Vehicle Make</label><br>
                <input type="text" name="c_make" value="<?php echo $_SESSION['vehicleMake'] ?>">
                <br><label for="c_eng">Vehicle Engine</label><br>
                <input type="text" name="c_eng" value="<?php echo $_SESSION['vehicleEngine'] ?>">
                <br><label for="l_details">Licence Details</label><br>
                <input type="text" name="l_details" value="<?php echo $_SESSION['licence'] ?>">
                <br><label for="n_address">Address</label><br>
                <input type="text" name="n_address" value="<?php echo $_SESSION['uAddress'] ?>">

                <select name="s_type" placeholder="Booking Type">
                    <option value="default">Service Type</option>
                    <option value="Annual Service">Annual Service</option>
                    <option value="Major Service">Major Service</option>
                    <option value="Repair Fault">Repair/Fault</option>
                    <option value="Major Repair">Major Repair</option>
                </select>
                <input type="submit" name="update-submit" value="Save Details">


            </form>
            
        </div>




    </div>






    <div class="footer">
        <h4>Sign-Up to be updated</h4>

        <div class="footer-container">
            <form action="includes/mkt.inc.php" method="POST">
                <input type="text" name="namemkt" placeholder="Name and Last Surname">
                <input type="text" name="emailmkt" placeholder="E-mail">
                <button type="submit" name="mktsubmit">Submit</button>
            </form>
        </div>
        <ul>
            <li><a href="https://www.facebook.com/cctcollegedublin" class="fa fa-facebook"></a>
                <a href="https://www.instagram.com/cctcollege/" class="fa fa-instagram"></a>
                <a href="https://www.linkedin.com/school/college-of-computer-training-cct" class="fa fa-linkedin"></a></li>
        </ul>
        <div class="footer-info">
            <p>CCT College Dublin</p>
            <p> 30 - 34 Westmoreland St. Dublin 2</p>
            <p>Ireland</p>
            <p> +353 1 6333444</p>
            <p> info@cct.ie</p>
        </div>


    </div>

    <script src="script.js"> </script>
</body>

</html>