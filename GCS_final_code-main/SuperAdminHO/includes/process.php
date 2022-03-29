<?php
include "auth.php";
$data=new admin();
session_start();
if(isset($_POST['MODE']) && $_POST['MODE']=='deleteComplaint' ){
$id=$_POST['complaintId'];

if($data->deleteComplaint($id)){
    echo '1';
}

}
if(isset($_POST['MODE']) && $_POST['MODE']=='viewComplaint' ){
    $id=$_POST['complaintId'];    
    // if($data->viewComplaint($id)){
    //     echo '1';
    // }  
    echo json_encode($data->viewComplaint($id));  
}
if (isset($_POST['MODE']) && $_POST['MODE'] == "fetchteacherAttendence") {
    $Date = $_POST['date'];

    $result=$data->fetchteacherAttendence($Date);
   
   
    $output=" ";
    if(!empty($result)){

        $output.= '<div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div id="multi-column-ordering_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="dt--top-section">
                        <div class="row">
                            <div class="col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center">
                                <div class="dataTables_length" id="multi-column-ordering_length">
                                    <h5>Attendence sheet from '.$Date.'</h5>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="multi-column-ordering" class="table table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="multi-column-ordering_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc px-0" style="width: 80px;">SNo</th>
                                    <th class="sorting" style="width: 200px;">School Code</th>
                                    <th class="sorting" style="width: 200px;">School Name</th>
                                    <th class="sorting" style="width: 200px;">District</th>
                                    <th class="sorting" style="width: 200px;">Status</th>
                                    <th class="sorting" style="width: 200px;">Total Teachers</th>
                                    <th class="sorting" style="width: 200px;">Present Teachers</th>
                                    <th class="sorting" style="width: 200px;">Absent Teachers</th>
                                    
                                </tr>
                            </thead>
                            <tbody>';


                                
                                
                            $result1=$data->fetchteacherAttendence($Date);
                         
                                    foreach($result1 as $r) {
                                     $no=1;
                                     $district=$data->fetchDistrict($r['DistrictCode']);
                                     $SchoolCode = $r['SchoolCode'];
                                     $district=$district['DistrictName'];
                                     $present = $data->Fetch_Teacher_Attendence_Present('esef_school_teacher_attendence',$SchoolCode, $Date);
                                     $absent = $data->Fetch_Teacher_Attendence_Absent('esef_school_teacher_attendence',$SchoolCode, $Date);
                                     $status = $data->status_check('esef_school_teacher_attendence',$SchoolCode, $Date);
                                     $teachers = $data->Fetch_Teacher($SchoolCode);
                                     $SchoolName=$data->Fetch_SchoolName($SchoolCode);
                                     $SchoolName=$SchoolName['CS_Name'];
                                    //  print_r($district);   
                                $output.='
                                <tr role="row">
                                    <td>'.$no.'</td>
                                    <td>'.$SchoolCode.'</td>
                                    <td>'.$SchoolName.'</td>
                                    <td>'.$district.'</td>
                                    <td>'.$status.'</td>
                                    <td>'.$teachers.'</td>
                                    <td>'.$present.'</td>
                                    <td>'.$absent.'</td>
                                    
                                  
                                   
                                   
                                </tr>';
                               
                                    }
                               $output.=
                            '</tbody>
                        </table>
                    </div>
                    <button onclick="PrintAttendence()" class="btn btn-primary" id="printPage"> Print Attendence</button>
                </div>
            </div>
        </div>
    </div>';
    $no++;
    }
echo $output;
 
}
if (isset($_POST['MODE']) && $_POST['MODE'] == "fetchstudentAttendence") {
   $Date = $_POST['date'];

    $result=$data->fetchteacherAttendence($Date);
   
   
    $output=" ";
    if(!empty($result)){

        $output.= '<div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div id="multi-column-ordering_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="dt--top-section">
                        <div class="row">
                            <div class="col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center">
                                <div class="dataTables_length" id="multi-column-ordering_length">
                                    <h5>Attendence sheet from '.$Date.'</h5>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="multi-column-ordering" class="table table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="multi-column-ordering_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc px-0" style="width: 80px;">SNo</th>
                                    <th class="sorting" style="width: 200px;">School Code</th>
                                    <th class="sorting" style="width: 200px;">School Name</th>
                                    <th class="sorting" style="width: 200px;">District</th>
                                    <th class="sorting" style="width: 200px;">status</th>
                                    <th class="sorting" style="width: 200px;">Total student</th>
                                    <th class="sorting" style="width: 200px;">Present Student</th>
                                    <th class="sorting" style="width: 200px;">Absent Absent</th>
                                    
                                </tr>
                            </thead>
                            <tbody>';


                                
                                
                            $result1=$data->fetchteacherAttendence($Date);
                         
                                    foreach($result1 as $r) {
                                     $no=1;
                                     $district=$data->fetchDistrict($r['DistrictCode']);
                                     $SchoolCode = $r['SchoolCode'];
                                     $district=$district['DistrictName'];
                                     $present = $data->Fetch_Students_Attendence_Present('esef_school_student_attendence',$SchoolCode, $Date);
                                     $absent = $data->Fetch_Students_Attendence_Absent('esef_school_student_attendence',$SchoolCode, $Date);
                                     $status = $data->status_check_students('esef_school_student_attendence',$SchoolCode, $Date);
                                     $teachers = $data->Fetch_Students($SchoolCode);
                                     $SchoolName=$data->Fetch_SchoolName($SchoolCode);
                                     $SchoolName=$SchoolName['CS_Name'];
                                     
                                    //  print_r($district);   
                                $output.='
                                <tr role="row">
                                    <td>'.$no.'</td>
                                    <td>'.$SchoolCode.'</td>
                                    <td>'.$SchoolName.'</td>
                                    <td>'.$district.'</td>
                                    <td>'.$status.'</td>
                                    <td>'.$teachers.'</td>
                                    <td>'.$present.'</td>
                                    <td>'.$absent.'</td>
                                    
                                  
                                   
                                   
                                </tr>';
                               
                                    }
                               $output.=
                            '</tbody>
                        </table>
                    </div>
                    <button onclick="PrintAttendence()" class="btn btn-primary" id="printPage"> Print Attendence</button>
                </div>
            </div>
        </div>
    </div>';
    $no++;
    }
echo $output;
}

