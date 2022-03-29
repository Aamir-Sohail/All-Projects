<?php
ob_start();
session_start();
include 'auth.php';
$SchoolCode = $_SESSION['SchoolCode'];
$data_fetched = new auth();
date_default_timezone_set("Asia/Karachi");
if (isset($_POST['MODE']) && $_POST['MODE'] == "district")
{
    $district = $_POST['district'];
    $tehsil = $data_fetched->load_Tehsil($district);
    echo '<option value="" selected>--SELECT--</option>';
    foreach ($tehsil as $row)
    {
        echo '<option value="' . $row['TehsilCode'] . '">' . $row['TehsilName'] . '</option>';
    }
}

if (isset($_POST['MODE']) && $_POST['MODE'] == "tehsil")
{
    $tehsil = $_POST['tehsil'];
    $uc = $data_fetched->load_UC($tehsil);
    echo '<option value="" selected>--SELECT--</option>';
    foreach ($uc as $row)
    {
        echo '<option value="' . $row['UnionCouncilCode'] . '">' . $row['UnionCouncilName'] . '</option>';
    }
}
if (isset($_POST['MODE']) && $_POST['MODE'] == "NA")
{
    $district = $_POST['district'];
    $uc = $data_fetched->load_NA($district);
    foreach ($uc as $row)
    {
        echo '<option value="' . $row['AutoID'] . '">' . $row['NA'] . '</option>';
    }
}
if (isset($_POST['MODE']) && $_POST['MODE'] == "PK")
{
    $district = $_POST['district'];
    $uc = $data_fetched->load_PK($district);
    foreach ($uc as $row)
    {
        echo '<option value="' . $row['AutoID'] . '">' . $row['PK'] . '</option>';
    }
}

