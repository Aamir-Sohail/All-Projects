<?php include('./includes/header.php');

$totalStudent=$datafetch->totalStudentSchool($SchoolCode);
$totalGirls=$datafetch->total_girls($SchoolCode);
$totalBoys=$datafetch->total_boys($SchoolCode);
$DisableStd=$datafetch->DisableStd($SchoolCode);


$presentStudent=$datafetch->totalStudentPresent($SchoolCode, date('Y-m-d'));
$absentstudent=$datafetch->totalStudentAbsent($SchoolCode, date('Y-m-d'));
$totalteacher=$datafetch->totalteacherSchool($SchoolCode);
$presentteacher=$datafetch->totalteacherPresent($SchoolCode, date('Y-m-d'));
$absentteacher=$datafetch->totalteacherAbsent($SchoolCode, date('Y-m-d'));


?>
<!-- students graph.... -->

<div class="row mx-0 layout-top-spacing">
    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-chart-two h-60">
            <div class="widget-heading d-flex">
                <h5 class="">Students Attendance</h5>
                <a href="/students/GCSAttendance.php" class=" ml-auto"><button
                        class="btn btn-primary ml-auto">Mark Attendance</button></a>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-chart-two h-60">
            <div class="widget-heading d-flex">
                <h5 class="">Teacher Attendance</h5>
                <a href="/teachers/TeacherAttendance.php" class=" ml-auto"><button
                        class="btn btn-primary">Mark Attendance</button></a>
            </div>
        </div>
    </div>


    <div class="col-12 layout-spacing">
        <div class="widget widget-table-two">

            <div class="widget-content row mx-0" style="font-weight:bold !important">
                <div class="std_detail">

                    <div class="row mb-3">
                        <div class="col-4">
                            <div style="margin-bottom: 1.27rem" class=" height display std-title text-center">
                                Total Students
                            </div>
                            <!-- <div class="stdAttn height rounded-button">
                                <span class="bg-info">14</span> <span class="bg-primary">70%</span>
                            </div> -->
                            <div class="ml-auto display stdAttn mt-3 bg-info"
                                style="height: 35px; border-radius: 20px;">
                               <?php echo $totalStudent;?>
                            </div>
                        </div>

                        <div class="col-4">
                            <div style="    margin-bottom: 1.27rem" class=" height display std-title">
                                Present Students
                            </div>
                            <div class="stdAttn height rounded-button">
                                <span class="bg-info"> <?php echo $presentStudent;?></span> <span class="bg-primary">
                                <?php echo round($presentStudent/$totalStudent * 100);?>   
                                %</span>
                            </div>
                        </div>

                        <div class="col-4">
                            <div style="    margin-bottom: 1.27rem" class=" height display std-title">
                                Absent Students
                            </div>
                            <div class="stdAttn height rounded-button">
                                <span class="bg-info"><?php echo $absentstudent;?></span> <span class="bg-primary">
                                <?php echo round($absentstudent/$totalStudent * 100);?> %</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div style="    margin-bottom: 1.27rem" class=" height display std-title">
                                Total Teachers
                            </div>
                            <!-- <div class="stdAttn height rounded-button">
                                <span class="bg-info">2</span> <span class="bg-primary">80%</span>
                            </div> -->
                            <div class="ml-auto display stdAttn mt-3 bg-info"
                                style="height: 35px; border-radius: 20px;">
                                <?php echo $totalteacher;?>
                            </div>
                        </div>

                        <div class="col-4">
                            <div style="    margin-bottom: 1.27rem" class=" height display std-title">
                                Present Teachers
                            </div>
                            <!-- <div class="stdAttn height rounded-button">
                                <span class="bg-info">1</span> <span class="bg-primary">50%</span>
                            </div> -->
                            <div class="ml-auto display stdAttn mt-3 bg-info"
                                style="height: 35px; border-radius: 20px;">
                                <?php echo $presentteacher;?>
                            </div>
                        </div>

                        <div class="col-4">
                            <div style="    margin-bottom: 1.27rem" class=" height display std-title">
                                Absent Teachers
                            </div>
                            <div class="ml-auto display stdAttn mt-3 bg-info"
                                style="height: 35px; border-radius: 20px;">
                                <?php echo $absentteacher;?>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- border vertical -->
                <div class="vertical-line mx-auto"></div>

                <div class="school_detail">

                    <div class="row mx-0 mb-1">
                        <div class="std-title height display border-0">
                            Total Childrens
                        </div>
                        <div class="ml-auto display stdAttn mt-3 bg-info" style="height: 35px; border-radius: 20px;">
                        <?php echo $totalStudent;?>
                        </div>

                    </div>



                    <div class="row mx-0 mb-1">
                        <div class="std-title height display border-0">
                            Total Girls
                        </div>
                        <div class="ml-auto stdAttn height rounded-button display mt-3">
                            <span class="bg-info"><?php echo $totalGirls?></span> <span class="bg-primary"><?php echo round($totalGirls/$totalStudent * 100);?>%</span>
                        </div>
                    </div>

                    <div class="row mx-0 mb-1">
                        <div class="std-title height display border-0">
                            Total Boys
                        </div>
                        <div class="ml-auto stdAttn height rounded-button display mt-3">
                            <span class="bg-info"><?php echo $totalBoys?></span> <span class="bg-primary"><?php echo round($totalBoys/$totalStudent * 100);?>%</span>
                        </div>
                    </div>

                    <div class="row mx-0 mb-3">
                        <div class="std-title height display border-0">
                            Special Children
                        </div>
                        <div class="ml-auto stdAttn height rounded-button display mt-3">
                            <span class="bg-info"><?php
                            $dis =  $DisableStd['Disable_Girls']+$DisableStd['Disable_Boys'];
                            echo $dis;
                            ?></span> <span class="bg-primary"><?php echo round($dis/$totalStudent * 100)?>%</span>
                            
                        </div>
                    </div>

                </div>

                <!-- border horizental -->
                <div class="col-7 bd-bottom"></div>
            </div>

        </div>
    </div>




</div>

<?php include('./includes/footer.php') ?>