<?php include('../includes/header.php'); ?>
<style>
    * {
        margin: 0;
        padding: 0
    }

    html {
        height: 100%
    }

    p {
        color: grey
    }

    #heading {
        text-transform: uppercase;
        color: #673AB7;
        font-weight: normal
    }

    #msform {
        text-align: center;
        position: relative;
        margin-top: 20px
    }

    #msform fieldset {
        background: white;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        padding-bottom: 20px;
        position: relative
    }

    .form-card {
        text-align: left
    }

    #msform fieldset:not(:first-of-type) {
        display: none
    }


    #msform .action-button {
        width: 100px;
        background: #673AB7;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 0px 10px 5px;
        float: right
    }

    #msform .action-button:hover,
    #msform .action-button:focus {
        background-color: #311B92
    }

    #msform .action-button-previous {
        width: 100px;
        background: #616161;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px 10px 0px;
        float: right
    }

    #msform .action-button-previous:hover,
    #msform .action-button-previous:focus {
        background-color: #000000
    }

    .card {
        z-index: 0;
        border: none;
        position: relative
    }

    .fs-title {
        font-size: 25px;
        color: #673AB7;
        margin-bottom: 15px;
        font-weight: normal;
        text-align: left
    }

    .purple-text {
        color: #673AB7;
        font-weight: normal
    }

    .steps {
        font-size: 25px;
        color: gray;
        margin-bottom: 10px;
        font-weight: normal;
        text-align: right
    }

    .fieldlabels {
        color: gray;
        text-align: left
    }

    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        color: lightgrey
    }

    #progressbar .active {
        color: #673AB7
    }

    #progressbar li {
        list-style-type: none;
        font-size: 15px;
        width: 16.6%;
        float: left;
        position: relative;
        font-weight: 400
    }

    #progressbar #account:before {
        font-family: FontAwesome;
        content: "\f13e"
    }

    #progressbar #personal:before {
        font-family: FontAwesome;
        content: "\f007"
    }

    #progressbar #payment:before {
        font-family: FontAwesome;
        content: "\f030"
    }

    #progressbar #confirm:before {
        font-family: FontAwesome;
        content: "\f00c"
    }

    #progressbar li:before {
        width: 50px;
        height: 50px;
        line-height: 45px;
        display: block;
        font-size: 20px;
        color: #ffffff;
        background: lightgray;
        border-radius: 50%;
        margin: 0 auto 10px auto;
        padding: 2px
    }

    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: lightgray;
        position: absolute;
        left: 0;
        top: 25px;
        z-index: -1
    }

    #progressbar li.active:before,
    #progressbar li.active:after {
        background: #673AB7
    }

    .progress {
        height: 20px
    }

    .progress-bar {
        background-color: #673AB7
    }

    .fit-image {
        width: 100%;
        object-fit: cover
    }

    td {
        padding: 0 5px;
    }
</style>

