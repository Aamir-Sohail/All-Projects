<?php include('./includes/header.php');?>

<div class="row layout-top-spacing">

    <div id="basic" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow p-0">
            <div class="widget-content widget-content-area">
                <form id="change-password">
                    <div class="modal-body py-4">
                        <div class="row">
                            <div class="col-4 mb-2">
                                <p><b>Old Password</b></p>
                                <input type="text" name="Pass" class="form-control" required="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mb-2">
                                <p><b>New Password</b></p>
                                <input type="text" name="New_Pass" class="form-control" required="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mb-2">
                                <p><b>Confirm New Password</b></p>
                                <input type="text" name="Confirm_Pass" class="form-control" required="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mb-2">
                                <div class="mb-2" id="output" style="display: none"></div>
                                <input type="submit" class="btn btn-primary" value="Change Password">
                            </div>
                        </div>  
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
$("#change-password").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "includes/process.php",
            data: "MODE=password_change&" + $('#change-password').serialize(),
            success: function(data) {
                if(data){
                    $("#output").fadeIn().html("* "+data).css({"color":"red", "font-size":"14px"});
                }
            }
        });
    });
</script>


<?php include('./includes/footer.php');?>