if (isset($_POST['MODE']) && $_POST['MODE'] == "formData")
{

    $district = $data_fetched->filter_data($_POST['District']);
    $NA = $data_fetched->filter_data($_POST['NA']);
    $PK = $data_fetched->filter_data($_POST['PK']);
    $Tehsil = $data_fetched->filter_data($_POST['Tehsil']);
    $UC = $data_fetched->filter_data($_POST['UC']);
    $VC = $data_fetched->filter_data($_POST['VC']);
    $Village = $data_fetched->filter_data($_POST['Village']);
    $Mohallah = $data_fetched->filter_data($_POST['Mohalla']);
    $landmark = $data_fetched->filter_data($_POST['landmark']);
    $Xcord = $data_fetched->filter_data($_POST['X-cord']);
    $Ycord = $data_fetched->filter_data($_POST['Y-cord']);
    $Program = $data_fetched->filter_data($_POST['Program']);
    $CS_Name = $data_fetched->filter_data($_POST['CS_Name']);
    $CS_Code = $data_fetched->filter_data($_POST['CS_Code']);
    $CS_Type = $data_fetched->filter_data($_POST['CS_Type']);
    $Status = $data_fetched->filter_data($_POST['status']);
    $Building_Ownership = $data_fetched->filter_data($_POST['Building_Ownership']);
    $Gender = $data_fetched->filter_data($_POST['gender']);
    $Building_Structure = $data_fetched->filter_data($_POST['buildling_structure']);
    $School_Level = $data_fetched->filter_data($_POST['School_Level']);
    $Area = $data_fetched->filter_data($_POST['area']);
    $Transport = $data_fetched->filter_data($_POST['Transport']);

    if ($data_fetched->insert_basic_check($SchoolCode, 'esef_school_basic') > 0)
    {
        echo "School Already sent their data";
    }
    else
    {

        $result = $data_fetched->insert_basic($SchoolCode, $district, $NA, $PK, $Tehsil, $UC, $VC, $Village, $Mohallah, $landmark, $Xcord, $Ycord, $Program, $CS_Name, $CS_Code, $CS_Type, $Status, $Building_Ownership, $Gender, $Building_Structure, $School_Level, $Area, $Transport);

        if ($result)
        {
            echo "1";
        }
    }
}
if (isset($_POST['MODE']) && $_POST['MODE'] == "Nearest_Institutions")
{
    // $count_db =  $data_fetched->filter_data($_POST['count']);
    // for ($count = 0; $count < $count_db; $count++) {
    $SchoolName = $data_fetched->filter_data($_POST["school"]);
    $SchoolLevel = $data_fetched->filter_data($_POST["level"]);
    $SchoolGender = $data_fetched->filter_data($_POST["gender"]);
    $emisCode = $data_fetched->filter_data($_POST["emis"]);
    $distance = $data_fetched->filter_data($_POST["distance"]);

    $result = $data_fetched->nearestInstitutions($SchoolCode, $SchoolName, $SchoolLevel, $SchoolGender, $emisCode, $distance);
    if ($result)
    {
        echo "1";
    }
    // }
    
}
if (isset($_POST['MODE']) && $_POST['MODE'] == "delete_school")
{
    $school_id = $data_fetched->filter_data($_POST["delete_id"]);
    $result = $data_fetched->delete_nearest_institution($SchoolCode, $school_id);
    if ($result === 1)
    {
        echo 1;
    }
}
if (isset($_POST['reset_school_pass']))
{
    $school_id = $data_fetched->filter_data($_POST["school_id"]);
    $result = $data_fetched->reset_password_user($school_id);
    if ($result)
    {
        header("Location: ../LockedPage.php?password=Hopeapko123&alert=success");
    }
    else
    {
        header("Location: ../LockedPage.php?password=Hopeapko123");

    }
}
// if (isset($_POST['MODE']) && $_POST['MODE'] == "delete_school") {
// $Nursery_Boys = $data_fetched->filter_data($_POST["Nursery_Boys"]);
// $Nursery_Girls = $data_fetched->filter_data($_POST["Nursery_Girls"]);
// $Four_Boys = $data_fetched->filter_data($_POST["Four_Boys"]);
// $Four_Girls = $data_fetched->filter_data($_POST["Four_Girls"]);
// $KG_Boys = $data_fetched->filter_data($_POST["KG_Boys"]);
// $KG_Girls = $data_fetched->filter_data($_POST["KG_Girls"]);
// $Five_Boys = $data_fetched->filter_data($_POST["Five_Boys"]);
// $Five_Girls = $data_fetched->filter_data($_POST["Five_Girls"]);
// $Five_Boys = $data_fetched->filter_data($_POST["Five_Boys"]);
// $Five_Girls = $data_fetched->filter_data($_POST["Five_Girls"]);
// $One_Boys = $data_fetched->filter_data($_POST["One_Boys"]);
// $One_Girls = $data_fetched->filter_data($_POST["One_Girls"]);
// $total_Boys = $data_fetched->filter_data($_POST["total_Boys"]);
// $total_Girls = $data_fetched->filter_data($_POST["total_Girls"]);
// $Two_Boys = $data_fetched->filter_data($_POST["Two_Boys"]);
// $Two_Girls = $data_fetched->filter_data($_POST["Two_Girls"]);
// $Afghan_Boys = $data_fetched->filter_data($_POST["Afghan_Boys"]);
// $Afghan_Girls = $data_fetched->filter_data($_POST["Afghan_Girls"]);
// $Three_Boys = $data_fetched->filter_data($_POST["Three_Boys"]);
// $Three_Girls = $data_fetched->filter_data($_POST["Three_Girls"]);
// $Disable_Boys = $data_fetched->filter_data($_POST["Disable_Boys"]);
// $Disable_Girls = $data_fetched->filter_data($_POST["Disable_Girls"]);
// if ($data_fetched->update_basic_check($SchoolCode, 'esef_class_enrollment') > 0) {
//     echo "School Already sent their data";
// } else {
//     $result = $data_fetched->insert_enrollment($SchoolCode, $Nursery_Boys, $Nursery_Girls, $KG_Boys, $KG_Girls, $One_Boys, $One_Girls, $Two_Boys, $Two_Girls, $Three_Boys, $Three_Girls, $Four_Boys, $Four_Girls, $Five_Boys, $Five_Girls, $total_Boys, $total_Girls, $Afghan_Boys, $Afghan_Girls, $Disable_Girls, $Disable_Boys);
//     if ($result === 1) {
//         header("Location: dashboard.php?step=1");
//     }
// }
// }
if (isset($_POST['MODE']) && $_POST['MODE'] == "enrollment")
{
    $Nursery_Boys = $data_fetched->filter_data($_POST["Nursery_Boys"]);
    $Nursery_Girls = $data_fetched->filter_data($_POST["Nursery_Girls"]);

    $Four_Boys = $data_fetched->filter_data($_POST["Four_Boys"]);
    $Four_Girls = $data_fetched->filter_data($_POST["Four_Girls"]);

    $KG_Boys = $data_fetched->filter_data($_POST["KG_Boys"]);
    $KG_Girls = $data_fetched->filter_data($_POST["KG_Girls"]);

    $Five_Boys = $data_fetched->filter_data($_POST["Five_Boys"]);
    $Five_Girls = $data_fetched->filter_data($_POST["Five_Girls"]);

    $Five_Boys = $data_fetched->filter_data($_POST["Five_Boys"]);
    $Five_Girls = $data_fetched->filter_data($_POST["Five_Girls"]);

    $One_Boys = $data_fetched->filter_data($_POST["One_Boys"]);
    $One_Girls = $data_fetched->filter_data($_POST["One_Girls"]);

    $total_Boys = $data_fetched->filter_data($_POST["total_Boys"]);
    $total_Girls = $data_fetched->filter_data($_POST["total_Girls"]);

    $Two_Boys = $data_fetched->filter_data($_POST["Two_Boys"]);
    $Two_Girls = $data_fetched->filter_data($_POST["Two_Girls"]);

    $Afghan_Boys = $data_fetched->filter_data($_POST["Afghan_Boys"]);
    $Afghan_Girls = $data_fetched->filter_data($_POST["Afghan_Girls"]);

    $Three_Boys = $data_fetched->filter_data($_POST["Three_Boys"]);
    $Three_Girls = $data_fetched->filter_data($_POST["Three_Girls"]);

    $Disable_Boys = $data_fetched->filter_data($_POST["Disable_Boys"]);
    $Disable_Girls = $data_fetched->filter_data($_POST["Disable_Girls"]);

    if ($data_fetched->insert_basic_check($SchoolCode, 'esef_class_enrollment') > 0)
    {
        echo "School Already sent their data";
    }
    else
    {
        $result = $data_fetched->insert_enrollment($SchoolCode, $Nursery_Boys, $Nursery_Girls, $KG_Boys, $KG_Girls, $One_Boys, $One_Girls, $Two_Boys, $Two_Girls, $Three_Boys, $Three_Girls, $Four_Boys, $Four_Girls, $Five_Boys, $Five_Girls, $total_Boys, $total_Girls, $Afghan_Boys, $Afghan_Girls, $Disable_Girls, $Disable_Boys);
        if ($result === 1)
        {
            header("Location: dashboard.php?step=1");
        }
    }
}
if (isset($_POST['MODE']) && $_POST['MODE'] == "teacherForm")
{
    $count_db = $data_fetched->filter_data($_POST['count']);
    for ($count = 0;$count < $count_db;$count++)
    {
        $Teacher_Name = $data_fetched->filter_data($_POST["Teacher"][$count]);
        $Father_Name = $data_fetched->filter_data($_POST["Fname"][$count]);
        $Gender = $data_fetched->filter_data($_POST["Gender"][$count]);
        $DOB = $data_fetched->filter_data($_POST["Dob"][$count]);
        $Degree = $data_fetched->filter_data($_POST["last_Degree"][$count]);
        $Subject = $data_fetched->filter_data($_POST["Subject"][$count]);
        $Qualification = $data_fetched->filter_data($_POST["Qualification"][$count]);
        $Experience = $data_fetched->filter_data($_POST["Experience"][$count]);
        $CNIC = $data_fetched->filter_data($_POST["CNIC"][$count]);
        $Bank_Name = $data_fetched->filter_data($_POST["Bank_Name"][$count]);
        $Bank_Code = $data_fetched->filter_data($_POST["Branch_Code"][$count]);
        $Account = $data_fetched->filter_data($_POST["Account"][$count]);
        $Disability = $data_fetched->filter_data($_POST["Disability"][$count]);
        $Marital_Status = $data_fetched->filter_data($_POST["Marital_Status"][$count]);
        $Contact = $data_fetched->filter_data($_POST["Contact"][$count]);
        $Whatsapp = $data_fetched->filter_data($_POST["Whatsapp"][$count]);

        $result = $data_fetched->InsertTeacher($SchoolCode, $Teacher_Name, $Father_Name, $Gender, $DOB, $Degree, $Subject, $Qualification, $Experience, $CNIC, $Bank_Name, $Bank_Code, $Account, $Disability, $Marital_Status, $Contact, $Whatsapp);

        if ($result === 1)
        {
            header("Location: dashboard.php?step=1");
        }
    }
}
if (isset($_POST['MODE']) && $_POST['MODE'] == "Facilities")
{

    $Rooms = $data_fetched->filter_data($_POST["Rooms"]);
    $Status = $data_fetched->filter_data($_POST["Status"]);
    $Ownership = $data_fetched->filter_data($_POST["Ownership"]);
    $RoomUse = $data_fetched->filter_data($_POST["RoomUse"]);
    $BoundryWall = $data_fetched->filter_data($_POST["BoundryWall"]);
    $ExtraSpace = $data_fetched->filter_data($_POST["ExtraSpace"]);
    $Ventilation = $data_fetched->filter_data($_POST["Ventilation"]);
    $Electricity = $data_fetched->filter_data($_POST["Electricity"]);
    $Solar = $data_fetched->filter_data($_POST["Solar"]);
    $Lights = $data_fetched->filter_data($_POST["Lights"]);
    $Toilet = $data_fetched->filter_data($_POST["Toilet"]);
    $Fans = $data_fetched->filter_data($_POST["Fans"]);
    $Water = $data_fetched->filter_data($_POST["Water"]);
    $Veranda = $data_fetched->filter_data($_POST["Veranda"]);
    $Playground = $data_fetched->filter_data($_POST["Playground"]);
    $TeacherChair = $data_fetched->filter_data($_POST["TeacherChair"]);
    $TeacherTable = $data_fetched->filter_data($_POST["TeacherTable"]);
    $Cupboard = $data_fetched->filter_data($_POST["Cupboard"]);
    $BlackBoard = $data_fetched->filter_data($_POST["BlackBoard"]);
    $StudentChairs = $data_fetched->filter_data($_POST["StudentChairs"]);
    $WaterCooler = $data_fetched->filter_data($_POST["WaterCooler"]);
    $Mats = $data_fetched->filter_data($_POST["Mats"]);
    $SchoolBell = $data_fetched->filter_data($_POST["SchoolBell"]);
    $TLM = $data_fetched->filter_data($_POST["TLM"]);

    if ($data_fetched->insert_basic_check($SchoolCode, 'esef_school_Facilities') > 0)
    {
        echo "School Already sent their data";
    }
    else
    {
        $result = $data_fetched->InsertFacilities($SchoolCode, $Rooms, $Status, $Ownership, $RoomUse, $BoundryWall, $ExtraSpace, $Ventilation, $Electricity, $Solar, $Lights, $Toilet, $Fans, $Water, $Veranda, $Playground, $TeacherChair, $TeacherTable, $Cupboard, $BlackBoard, $StudentChairs, $WaterCooler, $Mats, $SchoolBell, $TLM);

        echo "1";
    }
}

