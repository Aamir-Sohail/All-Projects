<?php
 $ROOTURL = "http://" . $_SERVER['SERVER_NAME'] ."/f/gcs/SuperAdmin/";
//  $ROOTURL = "http://" . $_SERVER['SERVER_NAME'] ."/";
define('ROOTURL', $ROOTURL);
session_start();
// print_r($_SESSION);
if(!isset($_SESSION['email'])){
    header('Location: index.php');
    exit();
}
$SchoolCode = $_SESSION['SchoolCode'];
// include 'db.php';
if(basename($_SERVER['PHP_SELF']) == "dashboard.php"){
    include 'includes/auth.php';    
}else{
    include 'includes/auth.php';
}
    $datafetch = new admin();
    $data=new admin();
    $District = $_SESSION['District'];
    $AutoID = $_SESSION['AutoId'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>GCS By ESEF </title>
    <link rel="icon" type="image/x-icon" href="<?php echo ROOTURL ?>assets/img/ESEFlogosmall3.png" />
    <link href="<?php echo ROOTURL ?>assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo ROOTURL ?>assets/js/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="<?php echo ROOTURL ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ROOTURL ?>assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ROOTURL ?>assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ROOTURL ?>assets/css/widgets/modules-widgets.css" rel="stylesheet" type="text/css" />
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="<?php echo ROOTURL ?>plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="<?php echo ROOTURL ?>assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ROOTURL ?>assets/css/forms/theme-checkbox-radio.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <style>
        input,
        select {
            border-radius: 0 !important;
        }

        input:focus,
        select:focus,
        textarea:focus {
            box-shadow: none !important;
        }
        .dataTables_filter{
            float:right;
        }
    </style>

</head>

<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">

            <ul class="navbar-item theme-brand flex-row  text-center py-3">
                <li class="nav-item theme-logo">
                    <a href="index.php" class="logo">
                        <img src="<?php echo ROOTURL ?>assets/img/ESEFlogosmall3.png" class="navbar-logo" alt="logo">
                    </a>
                </li>
                <li class="theme-text align-self-center d-none d-lg-block">
                    ELEMENTARY & SECONDARY EDUCATION FOUNDATION<br>
                    <span>Government of Khyber Pakhtunkhwa Pakistan</span>
                </li>
            </ul>


            <ul class="navbar-item flex-row ml-auto">
            <li class="theme-text align-self-center text-center">
            <?php $name=$data->role_update_check($_SESSION['AutoId']);
            echo $name['TeacherName'];
            
            ?>
                    
                    <span> <?php $result =  $data->fetchDistrict($_SESSION['District']);
                    echo $result['DistrictName'];
                    ?></span>
                </li>

                                <?php 
             
                $imagee=$data->fetchuserimage($_SESSION['AutoId']);
                ?>

                <li class="nav-item dropdown user-profile-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <img src="<?php echo ROOTURL ?>../uploads/<?php echo $imagee['Image']?>" alt="avatar">
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                        <div class="">
                            <div class="dropdown-item">
                                <a class="" href="user_profile.php"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg> Profile</a>
                            </div>
                            <div class="dropdown-item">
                            <a class="" href="change_password.php"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg> Change Password</a>
                            </div>
                            <div class="dropdown-item">
                                <a class="" href="<?php echo $ROOTURL;?>logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-log-out">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg> Sign Out</a>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN NAVBAR  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a id="changeStatus" href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
                <span id="MenuToggle">Tap To Shrink</span></a>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>
        <style>
    .loading_icon img{
            height: 32px;
            width: auto;
            margin-left: -130px;
            margin-top: 35px;
}
</style>
        <?php include('sidebar.php'); ?>