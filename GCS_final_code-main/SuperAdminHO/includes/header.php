<?php
$ROOTURL = "http://" . $_SERVER['SERVER_NAME'] ."/";
define('ROOTURL', $ROOTURL);

session_start();
if (!isset($_SESSION['isSuperAdmin'])) {
    header("Location: ../../index.php");
    // echo "HEre";
    exit();
}
include './includes/auth.php';
$data = new admin();
// include './exports_list/auth.php';
// $exports = new exports();

$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[2];
// include './includes/header.php';
$District = $_SESSION['District'];
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
    <link href="<?php echo ROOTURL ?>assets/css/structure.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ROOTURL ?>assets/css/widgets/modules-widgets.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ROOTURL ?>assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />
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
            echo $name['TeacherName'];?>
                    
                    <span> <?php echo $_SESSION['District']?></span>
                </li>

                <!--<li class="nav-item dropdown notification-dropdown mt-1">-->
                <!--    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown"-->
                <!--        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                <!--        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"-->
                <!--            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"-->
                <!--            class="feather feather-bell">-->
                <!--            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>-->
                <!--            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>-->
                <!--        </svg><span class="badge badge-success"></span>-->
                <!--    </a>-->
                <!--    <div class="dropdown-menu position-absolute" aria-labelledby="notificationDropdown">-->
                <!--        <div class="notification-scroll">-->

                <!--            <div class="dropdown-item">-->
                <!--                <div class="media server-log">-->
                <!--                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"-->
                <!--                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"-->
                <!--                        stroke-linejoin="round" class="feather feather-server">-->
                <!--                        <rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect>-->
                <!--                        <rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect>-->
                <!--                        <line x1="6" y1="6" x2="6" y2="6"></line>-->
                <!--                        <line x1="6" y1="18" x2="6" y2="18"></line>-->
                <!--                    </svg>-->
                <!--                    <div class="media-body">-->
                <!--                        <div class="data-info">-->
                <!--                            <h6 class="">Schools Will be Closed Today</h6>-->
                <!--                            <p class="">45 min ago</p>-->
                <!--                        </div>-->

                <!--                        <div class="icon-status">-->
                <!--                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"-->
                <!--                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"-->
                <!--                                stroke-linecap="round" stroke-linejoin="round"-->
                <!--                                class="feather feather-x">-->
                <!--                                <line x1="18" y1="6" x2="6" y2="18"></line>-->
                <!--                                <line x1="6" y1="6" x2="18" y2="18"></line>-->
                <!--                            </svg>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</li>-->
                <?php 
             
                $imagee=$data->fetchuserimage($_SESSION['AutoId']);
                ?>

                <li class="nav-item dropdown user-profile-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <img src="<?php echo ROOTURL ?>uploads/<?php echo $imagee['Image']?>" alt="avatar">
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
                                    </svg>Change Password</a>
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

                #multi-column-ordering_filter {
                    float: right;
                }
            </style>
        <?php include('sidebar.php'); ?>
        <style>
    .loading_icon img{
            height: 32px;
            width: auto;
            margin-left: -130px
            margin-top: 35px;
}
    }
</style>