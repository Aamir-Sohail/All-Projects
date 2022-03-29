

<?php include('includes/header.php'); ?>

<div class="col-lg-12 col-12 layout-top-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">

            <div class="row col-12  mx-auto">
                <div class="col-4 layout-spacing">
                    <div class="widget widget-account-invoice-two">
                        <div class="widget-content">
                            <div class="account-box">
                                <div class="info mb-0">
                                    <div class="inv-title">
                                        <!--<h5 class="inv-balance mb-2">Total Districts</h5>-->
                                        <h5 class="inv-balance">Total Tehsil</h5>
                                        <h5 class="inv-balance">Total U/C</h5>
                                        <h5 class="inv-balance">Total V/C</h5>
                                    </div>
                                    <div class="inv-balance-info">
                                        
                                        <h5 class="inv-balance"> <?php echo $data->countCovered("Tehsil",$District);?></h5>
                                        <h5 class="inv-balance"> <?php echo $data->countCovered("UC",$District);?></h5>
                                        <h5 class="inv-balance"> <?php echo $data->countCovered("VC",$District);?></h5>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4   layout-spacing ">
                    <div class="widget widget-account-invoice-two">
                        <div class="widget-content">
                            <div class="account-box">
                                <div class="info mb-0">
                                    <div class="inv-title">
                                        <h5 class="inv-balance mb-2">Total Schools</h5>
                                        <h5 class="inv-balance">Total Teachers</h5>
                                        <h5 class="inv-balance">Total Students</h5>
                                      
                                    </div>
                                    <div class="inv-balance-info">
                                        <h5 class="inv-balance"> <?php $Schools = $data->count("esef_school_basic",$District); echo $Schools; 
                                        ?></h5>
                                        <h5 class="inv-balance"> <?php $teachers =  $data->count("esef_school_teachers",$District); echo $teachers;?></h5>
                                        <h5 class="inv-balance"> <?php echo $data->count("esef_baseline",$District);?></h5>
                                       
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4   layout-spacing ">
                    <div class="widget widget-account-invoice-two">
                        <div class="widget-content">
                            <div class="account-box">
                                <div class="info mb-0">
                                    <div class="inv-title">
                                        <h5 class="inv-balance mb-2">Total Students</h5>
                                        <h5 class="inv-balance">Total Boys</h5>
                                        <h5 class="inv-balance">Total Girls</h5>
                                      
                                    </div>
                                    <div class="inv-balance-info">
                                        <h5 class="inv-balance"> <?php $Students =   $data->count_baseline(); echo $Students;
                                        ?></h5>
                                        <h5 class="inv-balance"> <?php echo $data->count_baseline_gender("Male");?></h5>
                                        <h5 class="inv-balance"> <?php echo $data->count_baseline_gender("Female");?></h5>
                                       
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4   layout-spacing ">
                    <div class="widget widget-account-invoice-two">
                        <div class="widget-content">
                            <div class="account-box">
                                <div class="info mb-0">
                                    <div class="inv-title">
                                        <h5 class="inv-balance mb-2">Total Schools</h5>
                                        <h5 class="inv-balance">Marked Attendence</h5>
                                        <h5 class="inv-balance">Not Unmarked Attendence</h5>
                                      
                                    </div>
                                    <div class="inv-balance-info">
                                        <h5 class="inv-balance"> <?php echo  $Schools;
                                        ?></h5>
                                        <h5 class="inv-balance"> <?php $marked = $data->marked_Attendence();echo $marked;?></h5>
                                        <h5 class="inv-balance"> <?php $unmarked =  $Schools- $marked; echo abs($unmarked);?></h5>
                                       
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4   layout-spacing ">
                    <div class="widget widget-account-invoice-two">
                        <div class="widget-content">
                            <div class="account-box">
                                <div class="info mb-0">
                                    <div class="inv-title">
                                        <h5 class="inv-balance mb-2">Total Teachers</h5>
                                        <h5 class="inv-balance">Present Teachers</h5>
                                        <h5 class="inv-balance">Absent Teachers</h5>
                                      
                                    </div>
                                    <div class="inv-balance-info">
                                        <h5 class="inv-balance"> <?php echo $teachers;
                                        ?></h5>
                                        <h5 class="inv-balance"> <?php $teachers_marked =  $data->teachers_marked_Attendence(); echo $teachers_marked['cnt'];?></h5>
                                        <h5 class="inv-balance"> <?php $absent_teachers =  $teachers - $teachers_marked['cnt']; echo abs($absent_teachers);?></h5>
                                       
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-4   layout-spacing ">
                    <div class="widget widget-account-invoice-two">
                        <div class="widget-content">
                            <div class="account-box">
                                <div class="info mb-0">
                                    <div class="inv-title">
                                        <h5 class="inv-balance mb-2">Total Students</h5>
                                        <h5 class="inv-balance">Present Students</h5>
                                        <h5 class="inv-balance">Absent Students</h5>
                                      
                                    </div>
                                    <div class="inv-balance-info">
                                        <h5 class="inv-balance"> <?php echo $Students;
                                        ?></h5>
                                        <h5 class="inv-balance"> <?php $present_students =  $data->present_students(); echo $present_students['cnt'];?></h5>
                                        <h5 class="inv-balance"> <?php $absent_students =  $Students - $present_students['cnt']; echo abs($absent_students);?></h5>
                                       
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
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


























  