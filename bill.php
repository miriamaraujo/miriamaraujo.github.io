<?php
session_start();
include ('includes/dbh.inc.php');

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


<?php
    if (isset($_GET['id'])) {
        $idbk = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "SELECT * FROM booking WHERE id_booking='$idbk' ";
        $result = mysqli_query($conn, $sql) or die("Bad query: $sql");
        $row = mysqli_fetch_assoc($result);
    }
    ?>

<div class="bill-container">

    <h1>Ger's Garage</h1>
    <br>
    <h4>Car Repair Invoice</h4>
    <hr>
    <p><b>Name: </b> <?php echo $row['u_name']  ?> </p>
    <p><b>E-mail: </b><?php echo $row['u_mail']  ?> </p>
    <p><b>Phone: </b> <?php echo $row['u_phone']  ?> </p>
    <p><b>Vehicle: </b> <?php echo $row['c_eng'], ' | ', $row['c_make']  ?> </p>
    <p><b>Service Type: </b><?php echo $_SESSION['service_type']  ?> </b> </p>
    <p><b>Total: </b> Not Working yet** </p>
    <p><b>Payment Due Colletion</b></p>
    <hr>
    
    <h5>Thanks for choosing Ger's Garage</h5>
    <hr>
    <h6>To Print this order press CTRL+P or Command+P</h6>
   

    
</div>

<a href="index.php" class="link-back">Go back to the Homepage</a>
</body>
</html>