//my code (kashif)
if (isset($_POST['MODE']) && $_POST['MODE'] == "studentForm")
{
    $Silsila = $data_fetched->filter_data($_POST["silsla"]);
    $AdmissionDate = $data_fetched->filter_data($_POST["DOA"]);
    // $AdmissionClass  =  $data_fetched->filter_data($_POST["AdmissionClass"]);
    $Gender = $data_fetched->filter_data($_POST["children_gender"]);
    $Student_Name = $data_fetched->filter_data($_POST["child_name"]);
    $DOB = $data_fetched->filter_data($_POST["DOB"]);
    $Father_Name = $data_fetched->filter_data($_POST["f_name"]);
    $Father_CNIC = $data_fetched->filter_data($_POST["f_cnic"]);
    $Father_Occupation = $data_fetched->filter_data($_POST["Father_Occupation"]);
    $contact = $data_fetched->filter_data($_POST["Mobile1"]);
    $Current_Class = $data_fetched->filter_data($_POST["CClass"]);

    // $AWR  =  $data_fetched->filter_data($_POST["AWR"]);
    // $Nationality  =  $data_fetched->filter_data($_POST["Nationality"]);
    // $Religion  =  $data_fetched->filter_data($_POST["Religion"]);
    // $Disabilities  =  $data_fetched->filter_data($_POST["Disabilities"]);
    // $DOB_in_Words  =  $data_fetched->filter_data($_POST["DOBInWords"]);
    // $Form_B  =  $data_fetched->filter_data($_POST["Form_B"]);
    // $Father_Alive  =  $data_fetched->filter_data($_POST["Father_Alive"]);
    // $Father_Qualification  =  $data_fetched->filter_data($_POST["Qualification"]);
    // $Mother_Qualification  =  $data_fetched->filter_data($_POST["MotherQualification"]);
    // $Guardian_Name  =  $data_fetched->filter_data($_POST["Guardian_Name"]);
    // $Guardian_CNIC  =  $data_fetched->filter_data($_POST["Guardian_CNIC"]);
    // $District  =  $data_fetched->filter_data($_POST["District"]);
    // $Tehsil  =  $data_fetched->filter_data($_POST["Tehsil"]);
    // $UnionCouncil  =  $data_fetched->filter_data($_POST["UC"]);
    // $Village  =  $data_fetched->filter_data($_POST["Village"]);
    // $Mohallah  =  $data_fetched->filter_data($_POST["Mohallah"]);
    // $Mobile_Emergency  =  $data_fetched->filter_data($_POST["Mobile1"]);
    // $Mobile_Alternate  =  $data_fetched->filter_data($_POST["Mobile2"]);
    

    // if ($data_fetched->checkDb('Form_B', $Form_B) > 0) {
    //     echo "FORM B Already Exist";
    // } elseif ($data_fetched->checkDb('AWR', $AWR) > 0) {
    //     echo "AWR Already Exist";
    // } else {
    $result = $data_fetched->InsertStudent($SchoolCode, $Silsila, $AdmissionDate, $Gender, $Student_Name, $DOB, $Father_Name, $Father_CNIC, $Father_Occupation, $contact, $Current_Class);

    if ($result === 1)
    {
        echo 1;
    }
    // }
    
}

