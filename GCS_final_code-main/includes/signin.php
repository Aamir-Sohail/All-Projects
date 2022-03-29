<?php

ob_start();
session_start();
include 'login.php';
$cuser = new login();

if (isset($_POST['submit'])) {
    $email = $cuser->test_input($_POST['email']);
    $password = $cuser->test_input($_POST['password']);
    $result = $cuser->signin($email, $password);
    $result1 = $cuser->signinAutoId($email, $password);

    if ($result > 0) {
        $SchoolCode = $cuser->fetch_user_SchoolCode($email);
        $_SESSION['SchoolCode'] = $SchoolCode;
        $_SESSION['email'] = $email;
        $password_check = $cuser->password_update_check($SchoolCode);
        $role_check = $cuser->role_update_check($email);
        // print_r($role_check);
        if($password_check > 0){
            header("Location: ../forgot_password.php");
        }else{
            if($role_check['role'] == 1){
                $_SESSION['isDPO'] = true;
                $_SESSION['District'] = $role_check['DistrictCode'];
                $_SESSION['AutoId']=$result1['AutoID'];
                 $_SESSION['CS_Name']=$role_check['CSName'];
                header("Location: ../SuperAdmin/");
                // print_r($_SESSION);
                // echo "DPO";
            }elseif($role_check['role'] == 2){
                $_SESSION['isSuperAdmin'] = true;
                $_SESSION['AutoId']=$result1['AutoID'];
                $_SESSION['CS_Name']=$role_check['CSName'];

                 $_SESSION['Image']=$role_check['Image'];
                // $_SESSION['District'] = $role_check['District'];
                header("Location: ../SuperAdminHO/");
                // print_r($_SESSION);
                // echo "DPO";
            }else{
            header("Location: ../dashboard.php?step=1");
            }
        }
    } else {
        echo "<script>window.location.href='../index.php?action=incorrect';</script>";
        exit;
    }
}
