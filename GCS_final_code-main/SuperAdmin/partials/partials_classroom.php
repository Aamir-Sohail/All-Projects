
<!-- Classroom Observation -->
<div class="row layout-top-spacing mx-0 op-hidden" id="toremovebooks1" style="width:100%">
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
                                                                    <th style="width:250px">Class</th>
                                                                    <th>Teacher</th>
                                                                    <th>Time Spent</th>
                                                                    <th>Subjects</th>
                                                                    <th>Finding</th>
                                                                    <th>Feedback</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="tbody">
                                                                <tr>
                                                                    <td>Pre-Nursery</td>
                                                                    <td><input type="text" name="Pre_Nursery_Teachers"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Pre_Nursery_Time_Spent"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Pre_Nursery_Subjects"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Pre_Nursery_Finding"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Pre_Nursery_Feedback"
                                                                            class="form-control" required=""></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nursery</td>
                                                                    <td><input type="text" name="Nursery_Teachers"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Nursery_Time_Spent"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Nursery_Subjects"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Nursery_Finding"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Nursery_Feedback"
                                                                            class="form-control" required=""></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>One</td>
                                                                    <td><input type="text" name="One_Teachers"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="One_Time_Spent"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="One_Subjects"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="One_Finding"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="One_Feedback"
                                                                            class="form-control" required=""></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Two</td>
                                                                    <td><input type="text" name="Two_Teachers"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Two_Time_Spent"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Two_Subjects"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Two_Finding"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Two_Feedback"
                                                                            class="form-control" required=""></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Three</td>
                                                                    <td><input type="text" name="Three_Teachers"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Three_Time_Spent"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Three_Subjects"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Three_Finding"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Three_Feedback"
                                                                            class="form-control" required=""></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Four</td>
                                                                    <td><input type="text" name="Four_Teachers"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Four_Time_Spent"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Four_Subjects"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Four_Finding"
                                                                            class="form-control" required=""></td>
                                                                    <td><input type="text" name="Four_Feedback"
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
        data: "MODE=report&ReportType=Classroom_Observation&SchoolCode=" + SchoolCode + "&date=" + datee +
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