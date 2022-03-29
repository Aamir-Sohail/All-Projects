<?php include('./includes/header.php');
$NumOfSchools = $datafetch->InProgressSchools($District);
if($NumOfSchools > 0){
   $Teachers = $data->count("esef_school_teachers",$District); 
?>
<!-- students graph.... -->

<div class="col-12 layout-top-spacing px-0">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <h5 style="color: red;">In Progress Proposed School : <?php echo $NumOfSchools;?></h5>
        </div>
    </div>
</div>
<?php } ?>

<div class="row layout-top-spacing mx-auto">
    <div class="layout-spacing col-12 px-0">
        <div class="widget widget-chart-two h-60">
        
            <div class="widget-heading row mx-0 px-2 px-xl-3" style="justify-content: space-between">
                <div class="col-md col-sm-4 col-6 mb-2 px-md-1">
                    <a href="./attendenceteacher.php" class="btn btn-info w-100">Verify Teacher</a>
                </div>
                <div class="col-md col-sm-4 col-6 mb-2 px-md-1">
                    <a href="./attendencestudent.php" class="btn btn-info mb-2 w-100">Verify Student</a>
                </div>
                <div class="col-md col-sm-4 col-6 mb-2 px-md-1">
                    <a href="./AddnewSchool.php" class="btn btn-info mb-2 w-100">Add School</a>
                </div>
                <div class="col-md col-sm-4 col-6 mb-2 px-md-1">
                    <a href="./AddTeachers.php" class="btn btn-info mb-2 w-100">Add Teacher</a>
                </div>
                <div class="col-md col-sm-4 col-6 mb-2 px-md-1">
                    <a href="./report.php" class="btn btn-info mb-2 w-100">Visit Report</a>
                </div>
 
            </div>
        </div>
    </div>



    <div class="col-12 px-0 text-center">
        <div class="widget widget-table-two">

            <!-- <div class="widget-heading">
                <h5 class="">Outstanding Students</h5>
            </div> -->

            <div class="widget-content row mx-0" style="font-weight:bold !important">
                <div class="std_detail">

                    <div class="row mb-3">
                        <div class="col-md-4 col-sm-6 col-11 mx-auto mb-3 pl-lg-0">
                            <div style="margin-bottom: 1.27rem" class=" height display std-title">
                                Schools <br> Marked Attendance
                            </div>
                            <div class="stdAttn height rounded-button">
                                <span class="bg-info"><?php $marked = $data->marked_Attendence($District);echo $marked;?></span> <span class="bg-primary"><?php 
                                $Schools =  $data->count("esef_school_basic",$District);
                            $p1=  round(($marked/$Schools)*100);
                            echo $p1.'%';
                            ?></span>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 col-11 mx-auto mb-3">
                            <div style="    margin-bottom: 1.27rem" class=" height display std-title">
                                Present Students
                            </div>
                            <div class="stdAttn height rounded-button">
                                <span class="bg-info"> <?php $present_students =  $data->present_students($District); echo $present_students['cnt'];?></span> <span class="bg-primary"><?php  
                                $Students = $data->count("esef_baseline",$District);
                                $p=   round(($present_students['cnt']/$Students)*100);
                                echo $p.'%';
                                ?></span>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 col-11 mx-auto mb-3">
                            <div style="    margin-bottom: 1.27rem" class=" height display std-title">
                                Absent Students
                            </div>
                            <div class="stdAttn height rounded-button">
                                <span class="bg-info"><?php $absent_students =  $Students - $present_students['cnt']; echo round($absent_students);?></span> <span class="bg-primary"> <?php $p2= round(($absent_students/$Students)*100);
                                echo $p2.'%';
                                ?></span>
                            </div>
                        </div>
                
                        <div class="col-md-4 col-sm-6 col-11 mx-auto mb-3 pl-lg-0">
                            <div style="    margin-bottom: 1.27rem" class=" height display std-title">
                                Students – Not Marked
                            </div>
                            <div class="stdAttn height rounded-button">
                                <span class="bg-info"> <?php $unmarked=$datafetch->unmarked_students($District);echo $unmarked;?>  </span> <span class="bg-primary"><?php $p8= round(($unmarked/$Students)*100);
                                        echo $p8.'%';
                                        ?></span>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 col-11 mx-auto mb-3">
                            <div style="    margin-bottom: 1.27rem" class=" height display std-title">
                                Present Teachers
                            </div>
                            <div class="stdAttn height rounded-button">
                                <span class="bg-info"><?php $teachers_marked =  $data->teachers_marked_Attendence($District); echo $teachers_marked['cnt'];
                                        ?></span> <span class="bg-primary"><?php $p7= round(($teachers_marked['cnt']/$Teachers)*100);
                                        echo $p7.'%';
                                        ?></span>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 col-11 mx-auto mb-3">
                            <div style="    margin-bottom: 1.27rem" class=" height display std-title">
                                Absent Teachers
                            </div>
                            <div class="stdAttn height rounded-button">
                                <span class="bg-info"><?php 
                                $teachers_marked =  $data->teachers_marked_Attendence($District);
                                $absent_teachers =  $Teachers - $teachers_marked['cnt']; echo abs($absent_teachers);?></span> <span class="bg-primary"> <?php $p6= round(($absent_teachers/$Teachers)*100);
                                echo $p6.'%';
                                ?></span>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- border vertical -->
                <div class="vertical-line mx-auto"></div>

                <div class="school_detail">

                    <div class="row mx-0 mb-1">
                        <div class="std-title height display border-0">
                            Total Schools
                        </div>
                        <div class="ml-auto display stdAttn mt-3 bg-info" style="height: 35px; border-radius: 20px;">
                           <?php echo  $Schools;?>
                        </div>

                    </div>

                    <div class="row mx-0 mb-3">
                        <div class="std-title height display border-0">
                            Total Childrens
                        </div>
                        <div class="ml-auto height display stdAttn mt-3 bg-info" style="height: 35px; border-radius: 20px;">
                           <?php  echo $Students;?>
                        </div>
                    </div>
                    <?php 
                                        $boys = $data->count_boys("Male",$District);
                                        $Girls = $data->count_boys("Female",$District);
                                       
                                        
                                        ?>
                    <div class="row mx-0 mb-1">
                        <div class="std-title height display border-0">
                            Total Boys
                        </div>
                        <div class="ml-auto stdAttn height rounded-button display mt-3">
                            <span class="bg-info"><?php echo $boys?></span> <span class="bg-primary"><?php $p4=round(($boys/$Students)*100); 
                            
                            echo $p4.'%';
                            
                            ?></span>
                        </div>
                    </div>

                    <div class="row mx-0 mb-1">
                        <div class="std-title height display border-0">
                            Total Girls
                        </div>
                        <div class="ml-auto stdAttn height rounded-button display mt-3">
                            <span class="bg-info"><?php echo $Girls?></span> <span class="bg-primary"><?php $p4=round(($Girls/$Students)*100); 
                            
                            echo $p4.'%';
                            
                            ?></span>
                        </div>
                    </div>



                </div>

                <!-- border horizental -->
                <div class="col-7 bd-bottom"></div>
            </div>
        </div>
    </div>

    <div class="col-12 px-0 my-3">
        <div class="widget">
            <div class="row">
                <div class="col-12 my-3 px-0">
                    <h3>Absent Teachers</h3>
                    <div class="row">
                        <a href="#" class="ml-auto col-sm-4 mb-2"><button class="w-100 btn btn-primary">View All</button></a>
                        <a href="#" class="ml-auto col-sm-4 mb-2"><button class="w-100 btn btn-primary">Send Report</button></a>
                        <a href="#" class="ml-auto col-sm-4 mb-2"><button class="w-100 btn btn-primary">Contact Teachers</button></a>
                    </div>
                </div>
                <div class="col-md-2 col-sm-3 col-5 mr-auto">
                    <div class="user-profile">
                        <div class="widget-content widget-content-area px-0 border-0 " style="box-shadow: 0 0 0 0 rgb(255 255 255 /1);">
                            <div class="text-center user-info px-0 mt-1">
                                <img class="w-100" src="./assets/img/profile-7.jpg" alt="avatar">
                                <p style="font-size:12px;" class="mt-1 mb-0">Aqib Afridi</p>
                                <p style="font-size:12px;color:red;" class="mt-0">Days: 20</p>
                                <?php 
                                
                                

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-3 col-5 mr-auto">
                    <div class="user-profile">
                        <div class="widget-content widget-content-area px-0 border-0 " style="box-shadow: 0 0 0 0 rgb(255 255 255 /1);">
                            <div class="text-center user-info px-0 mt-1">
                                <img class="w-100" src="./assets/img/profile-8.jpg" alt="avatar">
                                <p style="font-size:12px;" class="mt-1 mb-0">Sumbal</p>
                                <p style="font-size:12px;color:red;" class="mt-0">Days: 20</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-3 col-5 mr-auto">
                    <div class="user-profile">
                        <div class="widget-content widget-content-area px-0 border-0 " style="box-shadow: 0 0 0 0 rgb(255 255 255 /1);">
                            <div class="text-center user-info px-0 mt-1">
                                <img class="w-100" src="./assets/img/profile-9.jpg" alt="avatar">
                                <p style="font-size:12px;" class="mt-1 mb-0">Wareesha</p>
                                <p style="font-size:12px;color:red;" class="mt-0">Days: 25</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-3 col-5 mr-auto">
                    <div class="user-profile">
                        <div class="widget-content widget-content-area px-0 border-0 " style="box-shadow: 0 0 0 0 rgb(255 255 255 /1);">
                            <div class="text-center user-info px-0 mt-1">
                                <img class="w-100" src="./assets/img/profile-10.jpg" alt="avatar">
                                <p style="font-size:12px;" class="mt-1 mb-0">Kalsoom</p>
                                <p style="font-size:12px;color:red;" class="mt-0">Days: 25</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-3 col-5 mr-auto">
                    <div class="user-profile">
                        <div class="widget-content widget-content-area px-0 border-0 " style="box-shadow: 0 0 0 0 rgb(255 255 255 /1);">
                            <div class="text-center user-info px-0 mt-1">
                                <img class="w-100" src="./assets/img/profile-15.jpg" alt="avatar">
                                <p style="font-size:12px;" class="mt-1 mb-0">Sana</p>
                                <p style="font-size:12px;color:red;" class="mt-0">Days: 10</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-3 col-5 mr-auto">
                    <div class="user-profile">
                        <div class="widget-content widget-content-area px-0 border-0 " style="box-shadow: 0 0 0 0 rgb(255 255 255 /1);">
                            <div class="text-center user-info px-0 mt-1">
                                <img class="w-100" src="./assets/img/profile-12.jpg" alt="avatar">
                                <p style="font-size:12px;" class="mt-1 mb-0">Jannat</p>
                                <p style="font-size:12px;color:red;" class="mt-0">Days: 10</p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="layout-spacing col-12 col-12 px-0">
        <div class="widget widget-chart-two h-60 px-3 py-3">
            <div class="row">
                <a href="#" class="col-sm">
                    <button type="button" class="w-100 btn btn-success position-relative mb-3">
                        <span class="mr-2"><i class="fas fa-envelope-square"></i></span><span class="d-xl-inline-block d-sm-none">Assesment</span>
                        <span class="badge badge-danger counter">22</span>
                    </button>
                    </a> 
                <a href="http://facebook.com/esefkpk" class="col-sm">
                    <button type="button" class="w-100 btn btn-primary position-relative mb-3">
                        <span class="mr-2"><i class="fab fa-facebook-f"></i></span><span class="d-xl-inline-block d-sm-none">Facebook</span>
                        <span class="badge badge-danger counter">22</span>
                    </button>
                </a>
                <a href="https://www.instagram.com/esefkpk/" class="col-sm" >
                    <button type="button" class="w-100 btn btn-info position-relative mb-3">
                        <span class="mr-2"><i class="fab fa-twitter"></i></span><span class="d-xl-inline-block d-sm-none">Twitter</span>
                        <span class="badge badge-danger counter">22</span>
                    </button>
                </a>
                <a href="https://twitter.com/esefkpk" class="col-sm">  
                    <button type="button" class="w-100 btn btn-info position-relative mb-3">
                        <span class="mr-2"><i class="fab fa-instagram"></i></span><span class="d-xl-inline-block d-sm-none">Instagram</span>
                        <span class="badge badge-danger counter">22</span>
                    </button>
                </a>
                
                

                <a href="#" class="col-sm">
                <button type="button" class="w-100 btn btn-danger position-relative mb-3">
                    <span class="mr-2"><i class="fab fa-youtube"></i></span><span class="d-xl-inline-block d-sm-none">Youtube</span>
                    <span class="badge badge-danger counter">22</span>
                </button>
                    </a> 
            </div>
        </div>
    </div>
</div>

<?php include('./includes/footer.php') ?>


