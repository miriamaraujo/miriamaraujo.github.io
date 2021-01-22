<?php
if (isset($_POST['update-submit'])) {
    require 'dbh.inc.php';

    $id_user = mysqli_real_escape_string($conn, $_POST['id']);
    $nName = mysqli_real_escape_string($conn, $_POST['n_name']);
    $nMail = mysqli_real_escape_string($conn, $_POST['n_mail']);
    $nPhone = mysqli_real_escape_string($conn, $_POST['n_phone']);
    $cType = mysqli_real_escape_string($conn, $_POST['c_type']);
    $cMake = mysqli_real_escape_string($conn, $_POST['c_make']);
    $cEng = mysqli_real_escape_string($conn, $_POST['c_eng']);
    $lDetails = mysqli_real_escape_string($conn, $_POST['l_details']);
    $nAddress = mysqli_real_escape_string($conn, $_POST['n_address']);
    $sType = mysqli_real_escape_string($conn, $_POST['s_type']);

    if (empty($nName) || empty($nMail) || empty($nPhone) || empty($nAddress) || empty($sType) || empty($lDetails)) {

        header('location: ../update-profile.php?error=emptyfields');
        exit();
    }


    $query = "UPDATE `customers` SET u_name='" . $nName . "', u_mail='" . $nMail . "', u_phone='" . $nPhone . "', vehicle_type='" . $cType . "', vehicle_make='" . $cMake . "', vehicle_engine='" . $cEng . "', l_details='" . $lDetails . "', u_address='" . $nAddress . "', service_type='" . $sType . "' WHERE `id_user` = $id_user";

    $result = mysqli_query($conn, $query);
    if ($result) {
        header('location: ../profile.php?update=successful');
        
        exit();
    } else {
        header('location: ../profile.php?update=failed');
        exit();
    }
    mysqli_close($connect);
}
