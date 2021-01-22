<?php
if(isset($_POST['singup-submit'])){

    require 'dbh.inc.php';

$username =$_POST['uname'];
$usermail =$_POST['umail'];
$userPwd =$_POST['pwd'];
$userPwdRepeat =$_POST['pwd-repeat'];

if(empty($username) || empty($usermail) || empty($userPwd) || empty($userPwdRepeat)) {
    header("Location: ../login.php?error?=emptyfields&name=".$username."&mail=".$usermail);
    exit();
}
if(!filter_var($usermail, FILTER_VALIDATE_EMAIL) || !preg_match("/^[a-zA-Z0-9]*$/", $username) ){
    header("Location: ../login.php?error?=invalidmailname");
    exit(); 
}
else if(!filter_var($usermail, FILTER_VALIDATE_EMAIL)){
    header("Location: ../login.php?error?=invalidmail&name=".$username);
    exit(); 
}
else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
    header("Location: ../login.php?error?=invalidname&mail=".$usermail);
    exit(); 
}
else if($userPwd !== $userPwdRepeat){
    header("Location: ../login.php?error?=passwordcheckname=".$username."&mail=".$usermail);
    exit(); 
}
else{
    $sql = "SELECT user_name FROM customers WHERE user_name=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../login.php?error=sqlerror");
    exit(); 
    }

    else{
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $resultCheck = mysqli_stmt_num_rows($stmt);
    if($resultCheck > 0 ){
    header("Location: ../login.php?error=usertaken&mail=".$usermail);
    exit();
    }

    else{
        $sql = "INSERT INTO customers (user_name, user_email) VALUES (?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../login.php?error=sqlerror");
        exit(); 
    }

    else{
        $hashedPwd = password_hash($userPwd, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "ss", $username, $usermail);
        mysqli_stmt_execute($stmt);
        header("Location: ../login.php?signup=success");
        exit();

        }
     }
   }
}
mysqli_stmt_close();
  mysqli_close($conn);
}

else{
    header("Location: ../login.php");
    exit();  
 }
