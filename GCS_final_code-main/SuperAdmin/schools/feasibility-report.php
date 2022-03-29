<?php include('../includes/header.php'); ?>

<style>

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
        font-weight: 400;
        padding: 0 1px;
    }

    #progressbar #basic:before {
        content: "1";
    }

    #progressbar #nearest_Inst:before {
        content: "2";
    }

    #progressbar #baseline:before {
        content: "3";
    }

    #progressbar #teacherProfile:before {
        content: "4";
    }
    #progressbar #contribution:before {
        content: "5";
    }
    #progressbar #acknowledgement:before {
        content: "6";
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


<div class="row layout-top-spacing mx-0 ">
    <div class="layout-spacing col-12">
        <div class="statbox widget box box-shadow">
            <div class="row justify-content-center">
                <div class="col-12 text-center p-0 mb-2">
                    <div class="card px-0 pt-4 pb-0 mb-3">
                        <form id="msform">

                            <div class="d-none d-md-block">
                                <ul id="progressbar">
                                    <li class="active" id="basic"><strong>Basic Profile</strong></li>
                                    <li id="nearest_Inst"><strong>Nearest Institutions</strong></li>
                                    <li id="baseline"><strong>Baseline</strong></li>
                                    <li id="teacherProfile"><strong>Teacher Profile</strong></li>
                                    <li id="contribution"><strong>Contribution</strong></li>
                                    <li id="acknowledgement"><strong>Acknowledgement</strong></li>
                                </ul>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated"
                                        role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            
                            <br>

                            <fieldset>
                                <div class="form-card">
                                    <h3 class="d-md-none">Basic Profile</h3>
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <p><b>District *</b></p><label for="District"
                                                    class="sr-only">District</label><select class="form-control"
                                                    id="District" name="District" required="">
                                                    <option value="">--SELECT--</option>
                                                    <option value="1">one</option>
                                                    <option value="1">two</option>
                                                    <option value="1">three</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <p><b>Tehsil *</b></p><label for="Tehsil"
                                                    class="sr-only">Tehsil</label><select class="form-control"
                                                    id="Tehsil" name="Tehsil" required="">
                                                    <option value="">--SELECT--</option>
                                                    <option value="1">one</option>
                                                    <option value="1">two</option>
                                                    <option value="1">three</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <p><b>UC *</b></p><label for="UC" class="sr-only">UC</label><select
                                                    class="form-control" name="UC" required="">
                                                    <option value="">--SELECT--</option>
                                                    <option value="1">one</option>
                                                    <option value="1">two</option>
                                                    <option value="1">three</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <p><b>VC *</b></p><label for="VC" class="sr-only">VC</label><select
                                                    class="form-control" id="VC" name="VC" required="">
                                                    <option value="">--SELECT--</option>
                                                    <option value="1">one</option>
                                                    <option value="1">two</option>
                                                    <option value="1">three</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <p><b>Village *</b></p><label for="village"
                                                    class="sr-only">Village</label><input type="text" name="Village"
                                                    class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <p><b>Mohallah *</b></p><label for="Mohalla"
                                                    class="sr-only">Mohalla</label><input type="text" name="Mohalla"
                                                    class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <p><b>Landmark *</b></p><label for="landmark"
                                                    class="sr-only">Landmark</label><input type="text"
                                                    name="landmark" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <p><b>X-Cord *</b></p><label for="X-Cord"
                                                    class="sr-only">X-Cord</label><input type="text" name=""
                                                    class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <p><b>Y-Cord *</b></p><label for="Y-Cord"
                                                    class="sr-only">Y-Cord</label><input type="text" name=""
                                                    class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-12 pr-0">
                                            <div class="form-group">
                                                <p><b>Area *</b></p><label
                                                    class="new-control new-radio radio-classic-secondary"><input
                                                        type="radio" class="new-control-input" name="custom-radio-7"
                                                        checked><span class="new-control-indicator"></span>Urban
                                                </label><label
                                                    class="new-control new-radio radio-classic-secondary"><input
                                                        type="radio" class="new-control-input"
                                                        name="custom-radio-7"><span
                                                        class="new-control-indicator"></span>Semi
                                                    Urban </label><label
                                                    class="new-control new-radio radio-classic-secondary"><input
                                                        type="radio" class="new-control-input"
                                                        name="custom-radio-7"><span
                                                        class="new-control-indicator"></span>Rural
                                                    Plain </label><label
                                                    class="new-control new-radio radio-classic-secondary"><input
                                                        type="radio" class="new-control-input"
                                                        name="custom-radio-7"><span
                                                        class="new-control-indicator"></span>Rural
                                                    Hilly </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <p><b>Transport Required *</b></p><label for="Transport Required"
                                                    class="sr-only">Transport Required</label><input type="text"
                                                    class="form-control" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div><input type="button" name="next" class="next action-button" value="Next" />
                            </fieldset>

                            <fieldset>
                                
                                <div class="form-card">
                                    <h3 class="d-md-none">Nearest Institutions</h3>
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
                                            <div class="table-responsive">
                                                <table class="table table-bordered mb-4">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:390px">School</th>
                                                            <th style="width:200px">Level</th>
                                                            <th style="width:200px">Gender</th>
                                                            <th>EMIS Code</th>
                                                            <th>Distance (In KM)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="tbody">
                                                        <tr>
                                                            <td>
                                                                <div class=""><input type="text"
                                                                        class="form-control" required=""></div>
                                                            </td>
                                                            <td>
                                                                <div class=""><select class="form-control"
                                                                        id="District" name="District" required="">
                                                                        <option value="">--SELECT--
                                                                        </option>
                                                                        <option value="1">Primary
                                                                        </option>
                                                                        <option value="1">Middle
                                                                        </option>
                                                                        <option value="1">High
                                                                        </option>
                                                                        <option value="1">Higher
                                                                            Secondary</option>
                                                                    </select></div>
                                                            </td>
                                                            <td>
                                                                <div class=""><select class="form-control"
                                                                        id="District" name="District" required="">
                                                                        <option value="">--SELECT--
                                                                        </option>
                                                                        <option value="1">Boys
                                                                        </option>
                                                                        <option value="1">Girls
                                                                        </option>
                                                                        <option value="1">Co-ed
                                                                        </option>
                                                                    </select></div>
                                                            </td>
                                                            <td>
                                                                <div class=""><input type="text"
                                                                        class="form-control" required=""></div>
                                                            </td>
                                                            <td>
                                                                <div class=""><input type="number"
                                                                        class="form-control" required=""></div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div id="button-here" class="text-right"><button
                                                        class="btn btn-info ml-3"
                                                        onclick="add_tr()">+</button><button class="btn btn-danger"
                                                        onclick="remove_tr()">-</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><input type="button" name="next" class="next action-button"
                                    value="Next" /><input type="button" name="previous"
                                    class="previous action-button-previous" value="Previous" />
                            </fieldset>

                            <fieldset>
                                <div class="form-card">
                                    <h3 class="d-md-none">Baseline</h3>
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="csvf_table" class="col-md-12 col-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered mb-4">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 200px;">Child Name</th>
                                                                <th style="width: 100px;">Gender</th>
                                                                <th style="width: 100px;">Age</th>
                                                                <th style="width: 200px;">Father Name</th>
                                                                <th>Father CNIC</th>
                                                                <th>Contact#</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="tbody" id="tbody_element">
                                                            <tr>
                                                                <td><input type="text" class="form-control"
                                                                        required=""></td>
                                                                <td><input type="text" class="form-control"
                                                                        required=""></td>
                                                                <td><input type="text" class="form-control"
                                                                        required=""></td>
                                                                <td><input type="text" class="form-control"
                                                                        required=""></td>
                                                                <td><input type="text" class="form-control"
                                                                        required=""></td>
                                                                <td><input type="text" class="form-control"
                                                                        required=""></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div id="button-here" class="text-right"><button
                                                            class="btn btn-info ml-3"
                                                            onclick="add_element()">+</button><button
                                                            class="btn btn-danger"
                                                            onclick="remove_element()">-</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><input type="button" name="next" class="next action-button"
                                    value="Next" /><input type="button" name="previous"
                                    class="previous action-button-previous" value="Previous" />
                            </fieldset>

                            <fieldset>
                                <div class="form-card">
                                    <h3 class="d-md-none">Teacher Profile</h3>
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
                                            <h3>Teacher# 1</h3>
                                                <div class="row mx-0">
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Teacher Name *</b></p><label for="village"
                                                                class="sr-only">Village</label><input type="text"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Father / Husband *</b></p><label for="village"
                                                                class="sr-only">Village</label><input type="text"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Gender *</b></p><label for="village"
                                                                class="sr-only">Village</label><input type="text"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Date Of Birth *</b></p><label for="village"
                                                                class="sr-only">Village</label><input type="date"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Last Degree / Certificate *</b>
                                                            </p><label for="village"
                                                                class="sr-only">Village</label><select
                                                                class="form-control" id="District" name="District"
                                                                required="">
                                                                <option value="">--SELECT--</option>
                                                                <option value="1">SSC</option>
                                                                <option value="1">FA/Fsc</option>
                                                                <option value="1">BA/Bsc</option>
                                                                <option value="1">BS</option>
                                                                <option value="1">MA/Msc</option>
                                                                <option value="1">MS</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Subject *</b></p><label for="village"
                                                                class="sr-only">Village</label><input type="text"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Professional Qualification *</b>
                                                            </p><label for="village"
                                                                class="sr-only">Village</label><select
                                                                class="form-control" id="District" name="District"
                                                                required="">
                                                                <option value="">--SELECT--</option>
                                                                <option value="1">PTC</option>
                                                                <option value="1">CT</option>
                                                                <option value="1">ADE</option>
                                                                <option value="1">B.ED</option>
                                                                <option value="1">M.ED</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Teaching Experience *</b></p>
                                                            <label for="village"
                                                                class="sr-only">Village</label><input type="number"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>CNIC# *</b></p><label for="village"
                                                                class="sr-only">Village</label><input type="number"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Disability# *</b></p><label for="village"
                                                                class="sr-only">Village</label><input type="text"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Marital Status *</b></p><label for="village"
                                                                class="sr-only">Village</label><select
                                                                class="form-control" id="District" name="District"
                                                                required="">
                                                                <option value="">--SELECT--</option>
                                                                <option value="1">Single</option>
                                                                <option value="1">Married</option>
                                                                <option value="1">Widow</option>
                                                                <option value="1">Divorced</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Contact# *</b></p><label for="village"
                                                                class="sr-only">Village</label><input type="number"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Whatsapp# *</b></p><label for="village"
                                                                class="sr-only">Village</label><input type="number"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <h3>Teacher# 2</h3>
                                                <div class="row mx-0">
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Teacher Name *</b></p><label for="village"
                                                                class="sr-only">Village</label><input type="text"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Father / Husband *</b></p><label for="village"
                                                                class="sr-only">Village</label><input type="text"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Gender *</b></p><label for="village"
                                                                class="sr-only">Village</label><input type="text"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Date Of Birth *</b></p><label for="village"
                                                                class="sr-only">Village</label><input type="date"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Last Degree / Certificate *</b>
                                                            </p><label for="village"
                                                                class="sr-only">Village</label><select
                                                                class="form-control" id="District" name="District"
                                                                required="">
                                                                <option value="">--SELECT--</option>
                                                                <option value="1">SSC</option>
                                                                <option value="1">FA/Fsc</option>
                                                                <option value="1">BA/Bsc</option>
                                                                <option value="1">BS</option>
                                                                <option value="1">MA/Msc</option>
                                                                <option value="1">MS</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Subject *</b></p><label for="village"
                                                                class="sr-only">Village</label><input type="text"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Professional Qualification *</b>
                                                            </p><label for="village"
                                                                class="sr-only">Village</label><select
                                                                class="form-control" id="District" name="District"
                                                                required="">
                                                                <option value="">--SELECT--</option>
                                                                <option value="1">PTC</option>
                                                                <option value="1">CT</option>
                                                                <option value="1">ADE</option>
                                                                <option value="1">B.ED</option>
                                                                <option value="1">M.ED</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Teaching Experience *</b></p>
                                                            <label for="village"
                                                                class="sr-only">Village</label><input type="number"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>CNIC# *</b></p><label for="village"
                                                                class="sr-only">Village</label><input type="number"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Disability# *</b></p><label for="village"
                                                                class="sr-only">Village</label><input type="text"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Marital Status *</b></p><label for="village"
                                                                class="sr-only">Village</label><select
                                                                class="form-control" id="District" name="District"
                                                                required="">
                                                                <option value="">--SELECT--</option>
                                                                <option value="1">Single</option>
                                                                <option value="1">Married</option>
                                                                <option value="1">Widow</option>
                                                                <option value="1">Divorced</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Contact# *</b></p><label for="village"
                                                                class="sr-only">Village</label><input type="number"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Whatsapp# *</b></p><label for="village"
                                                                class="sr-only">Village</label><input type="number"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <h3>Teacher# 3</h3>
                                                <div class="row mx-0"  id="data_here">
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Teacher Name *</b></p><label for="village"
                                                                class="sr-only">Village</label><input type="text"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Father / Husband *</b></p><label for="village"
                                                                class="sr-only">Village</label><input type="text"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Gender *</b></p><label for="village"
                                                                class="sr-only">Village</label><input type="text"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Date Of Birth *</b></p><label for="village"
                                                                class="sr-only">Village</label><input type="date"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Last Degree / Certificate *</b>
                                                            </p><label for="village"
                                                                class="sr-only">Village</label><select
                                                                class="form-control" id="District" name="District"
                                                                required="">
                                                                <option value="">--SELECT--</option>
                                                                <option value="1">SSC</option>
                                                                <option value="1">FA/Fsc</option>
                                                                <option value="1">BA/Bsc</option>
                                                                <option value="1">BS</option>
                                                                <option value="1">MA/Msc</option>
                                                                <option value="1">MS</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Subject *</b></p><label for="village"
                                                                class="sr-only">Village</label><input type="text"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Professional Qualification *</b>
                                                            </p><label for="village"
                                                                class="sr-only">Village</label><select
                                                                class="form-control" id="District" name="District"
                                                                required="">
                                                                <option value="">--SELECT--</option>
                                                                <option value="1">PTC</option>
                                                                <option value="1">CT</option>
                                                                <option value="1">ADE</option>
                                                                <option value="1">B.ED</option>
                                                                <option value="1">M.ED</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Teaching Experience *</b></p>
                                                            <label for="village"
                                                                class="sr-only">Village</label><input type="number"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>CNIC# *</b></p><label for="village"
                                                                class="sr-only">Village</label><input type="number"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Disability# *</b></p><label for="village"
                                                                class="sr-only">Village</label><input type="text"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Marital Status *</b></p><label for="village"
                                                                class="sr-only">Village</label><select
                                                                class="form-control" id="District" name="District"
                                                                required="">
                                                                <option value="">--SELECT--</option>
                                                                <option value="1">Single</option>
                                                                <option value="1">Married</option>
                                                                <option value="1">Widow</option>
                                                                <option value="1">Divorced</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Contact# *</b></p><label for="village"
                                                                class="sr-only">Village</label><input type="number"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <p><b>Whatsapp# *</b></p><label for="village"
                                                                class="sr-only">Village</label><input type="number"
                                                                name="Village" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="button-here" class="text-right"><button
                                                        class="btn btn-info" onclick="data_add()">+</button></div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div><input type="button" name="next" class="next action-button"
                                    value="Next" /><input type="button" name="previous"
                                    class="previous action-button-previous" value="Previous" />
                            </fieldset>

                            <fieldset>
                                <h3 class="d-md-none">Contribution</h3>
                                <div class="row">
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <p><b>Rooms Available *</b></p>
                                            <label for="Nearest GCS Code" class="sr-only">Nearest GCS Code</label>
                                            <input type="text" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <p><b>Status</b></p>
                                            <label for="VC" class="sr-only">Status</label>
                                            <select class="form-control" id="VC" name="VC" required="">
                                                <option value="">--SELECT--</option>
                                                <option value="1">Separated</option>
                                                <option value="1">Within Home Permises</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <p><b>Ownership</b></p>
                                            <label for="VC" class="sr-only">Ownership</label>
                                            <select class="form-control" id="VC" name="VC" required="">
                                                <option value="">--SELECT--</option>
                                                <option value="1">Personal</option>
                                                <option value="1">Communal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <p><b> Rooms Other Use</b></p>
                                            <label for="GBMS" class="sr-only">Other Use Of Rooms </label>
                                            <select class="form-control" id="VC" name="VC" required="">
                                                <option value="">--SELECT--</option>
                                                <option value="1">Yes</option>
                                                <option value="1">No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <p><b>Boundry Wall</b></p>
                                            <label for="VC" class="sr-only">Ownership</label>
                                            <select class="form-control" id="VC" name="VC" required="">
                                                <option value="">--SELECT--</option>
                                                <option value="1">Yes</option>
                                                <option value="1">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <p><b>Extension Space </b></p>
                                            <label for="GBMS" class="sr-only">Extension Space</label>
                                            <select class="form-control" id="VC" name="VC" required="">
                                                <option value="">--SELECT--</option>
                                                <option value="1">Yes</option>
                                                <option value="1">No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <p><b>Ventilation *</b></p>
                                            <label for="Nearest GCS Code" class="sr-only">Nearest GCS Code</label>
                                            <select class="form-control" id="VC" name="VC" required="">
                                                <option value="">--SELECT--</option>
                                                <option value="1">Yes</option>
                                                <option value="1">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <p><b>Electricity *</b></p>
                                            <label for="Nearest GCS Code" class="sr-only">Nearest GCS Code</label>
                                            <select class="form-control" id="VC" name="VC" required="">
                                                <option value="">--SELECT--</option>
                                                <option value="1">Yes</option>
                                                <option value="1">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <p><b>Solar *</b></p>
                                            <label for="Nearest GCS Code" class="sr-only">Nearest GCS Code</label>
                                            <select class="form-control" id="VC" name="VC" required="">
                                                <option value="">--SELECT--</option>
                                                <option value="1">Yes</option>
                                                <option value="1">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <p><b>Lights/Bulbs *</b></p>
                                            <label for="Nearest GCS Code" class="sr-only">Nearest GCS Code</label>
                                            <input type="text" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <p><b>Toilet *</b></p>
                                            <label for="Nearest GCS Code" class="sr-only">Nearest GCS Code</label>
                                            <input type="text" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <p><b>Water Supply </b></p>
                                            <label for="GBMS" class="sr-only">Extension Space</label>
                                            <select class="form-control" id="VC" name="VC" required="">
                                                <option value="">--SELECT--</option>
                                                <option value="1">Yes</option>
                                                <option value="1">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <p><b>Varanda </b></p>
                                            <label for="GBMS" class="sr-only">Extension Space</label>
                                            <select class="form-control" id="VC" name="VC" required="">
                                                <option value="">--SELECT--</option>
                                                <option value="1">Yes</option>
                                                <option value="1">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <p><b>Playground </b></p>
                                            <label for="GBMS" class="sr-only">Extension Space</label>
                                            <select class="form-control" id="VC" name="VC" required="">
                                                <option value="">--SELECT--</option>
                                                <option value="1">Yes</option>
                                                <option value="1">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <p><b>Teacher Chairs</b></p>
                                            <label for="Nearest GCS Code" class="sr-only">Nearest GCS Code</label>
                                            <input type="text" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <p><b>Teacher Tables</b></p>
                                            <label for="Nearest GCS Code" class="sr-only">Nearest GCS Code</label>
                                            <input type="text" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <p><b>Cupboard </b></p>
                                            <label for="Nearest GCS Code" class="sr-only">Nearest GCS Code</label>
                                            <input type="text" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <p><b>Black Board </b></p>
                                            <label for="Nearest GCS Code" class="sr-only">Nearest GCS Code</label>
                                            <input type="text" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <p><b>White Board </b></p>
                                            <label for="Nearest GCS Code" class="sr-only">Nearest GCS Code</label>
                                            <input type="text" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <p><b>Notice Board </b></p>
                                            <label for="Nearest GCS Code" class="sr-only">Nearest GCS Code</label>
                                            <input type="text" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <p><b>Water Cooler </b></p>
                                            <label for="Nearest GCS Code" class="sr-only">Nearest GCS Code</label>
                                            <input type="text" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <p><b>Mats</b></p>
                                            <label for="Nearest GCS Code" class="sr-only">Nearest GCS Code</label>
                                            <input type="text" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <p><b>School Bell </b></p>
                                            <label for="Nearest GCS Code" class="sr-only">Nearest GCS Code</label>
                                            <input type="text" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <p><b>TLM/Charts</b></p>
                                            <label for="Nearest GCS Code" class="sr-only">Nearest GCS Code</label>
                                            <input type="text" class="form-control" required="">
                                        </div>
                                    </div>

                                </div>
                                <input type="button" name="next" class="next action-button" value="Next" /><input
                                    type="button" name="previous" class="previous action-button-previous"
                                    value="Previous" />
                            </fieldset>

                            <fieldset>
                                <div class="form-card">
                                    <h3 class="d-md-none">Acknowledgement</h3>
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
                                            <div class="table-responsive">
                                                <table class="table table-bordered mb-4">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:340px">Indicators</th>
                                                            <th>Status</th>
                                                            <th style="width:290px">Comments</th>
                                                            <th style=" width:119px;">MOVs</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="tbody">
                                                        <tr>
                                                            <td>
                                                                Community has submitted application / resolution
                                                            </td>
                                                            <td>
                                                                <div class=""><select class="form-control"
                                                                        id="District" name="District" required="">
                                                                        <option value="">--SELECT--
                                                                        </option>
                                                                        <option value="1">No
                                                                        </option>
                                                                        <option value="1">Yes but Incomplete
                                                                        </option>
                                                                        <option value="1">Yes & Complete
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="">
                                                                    <input type="text" class="form-control"
                                                                        required="">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <input type="file" value="Attach AWR"
                                                                    class="form-control-file"
                                                                    id="exampleFormControlFile1">
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                Potential Teachers identifieds.
                                                            </td>
                                                            <td>
                                                                <div class="">
                                                                    <input type="number" class="form-control"
                                                                        required="">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="">
                                                                    <input type="text" class="form-control"
                                                                        required="">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <input type="file" value="Attach AWR"
                                                                    class="form-control-file"
                                                                    id="exampleFormControlFile1">
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                School fulfills enrollment / OOSC Criteria.
                                                            </td>
                                                            <td>
                                                                <div class=""><select class="form-control"
                                                                        id="District" name="District" required="">
                                                                        <option value="">--SELECT--
                                                                        </option>
                                                                        <option value="1">No
                                                                        </option>
                                                                        <option value="1">Yes but Partially
                                                                        </option>
                                                                        <option value="1">Yes & Fully
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="">
                                                                    <input type="text" class="form-control"
                                                                        required="">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <input type="file" value="Attach AWR"
                                                                    class="form-control-file"
                                                                    id="exampleFormControlFile1">
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                School fulfills distance criteria.
                                                            </td>
                                                            <td>
                                                                <div class=""><select class="form-control"
                                                                        id="District" name="District" required="">
                                                                        <option value="">--SELECT--
                                                                        </option>
                                                                        <option value="1">No
                                                                        </option>
                                                                        <option value="1">Yes
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="">
                                                                    <input type="text" class="form-control"
                                                                        required="">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <input type="file" value="Attach AWR"
                                                                    class="form-control-file"
                                                                    id="exampleFormControlFile1">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div style="height:30px; background:#f1f2f3; width:100%;" class="my-4"></div>

                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <p><b>Date *</b></p>
                                            <label for="Nearest GCS Code" class="sr-only">Nearest GCS Code</label>
                                            <input type="date" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-12">
                                        <div class="form-group">
                                            <p><b>DPO Comments *</b></p>
                                            <label for="Nearest GCS Code" class="sr-only">Nearest GCS Code</label>
                                            <input type="text" class="form-control" required="">
                                        </div>
                                    </div>

                                </div>

                                <input type="button" name="next" class="next action-button" value="Submit" />
                                <input type="button" name="previous" class="previous action-button-previous"
                                    value="Previous" />
                            </fieldset>

                            <fieldset>
                                <div class="form-card"><br><br>
                                    <h2 class="purple-text text-center"><strong>SUCCESS !</strong>
                                    </h2><br>
                                    <div class="row justify-content-center">
                                        <div class="col-3"><img src="https://i.imgur.com/GwStPmg.png"
                                                class="fit-image"></div>
                                    </div><br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5 class="purple-text text-center">You Have
                                                Successfully Submitted School Request Form.</h5>
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
<?php include('../includes/footer.php'); ?>

