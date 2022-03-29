<?php include('includes/header.php'); ?>

<div class="row layout-top-spacing">

    <div class="layout-spacing col-12">
         
    <?php
                    
                    if(isset($_POST['meetingfetch'])){
                 
                    $SchoolCodee=$data->test_input($_POST['SchoolCode']);
                    $formDate=$data->test_input($_POST['formDate']);
                    $toDate=$data->test_input($_POST['toDate']);
                  

                     if($data->FetchCountVECMeeting($SchoolCode,$formDate,$toDate)==0){
                         echo '<div class="alert alert-warning" role="alert">
                         No VEC List For This School !
                       </div>';
                     }   }            
    
    
    ?>
        <div class="statbox widget box box-shadow">

            <div class="widget-header">
                <div class="row">
                    <div class="col-12">
                        <h3>VEC Meetings</h3>
                    </div>
                </div>
            </div>
            <form action="meetings.php" method="post">
            <div class="d-flex flex-wrap" >

            <?php   
           
           $res=$datafetch->FetchTehsilThroughDistrict($District);
          
           ?>   
           

                <div class="col-md-4 col-sm-6 mb-2 ">
                    <label for="Tehsil">Tehsil</label>
                    <select class="form-control" id="tehsil">
                        <option>--SELECT--</option>
                        <?php
                        foreach($res as $re){
                           echo' <option value='.$re['TehsilCode'].'>'.$re['TehsilName'].'</option>';
                        }
                        ?>
                    </select>
                </div>


                

                <div class="col-md-4 col-sm-6 mb-2">
                    <label for="School Code">GCS Name</label>
                    <select class="form-control" name="SchoolCode" id="School">
                        <option>--SELECT--</option>
                      
                    </select>
                </div>
                <div class="col-md-4 col-sm-6 mb-2">
                    <label for="School Code">From</label>
                    <input type="date" name="formDate" class="form-control">
                    
                </div>
                <div class="col-md-4 col-sm-6 mb-2">
                    <label for="School Code">To</label>
                    <input type="date" name="toDate"class="form-control">
                    
                </div>

                <div class="col-12 mt-auto text-right">
                    <button type="submit" name="meetingfetch" class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>
    </div>

    </form>
 <?php
 
 if(isset($_POST['meetingfetch'])){
   
   
     $res=$data->FetchVECMeeting($SchoolCodee,$formDate,$toDate);
   
 ?>

    <div id="tableLight" class="col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                <div class="text-right mb-3">
                    <button class="btn btn-primary">Export to Excel</button>
                </div>
                <div class="table-responsive scrollbar scrolledY-axis">
                    <div class="table-scrolled scrollbar">
                    
                        <table class="table table-hover table-light mb-4">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>GCS Name</th>
                                    <th>GCS Code</th>
                                    <th>Date</th>
                                    <th>Present</th>
                                    <th>Absent</th>
                                    <th>Location</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($res as $r ){
                        
                                $rr=$data->FetchSchoolThroughSchoolCode($r['SchoolCode']);
                                $schoolName=$rr['CS_Name'];
                            
                                

                                ?>
                                <tr>
                                    <td class="text-center"><?php  echo $r['Meeting_id'];?></td>
                                    <td><?php  echo $schoolName;?></td>
                                    <td><?php  echo $SchoolCodee;?></td>
                                    <td><?php  echo $r['created_on'];?></td>
                                    <td><?php echo $r['present'];?></td>
                                    <td><?php echo $r['absent'];?></td>
                                    <td><?php echo $r['meeting_place'];?></td>

                                    <td style="color:#000" class="text-center">
                                        <button class="btn btn-primary p-1"><i class="far fa-eye"></i></button>

                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <?php }?>
</div>


</div>

<?php include('../includes/footer.php'); ?>
<script>
    $("#tehsil").on("change", function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "includes/process.php",
            data: "MODE=Fetchbasics&TehsilCode="+$("#tehsil").val(),
           
            success: function(data) {
                console.log(data);
                $("#School").html(data);
           
            }
        });
    })
</script>