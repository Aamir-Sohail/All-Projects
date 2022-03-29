<!-- Monitoring of Hygiene -->
<div class="row layout-top-spacing mx-0 op-hidden" id="toremovebooks2" style="width:100%">
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
                                                        <table class="table  table-bordered mb-4">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width:250px">Indicators</th>
                                                                    <th>Children Checked</th>
                                                                    <th>Satisfied</th>
                                                                    <th>Average</th>
                                                                    <th>Poor</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="tbody">
                                                                <tr>
                                                                    <td>Nails</td>
                                                                    <td><input type="text" name="Nails_Children_Check"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Nails_Satisfied"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Nails_Average"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Nails_Poor"
                                                                            class="form-control" required=""></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Skin</td>
                                                                    <td><input type="text" name="Skin_Children_Check"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Skin_Satisfied"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Skin_Average"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Skin_Poor"
                                                                            class="form-control" required=""></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Hair</td>
                                                                    <td><input type="text" name="Hair_Children_Check"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Hair_Satisfied"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Hair_Average"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Hair_Poor"
                                                                            class="form-control" required=""></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Teeth</td>
                                                                    <td><input type="text" name="Teeth_Children_Check"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Teeth_Satisfied"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Teeth_Average"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Teeth_Poor"
                                                                            class="form-control" required=""></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Clothes</td>
                                                                    <td><input type="text" name="Clothes_Children_Check"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Clothes_Satisfied"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Clothes_Average"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Clothes_Poor"
                                                                            class="form-control" required=""></td>
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
        data: "MODE=report&ReportType=Moniter_Hygiene&SchoolCode=" + SchoolCode + "&date=" + datee +
            "&" + $("#msform").serialize(),
        success: function(data) {
            if (data === '1') {
                alert("Report Added SuccessFully");
                window.location.reload();
            } else {
                alert("Something Went Wrong!");
            }
        }
    });
})
</script>