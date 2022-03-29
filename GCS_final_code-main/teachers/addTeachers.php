<?php 
include('../includes/header.php');
  
?>

<!--  END SIDEBAR  -->
<div class="row layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <form id="teacherForm">
                <div class="tab-pane active show fade" id="rounded-pills-icon-teachers" role="tabpanel"
                    aria-labelledby="rounded-pills-icon-settings-tab">
                    <div class="col-11 mx-auto">
                        <div class="form-card">
                            <div class="row">
                                <style>
                                    .tbody td {
                                        padding: 0 !important;
                                        margin-bottom: 0px !important;
                                    }

                                    .tbody .form-control {
                                        border-color: transparent;
                                    }

                                    .csvf_table th {
                                        text-align: center;
                                    }
                                </style>

                                <div class="csvf_table" class="col-md-12 col-12">
                                    <div class="table-responsive ">
                                        <div class="row mx-0" id="data_here">
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Teacher Name *</b></p>
                                                    <label for="village" class="sr-only">Village</label>
                                                    <input type="text" id="2" name="Teacher[]" class="form-control"
                                                        required="">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Father / Husband *</b></p>
                                                    <label for="Father / Husband" class="sr-only">Father / Husband
                                                        *</label>
                                                    <input type="text" id="0" name="Fname[]" class="form-control"
                                                        required="">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Gender *</b></p>
                                                    <label for="Gender" class="sr-only">Gender</label>
                                                    <select class="form-control" id="Gender" name="Gender[]"
                                                        required="">
                                                        <option value="">--SELECT--</option>
                                                        <option value="0">Male</option>
                                                        <option value="1">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Date Of Birth *</b></p>
                                                    <label for="village" class="sr-only">Date Of Birth</label>
                                                    <input type="date" id="1" name="Dob[]" class="form-control"
                                                        required="">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Last Degree / Certificate *</b>
                                                    </p><label for="Last Degree / Certificate " class="sr-only">Last
                                                        Degree /
                                                        Certificate </label>
                                                    <select class="form-control" id="last_Degree" name="last_Degree[]"
                                                        required="">
                                                        <option value="">--SELECT--</option>
                                                        <option value="SSC">SSC</option>
                                                        <option value="FA/Fsc">FA/Fsc</option>
                                                        <option value="BA/Bsc">BA/Bsc</option>
                                                        <option value="BS">BS</option>
                                                        <option value="MA/Msc">MA/Msc</option>
                                                        <option value="MS">MS</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Subject *</b></p>
                                                    <label for="Subject" class="sr-only">Subject</label>
                                                    <input type="text" id="3" name="Subject[]" class="form-control"
                                                        required="">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Professional Qualification *</b>
                                                    </p><label for="village" class="sr-only">Professional
                                                        Qualification</label>
                                                    <select class="form-control" id="Qualification"
                                                        name="Qualification[]" required="">
                                                        <option value="">--SELECT--</option>
                                                        <option value="NIL">NIL</option>
                                                        <option value="PTC">PTC</option>
                                                        <option value="CT">CT</option>
                                                        <option value="ADE">ADE</option>
                                                        <option value="B.ED">B.ED</option>
                                                        <option value="M.ED">M.ED</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Date of Joining *</b></p>
                                                    <label for="Teaching Experience" class="sr-only">Date of
                                                        Joining</label>
                                                    <input type="date" value="<?php echo $result['Experience']?>"
                                                        name="Experience[]" class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                                <div class="form-group">
                                                    <p><b>CNIC# *</b></p>
                                                    <label for="CNIC" class="sr-only">CNIC</label>
                                                    <input type="number" id="4" name="CNIC[]" class="form-control"
                                                        required="">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Bank Name *</b></p>
                                                    <label for="Bank Name" class="sr-only">Bank Name</label>
                                                    <input type="text" id="5" name="Bank_Name[]" class="form-control"
                                                        required="">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Branch Code *</b></p>
                                                    <label for="Branch Code" class="sr-only">Branch Code</label>
                                                    <input type="text" id="6" name="Branch_Code[]" class="form-control"
                                                        required="">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Account# *</b></p>
                                                    <label for="Account" class="sr-only">Account</label>
                                                    <input type="text" id="7" name="Account[]" class="form-control"
                                                        required="">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Disability *</b></p>
                                                    <label for="Disability" class="sr-only">Disability</label>
                                                    <input type="text" id="8" name="Disability[]" class="form-control"
                                                        required="">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Marital Status *</b></p>
                                                    <label for="Marital Status" class="sr-only">Marital Status</label>
                                                    <select class="form-control" id="Marital_Status"
                                                        name="Marital_Status[]" required="">
                                                        <option value="">--SELECT--</option>
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Widow">Widow</option>
                                                        <option value="Divorced">Divorced</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Contact# *</b></p>
                                                    <label for="Contact" class="sr-only">Contact</label>
                                                    <input type="number" id="9" name="Contact[]" class="form-control"
                                                        required="">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Whatsapp# *</b></p>
                                                    <label for="Whatsapp" class="sr-only">Whatsapp</label>
                                                    <input type="number" id="10" name="Whatsapp[]" class="form-control"
                                                        required="">
                                                </div>
                                            </div>

                                        </div>
                                        <div id="button-here" class="text-right"><button class="btn btn-info mr-2"
                                                onclick="data_add()">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <input type="submit" class="mt-4 btn btn-primary" value="Save and Next">
                        </div>
                    </div>
                </div>
            </form>

            <?php 
