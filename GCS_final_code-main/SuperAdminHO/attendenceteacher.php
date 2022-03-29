<?php include('includes/header.php'); ?>

<div class="col-lg-12 col-12 layout-top-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-6 col-md-12 col-sm-12 col-12">
                    <h4>Report Attendance</h4>
                </div>
                <div class=" col-xl-6 col-md-12 col-sm-12 col-12">
                    <form method="GET" action="exports_list/export_attendence.php">
                                        <div class="row mb-3">
                    <div class="col">
                    <input type="date" name="date" class="form-control" required="">
                    </div>
                     <div class="col">
                    <input type="submit" name="txt" value="Export to Excel" class=" btn btn-primary">
                    </div>
                    </form>
                    
                </div>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
<form id="fetchAttendence">
            <div class="row">
                <div class="col-xl-3 mb-xl-0 mb-2">
                    <p><b>Date : </b></p>
                    <input type="date" name="date" class="form-control" required="">
                </div>
                <div class="col-xl-3 mb-xl-0 mb-2">
                    <p><b></b></p>
                    <input type="submit" name="txt" class="mt-4 btn btn-primary">
                </div>
                <div class="col-xl-3 mb-xl-0 mb-2 loading_icon" id="loading_icon_div">
                    <p><b></b></p>
                    <img src="http://dummy.gcs.esef.org.pk/loadingAnimation.gif" id="loading_icon" style="display:none;">
                </div>

            </div>
</div>

</div>
</form>
<div id="attendenceTable">

</div>

<?php include('includes/footer.php'); ?>

<script>



    $("#fetchAttendence").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "includes/process.php",
            data: "MODE=fetchteacherAttendence&" + $('#fetchAttendence').serialize(),
            beforeSend: function() {
            $("#loading_icon").css({display: 'block'});
            },
            success: function(data) {
                $('#attendenceTable').html(data);
                $('#multi-column-ordering').DataTable();
                $("#loading_icon").css({display: 'none'});
            }
        });
    })
</script>