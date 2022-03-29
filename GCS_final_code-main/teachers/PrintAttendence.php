<?php include('../includes/header.php'); ?>

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

                
                <!-- <div class="col-xl-3 mb-xl-0 mb-2">
                    <p><b>Month : </b></p>
                    <select class="form-control form-control-sm">
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
                <div class="col-xl-3 mb-xl-0 mb-2">
                    <p><b>Year : </b></p>
                    <select class="form-control form-control-sm">
                        <option value="01">2021</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div> -->
                <div class="col-xl-3 mb-xl-0 mb-2">
                    <p><b>From Date : </b></p>
                    <input type="date" name="fromDate" class="form-control" required="">
                </div>
                <div class="col-xl-3 mb-xl-0 mb-2">
                    <p><b>To Date : </b></p>
                    <input type="date" name="toDate" class="form-control" required="">
                </div>

                <div class="col-xl-3 mb-xl-0 mb-2">
                    <p><b></b></p>
                    <input type="submit" name="txt" class="mt-4 btn btn-primary">
                </div>

            </div>
</div>

</div>
</form>

<div id="attendenceTable">

</div>
<?php include('../includes/footer.php'); ?>


<script>
  function PrintAttendence(){
        var data = '<input type="button" value="Print this page" onClick="window.print()">';           
        data += '<div id="div_print">';
        data += $('#attendenceTable').html();
        data += '</div>';

        myWindow=window.open('','','width=200,height=100');
        myWindow.innerWidth = screen.width;
        myWindow.innerHeight = screen.height;
        myWindow.screenX = 0;
        myWindow.screenY = 0;
        myWindow.document.write(data);
        myWindow.focus();
    };


console.log($("#attendenceTable"));


    $("#fetchAttendence").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "../includes/process.php",
            data: "MODE=fetchteacherAttendence&" + $('#fetchAttendence').serialize(),
            success: function(data) {
                console.log(data);
$('#attendenceTable').html(data);
            //     if(data === '1' || data ==='11' || data ==='111'|| data ==='1111'|| data ==='11111'|| data ==='111111'){
            //         $('#teacherForm').trigger("reset");
            //         // console.log(data);
            //     }else{
            //         alert("Please Fill All Input Correctly");
            //     }
            }
        });
    })

  
</script>