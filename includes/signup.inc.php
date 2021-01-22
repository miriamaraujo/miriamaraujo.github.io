<?php
if (isset($_POST['signup-submit'])) {

    require 'dbh.inc.php';

    $username = $_POST['uname'];
    $usermail = $_POST['umail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    if (empty($username) || empty($usermail) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../login.php?error=emptyfields&name=" . $username . "&mail=" . $usermail);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username) && !filter_var($usermail, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../login.php?error=invalidmailname");
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../login.php?error?=invalidname&mail=" . $usermail);
        exit();
    } else if (!filter_var($usermail, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../login.php?error=invalidmail&name=" . $username);
        exit();
    } else if ($password !== $passwordRepeat) {
        header("Location: ../login.php?error=passwordcheckname=" . $username . "&mail=" . $usermail);
        exit();
    }

    $sql = "SELECT u_name FROM customers WHERE u_name=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../login.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCount = mysqli_stmt_num_rows($stmt);
        mysqli_stmt_close($stmt);
        if ($resultCount > 0) {
            header("Location: ../login.php?error=usertaken&mail=" . $usermail);
            exit();
        } else {
            $sql = "INSERT INTO customers (u_name, u_mail, u_pwd) VALUES (?, ?, ?);";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../signup.php?error=sqlerror");
                exit();
            } else {

                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt, "sss", $username, $usermail, $hashedPwd);
                mysqli_stmt_execute($stmt);
                session_start();
                header("Location: ../login.php?signup=success");
                exit();
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else{
    header("Location: ../login.php");
    exit();  
}