if (isset($_POST['MODE']) && $_POST['MODE'] == "password_change")
{
    $password = $_POST['Pass'];
    $New_password = $_POST['New_Pass'];
    $Confirm_Password = $_POST['Confirm_Pass'];
    $result = $data_fetched->check_pass($SchoolCode, $password);
    if ($result > 0)
    {
        if ($New_password == $Confirm_Password)
        {
            $forgot = $data_fetched->update_pass($SchoolCode, $New_password);
            if ($forgot == '1')
            {
                echo "Password Updated";
            }
            else
            {
                echo "Something Went Worng";
            }
        }
        else
        {
            echo "New Password and Confirmed Password didn't Matched";
        }
    }
    else
    {
        echo "Invaild Password";
    }
}
if (isset($_POST['MODE']) && $_POST['MODE'] == "teacher_profile_model")
{
    $user_id = $_POST['user_id'];
    $row = $data_fetched->get_teacher_details($user_id);

    echo '
    <div class="row p-2 mb-2">
        <div class="col-2">Name :</div>
        <div class="col-3">' . $row['Teacher_Name'] . '</div>
        <div class="col-1 text-center">|</div>
        <div class="col-3">Father Name :</div>
        <div class="col-3">' . $row['Father_Name'] . '</div>
    </div>
    <div class="row p-2 mb-2">
        <div class="col-4">Qualification :</div>
        <div class="col-1">' . $row['Qualification'] . '</div>
        <div class="col-1 text-center">|</div>
        <div class="col-3">Subject :</div>
        <div class="col-3">' . $row['Subject'] . '</div>
    </div>
    <div class="row p-2 mb-2">
        <div class="col-2">Contact :</div>
        <div class="col-3">' . $row['Contact'] . '</div>
        <div class="col-1 text-center">|</div>
        <div class="col-2">CNIC :</div>
        <div class="col-3">' . $row['CNIC'] . '</div>
    </div>
    <div class="row p-2 mb-2">
        <div class="col-3">Gender :</div>
        <div class="col-2">' . $row['Gender'] . '</div>
        <div class="col-1 text-center">|</div>
    </div>
   
    ';

}
if (isset($_POST['MODE']) && $_POST['MODE'] == "profile_model")
{
    $user_id = $_POST['user_id'];
    $row = $data_fetched->get_user_details($user_id);

    echo '
    <div class="row p-2 mb-2">
        <div class="col-2">Name :</div>
        <div class="col-3">' . $row['Student_Name'] . '</div>
        <div class="col-1 text-center">|</div>
        <div class="col-3">Father Name :</div>
        <div class="col-3">' . $row['Father_Name'] . '</div>
    </div>
    <div class="row p-2 mb-2">
        <div class="col-2">AWR :</div>
        <div class="col-3">' . $row['AWR'] . '</div>
        <div class="col-1 text-center">|</div>
        <div class="col-3">Admission Date :</div>
        <div class="col-3">' . $row['Admission_Date'] . '</div>
    </div>
    <div class="row p-2 mb-2">
        <div class="col-2">Gender :</div>
        <div class="col-3">' . $row['Gender'] . '</div>
        <div class="col-1 text-center">|</div>
        <div class="col-3">Nationality :</div>
        <div class="col-3">' . $row['Nationality'] . '</div>
    </div>
    <div class="row p-2 mb-2">
        <div class="col-2">Religion :</div>
        <div class="col-3">' . $row['Religion'] . '</div>
        <div class="col-1 text-center">|</div>
        <div class="col-3">Disability :</div>
        <div class="col-3">' . $row['Disabilities'] . '</div>
    </div>
    <div class="row p-2 mb-2">
        <div class="col-2">Father Alive :</div>
        <div class="col-3">' . $row['Father_Alive'] . '</div>
        <div class="col-1 text-center">|</div>
        <div class="col-3">Father CNIC :</div>
        <div class="col-3">' . $row['Father_CNIC'] . '</div>
    </div>
    <div class="row p-2 mb-2">
        <div class="col-2">Form B :</div>
        <div class="col-3">' . $row['Form_B'] . '</div>
        <div class="col-1 text-center">|</div>
        <div class="col-3">Father Name :</div>
        <div class="col-3">' . $row['Student_Name'] . '</div>
    </div>
    <div class="row p-2 mb-2">
        <div class="col-2">Emergency# :</div>
        <div class="col-3">' . $row['Mobile_Emergency'] . '</div>
        <div class="col-1 text-center">|</div>
        <div class="col-3">Alternate# :</div>
        <div class="col-3">' . $row['Mobile_Alternate'] . '</div>
    </div>
    ';

}
if (isset($_POST['MODE']) && $_POST['MODE'] == "Facilities_update")
{
    $Rooms = $data_fetched->filter_data($_POST["Rooms"]);
    $Status = $data_fetched->filter_data($_POST["Status"]);
    $Ownership = $data_fetched->filter_data($_POST["Ownership"]);
    $RoomUse = $data_fetched->filter_data($_POST["RoomUse"]);
    $BoundryWall = $data_fetched->filter_data($_POST["BoundryWall"]);
    $ExtraSpace = $data_fetched->filter_data($_POST["ExtraSpace"]);
    $Ventilation = $data_fetched->filter_data($_POST["Ventilation"]);
    $Electricity = $data_fetched->filter_data($_POST["Electricity"]);
    $Solar = $data_fetched->filter_data($_POST["Solar"]);
    $Lights = $data_fetched->filter_data($_POST["Lights"]);
    $Toilet = $data_fetched->filter_data($_POST["Toilet"]);
    $Fans = $data_fetched->filter_data($_POST["Fans"]);
    $Water = $data_fetched->filter_data($_POST["Water"]);
    $Veranda = $data_fetched->filter_data($_POST["Veranda"]);
    $Playground = $data_fetched->filter_data($_POST["Playground"]);
    $TeacherChair = $data_fetched->filter_data($_POST["TeacherChair"]);
    $TeacherTable = $data_fetched->filter_data($_POST["TeacherTable"]);
    $Cupboard = $data_fetched->filter_data($_POST["Cupboard"]);
    $BlackBoard = $data_fetched->filter_data($_POST["BlackBoard"]);
    $StudentChairs = $data_fetched->filter_data($_POST["StudentChairs"]);
    $WaterCooler = $data_fetched->filter_data($_POST["WaterCooler"]);
    $Mats = $data_fetched->filter_data($_POST["Mats"]);
    $SchoolBell = $data_fetched->filter_data($_POST["SchoolBell"]);
    $TLM = $data_fetched->filter_data($_POST["TLM"]);

    $result = $data_fetched->UpdateFacilities($SchoolCode, $Rooms, $Status, $Ownership, $RoomUse, $BoundryWall, $ExtraSpace, $Ventilation, $Electricity, $Solar, $Lights, $Toilet, $Fans, $Water, $Veranda, $Playground, $TeacherChair, $TeacherTable, $Cupboard, $BlackBoard, $StudentChairs, $WaterCooler, $Mats, $SchoolBell, $TLM);

    if ($result === 1)
    {
        echo 1;
    }
}

