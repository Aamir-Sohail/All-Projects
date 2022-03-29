<?php
include './includes/auth.php';
include('./includes/header.php');
$SchoolCode = $_SESSION['SchoolCode'];
$active = '1';
$cuser = new auth();

if (isset($_GET['step'])) {
    $active = $_GET['step'];
}

?>
<!-- students graph.... -->

<div id="content" class="main-content ml-0">


    <div class="row mx-0">
        <div class="col-12 layout-spacing">

            <div class="statbox widget box box-shadow ">
                <div class="widget-content widget-content-area col-6 mx-auto">
                    <div id="msg"></div>
                    <div class="row">
                        <div class="col-12 mx-auto">
                            <form method="post" id="forgot_form">
                                <div class="form-group">
                                    <label for="p-text" class="">Current Password</label>
                                    <input id="p-text" type="password" name="Pass"
                                        class="form-control" required="">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="new_pass" class="">New Password</label>
                                    <input id="new_pass" minlength="8" type="password" name="New_Pass"
                                        class="form-control" required="">


                                </div>
                                <div class="form-group">
                                    <label for="conirf_pass" class="">Confirm Password</label>
                                    <input id="conirf_pass" minlength="8" type="password" name="Confirm_Pass"
                                        class="form-control" required="">
                                </div>

                                <div class="text-right"> 
                                    <input type="submit" onclick="saveNext()" name="password" class="mt-4 btn btn-primary"> </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>




</div>
</div>

<?php include('includes/footer.php'); ?>
<script>

 $("#forgot_form").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "includes/process.php",
            data: "MODE=password_change&" + $('#forgot_form').serialize(),
            success: function(data) {
                $("#msg").html(`
                <div class="alert alert-arrow-left alert-icon-left alert-light-primary mb-4" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" data-dismiss="alert" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg> 
                                        ${data}.
                                    </div>
                `).fadeIn("slow");;
                if(data ==="Password Updated"){
                    setTimeout(function(){ 
                        window.location.replace("dashboard.php?step=1");
                     }, 1000);
                }
            }
        });
    });
</script>