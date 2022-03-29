<?php include('../includes/header.php'); ?>

<div class="col-lg-12 col-12 layout-top-spacing">

    <div class="row layout-top-spacing" id="cancel-row">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="dt--top-section">
                    <div class="row">
                        <div class="col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center">
                            <div class="dataTables_length" id="zero-config_length"><label>
                                    <h4>Teacher Assesment</h4>
                                </label></div>
                        </div>
                    </div>
                </div>
                <div id="zero-config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="dt--top-section">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-sm-start justify-content-center">

                                <div class="dataTables_length col-3" id="zero-config_length">
                                    <label>Assest By : <input id="t-text" type="text" name="txt" placeholder="Your Name"
                                            class="form-control" required=""></label></div>
                                <div class="dataTables_length col-3" id="zero-config_length"><label>Report : <input id="t-text" type="text" name="txt"
                                            class="form-control" required=""></label></div>


                                <div class="dataTables_length col-3">
                                    <label Class="d-block">Organization :
                                        <select class="form-control mb-0">
                                            <option>ESEF</option>
                                            <option>HOPE87</option>
                                            <option>UNICF</option>
                                            <option>MicroSoft</option>
                                        </select>
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="zero-config" class="table table-striped dataTable" style="width: 100%;" role="grid"
                            aria-describedby="zero-config_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 132px;">SNo
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1"
                                        aria-label="Position: activate to sort column ascending" style="width: 18px;">
                                        Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1"
                                        aria-label="Office: activate to sort column ascending" style="width: 96px;">
                                        Father Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1"
                                        aria-label="Age: activate to sort column ascending" style="width: 46px;">Remarks
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr role="row">
                                    <td>1</td>
                                    <td>Mazhar Hussain</td>
                                    <td>Hazrat Hussain</td>
                                    <td>
                                        <input id="t-text" type="number" name="msg"
                                            class="form-control" required="">
                                    </td>
                                </tr>
                                <tr role="row">
                                    <td>2</td>
                                    <td>Mazhar Hussain</td>
                                    <td>Hazrat Hussain</td>

                                    <td class="d-flex">
                                        <input id="t-text" type="number" name="msg"
                                            class="form-control" onchange="marks()" required="">
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">SNo</th>
                                    <th rowspan="1" colspan="1">Name</th>
                                    <th rowspan="1" colspan="1">Father Name</th>
                                    <th rowspan="1" colspan="1">Remarks</th>
                                </tr>

                            </tfoot>
                            <div class="mini"></div>

                        </table>
                        <div style="float:right">
                            <input type="submit" onchange="marks()" name="txt" value="Submit"
                                class="mt-4 btn btn-primary">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<?php include('../includes/footer.php'); ?>