if (isset($_POST['MODE']) && $_POST['MODE'] == "enrollment_update")
{

    $Nursery_Boys = $data_fetched->filter_data($_POST["Nursery_Boys"]);
    $Nursery_Girls = $data_fetched->filter_data($_POST["Nursery_Girls"]);

    $Four_Boys = $data_fetched->filter_data($_POST["Four_Boys"]);
    $Four_Girls = $data_fetched->filter_data($_POST["Four_Girls"]);

    $KG_Boys = $data_fetched->filter_data($_POST["KG_Boys"]);
    $KG_Girls = $data_fetched->filter_data($_POST["KG_Girls"]);

    $Five_Boys = $data_fetched->filter_data($_POST["Five_Boys"]);
    $Five_Girls = $data_fetched->filter_data($_POST["Five_Girls"]);

    $Five_Boys = $data_fetched->filter_data($_POST["Five_Boys"]);
    $Five_Girls = $data_fetched->filter_data($_POST["Five_Girls"]);

    $One_Boys = $data_fetched->filter_data($_POST["One_Boys"]);
    $One_Girls = $data_fetched->filter_data($_POST["One_Girls"]);

    $total_Boys = $data_fetched->filter_data($_POST["total_Boys"]);
    $total_Girls = $data_fetched->filter_data($_POST["total_Girls"]);

    $Two_Boys = $data_fetched->filter_data($_POST["Two_Boys"]);
    $Two_Girls = $data_fetched->filter_data($_POST["Two_Girls"]);

    $Afghan_Boys = $data_fetched->filter_data($_POST["Afghan_Boys"]);
    $Afghan_Girls = $data_fetched->filter_data($_POST["Afghan_Girls"]);

    $Three_Boys = $data_fetched->filter_data($_POST["Three_Boys"]);
    $Three_Girls = $data_fetched->filter_data($_POST["Three_Girls"]);

    $Disable_Boys = $data_fetched->filter_data($_POST["Disable_Boys"]);
    $Disable_Girls = $data_fetched->filter_data($_POST["Disable_Girls"]);

    $result = $data_fetched->update_enrollment($SchoolCode, $Nursery_Boys, $Nursery_Girls, $KG_Boys, $KG_Girls, $One_Boys, $One_Girls, $Two_Boys, $Two_Girls, $Three_Boys, $Three_Girls, $Four_Boys, $Four_Girls, $Five_Boys, $Five_Girls, $total_Boys, $total_Girls, $Afghan_Boys, $Afghan_Girls, $Disable_Girls, $Disable_Boys);
    if ($result === 1)
    {
        header("Location: dashboard.php?step=1");
    }
}

if (isset($_POST['update_student']))
{
    $AdmissionDate = $data_fetched->filter_data($_POST["DOA"]);
    $AdmissionClass = $data_fetched->filter_data($_POST["AdmissionClass"]);
    $AWR = $data_fetched->filter_data($_POST["AWR"]);
    $Silsila = $data_fetched->filter_data($_POST["silsila"]);
    $AutoID = $data_fetched->filter_data($_POST["AutoID"]);
    $Gender = $data_fetched->filter_data($_POST["Gender"]);
    $Nationality = $data_fetched->filter_data($_POST["Nationality"]);
    $Religion = $data_fetched->filter_data($_POST["Religion"]);
    $Student_Name = $data_fetched->filter_data($_POST["StudentName"]);
    $Current_Class = $data_fetched->filter_data($_POST["CClass"]);
    $Disabilities = $data_fetched->filter_data($_POST["Disabilities"]);
    $DOB = $data_fetched->filter_data($_POST["DOB"]);
    $DOB_in_Words = $data_fetched->filter_data($_POST["DOBInWords"]);
    $Form_B = $data_fetched->filter_data($_POST["Form_B"]);
    $Father_Name = $data_fetched->filter_data($_POST["FatherName"]);
    $Father_CNIC = $data_fetched->filter_data($_POST["Father_CNIC"]);
    $Father_Alive = $data_fetched->filter_data($_POST["Father_Alive"]);
    $Father_Occupation = $data_fetched->filter_data($_POST["Occupation"]);
    $Father_Qualification = $data_fetched->filter_data($_POST["Qualification"]);
    $Mother_Qualification = $data_fetched->filter_data($_POST["MotherQualification"]);
    $Guardian_Name = $data_fetched->filter_data($_POST["Guardian_Name"]);
    $Guardian_CNIC = $data_fetched->filter_data($_POST["Guardian_CNIC"]);
    $District = $data_fetched->filter_data($_POST["District"]);
    $Tehsil = $data_fetched->filter_data($_POST["Tehsil"]);
    $UnionCouncil = $data_fetched->filter_data($_POST["UC"]);
    $Village = $data_fetched->filter_data($_POST["Village"]);
    $Mohallah = $data_fetched->filter_data($_POST["Mohallah"]);
    $Mobile_Emergency = $data_fetched->filter_data($_POST["Mobile1"]);
    $Mobile_Alternate = $data_fetched->filter_data($_POST["Mobile2"]);

    $old_student_image = "";
    $old_slc_image = "";
    if (isset($_POST["old_student_image"]))
    {
        $old_student_image = $data_fetched->filter_data($_POST["old_student_image"]);
    }
    if (isset($_POST["old_slc_image"]))
    {
        $old_slc_image = $data_fetched->filter_data($_POST["old_slc_image"]);
    }
    $student_image = "";
    $slc_image = "";

    if (isset($_FILES['photoimg_student_image']) && $_FILES["photoimg_student_image"]["size"] > 0)
    {
        //image code
        // if(file_exists("../uploads/".$old_student_image)){
        //     unlink("../uploads/".$old_student_image);
        // }else{
        $student_image = $data_fetched->upload_img($_FILES['photoimg_student_image']);
        // }
        
    }

    if (isset($_FILES['SLC_student_image']) && $_FILES["SLC_student_image"]["size"] > 0)
    {
        //image code
        $slc_image = $data_fetched->upload_img($_FILES['SLC_student_image']);
    }

    $result = $data_fetched->update_Student($AutoID, $Silsila, $SchoolCode, $AdmissionDate, $AWR, $Gender, $Nationality, $Religion, $AdmissionClass, $Student_Name, $Current_Class, $Disabilities, $DOB, $DOB_in_Words, $Form_B, $Father_Name, $Father_CNIC, $Father_Alive, $Father_Occupation, $Father_Qualification, $Mother_Qualification, $Guardian_Name, $Guardian_CNIC, $District, $Tehsil, $UnionCouncil, $Village, $Mohallah, $Mobile_Emergency, $Mobile_Alternate, $student_image, $slc_image);

    if ($result === 1)
    {
        echo 1;
    }
}

