<?php include('includes/header.php'); ?>

<div class="col-lg-12 col-12 layout-top-spacing">
    <form id="attendenceForm">
        <div class="layout-spacing col-12">
            <div class="statbox widget box box-shadow">
                <div id="alert">
                    <?php   
if(isset($_GET['alert']) && $_GET['alert']="sucess"){
  echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
   Teacher attendence verified successfully!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
 

}elseif(isset($_GET['alert']) && $_GET['alert']="alreadymarked"){
    echo '  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    Teacher attendence already verified !
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>';
}

?>
                </div>

                <div class="widget-header">
                    <div class="row">
                        <div class="col-12">
                            <h3>Monitor Teachers Attendance</h3>
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area d-flex flex-wrap" style="justify-content: space-between">
                    <?php $tehsil=$datafetch->getTehsil($District);
;?>
                    <div class="col-md-4 col-sm-6">
                        <label for="Tehsil">Tehsil</label>

                        <select onchange="fetchSchool(event)" id="tehsil" class="form-control">
                            <option>--SELECT--</option>

                            <?php foreach($tehsil as $row){
                           echo '<option value='.$row['TehsilCode'].'>'.$row['TehsilName'].'</option>';
                            

                           }
                               ?>
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <label for="Tehsil">GCS School</label>
                        <select class="form-control" id="School" name="SchoolCode">
                            <option>--SELECT--</option>

                        </select>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <label for="Tehsil">Date</label>
                        <input type="date" id="date" name="date" class="form-control" placeholder="district">
                    </div>

                    <input type="hidden" name="MODE" value="fetchhattendence">

                    <div class="col-12 mt-5 text-right">
                        <button class="btn btn-primary" type="submit" name="fetchTattendence">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form action="./includes/process.php" method="post">

        <div class="widget-content widget-content-area br-6">
            <div id="zero-config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                <div class="dataTables_length" id="zero-config_length"><label>
                        <h4 id="heree"></h4> :
                    </label></div>

                <div class="table-responsive scrollbar scrolledY-axis">
                    <div class="table-scrolled scrollbar">
                        <table id="zero-config" class="table table-striped dataTable" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>SNo</th>
                                    <th>Name</th>
                                    <th>CNIC</th>
                                    <th>Marked As</th>
                                    <th>Attendance Status</th>
                                </tr>
                            </thead>
                            <tbody id="here">


                            </tbody>
                        </table>

                    </div>
                </div>

                <div style="float: right;">
                    <input type="submit" name="verifyteacher" class="mt-4 btn btn-primary">
                </div>
            </div>
        </div>
    </form>

</div>

</div>


<?php include('includes/footer.php'); ?>

<script>
    $("#attendenceForm").submit((e) => {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "./includes/process.php",
            method: "POST",
            data: $("#attendenceForm").serialize(),
            success: function (res) {
                var date = $("#date").val();
                console.log(res);
                if (res == "empty") {
                    $("#alert").html(`'  <div class="alert alert-danger alert-dismissible fade show" role="alert">
   Attendence on this date is not marked!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>'`);
                } else if (res == "verified") {
                    $("#alert").html(`'  <div class="alert alert-warning alert-dismissible fade show" role="alert">
   Teacher attendence already verified !
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>'`);
                } else {
                    $("#heree").html('Attendance of :' + date);

                    $("#here").html(res);
                }

            }

        })
    })

    function fetchSchool(event) {
        districtCode = document.getElementById("tehsil").value;
        $.ajax({
            url: "./includes/process.php",
            method: "POST",
            data: {
                MODE: "fetchSchoolByDistrict",
                tehsilCode: districtCode
            },
            success: function (res) {
                $("#School").html(res);
            }

        })

    }

    function status_check(id) {
        data = "status" + id;
        var checkBox = document.getElementById(data);
        console.log(checkBox.value);
        if (checkBox.value == 0) {
            document.getElementById(data).value = 1;
        } else {
            document.getElementById(data).value = 0;
        }
    }
</script>