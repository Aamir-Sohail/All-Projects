<?php
ob_start();
include 'auth.php';
$excel = new exports();


session_start();
if (!isset($_SESSION['isDPO'])) {
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
        <th>Rooms</th>
        <th>Status</th>
        <th>Ownership</th>
        <th>RoomUse</th>
        <th>BoundryWall</th>
        <th>ExtraSpace</th>
        <th>Ventilation</th>
        <th>Electricity</th>
        <th>Solar</th>
        <th>Lights</th>
        <th>Toilet</th>
        <th>Fans</th>
        <th>Water</th>
        <th>Veranda</th>
        <th>Playground</th>
        <th>TeacherChair</th>
        <th>TeacherTable</th>
        <th>Cupboard</th>
        <th>BlackBoard</th>
        <th>StudentChairs</th>
        <th>WaterCooler</th>
        <th>Mats</th>
        <th>SchoolBell</th>
        <th>TLM</th>
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
    echo '<td>'.$row['VCName'].'</td>';
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
    echo '<td>'.$row['Rooms'].'</td>';
    echo '<td>'.$row['Status'].'</td>';
    echo '<td>'.$row['Ownership'].'</td>';
    echo '<td>'.$row['RoomUse'].'</td>';
    echo '<td>'.$row['BoundryWall'].'</td>';
    echo '<td>'.$row['ExtraSpace'].'</td>';
    echo '<td>'.$row['Ventilation'].'</td>';
    echo '<td>'.$row['Electricity'].'</td>';
    echo '<td>'.$row['Solar'].'</td>';
    echo '<td>'.$row['Lights'].'</td>';
    echo '<td>'.$row['Toilet'].'</td>';
    echo '<td>'.$row['Fans'].'</td>';
    echo '<td>'.$row['Water'].'</td>';
    echo '<td>'.$row['Veranda'].'</td>';
    echo '<td>'.$row['Playground'].'</td>';
    echo '<td>'.$row['TeacherChair'].'</td>';
    echo '<td>'.$row['TeacherTable'].'</td>';
    echo '<td>'.$row['Cupboard'].'</td>';
    echo '<td>'.$row['BlackBoard'].'</td>';
    echo '<td>'.$row['StudentChairs'].'</td>';
    echo '<td>'.$row['WaterCooler'].'</td>';
    echo '<td>'.$row['Mats'].'</td>';
    echo '<td>'.$row['SchoolBell'].'</td>';
    echo '<td>'.$row['TLM'].'</td>';

    echo '</tr>';
    $no++;
}
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Excel_Schools_data.xls");

?>