<?php include('../includes/header.php');?>

<div class="row layout-top-spacing">

    <div id="basic" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow p-0">

            <div class="widget-content widget-content-area">
                <form method="post">

                    <!------------------------ Parent Information -------------------->
                    <div class="row mb-3">

                        <div class="widget-header w-100 p-0 mb-3">
                            <h4>Teachers Information</h4>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Teacher Name *</b></p>
                                <label for="teachers Name" class="sr-only">teachers Name</label>
                                <input id="T-name" type="text" name="T-name" class="form-control" required="">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Father Name *</b></p>
                                <label for="Father Name" class="sr-only">Father Name</label>
                                <input type="text" name="T_father-name" class="form-control" required="">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Husband Name</b></p>
                                <label for="Husband Name" class="sr-only">Husband Name</label>
                                <input type="text" name="husband-name" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Martial Status *</b></p>
                                <label for="Martial-status" class="sr-only">Martial-status</label>
                                <select class="form-control" id="Martial-status" name="Martial-status" required="">
                                    <option value="">--SELECT--</option>
                                    <option value="1">Married</option>
                                    <option value="2">Un Married</option>
                                    <option value="3">Divorced</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Gender *</b></p>
                                <label for="gender" class="sr-only">gender</label>
                                <select class="form-control" id="gender" name="gender" required="">
                                    <option value="">--SELECT--</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                    <option value="3">Trans</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Teacher CNIC *</b></p>
                                <label for="Teacher_cnic" class="sr-only">Teacher_cnic</label>
                                <input id="Teacher_cnic" type="text" name="Teacher_cnic" class="form-control Form_B" required=""
                                    placeholder="00000-0000000-0">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Date of Birth</b></p>
                                <label for="DOB" class="sr-only">DOB</label>
                                <input class="t-text form-control" type="text" name="DOB" placeholder="mm-dd-yyyy" required="">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Qualification *</b></p>
                                <label for="Qualification" class="sr-only">Qualification</label>
                                <input type="text" name="Qualification" class="form-control" required="">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <p><b>Contact Number *</b></p>
                                <label for="Contact-num" class="sr-only">Contact-num</label>
                                <input type="text" class="form-control Mobile" name="Contact-num" value="" required="">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>District *</b></p>
                                <label for="district" class="sr-only">district</label>
                                <select class="form-control" id="district" name="district" required="">
                                    <option value="">--SELECT--</option>
                                    <option value="1">Peshawar</option>
                                    <option value="2">Islamabad</option>
                                    <option value="3">Karachi</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>UC (Union Council)*</b></p>
                                <label for="uc" class="sr-only">uc</label>
                                <select class="form-control" id="uc" name="uc" required="">
                                    <option value="">--SELECT--</option>
                                    <option value="1">Khyber</option>
                                    <option value="2">Punjab</option>
                                    <option value="3">Sindh</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <p><b>Village *</b></p>
                                <label for="village" class="sr-only">village</label>
                                <input type="text" class="form-control" name="village" value="" required="">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <p><b>Designation *</b></p>
                                <label for="Designation" class="sr-only">Designation</label>
                                <!-- <input type="text" class="form-control" name="Designation" value="" required=""> -->
                                <select class="form-control" id="designation" name="designation" required="">
                                    <option value="">--SELECT--</option>
                                    <option value="1">Head Teacher</option>
                                    <option value="2">Additional Teacher</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Job Status*</b></p>
                                <label for="job-status" class="sr-only">job-status</label>
                                <select class="form-control" id="job-status" name="job-status" required="">
                                    <option value="">--SELECT--</option>
                                    <option value="1">Regular</option>
                                    <option value="2">Contract</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Contract Date</b></p>
                                <label for="contract" class="sr-only">contract</label>
                                <input class="t-text form-control" type="text" name="contract" placeholder="mm-dd-yyyy" required="">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Contract Expire *</b></p>
                                <label for="contract-expire" class="sr-only">contract-expire</label>
                                <input class="t-text form-control" type="text" name="contract-expire" placeholder="mm-dd-yyyy" required="">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>Current Status*</b></p>
                                <label for="Current-status" class="sr-only">Current-status</label>
                                <select class="form-control" id="Current-status" name="Current-status" required="">
                                    <option value="">--SELECT--</option>
                                    <option value="1">Employed</option>
                                    <option value="2">Un Employed</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <p><b>School Name*</b></p>
                                <label for="Current-status" class="sr-only">Current-status</label>
                                <select class="form-control" id="Current-status" name="Current-status" required="">
                                    <option value="">--SELECT--</option>
                                    <option value="1">GCS</option>
                                    <option value="2">GPS</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <p><b>Postal Address *</b></p>
                                <label for="Postal Address" class="sr-only">Postal Address *</label>
                                <textarea id="PostalAddress" style="height:150px !important" row="10" name="PostalAddress" class="form-control" required=""> </textarea>
                            </div>
                        </div>

                        <div class="col-5 col-sm-3 col-md-2 ml-auto">
                            <input type="submit" name="txt" class="mt-4 btn btn-primary w-100 d-block py-2">
                        </div>

                    </div>


                </form>



            </div>
        </div>
    </div>


</div>

<?php include('../includes/footer.php');?>