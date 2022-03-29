
<div class="row layout-top-spacing mx-0 op-hidden" id="toremove" style="width:100%">
    <div class="layout-spacing col-12">
        <div class="statbox widget box box-shadow pt-1 py-4">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-11 col-sm-10 col-md-10 col-lg-12 p-0 mb-2">
                        <div class="card px-0 pb-0 mb-3">
                            <form id="msform">
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-md-12 col-12">
                                                <div class="csvf_table" class="col-md-12 col-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered mb-4">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width:250px">Indicators</th>
                                                                    <th>Status</th>
                                                                    <th>Boys</th>
                                                                    <th>Girls</th>
                                                                    <th>Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="tbody">
                                                                <tr>
                                                                    <td>Online Attendance Marked</td>
                                                                    <td><select class="form-control"
                                                                            id="Online_Attendece"
                                                                            name="Online_Attendece" required="">
                                                                            <option value="Yes">Yes</option>
                                                                            <option value="No">No</option>
                                                                        </select></td>
                                                                    <td><input type="number"
                                                                            name="Online_Attendece_Boys"
                                                                            class="form-control" required="">
                                                                    </td>
                                                                    <td><input type="number"
                                                                            name="Online_Attendece_Girls"
                                                                            class="form-control" required="">
                                                                    </td>
                                                                    <td><input type="number"
                                                                            name="Online_Attendece_Total"
                                                                            class="form-control" required="">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Register Maintained</td>
                                                                    <td><select class="form-control"
                                                                            id="Register_Maintained"
                                                                            name="Register_Maintained" required="">
                                                                            <option value="Yes">Yes</option>
                                                                            <option value="No">No</option>
                                                                        </select></td>
                                                                    <td><input type="number"
                                                                            name="Register_Maintained_Boys"
                                                                            class="form-control" required="">
                                                                    </td>
                                                                    <td><input type="number"
                                                                            name="Register_Maintained_Girls"
                                                                            class="form-control" required="">
                                                                    </td>
                                                                    <td><input type="number"
                                                                            name="Register_Maintained_Total"
                                                                            class="form-control" required="">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Head Count By Moniter</td>
                                                                    <td><select class="form-control" id="Head_Count"
                                                                            name="Head_Count" required="">
                                                                            <option value="Yes">Yes</option>
                                                                            <option value="No">No</option>
                                                                        </select></td>
                                                                    <td><input type="number" name="Head_Count_Boys"
                                                                            class="form-control" required="">
                                                                    </td>
                                                                    <td><input type="number" name="Head_Count_Girls"
                                                                            class="form-control" required="">
                                                                    </td>
                                                                    <td><input type="number" name="Head_Count_Total"
                                                                            class="form-control" required="">
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                        <div class="col-12 text-right">
                                                            <input type="submit" value="Submit" class="btn btn-primary">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$("#msform").on("submit", function(event) {
    event.preventDefault();
    let datee = "<?php echo htmlspecialchars($_GET['date']);?>";
    let SchoolCode = <?php echo htmlspecialchars($_GET['SchoolCode']);?>;
    $(':input[type="submit"]').prop('disabled', true);
    $.ajax({
        type: "POST",
        url: "./includes/process.php",
        data: "MODE=report&ReportType=Attendence_Moniter&SchoolCode="+SchoolCode+"&date="+datee+"&"+$("#msform").serialize(),
        success: function(data) {
                if (data === '1') {
                alert("Report Added SuccessFully");
                window.location.reload(); 
            }else{
                    alert("Something Went Wrong!");
            }
        }
    });
})
</script>