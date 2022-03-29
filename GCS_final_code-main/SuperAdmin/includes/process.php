<?php
session_start();
include "auth.php";
$data=new admin();
date_default_timezone_set('Asia/Karachi');
$date=date('Y-m-d');
$district = $_SESSION['District'];
if(isset($_POST['MODE']) && $_POST['MODE']=='deleteComplaint' ){
$id=$_POST['complaintId'];

if($data->deleteComplaint($id)){
    echo '1';
}


}
//to view complaint
if(isset($_POST['MODE']) && $_POST['MODE']=='viewComplaint' ){
    $id=$_POST['complaintId'];    
    // if($data->viewComplaint($id)){
    //     echo '1';
    // }  
    echo json_encode($data->viewComplaint($id));  
}

if (isset($_POST['MODE']) && $_POST['MODE'] == "fetchteacherAttendence") {
    $Date = $_POST['date'];

    $result=$data->fetchteacherAttendence($district);
    $output=" ";
    if(!empty($result)){

        $output.= '<div class="layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div id="multi-column-ordering_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    
                  
                    <h5 class="my-3">Attendence sheet from '.$Date.'</h5>
      
                  
                    <div class="table-responsive scrollbar scrolledY-axis">
                        <div class="table-scrolled scrollbar">
                            <table class="table table-hover dataTable" >
                                <thead>
                                    <tr role="row">
                                        <th>SNo</th>
                                        <th>School Code</th>
                                        <th>School Name</th>
                                        <th>District</th>
                                        <th>Status</th>
                                        <th>Total Teachers</th>
                                        <th>Present Teachers</th>
                                        <th>Absent Teachers</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>';


                                    
                                    
                                $result1=$data->fetchteacherAttendence($district);
                                
                                $no=1;
                                        foreach($result1 as $r) {
                                        
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
                                    $no++;
                                
                                        }
                                $output.=
                                '</tbody>
                            </table>
                        </div>
                    </div>
                    <button onclick="PrintAttendence()" class="btn btn-primary mt-3" id="printPage"> Print Attendence</button>
                </div>
            </div>
        </div>';
    
    }
echo $output;
 
}
// if (isset($_POST['MODE']) && $_POST['MODE'] == "fetchstudentAttendence") {
//    $Date = $_POST['date'];

//     $result=$data->fetchteacherAttendence($district);
   
   
//     $output=" ";
//     if(!empty($result)){

//         $output.= '<div class="row layout-top-spacing">
//         <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
//             <div class="widget-content widget-content-area br-6">
//                 <div id="multi-column-ordering_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
//                     <div class="dt--top-section">
//                         <div class="row">
//                             <div class="col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center">
//                                 <div class="dataTables_length" id="multi-column-ordering_length">
//                                     <h5>Attendence sheet from '.$Date.'</h5>


//                                 </div>
//                             </div>
//                         </div>
//                     </div>
//                     <div class="table-responsive">
//                         <table id="multi-column-ordering" class="table table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="multi-column-ordering_info">
//                             <thead>
//                                 <tr role="row">
//                                     <th class="sorting_asc px-0" style="width: 80px;">SNo</th>
//                                     <th class="sorting" style="width: 200px;">School Code</th>
//                                     <th class="sorting" style="width: 200px;">School Name</th>
//                                     <th class="sorting" style="width: 200px;">District</th>
//                                     <th class="sorting" style="width: 200px;">status</th>
//                                     <th class="sorting" style="width: 200px;">Total student</th>
//                                     <th class="sorting" style="width: 200px;">Present Student</th>
//                                     <th class="sorting" style="width: 200px;">Absent Absent</th>
                                    
//                                 </tr>
//                             </thead>
//                             <tbody>';


                                
                                
//                             $result1=$data->fetchteacherAttendence($district);
                         
