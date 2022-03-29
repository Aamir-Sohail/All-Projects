<?php include('../includes/header.php');?>
<style>
     /* {
        margin: 0;
        padding: 0
    } */

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
<?php
    $count = $datafetch->Facilities_rowCount($SchoolCode);
    if ($count == 0) {
    ?>
<div class="row layout-top-spacing mx-0 " style="width:100%">
    <div class="layout-spacing col-12">
        <div class="statbox widget box box-shadow pt-1">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-11 col-sm-10 col-md-10 col-lg-12 text-center p-0 mb-2">
                        <div class="card px-0 pb-0 mb-3">
                        <form id="Facilities">
                            <div class="tab-pane active show fade" id="rounded-pills-icon-Facilitites" role="tabpanel" aria-labelledby="rounded-pills-icon-settings-tab">
                                <div class="col-11 mx-auto">
                                    <div class="row">
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <p><b>Date of Establishment</b></p>
                                                <label for="Ownership" class="sr-only">Ownership</label>
                                                <input type="date" name="Ownership" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <p><b>No Of Rooms </b></p>
                                                <label for="No Of Rooms" class="sr-only">No Of Rooms</label>
                                                <input type="number" name="Rooms" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <p><b>Physical Status</b></p>
                                                <label for="Physical Status" class="sr-only">Physical Status</label>
                                                <select class="form-control" id="Status" name="Status" required="">
                                                    <option value="">SELECT</option>
                                                    <option value="Separated">Separated</option>
                                                    <option value="Within Home Permises">Within Home Premises</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <p><b>Rooms Other Use</b></p>
                                                <label for="Rooms Other Use" class="sr-only">Rooms Other Use</label>
                                                <select class="form-control" id="RoomUse" name="RoomUse" required="">
                                                    <option value="">SELECT</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <p><b>Boundry Wall</b></p>
                                                <label for="Boundry Wall" class="sr-only">Boundry Wall</label>
                                                <select class="form-control" id="BoundryWall" name="BoundryWall" required="">
                                                    <option value="">SELECT</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <p><b>Extra Space</b></p>
                                                <label for="Extra Space" class="sr-only">Extra Space</label>
                                                <select class="form-control" id="ExtraSpace" name="ExtraSpace" required="">
                                                    <option value="">SELECT</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <p><b>Ventilation </b></p>
                                                <label for="Ventilation" class="sr-only">Ventilation</label>
                                                <select class="form-control" id="Ventilation" name="Ventilation" required="">
                                                    <option value="">SELECT</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <p><b>Electricity </b></p>
                                                <label for="Electricity" class="sr-only">Electricity</label>
                                                <select class="form-control" id="Electricity" name="Electricity" required="">
                                                    <option value="">SELECT</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <p><b>Solar </b></p>
                                                <label for="Solar" class="sr-only">Solar</label>
                                                <select class="form-control" id="Solar" name="Solar" required="">
                                                    <option value="">SELECT</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <p><b>Lights/Bulbs </b></p>
                                                <label for="Lights/Bulbs" class="sr-only">Lights/Bulbs</label>
                                                <select class="form-control" id="Lights" name="Lights" required="">
                                                    <option value="">SELECT</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <p><b>Toilet</b></p>
                                                <label for="Toilet" class="sr-only">Toilet</label>
                                                <select class="form-control" id="Toilet" name="Toilet" required="">
                                                    <option value="">SELECT</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <p><b>Fans</b></p>
                                                <label for="Fans" class="sr-only">Fans</label>
                                                <select class="form-control" id="Fans" name="Fans" required="">
                                                    <option value="">SELECT</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <p><b>Water Supply</b></p>
                                                <label for="Water Supply" class="sr-only">Water Supply</label>
                                                <select class="form-control" id="Water" name="Water" required="">
                                                    <option value="">SELECT</option>
                                                    <option value="No Source">No Source</option>
                                                    <option value="Piped Scheme">Piped Scheme</option>
                                                    <option value="Dug Well">Dug Well</option>
                                                    <option value="Hand Pump">Hand Pump</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <p><b>Veranda </b></p>
                                                <label for="Veranda" class="sr-only">Veranda</label>
                                                <select class="form-control" id="Veranda" name="Veranda" required="">
                                                    <option value="">SELECT</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <p><b>Playground </b></p>
                                                <label for="Playground" class="sr-only">Playground</label>
                                                <select class="form-control" id="Playground" name="Playground" required="">
                                                    <option value="">SELECT</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <p><b>Teacher Chairs</b></p>
                                                <label for="Teacher Chairs" class="sr-only">Teacher Chairs</label>
                                                <input type="number" name="TeacherChair" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <p><b>Teacher Tables</b></p>
                                                <label for="Teacher Tables" class="sr-only">Teacher Tables</label>
                                                <input type="number" name="TeacherTable" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <p><b>Cupboard </b></p>
                                                <label for="Cupboard" class="sr-only">Cupboard</label>
                                                <input type="number" name="Cupboard" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <p><b>Black Board </b></p>
                                                <label for="Black Board" class="sr-only">Black Board</label>
                                                <input type="number" name="BlackBoard" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <p><b>Students Chairs </b></p>
                                                <label for="Students Chairs" class="sr-only">Students Chairs</label>
                                                <input type="number" name="StudentChairs" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <p><b>Water Cooler </b></p>
                                                <label for="Water Cooler" class="sr-only">Water Cooler</label>
                                                <input type="number" name="WaterCooler" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <p><b>Mats</b></p>
                                                <label for="Mats" class="sr-only">Mats</label>
                                                <input type="number" name="Mats" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <p><b>School Bell </b></p>
                                                <label for="School Bell" class="sr-only">School Bell</label>
                                                <input type="number" name="SchoolBell" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <p><b>TLM/Charts</b></p>
                                                <label for="TLM/Charts" class="sr-only">TLM/Charts</label>
                                                <input type="number" name="TLM" class="form-control" required="">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="text-right">
                                        <input type="submit" value="Save and Next"  name="txt" class="mt-4 btn btn-primary">
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
    }else{
        $row = $datafetch->Facilities_fetch($SchoolCode);
       
?>
<!-- if facilities exist -->
<div class="row layout-top-spacing mx-0 " style="width:100%">
    <div class="layout-spacing col-12">
        <div class="statbox widget box box-shadow pt-1">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-11 col-sm-10 col-md-10 col-lg-12 text-center p-0 mb-2">
                        <div class="card px-0 pb-0 mb-3">
                            <form id="Facilities">
                                <div class="tab-pane active show fade" id="rounded-pills-icon-Facilitites" role="tabpanel"
                                    aria-labelledby="rounded-pills-icon-settings-tab">
                                    <div class="col-11 mx-auto">
                                        <div class="row">
                                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Date of Establishment</b></p>
                                                    <label for="Date of Establishment" class="sr-only">Date of Establishment</label>
                                                    <input type="date" name="Ownership" value="<?php echo $row['Ownership']; ?>"
                                                        class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                                <div class="form-group">
                                                    <p><b>No Of Rooms </b></p>
                                                    <label for="No Of Rooms" class="sr-only">No Of Rooms</label>
                                                    <input type="number" name="Rooms" value="<?php echo $row['Rooms']; ?>" class="form-control"
                                                        required="">
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Physical Status</b></p>
                                                    <label for="Physical Status" class="sr-only">Physical Status</label>
                                                    <select class="form-control" id="Status" name="Status" required="">
                                                        <?php if ($row['Status'] == "Separated") {
                                        echo '<option value="Separated" selected>Separated</option>';
                                        echo '<option value="Within Home Permises">Within Home Permises</option>';
                                    } else {
                                        echo '<option value="Within Home Permises" >Within Home Permises</option>';
                                        echo '<option value="Separated" selected>Separated</option>';
                                    } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Rooms Other Use</b></p>
                                                    <label for="Rooms Other Use" class="sr-only">Rooms Other Use</label>
                                                    <select class="form-control" id="RoomUse" name="RoomUse" required="">
                                                        <?php if ($row['RoomUse'] == "Yes") {
                                        echo '<option value="Yes" selected>Yes</option>';
                                        echo '<option value="No">No</option>';
                                    } else {
                                        echo '<option value="No" selected>No</option>';
                                        echo '<option value="Yes">Yes</option>';
                                    } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Boundry Wall</b></p>
                                                    <label for="Boundry Wall" class="sr-only">Boundry Wall</label>
                                                    <select class="form-control" id="BoundryWall" name="BoundryWall" required="">
                                                        <?php if ($row['BoundryWall'] == "Yes") {
                                        echo '<option value="Yes" selected>Yes</option>';
                                        echo '<option value="No">No</option>';
                                    } else {
                                        echo '<option value="No" selected>No</option>';
                                        echo '<option value="Yes">Yes</option>';
                                    } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Extra Space</b></p>
                                                    <label for="Extra Space" class="sr-only">Extra Space</label>
                                                    <select class="form-control" id="ExtraSpace" name="ExtraSpace" required="">
                                                        <?php if ($row['ExtraSpace'] == "Yes") {
                                        echo '<option value="Yes" selected>Yes</option>';
                                        echo '<option value="No">No</option>';
                                    } else {
                                        echo '<option value="No" selected>No</option>';
                                        echo '<option value="Yes">Yes</option>';
                                    } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Ventilation </b></p>
                                                    <label for="Ventilation" class="sr-only">Ventilation</label>
                                                    <select class="form-control" id="Ventilation" name="Ventilation" required="">
                                                        <?php if ($row['Ventilation'] == "Yes") {
                                        echo '<option value="Yes" selected>Yes</option>';
                                        echo '<option value="No">No</option>';
                                    } else {
                                        echo '<option value="No" selected>No</option>';
                                        echo '<option value="Yes">Yes</option>';
                                    } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Electricity </b></p>
                                                    <label for="Electricity" class="sr-only">Electricity</label>
                                                    <select class="form-control" id="Electricity" name="Electricity" required="">
                                                        <?php if ($row['Electricity'] == "Yes") {
                                        echo '<option value="Yes" selected>Yes</option>';
                                        echo '<option value="No">No</option>';
                                    } else {
                                        echo '<option value="No" selected>No</option>';
                                        echo '<option value="Yes">Yes</option>';
                                    } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Solar </b></p>
                                                    <label for="Solar" class="sr-only">Solar</label>
                                                    <select class="form-control" id="Solar" name="Solar" required="">
                                                        <?php if ($row['Solar'] == "Yes") {
                                        echo '<option value="Yes" selected>Yes</option>';
                                        echo '<option value="No">No</option>';
                                    } else {
                                        echo '<option value="No" selected>No</option>';
                                        echo '<option value="Yes">Yes</option>';
                                    } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Lights/Bulbs </b></p>
                                                    <label for="Lights/Bulbs" class="sr-only">Lights/Bulbs</label>
                                                    <select class="form-control" id="Lights" name="Lights" required="">
                                                        <?php if ($row['Lights'] == "Yes") {
                                        echo '<option value="Yes" selected>Yes</option>';
                                        echo '<option value="No">No</option>';
                                    } else {
                                        echo '<option value="No" selected>No</option>';
                                        echo '<option value="Yes">Yes</option>';
                                    } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Toilet</b></p>
                                                    <label for="Toilet" class="sr-only">Toilet</label>
                                                    <select class="form-control" id="Toilet" name="Toilet" required="">
                                                        <?php if ($row['Toilet'] == "Yes") {
                                        echo '<option value="Yes" selected>Yes</option>';
                                        echo '<option value="No">No</option>';
                                    } else {
                                        echo '<option value="No" selected>No</option>';
                                        echo '<option value="Yes">Yes</option>';
                                    } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Fans</b></p>
                                                    <label for="Fans" class="sr-only">Fans</label>
                                                    <select class="form-control" id="Fans" name="Fans" required="">
                                                        <?php if ($row['Fans'] == "Yes") {
                                        echo '<option value="Yes" selected>Yes</option>';
                                        echo '<option value="No">No</option>';
                                    } else {
                                        echo '<option value="No" selected>No</option>';
                                        echo '<option value="Yes">Yes</option>';
                                    } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Water Supply</b></p>
                                                    <label for="Water Supply" class="sr-only">Water Supply</label>
                                                    <select class="form-control" id="Water" name="Water" required="">
                                                        <?php if ($row['Water'] == "No Source") {
                                        echo '
                                                            <option value="No Source" selected>No Source</option>
                                                            <option value="Piped Scheme">Piped Scheme</option>
                                                            <option value="Dug Well">Dug Well</option>
                                                            <option value="Hand Pump">Hand Pump</option>';
                                    } elseif ($row['Water'] == "Piped Scheme") {
                                        echo '
                                                            <option value="No Source" >No Source</option>
                                                            <option value="Piped Scheme" selected>Piped Scheme</option>
                                                            <option value="Dug Well">Dug Well</option>
                                                            <option value="Hand Pump">Hand Pump</option>';
                                    } elseif ($row['Water'] == "Dug Well") {
                                        echo '  <option value="No Source">No Source</option>
                                                            <option value="Piped Scheme">Piped Scheme</option>
                                                            <option value="Dug Well" selected>Dug Well</option>
                                                            <option value="Hand Pump">Hand Pump</option>';
                                    } elseif ($row['Water'] == "Hand Pump") {
                                        echo '<option value="No Source">No Source</option>
                                                            <option value="Piped Scheme">Piped Scheme</option>
                                                            <option value="Dug Well">Dug Well</option>
                                                            <option value="Hand Pump" selected>Hand Pump</option>';
                                    } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Veranda </b></p>
                                                    <label for="Veranda" class="sr-only">Veranda</label>
                                                    <select class="form-control" id="Veranda" name="Veranda" required="">
                                                        <?php if ($row['Veranda'] == "Yes") {
                                        echo '<option value="Yes" selected>Yes</option>';
                                        echo '<option value="No">No</option>';
                                    } else {
                                        echo '<option value="No" selected>No</option>';
                                        echo '<option value="Yes">Yes</option>';
                                    } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Playground </b></p>
                                                    <label for="Playground" class="sr-only">Playground</label>
                                                    <select class="form-control" id="Playground" name="Playground" required="">
                                                        <?php if ($row['Playground'] == "Yes") {
                                        echo '<option value="Yes" selected>Yes</option>';
                                        echo '<option value="No">No</option>';
                                    } else {
                                        echo '<option value="No" selected>No</option>';
                                        echo '<option value="Yes">Yes</option>';
                                    } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Teacher Chairs</b></p>
                                                    <label for="Teacher Chairs" class="sr-only">Teacher Chairs</label>
                                                    <input type="number" value="<?php echo $row['TeacherChair']?>" name="TeacherChair"
                                                        class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Teacher Tables</b></p>
                                                    <label for="Teacher Tables" class="sr-only">Teacher Tables</label>
                                                    <input type="number" value="<?php echo $row['TeacherTable']?>" name="TeacherTable"
                                                        class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Cupboard </b></p>
                                                    <label for="Cupboard" class="sr-only">Cupboard</label>
                                                    <input type="number" value="<?php echo $row['Cupboard']?>" name="Cupboard" class="form-control"
                                                        required="">
                                                </div>
                                            </div>

                                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Black Board </b></p>
                                                    <label for="Black Board" class="sr-only">Black Board</label>
                                                    <input type="number" value="<?php echo $row['BlackBoard']?>" name="BlackBoard"
                                                        class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Students Chairs </b></p>
                                                    <label for="Students Chairs" class="sr-only">Students Chairs</label>
                                                    <input type="number" value="<?php echo $row['StudentChairs']?>" name="StudentChairs"
                                                        class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Water Cooler </b></p>
                                                    <label for="Water Cooler" class="sr-only">Water Cooler</label>
                                                    <input type="number" value="<?php echo $row['WaterCooler']?>" name="WaterCooler"
                                                        class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p><b>Mats</b></p>
                                                    <label for="Mats" class="sr-only">Mats</label>
                                                    <input type="number" value="<?php echo $row['Mats']?>" name="Mats" class="form-control"
                                                        required="">
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p><b>School Bell </b></p>
                                                    <label for="School Bell" class="sr-only">School Bell</label>
                                                    <input type="number" value="<?php echo $row['SchoolBell']?>" name="SchoolBell"
                                                        class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p><b>TLM/Charts</b></p>
                                                    <label for="TLM/Charts" class="sr-only">TLM/Charts</label>
                                                    <input type="number" value="<?php echo $row['TLM']?>" name="TLM" class="form-control"
                                                        required="">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-5 col-sm-3 col-md-2 ml-auto">
                                            <input type="button" value="Update" onclick="saveNext()" name="txt"
                                                class="mt-4 btn btn-primary w-100 d-block py-2">
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
    include('../includes/footer.php');
?>
<script>
    $("#Facilities").submit(function (event) {
        event.preventDefault();
    });


    function saveNext() {
        $.ajax({
            type: "POST",
            url: "../includes/process.php",
            data: "MODE=Facilities_update&" + $('#Facilities').serialize(),
            success: function (data) {
                console.log(data);
                if (data === '1') {
                    $("#Facilities").load(location.href + " #Facilities");
                } else {
                    alert("Please Fill All Input Correctly");
                }
            }
        });
    }
</script>
<?php
    }
