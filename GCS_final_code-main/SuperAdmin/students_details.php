<?php include('includes/header.php'); ?>

<div class="row layout-top-spacing">


   
<div class="layout-spacing col-12">
<?php
          
          if(isset($_POST['fetchvecmember'])){
           
            
              $Tehsil= $data->test_input($_POST['Tehsil']);
              $UC= $data->test_input($_POST['UC']);
              $School= $data->test_input($_POST['School']);
              $Class= $data->test_input($_POST['Class']);
              $count=$data->CountStudentList($School,$Class);
             
         
           if($count==0){
               echo '<div class="alert alert-warning" role="alert">
               No Student List availabe !
             </div>';
           }   }            


?>
<form action="students_details.php" method="post">
        <div class="statbox widget box box-shadow">

            <div class="widget-header">
                <div class="row">
                    <div class="col-12">
                        <h3>Students List</h3>
                    </div>
                </div>
            </div>

            <div class="widget-content widget-content-area d-flex flex-wrap border-0" style="justify-content: space-between">
                
            <?php   
           
           $res=$datafetch->FetchTehsilThroughDistrict($District);
          
           ?>

                <div class="col-sm-6 col-md-4 mb-2 ">
                    <label for="Tehsil">Tehsil</label>
                    <select class="form-control" name="Tehsil"id="tehsil">
                        <option>--SELECT--</option>
                        <?php
                        foreach($res as $re){
                           echo' <option value='.$re['TehsilCode'].'>'.$re['TehsilName'].'</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="col-sm-6 col-md-4 mb-2">
                    <label for="Tehsil">UC</label>
                    <select class="form-control" name="UC" id="UC">
                        <option>--SELECT--</option>
                      
                    </select>
                </div>

                <div class="col-sm-6 col-md-4 mb-2 ">
                    <label for="School Code">School </label>
                    <select class="form-control" name="School" id="School">
                        <option>--SELECT--</option>
                        
                    </select>
                </div>

                <!-- <div class="col-4">
                    <label for="School Code">Student Status</label>
                    <select class="form-control">
                        <option>--SELECT--</option>
                        <option>In School</option>
                        <option>Drop out</option>
                        <option>Pass out</option>
                    </select>
                </div> -->
                    
            <?php   
           
           $res=$datafetch->classlookup($District);
          
           ?>
                <div class="col-sm-6 col-md-4 mb-2">
                    <label for="School Code">Class</label>
                    <select class="form-control" name="Class">
                        <option>--SELECT--</option>
                        <?php
                        foreach($res as $re){
                           echo' <option value='.$re['ClassID'].'>'.$re['ClassName'].'</option>';
                        }?>
                     
                    </select>
                </div>

                <!-- <div class="col-4">
                    <label for="School Code">Gender</label>
                    <select class="form-control">
                        <option>--SELECT--</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                </div> -->
                
                <div class="col-12 mt-5 text-right">
                    <button class="btn btn-primary" type="submit" name="fetchvecmember">Search</button>
                </div>
            </div>
        </div>
         
    </form>
    </div>
  
<?php 

if(isset($_POST['StudentList'])){

   
   
   

if($count>0){

    $res=$data->FetchStudentList($SchoolCode,$Class);
    


?>

    <div id="tableLight" class="col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <table class="table table-hover table-light mb-4">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Student Name</th>
                                <th>Father Name</th>
                                <th>Gender</th>
                                <th>DOB</th>
                                <th>Class</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  foreach($res as $row){
                                ?>
                            <tr>
                                <td><?php $row['AutoID'];?></td>
                           
                                <td><?php $row['Student_Name'];?></td>
                                <td><?php $row['Father_Name'];?></td>
                                <td><?php $row['Gender'];?></td>
                                <td><?php $row['DOB'];?></td>
                                <td><?php $row['Current_Class'];?></td>
                               
                            
                                
                                
                                <td>Active</td>

                                <td style="color:#000">
                                    <button class="btn btn-primary p-1"><i class="far fa-eye"></i></button>
                                    <button class="btn p-1 btn-info"><i class="fas fa-edit"></i></i></button>
                                    
                                </td>
                            </tr>
                            <?php }?>
                            
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
    <?php }}?>
</div>


</div>

<?php include('../includes/footer.php'); ?>


<script>

$("#tehsil").on("change", function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "includes/process.php",
            data: "MODE=FetchUC&TehsilCode="+$("#tehsil").val(),
           
            success: function(data) {
       
                $("#UC").html(data);
           
            }
        });
    })
    $("#UC").on("change", function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "includes/process.php",
            data: "MODE=FetchSchool&TehsilCode="+$("#UC").val(),
           
            success: function(data) {
            
                $("#School").html(data);
           
            }
        });
    })
    $("#UC").on("change", function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "includes/process.php",
            data: "MODE=FetchSchool&TehsilCode="+$("#UC").val(),
           
            success: function(data) {
   
                $("#School").html(data);
           
            }
        });
    })
</script>