//                                     foreach($result1 as $r) {
//                                      $no=1;
//                                      $district=$data->fetchDistrict($r['DistrictCode']);
//                                      $SchoolCode = $r['SchoolCode'];
//                                      $district=$district['DistrictName'];
//                                      $present = $data->Fetch_Students_Attendence_Present('esef_school_student_attendence',$SchoolCode, $Date);
//                                      $absent = $data->Fetch_Students_Attendence_Absent('esef_school_student_attendence',$SchoolCode, $Date);
//                                      $status = $data->status_check_students('esef_school_student_attendence',$SchoolCode, $Date);
//                                      $teachers = $data->Fetch_Students($SchoolCode);
//                                      $SchoolName=$data->Fetch_SchoolName($SchoolCode);
//                                      $SchoolName=$SchoolName['CS_Name'];
                                     
//                                     //  print_r($district);   
//                                 $output.='
//                                 <tr role="row">
//                                     <td>'.$no.'</td>
//                                     <td>'.$SchoolCode.'</td>
//                                     <td>'.$SchoolName.'</td>
//                                     <td>'.$district.'</td>
//                                     <td>'.$status.'</td>
//                                     <td>'.$teachers.'</td>
//                                     <td>'.$present.'</td>
//                                     <td>'.$absent.'</td>
                                    
                                  
                                   
                                   
//                                 </tr>';
                               
