<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu">
                <a href="<?php echo ROOTURL ?>//dashboard.php" data-active="true" class="dropdown-toggle">
                    <div class="">
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>

            <li class="menu">

                <a href="#elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
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
                        <a href="<?php echo ROOTURL ?>/students/admision-form.php">Add Student </a>
                    </li>
                    <li>
                        <a href="<?php echo ROOTURL ?>/students/students_details.php"> Students Profile </a>
                    </li>
                    <li>
                        <a href="<?php echo ROOTURL ?>/students/GCSAttendance.php"> Student Attendance </a>
                    </li>
                    <li>
                            <a href="<?php echo ROOTURL ?>/students/GCSPromotions.php"> Promotions </a>
                        </li>
                    <li>
                        <a href="<?php echo ROOTURL ?>/students/GCSStudentAttendance.php"> Print Attendance </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a href="#components" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        
                    <span style="font-size:16px ; margin-right:14px" class="d-inline-block"><i
                                class="far fa-user"></i></span>
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
                        <a href="<?php echo ROOTURL ?>/teachers/addTeachers.php"> Add Teacher </a>
                    </li>
                    <li>
                        <a href="<?php echo ROOTURL ?>/teachers/teacherDetails.php"> Teachers Details </a>
                    </li>
                    <li>
                        <a href="<?php echo ROOTURL ?>/teachers/TeacherAttendance.php"> Teachers Attendance </a>
                        <a href="<?php echo ROOTURL ?>/teachers/PrintAttendence.php"> Print Attendence </a>
                        <a href="<?php echo ROOTURL ?>/teachers/Leave_request_form.php"> Leave Request </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a href="#components1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
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
                <ul class="collapse submenu list-unstyled" id="components1" data-parent="#accordionExample">

                    <li>
                        <a href="<?php echo ROOTURL ?>/schools/basic_profile.php"> Basic Profile </a>
                    </li>
                    <li>
                        <a href="<?php echo ROOTURL ?>/schools/Nearest_Institution.php"> Nearest Institution </a>
                        <a href="<?php echo ROOTURL ?>/schools/Enrollment.php"> Enrollment </a>
                        <a href="<?php echo ROOTURL ?>/schools/Facilitites.php"> Facilitites </a>
                    </li>
                </ul>
            </li>
            <li class="menu">
                    <a href="#vec" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            
                        <span style="font-size:16px ; margin-right:14px" class="d-inline-block"><i class="far fa-user"></i></span>
                            <span>VEC</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="vec" data-parent="#accordionExample">
                        <li>
                            <a href="<?php echo ROOTURL ?>/VEC/"> Members Details </a>
                        </li>
                        <li>
                            <a href="<?php echo ROOTURL ?>/VEC/VEC_Meetings.php"> VEC Meeting </a>
                        </li>
                        <li>
                            <a href="<?php echo ROOTURL ?>/VEC/School_Improvement_plan.php"> School Improvement Plan</a>
                        </li>
                    </ul>
                </li>
                <li class="menu">
                    <a href="<?php echo ROOTURL ?>/visitors.php" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay">
                                <path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path>
                                <polygon points="12 15 17 21 7 21 12 15"></polygon>
                            </svg>
                            <span>Visitor</span>
                        </div>
                    </a>
                </li>
            <li class="menu">
                <a href="<?php echo ROOTURL ?>/contact.php" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-clipboard">
                            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                            <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                        </svg>
                        <span>Contact Form</span>
                    </div>
                </a>
            </li>

           

        


        </ul>

    </nav>

</div>

<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <!--  END SIDEBAR  -->