include('../includes/footer.php');  
?>
            <script>
                var teacher = 1;

                function data_add() {
                    teacher = teacher + 1;
                    $("#data_here").append(` <div style="height:30px; background:#f1f2f3; width:100%;"class="my-2"></div> <div class="row mx-0">
    <div class="col-xl-3 col-lg-4 col-md-6 col-12">
    <div class="form-group">
        <p><b>Teacher Name *</b></p>
        <label for="village" class="sr-only">Village</label>
        <input type="text" name="Teacher[]" class="form-control" required="">
    </div>
</div>
<div class="col-xl-3 col-lg-4 col-md-6 col-12">
    <div class="form-group">
        <p><b>Father / Husband *</b></p>
        <label for="Father / Husband" class="sr-only">Father / Husband *</label>
        <input type="text" name="Fname[]" class="form-control" required="">
    </div>
</div>
<div class="col-xl-3 col-lg-4 col-md-6 col-12">
<div class="form-group">
    <p><b>Gender *</b></p>
    <label for="Gender" class="sr-only">Gender</label>
    <select class="form-control" id="Gender" name="Gender[]" required="">
        <option value="">--SELECT--</option>
        <option value="0">Male</option>
        <option value="1">Female</option>
    </select>
</div>
                            </div>
<div class="col-xl-3 col-lg-4 col-md-6 col-12">
    <div class="form-group">
        <p><b>Date Of Birth *</b></p>
        <label for="village" class="sr-only">Date Of Birth</label>
        <input type="date" name="Dob[]" class="form-control" required="">
    </div>
</div>
<div class="col-xl-3 col-lg-4 col-md-6 col-12">
    <div class="form-group">
        <p><b>Last Degree / Certificate *</b>
        </p><label for="Last Degree / Certificate " class="sr-only">Last Degree / Certificate </label>
        <select class="form-control" id="last_Degree" name="last_Degree[]" required="">
            <option value="">--SELECT--</option>
            <option value="SSC">SSC</option>
            <option value="FA/Fsc">FA/Fsc</option>
            <option value="BA/Bsc">BA/Bsc</option>
            <option value="BS">BS</option>
            <option value="MA/Msc">MA/Msc</option>
            <option value="MS">MS</option>
        </select>
    </div>
</div>
<div class="col-xl-3 col-lg-4 col-md-6 col-12">
    <div class="form-group">
        <p><b>Subject *</b></p>
        <label for="Subject" class="sr-only">Subject</label>
        <input type="text" name="Subject[]" class="form-control" required="">
        
    </div>
</div>
<div class="col-xl-3 col-lg-4 col-md-6 col-12">
    <div class="form-group">
        <p><b>Professional Qualification *</b>
        </p><label for="village" class="sr-only">Professional Qualification</label>
        <select class="form-control" id="Qualification" name="Qualification[]" required="">
            <option value="">--SELECT--</option>
            <option value="PTC">PTC</option>
            <option value="CT">CT</option>
            <option value="ADE">ADE</option>
            <option value="B.ED">B.ED</option>
            <option value="M.ED">M.ED</option>
        </select>
    </div>
</div>
<div class="col-xl-3 col-lg-4 col-md-6 col-12">
    <div class="form-group">
        <p><b>Date of Joining *</b></p>
                 <label for="Teaching Experience" class="sr-only">Date of Joining</label>
                 <input type="date" name="Experience[]" class="form-control" required="">
    </div>
</div>
<div class="col-xl-3 col-lg-4 col-md-6 col-12">
    <div class="form-group">
        <p><b>CNIC# *</b></p>
        <label for="CNIC" class="sr-only">CNIC</label>
        <input type="number" name="CNIC[]" class="form-control" required="">
    </div>
</div>
<div class="col-xl-3 col-lg-4 col-md-6 col-12">
    <div class="form-group">
        <p><b>Bank Name *</b></p>
        <label for="Bank Name" class="sr-only">Bank Name</label>
        <input type="text" name="Bank_Name[]" class="form-control" required="">
    </div>
</div>
<div class="col-xl-3 col-lg-4 col-md-6 col-12">
    <div class="form-group">
        <p><b>Branch Code *</b></p>
        <label for="Branch Code" class="sr-only">Branch Code</label>
        <input type="text" name="Brack_Code[]" class="form-control" required="">
    </div>
</div>
<div class="col-xl-3 col-lg-4 col-md-6 col-12">
    <div class="form-group">
        <p><b>Account# *</b></p>
        <label for="Account" class="sr-only">Account</label>
        <input type="text" name="Account[]" class="form-control" required="">
    </div>
</div>
<div class="col-xl-3 col-lg-4 col-md-6 col-12">
    <div class="form-group">
        <p><b>Disability# *</b></p>
        <label for="Disability" class="sr-only">Disability</label>
        <input type="text" name="Disability[]" class="form-control" required="">
    </div>
</div>
<div class="col-xl-3 col-lg-4 col-md-6 col-12">
    <div class="form-group">
        <p><b>Marital Status *</b></p>
        <label for="Marital Status" class="sr-only">Marital Status</label>
        <select class="form-control" id="Marital_Status" name="Marital_Status[]" required="">
            <option value="">--SELECT--</option>
            <option value="Single">Single</option>
            <option value="Married">Married</option>
            <option value="Widow">Widow</option>
            <option value="Divorced">Divorced</option>
        </select>
    </div>
</div>
<div class="col-xl-3 col-lg-4 col-md-6 col-12">
    <div class="form-group">
        <p><b>Contact# *</b></p>
        <label for="Contact" class="sr-only">Contact</label>
        <input type="number" name="Contact[]" class="form-control" required="">
    </div>
</div>
<div class="col-xl-3 col-lg-4 col-md-6 col-12">
    <div class="form-group">
        <p><b>Whatsapp# *</b></p>
        <label for="Whatsapp" class="sr-only">Whatsapp</label>
        <input type="number" name="Whatsapp[]" class="form-control" required="">
    </div>
</div>
    </div>`);
                }


                $("#teacherForm").on("submit", function (event) {
                    event.preventDefault();
                    if ($("#0").val() == '') {
                        $("#0").css("border", "7px solid red")
                    } else if ($("#1").val() == '') {
                        $("#1").css("border", "7px solid red")
                    } else if ($("#2").val() == '') {
                        $("#2").css("border", "7px solid red")
                    } else if ($("#3").val() == '') {
                        $("#3").css("border", "7px solid red")
                    } else if ($("#4").val() == '') {
                        $("#4").css("border", "7px solid red")
                    } else if ($("#5").val() == '') {
                        $("#5").css("border", "7px solid red")
                    } else if ($("#6").val() == '') {
                        $("#6").css("border", "7px solid red")
                    } else if ($("#7").val() == '') {
                        $("#7").css("border", "7px solid red")
                    } else if ($("#8").val() == '') {
                        $("#8").css("border", "7px solid red")
                    } else if ($("#9").val() == '') {
                        $("#8").css("border", "7px solid red")
                    } else if ($("#10").val() == '') {
                        $("#8").css("border", "7px solid red")
                    } else {
                        $.ajax({
                            type: "POST",
                            url: "../includes/process.php",
                            data: "MODE=teacherForm&count=" + teacher + "&" + $('#teacherForm')
                                .serialize(),
                            success: function (data) {
                                if (data === '1' || data === '11' || data === '111' || data ===
                                    '1111' || data === '11111' || data === '111111') {
                                    $('#teacherForm').trigger("reset");
                                    // console.log(data);
                                } else {
                                    alert("Please Fill All Input Correctly");
                                }
                            }
                        });
                    }
                })
            </script>