//                                     }
//                                $output.=
//                             '</tbody>
//                         </table>
//                     </div>
//                     <button onclick="PrintAttendence()" class="btn btn-primary" id="printPage"> Print Attendence</button>
//                 </div>
//             </div>
//         </div>
//     </div>';
//     $no++;
//     }
// echo $output;
// }
if (isset($_POST['MODE']) && $_POST['MODE'] == "fetchstudentAttendence") {
    $Date = $_POST['date'];
 
     $output=" ";
 
         $output.= ' <div class="layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div id="multi-column-ordering_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                     
                    <h5 class="my-3">Attendence sheet from '.$Date.'</h5>
        
                    <div class="table-responsive scrollbar scrolledY-axis">
                        <div class="table-scrolled scrollbar">
                            <table class="table table-hover dataTable">
                                <thead>
                                    <tr role="row">
                                        <th>SNo</th>
                                        <th>School Code</th>
                                        <th>School Name</th>
                                        <th>District</th>
                                        <th>status</th>
                                        <th>Total student</th>
                                        <th>Present Student</th>
                                        <th>Absent Absent</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>';
    
    
                                    
                                $districtData = $data->fetchDistrict($_SESSION['District']);
                                $districtName = $districtData['DistrictName'];
                                $result1=$data->fetchteacherAttendence($district);
                                // $district=$data->fetchDistrict($r['DistrictCode']);
                                $no=1;
                                        foreach($result1 as $r) {
                                        //  $district=$data->fetchDistrict($r['DistrictCode']);
                                        $SchoolCode = $r['SchoolCode'];
                                        //  $district=$district['DistrictName'];
                                        $present = $data->Fetch_Students_Attendence_Present('esef_school_student_attendence',$SchoolCode, $Date);
                                        //  $absent = $data->Fetch_Students_Attendence_Absent('esef_school_student_attendence',$SchoolCode, $Date);
                                        //  $status = $data->status_check_students('esef_school_student_attendence',$SchoolCode, $Date);
                                        $teachers = $data->Fetch_Students($SchoolCode);
                                        $SchoolName=$r['CS_Name'];
                                        $absent = $present - $teachers;
                                        if($present == 0){
                                            $status = "UnMarked";
                                        }else{
                                            $status = "Marked";
                                        }
                                        
                                        //  print_r($district);   
                                    $output.='
                                    <tr role="row">
                                        <td>'.$no.'</td>
                                        <td>'.$SchoolCode.'</td>
                                        <td>'.$SchoolName.'</td>
                                        <td>'.$districtName.'</td>
                                        <td>'.$status.'</td>
                                        <td>'.$teachers.'</td>
                                        <td>'.$present.'</td>
    
                                        <td>'.max($absent, 0).'</td>
                                        
                                    
                                        
                                        
                                    </tr>';
                                    $no++;
                                        }
                                    $output.=
                                '</tbody>
                            </table>
                        </div>
                    </div>
                    <button onclick="PrintAttendence()" class="btn btn-primary" id="printPage"> Print Attendence</button>
                    </div>
                </div>
            </div>
     </div>';
     
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
    // $userID = $_SESSION['AutoID'];
    $designation=$_POST['designation'];
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
                header('Location: ../user_profile.php');
            }
        }
    }else{
        $update = $data->update_userProfile($name, $contact, $whatsapp, $old_image, $_SESSION['AutoId'],$designation);
        if($update){
            header('Location: ../user_profile.php');
        }
    }
    

}
if(isset($_POST['MODE'])&& $_POST['MODE']=='fetchSchoolByDistrict'){
    $school=$data->getSchoolByTehsilCode($_POST['tehsilCode']);
    
    $output=" ";
    foreach($school as $row){
        $output.= '<option value='.$row['SchoolCode'].'>'.$row['CS_Name'].'</option>';
    }
    echo $output;
}
if (isset($_POST['MODE'])&& $_POST['MODE']=='fetchhattendence') {
    $SchoolCode=$data->test_input($_POST['SchoolCode']);
    //900296

    $date=$data->test_input($_POST['date']);
    
    $result1=$data->checkTeacherInverify($SchoolCode, $date);
    if ($result1==0) {
        $result=$data->fetchTeacherAttendenceBySchoolCode($SchoolCode, $date);
        if (!empty($result)) {
            $output=" ";
            foreach ($result as $row) {
                if ($row['status']=='0') {
                    $status="Present";
                } elseif ($row['status']=='1') {
                    $status="Leave";
                } elseif ($row['status']=='2') {
                    $status='Absent';
                }
                $output.= '      <tr role="row">
         <td>'. $row['Teacher_Id'].'</td>
         <td>'. $row['Teacher_Name'].'</td>
         <td>'. $row['CNIC'].'</td>
         
       
         
         <td>'. $status.'</td>
         <td>
         <div class="n-chk">
             <label class="new-control new-checkbox checkbox-secondary">
             <input type="hidden" name="SchoolCode" value="'.$row['SchoolCode'].'">     
             <input type="hidden" name="date" value="'.$date.'">    
             <input type="hidden" name="AttendenceId[]" value="'.$row['Attendence_Id'].'">
             <input type="hidden" name="Teacher_Id[]" value="'.$row['Teacher_Id'].'">
             <input type="hidden" name="status[]" value="1" id="status'.$row['Teacher_Id'].'">
                 <input type="checkbox" class="new-control-input" id="'.$row['Teacher_Id'].'" onchange="status_check('.$row['Teacher_Id'].')"  checked>
                 <span class="new-control-indicator"></span>Verified
             </label>
         </div>
         </td>
     </tr>';
            }
            echo $output;
        } else {
            echo "empty";
        }
    }else{
        echo "verified";
    }
    // if(){
    //   
    // }else{
    //     header("Location: ../TeacherAttendance.php?alert=fail");
    
    // }
}
if(isset($_POST['verifyteacher'])){
   
 
    $SchoolCode=$data->test_input($_POST['SchoolCode']);
    $date=$data->test_input($_POST['date']);
    $result1=$data->checkTeacherInverify($SchoolCode, $date);
    if ($result1==0) {
        for ($i=0;$i<sizeof($_POST['AttendenceId']);$i++) {
            $data->VerifyAttendece($_POST['AttendenceId'][$i], $_POST['Teacher_Id'][$i], $_POST['status'][$i], $SchoolCode, $date);
        }


        header("Location: ../TeacherAttendance.php?alert=sucess");
    }else{
        header("Location: ../TeacherAttendance.php?alert=alreadymarked");
    }
    
}
if(isset($_POST['MODE']) && $_POST['MODE']=="xxx"){

    $vPresent=$data->test_input($_POST['vPresent']);
$vAbsent=$data->test_input($_POST['vAbsent']);
$vComment=$data->test_input($_POST['vCommen']);
$date=$data->test_input($_POST['date']);
$SchoolCode=$data->test_input($_POST['SchoolCode']);
$present=$data->fetchPresentCount($SchoolCode, $date);
$absent=$data->fetchAbsentCount($SchoolCode, $date);

echo $data->insertStudentVerified($SchoolCode, $vPresent, $vAbsent, $present, $absent, $vComment, $date);


}
if(isset($_POST['MODE']) && $_POST['MODE']=="FetchUC"){

   $tehsilCode=$data->test_input($_POST['TehsilCode']);
   $res=$data->FetchUcThroughTehsil($tehsilCode);
   $output=' <option>--SELECT--</option>';
   foreach($res as $re){
       $output.= ' <option value='.$re['UnionCouncilCode'].'>'.$re['UnionCouncilName'].'</option>';
   }
   echo $output;






}
if(isset($_POST['MODE']) && $_POST['MODE']=="FetchSchool"){

   $tehsilCode=$data->test_input($_POST['TehsilCode']);
   $res=$data->FetchSchoolThroughUC($tehsilCode);
   $output=' <option>--SELECT--</option>';
   foreach($res as $re){
       $output.= ' <option value='.$re['AutoID'].'>'.$re['CS_Name'].'</option>';
   }
   echo $output;






}
if(isset($_POST['MODE']) && $_POST['MODE']=="Fetchbasics"){
print_r($_POST);
   $tehsilCode=$data->test_input($_POST['TehsilCode']);
   $res=$data->FetchSchoolThroughTehsil($tehsilCode);
   $output=' <option>--SELECT--</option>';
   foreach($res as $re){
       $output.= ' <option value='.$re['AutoID'].'>'.$re['CS_Name'].'</option>';
   }
   echo $output;







}

