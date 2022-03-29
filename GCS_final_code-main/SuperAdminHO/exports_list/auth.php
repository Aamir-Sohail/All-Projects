
<?php
include '../includes/config.php';
class exports extends database

{
    public function ExportToExcel()
        {
            $sql = "SELECT *, eb.Status SchoolStatus FROM esef_school_basic eb LEFT     JOIN esef_district ed ON eb.DistrictCode=ed.DistrictCode LEFT JOIN     esef_tehsil ett ON ett.TehsilCode = eb.Tehsil LEFT JOIN     esef_na_lookup enl ON enl.AutoID=eb.NA LEFT JOIN esef_pk_lookup epl     ON epl.AutoID=eb.PK LEFT JOIN esef_uc eu ON eu.UnionCouncilCode=eb    .UC LEFT JOIN esef_class_enrollment ece on ece.SchoolCode = eb.SchoolCode LEFT JOIN esef_school_facilities ef on ef.SchoolCode = eb.SchoolCode";
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
    public function Teacher()
    {
        $sql = "SELECT * FROM esef_school_basic eb INNER JOIN esef_district ed ON ed.DistrictCode=eb.DistrictCode INNER JOIN esef_uc on eb.UC = esef_uc.UnionCouncilCode INNER JOIN esef_tehsil on eb.Tehsil = esef_tehsil.TehsilCode INNER JOIN esef_school_teachers et on eb.SchoolCode = et.SchoolCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $SchoolData = $stmt->fetchAll();
        return $SchoolData;
    }
    public function Not_Updated()
    {
        $sql = "SELECT * from esef_users eu INNER JOIN esef_district ed on eu.District=ed.DistrictName where eu.SchoolCode NOT IN (SELECT SchoolCode from esef_school_basic) AND eu.SchoolCode NOT IN (SELECT SchoolCode from esef_school_teachers) AND eu.SchoolCode NOT IN (SELECT SchoolCode from esef_class_enrollment) AND eu.role = 0 ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $SchoolData = $stmt->fetchAll();
        return $SchoolData;
    }
     public function fetchteacherAttendence(){
        $sql="SELECT SchoolCode,ed.DistrictName,CS_Name  FROM `esef_school_basic` eb INNER JOIN esef_district ed on eb.DistrictCode = ed.DistrictCode";
        $stmt = $this->conn->prepare($sql);
         if($stmt->execute()){
            return  $stmt->fetchAll();
         }else{
             
             return $sql;
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
    public function Fetch_Teacher($SchoolCode)
    {
        $sql = "SELECT * from esef_school_teachers where SchoolCode = :SchoolCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
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
    public function Students(){
        $sql="SELECT eb.SchoolCode,ed.DistrictName,eb.CS_Name FROM esef_school_basic eb INNER JOIN esef_district ed ON ed.DistrictCode=eb.DistrictCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function Fetch_Students_Attendence_Present($SchoolCode, $date)
    {
        $sql = "SELECT count(1) as cnt from esef_school_student_attendence where School_Id = '$SchoolCode' AND status = '0' AND date ='$date'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function Fetch_Students($SchoolCode)
    {
        $sql = "SELECT count(1) as cnt from esef_baseline where SchoolCode = :SchoolCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->execute();
        return $stmt->fetch();
        
    }
}
