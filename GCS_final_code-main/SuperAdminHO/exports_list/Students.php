<?php
include 'auth.php';
$excel = new exports();
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Students_Attendece.xls");
session_start();
if (!isset($_SESSION['isSuperAdmin'])) {
    header("Location: ../../index.php");
    exit();
}
 $data = $excel->Students();
 
if(empty($data)){
     header("Location: ../Teachers.php?alert=No_data");
    exit();
 }
 if(isset($_GET['date'])){
    $Date = $_GET['date'];

?>
<table border="1">
    <tr>
        <th>SNO.</th> 
        <th>SchoolCode.</th> 
        <th>District</th>
        <th>School Name</th>
        <th>Status</th>
        <th>Total Students</th>
        <th>Present Students</th>
        <th>Absent Absents</th>
    </tr>
    <?php
$no = 1;

foreach($data as $r) {
                                     $SchoolCode = $r['SchoolCode'];
                                     $district=$r['DistrictName'];
                                     $present_students = $excel->Fetch_Students_Attendence_Present($SchoolCode, $Date);
                                    $present = $present_students['cnt'];
                                    //  $absent = $excel->Fetch_Students_Attendence_Absent($SchoolCode, $Date);
                                    
                                     $teachers_all = $excel->Fetch_Students($SchoolCode);
                                     $teachers = $teachers_all['cnt'];
                                     $absent =  $teachers - $present;
                                     if($absent < 0){
                                         $absent = 0;
                                     }
                                     if($present == 0){
                                        $status = "UnMarked";
                                    }else{
                                        $status = "Marked";
                                    }
                                    // $absent = '123';
                                     $SchoolName=$r['CS_Name'];
                                $output.='
                                <tr role="row">
                                    <td>'.$no++.'</td>
                                    <td>'.$SchoolCode.'</td>
                                    <td>'.$district.'</td>
                                    <td>'.$SchoolName.'</td>
                                    <td>'.$status.'</td>
                                    <td>'.$teachers.'</td>
                                    <td>'.$present.'</td>
                                    <td>'.$absent.'</td>
                                    
                                  
                                   
                                   
                                </tr>';
}
echo $output;
// header("Location: Teacher.php");
}
?>