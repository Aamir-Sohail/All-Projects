<?php
ob_start();
include 'auth.php';
$excel = new exports();

session_start();
if (!isset($_SESSION['isSuperAdmin']))
{
    header("Location: ../../index.php");
    exit();
}
if(isset($_GET['date'])){
    $Date = $_GET['date'];

?>
<table border="1">
    <tr>
        <th>SNO.</th>
        <th>School Code</th>
        <th>School Name</th>
        <th>District</th>
        <th>Status</th>
        <th>Total Teachers</th>
        <th>Present Teachers</th>
        <th>Absent Teachers</th>
    </tr>
        <?php
$no = 1;
$result=$excel->fetchteacherAttendence();
    $no = 1;
foreach ($result as $r)

{

    $district = $r['DistrictName'];
    $SchoolCode = $r['SchoolCode'];
    
    $present = $excel->Fetch_Teacher_Attendence_Present('esef_school_teacher_attendence', $SchoolCode, $Date);
    $absent = $excel->Fetch_Teacher_Attendence_Absent('esef_school_teacher_attendence', $SchoolCode, $Date);
    // $status = $excel->status_check('esef_school_teacher_attendence', $SchoolCode, $Date);
    if($present > 0 or $absent > 0){
        $status = "Marked";
    }else{
        $status = "UnMarked";
    }
    $teachers = $excel->Fetch_Teacher($SchoolCode);
    $SchoolName = $excel->Fetch_SchoolName($SchoolCode);
    $SchoolName = $r['CS_Name'];
    $output .= '
    <tr role="row">
        <td>' . $no++ . '</td>
        <td>' . $SchoolCode . '</td>
        <td>' . $SchoolName . '</td>
        <td>' . $district . '</td>
        <td>' . $status . '</td>
        <td>' . $teachers . '</td>
        <td>' . $present . '</td>
        <td>' . $absent . '</td>

       
    </tr>';
                               
}       
echo $output;
    
}
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Teachers_Attendence.xls");
?>
