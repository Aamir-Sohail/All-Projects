<?php include('includes/header.php'); ?>

<div class="col-12 layout-top-spacing">




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

    <form action="exports_list/Teacher.php">

        <div class="row">
            <div class="col-sm-6 d-flex justify-content-start">

                <h5>Teachers </h5>

            </div>
            <?php
                    $today=date('Y-m-d')
                    ?>
            <div class="col-sm-6 d-flex justify-content-end">

                <input type="hidden" name="export" value="basic">
                <!-- <a href="excelExport.php?export=basic" class="btn btn-primary">Export To Excel</a> -->
                <input type="submit" value="Export" class="btn btn-primary">

            </div>
        </div>

    </form>

    <div class="table-responsive scrollbar scrolledY-axis">
        <div class="table-scrolled scrollbar">
            <table class="table table-hover dataTable no-footer">
                <thead>
                    <tr role="row">
                        <th>
                            School Code
                        </th>
                        <th>
                            Proposed Name
                        </th>
                        <th>
                            District
                        </th>
                        <th>Tehsil</th>
                        <th>Teacher Name</th>
                        <th>Father Name</th>
                        <th>Gender</th>
                        <th>Degree</th>
                        <th>Subject</th>
                        <th>Qualification</th>
                        <th>CNIC</th>

                        <!--<th class="sorting text-center" tabindex="0" aria-controls="multi-column-ordering"-->
                        <!--    rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending"-->
                        <!--    style="width: 163.078px;">Action</th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $data_output = $data->Teacher($District);
                        $no = 1;
                        foreach ($data_output as $row) {
                            ?>
                    <tr role="row" class="odd">
                        <td>
                            <?php echo $row['SchoolCode'] ?></td>
                        <td>GCS
                            <?php echo $row['Village'] ?></td>
                        <td>
                            <?php echo $row['DistrictName'] ?></td>
                        <td><?php echo $row['TehsilName'] ?>
                        </td>
                        <td>
                            <?php echo $row['Teacher_Name'] ?></td>
                        <td style="width:385px">
                            <?php echo $row['Father_Name'] ?></td>
                        <td style="width:50px"><?php if($row['Gender'] == '1'){
                                echo "Female";
                            }else{
                                echo "Male";
                            } ?>
                        </td>
                        <td><?php echo $row['Degree'] ?></td>
                        <td><?php echo $row['Subject'] ?></td>
                        <td><?php echo $row['Qualification'] ?></td>
                        <td><?php echo $row['CNIC'] ?></td>
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



<?php include('includes/footer.php'); ?>

<script>
    // $(document).ready(function() {
    //     $('#multi-column-ordering').DataTable();
    // });
</script>