if (isset($_POST['MODE']) && $_POST['MODE'] == "Basic_update")
{
    $district = $data_fetched->filter_data($_POST['District']);
    $NA = $data_fetched->filter_data($_POST['NA']);
    $PK = $data_fetched->filter_data($_POST['PK']);
    $Tehsil = $data_fetched->filter_data($_POST['Tehsil']);
    $UC = $data_fetched->filter_data($_POST['UC']);
    $VC = $data_fetched->filter_data($_POST['VC']);
    $Village = $data_fetched->filter_data($_POST['Village']);
    $Mohallah = $data_fetched->filter_data($_POST['Mohalla']);
    $landmark = $data_fetched->filter_data($_POST['landmark']);
    $Xcord = $data_fetched->filter_data($_POST['X-cord']);
    $Ycord = $data_fetched->filter_data($_POST['Y-cord']);
    $Program = $data_fetched->filter_data($_POST['Program']);
    $CS_Name = $data_fetched->filter_data($_POST['CS_Name']);
    $CS_Code = $data_fetched->filter_data($_POST['CS_Code']);
    $CS_Type = $data_fetched->filter_data($_POST['CS_Type']);
    $Status = $data_fetched->filter_data($_POST['status']);
    $Building_Ownership = $data_fetched->filter_data($_POST['Building_Ownership']);
    $Gender = $data_fetched->filter_data($_POST['gender']);
    $Building_Structure = $data_fetched->filter_data($_POST['buildling_structure']);
    $School_Level = $data_fetched->filter_data($_POST['School_Level']);
    $Area = $data_fetched->filter_data($_POST['area']);
    $Transport = $data_fetched->filter_data($_POST['Transport']);

    $data = $data_fetched->update_all_basic($SchoolCode, $district, $NA, $PK, $Tehsil, $UC, $VC, $Village, $Mohallah, $landmark, $Xcord, $Ycord, $Program, $CS_Name, $CS_Code, $CS_Type, $Status, $Building_Ownership, $Gender, $Building_Structure, $School_Level, $Area, $Transport);

    if ($data)
    {
        echo "1";
    }
}
if (isset($_POST['MODE']) && $_POST['MODE'] == "teacherFormFilled")
{

    // $count_db =  $data_fetched->filter_data($_POST['count']);
    // for ($count = 0; $count < $count_db; $count++) {
    $Teacher_Name = $data_fetched->filter_data($_POST["Teacher"]);
    $Father_Name = $data_fetched->filter_data($_POST["Fname"]);
    $Gender = $data_fetched->filter_data($_POST["Gender"]);
    $DOB = $data_fetched->filter_data($_POST["Dob"]);
    $Degree = $data_fetched->filter_data($_POST["last_Degree"]);
    $Subject = $data_fetched->filter_data($_POST["Subject"]);
    $Qualification = $data_fetched->filter_data($_POST["Qualification"]);
    $Experience = $data_fetched->filter_data($_POST["Experience"]);
    $CNIC = $data_fetched->filter_data($_POST["CNIC"]);
    $Bank_Name = $data_fetched->filter_data($_POST["Bank_Name"]);
    $Bank_Code = $data_fetched->filter_data($_POST["Branch_Code"]);
    $Account = $data_fetched->filter_data($_POST["Account"]);
    $Disability = $data_fetched->filter_data($_POST["Disability"]);
    $Marital_Status = $data_fetched->filter_data($_POST["Marital_Status"]);
    $Contact = $data_fetched->filter_data($_POST["Contact"]);
    $Whatsapp = $data_fetched->filter_data($_POST["Whatsapp"]);

    $result = $data_fetched->UpdateTeacher($SchoolCode, $Teacher_Name, $Father_Name, $Gender, $DOB, $Degree, $Subject, $Qualification, $Experience, $CNIC, $Bank_Name, $Bank_Code, $Account, $Disability, $Marital_Status, $Contact, $Whatsapp);

    // }
    
}

if (isset($_POST['MODE']) && $_POST['MODE'] == "addAttendence")
{
    $teacherId = $_POST['teacherId'];
    $attendence = $_POST['teacherAttendence'];

    $date = date('Y-m-d');

    $result = $data_fetched->checkTeachertodayAttendence($SchoolCode, $date);

    if ($result == 0)
    {

        for ($i = 0;$i < sizeof($teacherId);$i++)
        {
            for ($y = 0;$y < sizeof($attendence);$y++)
            {
                if ($i == $y)
                {
                    $result = $data_fetched->insertTeacherattendence($SchoolCode, $teacherId[$i], $attendence[$y], $date);

                }
            }
        }
        if ($result)
        {
            echo "1";
        }
    }
    else
    {
        echo "attendence already marked";
    }
}

//for student
if (isset($_POST['MODE']) && $_POST['MODE'] == "addStudentAttendence")
{
    $teacherId = $_POST['studentId'];
    $attendence = $_POST['studentAttendence'];
    $class = $_POST['class'];

    $date = date('Y-m-d');
    $result = $data_fetched->checkStudenttodayAttendence($SchoolCode, $date, $class);

    if ($result == 0)
    {

        for ($i = 0;$i < sizeof($teacherId);$i++)
        {
            for ($y = 0;$y < sizeof($attendence);$y++)
            {
                if ($i == $y)
                {
                    $result = $data_fetched->insertStudentattendence($SchoolCode, $teacherId[$i], $class, $attendence[$y], $date);

                }
            }
        }
        if ($result)
        {
            echo "1";
        }
    }
    else
    {
        echo "data Already inserted";
    }
}

if (isset($_POST['MODE']) && $_POST['MODE'] == "fetchstudentwithclass")
{

    $class = $_POST['class'];

    $result = $data_fetched->fetchclassstudent($SchoolCode, $class);
    $output = "";
    foreach ($result as $row)
    {

        $output .= ' <tr role="row"><td>' . $row['AutoID'] . '</td>
                                      <input type="hidden" id="studentId" name="studentId[]" value="' . $row['AutoID'] . '" />
                                        <td> ' . $row['ChildName'] . '</td>
                                        
                                        <td> ' . $row['ClassName'] . '</td>
                                        <td>' . $row['FatherName'] . '</td>
                                        <input type="hidden" name="class" value="' . $class . '">
                                        <td>
                                            <select class="form-control form-control-sm" name="studentAttendence[]">
                                                <option value="0">Present</option>
                                                <option value="1">Leave</option>
                                                <option value="2">Absent</option>
                                            </select>
                                        </td>
                                    </tr> ';

    }

    echo $output;

}

