<?php include('./includes/header.php'); ?>

<div class="col-lg-12 col-12 layout-top-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>Donations</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">

            <div class="row">

                <div class="dataTables_length col-3">
                    <label class="d-block">Item :
                        <input id="t-text" type="text" name="txt" class="form-control" required="">
                    </label>
                </div>
                <div class="dataTables_length col-3">
                    <label class="d-block">Specification :
                        <input id="t-text" type="text" name="txt" class="form-control" required="">
                    </label>
                </div>
                <div class="dataTables_length col-3">
                    <label class="d-block">Model / Brand :
                        <input id="t-text" type="text" name="txt" class="form-control" required="">
                    </label>
                </div>
                <div class="dataTables_length col-3">
                    <label class="d-block">Quantity:
                        <input id="t-text" type="text" name="txt" class="form-control" required="">
                    </label>
                </div>


                <div class="dataTables_length col-3">
                    <label class="d-block">From Whom :
                        <input id="t-text" type="text" name="txt" class="form-control" required="">

                    </label>
                </div>


                <div class="dataTables_length col-3">
                    <label class="d-block">Issued to :
                        <select class="form-control mb-0">
                            <option value="">--SELECT--</option>
                            <option value="1">Teacher</option>
                            <option value="1">Students</option>
                            <option value="1">School</option>
                            <option value="1">Community</option>
                        </select>
                    </label>
                </div>

                <div class="dataTables_length col-3">
                    <label class="d-block">Date :
                        <input id="t-text" type="date" name="txt" class="form-control" required="">

                    </label>
                </div>
                <div class="col-xl-3 mb-xl-0 mb-5">
                    <p><b></b></p>
                    <input type="submit" name="txt" class="mt-4 btn btn-primary">
                </div>

            </div>

        </div>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">

        <div class="col-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div id="zero-config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="table-responsive">
                        <table id="zero-config" class="table table-striped dataTable" style="width: 100%;" role="grid"
                            aria-describedby="zero-config_info">
                            <thead>
                                <tr role="row">
                                    
                                    <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1"
                                        aria-label="Position: activate to sort column ascending">
                                       Item</th>
                                    
                                    <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1"
                                        aria-label="Position: activate to sort column ascending">
                                        Specification</th>
                                    <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1"
                                        aria-label="Position: activate to sort column ascending">
                                        Model/Brand</th>
                                    
                                    <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1"
                                        aria-label="Age: activate to sort column ascending">
                                        Quantity</th>
                                    <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1"
                                        aria-label="Position: activate to sort column ascending">
                                        From Whom</th>
                                    <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1"
                                        aria-label="Position: activate to sort column ascending">
                                        Issued To</th>
                                    <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1"
                                        aria-label="Office: activate to sort column ascending">Date
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr role="row">
                                    <td>Energy Savers</td>
                                    <td>15 Watt</td>
                                    <td>Panasonic</td>
                                    <td>53</td>
                                    <td>ESEF</td>
                                    <td>School</td>
                                    <td>10-02-2021</td>
                                </tr>
                                <tr role="row">
                                    <td>Fans</td>
                                    <td>Celling Fan</td>
                                    <td>Pak Fans</td>
                                    <td>2</td>
                                    <td>ESEF</td>
                                    <td>School</td>
                                    <td>10-02-2021</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include('./includes/footer.php'); ?>