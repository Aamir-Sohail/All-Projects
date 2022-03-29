<?php include('./includes/header.php'); ?>
<div id="loader_screen"></div>
<div class="col-lg-12 col-12 layout-top-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">

            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>Visitors</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
            <form id="visitor">
                <div class="row">
                    <div class="col-xl-3 mb-xl-0 mb-2">
                        <p><b>Date</b></p>
                        <input id="t-text" type="date" name="datee" class="form-control" required="">
                    </div>
                    <div class="col-xl-3 mb-xl-0 mb-2">
                        <p><b>Name</b></p>
                        <input id="t-text" type="text" name="namee" class="form-control" required="">
                    </div>

                    <div class="col-xl-3 mb-xl-0 mb-2">
                        <p><b>Designation</b></p>
                        <input id="t-text" type="text" name="designation" class="form-control" required="">
                    </div>
                    <div class="col-xl-3 mb-xl-0 mb-2">
                        <p><b>Organization</b></p>
                        <input id="t-text" type="text" name="organization" class="form-control" required="">
                    </div>
                    <div class="col-xl-3 mb-xl-0 mb-2 mt-3">
                        <p><b>Contact Number</b></p>
                        <input id="t-text" type="text" name="cnumber" class="form-control" required="">
                    </div>
                    <div class="col-xl-3 mb-xl-0 mb-2 mt-3">
                        <p><b>Purpose of visit</b></p>
                        <input id="t-text" type="text" name="purpose" class="form-control" required="">
                    </div>
                    <div class="col-xl-3 mb-xl-0 mb-2 mt-3">
                        <p><b>Remarks</b></p>
                        <input id="t-text" type="text" name="remarks" class="form-control" required="">
                    </div>

                    <div class="col-xl-3 mb-xl-0 mt-auto text-right">
                        <input type="submit" name="submit" class="mt-4 btn btn-primary">
                    </div>

                </div>
            </form>
        </div>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div id="zero-config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="dt--top-section">
                        <div class="row">
                            <div class="col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center">
                                <div class="dataTables_length" id="zero-config_length"><label>Visitors : </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table id="zero-config" class="table table-striped dataTable" style="width: 100%;" role="grid"
                            aria-describedby="zero-config_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" aria-sort="ascending">Date
                                    </th>
                                    <th class="sorting" style="width: 132px;"> Name</th>
                                    <th class="sorting" >Designation</th>
                                    <th class="sorting">Organization</th>
                                    <th class="sorting">Contact#</th>
                                    <th class="sorting" style="width: 200px;">Purpose of Visit</th>
                                    <th class="sorting" style="width: 200px;"> Remarks </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $res= $datafetch->fetchVisitors($SchoolCode); 
                            foreach($res as $result){
                               echo '<tr role="row">
                                    <td>'.$result['Date_Of_Visit'].'</td>
                                    <td>'.$result['Name'].'</td>
                                    <td>'.$result['Designation'].'</td>
                                    <td>'.$result['Organization'].'</td>
                                    <td>'.$result['Cnumber'].'</td>
                                    <td>'.$result['Purpose'].'</td>
                                    <td>'.$result['Remarks'].'</td>
                                </tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php include('./includes/footer.php'); ?>
<script>
$("#visitor").submit(function(event) {
    event.preventDefault();
    $.ajax({
        type: "POST",
        url: "./includes/process.php",
        data: "MODE=visitor&" + $('#visitor').serialize(),
        beforeSend: function() {
            $("#loader_screen").html(
                `<div id="load_screen"><div class="loader"><div class="loader-content"><div class="spinner-grow align-self-center"></div></div></div></div`
            );
        },
        success: function(data) {
            $("#loader_screen").html("");
            if (data === '1') {
                $('#studentAttendenceform').trigger("reset");
                alert("Visitor Added SuccessFully");
                window.location.reload(); 
            }
        }
    });
});
</script>