<?php include('../includes/header.php'); ?>

<div class="row layout-top-spacing mx-0">

    <div class="layout-spacing col-12">
        <div class="statbox widget box box-shadow px-0 px-sm-3">

            <!-- <div class="widget-header">
                <div class="row">
                    <div class="col-12 my-3">
                        <h2 class="fw-bold" style="font-weight:bold">SCHOOL PROFILE</h2>
                        <h4 class="p-0">OF COMMUNITY BASED SCHOOL</h4>
                    </div>
                </div>
            </div> -->

            <div class="widget-content widget-content-area">
                <form method="post">

                    <div class="row mb-3">

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b> Tehsil *</b></p>
                                <label for="Tehsil" class="sr-only">Tehsil</label>
                                <select class="form-control" id="Tehsil" name="Tehsil" required="">
                                    <option value="">--SELECT--</option>
                                    <option value="1">one</option>
                                    <option value="1">two</option>
                                    <option value="1">three</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b> UC *</b></p>
                                <label for="UC" class="sr-only">UC</label>
                                <select class="form-control" name="UC" required="">
                                    <option value="">--SELECT--</option>
                                    <option value="1">one</option>
                                    <option value="1">two</option>
                                    <option value="1">three</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b> VC *</b></p>
                                <label for="VC" class="sr-only">VC</label>
                                <select class="form-control" id="VC" name="VC" required="">
                                    <option value="">--SELECT--</option>
                                    <option value="1">one</option>
                                    <option value="1">two</option>
                                    <option value="1">three</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Village *</b></p>
                                <label for="village" class="sr-only">Village</label>
                                <input type="text" name="Village" class="form-control" required="">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Mohalla *</b></p>
                                <label for="Mohalla" class="sr-only">Mohalla</label>
                                <input type="text" name="Mohalla" class="form-control" required="">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Landmark *</b></p>
                                <label for="landmark" class="sr-only">Landmark</label>
                                <input type="text" name="landmark" class="form-control" required="">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>X-Cord *</b></p>
                                <label for="X-Cord" class="sr-only">X-Cord</label>
                                <input type="text" name="" class="form-control" required="">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Y-Cord *</b></p>
                                <label for="Y-Cord" class="sr-only">Y-Cord</label>
                                <input type="text" name="" class="form-control" required="">
                            </div>
                        </div>

                        <div class="col-md-8 col-12">
                            <div class="form-group">
                                <p><b>CS Name *</b></p>
                                <label for="CS_Name" class="sr-only">CS Name</label>
                                <input type="text" class="form-control" required="">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Program *</b></p>
                                <label for="program" class="sr-only">program</label>
                                <input type="text" class="form-control" required="">
                            </div>
                        </div>

                        <div class="col-md-8 col-12">
                            <div class="form-group">
                                <p><b>CS Type *</b></p>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" name="custom-radio-2" checked>
                                    <span class="new-control-indicator"></span>GCS
                                </label>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" name="custom-radio-2">
                                    <span class="new-control-indicator"></span>CFS
                                </label>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" name="custom-radio-2">
                                    <span class="new-control-indicator"></span>CBEC
                                </label>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" name="custom-radio-2">
                                    <span class="new-control-indicator"></span>BECS
                                </label>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" name="custom-radio-2">
                                    <span class="new-control-indicator"></span>Other
                                    <input type="text" class="form-control ml-3 px-0"
                                        style="height:0px;border:0; border-bottom: 1px solid #a2a2a2">
                                </label>


                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Status *</b></p>


                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" name="custom-radio-3" checked>
                                    <span class="new-control-indicator"></span>Functional
                                </label>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" name="custom-radio-3">
                                    <span class="new-control-indicator"></span>Non-Functional
                                </label>

                            </div>
                        </div>

                        <div class="col-md-8 col-12">
                            <div class="form-group">
                                <p><b>Building Ownership *</b></p>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" name="custom-radio-4" checked>
                                    <span class="new-control-indicator"></span>Govt
                                </label>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" name="custom-radio-4">
                                    <span class="new-control-indicator"></span>VEC
                                </label>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" name="custom-radio-4">
                                    <span class="new-control-indicator"></span>Communal
                                </label>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" name="custom-radio-4">
                                    <span class="new-control-indicator"></span>Personal
                                </label>

                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Gender *</b></p>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" name="custom-radio-5" checked>
                                    <span class="new-control-indicator"></span>Girls
                                </label>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" name="custom-radio-5">
                                    <span class="new-control-indicator"></span>Boys
                                </label>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" name="custom-radio-5">
                                    <span class="new-control-indicator"></span>Co-ed
                                </label>

                            </div>
                        </div>

                        <div class="col-md-8 col-12 pr-0">
                            <div class="form-group">
                                <p><b>Building Structure *</b></p>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" name="custom-radio-6" checked>
                                    <span class="new-control-indicator"></span>Pakka
                                </label>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" name="custom-radio-6">
                                    <span class="new-control-indicator"></span>Kacha
                                </label>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" name="custom-radio-6">
                                    <span class="new-control-indicator"></span>Mixed
                                </label>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" name="custom-radio-6">
                                    <span class="new-control-indicator"></span> Open air (Partial)
                                </label>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" name="custom-radio-6">
                                    <span class="new-control-indicator"></span> Open air (Complete)
                                </label>

                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>School Level *</b></p>
                                <label for="School Level" class="sr-only">School Level</label>
                                <input type="text" class="form-control" required="">
                            </div>
                            <!-- <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <p><b> School Level *</b></p>
                                    <label for="District" class="sr-only">District</label>
                                    <select class="form-control" id="District" name="District" required="">
                                        <option value="">--SELECT--</option>
                                        <option value="1">Primary</option>
                                        <option value="1">Middle</option>
                                        <option value="1">High</option>
                                    </select>
                                </div>
                            </div>  -->
                        </div>

                        <div class="col-md-8 col-12 pr-0">
                            <div class="form-group">
                                <p><b>Area *</b></p>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" name="custom-radio-7" checked>
                                    <span class="new-control-indicator"></span>Urban
                                </label>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" name="custom-radio-7">
                                    <span class="new-control-indicator"></span>Semi Urban
                                </label>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" name="custom-radio-7">
                                    <span class="new-control-indicator"></span>Rural Plain
                                </label>

                                <label class="new-control new-radio radio-classic-secondary">
                                    <input type="radio" class="new-control-input" name="custom-radio-7">
                                    <span class="new-control-indicator"></span> Rural Hilly
                                </label>

                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Transport Required *</b></p>
                                <label for="Transport Required" class="sr-only">Transport Required</label>
                                <input type="text" class="form-control" required="">
                            </div>
                        </div>

                        

                        

                    </div>


                </form>
            </div>
        </div>
    </div>

    <div class="layout-spacing col-12">
        <div class="statbox widget box box-shadow">

            <div class="widget-header">
                <div class="row">
                    <div class="col-12 my-3">
                        <!-- <h2 class="fw-bold" >SCHOOL PROFILE</h2> -->
                        <h4 class="p-0" style="font-weight:bold">LOGIN DETAILS :</h4>
                    </div>
                </div>
            </div>

            <div class="widget-content widget-content-area">
                <form method="post">

                    <div class="row mb-3">


                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Proposed Username *</b></p>
                                <label for="GCS" class="sr-only">GCS</label>
                                <input type="text" class="form-control" required="">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Password *</b></p>
                                <label for="GBPS" class="sr-only">GBPS</label>
                                <input type="password" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Confirm Password *</b></p>
                                <label for="GBPS" class="sr-only">GBPS</label>
                                <input type="password" class="form-control" required="">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Responsible Persosn *</b></p>
                                <label for="Responsible Persosn" class="sr-only">Responsible Persosn</label>
                                <input type="text" class="form-control" required="">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Contact # *</b></p>
                                <label for="GBMS" class="sr-only">GBMS</label>
                                <input type="number" class="form-control" required="">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Email *</b></p>
                                <label for="Community School" class="sr-only">Community School</label>
                                <input type="email" class="form-control" required="">
                            </div>
                        </div>

                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <!-- <input type="submit" name="txt" class="mt-4 btn btn-primary w-100 d-block py-2"> -->
                        </div>

                    </div>


                </form>
            </div>

        </div>
    </div>

</div>


</div>

<?php include('../includes/footer.php'); ?>