<?php 
include 'includes/auth.php';
$auth = new auth();
if(isset($_GET['password'])){
    $pass = $_GET['password'];
    if($pass === "Hopeapko123"){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>GCS Admin Passwords </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link href="assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
    <style>
        .dataTables_filter{
            float:right;
        }
    </style>
    <!-- END PAGE LEVEL CUSTOM STYLES -->
</head>

<body data-spy="scroll" data-target="#navSection" data-offset="140">
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
        
        <div class="overlay"></div>
        <div class="search-overlay"></div>
        <!--  END SIDEBAR  -->
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content mx-0 mt-0">
                <div class="row layout-top-spacing">
                    <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        
                                        <h4>Schools List</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive">
                                    <?php
                                    if(isset($_GET['alert']) && $_GET['alert'] == "success"){
                                        echo '<div class="alert alert-primary" role="alert">Password Reset SuccessFully! The New Password is GCS@123 </div>';
                                    }
                                    ?>
                                    <table  id="multi-column-ordering" class="table table-bordered mb-4">
                                        <thead>
                                            <tr>
                                                <th>District</th>
                                                <th>CSName</th>
                                                <th>SchoolCode</th>
                                                <th>TeacherName</th>
                                                <th>TeacherCNIC</th>
                                                <th>Contact</th>
                                                <th>UserID</th>
                                                <th>Password</th>
                                                <th>Reset</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $data = $auth->fetch_all_users();
                                            foreach($data as $row){
                                            
                                            echo '<tr>
                                                <td>'.$row['District'].'</td>
                                                <td>'.$row['CSName'].'</td>
                                                <td>'.$row['SchoolCode'].'</td>
                                                <td>'.$row['TeacherName'].'</td>
                                                <td>'.$row['TeacherCNIC'].'</td>
                                                <td>'.$row['Contact'].'</td>
                                                <td>'.$row['UserID'].'</td>
                                                <td>'.$row['Password'].'</td>
                                                <td><form method="post" action="includes/process.php"><input type="hidden" name="school_id" value="'.$row['AutoID'].'"><input type="submit" class="btn btn-info" name="reset_school_pass" value="Reset"></form></td>
                                            </tr>';
                                             } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="footer-wrapper">
                                <div class="footer-section f-section-1">
                                    <p class="">Copyright © 2021 <a target="_blank"
                                            href="https://orbailix.com">Orbailix</a>, All rights reserved.</p>
                                </div>
                                <div class="footer-section f-section-2">
                                    <p class="">
                                        Coded with
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-heart">
                                            <path
                                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                            </path>
                                        </svg>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <!--  END CONTENT AREA  -->
            </div>
            <!-- END MAIN CONTAINER -->
            <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
            <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
            <script src="bootstrap/js/popper.min.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>
            <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
            <script src="assets/js/app.js"></script>
            
            
<script src="assets/js/datetoword.js"></script>
            <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
            <script>
                $(document).ready(function () {
                    App.init();
                });
                
                $(document).ready( function () {
                    $('#multi-column-ordering').DataTable();
                } );
            </script>
            <script src="plugins/highlight/highlight.pack.js"></script>
            <script src="assets/js/custom.js"></script>
            <!-- END GLOBAL MANDATORY SCRIPTS -->
            <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
            <script src="assets/js/scrollspyNav.js"></script>
            <script>
            $(".alert").delay(4000).slideUp(200, function() {
    $(this).alert('close');
});
                checkall('todoAll', 'todochkbox');
                $('[data-toggle="tooltip"]').tooltip();
                
            </script>
            <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
</body>

</html>
<?php }}
else{
echo '<center><h1>Please Login</h1>
<form method="GET" action="LockedPage.php">
<input type="password" name="password">
<input type="submit">
</form>
</center>';}
?>