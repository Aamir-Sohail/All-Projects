<?php include('includes/header.php'); ?>

<div class="row layout-top-spacing mx-0">
    
    <div class="layout-spacing col-12">
        <div class="statbox widget box box-shadow px-0 px-sm-3">

            <div class="widget-header">
                <div class="row">
                    <div class="col-12">
                        <h3>School List</h3>
                    </div>
                </div>
            </div>

            <div class="widget-content widget-content-area d-flex flex-wrap" style="justify-content: space-between">
                
                

                <div class="col-md-4 mb-3 mb-md-0">
                    <label for="Tehsil">Tehsil</label>
                    <select class="form-control">
                        <option>--SELECT--</option>
                        <option>One</option>
                        <option>Two</option>
                        <option>Three</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3 mb-md-0 ">
                    <label for="Tehsil">Union Council</label>
                    <select class="form-control">
                        <option>--SELECT--</option>
                        <option>One</option>
                        <option>Two</option>
                        <option>Three</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3 mb-md-0 ">
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

                <div class="col-md-4 mb-4 mb-md-0">
                    <label for="School Code">School Name</label>
                    <select class="form-control">
                        <option>--SELECT--</option>
                        <option>One</option>
                        <option>Two</option>
                        <option>Three</option>
                    </select>
                </div>
                
                <div class="col-md-8 mt-auto text-right">
                    <button class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>
    </div>




    <div id="tableLight" class="col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <!-- button to export table in excel sheet -->
                    <div class="text-right mb-3"> 
                        <button class="btn btn-primary">Export to Excel</button>
                    </div>
                    <!-- table of deails -->
                    <table class="table table-hover table-light mb-4">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Code</th>
                                <th>School Name</th>
                                <th>UC</th>
                                <th>Village</th>
                                <th>Type</th>
                                <th>X,Y</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>001</td>
                                <td>GCS Charbagh</td>
                                <td>Gulebagh</td>
                                <td>Dakorak</td>
                                <td>GCS</td>
                                <td>200,400</td>

                                <td style="color:#000">
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-x t-icon">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg> -->
                                    <button class="btn btn-primary p-1" style="    width: 30px;"><i class="far fa-eye"></i></button>
                                    <button class="btn p-1 btn-info" style="    width: 30px;"><i class="fas fa-edit"></i></i></button>
                                    <button class="btn p-1 btn-primary" style="    width: 30px;"><i class="fas fa-map-marker-alt"></i></button>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>002</td>
                                <td>GCS Charbagh</td>
                                <td>Gulebagh</td>
                                <td>Dakorak</td>
                                <td>GCS</td>
                                <td>200,400</td>

                                <td style="color:#000">
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-x t-icon">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg> -->
                                    <button class="btn btn-primary p-1" style="    width: 30px;"><i class="far fa-eye"></i></button>
                                    <button class="btn p-1 btn-info" style="    width: 30px;"><i class="fas fa-edit"></i></i></button>
                                    <button class="btn p-1 btn-primary" style="    width: 30px;"><i class="fas fa-map-marker-alt"></i></button>
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