<?php include('../includes/header.php'); ?>

<div class="col-lg-12 col-12 layout-top-spacing">
   <form  id="attendenceForm">
    <div class="layout-spacing col-12">
        <div class="statbox widget box box-shadow">

            <div class="widget-header">
                <div class="row">
                    <div class="col-12">
                        <h3>Monitor Teachers Attendance</h3>
                    </div>
                </div>
            </div>

            <div class="widget-content widget-content-area d-flex flex-wrap" style="justify-content: space-between">
<?php $tehsil=$datafetch->getTehsil($District);
;?>
                <div class="col-4 ">
                    <label for="Tehsil">Tehsil</label>

                    <select onchange="fetchSchool(event)" id="tehsil"class="form-control">
                        <option>--SELECT--</option>
                        
                           <?php foreach($tehsil as $row){
                           echo '<option value='.$row['TehsilCode'].'>'.$row['TehsilName'].'</option>';
                            

                           }
                               ?>
                    </select>
                </div>
                <div class="col-4 ">
                    <label for="Tehsil" >GCS School</label>
                    <select class="form-control" id="School" name="SchoolCode">
                        <option>--SELECT--</option>
                
                    </select>
                </div>
                <div class="col-4 ">
                    <label for="Tehsil">Date</label>
                    <input type="date" name="date"class="form-control" placeholder="district">
                </div>


       
                <div class="col-12 mt-5 text-right">
                    <button class="btn btn-primary" type="submit" name="fetchTattendence">Search</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div id="zero-config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="dt--top-section">
                    <div class="row">
                        <div class="col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center">
                            <div class="dataTables_length" id="zero-config_length"><label>
                                    <h4>Attendance of : <?php  if(isset($_POST['date'])){
                                        echo $_POST['date'];
                                    }else{
                                        echo ' ';
                                    }
                                        ?></h4> :
                                </label></div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="zero-config" class="table table-striped dataTable" style="width: 100%;" role="grid" aria-describedby="zero-config_info">
                        <thead>
                            <tr role="row">
                                <th style="width: 10px;" class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 132px;">SNo</th>
                                <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 18px;">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 96px;">CNIC</th>
                                <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 100px;">Marked As</th>
                                <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 100px;">Attendance Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($_POST['fetchTattendence'])){
                           $result= $datafetch->fetchTeacherAttendenceBySchoolCode($_POST['SchoolCode'],$_POST['date']);
                        
foreach($result as $row){

 ?>
                            <tr role="row">
                                <td><?php echo $row['Teacher_Id']?></td>
                                <td><?php echo $row['Teacher_Name']?></td>
                                <td><?php echo $row['CNIC']?></td>
                                <?php
                                  if ($row['status']=='0') {
                                    $status="Present";
                                } elseif ($row['status']=='1') {
                                    $status="Leave";
                                } elseif ($row['status']=='2') {
                                    $status='Absent';
                                }
                                ?>
                                <td><?php echo $status?></td>
                                <td>
                                <div class="n-chk">
                                    <label class="new-control new-checkbox checkbox-secondary">
                                        <input type="checkbox" class="new-control-input" name="id[]" checked>
                                        <span class="new-control-indicator"></span>Verified
                                    </label>
                                </div>
                                </td>
                            </tr>
                            <?php
                            }
                        } ?>
                           
                        </tbody>
                    </table>
                    <div style="float: right;">
                        <input type="submit" name="txt" class="mt-4 btn btn-primary">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

<?php include('../includes/footer.php'); ?>

<script>


    function fetchSchool(event){
   districtCode=document.getElementById("tehsil").value;
   $.ajax({
       url:"./includes/process.php",
       method:"POST",
       data:{MODE:"fetchSchoolByDistrict",tehsilCode:districtCode},
       success:function (res){
           console.log(res);
           $("#School").html(res);
       }

   })

    }
    
</script>