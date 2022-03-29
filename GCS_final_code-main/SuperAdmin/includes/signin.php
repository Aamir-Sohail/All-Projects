<?php

ob_start();
session_start();
include "auth.php";
$cuser = new admin();

if (isset($_POST['submit'])) {
    $email = $cuser->test_input($_POST['email']);
    $password = $cuser->test_input($_POST['password']);
    $result = $cuser->signin($email, $password);

    if ($result > 0) {
        $SchoolCode = $cuser->fetch_user_SchoolCode($email);
        $_SESSION['SchoolCode'] = $SchoolCode;
        $_SESSION['email'] = $email;
        $_SESSION['District'] = $result['District'];
        $_SESSION['AutoID'] = $result['AutoID'];
        $password_check = $cuser->password_update_check($SchoolCode);
        if($password_check > 0){
            header("Location: ../forgot_password.php");
        }else{
            header("Location: ../dashboard.php");
        }
    } else {
        echo "<script>window.location.href='../index.php?action=incorrect';</script>";
        exit;
    }
}
