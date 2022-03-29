<?php 
    include('../includes/header.php');
?>

<div class="row layout-top-spacing">

    <div id="basic" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow p-0">

    <div class="widget-content widget-content-area">
        <form id="students">
            <div class="modal-body py-4">
                <div class="row">
                    <div class="col-4 mb-2">
                        <p><b>Silsila# </b></p>
                        <input type="text" name="silsla" id="0" class="form-control" required="">
                    </div>
                    <div class="col-4 mb-2">
                        <p><b>Child Name </b></p>
                        <input type="text" name="child_name" id="1"class="form-control" required="">
                    </div>
                    <br>
                    <div class="col-4 mb-2">
                        <p><b>Date of Birth </b></p>
                        <input type="date" class="form-control"id="2" name="DOB" required="">
                    </div>
                    <div class="col-4 mb-2">
                        <p><b>Gender</b></p>
                        <select class="form-control" id="3" name="children_gender" required="">
                            <option value="">--SELECT--
                            </option>
                            <option value="Male">Male
                            </option>
                            <option value="Female">Female
                            </option>
                        </select>
                    </div>
                    <div class="col-4 mb-2">
                        <p><b>Date of Admission </b></p>
                        <input type="date" class="form-control"id="4" name="DOA" required="">
                    </div>
                    <div class="col-4 mb-2">
                        <p><b>Current Class </b></p>
                        <select class="form-control" id="CClass" name="CClass" required="">
                                <option>--SELECT--</option>
                                    <option value="1">PlayGroup</option> <option value="2">Nursery</option> <option value="3">Prep</option> <option value="4">One</option> <option value="5">Two</option> <option value="6">Three</option> <option value="7">Four</option> <option value="8">Five</option> <option value="9">Six</option> <option value="10">Seven</option> <option value="11">Eight</option> <option value="12">Nine</option> <option value="13">Ten</option> <option value="14">Eleven</option> <option value="15">Twelve</option>                                </select>
                    </div>

                    <div class="col-4 mb-2">
                        <p><b>Father Name</b></p>
                        <input type="text" class="form-control"id="5" name="f_name" required="">
                    </div>

                    <div class="col-4 mb-2">
                        <p><b>Father Occupation</b></p>
                        <input type="text" name="Father_Occupation" id="6"class="form-control" required="">
                    </div>
                    <div class="col-4 mb-2">
                        <p><b>Father CNIC</b></p>
                        <input type="number" name="f_cnic"id="7" class="form-control" required="">
                    </div>

                    <div class="col-4">
                        <p><b>Contact #</b></p>
                        <input type="number" name="Mobile1"id="8" class="form-control" required="">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <input class="btn btn-primary" id="Save_button" type="submit" value="Add Student">
            </div>
        </form>
            </div>
        </div>
    </div>


</div>

<!-- copied script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>




 $("#students").on("submit", function (event) {
        event.preventDefault();
        if($("#0").val()==''){
            $("#0").css("border","7px solid red")
        }else if($("#1").val()==''){
            $("#1").css("border","7px solid red")
        }
        else if($("#2").val()==''){
            $("#2").css("border","7px solid red")
        }
        else if($("#3").val()==''){
            $("#3").css("border","7px solid red")
        }
        else if($("#4").val()==''){
            $("#4").css("border","7px solid red")
        }
        else if($("#5").val()==''){
            $("#5").css("border","7px solid red")
        }
        else if($("#6").val()==''){
            $("#6").css("border","7px solid red")
        }
        else if($("#7").val()==''){
            $("#7").css("border","7px solid red")
        }
        else if($("#8").val()==''){
            $("#8").css("border","7px solid red")
        }else{
            $.ajax({
            type: "POST",
            url: "../includes/process.php",
            // data: "MODE=teacherForm&count="+teacher+"&" + $('#teacherForm').serialize(),
            
            data: "MODE=studentForm&" + $('#students').serialize(),
            beforeSend: function() {
                $("#Save_button").attr("disabled");
            },

            success: function(data) {
                if(data === '1'){
                    alert("Student Added SuccessFully!");
                    $('#students').trigger("reset");
                    $("#Save_button").removeattr("disabled",true);
                }else{
                    alert("Please Fill All Input Correctly");
                }
            }
        });
        }
      
    });
</script>
<!-- copied script end -->
<script>
function clickPic(){
var video = document.getElementById('video');

// Get access to the camera!
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    // Not adding `{ audio: true }` since we only want video now
    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
        //video.src = window.URL.createObjectURL(stream);
        video.srcObject = stream;
        video.play();
    });
}
}

function stopVideo() {
    stream.getTracks().forEach(function(track) {
        if (track.readyState == 'live' && track.kind === 'video') {
            track.stop();
        }
    });
}
</script>
<?php include('../includes/footer.php');?>
