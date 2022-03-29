<?php include('../includes/header.php'); ?>

<div class="col-lg-12 col-12 layout-top-spacing">
    <div class="statbox widget box box-shadow">

        <form id="VEC_MEETING" class="section work-platforms">
            <div class="info">
                <div class="row">
                    <div class="col-md-11 mx-auto">
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <p><b>Meeting Date </b></p>
                                    <label for="village" class="sr-only">From</label>
                                    <input type="date" name="meeting_date" id="meeting_date" class="form-control"
                                        required="">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <p><b>Meeting Place </b></p>
                                    <label for="village" class="sr-only">From</label>
                                    <input type="text" name="meeting_place" id="meeting_place" class="form-control"
                                        required="">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <p><b>Meeting# </b></p>
                                    <label for="village" class="sr-only">From</label>
                                    <input type="text" name="meeting_no" id="meeting_no" class="form-control"
                                        required="">
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <p><b>Agenda </b></p>
                                    <label for="village" class="sr-only">From</label>
                                    <input type="text" name="Agenda" id="Agenda" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <p><b>Proceedings </b></p>
                                    <!-- <label for="platform-description">Proceding</label> -->
                                    <textarea class="form-control mb-4" id="Proceedings" name="Proceedings"
                                        placeholder="Enter Proceedings" rows="10" required></textarea>
                                </div>
                            </div>
                            <div class="col-2  text-center">
                                <div class="form-group">
                                    <p><b>Present Members </b></p>
                                    <input style="width:80px" type="number" required class="form-control mb-4 ml-3 px-1"
                                        id="present" name="present">
                                </div>
                            </div>
                            <div class="col-2 text-center">
                                <div class="form-group">
                                    <p><b>Absents Members </b></p>
                                    <input style="width:80px" type="number" required class="form-control mb-4 ml-3 px-1"
                                        id="absent" name="absent">
                                </div>
                            </div>
                            <div class="col-4 mt-auto">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Attach Attendence Sheet</label>
                                    <input type="file" class="form-control-file" required id="exampleFormControlFile1"
                                        name="attendenceSheet">
                                </div>
                            </div>
                            <div class="col-4 mt-auto">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Attach Group Picture</label>
                                    <input type="file" class="form-control-file" required id="exampleFormControlFile1"
                                        name="groupPhoto">
                                </div>
                            </div>
                            <div class="col-12 text-right">
                                <input type="hidden" name="MODE" value="VEC_MEETING">
                                <input type="submit" id="Save_button" value="Submit" class="btn btn-primary">
                            </div>
                        </div>

                    </div>

                </div>

            </div>
    </form>
</div>
</div>

<?php include('../includes/footer.php'); ?>
<script>
$("#VEC_MEETING").on("submit", function(event) {
    event.preventDefault();
    if ($("#meeting_date").val() == '') {
        $("#meeting_date").css("border", "7px solid red")
    } else if ($("#meeting_place").val() == '') {
        $("#meeting_place").css("border", "7px solid red")
    } else if ($("#meeting_no").val() == '') {
        $("#meeting_no").css("border", "7px solid red")
    } else if ($("#Agenda").val() == '') {
        $("#Agenda").css("border", "7px solid red")
    } else if ($("#Proceedings").val() == '') {
        $("#Proceedings").css("border", "7px solid red")
    } else if ($("#present").val() == '') {
        $("#present").css("border", "7px solid red")
    } else if ($("#absent").val() == '') {
        $("#absent").css("border", "7px solid red")
    } else {
        $.ajax({
            type: "POST",
            url: "../includes/process.php",
            // data: "MODE=teacherForm&count="+teacher+"&" + $('#teacherForm').serialize(),
            data: new FormData($('#VEC_MEETING')[0]),
            processData: false,
            contentType: false,
            beforeSend: function() {
                $("#Save_button").attr("disabled");
            },

            success: function(data) {
                if (data === '1') {
                    alert("Meeting detail Added SuccessFully!");
                    $('#VEC_MEETING').trigger("reset");
                    $("#Save_button").removeAttr("disabled", true);
                } else {
                    alert("Something Went Wrong. Please try again");
                    $("#Save_button").removeAttr("disabled", true);
                    console.log(data)
                }
            }
        });
    }

});
</script>