if(isset($_POST['TeacherInformation'])){

print_r($_POST);
$TeacherName=$data->test_input($_POST['T-name']);
$FatherName=$data->test_input($_POST['T_father-name']);
	$HusbandName=$data->test_input($_POST['husband-name']);
    	$MartialStatus=$data->test_input($_POST['Martial-status']);
        	$Gender=$data->test_input($_POST['gender']);
            	$CNIC=$data->test_input($_POST['Teacher_cnic']);
                	$DOB=$data->test_input($_POST['DOB']);
                    	$Qualification=$data->test_input($_POST['Qualification']);
                        	$Contact=$data->test_input($_POST['Contact-num']);
                            	$Tehsil=$data->test_input($_POST['district']);
                                	$UC=$data->test_input($_POST['uc']);
                                    	$Village=$data->test_input($_POST['village']);
                                        	$Desgination=$data->test_input($_POST['designation']);
                                            	$JobStatus=$data->test_input($_POST['job-status']);
                                                	$ContractDate=$data->test_input($_POST['contract']);
                                               $ContractExpire=$data->test_input($_POST['contract-expire']);
                                                        $CurrentStatus=$data->test_input($_POST['Current-status']);
                                                        	$SchoolName	=$data->test_input($_POST['SchoolName']);
                                                            $PostalAddress=$data->test_input($_POST['PostalAddress']);
if(                                                            $data->InsertTeacherinformation($TeacherName ,  $FatherName	,$HusbandName	,$MartialStatus,$Gender	,$CNIC	,$DOB	,$Qualification	,$Contact	,$Tehsil	,$UC	,$Village	,$Desgination	,$JobStatus	,$ContractDate	,$ContractExpire	,$CurrentStatus	,$SchoolName	,$PostalAddress)
)     {
    header("Location: ../AddTeachers.php?alert=success");
} else{
    header("Location: ../AddTeachers.php?alert=unsuccess");
}                                                     



}



//    $tehsilCode=$data->test_input($_POST['TehsilCode']);
//    $res=$data->FetchUcThroughTehsil($tehsilCode);
//    $output=' <option>--SELECT--</option>';
//    foreach($res as $re){
//        $output.= ' <option value='.$re['UnionCouncilCode'].'>'.$re['UnionCouncilName'].'</option>';
//    }
//    echo $output;






// }
if(isset($_POST['MODE']) && $_POST['MODE']=="FetchSchool"){

   $tehsilCode=$data->test_input($_POST['TehsilCode']);
   $res=$data->FetchSchoolThroughUC($tehsilCode);
   $output=' <option>--SELECT--</option>';
   foreach($res as $re){
       $output.= ' <option value='.$re['AutoID'].'>'.$re['CS_Name'].'</option>';
   }
   echo $output;






}
if(isset($_POST['MODE']) && $_POST['MODE']=="Fetchbasics"){

   $tehsilCode=$data->test_input($_POST['TehsilCode']);
   $res=$data->FetchSchoolThroughTehsil($tehsilCode);
   $output=' <option>--SELECT--</option>';
   foreach($res as $re){
       $output.= ' <option value='.$re['AutoID'].'>'.$re['CS_Name'].'</option>';
   }
   echo $output;
}

