
<?php

$Distict = $_SESSION['District'];

include '../includes/config.php';
class exports extends database

{
    protected $Distict;
    public function ExportToExcel()
        {
            $Distict = $_SESSION['District'];
            $sql = "SELECT *, eb.Status SchoolStatus FROM esef_school_basic eb LEFT     JOIN esef_district ed ON eb.DistrictCode=ed.DistrictCode LEFT JOIN     esef_tehsil ett ON ett.TehsilCode = eb.Tehsil LEFT JOIN     esef_na_lookup enl ON enl.AutoID=eb.NA LEFT JOIN esef_pk_lookup epl     ON epl.AutoID=eb.PK LEFT JOIN esef_uc eu ON eu.UnionCouncilCode=eb    .UC LEFT JOIN esef_class_enrollment ece on ece.SchoolCode = eb.SchoolCode LEFT JOIN esef_school_facilities ef on ef.SchoolCode = eb.SchoolCode WHERE eb.DistrictCode = '$Distict'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $SchoolData = $stmt->fetchAll();
            return $SchoolData;
        }
     public function enrollment($SchoolCode)
    {
        $Distict = $_SESSION['District'];
        $sql = "SELECT * from esef_class_enrollment et INNER JOIN esef_school_basic eb on eb.SchoolCode = et.SchoolCode  where SchoolCode= '$SchoolCode' AND DistrictCode = '$Distict' ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $SchoolData = $stmt->fetch();
        return $SchoolData;
    }
    public function Teacher()
    {
        $Distict = $_SESSION['District'];
        $sql = "SELECT * FROM esef_school_basic eb INNER JOIN esef_district ed ON ed.DistrictCode=eb.DistrictCode INNER JOIN esef_uc on eb.UC = esef_uc.UnionCouncilCode INNER JOIN esef_tehsil on eb.Tehsil = esef_tehsil.TehsilCode INNER JOIN esef_school_teachers et on eb.SchoolCode = et.SchoolCode WHERE eb.DistrictCode = '$Distict'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $SchoolData = $stmt->fetchAll();
        return $SchoolData;
    }
    public function Not_Updated()
    {
        $Distict = $_SESSION['District'];
        $sql = "SELECT * from esef_users eu INNER JOIN esef_district ed on eu.District=ed.DistrictName where eu.SchoolCode NOT IN (SELECT SchoolCode from esef_school_basic) AND eu.SchoolCode NOT IN (SELECT SchoolCode from esef_school_teachers) AND eu.SchoolCode NOT IN (SELECT SchoolCode from esef_class_enrollment) AND ed.DistrictCode=  '$District'" ;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $SchoolData = $stmt->fetchAll();
        return $SchoolData;
    }

    
}
