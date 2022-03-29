<?php
include 'config.php';
class admin extends database
{
    public function count($db)
    {
        $sql = "SELECT * FROM $db as db INNER JOIN esef_school_basic eb on db.SchoolCode = eb.SchoolCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $count =  $stmt->rowCount();
        return $count;
    }
    public function count_baseline()
    {
        $sql = "SELECT * FROM esef_baseline";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $count =  $stmt->rowCount();
        return $count;
    }
    public function count_baseline_gender($param)
    {
        $sql = "SELECT * FROM esef_baseline WHERE Gender='$param'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $count =  $stmt->rowCount();
        return $count;
    }
    public function selectAll_Students(){
        $sql = "Select eb.SchoolCode, ed.DistrictName,esb.CS_Name,eb.ChildName,eb.DOB,es.ClassName,eb.Gender,eb.FatherName,eb.Contact FROM esef_baseline eb INNER JOIN esef_school_basic esb ON eb.SchoolCode = esb.SchoolCode INNER JOIN esef_lookup_school_class es ON eb.CClass = es.ClassID INNER JOIN esef_district ed on esb.DistrictCode = ed.DistrictCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return JSON_encode($row);
        
    }
    public function countCovered($db)
    {
        $sql = "SELECT DISTINCT($db) FROM esef_school_basic ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $count =  $stmt->rowCount();
        return $count;
        // echo $sql;
    }
    public function viewComplaint($id){
        $sql="SELECT * FROM esef_contactus where AutoID=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function SchoolData()
    {
        $sql = "SELECT * FROM esef_school_basic eb INNER JOIN esef_district ed ON ed.DistrictCode=eb.DistrictCode INNER JOIN esef_uc on eb.UC = esef_uc.UnionCouncilCode INNER JOIN esef_tehsil on eb.Tehsil = esef_tehsil.TehsilCode";
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
    public function Not_Updated()
    {
        $sql = "SELECT * from esef_users eu INNER JOIN esef_district ed on eu.District=ed.DistrictName where eu.SchoolCode NOT IN (SELECT SchoolCode from esef_school_basic) AND eu.SchoolCode NOT IN (SELECT SchoolCode from esef_school_teachers) AND eu.SchoolCode NOT IN (SELECT SchoolCode from esef_class_enrollment) AND eu.role = 0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $SchoolData = $stmt->fetchAll();
        return $SchoolData;
    }
    public function Teacher()
    {
        $sql = "SELECT * FROM esef_school_basic eb INNER JOIN esef_district ed ON ed.DistrictCode=eb.DistrictCode INNER JOIN esef_uc on eb.UC = esef_uc.UnionCouncilCode INNER JOIN esef_tehsil on eb.Tehsil = esef_tehsil.TehsilCode INNER JOIN esef_school_teachers et on eb.SchoolCode = et.SchoolCode ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $SchoolData = $stmt->fetchAll();
        return $SchoolData;
    }
    public function fetchComplaints(){
        $sql="SELECT * FROM esef_contactus where role='1'";
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
    public function fetchteacherAttendence($date){
        $sql="SELECT *  FROM `esef_school_basic`";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam('date', $date);
        
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
    public function Fetch_Students($SchoolCode)
    {
        $sql = "SELECT * from esef_baseline where SchoolCode = :SchoolCode";
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
    public function Fetch_Students_Attendence_Present($db,$SchoolCode, $date)
    {
        $sql = "SELECT * from $db where School_Id = :SchoolCode AND status = '0' AND date =:date";
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
    public function Fetch_SchoolName($SchoolCode){
        $sql="SELECT CS_Name from esef_school_basic where SchoolCode=:SchoolCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function fetchuserimage($AutoID){
        $sql="SELECT Image from esef_users where AutoID=:AutoID";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':AutoID', $AutoID);
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
    public function marked_Attendence(){
        $today = date("Y-m-d");
        $sql = "SELECT DISTINCT(School_Id)  FROM `esef_school_student_attendence` WHERE `date` = '$today'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $count =  $stmt->rowCount();
        return $count;   
    }
    public function teachers_marked_Attendence(){
        $today = date("Y-m-d");
        $sql = "SELECT COUNT(eb.SchoolCode) as cnt FROM `esef_school_basic` eb INNER JOIN esef_school_teachers ea on eb.SchoolCode = ea.SchoolCode where eb.SchoolCode NOT IN (SELECT School_Code from esef_school_teacher_attendence eta WHERE eta.date = '$today' AND eta.status = '0')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $count =  $stmt->fetch();
        return $count;   
    }
    public function present_students(){
        $today = date("Y-m-d");
        $sql = "SELECT count(1) as cnt FROM `esef_school_student_attendence` esa where date = '$today' AND status = '0'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $count =  $stmt->fetch();
        return $count;   
    }
  
}
