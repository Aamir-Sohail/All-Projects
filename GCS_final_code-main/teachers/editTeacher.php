<?php
include('../includes/header.php'); 
if(isset($_GET['teacherId'])){
    $teacherId = $datafetch->filter_data($_GET['teacherId']);
    
  
    $row = $datafetch->get_teacher_details($teacherId);
}
?>
<div class="row layout-top-spacing">
                    <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
  <div class="col-xl-12 col-md-12 col-sm-12 col-12">
<form id="teacherForm" onsubmit="return false">
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
                                        <input type="text" name="Teacher" class="form-control" value="<?php echo $row['Teacher_Name'];?>">
                                        <input type="hidden" name="MODE" value='teacherFormFilled'>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                    <div class="form-group">
                                        <p><b>Father / Husband *</b></p>
                                        <label for="Father / Husband" class="sr-only">Father / Husband *</label>
                                        <input type="text" name="Fname" class="form-control" value="<?php echo $row['Father_Name'];?>">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                    <div class="form-group">
                                        <p><b>Gender *</b></p>
                                        <label for="Gender" class="sr-only">Gender</label>
                                        <select class="form-control" id="Gender" name="Gender">
                                            <?php echo $row['Gender'];if($row['Gender'] == 0){
                                            echo ' <option value="0" selected>Male</option>
                                            <option value="1">Female</option>';
                                        }else{
                                            echo ' <option value="0" >Male</option>
                                            <option value="1" selected>Female</option>';
                                        } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                    <div class="form-group">
                                        <p><b>Date Of Birth *</b></p>
                                        <label for="village" class="sr-only">Date Of Birth</label>
                                        <input type="date" name="Dob" class="form-control" value="<?php echo $row['DOB'];?>">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                    <div class="form-group">
                                        <p><b>Last Degree / Certificate *</b>
                                        </p><label for="Last Degree / Certificate " class="sr-only">Last Degree /
                                            Certificate </label>
                                        <select class="form-control" id="last_Degree" name="last_Degree">
                                            <option value="<?php echo $row['Degree']?>"><?php echo $row['Degree']?></option>
                                        <option value="SSC" selected>SSC</option>
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
                                        <input type="text" name="Subject" class="form-control" value="<?php echo $row['Subject'];?>">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                    <div class="form-group">
                                        <p><b>Professional Qualification *</b>
                                        </p><label for="village" class="sr-only">Professional Qualification</label>
                                        <select class="form-control" id="Qualification" name="Qualification">
                                              <option value="<?php echo $row['Qualification']?>"><?php echo $row['Subject']?></option>
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
                                        <input type="date" value="<?php echo $row['Experience']?>"
                                            name="Experience" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                    <div class="form-group">
                                        <p><b>CNIC# *</b></p>
                                        <label for="CNIC" class="sr-only">CNIC</label>
                                        <input type="number" name="CNIC" class="form-control" value="<?php echo $row['CNIC'];?>">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                    <div class="form-group">
                                        <p><b>Bank Name *</b></p>
                                        <label for="Bank Name" class="sr-only">Bank Name</label>
                                        <input type="text" name="Bank_Name" class="form-control" value="<?php echo $row['Bank_Name'];?>">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                    <div class="form-group">
                                        <p><b>Branch Code *</b></p>
                                        <label for="Branch Code" class="sr-only">Branch Code</label>
                                        <input type="text" name="Branch_Code" class="form-control" value="<?php echo $row['Bank_Code'];?>">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                    <div class="form-group">
                                        <p><b>Account# *</b></p>
                                        <label for="Account" class="sr-only">Account</label>
                                        <input type="text" name="Account" class="form-control" value="<?php echo $row['Account'];?>">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                    <div class="form-group">
                                        <p><b>Disability *</b></p>
                                        <label for="Disability" class="sr-only">Disability</label>
                                        <input type="text" name="Disability" class="form-control" value="<?php echo $row['Disability'];?>">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                    <div class="form-group">
                                        <p><b>Marital Status *</b></p>
                                        <label for="Marital Status" class="sr-only">Marital Status</label>
                                        <select class="form-control" id="Marital_Status" name="Marital_Status"
                                            >
                                            <option value="<?php echo $row['Marital_Status']?>"><?php echo $row['Marital_Status']?></option>
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
                                        <input type="number" name="Contact" class="form-control" value="<?php echo $row['Contact'];?>">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                    <div class="form-group">
                                        <p><b>Whatsapp# *</b></p>
                                        <label for="Whatsapp" class="sr-only">Whatsapp</label>
                                        <input type="number" name="Whatsapp" class="form-control" value="<?php echo $row['Whatsapp'];?>">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <button type="submit"
                    class="mt-4 btn btn-primary" onclick="saveNext(event);">Update</button>
            </div>
        </div>
    </div>
</form>

<script>
    // $(".Form_B").mask("00000-0000000-0");
    // $(".Mobile").mask("0000-0000000");

    $("#District").on('change', function() {
        let data = this.value;
        $.ajax({
            type: "POST",
            url: "../includes/process.php",
            data: "MODE=district" + "&district=" + data,
            success: function(data) {
                $("#Tehsil").append(data);
            }
        });
    });
    $("#Tehsil").on('change', function() {
        let data = this.value;
        $.ajax({
            type: "POST",
            url: "includes/process.php",
            data: "MODE=tehsil" + "&tehsil=" + data,
            success: function(data) {
                $("#UC").append(data);
            }
        });
    });

    $("#teacherForm").submit(function(event) {
        event.preventDefault();
    });



    function saveNext(event) {
        event.preventDefault();
       
        $.ajax({
            type: "POST",
            url: "../includes/process.php",
            data: new FormData($('#teacherForm')[0]),
            processData: false,
            contentType: false,
            success: function(data) {
               
                if(data === '1'){
                    window.location.replace("teacherDetails.php");
                  
                }else{
                    alert(data);
                }
            }
        });
    }
</script>
<?php include('../includes/footer.php'); ?>