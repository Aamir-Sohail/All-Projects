<?php
include('../includes/header.php'); 
if(isset($_GET['student_id'])){
    $user_id = $datafetch->filter_data($_GET['student_id']);
    $user_id = trim($user_id,".php");
    $row = $datafetch->get_student_details($user_id, $_SESSION['SchoolCode']);
}
?>
<div class="row layout-top-spacing">

<div id="basic" class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow p-0">

<div class="widget-content widget-content-area">
<form id="students" enctype="multipart/form-data">
    <div class="tab-pane active show fade" id="rounded-pills-icon-students" role="tabpanel" aria-labelledby="rounded-pills-icon-profile-tab">
        <div class="media">
            <div class="col-11 mx-auto">
                <form method="post">
                    <!----------------------- Admission information----------------------->
                    <div class="row mb-3">
                        <div class="widget-header w-100 p-0 mb-3">
                            <h4>Admission Information</h4>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Admission Date</b></p>
                                <label for="Admision date" class="sr-only">Admision date</label>
                                <input class="form-control" type="date" value="<?php echo $row['DOA'];?>" name="DOA" >
                                
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Admission Class</b></p>
                                <label for="Admission class" class="sr-only">Current Class</label>
                                <select class="form-control" id="AdmiClass" name="AdmissionClass">
                                    <option value="<?php echo $row['AdmissionClass'];?>">
                                    <?php $class = $row['AdmissionClass']; 
                                    $className = $datafetch->getClass_one($class); 
                                    echo $className['ClassName'];
                                     ?>
                                    </option>
                                    <option value="1">PlayGroup</option>
                                    <option value="2">Nursery</option>
                                    <option value="3">Prep</option>
                                    <option value="4">One</option>
                                    <option value="5">Two</option>
                                    <option value="6">Three</option>
                                    <option value="7">Four</option>
                                    <option value="8">Five</option>
                                    <option value="9">Six</option>
                                    <option value="10">Seven</option>
                                    <option value="11">Eight</option>
                                    <option value="12">Nine</option>
                                    <option value="13">Ten</option>
                                    <option value="14">Eleven</option>
                                    <option value="15">Twelve</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>AWR#</b></p>
                                <label for="AWR" class="sr-only">AWR</label>
                                <input id="acdmic-sess" type="text" name="AWR" value="<?php echo $row['AWR'];?>" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                        <div class="form-group">
                            <p><b>Silsila</b></p>
                            <label for="Silsila" class="sr-only">Silsila</label>
                            <input class="t-text form-control" type="text" value="<?php echo $row['silsila'];?>" name="silsila" >
                        </div>
                    </div>
                    </div>

                    <!--------------------- Student information ----------------------->
                    <div class="row mb-3">
                        <div class="widget-header w-100 p-0 mb-3">
                            <h4>Student Information</h4>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Gender</b></p>
                                <label for="gender" class="sr-only">Gender</label>
                                <select class="form-control" id="Gender" name="Gender">
                                    <option value="<?php echo $row['Gender']?>"><?php echo $row['Gender']?></option>
                                    
                                    <option value="Boy">Boy</option>
                                    <option value="Girl">Girl</option>
                                    <option value="Trans">Trans</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Nationality</b></p>
                                <label for="Nationality" class="sr-only">Nationality</label>
                                <select class="form-control" id="Nationality" name="Nationality">
                                    <option value="<?php echo $row['Nationality']?>"><?php echo $row['Nationality']?></option>
                                    <option value="Pakistani">Pakistani</option>
                                    <option value="Afghani">Afghani</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Religion</b></p>
                                <label for="Religion" class="sr-only">Religion</label>
                                <select class="form-control" id="Religion" name="Religion">
                                    <option value="<?php echo $row['Religion']?>"><?php echo $row['Religion']?></option>
                                    <option value="Muslim">Muslim</option>
                                    <option value="Non-Muslim">Non-Muslim</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Student Name</b></p>
                                <label for="Student Name" class="sr-only">Student Name</label>
                                <input id="acdmic-sess" type="text"  value="<?php echo $row['ChildName']?>" name="StudentName" class="form-control" >
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Current Class</b></p>
                                <label for="Current Class" class="sr-only">Current Class</label>
                                <select class="form-control" id="CurrentClass" name="CClass">
                                <option value="<?php echo $row['CClass'];?>">
                                <?php 
                                $class = $row['CClass']; $className = $datafetch->getClass_one($class); echo $className['ClassName']; ?></option>
                                   <option value="1">PlayGroup</option>
                                    <option value="2">Nursery</option>
                                    <option value="3">Prep</option>
                                    <option value="4">One</option>
                                    <option value="5">Two</option>
                                    <option value="6">Three</option>
                                    <option value="7">Four</option>
                                    <option value="8">Five</option>
                                    <option value="9">Six</option>
                                    <option value="10">Seven</option>
                                    <option value="11">Eight</option>
                                    <option value="12">Nine</option>
                                    <option value="13">Ten</option>
                                    <option value="14">Eleven</option>
                                    <option value="15">Twelve</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Disabilities</b></p>
                                <label for="Disabilities" class="sr-only">Disabilities</label>
                                <select class="form-control" id="Disabilities" name="Disabilities">
                                <option value="<?php echo $row['Disabilities']?>"><?php echo $row['Disabilities']?></option>
                                    <option value="No">No</option>
                                    <option value="Yes">Yes</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Date of Birth</b></p>
                                <label for="DOB" class="sr-only">DOB</label>
                                <input class="form-control" type="date" value="<?php echo $row['DOB']?>" name="DOB" >
                            </div>
                        </div>


                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Date of Birth In Words</b></p>
                                <label for="DOB in words" class="sr-only">DOB in words</label>
                                <input id="DOB_Words" type="text"  value="<?php echo $row['DOB_in_Words']?>" name="DOBInWords" class="form-control" >
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Child Form-B</b></p>
                                <label for="Form-B" class="sr-only">Form-B</label>
                                <input type="number" name="Form_B" class="form-control Form_B"  value="<?php echo $row['Form_B']?>"  placeholder="00000-0000000-0">
                            </div>
                        </div>
                        <div class="col-md-4 col-12 align-self-end">
                            <?php
                                if($row['Student_Photo'] != NULL) {
                                    echo '<img src="../uploads/'.$row['Student_Photo'].'" height="100" width="100" name="old_student_image">';
                                }
                            ?>
                            <div class="form-group">
                                <p><b>Upload Student Photo</b></p>
                                <label for="Father Name" class="sr-only">Upload Student Photo</label>
                                <input name="photoimg_student_image" id="photoimg_student_image" type="file" class="form-control-file" style="margin:10 auto">
                            </div>
                        </div>
                        <!-- <div class="col-md-4 col-12 align-self-end">
                            <p><b>Capture Student Photo</b></p>
                            <label for="Father Name" class="sr-only">Capture Student Photo</label>
                            <div class="form-group">
                                <button type="button" onclick="clickPic()" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Capture
                                    Photo</button>

                            </div>
                        </div> -->
                        <div class="col-md-4 col-12 align-self-end">
                            <?php
                                if($row['SLC_Photo'] != NULL) {
                                    echo '<img src="../uploads/'.$row['SLC_Photo'].'" height="100" width="100" name="old_slc_image">';
                                }
                            ?>
                            <div class="form-group">
                                <p><b>Upload School Leaving Certificate</b></p>
                                <label for="Upload School Leaving Certificate" class="sr-only">Upload School Leaving Certificate</label>
                                <input name="SLC_student_image" id="SLC_student_image" type="file" class="form-control-file" style="margin:10 auto">
                            </div>
                        </div>


                    </div>

                    <!------------------------ Parent Information -------------------->
                    <div class="row mb-3">

                        <div class="widget-header w-100 p-0 mb-3">
                            <h4>Parent Information</h4>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Father Name</b></p>
                                <label for="Father Name" class="sr-only">Father Name</label>
                                <input id="f-name" type="text" name="FatherName" value="<?php echo $row['FatherName']?>" class="form-control" >
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Father CNIC</b></p>
                                <label for="f_CNIC" class="sr-only">f_CNIC</label>
                                <input id="f_CNIC" type="text" name="Father_CNIC" value="<?php echo $row['FatherCnic']?>" class="form-control Form_B"  placeholder="00000-0000000-0">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Father Alive?</b></p>
                                <label for="Father_Alive" class="sr-only">Alive</label>
                                <select class="form-control" id="Father_Alive" name="Father_Alive">
                                    <option value="<?php echo $row['Father_Alive']?>"><?php echo $row['Father_Alive']?></option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Father Occupation</b></p>
                                <label for="Occupation" class="sr-only">Occupation</label>
                                <input type="text" class="form-control" name="Occupation" id="Occupation" value="<?php echo $row['Father_Occupation'];?>">
                                <!-- <select class="form-control" id="Occupation" name="Occupation">
                                    <option value="<?php echo $row['Father_Occupation'];?>"><?php echo $row['Father_Occupation']?></option>
                                    <option value="No">No</option>
                                    <option value="Yes">Yes</option>
                                </select> -->
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Father Qualification</b></p>
                                <label for="Father Qualification" class="sr-only">Father Qualification</label>
                                <select class="form-control" id="Qualification" name="Qualification">
                                    <option value="<?php echo $row['Father_Qualification']?>"><?php echo $row['Father_Qualification']?></option>
                                    <option value="Matric">Matric</option>
                                    <option value="FSC">FSC</option>
                                    <option value="Undergraduate">Undergraduate (BS)</option>
                                    <option value="None">None</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Mother Qualification</b></p>
                                <label for="Mother Qualification" class="sr-only">Mother Qualification</label>
                                <select class="form-control" id="MotherQualification" name="MotherQualification">
                                    <option value="<?php echo $row['Mother_Qualification']?>"><?php echo $row['Mother_Qualification']?></option>
                                    <option value="Matric">Matric</option>
                                    <option value="FSC">FSC</option>
                                    <option value="Undergraduate">Undergraduate (BS)</option>
                                    <option value="None">None</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Guardian Name</b></p>
                                <label for="Guardian Name" class="sr-only">Guardian Name</label>
                                <input id="Guardian_Name" value="<?php echo $row['Guardian_Name']?>" type="text" name="Guardian_Name" class="form-control" >
                                <input type="hidden" value="<?php echo $row['AutoID']?>" name="AutoID">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Guardian CNIC</b></p>
                                <label for="Guardian_CNIC" class="sr-only">Guardian_CNIC</label>
                                <input id="Guardian_CNIC" type="number" value="<?php echo $row['Guardian_CNIC']?>" name="Guardian_CNIC" class="form-control Form_B" >
                            </div>
                        </div>
                    </div>

                    <!------------------------ Address book -------------------->
                    <div class="row mb-3">
                        <div class="widget-header w-100 p-0 mb-3">
                            <h4>Address Book</h4>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>District *</b></p><label for="District" class="sr-only">District</label>
                                <select class="form-control" id="District" name="District" ="">
                                    <option value="<?php echo $row['District'];?>">
                                    <?php if(!is_null($row['District'])){$data = $datafetch->fetch_one_districts($row['District']); echo $data['DistrictName'];}?></option>
                                    <?php
                                    $district = $datafetch->fetch_districts();
                                    foreach ($district as $district_one) {
                                        echo ' <option value="' . $district_one['DistrictCode'] . '">' . $district_one['DistrictName'] . '</option>';
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Tehsil *</b></p><label for="Tehsil" class="sr-only">Tehsil</label>
                                <select class="form-control" id="Tehsil" name="Tehsil" ="">
                                    <option value="<?php echo $row['Tehsil'];?>">
                                        <?php if(!is_null($row['Tehsil'])){$data = $datafetch->load_one_Tehsil($row['Tehsil']); echo $data['TehsilName'];}?>
                                    </option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>UC *</b></p><label for="UC" class="sr-only">UC</label>
                                <select class="form-control" id="UC" name="UC" ="">
                                    <option value="<?php echo $row['UnionCouncil'];?>">
                                        <?php // $data = $datafetch->load_one_UC($row['UnionCouncil']); echo $data['UnionCouncilName'];?>
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <p><b>Village</b></p>
                                <label for="Village" class="sr-only">Village</label>
                                <input type="text" value="<?php echo $row['Village']?>" class="form-control" name="Village">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <p><b>Mohallah</b></p>
                                <label for="Mohallah" class="sr-only">Mohallah</label>
                                <input type="text" value="<?php echo $row['Mohallah']?>" class="form-control" name="Mohallah">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <p><b>Mobile (Emergency) #</b></p>
                                <label for="Mobile1" class="sr-only">Mobile1</label>
                                <input type="number" value="<?php echo $row['Contact']?>" class="form-control" name="Mobile1">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <p><b>Mobile (Alternate) #</b></p>
                                <label for="Mobile2" class="sr-only">Mobile2</label>
                                <input type="number"  value="<?php echo $row['Mobile_Alternate']?>" class="form-control" name="Mobile2">
                                <input type="hidden" name="update_student">
                            </div>
                        </div>



                    </div>
                    <div class="text-right">
                        <input type="button" onclick="saveNext();" value="Update"  name="update_student" class="mt-4  mb-3 btn btn-primary">
                    </div>


                </form>
            </div>

        </div>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
            url: "../includes/process.php",
            data: "MODE=tehsil" + "&tehsil=" + data,
            success: function(data) {
                $("#UC").append(data);
            }
        });
    });

    $("#students").submit(function(event) {
        event.preventDefault();
    });

    function saveNext() {
        $.ajax({
            type: "POST",
            url: "../includes/process.php",
            data: new FormData($('#students')[0]),
            processData: false,
            contentType: false,
            success: function(data) {
                console.log(data);
                if(data === '1'){
                    window.location.replace("students_details.php");
                }else{
                    alert(data);
                }
            }
        });
    }
</script>
<?php include('../includes/footer.php'); ?>