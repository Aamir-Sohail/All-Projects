<?php 
include('../includes/header.php');  
?>

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6 scroll">
                <div id="multi-column-ordering_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4" style="width: 100%">
                    <div class="dt--top-section">
                        <div class="row">
                            <div class="col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center">
                                <div class="dataTables_length" id="multi-column-ordering_length">
                                    <h5>Total Students </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive" style="overflow-x:auto">
                        <table  id="multi-column-ordering" class="table table-hover dataTable"
                            role="grid" aria-describedby="multi-column-ordering_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="multi-column-ordering"
                                        rowspan="1" colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" >SNo
                                    </th>
                                    <!-- <th class="sorting" tabindex="0" aria-controls="multi-column-ordering" rowspan="1"
                                        colspan="1" aria-label="Office: activate to sort column ascending"
                                        >AWR</th> -->
                                    <!-- <th class="sorting" tabindex="0" aria-controls="multi-column-ordering" rowspan="1"
                                        colspan="1" aria-label="Age: activate to sort column ascending"
                                        >Picture</th> -->
                                    <th class="sorting" tabindex="0" aria-controls="multi-column-ordering" rowspan="1"
                                        colspan="2" aria-label="Start date: activate to sort column ascending"
                                        >Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="multi-column-ordering" rowspan="1"
                                        colspan="2" aria-label="Start date: activate to sort column ascending"
                                        >Father Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="multi-column-ordering" rowspan="1"
                                        colspan="1" aria-label="Start date: activate to sort column ascending"
                                        >Gender</th>
                                    
                                    <th class="sorting" tabindex="0" aria-controls="multi-column-ordering" rowspan="1"
                                        colspan="1" aria-label="Salary: activate to sort column ascending"
                                        >Class</th>
                                    
                                        <th class="sorting" tabindex="0" aria-controls="multi-column-ordering" rowspan="1"
                                        colspan="1" aria-label="Salary: activate to sort column ascending"
                                        >Phone No</th>
                                    
                                    <th class="sorting" tabindex="0" aria-controls="multi-column-ordering" rowspan="1"
                                        colspan="1" aria-label="Salary: activate to sort column ascending"
                                        >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $result = $datafetch->fetch_students($SchoolCode);
                                    foreach ($result as $r) {
                                        ?>
                                <tr role="row">
                                    <td><?php echo $r['AutoID'];?></td>
                                    <!-- <td><?php //echo $r['AWR'];?></td> -->
                                    <!-- <td class="sorting_1 sorting_2">
                                        <div class="d-flex">
                                            <div class="usr-img-frame mr-2 rounded-circle">
                                                <img alt="avatar" class="img-fluid rounded-circle"
                                                    src="../uploads/<?php echo $r['Student_Photo'];?>">
                                            </div>
                                        </div>
                                    </td> -->
                                    <td colspan="2"><?php echo $r['ChildName'];?></td>
                                    <td colspan="2"><?php echo $r['FatherName'];?></td>
                                    <td><?php echo $r['Gender'];?></td>
                                    <td>
                                        <?php
                                            $valClass = "";
                                            $class = $r['CClass'];
                                    
                                            if($class == 1){
                                                $valClass = "PlayGroup"; 
                                            }elseif($class == 2){
                                                $valClass = "Nursery";
                                            }elseif($class == 3){
                                                $valClass = "Prep";
                                            }elseif($class == 4){
                                                $valClass = "One";
                                            }elseif($class == 5){
                                                $valClass = "Two";
                                            }elseif($class == 6){
                                                $valClass = "Three";
                                            }elseif($class == 7){
                                                $valClass = "Four";
                                            }elseif($class == 8){
                                                $valClass = "Five";
                                            }elseif($class == 9){
                                                $valClass = "Six";
                                            }elseif($class == 10){
                                                $valClass = "Seven";
                                            }  
                                            elseif($class == 11){
                                                $valClass = "Eight";
                                            }   
                                            elseif($class == 12){
                                                $valClass = "Nine";
                                            }   
                                            elseif($class == 13){
                                                $valClass = "Ten";
                                            }   
                                            elseif($class == 14){
                                                $valClass = "Eleven";
                                            }elseif($class == 15){
                                                $valClass = "Twelve";
                                            }
                                        
                                        echo $valClass;
                                        ?>
                                    </td>
                                   <td><?php echo $r['Contact'];?></td>
                                    <td class="text-center">
                                       <a href="student_edit.php?student_id=<?php echo $r['AutoID'];?>" class="btn btn-info">View | Edit</a>
                                       <button id="delete_student" onclick="delete_student(<?php echo $r['AutoID'];?>)" class="btn btn-danger">Delete</button>
                                       
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include('../includes/footer.php'); ?>
<script>
    function delete_student(id){
        let student_id = id;
        if (confirm('Are You Sure to Delete Student?')) {
        $.ajax({
            type: "POST",
            url: "../includes/process.php",
            data: "MODE=delete_student&Student_id=" + id,
            success: function(data) {
                if(data === '1'){
                    window.location.reload();
                }else{
                    alert("Something Went Wrong!");
                }
            }
        })
        }
        
    }
</script>