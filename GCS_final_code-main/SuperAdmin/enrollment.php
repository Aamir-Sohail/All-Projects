<?php include('includes/header.php'); ?>

<div class="col-12 layout-top-spacing">
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

            <form action="exports_list/enrollment.php">
                <div class="row">
                    <div class="col-sm-6 d-flex justify-content-start">
                        <h5>Total Enrollment</h5>
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
                    <table class="table table-hover dataTable no-footer">
                        <thead>
                            <tr role="row">
                                <th>
                                    SNo.
                                </th>
                                <th>
                                    School Code
                                </th>
                                <th>
                                    GCS Name
                                </th>
                                <th>
                                    District
                                </th>
                                <th>Tehsil</th>
                                <th>U/C</th>
                                <th>V/C</th>
                                <th>Total Boys</th>
                                <th>Total Girls</th>
                                <th>Total</th>
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
                            $SchoolCode = $row['SchoolCode'];
                            ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td style="width:200px">
                                    <?php echo $row['SchoolCode'] ?></td>
                                <td style="width:200px">
                                    <?php echo $row['CS_Name'] ?></td>
                                <td style="width:200px">
                                    <?php echo $row['DistrictName'] ?></td>
                                <td style="width:200px">
                                    <?php echo $row['TehsilName'] ?>
                                </td>
                                <td><?php echo $row['UnionCouncilName'] ?></td>
                                <td><?php echo $row['VC'] ?></td>
                                <?php 
                            $student= $data->enrollment($SchoolCode);
                            ?>
                                <td>
                                    <?php echo $student['Nursery_Boys']+$student['KG_Boys']+$student['One_Boys']+$student['Two_Boys']+$student['Three_Boys']+$student['Four_Boys']+$student['Five_Boys'];?>
                                </td>
                                <td>
                                    <?php echo $student['Nursery_Girls']+$student['KG_Girls']+$student['One_Girls']+$student['Two_Girls']+$student['Three_Girls']+$student['Four_Girls']+$student['Five_Girls'] ?>
                                </td>
                                <td>
                                    <?php echo $student['Nursery_Boys']+$student['KG_Boys']+$student['One_Boys']+$student['Two_Boys']+$student['Three_Boys']+$student['Four_Boys']+$student['Five_Boys']+$student['Nursery_Girls']+$student['KG_Girls']+$student['One_Girls']+$student['Two_Girls']+$student['Three_Girls']+$student['Four_Girls']+$student['Five_Girls'] ?>
                                </td>

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
    //    $('#multi-column-ordering').DataTable();
    // }); 
</script>