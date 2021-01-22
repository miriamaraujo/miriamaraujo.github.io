<?php
if(isset($_POST['login-submit'])){
    require 'dbh.inc.php';

    $userMail = $_POST['umail'];
    $userPwd = $_POST['pwd'];

    if (empty($userMail) || empty($userPwd)){
        header("Location: ../login.php?error=emptyfields");
        exit();
    }
    else{
        $sql = "SELECT * FROM customers WHERE u_name=? OR u_mail=?;";

        $stmt = mysqli_stmt_init($conn); 
        if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../login.php?error=sql");
        exit();
        }

        else{
            mysqli_stmt_bind_param($stmt, "ss", $userMail, $userMail);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($userPwd, $row['u_pwd']);
                if($pwdCheck == false){
                    header("Location: ../login.php?error=wrongpwd");
                    exit();
                }
                else if($pwdCheck == true){
                   session_start();
                   $_SESSION['userId'] = $row['id_user'];
                   $_SESSION['userName'] = $row['u_name'];
                   $_SESSION['userMail'] = $row['u_mail'];
                   $_SESSION['userPhone'] = $row['u_phone'];
                   $_SESSION['vehicleType'] = $row['vehicle_type'];
                   $_SESSION['vehicleMake'] = $row['vehicle_make'];
                   $_SESSION['vehicleEngine'] = $row['vehicle_engine'];
                   $_SESSION['uAddress'] = $row['u_address'];
                   $_SESSION['service_type'] = $row['service_type'];
                   $_SESSION['licence'] = $row['l_details'];


                   header("Location: ../userdash.php?login=success");
                    exit();

                }

                else{
                    header("Location: ../login.php?error=wrong");
                    exit();
                }

            }
            else {
                header("Location: ../login.php?error=nouser");
                exit();   
            }
        }
    }
}

else{
    header("Location: ../index.php");
    exit();
}