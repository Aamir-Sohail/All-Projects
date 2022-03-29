<?php include('includes/header.php'); ?>

<div class="col-12 layout-top-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
           
            <h4>Report Attendance</h4>
                
        </div>
        <div class="widget-content widget-content-area">
            <form id="fetchAttendence">
                <div class="row">

                    <div class="col-md-3 col-sm-6 mb-2">
                        <p><b>Date : </b></p>
                        <input type="date" name="date" class="form-control" required="">
                    </div>


                    <div class="col-md-3 col-sm-6 mb-2">
                        <p><b></b></p>
                        <input type="submit" name="txt" class="mt-4 btn btn-primary">
                    </div>
                    <div class="col-md-3 col-sm-6 mb-2 loading_icon" id="loading_icon_div">
                        <p><b></b></p>

                        <img src="http://dummy.gcs.esef.org.pk/loadingAnimation.gif" id="loading_icon"
                            style="display:none;">
                    </div>


                </div>
            </form>
        </div>

    </div>
    
    <div id="attendenceTable">

    </div>

    <?php include('includes/footer.php'); ?>

    <script>
        // $(document).ready(function() {
        //     $('#multi-column-ordering').DataTable();
        // });


        $("#fetchAttendence").on("submit", function (event) {
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: "includes/process.php",
                data: "MODE=fetchteacherAttendence&" + $('#fetchAttendence').serialize(),
                beforeSend: function () {
                    $("#loading_icon").css({
                        display: 'block'
                    });
                },
                success: function (data) {
                    $('#attendenceTable').html(data);
                    $('#multi-column-ordering').DataTable();
                    $("#loading_icon").css({
                        display: 'none'
                    });

                }
            });
        })
    </script>