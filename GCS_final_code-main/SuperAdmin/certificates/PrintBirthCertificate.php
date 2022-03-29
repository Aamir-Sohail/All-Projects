<?php include('../includes/header.php'); ?>

<div id="printableArea">
    <div class="pdf px-0">


        <header class="header navbar navbar-expand-sm border-btm">

            <ul class="navbar-item theme-brand flex-row  text-center py-3">
                <li class="nav-item theme-logo">
                    <a href="index.php" class="logo">
                        <img src="http://localhost:8000/assets/img/ESEFlogosmall3.png" class="navbar-logo" alt="logo">
                    </a>
                </li>
                <li class="theme-text align-self-center">
                    ELEMENTARY &amp; SECONDARY EDUCATION FOUNDATION
                    <span>Government of Khyber Pakhtunkhwa Pakistan</span>
                </li>
            </ul>



            <ul class="navbar-item flex-row ml-auto">

                <li class="theme-text align-self-center text-center">
                    JAMSHED KHAN
                    <span>District Swat</span>
                </li>

                <li class="nav-item dropdown user-profile-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <!-- <img src="http://localhost:9000/assets/img/ESEFlogosmall3.png" alt="avatar"> -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-user">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                        <div class="">
                            <div class="dropdown-item">
                                <a class="" href="user_profile.html"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg> Profile</a>
                            </div>
                            <div class="dropdown-item">
                                <a class="" href="auth_login.html"><svg xmlns="http://www.w3.org/2000/svg" width="24"
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


        <div class="pr-5 text-right mb-5">
            Date: <?php echo date("d-m-Y"); ?>
        </div>

        <h1 class="h2 text-center fw-bold mb-5"><u>To whom it May Concern</u></h1>

        <div class="pdfdetail padding">
            <p class="mb-5">
                This is to certify that <strong class="fw-bold">Mr/Mrs
                    Mazhar Hussain</strong> bearing Enrollment
                No. 19PWDBCS0697 is a regular student of Govt. GCS School, Malakand . Currently he/she is a
                student of 5th Class. <br><br>
                This certificate is issued for the purpose of
                Birth Certificate for Nadra.
            </p>

            <div class="pr-4 text-right">

                <strong>Principal </strong> <br>
                (Signature & Stamp)
            </div>
        </div>
    </div>
</div>
<button class="btn btn-default" onclick="printDiv('printableArea')"><i class="fa fa-print" aria-hidden="true"
        style="    font-size: 17px;"> Print</i></button>

<?php include('../includes/header.php'); ?>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>