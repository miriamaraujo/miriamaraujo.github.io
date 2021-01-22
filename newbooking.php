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

    <h3>New Appointment</h3>
    <div class="flex-container">
            <div class="details" style="text-align: center;">
            <?php
            if (isset($_GET["booking"])) {
                if ($_GET["booking"] == "success") {
                    echo '<h4> Booking Successful!<h4>';
                }
            }
            ?>
            <form action="includes/booking.inc.php" method="POST">

                <input type="text" name="id" value="<?php echo $_SESSION['userId'] ?>" style="display: none;">
                <input type="text" name="fname" value="<?php echo $_SESSION['userName'] ?>"> <!-- I tried to swapping placeholder for value storing the info from the user in the database with the variable session -->
                <input type="text" name="umail" value="<?php echo $_SESSION['userMail'] ?>">
                <input type="tel" name="uphone" value="<?php echo $_SESSION['userPhone'] ?>">
                <input type="text" name="cmake" value="<?php echo $_SESSION['vehicleMake'] ?>">
                <input type="text" name="cengine" value="<?php echo $_SESSION['vehicleEngine'] ?>">
                <input type="text" name="cprob" placeholder="Car Problem">
                <input type="date" name="bdate" placeholder="Date">
                <input type="time" name="btime" placeholder="Time">
                <input type="text" name="serv_type" value="<?php echo $_SESSION['service_type'] ?>">
                <input type="text" name="comment" placeholder="Comments">
                <input type="submit" name="book-submit" value="Place Appointment">


            </form>
        </div>

        <?php
        //   echo $_SESSION['service_type']
        ?>


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