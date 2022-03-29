<?php
include 'config.php';

class auth extends database
{
    public function loggedInUser($SchoolCode){
        $sql = "SELECT CS_Name,DistrictName from esef_school_basic INNER JOIN esef_district on esef_school_basic.DistrictCode= esef_district.DistrictCode where SchoolCode='$SchoolCode'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $district_fetched = $stmt->fetch();
        return $district_fetched;
    }

    public function filter_data($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    public function fetch_districts()
    {
        $sql = "SELECT DistrictCode,DistrictName FROM esef_district ORDER BY DistrictName";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $district_fetched = $stmt->fetchAll();
        return $district_fetched;
    }
    public function load_Tehsil($district)
    {
        $district = $this->filter_data($district);
        $sql = "SELECT TehsilCode,TehsilName FROM esef_tehsil WHERE DistrictCode = :districtCode ORDER BY TehsilName";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':districtCode', $district);
        $stmt->execute();
        $tehsil_fetched = $stmt->fetchAll();
        return $tehsil_fetched;
    }
    public function load_UC($tehsil)
    {
        $tehsil = $this->filter_data($tehsil);
        $sql = "SELECT UnionCouncilCode,UnionCouncilName FROM esef_uc WHERE TehsilCode = :tehsil ORDER BY UnionCouncilName";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':tehsil', $tehsil);
        $stmt->execute();
        $UC_fetched = $stmt->fetchAll();
        return $UC_fetched;
    }
    public function load_NA($district)
    {
        $district = $this->filter_data($district);
        $sql = "SELECT AutoID,NA FROM esef_na_lookup WHERE DistrictCode = :district ORDER BY NA";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':district', $district);
        $stmt->execute();
        $NA_fetched = $stmt->fetchAll();
        return $NA_fetched;
    }
    public function load_PK($district)
    {
        $district = $this->filter_data($district);
        $sql = "SELECT AutoID,PK FROM esef_pk_lookup WHERE DistrictCode = :district ORDER BY PK";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':district', $district);
        $stmt->execute();
        $PK_fetched = $stmt->fetchAll();
        return $PK_fetched;
    }
    public function name_fetch($schoolCode)
    {
        $sql = "SELECT * FROM esef_school_basic WHERE SchoolCode = :schoolCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':schoolCode', $schoolCode);
        $stmt->execute();
        $name_fetched = $stmt->fetch();
        return $name_fetched;
    }
    public function insert_basic_check($schoolCode, $db)
    {
        $sql = "SELECT * from $db where SchoolCode=:SchoolCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['SchoolCode' => $schoolCode]);
        $count =  $stmt->rowCount();
        return $count;
    }
    public function count_data($db,$schoolCode)
    {
        $sql = "SELECT * from $db WHERE SchoolCode='$schoolCode'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $count =  $stmt->rowCount();
        return $count;
         
    }
    public function fetch_students($schoolCode)
    {
        $sql = "SELECT * FROM esef_baseline WHERE SchoolCode = :SchoolCode ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['SchoolCode' => $schoolCode]);
        $district_fetched = $stmt->fetchAll();
        return $district_fetched;
    }
    public function upload_img($file)
    {
        $allow = array('jpg', 'jpeg', 'png');
        $exntension = explode('.', $file['name']);
        $fileActExt = strtolower(end($exntension));
        $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
        $filePath = '../uploads/' . $fileNew;

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
    public function Fetch_basic($db, $schoolCode)
    {
        $sql = "SELECT * FROM $db WHERE SchoolCode=:SchoolCode ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $schoolCode);
        $stmt->execute();
        $fetched = $stmt->fetch();
        return $fetched;
    }
    public function Fetch_data($db, $schoolCode)
    {
        $sql = "SELECT * FROM $db WHERE SchoolCode=:SchoolCode ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $schoolCode);
        $stmt->execute();
        $fetched = $stmt->fetchAll();
        return $fetched;
    }
    public function Fetch_basic_district($db,$DistrictCode)
    {
        $sql = "SELECT * FROM $db WHERE DistrictCode=:DistrictCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':DistrictCode', $DistrictCode);
        $stmt->execute();
        $fetched = $stmt->fetch();
        return $fetched;
    }
    public function Fetch_basic_NA($db,$AutoID)
    {
        $sql = "SELECT * FROM $db WHERE AutoID=:AutoID";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':AutoID', $AutoID);
        $stmt->execute();
        $fetched = $stmt->fetch();
        return $fetched;
    }

    public function Fetch_basic_Tehsil($TehsilCode)
    {
        $sql = "SELECT * FROM esef_tehsil WHERE TehsilCode=:TehsilCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':TehsilCode', $TehsilCode);
        $stmt->execute();
        $fetched = $stmt->fetch();
        return $fetched;
    }
    public function Fetch_basic_UC($UC)
    {
        $sql = "SELECT * FROM esef_uc WHERE UnionCouncilCode=:UnionCouncilCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':UnionCouncilCode', $UC);
        $stmt->execute();
        $fetched = $stmt->fetch();
        return $fetched;
    }
    public function check_pass($SchoolCode, $password)
    {
        $sql = "SELECT * from esef_users WHERE Password =:password && SchoolCode=:SchoolCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['password' => $password,'SchoolCode' => $SchoolCode]);
        $count =  $stmt->rowCount();
        return $count;
    }
    public function update_pass($SchoolCode, $password)
    {
        $sql = "UPDATE esef_users SET Password =:password, updated='1' WHERE SchoolCode=:SchoolCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['password' => $password,'SchoolCode' => $SchoolCode]);
        if ($stmt->execute()) {
            return "1";
        } else {
            echo "0";
        }
    }
    public function insert_basic($schoolCode, $DistrictCode, $NA, $PK, $Tehsil, $UC, $VC, $Village, $Mohallah, $Landmark, $XCord, $YCord, $Program, $CS_Name, $CS_Code, $CS_Type, $Status, $Building_Ownership, $Gender, $Building_Structure, $School_level, $Area, $Transport)
    {
        $sql = "INSERT INTO esef_school_basic (SchoolCode, DistrictCode, NA, PK, Tehsil, UC, VC, Village, Mohallah, Landmark, X_Cord, Y_Cord, Program, CS_Name, CS_Code, CS_Type, Status, Building_Ownership, Gender, Building_Structure, School_level, Area, Transport) VALUES 
        (:SchoolCode, :DistrictCode, :NA, :PK, :Tehsil, :UC, :VC, :Village, :Mohallah, :Landmark, :XCord, :YCord, :Program, :CS_Name, :CS_Code, :CS_Type, :Status, :Building_Ownership, :Gender, :Building_Structure, :School_level, :Area, :Transport)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $schoolCode);
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
        if ($stmt->execute()) {
            return "1";
        } else {
            echo "0";
        }
    }
    public function checknearestinstitution($schoolCode){
        $sql="SELECT * FROM esef_school_nearest_Institutions WHERE SchoolCode=:SchoolCode";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':SchoolCode', $schoolCode);
        $stmt->execute();
        return $stmt->rowCount();


    }

    public function nearestInstitutions($schoolCode, $SchoolName, $SchoolLevel, $SchoolGender, $emisCode, $distance)
    {
        $sql = "INSERT INTO esef_school_nearest_institutions (SchoolCode,SchoolName,SchoolLevel,SchoolGender,emisCode,distance) VALUES ( :SchoolCode, :SchoolName,:SchoolLevel,:SchoolGender,:emisCode,:distance)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $schoolCode);
        $stmt->bindParam(':SchoolName', $SchoolName);
        $stmt->bindParam(':SchoolLevel', $SchoolLevel);
        $stmt->bindParam(':SchoolGender', $SchoolGender);
        $stmt->bindParam(':emisCode', $emisCode);
        $stmt->bindParam(':distance', $distance);

        if ($stmt->execute()) {
            echo "1";
        } else {
            echo  "0";
        }
    }
    public function insert_enrollment($SchoolCode, $Nursery_Boys, $Nursery_Girls, $KG_Boys, $KG_Girls, $One_Boys, $One_Girls, $Two_Boys, $Two_Girls, $Three_Boys, $Three_Girls, $Four_Boys, $Four_Girls, $Five_Boys, $Five_Girls, $Total_Boys, $Total_Girls, $Afghan_Boys, $Afghan_Girls, $Disable_Girls, $Disable_Boys)
    {
        $sql = 'INSERT INTO esef_class_enrollment (SchoolCode, Nursery_Boys, Nursery_Girls, KG_Boys, KG_Girls, One_Boys, One_Girls, Two_Boys, Two_Girls, Three_Boys, Three_Girls, Four_Boys, Four_Girls, Five_Boys, Five_Girls, Total_Boys, Total_Girls, Afghan_Boys, Afghan_Girls, Disable_Girls, Disable_Boys) 
        VALUES 
        (:SchoolCode, :Nursery_Boys, :Nursery_Girls, :KG_Boys, :KG_Girls, :One_Boys, :One_Girls, :Two_Boys, :Two_Girls, :Three_Boys, :Three_Girls, :Four_Boys, :Four_Girls, :Five_Boys, :Five_Girls, :Total_Boys, :Total_Girls, :Afghan_Boys, :Afghan_Girls, :Disable_Girls, :Disable_Boys)';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->bindParam(':Nursery_Boys', $Nursery_Boys);
        $stmt->bindParam(':Nursery_Girls', $Nursery_Girls);

        $stmt->bindParam(':KG_Boys', $KG_Boys);
        $stmt->bindParam(':KG_Girls', $KG_Girls);

        $stmt->bindParam(':One_Boys', $One_Boys);
        $stmt->bindParam(':One_Girls', $One_Girls);

        $stmt->bindParam(':Two_Boys', $Two_Boys);
        $stmt->bindParam(':Two_Girls', $Two_Girls);

        $stmt->bindParam(':Three_Boys', $Three_Boys);
        $stmt->bindParam(':Three_Girls', $Three_Girls);

        $stmt->bindParam(':Four_Boys', $Four_Boys);
        $stmt->bindParam(':Four_Girls', $Four_Girls);

        $stmt->bindParam(':Five_Boys', $Five_Boys);
        $stmt->bindParam(':Five_Girls', $Five_Girls);

        $stmt->bindParam(':Total_Boys', $Total_Boys);
        $stmt->bindParam(':Total_Girls', $Total_Girls);

        $stmt->bindParam(':Afghan_Boys', $Afghan_Boys);
        $stmt->bindParam(':Afghan_Girls', $Afghan_Girls);

        $stmt->bindParam(':Disable_Girls', $Disable_Girls);
        $stmt->bindParam(':Disable_Boys', $Disable_Boys);
        if ($stmt->execute()) {
            echo "1";
        } else {
            echo $sql;
        }
    }
    public function InsertTeacher($SchoolCode, $Teacher_Name, $Father_Name, $Gender, $DOB, $Degree, $Subject, $Qualification, $Experience, $CNIC, $Bank_Name, $Bank_Code, $Account, $Disability, $Marital_Status, $Contact, $Whatsapp)
    {
        $sql = "INSERT INTO esef_school_teachers (SchoolCode, Teacher_Name, Father_Name, Gender, DOB, Degree, Subject, Qualification,Experience,CNIC, Bank_Name, Bank_Code, Account, Disability, Marital_Status, Contact, Whatsapp) VALUES (:SchoolCode, :Teacher_Name, :Father_Name, :Gender, :DOB, :Degree, :Subject, :Qualification, :Experience, :CNIC, :Bank_Name, :Bank_Code, :Account, :Disability, :Marital_Status, :Contact, :Whatsapp) ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->bindParam(':Teacher_Name', $Teacher_Name);
        $stmt->bindParam(':Father_Name', $Father_Name);
        $stmt->bindParam(':Gender', $Gender);
        $stmt->bindParam(':DOB', $DOB);
        $stmt->bindParam(':Degree', $Degree);
        $stmt->bindParam(':Subject', $Subject);
        $stmt->bindParam(':Qualification', $Qualification);
        $stmt->bindParam(':Experience', $Experience);
        $stmt->bindParam(':CNIC', $CNIC);
        $stmt->bindParam(':Bank_Name', $Bank_Name);
        $stmt->bindParam(':Bank_Code', $Bank_Code);
        $stmt->bindParam(':Account', $Account);
        $stmt->bindParam(':Disability', $Disability);
        $stmt->bindParam(':Marital_Status', $Marital_Status);
        $stmt->bindParam(':Contact', $Contact);
        $stmt->bindParam(':Whatsapp', $Whatsapp);

        if ($stmt->execute()) {
            echo "1";
        } else {
            echo $sql;
        }
    }
    public function InsertFacilities($SchoolCode, $Rooms, $Status, $Ownership, $RoomUse, $BoundryWall, $ExtraSpace, $Ventilation, $Electricity, $Solar, $Lights, $Toilet, $Fans, $Water, $Veranda, $Playground, $TeacherChair, $TeacherTable, $Cupboard, $BlackBoard, $StudentChairs, $WaterCooler, $Mats, $SchoolBell, $TLM)
    {
        $sql = "INSERT INTO esef_school_facilities (SchoolCode, Rooms, Status, Ownership, RoomUse, BoundryWall, ExtraSpace, Ventilation, Electricity, Solar, Lights, Toilet, Fans, Water, Veranda, Playground, TeacherChair, TeacherTable, Cupboard, BlackBoard, StudentChairs, WaterCooler, Mats, SchoolBell, TLM) 
        VALUES 
        (:SchoolCode, :Rooms, :Status, :Ownership, :RoomUse, :BoundryWall, :ExtraSpace, :Ventilation, :Electricity, :Solar, :Lights, :Toilet, :Fans, :Water, :Veranda, :Playground, :TeacherChair, :TeacherTable, :Cupboard, :BlackBoard, :StudentChairs, :WaterCooler, :Mats, :SchoolBell, :TLM)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->bindParam(':Rooms', $Rooms);
        $stmt->bindParam(':Status', $Status);
        $stmt->bindParam(':Ownership', $Ownership);
        $stmt->bindParam(':RoomUse', $RoomUse);
        $stmt->bindParam(':BoundryWall', $BoundryWall);
        $stmt->bindParam(':ExtraSpace', $ExtraSpace);
        $stmt->bindParam(':Ventilation', $Ventilation);
        $stmt->bindParam(':Electricity', $Electricity);
        $stmt->bindParam(':Solar', $Solar);
        $stmt->bindParam(':Lights', $Lights);
        $stmt->bindParam(':Toilet', $Toilet);
        $stmt->bindParam(':Fans', $Fans);
        $stmt->bindParam(':Water', $Water);
        $stmt->bindParam(':Veranda', $Veranda);
        $stmt->bindParam(':Playground', $Playground);
        $stmt->bindParam(':TeacherChair', $TeacherChair);
        $stmt->bindParam(':TeacherTable', $TeacherTable);
        $stmt->bindParam(':Cupboard', $Cupboard);
        $stmt->bindParam(':BlackBoard', $BlackBoard);
        $stmt->bindParam(':StudentChairs', $StudentChairs);
        $stmt->bindParam(':WaterCooler', $WaterCooler);
        $stmt->bindParam(':Mats', $Mats);
        $stmt->bindParam(':SchoolBell', $SchoolBell);
        $stmt->bindParam(':TLM', $TLM);
        if ($stmt->execute()) {
            return "1";
        } else {
            echo $sql;
        }
    }
    public function checkDb($check, $with)
    {

        $sql = "SELECT * FROM esef_students WHERE $check=$with";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function InsertStudent($SchoolCode,$Silsila, $AdmissionDate,$Gender, $Student_Name, $DOB,$Father_Name, $Father_CNIC, $Father_Occupation,$contact,$Current_Class)
    
    {

        $sql = 'INSERT INTO esef_baseline (Silsila, SchoolCode,  ChildName, Gender, FatherName, FatherCnic, Contact, DOB, DOA, CClass, Father_Occupation) VALUES
        
         (:Silsila, :SchoolCode, :ChildName, :Gender, :FatherName, :FatherCnic, :Contact, :DOB, :DOA, :CClass, :Father_Occupation)';
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':Silsila', $Silsila);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->bindParam(':ChildName', $Student_Name);
        $stmt->bindParam(':Gender', $Gender);
        $stmt->bindParam(':FatherName', $Father_Name);
        $stmt->bindParam(':FatherCnic', $Father_CNIC);
        $stmt->bindParam(':Contact', $contact);
        $stmt->bindParam(':DOB', $DOB);
        $stmt->bindParam(':DOA', $AdmissionDate);
        $stmt->bindParam(':CClass', $Current_Class);
        $stmt->bindParam(':Father_Occupation', $Father_Occupation);

        // $Student_Photo = $this->upload_img($Student_Photo);
        // $SLC_Photo = $this->upload_img($SLC_Photo);
        // $stmt->bindParam(':AWR', $AWR);
        // $stmt->bindParam(':Nationality', $Nationality);
        // $stmt->bindParam(':Religion', $Religion);
        // $stmt->bindParam(':Disabilities', $Disabilities);
        // $stmt->bindParam(':DOB_in_Words', $DOB_in_Words);
        // $stmt->bindParam(':Form_B', $Form_B);
        // $stmt->bindParam(':Student_Photo', $Student_Photo);
        // $stmt->bindParam(':SLC_Photo', $SLC_Photo);
        // $stmt->bindParam(':Father_Alive', $Father_Alive);
        // $stmt->bindParam(':Father_Qualification', $Father_Qualification);
        // $stmt->bindParam(':Mother_Qualification', $Mother_Qualification);
        // $stmt->bindParam(':Guardian_Name', $Guardian_Name);
        // $stmt->bindParam(':Guardian_CNIC', $Guardian_CNIC);
        // $stmt->bindParam(':District', $District);
        // $stmt->bindParam(':Tehsil', $Tehsil);
        // $stmt->bindParam(':UnionCouncil', $UnionCouncil);
        // $stmt->bindParam(':Village', $Village);
        // $stmt->bindParam(':Mohallah', $Mohallah);
        // $stmt->bindParam(':Mobile_Alternate', $Mobile_Alternate);
        if ($stmt->execute()) {
            echo 1;
        } else {
            echo 0;
        }
    }
    public function get_user_details($user_id){
        $sql = "SELECT * From esef_students e INNER JOIN esef_lookup_school_class es on es.ClassID = e.Admission_Class  WHERE AutoID=:user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $fetched = $stmt->fetch();
        return $fetched;
    }

    //my function (kashif)
    public function get_student_details($user_id, $SchoolCode){
        $sql = "SELECT * From esef_baseline e  WHERE AutoID=:user_id && SchoolCode = :school_code";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':school_code', $SchoolCode);
        $stmt->execute();
        $fetched = $stmt->fetch();
        return $fetched;
    }


    public function get_teacher_details($user_id){
        $sql = "SELECT * From esef_school_teachers  WHERE AutoID=:user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $fetched = $stmt->fetch(PDO::FETCH_ASSOC);
        return $fetched;
    }

    public function getClass()
    {
        $sql = "SELECT ClassID,ClassName from esef_lookup_school_class ORDER by OrderID";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $fetched = $stmt->fetchAll();
        return $fetched;
    }
    public function getClass_one($ClassID)
    {
        $sql = "SELECT ClassID,ClassName from esef_lookup_school_class WHERE ClassID=:ClassID";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':ClassID', $ClassID);
        $stmt->execute();
        $fetched = $stmt->fetch();
        return  $fetched;
    }
    public function fetch_one_districts($DistrictCode)
    {
        $sql = "SELECT DistrictCode,DistrictName FROM esef_district WHERE DistrictCode=:DistrictCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':DistrictCode', $DistrictCode);
        $stmt->execute();
        $district_fetched = $stmt->fetch();
        return $district_fetched;
    }
    public function load_one_Tehsil($TehsilCode)
    {
        $district = $this->filter_data($TehsilCode);
        $sql = "SELECT TehsilCode,TehsilName FROM esef_tehsil WHERE TehsilCode = :TehsilCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':TehsilCode', $TehsilCode);
        $stmt->execute();
        $tehsil_fetched = $stmt->fetch();
        return $tehsil_fetched;
    }
    public function load_one_UC($UnionCouncilCode)
    {
        $tehsil = $this->filter_data($UnionCouncilCode);
        $sql = "SELECT UnionCouncilCode,UnionCouncilName FROM esef_uc WHERE UnionCouncilCode = :UnionCouncilCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':UnionCouncilCode', $UnionCouncilCode);
        $stmt->execute();
        $UC_fetched = $stmt->fetch();
        return $UC_fetched;
    }
    public function trim_CNIC($CNIC)
    {
       $CNIC = trim($CNIC, '-');
       return $CNIC;
    }
    public function user_data()
    {
        $sql = "SELECT * FROM esef_users";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }
    public function Facilities_fetch($SchoolCode)
    {
        $sql = "SELECT * FROM esef_school_facilities where SchoolCode=:SchoolCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->execute();
        $UC_fetched = $stmt->fetch();
        return $UC_fetched;
    }
    public function Facilities_rowCount($SchoolCode)
    {
        $sql = "SELECT * FROM esef_school_facilities where SchoolCode=:SchoolCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->execute();
        $UC_fetched = $stmt->rowCount();
        return $UC_fetched;
    }
    public function UpdateFacilities($SchoolCode, $Rooms, $Status, $Ownership, $RoomUse, $BoundryWall, $ExtraSpace, $Ventilation, $Electricity, $Solar, $Lights, $Toilet, $Fans, $Water, $Veranda, $Playground, $TeacherChair, $TeacherTable, $Cupboard, $BlackBoard, $StudentChairs, $WaterCooler, $Mats, $SchoolBell, $TLM)
    {
        $sql = "UPDATE esef_school_facilities SET Rooms= :Rooms, Status= :Status, Ownership= :Ownership, RoomUse= :RoomUse, BoundryWall= :BoundryWall , ExtraSpace = :ExtraSpace, Ventilation= :Ventilation, Electricity= :Electricity, Solar= :Solar, Lights= :Lights, Toilet= :Toilet, Fans= :Fans, Water= :Water, Veranda= :Veranda, Playground= :Playground, TeacherChair= :TeacherChair, TeacherTable= :TeacherTable, Cupboard= :Cupboard, BlackBoard= :BlackBoard, StudentChairs= :StudentChairs, WaterCooler= :WaterCooler, Mats= :Mats, SchoolBell= :SchoolBell, TLM= :TLM WHERE SchoolCode=:SchoolCode";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->bindParam(':Rooms', $Rooms);
        $stmt->bindParam(':Status', $Status);
        $stmt->bindParam(':Ownership', $Ownership);
        $stmt->bindParam(':RoomUse', $RoomUse);
        $stmt->bindParam(':BoundryWall', $BoundryWall);
        $stmt->bindParam(':ExtraSpace', $ExtraSpace);
        $stmt->bindParam(':Ventilation', $Ventilation);
        $stmt->bindParam(':Electricity', $Electricity);
        $stmt->bindParam(':Solar', $Solar);
        $stmt->bindParam(':Lights', $Lights);
        $stmt->bindParam(':Toilet', $Toilet);
        $stmt->bindParam(':Fans', $Fans);
        $stmt->bindParam(':Water', $Water);
        $stmt->bindParam(':Veranda', $Veranda);
        $stmt->bindParam(':Playground', $Playground);
        $stmt->bindParam(':TeacherChair', $TeacherChair);
        $stmt->bindParam(':TeacherTable', $TeacherTable);
        $stmt->bindParam(':Cupboard', $Cupboard);
        $stmt->bindParam(':BlackBoard', $BlackBoard);
        $stmt->bindParam(':StudentChairs', $StudentChairs);
        $stmt->bindParam(':WaterCooler', $WaterCooler);
        $stmt->bindParam(':Mats', $Mats);
        $stmt->bindParam(':SchoolBell', $SchoolBell);
        $stmt->bindParam(':TLM', $TLM);
        if ($stmt->execute()) {
            echo 1;
        } else {
            echo 0;
        }
    }
    public function enrollment_fetch($schoolCode)
    {
        $sql = "SELECT * FROM esef_class_enrollment WHERE SchoolCode=:SchoolCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $schoolCode);
        $stmt->execute();
        $UC_fetched = $stmt->fetch();
        return $UC_fetched;
    }
    public function checkenrollment($schoolCode)
    {
        $sql = "SELECT * FROM esef_class_enrollment WHERE SchoolCode=:SchoolCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $schoolCode);
        $stmt->execute();
        $UC_fetched = $stmt->rowCount();
        return $UC_fetched;
    }
    public function update_enrollment($SchoolCode, $Nursery_Boys, $Nursery_Girls, $KG_Boys, $KG_Girls, $One_Boys, $One_Girls, $Two_Boys, $Two_Girls, $Three_Boys, $Three_Girls, $Four_Boys, $Four_Girls, $Five_Boys, $Five_Girls, $Total_Boys, $Total_Girls, $Afghan_Boys, $Afghan_Girls, $Disable_Girls, $Disable_Boys)
    {
        $sql = 'UPDATE esef_class_enrollment SET Nursery_Boys = :Nursery_Boys, Nursery_Girls= :Nursery_Girls, KG_Boys= :KG_Boys, KG_Girls= :KG_Girls, One_Boys= :One_Boys, One_Girls= :One_Girls, Two_Boys= :Two_Boys, Two_Girls= :Two_Girls, Three_Boys= :Three_Boys, Three_Girls= :Three_Girls, Four_Boys= :Four_Boys, Four_Girls= :Four_Girls, Five_Boys= :Five_Boys, Five_Girls=:Five_Girls, Total_Boys= :Total_Boys, Total_Girls= :Total_Girls, Afghan_Boys= :Afghan_Boys, Afghan_Girls= :Afghan_Girls, Disable_Girls= :Disable_Girls, Disable_Boys= :Disable_Boys WHERE SchoolCode=:SchoolCode';

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->bindParam(':Nursery_Boys', $Nursery_Boys);
        $stmt->bindParam(':Nursery_Girls', $Nursery_Girls);

        $stmt->bindParam(':KG_Boys', $KG_Boys);
        $stmt->bindParam(':KG_Girls', $KG_Girls);

        $stmt->bindParam(':One_Boys', $One_Boys);
        $stmt->bindParam(':One_Girls', $One_Girls);

        $stmt->bindParam(':Two_Boys', $Two_Boys);
        $stmt->bindParam(':Two_Girls', $Two_Girls);

        $stmt->bindParam(':Three_Boys', $Three_Boys);
        $stmt->bindParam(':Three_Girls', $Three_Girls);

        $stmt->bindParam(':Four_Boys', $Four_Boys);
        $stmt->bindParam(':Four_Girls', $Four_Girls);

        $stmt->bindParam(':Five_Boys', $Five_Boys);
        $stmt->bindParam(':Five_Girls', $Five_Girls);

        $stmt->bindParam(':Total_Boys', $Total_Boys);
        $stmt->bindParam(':Total_Girls', $Total_Girls);

        $stmt->bindParam(':Afghan_Boys', $Afghan_Boys);
        $stmt->bindParam(':Afghan_Girls', $Afghan_Girls);

        $stmt->bindParam(':Disable_Girls', $Disable_Girls);
        $stmt->bindParam(':Disable_Boys', $Disable_Boys);
        if ($stmt->execute()) {
            echo "1";
        } else {
            echo $sql;
        }
    }
    public function teacher_fetch($schoolCode)
    {
        $sql = "SELECT * FROM esef_school_teachers WHERE SchoolCode=:SchoolCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $schoolCode);
        $stmt->execute();
        $UC_fetched = $stmt->fetchAll();
        return $UC_fetched;
    }
    public function update_Student($AutoID,$silsila,$SchoolCode, $Admission_Date,  $AWR, $Gender, $Nationality, $Religion,$Admission_class, $Student_Name, $Current_Class, 
    $Disabilities, $DOB, $DOB_in_Words, $Form_B, $Father_Name, $Father_CNIC, $Father_Alive,$Father_Occupation, $Father_Qualification, $Mother_Qualification, 
    $Guardian_Name, $Guardian_CNIC, $District, $Tehsil, $UnionCouncil, $Village, $Mohallah, $Mobile_Emergency, $Mobile_Alternate,$student_image,$slc_image)
    {

        $sql = 'UPDATE esef_baseline SET silsila=:Silsila, 
        DOA=:Admission_Date,
        AWR= :AWR,
        Gender= :Gender ,Nationality= :Nationality ,Religion= :Religion , 
        Student_Photo=:Student_Photo, SLC_Photo=:SLC_Photo,
        AdmissionClass=:admissionClass, 
        ChildName= :Student_Name ,CClass= :Current_Class ,
        Disabilities= :Disabilities ,
        DOB= :DOB ,DOB_in_Words= :DOB_in_Words ,
        Form_B= :Form_B  ,FatherName= :Father_Name ,
        FatherCnic= :Father_CNIC ,Father_Alive= :Father_Alive,
        Father_Occupation= :Father_Occupation, 
        Father_Qualification= :Father_Qualification, 
        Mother_Qualification= :Mother_Qualification ,
        Guardian_Name= :Guardian_Name ,Guardian_CNIC= :Guardian_CNIC,
        District= :District ,Tehsil= :Tehsil ,
        UnionCouncil= :UnionCouncil ,Village= :Village ,
        Mohallah= :Mohallah ,Contact=:Contact ,
        Mobile_Alternate=:Mobile_Alternate WHERE AutoID= :AutoID AND SchoolCode= :SchoolCode';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':Silsila', $silsila);
        $stmt->bindParam(':AutoID', $AutoID);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->bindParam(':Admission_Date', $Admission_Date);
        $stmt->bindParam(':admissionClass', $Admission_class);
        $stmt->bindParam(':AWR', $AWR);
        $stmt->bindParam(':Gender', $Gender);
        $stmt->bindParam(':Nationality', $Nationality);
        $stmt->bindParam(':Religion', $Religion);
        $stmt->bindParam(':Student_Name', $Student_Name);
        $stmt->bindParam(':Current_Class', $Current_Class);
        $stmt->bindParam(':Disabilities', $Disabilities);
        $stmt->bindParam(':DOB', $DOB);
        $stmt->bindParam(':DOB_in_Words', $DOB_in_Words);
        $stmt->bindParam(':Form_B', $Form_B);
        $stmt->bindParam(':Student_Photo', $student_image);
        $stmt->bindParam(':SLC_Photo', $slc_image);
        $stmt->bindParam(':Father_Name', $Father_Name);
        $stmt->bindParam(':Father_CNIC', $Father_CNIC);
        $stmt->bindParam(':Father_Alive', $Father_Alive);
        $stmt->bindParam(':Father_Occupation', $Father_Occupation);
        $stmt->bindParam(':Father_Qualification', $Father_Qualification);
        $stmt->bindParam(':Mother_Qualification', $Mother_Qualification);
        $stmt->bindParam(':Guardian_Name', $Guardian_Name);
        $stmt->bindParam(':Guardian_CNIC', $Guardian_CNIC);
        $stmt->bindParam(':District', $District);
        $stmt->bindParam(':Tehsil', $Tehsil);
        $stmt->bindParam(':UnionCouncil', $UnionCouncil);
        $stmt->bindParam(':Village', $Village);
        $stmt->bindParam(':Mohallah', $Mohallah);
        $stmt->bindParam(':Contact', $Mobile_Emergency);
        $stmt->bindParam(':Mobile_Alternate', $Mobile_Alternate);
        if ($stmt->execute()) {
            echo 1;
        } else {
            echo 0;
        }
    }
    public function update_all_basic($schoolCode, $DistrictCode, $NA, $PK, $Tehsil, $UC, $VC, $Village, $Mohallah, $Landmark, $XCord, $YCord, $Program, $CS_Name, $CS_Code, $CS_Type, $Status, $Building_Ownership, $Gender, $Building_Structure, $School_level, $Area, $Transport)
    {
        $sql = "UPDATE esef_school_basic SET DistrictCode= :DistrictCode, NA= :NA, PK= :PK, Tehsil= :Tehsil, UC= :UC, VC= :VC, Village= :Village, Mohallah= :Mohallah, Landmark= :Landmark, X_Cord= :XCord, Y_Cord= :YCord, Program= :Program, CS_Name= :CS_Name, CS_Code= :CS_Code, CS_Type= :CS_Type, Status= :Status, Building_Ownership= :Building_Ownership, Gender= :Gender, Building_Structure= :Building_Structure, School_level= :School_level, Area= :Area, Transport=:Transport WHERE SchoolCode=:SchoolCode";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $schoolCode);
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
        if ($stmt->execute()) {
            return "1";
        } else {
            echo "0";
        }
    }
    public function UpdateTeacher($SchoolCode, $Teacher_Name, $Father_Name, $Gender, $DOB, $Degree, $Subject, $Qualification, $Experience, $CNIC, $Bank_Name, $Bank_Code, $Account, $Disability, $Marital_Status, $Contact, $Whatsapp)
    {
        $sql = "UPDATE esef_school_teachers SET Teacher_Name=:Teacher_Name, Father_Name=:Father_Name, Gender=:Gender, DOB=:DOB, Degree=:Degree, Subject=:Subject, Qualification=:Qualification,Experience=:Experience,CNIC=:CNIC, Bank_Name=:Bank_Name, Bank_Code=:Bank_Code, Account=:Account, Disability=:Disability, Marital_Status=:Marital_Status, Contact=:Contact, Whatsapp =:Whatsapp WHERE SchoolCode=:SchoolCode";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->bindParam(':Teacher_Name', $Teacher_Name);
        $stmt->bindParam(':Father_Name', $Father_Name);
        $stmt->bindParam(':Gender', $Gender);
        $stmt->bindParam(':DOB', $DOB);
        $stmt->bindParam(':Degree', $Degree);
        $stmt->bindParam(':Subject', $Subject);
        $stmt->bindParam(':Qualification', $Qualification);
        $stmt->bindParam(':Experience', $Experience);
        $stmt->bindParam(':CNIC', $CNIC);
        $stmt->bindParam(':Bank_Name', $Bank_Name);
        $stmt->bindParam(':Bank_Code', $Bank_Code);
        $stmt->bindParam(':Account', $Account);
        $stmt->bindParam(':Disability', $Disability);
        $stmt->bindParam(':Marital_Status', $Marital_Status);
        $stmt->bindParam(':Contact', $Contact);
        $stmt->bindParam(':Whatsapp', $Whatsapp);

        if ($stmt->execute()) {
            echo "1";
        } else {
            echo $sql;
        }
    }

    public function insertTeacherattendence($schoolCode,$teacherId,$status,$date){
        $sql="INSERT INTO esef_school_teacher_attendence (School_Code,Teacher_Id,status,date) values (:School_Code,:teacherId,:status,:date)";
        $stmt=$this->conn->prepare($sql);
        $stmt->bindParam('School_Code', $schoolCode);
        $stmt->bindParam('teacherId', $teacherId);
        $stmt->bindParam('date', $date);
        $stmt->bindParam('status', $status);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function checkTeachertodayAttendence($schoolCode,$date){
        $sql="SELECT Attendence_Id from esef_school_teacher_attendence where School_Code=:School_Code AND date LIKE :date";
        $stmt=$this->conn->prepare($sql);
        $pattern='%' . $date . '%';
        $stmt->bindParam('School_Code', $schoolCode);
        $stmt->bindParam('date', $pattern);
        if($stmt->execute()){
            
            return $stmt->rowCount();
        }else{
            return false;
        }
    }
    public function insertStudentattendence($schoolCode,$teacherId,$class,$status,$date){
        $sql="INSERT INTO esef_school_student_attendence (School_Id,Student_Id,class,status,date) values (:School_Code,:stdId,:class,:status,:date)";
        $stmt=$this->conn->prepare($sql);
        $stmt->bindParam('School_Code', $schoolCode);
        $stmt->bindParam('stdId', $teacherId);
        $stmt->bindParam('date', $date);
        $stmt->bindParam('status', $status);
        $stmt->bindParam('class', $class);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function checkStudenttodayAttendence($schoolCode,$date,$class){
        $sql="SELECT Attendence_Id from esef_school_student_attendence where School_Id=:School_Code AND class=:class AND date LIKE :date";
        $stmt=$this->conn->prepare($sql);
        $pattern='%' . $date . '%';
        $stmt->bindParam('School_Code', $schoolCode);
        $stmt->bindParam('date', $pattern);
        $stmt->bindParam('class', $class);
        if($stmt->execute()){
            return $stmt->rowCount();
        }else{
            return false;
        }
    }
    public function fetchAttendence($School_Code,$toDate,$fromDate){
        $sql="SELECT DISTINCT(a.Teacher_Id), a.School_Code,t.Teacher_Name from esef_school_teacher_attendence a inner join esef_school_teachers t on t.AutoId=a.Teacher_Id where a.School_Code=:School_Code and (a.date=:fromDate or a.date=:toDate or a.date>:fromDate)";
        $stmt=$this->conn->prepare($sql);
       
        $stmt->bindParam('fromDate', $fromDate);
        $stmt->bindParam('toDate', $toDate);
        $stmt->bindParam('School_Code', $School_Code);
        if($stmt->execute()){
            
            return $stmt->fetchAll();
        }else{
            return false;
        }
    }
    public function fetchTeacherAttendenceByID($Teacher_Id,$School_Code,$toDate,$fromDate){
        $sql="SELECT a.status,a.date from esef_school_teacher_attendence a inner join esef_school_teachers t on t.AutoId=a.Teacher_Id where a.School_Code=:School_Code and (a.date=:fromDate or a.date=:toDate or a.date>:fromDate) and a.Teacher_Id=:Teacher_Id";
        $stmt=$this->conn->prepare($sql);
        $stmt->bindParam('fromDate', $fromDate);
        $stmt->bindParam('toDate', $toDate);
        $stmt->bindParam('School_Code', $School_Code);
        $stmt->bindParam('Teacher_Id', $Teacher_Id);
       
        if($stmt->execute()){
            
            return $stmt->fetchAll();
        }else{
            return false;
        }
    }
    public function fetchteacherAttendence($School_Code,$toDate,$fromDate){
        $sql="SELECT a.School_Code,a.Teacher_Id, t.Teacher_Name,a.status,a.date from esef_school_teacher_attendence a inner join esef_school_teachers t on t.AutoId=a.Teacher_Id where a.School_Code=:School_Code and (a.date=:fromDate or a.date=:toDate or a.date>:fromDate)";
        $stmt=$this->conn->prepare($sql);
       
        $stmt->bindParam('fromDate', $fromDate);
        $stmt->bindParam('toDate', $toDate);
        $stmt->bindParam('School_Code', $School_Code);
        if($stmt->execute()){
            
            return $stmt->fetchAll();
        }else{
            return false;
        }
    }
    public function fetchdate($School_Code,$toDate,$fromDate){
        $sql="SELECT distinct (a.date) from esef_school_teacher_attendence a inner join esef_school_teachers t on t.AutoId=a.Teacher_Id where a.School_Code=:School_Code and (a.date=:fromDate or a.date=:toDate or a.date>:fromDate)";
        $stmt=$this->conn->prepare($sql);
       
        $stmt->bindParam('fromDate', $fromDate);
        $stmt->bindParam('toDate', $toDate);
        $stmt->bindParam('School_Code', $School_Code);
        if($stmt->execute()){
            
            return $stmt->fetchAll();
        }else{
            return false;
        }
    }
    public function fetchsattendencebyid($studentId,$School_Code,$toDate,$fromDate){
        $sql="SELECT a.status,a.date from esef_school_student_attendence a inner join esef_baseline t on t.AutoId=a.Student_Id where a.School_Id=:School_Code and (a.date=:fromDate or a.date=:toDate or a.date>:fromDate) and Student_Id=:studentId";
        $stmt=$this->conn->prepare($sql);
       
        $stmt->bindParam('fromDate', $fromDate);
        $stmt->bindParam('toDate', $toDate);
        $stmt->bindParam('School_Code', $School_Code);
        $stmt->bindParam('studentId', $studentId);
        if($stmt->execute()){
            
            return $stmt->fetchAll();
        }else{
            return false;
        }
    }
    public function fetchsdate($School_Code,$toDate,$fromDate){
        $sql="SELECT DISTINCT(a.date) from esef_school_student_attendence a inner join esef_baseline t on t.AutoId=a.Student_Id where a.School_Id=:School_Code and (a.date=:fromDate or a.date=:toDate or a.date>:fromDate)";
        $stmt=$this->conn->prepare($sql);
       
        $stmt->bindParam('fromDate', $fromDate);
        $stmt->bindParam('toDate', $toDate);
        $stmt->bindParam('School_Code', $School_Code);
        if($stmt->execute()){
            
            return $stmt->fetchAll();
        }else{
            return false;
        }
    }
    public function fetchsattendence($School_Code,$toDate,$fromDate){
        $sql="SELECT DISTINCT(a.Student_Id), t.ChildName from esef_school_student_attendence a inner join esef_baseline t on t.AutoId=a.Student_Id where a.School_Id=:School_Code and (a.date=:fromDate or a.date=:toDate or a.date>:fromDate)";
        $stmt=$this->conn->prepare($sql);
       
        $stmt->bindParam('fromDate', $fromDate);
        $stmt->bindParam('toDate', $toDate);
        $stmt->bindParam('School_Code', $School_Code);
        if($stmt->execute()){
            
            return $stmt->fetchAll();
        }else{
            return false;
        }
    }
    public function fetchclassstudent($School_Code,$class){
        $sql="SELECT ChildName, FatherName,Form_B,AutoID,ClassName from esef_baseline eb INNER JOIN esef_lookup_school_class es on eb.CClass = ClassID where CClass=:class and SchoolCode=:School_Code";
        $stmt=$this->conn->prepare($sql);
        
        $stmt->bindParam(':class', $class);
        $stmt->bindParam(':School_Code', $School_Code);
        if($stmt->execute()){
            
            return $stmt->fetchAll();
        }else{
            return false;
        }
    }
    public function insertContactUs($SchoolCode, $from, $to, $subject, $msg, $contact, $attachment){
        $attachment = $this->upload_img($attachment);
        $sql="INSERT INTO esef_contactus (SchoolCode,from_user,role,subject,msg,contact,attachment) values (:SchoolCode,:from_user,:to_user,:subject,:msg,:contact,:attachment)";
        $stmt=$this->conn->prepare($sql);
        $stmt->bindParam(':from_user', $from);
        $stmt->bindParam(':to_user', $to);
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':msg', $msg);
        $stmt->bindParam(':contact', $contact);
        $stmt->bindParam(':attachment', $attachment);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        if($stmt->execute()){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function totalStudentSchool($schoolCode){
        $sql="SELECT AutoID from esef_baseline where SchoolCode=:schoolcode";
        $stmt=$this->conn->prepare($sql);
        $stmt->bindParam('schoolcode', $schoolCode);
        if($stmt->execute()){
            return $stmt->rowCount();
        }else{
            return false;
        }
    }
    public function total_girls($schoolCode){
        $sql="SELECT AutoID from esef_baseline where SchoolCode=:schoolcode AND Gender='Female'";
        $stmt=$this->conn->prepare($sql);
        $stmt->bindParam('schoolcode', $schoolCode);
        if($stmt->execute()){
            return $stmt->rowCount();
        }else{
            return false;
        }
    }
    public function total_boys($schoolCode){
        $sql="SELECT AutoID from esef_baseline where SchoolCode=:schoolcode AND Gender='Male'";
        $stmt=$this->conn->prepare($sql);
        $stmt->bindParam('schoolcode', $schoolCode);
        if($stmt->execute()){
            return $stmt->rowCount();
        }else{
            return false;
        }
    }
    public function DisableStd($schoolCode){
        $sql="SELECT Disable_Boys,Disable_Girls from esef_class_enrollment where SchoolCode=:schoolcode";
        $stmt=$this->conn->prepare($sql);
        $stmt->bindParam('schoolcode', $schoolCode);
        if($stmt->execute()){
            return $stmt->fetch();
        }else{
            return false;
        }
    }
    public function totalStudentPresent($schoolCode,$date){
        $sql="SELECT Attendence_Id from esef_school_student_attendence where School_Id=:schoolcode AND date=:date AND status='0'";
        $stmt=$this->conn->prepare($sql);
        $stmt->bindParam('schoolcode', $schoolCode);
        $stmt->bindParam('date', $date);
        if($stmt->execute()){
            return $stmt->rowCount();
        }else{
            return false;
        }
    }
    public function totalStudentAbsent($schoolCode,$date){
        $sql="SELECT Attendence_Id from esef_school_student_attendence where School_Id=:schoolcode AND date=:date AND (status='1' or status='2')";
        $stmt=$this->conn->prepare($sql);
        $stmt->bindParam('schoolcode', $schoolCode);
        $stmt->bindParam('date', $date);
        if($stmt->execute()){
            return $stmt->rowCount();
        }else{
            return false;
        }
    }
    public function totalteacherSchool($schoolCode){
        $sql="SELECT AutoID from esef_school_teachers where SchoolCode=:schoolcode";
        $stmt=$this->conn->prepare($sql);
        $stmt->bindParam('schoolcode', $schoolCode);
        if($stmt->execute()){
            return $stmt->rowCount();
        }else{
            return false;
        }
    }
    public function totalteacherPresent($schoolCode,$date){
        $sql="SELECT Attendence_Id from esef_school_teacher_attendence where School_Code=:schoolcode AND date=:date AND status='0'";
        $stmt=$this->conn->prepare($sql);
        $stmt->bindParam('schoolcode', $schoolCode);
        $stmt->bindParam('date', $date);
        if($stmt->execute()){
            return $stmt->rowCount();
        }else{
            return false;
        }
    }
    public function totalteacherAbsent($schoolCode,$date){
        $sql="SELECT Attendence_Id from esef_school_teacher_attendence where School_Code=:schoolcode AND date=:date AND (status='1' or status='2')";
        $stmt=$this->conn->prepare($sql);
        $stmt->bindParam('schoolcode', $schoolCode);
        $stmt->bindParam('date', $date);
        if($stmt->execute()){
            return $stmt->rowCount();
        }else{
            return false;
        }
    }
    public function update_basic_check($schoolCode, $db)
    {
        $sql = "SELECT * from $db where SchoolCode=:SchoolCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['SchoolCode' => $schoolCode]);
        $count =  $stmt->rowCount();
        return $count;
    }
    public function delete_nearest_institution($schoolCode, $school_id){
        $sql = "DELETE FROM esef_school_nearest_institutions WHERE SchoolCode=:SchoolCode AND AutoID = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $schoolCode);
        $stmt->bindParam(':id', $school_id);
        if($stmt->execute())
        {
            echo 1;
        }else{
            echo 0;
        }
       
    }
    public function fetch_all_users()
    {
         $sql = "SELECT * FROM esef_users";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $district_fetched = $stmt->fetchAll();
        return $district_fetched;
    }
    public function delete_student($SchoolCode, $Student_id){
        $sql = "DELETE FROM `esef_baseline` WHERE `esef_baseline`.`AutoID` =:Student_id AND SchoolCode = :SchoolCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->bindParam(':Student_id', $Student_id);
        if($stmt->execute()){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function delete_Teacher($SchoolCode, $Teacher_id){
        $sql = "DELETE FROM `esef_school_teachers` WHERE `esef_school_teachers`.`AutoID` = :Teacher_id AND SchoolCode = :SchoolCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->bindParam(':Teacher_id', $Teacher_id);
        if($stmt->execute()){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function reset_password_user($school_id){
        $sql = "UPDATE `esef_users` SET `Password` = 'GCS@123' WHERE `esef_users`.`AutoID` = :school_id;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':school_id', $school_id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function FetchStudentByClassAndSchoolCode($class,$schoolCode){
        $sql="SELECT AutoID,AWR,Gender,ChildName,FatherName from esef_baseline where SchoolCode=:schoolCode && CClass=:class";
        $stmt=$this->conn->prepare($sql);
        $stmt->bindParam(':class', $class);
        $stmt->bindParam(':schoolCode', $schoolCode);
        if($stmt->execute()){
            return $stmt->fetchAll();
        }else{
            return "sql failed";
        }
    }
    public function getstudentclassbyid($id){
        $sql="SELECT CClass from esef_baseline where AutoID=:id";
        $stmt=$this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        if($stmt->execute()){
            return $stmt->fetch();
        }else{
            return "sql failed";
        }
    }
    public function updateStudentClass($autoid,$promotion){
        $sql="UPDATE esef_baseline set CClass = '$promotion' where AutoID='$autoid'";
        $stmt=$this->conn->prepare($sql);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function fetchTeacherBySchoolCode($SchoolCode){
        $sql="SELECT AutoID ,Teacher_Name from esef_school_teachers where SchoolCode=:SchoolCode";
        $stmt=$this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        if($stmt->execute()){
            return $stmt->fetchAll();
        }else{
            return "sql failed";
        }
    }


    public function addLeave($SchoolCode,$leaveFrom,$leaveTo,$teacherID,$leaveType,$file){
        $sql="INSERT INTO esef_leave_from (teacherID,SchoolCode,leave_type,leave_from,leave_to,image) VALUES(:teacherID,:SchoolCode,:leave_type,:leave_from,:leave_to,:image)";
        $stmt=$this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->bindParam(':leave_from', $leaveFrom);
        $stmt->bindParam(':leave_to', $leaveTo);
        $stmt->bindParam(':leave_type', $leaveType);
        $stmt->bindParam(':image', $file);
        $stmt->bindParam(':teacherID', $teacherID);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function after5classpromotion($value,$SchoolCode,$freshContact,$schoolName){
        $sql="INSERT INTO esef_graduate_student (SchoolCode,studentID,freshContact,schoolName) VALUES(:SchoolCode,:studentID,:freshContact,:schoolName)";
        $stmt=$this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->bindParam(':studentID', $value);
        $stmt->bindParam(':freshContact', $freshContact);
        $stmt->bindParam(':schoolName', $schoolName);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }

    }
    public function Vec_Meetings($SchoolCode, $meeting_date, $meeting_place, $meeting_no, $Agenda, $Proceedings, $present, $absent, $attendenceSheet, $groupPhoto){
    $attendenceSheet = $this->upload_img($attendenceSheet);
    $groupPhoto = $this->upload_img($groupPhoto);

    $sql = "INSERT INTO esef_vec_meetings (SchoolCode, meeting_date, meeting_place, meeting_no, Agenda, Proceedings, present, absent, attendenceSheet, groupPhoto) VALUES (:SchoolCode, :meeting_date, :meeting_place, :meeting_no, :Agenda, :Proceedings, :present, :absent, :attendenceSheet, :groupPhoto)";

    $stmt=$this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->bindParam(':meeting_date', $meeting_date);
        $stmt->bindParam(':meeting_place', $meeting_place);
        $stmt->bindParam(':meeting_place', $meeting_place);
        $stmt->bindParam(':meeting_no', $meeting_no);
        $stmt->bindParam(':Agenda', $Agenda);
        $stmt->bindParam(':Proceedings', $Proceedings);
        $stmt->bindParam(':present', $present);
        $stmt->bindParam(':absent', $absent);
        $stmt->bindParam(':attendenceSheet', $attendenceSheet);
        $stmt->bindParam(':groupPhoto', $groupPhoto);

        if ($stmt->execute()) {
            echo 1;
        } else {
            echo 0;
        }

    
    
    }
    public function improvement_plan($SchoolCode, $datee, $task, $responsibilty, $cost, $deadline, $status){
        $sql = "INSERT INTO esef_improvement_plan (SchoolCode, datee, task, responsibilty, cost, deadline, status) VALUE (:SchoolCode, :datee, :task, :responsibilty, :cost, :deadline, :status)";
        $stmt=$this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->bindParam(':datee', $datee);
        $stmt->bindParam(':task', $task);
        $stmt->bindParam(':responsibilty', $responsibilty);
        $stmt->bindParam(':cost', $cost);
        $stmt->bindParam(':deadline', $deadline);
        $stmt->bindParam(':status', $status);
        if ($stmt->execute()) {
            echo 1;
        } else {
            echo 0;
        }


    }
    public function Fetch_improvement_plane($SchoolCode){
        $sql = "SELECT * FROM esef_improvement_plan where SchoolCode = :SchoolCode Order by Plan_id desc";
        $stmt=$this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function delete_School_Improvement_plan($SchoolCode, $School_Improvement_plan_id){
       $sql = "DELETE from esef_improvement_plan where SchoolCode = :SchoolCode and Plan_id= :id";
       $stmt=$this->conn->prepare($sql);
       $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->bindParam(':id', $School_Improvement_plan_id);
        if ($stmt->execute()) {
            echo 1;
        } else {
            echo 0;
        }

    }
    public function visitor($SchoolCode, $datee, $namee, $designation, $organization, $cnumber, $purpose, $remarks){
        $sql = "INSERT INTO esef_visitors (Date_Of_Visit, SchoolCode, Name, Designation, Organization, Cnumber, Purpose, Remarks) VALUE (:Date_Of_Visit, :SchoolCode, :Name, :Designation, :Organization, :Cnumber, :Purpose, :Remarks)";
        $stmt=$this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->bindParam(':Date_Of_Visit', $datee);
        $stmt->bindParam(':Name', $namee);
        $stmt->bindParam(':Designation', $designation);
        $stmt->bindParam(':Organization', $organization);
        $stmt->bindParam(':Cnumber', $cnumber);
        $stmt->bindParam(':Purpose', $purpose);
        $stmt->bindParam(':Remarks', $remarks);
        if ($stmt->execute()) {
            echo 1;
        } else {
            echo 0;
        }
    }
    public function fetchVisitors($SchoolCode)
    {
        $sql = "SELECT * from esef_visitors where SchoolCode = :SchoolCode";
        $stmt=$this->conn->prepare($sql);
        $stmt->bindParam(':SchoolCode', $SchoolCode);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function InsertVECMember($name	,$cnic	,$contact	,$designation	,$category	,$SchoolCode  ){
        $sql="INSERT INTO esef_vec_member (name	,cnic	,contact	,designation	,category	,SchoolCode	) VALUES('$name'	,'$cnic'	,'$contact'	,'$designation'	,'$category'	,'$SchoolCode')";
        $stmt=$this->conn->prepare($sql);
       return   $stmt->execute();
    }
    public function fetchVECMember($SchoolCode){
        $sql="SELECT * from esef_vec_member where SchoolCode='$SchoolCode'";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}