?>
<?php include('../includes/footer.php');

?>

<script>
    function add_tr() {
        $(".tbody").append(
            ` <tr> <td> <div class=""> <input type="number"class="form-control"required=""> </div> </td> <td> <div class=""> <select class="form-control"id="District"name="District"required=""> <option value="">SELECT</option> <option value="1">Primary</option> <option value="1">Middle</option> <option value="1">High</option> <option value="1">Higher Secondary</option> </select> </div> </td> <td> <div class=""> <select class="form-control"id="District"name="District"required=""> <option value="">SELECT</option> <option value="1">Boys</option> <option value="1">Girls</option> <option value="1">Co-ed</option> </select> </div> </td> <td> <div class=""> <input type="number"class="form-control"required=""> </div> </td> <td> <div class=""> <input type="number"class="form-control"required=""> </div> </td> </tr> `
        );
    }

    function remove_tr() {
        $(".tbody  tr:last").remove();
    }

    function data_add() {
        $("#data_here").append(` <div style="height:30px; background:#f1f2f3; width:100%;"class="my-2"></div> <div class="row mx-0"> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Teacher Name </b></p> <label for="village"class="sr-only">Village</label> <input type="number"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>D / S / H </b></p> <label for="village"class="sr-only">Village</label> <input type="number"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Gender </b></p> <label for="village"class="sr-only">Village</label> <input type="number"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Date Of Birth </b></p> <label for="village"class="sr-only">Village</label> <input type="date"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Last Degree / Certificate </b></p> <label for="village"class="sr-only">Village</label> <select class="form-control"id="District"
        name="District"required=""> <option value="">SELECT</option> <option value="1">SSC</option> <option value="1">FA/Fsc</option> <option value="1">BA/Bsc</option> <option value="1">BS</option> <option value="1">MA/Msc</option> <option value="1">MS</option> </select> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Subject </b></p> <label for="village"class="sr-only">Village</label> <input type="number"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Professional Qualification </b></p> <label for="village"class="sr-only">Village</label> <select class="form-control"id="District"
        name="District"required=""> <option value="">SELECT</option> <option value="1">PTC</option> <option value="1">CT</option> <option value="1">ADE</option> <option value="1">B.ED</option> <option value="1">M.ED</option> </select> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Teaching Experience </b></p> <label for="village"class="sr-only">Village</label> <input type="date"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>CNIC# </b></p> <label for="village"class="sr-only">Village</label> <input type="number"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Bank Name </b></p> <label for="village"class="sr-only">Village</label> <input type="number"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Branch Code </b></p> <label for="village"class="sr-only">Village</label> <input type="number"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Account# </b></p> <label for="village"class="sr-only">Village</label> <input type="number"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Disability# </b></p> <label for="village"class="sr-only">Village</label> <input type="number"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Marital Status </b></p> <label for="village"class="sr-only">Village</label> <select class="form-control"id="District"
        name="District"required=""> <option value="">SELECT</option> <option value="1">Single</option> <option value="1">Married</option> <option value="1">Widow</option> <option value="1">Divorced</option> </select> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Contact# </b></p> <label for="village"class="sr-only">Village</label> <input type="number"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Whatsapp# </b></p> <label for="village"class="sr-only">Village</label> <input type="number"name="Village"class="form-control"
        required=""> </div> </div> </div>`);
    }
</script>
<script>

$("#Facilities").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "../includes/process.php",
            data: "MODE=Facilities&" + $('#Facilities').serialize(),
            success: function(data) {
                if(data === '1'){
                    $("#Facilities").load(location.href + " #Facilities");
                }else{
                    alert("Please Fill All Input Correctly");
                    console.log(data);
                }
            }
        });
    });
</script>