if (isset($_POST['MODE']) && $_POST['MODE'] == "fetchtstudentAttendence")
{
    $fromDate = $_POST['fromDate'];
    $toDate = $_POST['toDate'];

    $result = $data_fetched->fetchsdate($SchoolCode, $toDate, $fromDate);
    $output = " ";
    
    if (!empty($result))
    {

        $output .= '<div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div id="multi-column-ordering_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="dt--top-section">
                        <div class="row">
                            <div class="col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center">
                                <div class="dataTables_length" id="multi-column-ordering_length">
                                    <h5>Attendence sheet from ' . $fromDate . ' to ' . $toDate . '</h5>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="multi-column-ordering" class="table table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="multi-column-ordering_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc px-0" style="width: 80px;">SNo</th>
                                    <th class="sorting" style="width: 200px;">Student Name</th>';
                                    foreach ($result as $row)
                                    {
                                        $output .= '<th class="sorting" style="width: 200px;">' . $row['date'] . '</th>';
                                    }                                    
                            $output.= '   </tr>
                            </thead>
                            <tbody>';

        $result1 = $data_fetched->fetchsattendence($SchoolCode, $toDate, $fromDate);

        foreach ($result1 as $r)
        {
         
            $output .= '
                                <tr role="row">
                                    <td>' . $r['Student_Id'] . '</td>
                                    <td>' . $r['ChildName'] . '</td>';
                                
                                    $result2 = $data_fetched->fetchsattendencebyid($r['Student_Id'], $_SESSION['SchoolCode'], $toDate, $fromDate);
                                   
            $flag = 0;

            foreach ($result as $qq)
            {
                
                foreach ($result2 as $rr)
                {
                     if($qq['date']==$rr['date']){
                         $flag=1;
                         break;
                     }
                   
                    
                   

                }
                if($flag==1){
                    if ($rr['status']=='0') {
                                    $status="Present";
                                } elseif ($rr['status']=='1') {
                                    $status="Leave";
                                } elseif ($rr['status']=='2') {
                                    $status='Absent';
                                }
                                $output.='<td>'.$status.'</td>';
                                $flag=0;
                }else{
                    $output.='<td>not marked</td>';
                }
            }
                           $output.='        
                                   
                                   
                                </tr>';

        }
        $output .= '</tbody>
                        </table>
                    </div>
                    <button onclick="PrintAttendence()" class="btn btn-primary" id="printPage"> Print Attendence</button>
                </div>
            </div>
        </div>
    </div>';
    }
    echo $output;

}
if (isset($_POST['MODE']) && $_POST['MODE'] == "fetchteacherAttendence")
{
    $fromDate = $_POST['fromDate'];
    $toDate = $_POST['toDate'];
    $result = $data_fetched->fetchdate($SchoolCode, $toDate, $fromDate);
    $output = " ";

    if (!empty($result))
    {

        $output .= '<div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div id="multi-column-ordering_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="dt--top-section">
                        <div class="row">
                            <div class="col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center">
                                <div class="dataTables_length" id="multi-column-ordering_length">
                                    <h5>Attendence sheet from ' . $fromDate . ' to ' . $toDate . '</h5>


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
                                    <th class="sorting" style="width: 200px;">Teacher Name</th>';
        foreach ($result as $row)
        {
            $output .= '<th class="sorting" style="width: 200px;">' . $row['date'] . '</th>';
        }

        $output .= '
                                    
                                </tr>
                            </thead>
                            <tbody>';

        $result1 = $data_fetched->fetchAttendence($_SESSION['SchoolCode'], $toDate, $fromDate);

        foreach ($result1 as $r)
        {

            $output .= '
                                <tr role="row">
                                    <td>' . $r['Teacher_Id'] . '</td>
                                    <td>' . $r['School_Code'] . '</td>
                                    <td>' . $r['Teacher_Name'] . '</td>';

            $result2 = $data_fetched->fetchTeacherAttendenceByID($r['Teacher_Id'], $_SESSION['SchoolCode'], $toDate, $fromDate);






            $flag = 0;

            foreach ($result as $qq)
            {
                
                foreach ($result2 as $rr)
                {
                     if($qq['date']==$rr['date']){
                         $flag=1;
                         break;
                     }
                   
                    
                   

                }
                if($flag==1){
                    if ($rr['status']=='0') {
                                    $status="Present";
                                } elseif ($rr['status']=='1') {
                                    $status="Leave";
                                } elseif ($rr['status']=='2') {
                                    $status='Absent';
                                }
                                $output.='<td>'.$status.'</td>';
                                $flag=0;
                }else{
                    $output.='<td>not marked</td>';
                }
            }
         
            

            $output .= '    </tr>';
        }
        $output .= '</tbody>
                        </table>
                    </div>
                    <button onclick="PrintAttendence()" class="btn btn-primary" id="printPage"> Print Attendence</button>
                </div>
            </div>
        </div>
    </div>';
    }
    echo $output;

}
// if (isset($_POST['MODE']) && $_POST['MODE'] == "fetchstudentAttendence") {
//     $fromDate = $_POST['fromDate'];
//     $toDate = $_POST['toDate'];
//     $result=$data_fetched->fetchstudentAttendence($SchoolCode, $toDate, $fromDate);
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
//                                     <h5>Attendence sheet from '.$fromDate.' to '.$toDate.'</h5>


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
//                                     <th class="sorting" style="width: 200px;">Teacher Name</th>
//                                     <th class="sorting" style="width: 200px;">Status</th>
//                                 </tr>
//                             </thead>
//                             <tbody>';


