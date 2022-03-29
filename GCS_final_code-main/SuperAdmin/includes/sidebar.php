    <!--  BEGIN SIDEBAR  -->
    <div class="sidebar-wrapper sidebar-theme">

        <nav id="sidebar">
            <div class="shadow-bottom"></div>
            <ul class="list-unstyled menu-categories" id="accordionExample">
                <li class="menu">
                    <a href="index.php" data-active="true" class="dropdown-toggle">
                        <div class="">
                            <span>Dashboard</span>
                        </div>
                    </a>
                </li>
                <!-- <li class="menu">
                    <a href="teacher.php" class="dropdown-toggle">
                        <div class="">
                            <span>Teachers</span>
                        </div>
                    </a>
                </li> -->
                <li class="menu">
                <a href="#School-details" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Schools</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="School-details" data-parent="#accordionExample">
                    <li>
                        <a href="<?php echo ROOTURL?>totalSchools.php"> Schools List </a>
                        <a href="<?php echo ROOTURL?>AddnewSchool.php"> Add School </a>
                        <a href="<?php echo ROOTURL?>enrollment.php"> Enrollment </a>
                        <a href="<?php echo ROOTURL?>notUpdated.php"> Not Updated </a>
                    </li>
                </ul>
            </li>
            <li class="menu">
                <a href="#components" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-zap">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                        <span>Teachers</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="components" data-parent="#accordionExample">
                    <li>
                        <a href="<?php echo ROOTURL?>teacher.php"> Teachers List </a>
                    </li>
                    <li>
                        <a href="<?php echo ROOTURL?>AddTeachers.php"> Add Teacher </a>
                        <a href="<?php echo ROOTURL?>attendenceteacher.php"> Teacher Attendence </a>
                    </li>



                </ul>
            </li>

            <li class="menu">

                <a href="#elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span>Students</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="elements" data-parent="#accordionExample">
                    <li>
                        <a href="<?php echo ROOTURL?>students_details.php"> Students List </a>
                    </li>

                    <li>
                       
                        <a href="<?php echo ROOTURL?>attendencestudent.php"> Student Attendance </a>
                    </li>
                    <!-- <li>
                        <a href="<?php //echo ROOTURL?>GCSStudentAttendance.php"> Print Attendance </a>
                    </li> -->
                </ul>
            </li>

           

               

              
                
           
                <li class="menu">

<a href="#Monitoring" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
    <div class="">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-airplay">
            <path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path>
            <polygon points="12 15 17 21 7 21 12 15"></polygon>
        </svg>
        <span>Monitoring</span>
    </div>
    <div>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-chevron-right">
            <polyline points="9 18 15 12 9 6"></polyline>
        </svg>
    </div>
</a>
<ul class="collapse submenu list-unstyled" id="Monitoring" data-parent="#accordionExample">
    <li>
        <a href="<?php echo ROOTURL?>report.php"> Field Visit Report </a>
    </li>
    <li>
        <a href="<?php echo ROOTURL?>TeacherAttendance.php">Teacher Attendance </a>
    </li>
    <li>
        <a href="<?php echo ROOTURL?>GCSAttendance.php"> Student Attendance </a>
    </li>
</ul>
</li>
                <li class="menu">

                <a href="#vec" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span>VEC</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="vec" data-parent="#accordionExample">
                    <li>
                        <a href="<?php echo ROOTURL?>Member_Directory.php"> Member Directory </a>
                    </li>
                    <li>
                        <a href="<?php echo ROOTURL?>meetings.php"> VEC Meetings </a>
                    </li>
                </ul>
            </li>

               
                <li class="menu">
                    <a href="complaints.php"  class="dropdown-toggle">
                        <div class="">
                            
                        <span style="font-size:16px ; margin-right:14px" class="d-inline-block"><i
                                    class="far fa-user"></i></span>
                            <span>
                                
                            Contact Form
                            </span>
                        </div>
                    </a>
                    
                </li>
                <!-- <li class="menu">
                    <a href="<?php echo ROOTURL ?>schools/infrastructure.php" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-target">
                                <circle cx="12" cy="12" r="10"></circle>
                                <circle cx="12" cy="12" r="6"></circle>
                                <circle cx="12" cy="12" r="2"></circle>
                            </svg>
                            <span>Schools</span>
                        </div>
                    </a>
                </li> -->
              


            </ul>

        </nav>

    </div>

<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <!--  END SIDEBAR  -->