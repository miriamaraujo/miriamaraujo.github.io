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
                    
                    echo '<li><a href="userdash.php"><i class="fa fa-user-o" aria-hidden="true"></i>My Account </a></li>';
                    echo '<li><a href="includes/logout.inc.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>';
                } else {
                    echo '<li><a href="userdash.php"><i class="fa fa-user-o" aria-hidden="true"></i>My Account </a></li>';
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
        <img src="img/p5.png" alt="" width="90px" style="border-radius: 50%;">
        <h4>Michael Scott</h4>
        <a href="dashboard.html" class="home-btn"><i class="fa fa-home" aria-hidden="true"></i></a>
        <a href="profile.html" class="profile-btn">My Profile</a>
        <a href="newbooking.html" class="new-book">+ New Booking</a>
        
    </div>


    <h3>My Orders</h3>
    <div class="flex-container">
        <div class="order-box">
            <h4>Flat Tyres</h4>
            <p>Order Number: 102</p>
            <p>Status: Booked</p>
            <p>Booking Date: 10/12/2021 <span>- Time: 13:30pm</span></p>


            <button><a href="order-details.html">+ Details</a></button>
        </div>
        <div class="order-box">
            <h4>Overheating Engine</h4>
            <p>Order Number: 153</p>
            <p>Status: In Service</p>
            <p>Booking Date: 10/12/2021 <span>- Time: 13:30pm</span></p>


            <button><a href="order-details.html">+ Details</a></button>
        </div>
        <div class="order-box">
            <h4>Windows Replacement</h4>
            <p>Order Number: 102</p>
            <p>Status: Booked</p>
            <p>Booking Date: 10/12/2021 <span>- Time: 13:30pm</span></p>


            <button><a href="order-details.html">+ Details</a></button>
        </div>
        <div class="order-box">
            <h4>Car Wash and Polish</h4>
            <p>Order Number: 153</p>
            <p>Status: In Service</p>
            <p>Booking Date: 10/12/2021 <span>- Time: 13:30pm</span></p>


            <button><a href="order-details.html">+ Details</a></button>
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
            <li><a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-instagram"></a></li>
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