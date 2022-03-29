<?php
include 'config.php';
class admin extends database
{
    public function signin($email, $password)
    {
        $sql = "SELECT * from esef_users where UserID=:email && Password=:password";
        $stmt = $this->conn->prepare($sql);
        
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $count =  $stmt->rowCount();
        if($count > 0){
            return $stmt->fetch();
        }else{
            return $count;
        }
    }
    public function fetch_user_SchoolCode($email)
    {
        $sql = "SELECT SchoolCode from esef_users where UserID=:email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user_fetched = $stmt->fetch();
        return $user_fetched['SchoolCode'];
    }
    public function password_update_check($SchoolCode)
    {
        $sql = "SELECT * from esef_users where SchoolCode=:SchoolCode AND updated='0'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['SchoolCode' => $SchoolCode]);
        $count =  $stmt->rowCount();
        return $count;
        
    }
    public function count($db, $DistrictCode)
    {
        $sql = "SELECT * FROM $db as db INNER JOIN esef_school_basic eb on db.SchoolCode = eb.SchoolCode Where eb.DistrictCode = '$DistrictCode'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $count =  $stmt->rowCount();
        return $count;
    }
     public function count_boys($Gender, $DistrictCode)
    {
        $sql = "SELECT * FROM esef_baseline as db INNER JOIN esef_school_basic eb on db.SchoolCode = eb.SchoolCode Where eb.DistrictCode = '$DistrictCode' AND db.Gender = '$Gender'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $count =  $stmt->rowCount();
        return $count;
    }
    
    public function countCovered($db,$DistrictCode)
    {
        $sql = "SELECT DISTINCT($db) FROM esef_school_basic where DistrictCode='$DistrictCode'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $count =  $stmt->rowCount();
        return $count;
        // echo $sql;
    }

