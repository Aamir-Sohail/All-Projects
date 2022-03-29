<?php $ROOTURL = "http://" . $_SERVER['SERVER_NAME'].'/series/task1/DPOLEVEL/' ;
define('ROOTURL', $ROOTURL);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>GCS By ESEF </title>
    <link rel="icon" type="image/x-icon" href="<?php echo ROOTURL ?>assets/img/ESEFlogosmall3.png" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="<?php echo ROOTURL ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <style>
        #School_loginForm .section_logo img {
            width: 25%;
        }

        .section_logo {
            background-color: #007bff;
            color: white;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .section_login .form-control {
            box-shadow: none;
        }

        @media screen and (max-width:768px) {
            #School_loginForm .section_logo img {
                width: 23%;
            }

            #School_loginForm .section_logo {
                height: auto;
            }

            #School_loginForm .section_logo h4 {
                font-size: 1.2rem;
            }
        }
    </style>

</head>

<body>
    <div class="row mx-0 border" style="height:100vh;" id="School_loginForm">
        <div class="section_logo col-md-6 my-md-auto text-center border">
            <img class="mb-1 logo" src="<?php echo ROOTURL ?>assets/img/ESEFlogosmall3.png" alt="">
            <h4>ELEMENTARY & SECONDARY <br> EDUCATION FOUNDATION</h4>
            <span>Government of Khyber Pakhtunkhwa Pakistan</span>
        </div>
        <div class="section_login col-sm-10 mx-auto col-md-6 my-auto">
            <form action="includes/signin.php" method="POST" class="col-sm-9 mx-auto">
                <?php 
                if(isset($_GET['action']) && $_GET['action'] == "incorrect"){
                    echo  '<div class="alert alert-danger" role="alert">
  Invaild UserID or Password
</div>';
                }
                ?>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">UserID</label>
                    <input type="text" name="email" class="form-control" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" name="submit" class="btn btn-primary float-right px-4">Login</button>
            </form>
        </div>
    </div>
</body>

</html>