<?php $count = $datafetch->update_basic_check($SchoolCode, 'esef_school_basic');
if ($count == 0) {
?>

    <div class="row layout-top-spacing mx-0 " style="width:100%">
        <div class="layout-spacing col-12">
            <div class="statbox widget box box-shadow pt-1">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-11 col-sm-10 col-md-10 col-lg-12 text-center p-0 mb-2">
                            <div class="card px-0 pb-0 mb-3">
                                <form id="basic" class="mt-3">
                                    <div class="tab-pane active show fade" id="rounded-pills-icon-home" role="tabpanel" aria-labelledby="rounded-pills-icon-home-tab">
                                        <div class="col-11 mx-auto">
                                            <div class="form-card">
                                                <div class="row">
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>District *</b></p><label for="District" class="sr-only">District</label>
                                                            <select class="form-control" id="District" name="District" >
                                                                <option value="">--SELECT--</option>
                                                                <?php
                                                                $district = $datafetch->fetch_districts();
                                                                print_r($district);
                                                                foreach ($district as $row) {
                                                                    echo ' <option value="' . $row['DistrictCode'] . '">' . $row['DistrictName'] . '</option>';
                                                                } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>NA *</b></p><label for="NA" class="sr-only">NA</label>
                                                            <select class="form-control" id="NA" name="NA" >
                                                                <option value="">--SELECT--</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>PK *</b></p><label for="PK" class="sr-only">PK</label>
                                                            <select class="form-control" id="PK" name="PK" >
                                                                <option value="">--SELECT--</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>Tehsil *</b></p><label for="Tehsil" class="sr-only">Tehsil</label>
                                                            <select class="form-control" id="Tehsil" name="Tehsil" >
                                                                <option value="">--SELECT--</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>UC *</b></p><label for="UC" class="sr-only">UC</label>
                                                            <select class="form-control" id="UC" name="UC" >
                                                                <option value="">--SELECT--</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>VC *</b></p><label for="VC" class="sr-only">VC</label>
                                                            <input type="text" name="VC" id="0"class="form-control" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>Village *</b></p><label for="village" class="sr-only">Village</label>
                                                            <input type="text" id="1"name="Village" class="form-control" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>Mohallah *</b></p><label for="Mohalla" class="sr-only">Mohalla</label>
                                                            <input type="text" id="2"name="Mohalla" class="form-control" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>Landmark *</b></p><label for="landmark" class="sr-only">Landmark</label>
                                                            <input type="text"id="3" name="landmark" class="form-control" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>X-Cord *</b></p><label for="X-Cord" class="sr-only">X-Cord</label>
                                                            <input type="text" id="4"name="X-cord" class="form-control" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>Y-Cord *</b></p><label for="Y-Cord" class="sr-only">Y-Cord</label>
                                                            <input type="text"id="5" name="Y-cord" class="form-control" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>Project *</b></p><label for="Y-Cord" class="sr-only">Project</label>
                                                            <input type="text" id="6"name="Program" class="form-control" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 col-12">
                                                        <div class="form-group">
                                                            <p><b>CS Name *</b></p>
                                                            <label for="CS_Name" class="sr-only">CS Name</label>
                                                            <input type="text" id="7"class="form-control" name="CS_Name" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>CS Code *</b></p>
                                                            <label for="CS Code" class="sr-only">CS Code</label>
                                                            <input type="text" id="8"class="form-control" name="CS_Code" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 col-12">
                                                        <div class="form-group">
                                                            <p><b>CS Type *</b></p>
                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="GCS" name="CS_Type" checked>
                                                                <span class="new-control-indicator"></span>GCS
                                                            </label>

                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="CFS" name="CS_Type">
                                                                <span class="new-control-indicator"></span>CFS
                                                            </label>

                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="CBEC" name="CS_Type">
                                                                <span class="new-control-indicator"></span>CBEC
                                                            </label>

                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="BECS" name="CS_Type">
                                                                <span class="new-control-indicator"></span>BECS
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>Status *</b></p><label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="0" name="status" checked>
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
                                                                <input type="radio" class="new-control-input" value="0" name="Building_Ownership" checked>
                                                                <span class="new-control-indicator"></span>Govt
                                                            </label>

                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="2" name="Building_Ownership">
                                                                <span class="new-control-indicator"></span>Communal
                                                            </label>

                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="3" name="Building_Ownership">
                                                                <span class="new-control-indicator"></span>Personal / Rental
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>Gender *</b></p>
                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="0" name="gender" checked>
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
                                                                <input type="radio" class="new-control-input" value="Pakka" name="buildling_structure" checked>
                                                                <span class="new-control-indicator"></span>Pakka
                                                            </label>

                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="Kacha" name="buildling_structure">
                                                                <span class="new-control-indicator"></span>Kacha
                                                            </label>

                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="Mixed" name="buildling_structure">
                                                                <span class="new-control-indicator"></span>Mixed
                                                            </label>
                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="Open air (Partial)" name="buildling_structure">
                                                                <span class="new-control-indicator"></span>Open
                                                                air (Partial)
                                                            </label>

                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="Open air (Complete)" name="buildling_structure">
                                                                <span class="new-control-indicator"></span>Open
                                                                air (Complete) </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>School Level *</b></p><label for="School Level" class="sr-only">School Level</label>
                                                            <select class="form-control" id="SchoolLevel" name="School_Level" >
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
                                                                <input type="radio" class="new-control-input" value="Urban" name="area" checked>
                                                                <span class="new-control-indicator"></span>Urban
                                                            </label>

                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="Semi Urban" name="area">
                                                                <span class="new-control-indicator"></span>Semi Urban
                                                            </label>

                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="Rural Plain" name="area">
                                                                <span class="new-control-indicator"></span>Rural Plain
                                                            </label>
                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="Rural Hilly" name="area">
                                                                <span class="new-control-indicator"></span>Rural Hilly
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>Transport Required *</b></p>
                                                            <label for="Transport" class="sr-only">Transport</label>
                                                            <select class="form-control" id="Transport" name="Transport" >
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
                                            <div class="text-right">
                                                <input type="submit" value="Update" name="txt" class="mt-4 btn btn-primary">
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php
} else {

    $result = $datafetch->Fetch_basic('esef_school_basic', $SchoolCode);


?>


    <div class="row layout-top-spacing mx-0 " style="width:100%">
        <div class="layout-spacing col-12">
            <div class="statbox widget box box-shadow pt-1">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-11 col-sm-10 col-md-10 col-lg-12 text-center p-0 mb-2">
                            <div class="card px-0 pb-0 mb-3">
                                <form id="basic_1">
                                    <div class="tab-pane active show fade" id="rounded-pills-icon-home" role="tabpanel" aria-labelledby="rounded-pills-icon-home-tab">
                                        <div class="col-11 mx-auto">
                                            <div class="form-card">
                                                <div class="row">
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>District *</b></p><label for="District" class="sr-only">District</label>
                                                            <select class="form-control" id="District" name="District">
                                                                <?php

                                                                $districtCode = $result['DistrictCode'];

                                                                $district = $datafetch->Fetch_basic_district('esef_district', $districtCode);

                                                                echo ' <option value=' . $districtCode . '>' . $district['DistrictName'] . '</option>';
                                                                ?>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>NA *</b></p><label for="NA" class="sr-only">NA</label>
                                                            <select class="form-control" id="NA" name="NA">
                                                                <?php
                                                                $NA = $result['NA'];
                                                                $district = $datafetch->Fetch_basic_NA('esef_na_lookup', $NA);
                                                                echo ' <option value=' . $district['AutoID'] . '>' . $district['NA'] . '</option>';
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>PK *</b></p><label for="PK" class="sr-only">PK</label>
                                                            <select class="form-control" id="PK" name="PK">
                                                                <?php
                                                                $PK = $result['PK'];

                                                                $district = $datafetch->Fetch_basic_NA('esef_pk_lookup', $PK);
                                                                echo ' <option value="' . $district['AutoID'] . '">' . $district['PK'] . '</option>';
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>Tehsil *</b></p><label for="Tehsil" class="sr-only">Tehsil</label>
                                                            <select class="form-control" id="Tehsil" name="Tehsil">
                                                                <?php
                                                                $TehsilCode = $result['Tehsil'];
                                                                $district = $datafetch->Fetch_basic_Tehsil($TehsilCode);

                                                                echo ' <option value="' . $district['TehsilCode'] . '">' . $district['TehsilName'] . '</option>';
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>UC *</b></p><label for="UC" class="sr-only">UC</label>
                                                            <select class="form-control" id="UC" name="UC">
                                                                <?php
                                                                $UC = $result['UC'];
                                                                $district = $datafetch->Fetch_basic_UC($UC);
                                                                echo ' <option value="' . $district['TehsilCode'] . '">' . $district['UnionCouncilName'] . '</option>';
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>VC *</b></p><label for="VC" class="sr-only">VC</label>
                                                            <input type="text" name="VC" id="0" class="form-control" value="<?php echo $result['VC']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>Village *</b></p><label for="village" class="sr-only">Village</label>
                                                            <input type="text" name="Village"id="1" class="form-control" value="<?php echo $result['Village']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>Mohallah *</b></p><label for="Mohalla" class="sr-only">Mohalla</label>
                                                            <input type="text" name="Mohalla" id="2"class="form-control" value="<?php echo $result['Mohallah']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>Landmark *</b></p><label for="landmark" class="sr-only">Landmark</label>
                                                            <input type="text" name="landmark" id="3"class="form-control" value="<?php echo $result['Landmark']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>X-Cord *</b></p><label for="X-Cord" class="sr-only">X-Cord</label>
                                                            <input type="text" name="X-cord" id="4"class="form-control" value="<?php echo $result['X_Cord']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>Y-Cord *</b></p><label for="Y-Cord" class="sr-only">Y-Cord</label>
                                                            <input type="text" name="Y-cord" id="5"class="form-control" value="<?php echo $result['Y_Cord']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>Program *</b></p><label for="Y-Cord" class="sr-only">Program</label>
                                                            <input type="text" name="Program"id="6" class="form-control" value="<?php echo $result['Program']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 col-12">
                                                        <div class="form-group">
                                                            <p><b>CS Name *</b></p>
                                                            <label for="CS_Name" class="sr-only">CS Name</label>
                                                            <input type="text" class="form-control"id="7" name="CS_Name" value="<?php echo $result['CS_Name']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>CS Code *</b></p>
                                                            <label for="CS Code" class="sr-only">CS Code</label>
                                                            <input type="text" class="form-control" id="8"name="CS_Code" value="<?php echo $result['CS_Code']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 col-12">
                                                        <div class="form-group">
                                                            <p><b>CS Type *</b></p>
                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="GCS" name="CS_Type" <?php if ($result['CS_Type'] == "GCS") {
                                                                                                                                                echo "checked";
                                                                                                                                            } ?>>
                                                                <span class="new-control-indicator"></span>GCS
                                                            </label>

                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="CFS" name="CS_Type" <?php if ($result['CS_Type'] == "CFS") {
                                                                                                                                                echo "checked";
                                                                                                                                            } ?>>
                                                                <span class="new-control-indicator"></span>CFS
                                                            </label>

                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="CBEC" name="CS_Type" <?php if ($result['CS_Type'] == "CBEC") {
                                                                                                                                                echo "checked";
                                                                                                                                            } ?>>
                                                                <span class="new-control-indicator"></span>CBEC
                                                            </label>

                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="BECS" name="CS_Type" <?php if ($result['CS_Type'] == "BECS") {
                                                                                                                                                echo "checked";
                                                                                                                                            } ?>>
                                                                <span class="new-control-indicator"></span>BECS
                                                            </label>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>Status *</b></p><label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="0" name="status" <?php if ($result['Status'] == "0") {
                                                                                                                                            echo "checked";
                                                                                                                                        } ?>>
                                                                <span class="new-control-indicator"></span>Functional
                                                            </label>
                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="1" name="status" <?php if ($result['Status'] == "1") {
                                                                                                                                            echo "checked";
                                                                                                                                        } ?>>
                                                                <span class="new-control-indicator"></span>Non-Functional
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 col-12">
                                                        <div class="form-group">
                                                            <p><b>Building Ownership *</b></p>
                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="0" name="Building_Ownership" <?php if ($result['Building_Ownership'] == "0") {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } ?>>
                                                                <span class="new-control-indicator"></span>Govt
                                                            </label>

                                                            <!-- <label class="new-control new-radio radio-classic-secondary">
                                <input type="radio" class="new-control-input" value="1" name="Building_Ownership" <?php if ($result['Building_Ownership'] == "1") {
                                                                                                                        echo "checked";
                                                                                                                    } ?> >
                                <span class="new-control-indicator"></span>VEC
                            </label> -->
                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="2" name="Building_Ownership" <?php if ($result['Building_Ownership'] == "2") {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } ?>>
                                                                <span class="new-control-indicator"></span>Communal
                                                            </label>

                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="3" name="Building_Ownership" <?php if ($result['Building_Ownership'] == "3") {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } ?>>
                                                                <span class="new-control-indicator"></span>Personal / Rental
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>Gender *</b></p>
                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="0" name="gender" <?php if ($result['Gender'] == "0") {
                                                                                                                                            echo "checked";
                                                                                                                                        } ?>>
                                                                <span class="new-control-indicator"></span>Girls
                                                            </label>

                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="1" name="gender" <?php if ($result['Gender'] == "1") {
                                                                                                                                            echo "checked";
                                                                                                                                        } ?>>
                                                                <span class="new-control-indicator"></span>Boys
                                                            </label>

                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="2" name="gender" <?php if ($result['Gender'] == "2") {
                                                                                                                                            echo "checked";
                                                                                                                                        } ?>>
                                                                <span class="new-control-indicator"></span>Co-ed
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 col-12 pr-0">
                                                        <div class="form-group">
                                                            <p><b>Building Structure *</b></p>
                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="Pakka" name="buildling_structure" <?php if ($result['Building_Structure'] == "Pakka") {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?>>
                                                                <span class="new-control-indicator"></span>Pakka
                                                            </label>

                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="Kacha" name="buildling_structure" <?php if ($result['Building_Structure'] == "Kacha") {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?>>
                                                                <span class="new-control-indicator"></span>Kacha
                                                            </label>

                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="Mixed" name="buildling_structure" <?php if ($result['Building_Structure'] == "Mixed") {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?>>
                                                                <span class="new-control-indicator"></span>Mixed
                                                            </label>
                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="Open air (Partial)" name="buildling_structure" <?php if ($result['Building_Structure'] == "Open air (Partial)") {
                                                                                                                                                                        echo "checked";
                                                                                                                                                                    } ?>>
                                                                <span class="new-control-indicator"></span>Open
                                                                air (Partial)
                                                            </label>

                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="Open air (Complete)" name="buildling_structure" <?php if ($result['Building_Structure'] == "Open air (Complete)") {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        } ?>>
                                                                <span class="new-control-indicator"></span>Open
                                                                air (Complete) </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>School Level *</b></p><label for="School Level" class="sr-only">School Level</label>
                                                            <select class="form-control" id="SchoolLevel" name="School_Level">
                                                                <?php if ($result['School_level'] == '0') {
                                                                    echo '<option value="0" selected>Primary</option>';
                                                                    echo '<option value="1">Middle</option>';
                                                                } else {
                                                                    echo '<option value="1" selected>Middle</option>';
                                                                    echo '<option value="0">Primary</option>';
                                                                } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 col-12 pr-0">
                                                        <div class="form-group">
                                                            <p><b>Area *</b></p>
                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="Urban" name="area" <?php if ($result['Area'] == "Urban") {
                                                                                                                                            echo "checked";
                                                                                                                                        } ?>>
                                                                <span class="new-control-indicator"></span>Urban
                                                            </label>

                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="Semi Urban" name="area" <?php if ($result['Area'] == "Semi Urban") {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?>>
                                                                <span class="new-control-indicator"></span>Semi Urban
                                                            </label>

                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="Rural Plain" name="area" <?php if ($result['Area'] == "Rural Plain") {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?>>
                                                                <span class="new-control-indicator"></span>Rural Plain
                                                            </label>
                                                            <label class="new-control new-radio radio-classic-secondary">
                                                                <input type="radio" class="new-control-input" value="Rural Hilly" name="area" <?php if ($result['Area'] == "Rural Hilly") {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?>>
                                                                <span class="new-control-indicator"></span>Rural Hilly
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <p><b>Transport Required *</b></p>
                                                            <label for="Transport" class="sr-only">Transport</label>
                                                            <select class="form-control" id="Transport" name="Transport">
                                                                <?php
                                                                if ($result['Transport'] == "0") {
                                                                    echo '<option value="0" selected>All Vehicles</option>
                                    <option value="1">Small Vehicles</option>;
                                    <option value="2">4x4 Vehicles</option>
                                    <option value="3">Not Accessible / By Foot</option>';
                                                                } elseif ($result['Transport'] == "1") {
                                                                    echo '<option value="0" selected>All Vehicles</option>
                                    <option value="1" selected>Small Vehicles</option>;
                                    <option value="2">4x4 Vehicles</option>
                                    <option value="3">Not Accessible / By Foot</option>';
                                                                } elseif ($result['Transport'] == "2") {
                                                                    echo '<option value="0" selected>All Vehicles</option>
                                    <option value="1">Small Vehicles</option>;
                                    <option value="2" selected>4x4 Vehicles</option>
                                    <option value="3">Not Accessible / By Foot</option>';
                                                                } elseif ($result['Transport'] == "3") {
                                                                    echo '<option value="0" selected>All Vehicles</option>
                                    <option value="1">Small Vehicles</option>;
                                    <option value="2">4x4 Vehicles</option>
                                    <option value="3" selected>Not Accessible / By Foot</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-3 col-sm-3 col-md-2 ml-auto">

                                                </div>
                                                <div class="col-3 col-sm-3 col-md-2">
                                                    <input type="submit" value="Update" name="txt" class="mt-4 btn btn-primary w-100 d-block py-2">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php } include('../includes/footer.php'); ?>
<script>
        $("#basic").submit(function(event) {
            event.preventDefault();
        });

        $("#District").on('change', function() {
        let data = this.value;
        $.ajax({
            type: "POST",
            url: "/includes/process.php",
            data: "MODE=district" + "&district=" + data,
            success: function(data) {
                $("#Tehsil").html(data);
            }
        });
        $.ajax({
            type: "POST",
            url: "/includes/process.php",
            data: "MODE=NA" + "&district=" + data,
            success: function(data) {
                $("#NA").html(data);
            }
        });
        $.ajax({
            type: "POST",
            url: "/includes/process.php",
            data: "MODE=PK" + "&district=" + data,
            success: function(data) {
                $("#PK").html(data);
            }
        });
    });
    $("#Tehsil").on('change', function() {
        let data = this.value;
        $.ajax({
            type: "POST",
            url: "/includes/process.php",
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
            url: "/includes/process.php",
            data: "MODE=UC" + "&UC=" + data,
            success: function(data) {
                $("#VC").html(data);
            }
        });
    });

        $('#othercs').click(function() {
            if ($('#othercs').is(':checked')) {
                $("#otherReason").removeAttr('disabled');
            }
        });
        $("#basic_1").on("submit", function(event) {
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
                data: "MODE=Basic_update&" + $('#basic_1').serialize(),
                success: function(data) {
                    if (data === '11') {
                        $("#basic").load(location.href + " #basic");
                        alert("Data Updated SuccessFully!");
                    } else {
                        alert("Please Fill All Input Correctly");
                    }
                }
            }); 
        }
        });


        $("#basic").on("submit", function(event) {
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
                data: "MODE=formData&" + $('#basic').serialize(),
                success: function(data) {
                    if (data === '1') {
                        alert("Data Added SuccessFully!");
                    } else {
                        alert("Something Went Wrong!");
                        console.log(data);
                    }
                }
            });}
        });
</script>
