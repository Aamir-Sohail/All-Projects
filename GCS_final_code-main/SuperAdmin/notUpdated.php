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

            <form action="exports_list/Not_Updated.php">

                <div class="row">
                    <div class="col-sm-6 d-flex justify-content-start">

                        <h5>Not Updated Schools</h5>

                    </div>
                        <?php
                            $today=date('Y-m-d')
                            ?>
                    <div class="col-sm-6 d-flex justify-content-end">

                        <input type="hidden" name="export" value="basic">
                        <a href="exports_list/Not_Updated.php" class="btn btn-primary">Export To Excel</a>

                    </div>
                </div>

            </form>

            <div class="table-responsive scrollbar scrolledY-axis">
                <div class="table-scrolled scrollbar">
                    <table class="table table-hover dataTable no-footer" >
                        <thead>
                            <tr>
                                <th >
                                    SNo.
                                </th>
                                <th >
                                    School Code
                                </th>
                                <th>
                                    GCS Name
                                </th>
                                <th >
                                    District
                                </th>
                                <th >Teacher Name</th>
                                <th >Teacher CNIC</th>
                                <th >Teacher Contact#</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data_output = $data->Not_Updated($District);
                            // print_r($data_output);
                            $no = 1;
                            
                            foreach ($data_output as $row) {
                                $SchoolCode = $row['SchoolCode'];
                                ?>
                            <tr >
                                <td><?php echo $no;?></td>
                                <td >
                                    <?php echo $row['SchoolCode'] ?></td>
                                <td >
                                    <?php echo $row['CSName'] ?></td>

                                <td ><?php echo $row['District'] ?>
                                </td>
                                <td >
                                    <?php echo $row['TeacherName'] ?></td>
                                <td><?php echo $row['TeacherCNIC'] ?></td>
                                <td><?php echo $row['Contact'] ?></td>
                                <?php 
                                $student= $data->enrollment($SchoolCode);
                                ?>


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

<?php include('includes/footer.php'); ?>

<script>
    // $(document).ready(function() {
    //     $('#multi-column-ordering').DataTable();
    // });
</script>