if(isset($_POST['MODE']) && $_POST['MODE']=="DPOSchool"){
    
        $district = $district ;
        $NA = $data->test_input($_POST['NA']);
        $PK = $data->test_input($_POST['PK']);
        $Tehsil = $data->test_input($_POST['Tehsil']);
        $UC = $data->test_input($_POST['UC']);
        $VC = $data->test_input($_POST['VC']);
        $Village = $data->test_input($_POST['Village']);
        $Mohallah = $data->test_input($_POST['Mohalla']);
        $landmark = $data->test_input($_POST['landmark']);
        $Xcord = $data->test_input($_POST['X-cord']);
        $Ycord = $data->test_input($_POST['Y-cord']);
        $Program = $data->test_input($_POST['Program']);
        $CS_Name = $data->test_input($_POST['CS_Name']);
        $CS_Code = $data->test_input($_POST['CS_Code']);
        $CS_Type = $data->test_input($_POST['CS_Type']);
        $Status = $data->test_input($_POST['status']);
        $Building_Ownership = $data->test_input($_POST['Building_Ownership']);
        $Gender = $data->test_input($_POST['gender']);
        $Building_Structure = $data->test_input($_POST['buildling_structure']);
        $School_Level = $data->test_input($_POST['School_Level']);
        $Area = $data->test_input($_POST['area']);
        $Transport = $data->test_input($_POST['Transport']);
            
        $username = $data->test_input($_POST['username']);
        $pass = $data->test_input($_POST['pass']);
        $cpass = $data->test_input($_POST['cpass']);
        $rperson = $data->test_input($_POST['rperson']);
        $contact = $data->test_input($_POST['contact']);
        $email = $data->test_input($_POST['email']);

        if($pass == $cpass){
            $result = $data->insert_basic($district, $NA, $PK, $Tehsil, $UC, $VC, $Village, $Mohallah, $landmark, $Xcord, $Ycord, $Program, $CS_Name, $CS_Code, $CS_Type, $Status, $Building_Ownership, $Gender, $Building_Structure, $School_Level, $Area, $Transport, $username,$pass, $rperson, $contact, $email);
            // print_r($_SESSION);
        }else{
            echo '{"Password" : "Password Doesn\'t Match"}';
        }
    }
    if(isset($_POST['MODE']) && $_POST['MODE']=="report"){
        $date = $data->test_input($_POST['date']); 
        $SchoolCode = $data->test_input($_POST['SchoolCode']); 
        $Report = $data->test_input($_POST['ReportType']); 
        $datajson = json_encode($_POST);
        $data->insert_report($district, $date,$Report, $SchoolCode, $datajson);
    }

    if(isset($_POST['MODE']) && $_POST['MODE']=="VEC_MEETING"){
        $date = $data->test_input($_POST['datee']); 
        $SchoolCode = $data->test_input($_POST['SchoolCode']); 
        $Report = $data->test_input($_POST['ReportType']); 

        $AttendenceSheet = $data->upload_img($_FILES['attendenceSheet']);
        $GroupPhoto = $data->upload_img($_FILES['groupPhoto']);

        $new[] = array("Attendence_Sheet" => $AttendenceSheet, "Group_photo" => $GroupPhoto);
        $new[] = $_POST;

        $datajson = json_encode($new);

        if(!empty($AttendenceSheet) && !empty($GroupPhoto)){
            $data->insert_report($district, $date,$Report, $SchoolCode, $datajson);
        }

        // $img = array("Attendence_Sheet" => $AttendenceSheet, "Group_photo" => $GroupPhoto);
        // $new = json_encode($img);
        // $newjson = array_push($datajson, $new);

        // print_r($datajson);
        // echo $new;
        

    
      
    }
?>