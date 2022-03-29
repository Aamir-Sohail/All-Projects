<?php include('includes/header.php'); ?>

<div class="col-lg-12 col-12 layout-top-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
     


            <?php 
            if(isset($_GET['alert'])){
                $alert = $_GET['alert'] ;
                if($alert == "No_data"){
                    echo '<div class="alert alert-light-primary border-0 mb-4" role="alert">
                                No School Registerd on this date
                            </div> ';
                }
            }
            ?>
            
            <form action="exports_list/basic.php">
                
                <div class="row">
                    <div class="col-sm-6 d-flex justify-content-start">
                       
                        <h5>Total Schools</h5>
                       
                    </div>
                    <?php
                    $today=date('Y-m-d')
                    ?>
                    <div class="col-sm-6 d-flex justify-content-end">

                     
                        <input type="hidden" name="export" value="basic">
                        <!-- <a href="excelExport.php?export=basic" class="btn btn-primary">Export To Excel</a> -->
                        <input type="submit" value="Export To Excel" class="btn btn-primary">
                
                       
                    </div>
                </div>
            </form>

    
            <div class="table-responsive scrollbar scrolledY-axis">
                <div class="table-scrolled scrollbar">
                    <table class="table table-hover dataTable">
                        <thead>
                            <tr>
                                <th >
                                    SNo.
                                </th>
                                <th >
                                    School Code
                                </th>
                                <th>
                                    GCS Name dsfs
                                </th>
                                <th >
                                    District
                                </th>
                                <th>Tehsil</th>
                                <th>U/C</th>
                                <th>V/C</th>
                                <th>X Cord</th>
                                <th>Y Cord</th>

                                <!--<th class="sorting text-center" tabindex="0" aria-controls="multi-column-ordering"-->
                                <!--    rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending"-->
                                <!--    style="width: 163.078px;">Action</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $data_output = $data->SchoolData($District);
                        // print_r($data_output);
                        $no = 1;
                        
                        foreach ($data_output as $row) {
                            ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td class="sorting_1 sorting_2">
                                    <?php echo $row['SchoolCode'] ?></td>
                                <td class="sorting_1 sorting_2">
                                    <?php echo $row['CS_Name'] ?></td>
                                <td class="sorting_1 sorting_2">
                                    <?php echo $row['DistrictName'] ?></td>
                                <td class="sorting_1 sorting_2"><?php echo $row['TehsilName'] ?>
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

<?php include('includes/footer.php'); ?>

<script>
    // $(document).ready(function() {
    //     $('#multi-column-ordering').DataTable();
    // });
</script>