if (isset($_POST['MODE']) && $_POST['MODE'] == "password_change") {
    $password = $_POST['Pass'];
    $New_password = $_POST['New_Pass'];
    $Confirm_Password = $_POST['Confirm_Pass'];
    $result = $data->check_pass($_SESSION['AutoID'], $password);
    if($result > 0){
        if($New_password == $Confirm_Password){
           $forgot = $data->update_pass($_SESSION['AutoID'], $New_password);
           if($forgot == '1'){
               echo "Password Updated";
           }else{
               echo "Something Went Worng";
           }
        }else{
            echo "New Password and Confirmed Password didn't Matched";
        }
    }else{
        echo "Invaild Password";
    }
}

if(isset($_POST['userProfile'])){
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $whatsapp = $_POST['whatsapp'];
    $designation = $_POST['designation'];
    $old_image = "";
    $img = "";
    
    
    if(isset($_POST['old_image'])){
        $old_image = $_POST['old_image'];
    }
    

    if(isset($_FILES['image']) && $_FILES['image']['size'] > 0){
        $image = $data->upload_img($_FILES['image']);
        if($image){
            $update = $data->update_userProfile($name, $contact, $whatsapp, $image, $_SESSION['AutoId'],$designation);
            if($update){
                header('Location: ../user_profile.php?success');
            }
        }
    }else{
        $update = $data->update_userProfile($name, $contact, $whatsapp, $old_image, $_SESSION['AutoId'],$designation);
        echo $name, $contact, $whatsapp, $old_image, $_SESSION['AutoId'],$designation;
        if($update){
            header('Location: ../user_profile.php?error');
        }
    }
}
?>