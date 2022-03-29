<?php include('../includes/header.php'); ?>

<div class="row layout-top-spacing">

    <div class="layout-spacing col-12">
        <div class="statbox widget box box-shadow">

            <div class="widget-header">
                <div class="row">
                    <div class="col-12">
                        <h3>VEC Meetings</h3>
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
                    <label for="School Code">From</label>
                    <input type="date" class="form-control">
                    
                </div>
                <div class="col-4">
                    <label for="School Code">To</label>
                    <input type="date" class="form-control">
                    
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
                                <th>GCS Name</th>
                                <th>GCS Code</th>
                                <th>Date</th>
                                <th>Present</th>
                                <th>Absent</th>
                                <th>Location</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>GCS Landki</td>
                                <td>17301</td>
                                <td>04/03/2021</td>
                                <td>07</td>
                                <td>01</td>
                                <td>Peshawar</td>

                                <td style="color:#000" class="text-center">
                                    <button class="btn btn-primary p-1"><i class="far fa-eye"></i></button>

                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">1</td>
                                <td>GCS Swat</td>
                                <td>45686</td>
                                <td>15/03/2021</td>
                                <td>08</td>
                                <td>00</td>
                                <td>Swat</td>

                                <td style="color:#000" class="text-center">
                                    <button class="btn btn-primary p-1"><i class="far fa-eye"></i></button>

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