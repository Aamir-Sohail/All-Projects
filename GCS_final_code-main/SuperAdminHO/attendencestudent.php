<?php include('includes/header.php'); ?>

<div class="col-lg-12 col-12 layout-top-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>Report Attendance</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
<form id="fetchAttendence">
            <div class="row">

                
                <div class="col-xl-3 mb-xl-0 mb-2">
                    <p><b>Date : </b></p>
                    <input type="date" name="date" id="date" class="form-control" required="">
                </div>
              

                <div class="col-xl-3 mb-xl-0 mb-2">
                    <p><b></b></p>
                    <input type="submit" name="txt" style="border-radius: .25rem !important;" class="mt-4 btn btn-primary">
                    <button type="button" id="export" class="mt-4 btn btn-primary">Export</button>
                </div>
                <div class="col-xl-3 mb-xl-0 mb-2 loading_icon" id="loading_icon_div">
                    <p><b></b></p>
                   
                    <img src="http://dummy.gcs.esef.org.pk/loadingAnimation.gif" id="loading_icon" style="display:none;">
                </div>

            </div>
</div>


</div>
</form>
<form id="export_from" action="./exports_list/Students.php" method="GET">
    <input type="hidden" name="date" id="date_to_be" class="form-control" required="">
</form>
<div id="attendenceTable">

</div>

<?php include('includes/footer.php'); ?>

<script>

    $("#export").on("click", function(event){
        let a = $("#date").val();
        if(a == ''){
            alert("Please Select Date");
        }else{
            $("#date_to_be").val(a);
            let set = $("#date_to_be").val()
            if(set == ''){
                alert("Please date again");
            }else{
                $("#export_from").submit();
            }
        }
    })



    $("#fetchAttendence").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "includes/process.php",
            data: "MODE=fetchstudentAttendence&" + $('#fetchAttendence').serialize(),
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