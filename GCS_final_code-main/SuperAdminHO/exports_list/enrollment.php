<?php
ob_start();
include 'auth.php';
$excel = new exports();

session_start();
if (!isset($_SESSION['isSuperAdmin'])) {
    header("Location: ../../index.php");
    exit();
}

?>
<table border="1">
    <tr>
        <th>SNO.</th>
        <th>District</th>
        <th>Tehsil</th>
        <th>UC</th>
        <th>VC</th>
        <th>NA</th>
        <th>PK</th>
        <th>Village</th>
        <th>Mohallah</th>
        <th>Landmark </th>
        <th>X-Cord</th>
        <th>Y-Cord</th>
        <th>School Exists</th>
        <th>CS Name </th>
        <th>CS Code</th>
        <th>CS Type</th>
        <th>Status</th>
        <th>Building Ownership</th>
        <th>Gender</th>
        <th>Building Structure </th>
        <th>School Level</th>
        <th>Area</th>
        <th>Transport Required </th>
        
        <th>Total Boys</th>
        <th>Total Girls</th>
    </tr>
    <?php
$no = 1;
$data = $excel->ExportToExcel();
foreach ($data as $row) {
    echo '<tr>';
    echo '<td>'.$no.'</td>';
    echo '<td>'.$row['DistrictName'].'</td>';
    echo '<td>'.$row['TehsilName'].'</td>';
    echo '<td>'.$row['UnionCouncilName'].'</td>';
    echo '<td>'.$row['VC'].'</td>';
    echo '<td>'.$row['NA'].'</td>';
    echo '<td>'.$row['PK'].'</td>';
    echo '<td>'.$row['Village'].'</td>';
    echo '<td>'.$row['Mohallah'].'</td>';
    echo '<td>'.$row['Landmark'].'</td>';
    echo '<td>'.$row['X_Cord'].'</td>';
    echo '<td>'.$row['Y_Cord'].'</td>';
    echo '<td>'.$row['Program'].'</td>';
    echo '<td>'.$row['CS_Name'].'</td>';
    echo '<td>'.$row['CS_Code'].'</td>';
    echo '<td>'.$row['CS_Type'].'</td>';

    if ($row['SchoolStatus'] == "1") {
        $status =  "Non-Functional";
    } elseif ($row['SchoolStatus'] == "0") {
        $status = "Functional";
    } else {
        $status = "";
    }
    echo '<td>'.$status.'</td>';
    if ($row['Building_Ownership'] == "0") {
        $building = "Govt";
    } elseif ($row['Building_Ownership'] == "2") {
        $building = "Communal";
    } elseif ($row['Building_Ownership'] == "3") {
        $building = "Personal / Rental";
    } else {
        $building ="";
    }
    echo '<td>'.$building.'</td>';
    if ($row['Gender'] == '0') {
        $Gender = "Boys";
    } elseif ($row['Gender'] == '1') {
        $Gender = "Girls";
    } elseif ($row['Gender'] == '2') {
        $Gender = "Co-Ed";
    } else {
        $Gender = "";
    }
    echo '<td>'.$Gender.'</td>';
    echo '<td>'.$row['Building_Structure'].'</td>';
    echo '<td>'."Primary".'</td>';
    if ($row['Transport'] == "0") {
        $Transport = 'All Vehicles';
    } elseif ($row['Transport'] == "1") {
        $Transport = 'Small Vehicles';
    } elseif ($row['Transport'] == "2") {
        $Transport = '4x4 Vehicles';
    } elseif ($row['Transport'] == "3") {
        $Transport = 'Not Accessible / By Foot';
    } else {
        $Transport = "";
    }
    echo '<td>'.$row['Area'].'</td>';
    echo '<td>'.$Transport.'</td>';
    $SchoolCode = $row['SchoolCode'];
    $student = $excel->enrollment($SchoolCode);
    
    // print_r($student);
    ?>
    <td>
    <?php echo $student['Nursery_Boys']+$student['KG_Boys']+$student['One_Boys']+$student['Two_Boys']+$student['Three_Boys']+$student['Four_Boys']+$student['Five_Boys'];?></td>
    <td>
    <?php echo $student['Nursery_Girls']+$student['KG_Girls']+$student['One_Girls']+$student['Two_Girls']+$student['Three_Girls']+$student['Four_Girls']+$student['Five_Girls'] 
    ?></td>
<?php 
    echo '</tr>';
    $no++;
}
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Excel_Schools_data.xls");

?>