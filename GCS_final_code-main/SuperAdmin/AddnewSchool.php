<?php include('includes/header.php'); ?>

<div class="row layout-top-spacing mx-0 ">

    <div class="statbox widget box box-shadow px-3 mb-3">

        <div class="widget-content widget-content-area px-0 border-0">

            <div class="widget-header w-100 p-0 mb-3">
                <h4>Teachers Information</h4>
            </div>
            <form id="basic" class="mt-3">
                    
                <div class="form-card">
                    <div class="row">

                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="form-group">
                                <p><b>NA *</b></p><label for="NA" class="sr-only">NA</label>
                                <select class="form-control" id="NA" name="NA">
                                    <option value="">--SELECT--</option>
                                    <?php 
                                    $uc = $datafetch->load_NA($District);
                                    foreach ($uc as $row)
                                    {
                                        echo '<option value="' . $row['AutoID'] . '">' . $row['NA'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="form-group">
                                <p><b>PK *</b></p><label for="PK" class="sr-only">PK</label>
                                <select class="form-control" id="PK" name="PK">
                                    <option value="">--SELECT--</option>
                                    <?php 
                                    $uc = $datafetch->load_PK($District);
                                    foreach ($uc as $row)
                                    {
                                        echo '<option value="' . $row['AutoID'] . '">' . $row['PK'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="form-group">
                                <p><b>Tehsil *</b></p><label for="Tehsil" class="sr-only">Tehsil</label>
                                <select class="form-control" id="Tehsil" name="Tehsil">
                                    <option value="">--SELECT--</option>
                                    <?php 
                                    $result = $datafetch->FetchTehsilThroughDistrict($District);
                                    print_r($result);
                                    foreach($result as $row){
                                        echo '<option value="' . $row['TehsilCode'] . '">' . $row['TehsilName'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="form-group">
                                <p><b>UC *</b></p><label for="UC" class="sr-only">UC</label>
                                <select class="form-control" id="UC" name="UC">
                                    <option value="">--SELECT--</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="form-group">
                                <p><b>VC *</b></p><label for="VC" class="sr-only">VC</label>
                                <input type="text" name="VC" id="0" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="form-group">
                                <p><b>Village *</b></p><label for="village" class="sr-only">Village</label>
                                <input type="text" id="1" name="Village" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="form-group">
                                <p><b>Mohallah *</b></p><label for="Mohalla" class="sr-only">Mohalla</label>
                                <input type="text" id="2" name="Mohalla" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="form-group">
                                <p><b>Landmark *</b></p><label for="landmark"
                                    class="sr-only">Landmark</label>
                                <input type="text" id="3" name="landmark" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="form-group">
                                <p><b>X-Cord *</b></p><label for="X-Cord" class="sr-only">X-Cord</label>
                                <input type="text" id="4" name="X-cord" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="form-group">
                                <p><b>Y-Cord *</b></p><label for="Y-Cord" class="sr-only">Y-Cord</label>
                                <input type="text" id="5" name="Y-cord" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="form-group">
                                <p><b>Project *</b></p><label for="Y-Cord" class="sr-only">Project</label>
                                <input type="text" id="6" name="Program" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-8 col-12">
                            <div class="form-group">
                                <p><b>CS Name *</b></p>
                                <label for="CS_Name" class="sr-only">CS Name</label>
                                <input type="text" id="7" class="form-control" name="CS_Name">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>CS Code *</b></p>
                                <label for="CS Code" class="sr-only">CS Code</label>
                                <input type="text" id="8" class="form-control" name="CS_Code">
                            </div>
                        </div>
                        <div class="col-md-8 col-12">
                            <div class="form-group">
                                <p><b>CS Type *</b></p>
                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" value="GCS" name="CS_Type"
                                        checked>
                                    <span class="new-control-indicator"></span>GCS
                                </label>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" value="CFS"
                                        name="CS_Type">
                                    <span class="new-control-indicator"></span>CFS
                                </label>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" value="CBEC"
                                        name="CS_Type">
                                    <span class="new-control-indicator"></span>CBEC
                                </label>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" value="BECS"
                                        name="CS_Type">
                                    <span class="new-control-indicator"></span>BECS
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Status *</b></p><label
                                    class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" value="0" name="status"
                                        checked>
                                    <span class="new-control-indicator"></span>Functional
                                </label>
                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" value="1" name="status">
                                    <span class="new-control-indicator"></span>Non-Functional
                                </label>
                            </div>
                        </div>
                        <div class="col-md-8 col-12">
                            <div class="form-group">
                                <p><b>Building Ownership *</b></p>
                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" value="0"
                                        name="Building_Ownership" checked>
                                    <span class="new-control-indicator"></span>Govt
                                </label>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" value="2"
                                        name="Building_Ownership">
                                    <span class="new-control-indicator"></span>Communal
                                </label>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" value="3"
                                        name="Building_Ownership">
                                    <span class="new-control-indicator"></span>Personal / Rental
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Gender *</b></p>
                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" value="0" name="gender"
                                        checked>
                                    <span class="new-control-indicator"></span>Girls
                                </label>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" value="1" name="gender">
                                    <span class="new-control-indicator"></span>Boys
                                </label>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" value="2" name="gender">
                                    <span class="new-control-indicator"></span>Co-ed
                                </label>
                            </div>
                        </div>
                        <div class="col-md-8 col-12 pr-0">
                            <div class="form-group">
                                <p><b>Building Structure *</b></p>
                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" value="Pakka"
                                        name="buildling_structure" checked>
                                    <span class="new-control-indicator"></span>Pakka
                                </label>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" value="Kacha"
                                        name="buildling_structure">
                                    <span class="new-control-indicator"></span>Kacha
                                </label>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" value="Mixed"
                                        name="buildling_structure">
                                    <span class="new-control-indicator"></span>Mixed
                                </label>
                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" value="Open air (Partial)"
                                        name="buildling_structure">
                                    <span class="new-control-indicator"></span>Open
                                    air (Partial)
                                </label>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input"
                                        value="Open air (Complete)" name="buildling_structure">
                                    <span class="new-control-indicator"></span>Open
                                    air (Complete) </label>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>School Level *</b></p><label for="School Level" class="sr-only">School
                                    Level</label>
                                <select class="form-control" id="SchoolLevel" name="School_Level">
                                    <option value="">--SELECT--</option>
                                    <option value="0">Primary</option>
                                    <option value="1">Middle</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8 col-12 pr-0">
                            <div class="form-group">
                                <p><b>Area *</b></p>
                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" value="Urban" name="area"
                                        checked>
                                    <span class="new-control-indicator"></span>Urban
                                </label>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" value="Semi Urban"
                                        name="area">
                                    <span class="new-control-indicator"></span>Semi Urban
                                </label>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" value="Rural Plain"
                                        name="area">
                                    <span class="new-control-indicator"></span>Rural Plain
                                </label>
                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" value="Rural Hilly"
                                        name="area">
                                    <span class="new-control-indicator"></span>Rural Hilly
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Transport Required *</b></p>
                                <label for="Transport" class="sr-only">Transport</label>
                                <select class="form-control" id="Transport" name="Transport">
                                    <option value="">--SELECT--</option>
                                    <option value="0">All Vehicles</option>
                                    <option value="1">Small Vehicles</option>
                                    <option value="2">4x4 Vehicles</option>
                                    <option value="3">Not Accessible / By Foot</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
   
    <div class="statbox widget box box-shadow">

        <div class="widget-header">
            <div class="row">
                <div class="col-12 my-3">
                    <!-- <h2 class="fw-bold" >SCHOOL PROFILE</h2> -->
                    <h4 class="p-0" style="font-weight:bold">LOGIN DETAILS :</h4>
                </div>
            </div>
        </div>

        <div class="widget-content widget-content-area border-0">

                <div class="row mb-3">


                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <p><b>Proposed Username *</b></p>
                            <label for="GCS" class="sr-only">GCS</label>
                            <input type="text" class="form-control" name="username" required="">
                        </div>
                    </div>

                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <p><b>Password *</b></p>
                            <label for="GBPS" class="sr-only">GBPS</label>
                            <input type="password" class="form-control" name="pass" required="">
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <p><b>Confirm Password *</b></p>
                            <label for="GBPS" class="sr-only">GBPS</label>
                            <input type="password" class="form-control" name="cpass" required="">
                        </div>
                    </div>

                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <p><b>Responsible Persosn *</b></p>
                            <label for="Responsible Persosn" class="sr-only">Responsible Persosn</label>
                            <input type="text" class="form-control" name="rperson" required="">
                        </div>
                    </div>

                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <p><b>Contact # *</b></p>
                            <label for="GBMS" class="sr-only">GBMS</label>
                            <input type="number" class="form-control" name="contact" required="">
                        </div>
                    </div>

                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <p><b>Email *</b></p>
                            <label for="Community School" class="sr-only">Community School</label>
                            <input type="email" class="form-control" name="email" required="">
                        </div>
                    </div>

                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>


            </form>
        </div>

    </div>


</div>


</div>

<?php include('../includes/footer.php'); ?>
<script>
$("#Tehsil").on('change', function() {
    let data = this.value;
    $.ajax({
        type: "POST",
        url: "../includes/process.php",
        data: "MODE=tehsil" + "&tehsil=" + data,
        success: function(data) {
            $("#UC").html(data);
        }
    });
});
$("#UC").on('change', function() {
    let data = this.value;
    $.ajax({
        type: "POST",
        url: "../includes/process.php",
        data: "MODE=UC" + "&UC=" + data,
        success: function(data) {
            $("#VC").html(data);
        }
    });
});



$("#basic").on("submit", function(event) {
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
    } else {

        $.ajax({
            type: "POST",
            url: "./includes/process.php",
            data: "MODE=DPOSchool&" + $('#basic').serialize(),
            success: function(data) {
                if (data === '1') {
                    alert("Data Added SuccessFully!");
                    window.location.reload();
                } else {
                    alert(data);
                    console.log(data);
                }
            }
        });
    }
});
</script>