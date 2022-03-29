<?php include('./includes/header.php'); ?>

<div class="col-lg-12 col-12 layout-top-spacing">
    <!-- <div class="statbox widget box box-shadow"> -->
    <div class="widget-header">
        <div class="row">

            <style>
                .card_data {
                    transform: translate(80px, 100px);
                }

                #multi-column-ordering_filter {
                    float: right;
                }
            </style>
            <!--  BEGIN CONTENT PART  -->
            <!--<div id="content" class="main-content">-->
            <!--<div class="layout-px-spacing">-->
            <div class="row mx-0 widget-content-area br-4" style="width:100%">
            <?php 
            if(isset($_GET['alert'])){
                $alert = $_GET['alert'] ;
                if($alert == "No_data"){
                    echo '<div class="col-12"><div class="alert alert-light-primary border-0 mb-4" role="alert">
    No School Registerd on this date
</div> </div>';
                }
            }
            ?>
            <div class="col-12">
                <div class="dt--top-section">
                    <div class="row">
                        <div class="col-6 col-sm-6 d-flex justify-content-sm-start justify-content-center">
                            <div class="dataTables_length" id="multi-column-ordering_length">
                                <h5>Students</h5>
                            </div>
                        </div>
                        <?php
                                $today=date('Y-m-d')
                                ?>
                        <div class="col-6 col-sm-6 d-flex justify-content-sm-end justify-content-right">
                        
                        <div class="dataTables_length" id="multi-column-ordering_length">
                        </div>
                    </div>
                </div>
</form>
                <div class="table-responsive">
                    <div class="col-sm-12">
                        <table id="multi-column-ordering" class="table table-hover dataTable no-footer" role="grid"
                            aria-describedby="multi-column-ordering_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="multi-column-ordering"
                                        rowspan="1" colspan="1" aria-sort="ascending" style="width: 66.625px;">
                                        SNo.
                                    </th>
                                                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="multi-column-ordering"
                                        rowspan="1" colspan="1" aria-sort="ascending" style="width: 66.625px;">
                                        District
                                    </th>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="multi-column-ordering"
                                        rowspan="1" colspan="1" aria-sort="ascending" style="width: 66.625px;">
                                        School Name
                                    </th>

                                    <th class="sorting" tabindex="0" aria-controls="multi-column-ordering" rowspan="1"
                                        colspan="1" aria-label="Picture: activate to sort column ascending"
                                        style="width: 104.469px;">
                                        Student Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="multi-column-ordering" rowspan="1"
                                        colspan="1" style="width: 142.562px;">Date Of Birth</th>
                                    <th class="sorting" tabindex="0" aria-controls="multi-column-ordering" rowspan="1"
                                        colspan="1" style="width: 142.562px;">Current Class</th>
                                        <th class="sorting" tabindex="0" aria-controls="multi-column-ordering" rowspan="1"
                                        colspan="1" style="width: 142.562px;">Gender</th>
                                    <th class="sorting" tabindex="0" aria-controls="multi-column-ordering" rowspan="1"
                                        colspan="1" style="width: 142.562px;">Parent Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="multi-column-ordering" rowspan="1"
                                        colspan="1" style="width: 142.562px;">Parent Contact#</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>

                        </table>
                    </div>




        </div>




    </div>
</div>
<!-- </div> -->

</div>

<?php include('includes/footer.php'); ?>

<script>
    $('#multi-column-ordering').DataTable({
                  processing: true,
                  serverSide: true,
                 
        "ajax": {
            "url": "scripts/post.php",
            "type": "POST"
        },
                     "columns": [
                    { "data": "SchoolCode" },
                    { "data": "DistrictName" },
                    { "data": "CS_Name" },
                    { "data": "ChildName" },
                    { "data": "DOB" },
                    { "data": "ClassName" },
                    { "data": "Gender" },
                    { "data": "FatherName" },
                    { "data": "Contact" }
                    
                ],
                
     });
</script>