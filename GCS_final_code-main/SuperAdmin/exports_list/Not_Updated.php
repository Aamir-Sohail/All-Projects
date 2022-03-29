<?php
include 'auth.php';


$excel = new exports();
// header("Content-type: application/vnd-ms-excel");
// header("Content-Disposition: attachment; filename=Not Updated.xls");
session_start();
if (!isset($_SESSION['isDPO'])) {
    header("Location: ../../index.php");
    exit();
}

 $data = $excel->Not_Updated();
print_r($_SESSION);
 
if(empty($data)){
    //  header("Location: ../notUpdated.php?alert=No_data");
    exit();
 }
?>
<table border="1">
    <tr>
        <th>SNO.</th> 
        <th>SchoolCode.</th> 
        <th>District</th>
        <th>GCS Name</th>
        <th>Teacher Name</th>
        <th>Teacher CNIC</th>
        <th>Teacher Contact</th>
        
    </tr>
    <?php
$no = 1;

foreach ($data as $row) {
    echo '<tr>';
    echo '<td>'.$no.'</td>';
    echo '<td>'.$row['SchoolCode'].'</td>';
echo '<td>'.$row['DistrictName'].'</td>';
echo '<td>'.$row['CSName'].'</td>';
echo '<td>'.$row['TeacherName'].'</td>';
echo '<td>'.$row['TeacherCNIC'].'</td>';
echo '<td>'.$row['Contact'].'</td>';


    $no++;
}
// header("Location: Teacher.php");
?>