    public function SchoolData($DistrictCode)
    {
        $sql = "SELECT * FROM esef_school_basic eb INNER JOIN esef_district ed ON ed.DistrictCode=eb.DistrictCode INNER JOIN esef_uc on eb.UC = esef_uc.UnionCouncilCode INNER JOIN esef_tehsil on eb.Tehsil = esef_tehsil.TehsilCode where eb.DistrictCode= '$DistrictCode'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $SchoolData = $stmt->fetchAll();
        return $SchoolData;
    }
    public function FetchSchools($DistrictCode)
    {
        $sql = "SELECT * From esef_school_basic WHERE DistrictCode= '$DistrictCode'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $SchoolData = $stmt->fetchAll();
        return $SchoolData;
    }
    public function enrollment($SchoolCode)
    {
        $sql = "SELECT * from esef_class_enrollment where SchoolCode= '$SchoolCode'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $SchoolData = $stmt->fetch();
        return $SchoolData;
    }
    public function Not_Updated($District)
    {
        $sql = "SELECT * from esef_users eu INNER JOIN esef_district ed on eu.District=ed.DistrictName where eu.SchoolCode NOT IN (SELECT SchoolCode from esef_school_basic) AND eu.SchoolCode NOT IN (SELECT SchoolCode from esef_school_teachers) AND eu.SchoolCode NOT IN (SELECT SchoolCode from esef_class_enrollment) AND ed.DistrictCode=  '$District'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $SchoolData = $stmt->fetchAll();
        return $SchoolData;
    }
    public function Teacher($DistrictCode)
    {
        $sql = "SELECT * FROM esef_school_basic eb INNER JOIN esef_district ed ON ed.DistrictCode=eb.DistrictCode INNER JOIN esef_uc on eb.UC = esef_uc.UnionCouncilCode INNER JOIN esef_tehsil on eb.Tehsil = esef_tehsil.TehsilCode INNER JOIN esef_school_teachers et on eb.SchoolCode = et.SchoolCode where eb.DistrictCode= '$DistrictCode'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $SchoolData = $stmt->fetchAll();
        return $SchoolData;
    }
    public function fetchComplaints($district){
        $sql="SELECT * FROM `esef_contactus` ec INNER JOIN esef_school_basic eb on eb.SchoolCode = ec.SchoolCode WHERE eb.DistrictCode = '$district' and ec.role = '0'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $SchoolData = $stmt->fetchAll();
        return $SchoolData;
    }
    public function deleteComplaint($id){
        $sql="DELETE FROM esef_contactus where AutoID=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam('id', $id);
         $stmt->execute();
         return true;
    }
    public function viewComplaint($id){
        $sql="SELECT * FROM esef_contactus where AutoID=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function fetchteacherAttendence($district){
        $sql="SELECT *  FROM `esef_school_basic` Where DistrictCode = '$district'";
        $stmt = $this->conn->prepare($sql);
        
         if($stmt->execute()){
            return  $stmt->fetchAll();
         }else{
             
             return true;
         }
    }
    public function fetchstudentAttendence($date){
        $sql="SELECT DISTINCT(esef_school_student_attendence.School_Id),`esef_school_basic`.*  FROM `esef_school_basic` inner join esef_school_student_attendence on esef_school_basic.SchoolCode=esef_school_student_attendence.School_Id  WHERE esef_school_student_attendence.date!=:date";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam('date', $date);
         if($stmt->execute()){
    return  $stmt->fetchAll();
         }else{
             
             return true;
         }
    }
    public function fetchDistrict($id){
        $sql="SELECT DistrictName from esef_district where DistrictCode='$id'";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
          return  $stmt->fetch();
        }else{
            
            return true;
        }   
    }

    public function loggedInUser($AutoID){
        $sql="SELECT * from esef_users where AutoID=:code";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":code", $AutoID);
        if($stmt->execute()){
          return  $stmt->fetch();
        }else{
            return true;
        }   
    }

    public function check_pass($AutoID, $password)
    {
        $sql = "SELECT * from esef_users WHERE Password =:password && AutoID=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['password' => $password,'id' => $AutoID]);
        $count =  $stmt->rowCount();
        return $count;
    }
    public function update_pass($AutoID, $password)
    {
        $sql = "UPDATE esef_users SET Password =:password, updated='1' WHERE AutoID=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['password' => $password,'id' => $AutoID]);
        if ($stmt->execute()) {
            return "1";
        } else {
            echo "0";
        }
    }

    public function upload_img($file)
    {
        $allow = array('jpg', 'jpeg', 'png');
        $exntension = explode('.', $file['name']);
        $fileActExt = strtolower(end($exntension));
        $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
        $filePath = '../../uploads/' . $fileNew;

        if (in_array($fileActExt, $allow)) {
            if ($file['size'] > 0 && $file['error'] == 0) {
                if (move_uploaded_file($file['tmp_name'], $filePath)) {
                    return $fileNew;
                } else {
                    return false;
                }
                // return $fileNew;
            }
        }
    }

    function update_userProfile($name, $contact, $whatsapp, $image, $AutoID,$designation){
        $sql = "UPDATE esef_users SET TeacherName =:name, Contact=:contact, WhatsApp =:whatsapp, Image=:image, designation=:designation WHERE AutoID=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['name'=>$name,'contact'=>$contact,'whatsapp'=>$whatsapp,'designation'=>$designation,'image'=>$image,'id' => $AutoID]);
        if ($stmt->execute()) {
            return "1";
        } else {
            return "0";
        }
    }
    
    public function Fetch_Teacher($SchoolCode)
    {
        $sql = "SELECT * from esef_school_teachers where SchoolCode = :SchoolCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->execute();
        return $stmt->rowCount();
        
    }
    public function Fetch_Teacher_Attendence_Present($db,$SchoolCode, $date)
    {
        $sql = "SELECT * from $db where School_Code = :SchoolCode AND status = '0' AND date =:date";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function Fetch_Teacher_Attendence_Absent($db, $SchoolCode,$date)
    {
        $sql = "SELECT * from $db where School_Code = :SchoolCode AND (status = '1' OR status = '2') AND date =:date";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function status_check($db, $SchoolCode,$date)
    {
        $sql = "SELECT * from $db where School_Code = :SchoolCode AND date =:date";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        $count =  $stmt->rowCount();
        if($count > 0){
            return "Marked";
        }else{
            return "UnMarked";
        }
    }
    public function status_check_students($db, $SchoolCode,$date)
    {
        $sql = "SELECT * from $db where School_Id = :SchoolCode AND date =:date";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        $count =  $stmt->rowCount();
        if($count > 0){
            return "Marked";
        }else{
            return "UnMarked";
        }
    }
    public function Fetch_Students($SchoolCode)
    {
        $sql = "SELECT SchoolCode from esef_baseline where SchoolCode = :SchoolCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->execute();
        return $stmt->rowCount();
        
    }
    public function Fetch_Students_Attendence_Present($db,$SchoolCode, $date)
    {
        $sql = "SELECT School_Id from $db where School_Id = :SchoolCode AND status = '0' AND date =:date";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function Fetch_Students_Attendence_Absent($db, $SchoolCode,$date)
    {
        $sql = "SELECT * from $db where School_Id = :SchoolCode AND (status = '1' OR status = '2') AND date =:date";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function Fetch_SchoolName($SchoolCode){
        $sql="SELECT CS_Name from esef_school_basic where SchoolCode=:SchoolCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function role_update_check($UserID)
    {
        $sql = "SELECT * from esef_users where AutoID=:UserID";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['UserID' => $UserID]);
        $count =  $stmt->fetch();
        return $count;
        
    }
    public function fetchuserimage($AutoID){
        $sql="SELECT Image from esef_users where AutoID=:AutoID";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':AutoID', $AutoID);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function marked_Attendence($district){
        $today = date("Y-m-d");
        $sql = "SELECT DISTINCT(School_Id) FROM `esef_school_student_attendence` esa INNER JOIN esef_school_basic eb on esa.School_Id = eb.SchoolCode WHERE esa.date = '$today' AND eb.DistrictCode = '$district'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $count =  $stmt->rowCount();
        return $count;   
    }
    public function teachers_marked_Attendence($district){
        $today = date("Y-m-d");
        $sql = "SELECT COUNT(eb.SchoolCode) as cnt FROM `esef_school_basic` eb INNER JOIN esef_school_teachers ea on eb.SchoolCode = ea.SchoolCode where eb.SchoolCode NOT IN (SELECT School_Code from esef_school_teacher_attendence eta WHERE eta.date = '$today' AND eta.status = '0') AND eb.DistrictCode = '$district'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $count =  $stmt->fetch();
        return $count;   
    }
    public function present_students($district){
        $today = date("Y-m-d");
        $sql = "SELECT count(1) as cnt FROM `esef_school_student_attendence` esa INNER JOIN esef_school_basic eb ON esa.School_Id = eb.SchoolCode where date = '$today' AND esa.status = '0' AND eb.DistrictCode = '$district'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $count =  $stmt->fetch();
        return $count;   
    }
    public function unmarked_students($district){
        $today = date("Y-m-d");
        $sql = "SELECT * FROM `esef_school_student_attendence` esa INNER JOIN esef_school_basic eb ON esa.School_Id = eb.SchoolCode where  eb.DistrictCode = '$district' AND esa.Student_Id != (SELECT Student_Id from esef_school_student_attendence where date='$today')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $count =  $stmt->rowCount();
        return $count;   
    }
    public function getTehsil($DistrictCode){
        $sql="SELECT * From esef_tehsil where DistrictCode=:DistrictCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam("DistrictCode", $DistrictCode);
        $stmt->execute();
        $count =  $stmt->fetchAll();
        return $count; 
    }
    public function getSchoolByTehsilCode($DistrictCode){
        $sql="SELECT * from esef_school_basic where tehsil=:tehsil";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam("tehsil", $DistrictCode);
        $stmt->execute();
        $count =  $stmt->fetchAll();
        return $count; 
    }
    public function fetchTeacherAttendenceBySchoolCode($schoolCode,$date){
        $sql="SELECT a.*,a.Attendence_Id, b.SchoolCode ,b.Teacher_Name,b.CNIC from esef_school_teacher_attendence a inner join esef_school_teachers b on a.Teacher_Id=b.AutoID where a.School_Code=:SchoolCode AND date=:date";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam("SchoolCode", $schoolCode);
        $stmt->bindParam("date", $date);
        $stmt->execute();
        $count =  $stmt->fetchAll();
        return $count;

    }
    public function checkTeacherInverify($SchoolCode,$date){
        $sql="SELECT AutoID from esef_school_teacher_verify where SchoolCode=:SchoolCode AND date=:date ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam("SchoolCode", $SchoolCode);
        $stmt->bindParam("date", $date);
        $stmt->execute();
        $count =  $stmt->rowCount();
        return $count;
    }
    public function VerifyAttendece($AttendenceID,$teacher_ID,$status,$SchoolCode,$date)
    {
     $sql="INSERT INTO esef_school_teacher_verify (AttendenceID	,teacher_ID,status	,SchoolCode	,date) VALUES( :AttendenceID,:teacher_ID,:status,:SchoolCode,:date)";
     $stmt = $this->conn->prepare($sql);
     $stmt->bindParam("SchoolCode", $SchoolCode);
     $stmt->bindParam("AttendenceID", $AttendenceID);
     $stmt->bindParam("teacher_ID", $teacher_ID);
     $stmt->bindParam("status", $status);
     $stmt->bindParam("date", $date);
     
    
     return $stmt->execute();
    }
    public function fetchPresentCount($SchoolCode,$date){
        $sql="SELECT status from esef_school_student_attendence where School_Id=:SchoolCode AND date=:date AND status='0'";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam("SchoolCode", $SchoolCode);
        $stmt->bindParam("date", $date);
        $stmt->execute();
        $count =  $stmt->rowCount();
        return $count;
    }
    public function fetchAbsentCount($SchoolCode,$date){
        $sql="SELECT status from esef_school_student_attendence where School_Id=:SchoolCode AND date=:date AND (status='1' or status='2'";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam("SchoolCode", $SchoolCode);
        $stmt->bindParam("date", $date);
        $stmt->execute();
        $count =  $stmt->rowCount();
        return $count;
    }
    public function fetchSchool($district,$date){
        $sql="SELECT distinct (SchoolCode),CS_Name,AutoID from  esef_school_basic a inner join esef_school_student_attendence b on a.SchoolCode=b.School_Id where a.SchoolCode NOT IN (SELECT SchoolCode from esef_student_verify where date=:date) AND DistrictCode=:district AND b.date=:date limit 10";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam("district", $district);
        $stmt->bindParam("date", $date);
        $stmt->execute();
        $count =  $stmt->fetchAll();
        return $count;
    }
    public function insertStudentVerified($SchoolCode	,$vPresent	,$vAbsent	,$present	,$absent	,$comment	,$date	){
           $sql="INSERT INTO esef_student_verify (SchoolCode	,vPresent	,vAbsent	,present	,absent	,comment	,date) VALUES(:SchoolCode	,:vPresent	,:vAbsent	,:present	,:absent	,:comment	,:date)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam("SchoolCode", $SchoolCode);
        $stmt->bindParam("vPresent", $vPresent);
        $stmt->bindParam("vAbsent", $vAbsent);
        $stmt->bindParam("present", $present);
        $stmt->bindParam("absent", $absent);
        $stmt->bindParam("comment", $comment);
        $stmt->bindParam("date", $date);
        $stmt->execute();
        return true;
    }

   public function FetchTehsilThroughDistrict($District){
       $sql="SELECT * From esef_tehsil where DistrictCode='$District'";
       $stmt = $this->conn->prepare($sql);
       $stmt->execute();
       return $stmt->fetchAll();


   }
   public function FetchUcThroughTehsil($Tehsil){
       $sql="SELECT * From esef_uc where TehsilCode='$Tehsil'";
       $stmt = $this->conn->prepare($sql);
 
       $stmt->execute();
       return $stmt->fetchAll();


   }
   public function FetchSchoolThroughUC($Tehsil){
       $sql="SELECT * From esef_school_basic where UC='$Tehsil'";
       $stmt = $this->conn->prepare($sql);
 
       $stmt->execute();
       return $stmt->fetchAll();


   }
   public function FetchSchoolThroughTehsil($Tehsil){
       $sql="SELECT * From esef_school_basic where Tehsil='$Tehsil'";
       $stmt = $this->conn->prepare($sql);
 
       $stmt->execute();
       return $stmt->fetchAll();


   }
   public function FetchVECMember($SchoolCode){
       $sql="SELECT * From esef_vec_member where SchoolCode='$SchoolCode' ";
       $stmt = $this->conn->prepare($sql);
 
       $stmt->execute();
       return $stmt->fetchAll();


   }
   public function FetchCountVECMember($SchoolCode){
       $sql="SELECT * From esef_vec_member where SchoolCode='$SchoolCode' ";
       $stmt = $this->conn->prepare($sql);
 
       $stmt->execute();
       return $stmt->rowCount();


   }
   public function FetchSchoolThroughSchoolCode($SchoolCode){
       $sql="SELECT * From esef_school_basic where SchoolCode='$SchoolCode'";
       $stmt = $this->conn->prepare($sql);
 
       $stmt->execute();
       return $stmt->fetch();


   }
   public function FetchVECMeeting($SchoolCode,$fromDate,$toDate){
       $sql="SELECT * From esef_vec_meetings where SchoolCode='$SchoolCode' AND (created_on='$toDate' or created_on='$fromDate' or created_on >'$fromDate') ";
       $stmt = $this->conn->prepare($sql);
       $stmt->execute();
       return $stmt->fetchAll();


   }
   public function CountFetchVECMeeting($SchoolCode,$fromDate,$toDate){
       $sql="SELECT * From esef_vec_meetings where SchoolCode='$SchoolCode' AND (created_on='$toDate' or created_on='$fromDate' or created_on >'$fromDate') ";
       $stmt = $this->conn->prepare($sql);
       $stmt->execute();
       return $stmt->rowCount();


   }

   public function insert_basic($DistrictCode, $NA, $PK, $Tehsil, $UC, $VC, $Village, $Mohallah, $Landmark, $XCord, $YCord, $Program, $CS_Name, $CS_Code, $CS_Type, $Status, $Building_Ownership, $Gender, $Building_Structure, $School_level, $Area, $Transport, $username,$pass, $rperson, $contact, $email)
    {
        $sql = "INSERT INTO esef_dposchool (DistrictCode, NA, PK, Tehsil, UC, VC, Village, Mohallah, Landmark, X_Cord, Y_Cord, Program, CS_Name, CS_Code, CS_Type, Status, Building_Ownership, Gender, Building_Structure, School_level, Area, Transport, username, pass, rperson, contact, email) VALUES 
        (:DistrictCode, :NA, :PK, :Tehsil, :UC, :VC, :Village, :Mohallah, :Landmark, :XCord, :YCord, :Program, :CS_Name, :CS_Code, :CS_Type, :Status, :Building_Ownership, :Gender, :Building_Structure, :School_level, :Area, :Transport, :username, :pass, :rperson, :contact, :email)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':DistrictCode', $DistrictCode);
        $stmt->bindParam(':NA', $NA);
        $stmt->bindParam(':PK', $PK);
        $stmt->bindParam(':Tehsil', $Tehsil);
        $stmt->bindParam(':UC', $UC);
        $stmt->bindParam(':VC', $VC);
        $stmt->bindParam(':Village', $Village);
        $stmt->bindParam(':Mohallah', $Mohallah);
        $stmt->bindParam(':Landmark', $Landmark);
        $stmt->bindParam(':XCord', $XCord);
        $stmt->bindParam(':YCord', $YCord);
        $stmt->bindParam(':Program', $Program);
        $stmt->bindParam(':CS_Name', $CS_Name);
        $stmt->bindParam(':CS_Code', $CS_Code);
        $stmt->bindParam(':CS_Type', $CS_Type);
        $stmt->bindParam(':Status', $Status);
        $stmt->bindParam(':Building_Ownership', $Building_Ownership);
        $stmt->bindParam(':Gender', $Gender);
        $stmt->bindParam(':Building_Structure', $Building_Structure);
        $stmt->bindParam(':School_level', $School_level);
        $stmt->bindParam(':Area', $Area);
        $stmt->bindParam(':Transport', $Transport);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':pass', $pass);
        $stmt->bindParam(':rperson', $rperson);
        $stmt->bindParam(':contact', $contact);
        $stmt->bindParam(':email', $email);
        if ($stmt->execute()) {
            echo "1";
        } else {
            echo "0";
        }
    }

    public function InProgressSchools($District)
    {
        $sql = "SELECT * from esef_dposchool where DistrictCode = '$District'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();

    }
    public function insert_report($district, $date, $Report, $SchoolCode, $datajson)
    {
        $sql = "INSERT into esef_dpo_report (DPOID, datee,Report, SchoolCode, data) VALUES (:district, :date, :Report, :SchoolCode,:datajson)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':district', $district);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':Report', $Report);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->bindParam(':datajson', $datajson);
        if ($stmt->execute()) {
            echo "1";
        } else {
            echo "0";
        }

    }
   public function FetchCountVECMeeting($SchoolCode,$fromDate,$toDate){
       $sql="SELECT * From esef_vec_meetings where SchoolCode='$SchoolCode' AND( created_on='$toDate' or created_on='$fromDate' or created_on >'$fromDate') ";
       $stmt = $this->conn->prepare($sql);
 
       $stmt->execute();
       return $stmt->rowCount();


   }
   public function InsertTeacherinformation($TeacherName ,  $FatherName	,$HusbandName	,$MartialStatus,$Gender	,$CNIC	,$DOB	,$Qualification	,$Contact	,$Tehsil	,$UC	,$Village	,$Desgination	,$JobStatus	,$ContractDate	,$ContractExpire	,$CurrentStatus	,$SchoolName	,$PostalAddress){
   $sql="INSERT INTO esef_teacher_information (TeacherName ,  FatherName	,HusbandName	,MartialStatus,	Gender	,CNIC	,DOB	,Qualification	,Contact	,Tehsil	,UC	,Village	,Desgination	,JobStatus	,ContractDate	,ContractExpire	,CurrentStatus	,SchoolName	,PostalAddress) VAlUES('$TeacherName' ,  '$FatherName'	,'$HusbandName'	,'$MartialStatus',	'$Gender'	,'$CNIC'	,'$DOB'	,'$Qualification'	,'$Contact'	,'$Tehsil'	,'$UC'	,'$Village'	,'$Desgination'	,'$JobStatus'	,'$ContractDate'	,'$ContractExpire'	,'$CurrentStatus'	,'$SchoolName'	,'$PostalAddress'  )";
   $stmt = $this->conn->prepare($sql);
 
   return $stmt->execute();
    

   }
   public function load_NA($District){
       $sql="SELECT * from esef_na_lookup where DistrictCode='$District'";
       $stmt = $this->conn->prepare($sql);
 
       $stmt->execute();
       return $stmt->fetchAll();
   }
   public function load_PK($District){
       $sql="SELECT * from esef_pk_lookup where DistrictCode='$District'";
       $stmt = $this->conn->prepare($sql);
 
       $stmt->execute();
       return $stmt->fetchAll();
   }
   
   public function FetchStudentList($SchoolCode,$Class){
       $sql="SELECT * from esef_students where SchoolCode='$SchoolCode' AND Current_Class='$Class'";
       $stmt = $this->conn->prepare($sql);
       $stmt->execute();
       return $stmt->fetchAll();
   }
   public function CountStudentList($SchoolCode,$Class){
       $sql="SELECT * from esef_students where SchoolCode='$SchoolCode' AND Current_Class='$Class'";
       $stmt = $this->conn->prepare($sql);
       $stmt->execute();
       return $stmt->rowCount();
   }
   public function classlookup(){
       $sql="SELECT * from esef_lookup_school_class ";
       $stmt = $this->conn->prepare($sql);
       $stmt->execute();
       return $stmt->fetchAll();
   }

}
