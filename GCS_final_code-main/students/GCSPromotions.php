<?php include('../includes/header.php');

?>

<div class="col-lg-12 col-12 layout-top-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>GCS Students Promotion / Shifting</h4>
                </div>
            </div>
        </div>
        <?php
        if(isset($_GET['alert']) && $_GET['alert']=='success'){
            echo '<div class="alert alert-success" role="alert">
          The selected student have been promoted!
        </div>';
        }elseif(isset($_GET['alert']) && $_GET['alert']=='fail'){
            echo '<div class="alert alert-danger" role="alert">
            The selected student have not been promoted!
          </div>';
        }
        ?>
        <div class="widget-content widget-content-area">

            <div class="row">

                <div class="col-xl-3 mb-xl-0 mb-2">
                    <p><b>Class</b></p>
                    <select class="form-control form-control-sm" id="classes" onchange="fetchStudent()" >
                        <?php $class=$datafetch->getClass();
                      
                        foreach($class as $row){
                            echo '<option  value="'.$row['ClassID'].'">'.$row['ClassName'].'</option>';
                        }
                        
                        
                        ?>
                        
                    </select>
                </div>
               
                
               

            </div>

        </div>
    </div>
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div id="multi-column-ordering_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="dt--top-section">
                        <div class="row">
                            <div class="col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center">
                                <div class="dataTables_length" style="margin-bottom: 5%;" id="multi-column-ordering_length">
                                    <h5>PROMOTION / SHIFT MANAGEMENT</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form  action="../includes/process.php" method="POST">
                    <div class="table-responsive">
                        <table id="multi-column-ordering" class="table table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="multi-column-ordering_info">
                            <thead>
                                <tr role="row" class="table_start">

                                    <th class="sorting_asc" tabindex="0" aria-controls="multi-column-ordering" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 140px;">SNo</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="multi-column-ordering" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 140px;">AWR#</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="multi-column-ordering" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 140px;">Name</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="multi-column-ordering" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 140px;">Father Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="multi-column-ordering" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 236px;">Gender</th>
                                    <!-- <th class="sorting" tabindex="0" aria-controls="multi-column-ordering" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 118px;">Group</th> -->
                                    <th class="sorting" tabindex="0" aria-controls="multi-column-ordering" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 123px;">Action</th>
                                </tr>
                            </thead>
                            
                            <tbody id="studentTable">
                               
                          
                          
                               
                            </tbody>
                           
                            <tfoot>
                                <tr class="table_end">

                                    <th rowspan="1" colspan="1">SNo</th>
                                    <th rowspan="1" colspan="1">AWR#</th>
                                    <th rowspan="1" colspan="1">Name</th>
                                    <th rowspan="1" colspan="1">Father Name</th>
                                    <th rowspan="1" colspan="1">Gender</th>
                                    <th rowspan="1" colspan="1">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                        <div style="float: right;">
                        <input type="hidden" name="MODE" value="promotion">
                        <input type="submit" name="txt" class="mt-4 btn btn-primary">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
<script>
    function fetchStudent(){
     
    classID=$("#classes").val();
        if(classID == "8"){
            $(".table_end").append('<th rowspan="1" colspan="1">School Name</th>');
        $(".table_end").append('<th rowspan="1" colspan="1">Fresh Contact#</th>');
        $(".table_start").append('<th class="sorting" tabindex="0" aria-controls="multi-column-ordering" rowspan="1" colspan="1" style="width: 123px;">School Name</th>');
        $(".table_start").append('<th class="sorting" tabindex="0" aria-controls="multi-column-ordering" rowspan="1" colspan="1" style="width: 123px;">Fresh Contact#</th>');

    $(".onAbsent").html('<div class="form-check"> <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"> <label class="form-check-label" for="flexRadioDefault1"> Passout </label> </div> <div class="form-check"> <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked> <label class="form-check-label" for="flexRadioDefault2"> struck off </label> </div>')

            $.ajax({
        method:'POST',
        url:'../includes/process.php',
        data:{classID:classID,MODE:"fetchStudent"},
        success:function(res){
           element=JSON.parse(res);
var student='';

           element.forEach((ele)=>{
          student+=` <tr role="row"  class="new_table">
                                    <td>${ele.autoid}</td>
                                    <td>${ele.awr}</td>
                                    <td>${ele.studentName}</td>
                                    <td>${ele.fatherName}</td>
                                   
                                    <td>${ele.gender}</td>
                                    <td>
                                        <div class="n-chk">
                                            <label class="new-control new-checkbox checkbox-primary">
                                                <input type="checkbox" name="Id[]" value="${ele.autoid}" >
                                                Promote
                                            </label>
                                        </div>

                                    </td>
                                    <td><input id="t-text" type="text" name="schoolName" class="form-control" required="" aria-autocomplete="list"></td>
                                    <td><input id="t-text" type="text" name="freshContanct" class="form-control" required="" aria-autocomplete="list"></td>
                                </tr>`
           })
          
           $("#studentTable").html(student);
        }
       

    })

    }else{
        $.ajax({
        method:'POST',
        url:'../includes/process.php',
        data:{classID:classID,MODE:"fetchStudent"},
        success:function(res){
           element=JSON.parse(res);
var student='';

           element.forEach((ele)=>{
          student+=` <tr role="row"  class="new_table">
                                    <td>${ele.autoid}</td>
                                    <td>${ele.awr}</td>
                                    <td>${ele.studentName}</td>
                                    <td>${ele.fatherName}</td>
                                   
                                    <td>${ele.gender}</td>
                                    <td>
                                        <div class="n-chk">
                                            <label class="new-control new-checkbox checkbox-primary">
                                                <input type="checkbox" name="Id[]" value="${ele.autoid}" >
                                                Promote
                                            </label>
                                        </div>

                                    </td>
                                </tr>`
           })
          
           $("#studentTable").html(student);
        }
       

    })
    }
 

    

    }

    </script>