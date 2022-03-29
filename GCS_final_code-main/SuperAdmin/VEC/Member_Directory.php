<?php include('../includes/header.php'); ?>

<div class="row layout-top-spacing">

    <div class="layout-spacing col-12">
        <div class="statbox widget box box-shadow">

            <div class="widget-header">
                <div class="row">
                    <div class="col-12">
                        <h3>VEC List</h3>
                    </div>
                </div>
            </div>

            <div class="widget-content widget-content-area d-flex flex-wrap" >



                <div class="col-4 ">
                    <label for="Tehsil">Tehsil</label>
                    <select class="form-control">
                        <option>--SELECT--</option>
                        <option>One</option>
                        <option>Two</option>
                        <option>Three</option>
                    </select>
                </div>

                <div class="col-4 ">
                    <label for="Tehsil">Union Council</label>
                    <select class="form-control">
                        <option>--SELECT--</option>
                        <option>One</option>
                        <option>Two</option>
                        <option>Three</option>
                    </select>
                </div>

                <div class="col-4 ">
                    <label for="School Code">Type</label>
                    <select class="form-control">
                        <option>--SELECT--</option>
                        <option>GCS</option>
                        <option>CFS</option>
                        <option>CBEC</option>
                        <option>BECS</option>
                        <option>OTHER</option>
                    </select>
                </div>

                <div class="col-4">
                    <label for="School Code">GCS Name</label>
                    <select class="form-control">
                        <option>--SELECT--</option>
                        <option>One</option>
                        <option>Two</option>
                        <option>Three</option>
                    </select>
                </div>
                
                <div class="col-4">
                    <label for="School Code">Designation</label>
                    <select class="form-control">
                        <option>--SELECT--</option>
                        <option>Chairman</option>
                        <option>Secertary</option>
                        <option>Member</option>
                    </select>
                </div>

                <div class="col-12 mt-auto text-right">
                    <button class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>
    </div>




    <div id="tableLight" class="col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <div class="text-right mb-3">
                        <button class="btn btn-primary">Export to Excel</button>
                    </div>
                    <table class="table table-hover table-light mb-4">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th>CNIC</th>
                                <th>Category</th>
                                <th>Contact#</th>
                                <th>Designation</th>
                                <th>GCS Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>Mazhar Hussain</td>
                                <td>17301-5116071-1</td>
                                <td>Influential</td>
                                <td>03139265304</td>
                                <td>Chairman</td>
                                <td>GCS Landake</td>

                                <td style="color:#000">
                                    <button class="btn btn-primary p-1"><i class="far fa-eye"></i></button>
                                    <button class="btn p-1 btn-info"><i class="fas fa-edit"></i></i></button>

                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">1</td>
                                <td>Aqib Afridi</td>
                                <td>17301-5116071-1</td>
                                <td>Influential</td>
                                <td>03139265304</td>
                                <td>Chairman</td>
                                <td>GCS Landake</td>

                                <td style="color:#000">
                                    <button class="btn btn-primary p-1"><i class="far fa-eye"></i></button>
                                    <button class="btn p-1 btn-info"><i class="fas fa-edit"></i></i></button>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>


</div>

<?php include('../includes/footer.php'); ?>