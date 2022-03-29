<?php include('./includes/header.php');?>

<div class="layout-px-spacing">

    <!--  END SIDEBAR  -->
    <div class="row layout-top-spacing mx-0">
            <div class="layout-spacing col-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content row mx-0">

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Report Date</b></p>
                                <label for="contract" class="sr-only">contract</label>
                                <input class="form-control" type="date" value="<?php echo date("Y-m-d")?>" max="<?php echo date("Y-m-d")?>"
                                    name="reportdate" id="reportdate" placeholder="mm-dd-yyyy">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>GCS Name</b></p>
                                <label for="job-status" class="sr-only">GCS Name</label>
                                <select class="form-control" id="SchoolCode" name="SchoolCode" required="">
                                    <?php 
                                $schools = $datafetch->FetchSchools($District);
                                foreach($schools as $eachSchool){
                                    echo '<option value="'.$eachSchool['SchoolCode'].'">'.$eachSchool['CS_Name'].'</option>';
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Activity</b></p>
                                <label for="job-status" class="sr-only">job-status</label>
                                <select class="form-control" onchange="change_hidden()" id="job-status1" required="">
                                    <option value="">--SELECT--</option>
                                    <option value="moniter">Validation of Attendance</option>
                                    <option value="books">Books Distribtion</option>
                                    <option value="classroom">Classroom Observation </option>
                                    <option value="hygiene">Monitoring of Hygiene </option>
                                    <option value="meetings"> Participation in VEC Meetings </option>
                                    <option value="quaility"> Quaility Assurance Test</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div id="formPlaceholder">

            </div>
    </div>


</div>

<?php include('./includes/footer.php');?>

<script>
function change_hidden() {
    let n = $('#job-status1').find(":selected").val();
    let SchoolCode = $('#SchoolCode').val();
    let date = $('#reportdate').val();
    let loadContent = "partials/partials_" + n + ".php?SchoolCode="+SchoolCode+"&date="+date;
    // alert(loadContent);
    // $("#formPlaceholder").load("");
    $("#formPlaceholder").load(loadContent);
}

</script>