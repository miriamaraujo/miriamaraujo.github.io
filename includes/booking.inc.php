<?php
if (isset($_POST['book-submit'])) {
    require 'dbh.inc.php';

    $id_user = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['fname']);
    $mail = mysqli_real_escape_string($conn, $_POST['umail']);
    $phone = mysqli_real_escape_string($conn, $_POST['uphone']);
    $carMake = mysqli_real_escape_string($conn, $_POST['cmake']);
    $carEngine = mysqli_real_escape_string($conn, $_POST['cengine']);
    $carProb = mysqli_real_escape_string($conn, $_POST['cprob']);
    $bDate = mysqli_real_escape_string($conn, $_POST['bdate']);
    $bTime = mysqli_real_escape_string($conn, $_POST['btime']);
    $sType = mysqli_real_escape_string($conn, $_POST['serv_type']);//add field to db and to the code below
    $commment = mysqli_real_escape_string($conn, $_POST['comment']);

    // Query
    $query = mysqli_query($conn,  "INSERT INTO booking(id_user, u_name, u_mail, u_phone, c_make, c_eng, c_prob, b_date, b_time, s_type, comments) VALUES ('$id_user', '$name', '$mail', '$phone', '$carMake', '$carEngine', '$carProb', '$bDate', '$bTime', '$sType', '$commment')");
    if ($query) {
        $_SESSION['id_bk'] = $db->insert_id;
        session_start();
               
        header('location: ../newbooking.php?booking=success');
        
        exit();
    } else {
        $_SESSION['error'] = "Sorry, check your inputs for errors";
    }
}
// If number of bookings be X redirect to another date
// If number of bookings be X redirect to another date