<script>
    $(document).ready(function () {

        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        var current = 1;
        var steps = $("fieldset").length;

        setProgressBar(current);

        $(".next").click(function () {

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function (now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 500
            });
            setProgressBar(++current);
        });

        $(".previous").click(function () {

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function (now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 500
            });
            setProgressBar(--current);
        });

        function setProgressBar(curStep) {
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
                .css("width", percent + "%")
        }

        $(".submit").click(function () {
            return false;
        })

    });
</script>
<script>
    function add_tr() {
        $(".tbody").append(
            ` <tr> <td> <div class=""> <input type="text"class="form-control"required=""> </div> </td> <td> <div class=""> <select class="form-control"id="District"name="District"required=""> <option value="">--SELECT--</option> <option value="1">Primary</option> <option value="1">Middle</option> <option value="1">High</option> <option value="1">Higher Secondary</option> </select> </div> </td> <td> <div class=""> <select class="form-control"id="District"name="District"required=""> <option value="">--SELECT--</option> <option value="1">Boys</option> <option value="1">Girls</option> <option value="1">Co-ed</option> </select> </div> </td> <td> <div class=""> <input type="text"class="form-control"required=""> </div> </td> <td> <div class=""> <input type="number"class="form-control"required=""> </div> </td> </tr> `
        );
    }

    function remove_tr() {
        $(".tbody  tr:last").remove();
    }

    function add_element() {
        $("#tbody_element").append(
            ` <tr> <td><input type="text" class="form-control" required=""></td><td><input type="text" class="form-control" required=""></td><td><input type="text" class="form-control" required=""></td><td><input type="text" class="form-control" required=""></td><td><input type="text" class="form-control" required=""></td><td><input type="text" class="form-control" required=""></td></tr>`
        );
    }

    function remove_element() {
        $("#tbody_element  tr:last").remove();
    }

    function data_add() {
        $("#data_here").append(` <div style="height:30px; background:#f1f2f3; width:100%;"class="my-2"></div> <div class="row mx-0"> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Teacher Name *</b></p> <label for="village"class="sr-only">Village</label> <input type="text"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>D / S / H *</b></p> <label for="village"class="sr-only">Village</label> <input type="text"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Gender *</b></p> <label for="village"class="sr-only">Village</label> <input type="text"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Date Of Birth *</b></p> <label for="village"class="sr-only">Village</label> <input type="date"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Last Degree / Certificate *</b></p> <label for="village"class="sr-only">Village</label> <select class="form-control"id="District"
        name="District"required=""> <option value="">--SELECT--</option> <option value="1">SSC</option> <option value="1">FA/Fsc</option> <option value="1">BA/Bsc</option> <option value="1">BS</option> <option value="1">MA/Msc</option> <option value="1">MS</option> </select> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Subject *</b></p> <label for="village"class="sr-only">Village</label> <input type="text"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Professional Qualification *</b></p> <label for="village"class="sr-only">Village</label> <select class="form-control"id="District"
        name="District"required=""> <option value="">--SELECT--</option> <option value="1">PTC</option> <option value="1">CT</option> <option value="1">ADE</option> <option value="1">B.ED</option> <option value="1">M.ED</option> </select> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Teaching Experience *</b></p> <label for="village"class="sr-only">Village</label> <input type="date"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Account# *</b></p> <label for="village"class="sr-only">Village</label> <input type="text"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Disability# *</b></p> <label for="village"class="sr-only">Village</label> <input type="text"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Marital Status *</b></p> <label for="village"class="sr-only">Village</label> <select class="form-control"id="District"
        name="District"required=""> <option value="">--SELECT--</option> <option value="1">Single</option> <option value="1">Married</option> <option value="1">Widow</option> <option value="1">Divorced</option> </select> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Contact# *</b></p> <label for="village"class="sr-only">Village</label> <input type="number"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Whatsapp# *</b></p> <label for="village"class="sr-only">Village</label> <input type="number"name="Village"class="form-control"
        required=""> </div> </div> </div>`);
    }
</script>