//                             $result1=$data_fetched->fetchAttendence($SchoolCode, $toDate, $fromDate);
//                                     foreach($result1 as $r) {
//                                         if($r['status']=='0'){
//                                             $status="Present";
//                                         }elseif($r['status']=='1'){
//                                             $status="Leave";
//                                         }elseif($r['status']=='2'){
//                                             $status='Absent';
//                                         }
//                                 $output.='
//                                 <tr role="row">
//                                     <td>'.$r['Teacher_Id'].'</td>
//                                     <td>'. $r['School_Code'].'</td>
//                                     <td>'. $r['Teacher_Name'].'</td>
//                                     <td>'.$status.'</td>


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
//     }
// echo $output;
// }
if (isset($_POST['contactus']))
{
    $from = $data_fetched->filter_data($_POST["from"]);
    $to = $data_fetched->filter_data($_POST["to"]);
    $subject = $data_fetched->filter_data($_POST["subject"]);
    $msg = $data_fetched->filter_data($_POST["description"]);
    $contact = $data_fetched->filter_data($_POST["contact"]);

    $result = $data_fetched->insertContactUs($SchoolCode, $from, $to, $subject, $msg, $contact, $_FILES['attachment']);

    $to = "complaints@esef.org.pk";

    $message = "<h1>" . $from . "</h1>";
    $message .= "<b>" . $msg . "</b>";
    $message .= "<br><p>" . $contact . "</p>";

    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";

    $retval = mail($to, $subject, $message, $header);

    if ($retval == true)
    {
        echo "1";
    }
    else
    {
        echo "Message could not be sent...";
    }
    if ($result === 1)
    {
        header("Location: contact.php");
    }

    // print_r($_POST);
    // if(isset($_FILES['attachment']) && !empty($_FILES['attachment']['name'])){
    //     $attachment = $data_fetched->upload_img($_FILES['attachment']);
    //     if($attachment){
    //         $result = $data_fetched->insertContactUs($from, $to, $subject, $msg, $contact, $attachment);
    //         if ($result === 1) {
    //             header("Location: contact.php");
    //         }
    //     }
    // }else{
    //     $attachment = null;
    //     $result = $data_fetched->insertContactUs($from, $to, $subject, $msg, $contact, $attachment);
    //     if ($result === 1) {
    //         header("Location: contact.php");
    //     }
    // }
    // $attachment = $data_fetched->upload_img();
    
}
if (isset($_POST['MODE']) && $_POST['MODE'] == "delete_student")
{
    $studentId = $data_fetched->filter_data($_POST["Student_id"]);
    $result = $data_fetched->delete_student($SchoolCode, $studentId);

}
if (isset($_POST['MODE']) && $_POST['MODE'] == "delete_teacher")
{
    $Teacher_id = $data_fetched->filter_data($_POST["Teacher_id"]);
    $result = $data_fetched->delete_Teacher($SchoolCode, $Teacher_id);

}
if (isset($_POST["MODE"]) && $_POST['MODE'] == "fetchStudent")
{
    $class = $data_fetched->test_input($_POST['classID']);
    $result = $data_fetched->FetchStudentByClassAndSchoolCode($class, $_SESSION['SchoolCode']);
    $return_arr = [];

    foreach ($result as $row)
    {
        $awr = $row['AWR'];
        $fatherName = $row['FatherName'];
        $studentName = $row['ChildName'];
        $gender = $row['Gender'];
        $autoID = $row['AutoID'];

        $return_arr[] = array(
            "awr" => $awr,
            "fatherName" => $fatherName,
            "studentName" => $studentName,
            "gender" => $gender,
            "autoid" => $autoID
        );
    }
    echo json_encode($return_arr);
}
if (isset($_POST['MODE']) && $_POST['MODE'] == "promotion")
{

    if (isset($_POST['schoolName']))
    {
        foreach ($_POST['Id'] as $key => $value)
        {
            $freshContact = $data_fetched->test_input($_POST['schoolName']);
            $schoolName = $data_fetched->test_input($_POST['schoolName']);
            $class = $data_fetched->getstudentclassbyid($value);
            $promotion = $class['CClass'] + 1;

            if ($data_fetched->updateStudentClass($value, $promotion))
            {
                if ($data_fetched->after5classpromotion($value, $_SESSION['SchoolCode'], $freshContact, $schoolName))
                {
                    header('Location: ../students/GCSPromotions.php?alert=success');
                }
                else
                {
                    print_r($_POST);
                    exit();
                    header('Location: ../students/GCSPromotions.php?alert=fail');

                }
            }
            else
            {
                header('Location: ../students/GCSPromotions.php?alert=fail');

            }

        }

    }
    else
    {

        foreach ($_POST['Id'] as $key => $value)
        {

            $class = $data_fetched->getstudentclassbyid($value);
            $promotion = $class['CClass'] + 1;
            if ($data_fetched->updateStudentClass($value, $promotion))
            {
                header('Location: ../students/GCSPromotions.php?alert=success');
            }
            else
            {
                header('Location: ../students/GCSPromotions.php?alert=fail');

            }
        }
    }

}
if (isset($_POST['MODE']) && $_POST['MODE'] == "leaveFormSubmit")
{
    $file = $data_fetched->upload_img($_FILES['file']);
    $teacherID = $_POST['teacherID'];
    $leaveFrom = $_POST['leaveForm'];
    $leaveTo = $_POST['leaveTo'];
    $leavetype = $_POST['leaveType'];
    if ($data_fetched->addLeave($_SESSION['SchoolCode'], $leaveFrom, $leaveTo, $teacherID, $leavetype, $file))
    {
        echo "hi";
    }
    else
    {
        echo "bye";
    }

}

if(isset($_POST['MODE']) && $_POST['MODE']=="VEC_MEETING"){
    $meeting_date = $data_fetched->test_input($_POST['meeting_date']);
    $meeting_place = $data_fetched->test_input($_POST['meeting_place']);
    $meeting_no = $data_fetched->test_input($_POST['meeting_no']);
    $Proceedings = $data_fetched->test_input($_POST['Proceedings']);
    $Agenda = $data_fetched->test_input($_POST['Agenda']);
    $present = $data_fetched->test_input($_POST['present']);
    $absent = $data_fetched->test_input($_POST['absent']);

    $data_fetched->Vec_Meetings($SchoolCode, $meeting_date, $meeting_place, $meeting_no, $Agenda, $Proceedings, $present, $absent, $_FILES['attendenceSheet'], $_FILES['groupPhoto']);
}
if(isset($_POST['MODE']) && $_POST['MODE']=="improvement_plan"){
    $date = $data_fetched->test_input($_POST['date']);
    $task = $data_fetched->test_input($_POST['task']);
    $responsibilty = $data_fetched->test_input($_POST['responsibilty']);
    $cost = $data_fetched->test_input($_POST['cost']);
    $deadline = $data_fetched->test_input($_POST['deadline']);
    $status = $data_fetched->test_input($_POST['status']);

    if($status == '0'){
        $stat = "Completed";
    }elseif($status == '1'){
        $stat = "In Progress";
    }else{
        $stat = "Not Started";
    }

    $data_fetched->improvement_plan($SchoolCode, $date, $task, $responsibilty, $cost, $deadline, $stat);
}
if(isset($_POST['MODE']) && $_POST['MODE']=="delete_School_Improvement_plan"){
    $School_Improvement_plan_id = $data_fetched->test_input($_POST['School_Improvement_plan_id']);

    $data_fetched->delete_School_Improvement_plan($SchoolCode, $School_Improvement_plan_id);
}
if(isset($_POST['MODE']) && $_POST['MODE']=="visitor"){
    $datee = $data_fetched->test_input($_POST['datee']);
    $namee = $data_fetched->test_input($_POST['namee']);
    $designation = $data_fetched->test_input($_POST['designation']);
    $organization = $data_fetched->test_input($_POST['organization']);
    $cnumber = $data_fetched->test_input($_POST['cnumber']);
    $purpose = $data_fetched->test_input($_POST['purpose']);
    $remarks = $data_fetched->test_input($_POST['remarks']);

    $data_fetched->visitor($SchoolCode, $datee, $namee, $designation, $organization, $cnumber, $purpose, $remarks);
}

if(isset($_POST['AddVecMember'])){
    $name = $data_fetched->test_input($_POST['name']);
    $contact = $data_fetched->test_input($_POST['contact']);
    $designation = $data_fetched->test_input($_POST['designation']);
    $category = $data_fetched->test_input($_POST['category']);
    $cnic = $data_fetched->test_input($_POST['CNIC']);
    $data_fetched->InsertVECMember($name	,$cnic	,$contact	,$designation	,$category	,$SchoolCode  );
    header("Location: ../vec/index.php");
     
    

}