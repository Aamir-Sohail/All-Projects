<?php
include 'auth.php';


$excel = new exports();
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Teacher.xls");
session_start();
if (!isset($_SESSION['isSuperAdmin'])) {
    header("Location: ../../index.php");
    exit();
}

 $data = $excel->Teacher();

 
if(empty($data)){
     header("Location: ../Teachers.php?alert=No_data");
    exit();
 }
?>
<table border="1">
    <tr>
        <th>SNO.</th> 
        <th>SchoolCode.</th> 
        <th>District</th>
        <th>Tehsil</th>
        <th>UC</th>
        <th>VC</th>
        <th>NA</th>
        <th>PK</th>
        <th>Teacher Name</th>
        <th>Father/Husband Name</th>
        <th>Program</th>
        <th>Gender</th>
        <th>DOB</th>
        <th>Degree</th>
        <th>Subject</th>
        <th>Qualification</th>
        <th>CNIC</th>
        <th>Disability</th>
        <th>Marital Status</th>
        <th>Contact#</th>
        <th>Whatsapp#</th>
    </tr>
    <?php
$no = 1;

foreach ($data as $row) {
    echo '<tr>';
    echo '<td>'.$no.'</td>';
    echo '<td>'.$row['SchoolCode'].'</td>';
    echo '<td>'.$row['DistrictName'].'</td>';
    echo '<td>'.$row['TehsilName'].'</td>';
    echo '<td>'.$row['UnionCouncilName'].'</td>';
    echo '<td>'.$row['VC'].'</td>';
    echo '<td>'.$row['NA'].'</td>';
    echo '<td>'.$row['PK'].'</td>';
    echo '<td>'.$row['Teacher_Name'].'</td>';
    echo '<td>'.$row['Father_Name'].'</td>';
    echo '<td>'.$row['Program'].'</td>';
    if($row['Gender'] =="0"){
        $gender = "Male";
    }else{
        $gender = "Female";
    }
    echo '<td>'.$gender.'</td>';
    echo '<td>'.$row['DOB'].'</td>';
    echo '<td>'.$row['Degree'].'</td>';
    echo '<td>'.$row['Subject'].'</td>';
    echo '<td>'.$row['Qualification'].'</td>';
    echo '<td>'.$row['CNIC'].'</td>';
    echo '<td>'.ucwords($row['Disability']).'</td>';
    echo '<td>'.$row['Marital_Status'].'</td>';
    echo '<td>'.$row['Contact'].'</td>';
    echo '<td>'.$row['Whatsapp'].'</td>';
    $no++;
}
// header("Location: Teacher.php");
?>