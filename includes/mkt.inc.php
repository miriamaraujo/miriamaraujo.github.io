<?php
if(isset($_POST['mktsubmit'])){
    require 'dbh.inc.php';

$namemkt = mysqli_real_escape_string($conn, $_POST['namemkt']);
$emailmkt = mysqli_real_escape_string($conn, $_POST['emailmkt']);

// Query
$query = mysqli_query($conn,  "INSERT INTO mailmkt(name_mkt, mail_mkt) VALUES ('$namemkt', '$emailmkt')");
if($query){
    $_SESSION['success'] = "Your Reservation has been Submitted";
        $_SESSION['id'] = $conn->inser_id;
        header('location: ../index.php');
        exit();
}
}


