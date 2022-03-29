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
            <div class="row mx-0 widget-content-area br-4">
            


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
           <form action="exports_list/basic.php">
            <div class="dt--top-section">
                <div class="row">
                    <div class="col-6 col-sm-6 d-flex justify-content-sm-start justify-content-center">
                        <div class="dataTables_length" id="multi-column-ordering_length">
                            <h5>Total Schools</h5>
                        </div>
                    </div>
                    <?php
                            $today=date('Y-m-d')
                            ?>
                    <div class="col-6 col-sm-6 d-flex justify-content-sm-end justify-content-right">
                    <div class="dataTables_length" id="multi-column-ordering_length">
                    
                    <div class="dataTables_length" id="multi-column-ordering_length">
                        <input type="hidden" name="export" value="basic">
                            <!-- <a href="excelExport.php?export=basic" class="btn btn-primary">Export To Excel</a> -->
                            <input type="submit" value="Export To Excel" class="btn btn-primary"> 
                        </div>
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
                                    School Code
                                </th>
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="multi-column-ordering"
                                    rowspan="1" colspan="1" aria-sort="ascending" style="width: 66.625px;">
                                    GCS Name
                                </th>
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="multi-column-ordering"
                                    rowspan="1" colspan="1" aria-sort="ascending" style="width: 66.625px;">
                                    District
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="multi-column-ordering" rowspan="1"
                                    colspan="1" aria-label="Picture: activate to sort column ascending"
                                    style="width: 104.469px;">Tehsil</th>
                                <th class="sorting" tabindex="0" aria-controls="multi-column-ordering" rowspan="1"
                                    colspan="1" style="width: 142.562px;">U/C</th>
                                <th class="sorting" tabindex="0" aria-controls="multi-column-ordering" rowspan="1"
                                    colspan="1" style="width: 142.562px;">V/C</th>
                                <th class="sorting" tabindex="0" aria-controls="multi-column-ordering" rowspan="1"
                                    colspan="1" style="width: 142.562px;">X Cord</th>
                                <th class="sorting" tabindex="0" aria-controls="multi-column-ordering" rowspan="1"
                                    colspan="1" style="width: 142.562px;">Y Cord</th>

                                <!--<th class="sorting text-center" tabindex="0" aria-controls="multi-column-ordering"-->
                                <!--    rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending"-->
                                <!--    style="width: 163.078px;">Action</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data_output = $data->SchoolData();
                            // print_r($data_output);
                            $no = 1;
                            
                            foreach ($data_output as $row) {
                                ?>
                            <tr role="row" class="odd">
                                <td><?php echo $no;?></td>
                                    <td class="sorting_1 sorting_2" style="width:200px">
                                    <?php echo $row['SchoolCode'] ?></td>
                                    <td class="sorting_1 sorting_2" style="width:200px"> 
                                    <?php echo $row['CS_Name'] ?></td>
                                <td class="sorting_1 sorting_2" style="width:200px">
                                    <?php echo $row['DistrictName'] ?></td>
                                <td class="sorting_1 sorting_2" style="width:200px"><?php echo $row['TehsilName'] ?>
                                </td>
                                <td class="sorting_1 sorting_2"><?php echo $row['UnionCouncilName'] ?></td>
                                <td class="sorting_1 sorting_2"><?php echo $row['VC'] ?></td>
                                <td class="sorting_1 sorting_2"><?php echo $row['X_Cord'] ?></td>
                                <td class="sorting_1 sorting_2"><?php echo $row['Y_Cord'] ?></td>
                                <!--<td class="text-center">-->
                                <!--    <a href="javascript:void(0)" class="btn btn-info" onclick="saveNext('116')"><i-->
                                <!--            class="fas fa-eye"></i></a>-->
                                <!--</td>-->
                            </tr>
                            <?php
                            $no++;} ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

            </div>

        </div>




    </div>
</div>
<!-- </div> -->

</div>

<?php include('includes/footer.php'); ?>

<script>
    // $(document).ready(function() {
    //     $('#multi-column-ordering').DataTable();
    // });
</script>