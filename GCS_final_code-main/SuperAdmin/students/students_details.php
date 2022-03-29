<?php include('includes/header.php'); ?>

<div class="row layout-top-spacing">
    
<div class="layout-spacing col-12">
        <div class="statbox widget box box-shadow">

            <div class="widget-header">
                <div class="row">
                    <div class="col-12">
                        <h3>Students List</h3>
                    </div>
                </div>
            </div>

            <div class="widget-content widget-content-area d-flex flex-wrap" style="justify-content: space-between">
                
                

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
                    <label for="Tehsil">UC</label>
                    <select class="form-control">
                        <option>--SELECT--</option>
                        <option>One</option>
                        <option>Two</option>
                        <option>Three</option>
                    </select>
                </div>

                <div class="col-4 ">
                    <label for="School Code">School </label>
                    <select class="form-control">
                        <option>--SELECT--</option>
                        <option>One</option>
                        <option>Two</option>
                        <option>Three</option>
                    </select>
                </div>

                <div class="col-4">
                    <label for="School Code">Student Status</label>
                    <select class="form-control">
                        <option>--SELECT--</option>
                        <option>In School</option>
                        <option>Drop out</option>
                        <option>Pass out</option>
                    </select>
                </div>
                <div class="col-4">
                    <label for="School Code">Class</label>
                    <select class="form-control">
                        <option>--SELECT--</option>
                        <option>Nursery</option>
                        <option>One</option>
                        <option>Two</option>
                        <option>Three</option>
                        <option>Four</option>
                        <option>Five</option>
                    </select>
                </div>

                <div class="col-4">
                    <label for="School Code">Gender</label>
                    <select class="form-control">
                        <option>--SELECT--</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                </div>
                
                <div class="col-12 mt-5 text-right">
                    <button class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>
    </div>




    <div id="tableLight" class="col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <table class="table table-hover table-light mb-4">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Student Name</th>
                                <th>Father Name</th>
                                <th>Gender</th>
                                <th>DOB</th>
                                <th>Class</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>001</td>
                                <td>SpinGhar Model School</td>
                                <td>Mazhar Hussain</td>
                                <td>Male</td>
                                <td>Five</td>
                                <td>Active</td>

                                <td style="color:#000">
                                    <button class="btn btn-primary p-1"><i class="far fa-eye"></i></button>
                                    <button class="btn p-1 btn-info"><i class="fas fa-edit"></i></i></button>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>002</td>
                                <td>SpinGhar Model School</td>
                                <td>Muhammad Aqib</td>
                                <td>Male</td>
                                <td>Five</td>
                                <td>InActive</td>


                                <td>
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