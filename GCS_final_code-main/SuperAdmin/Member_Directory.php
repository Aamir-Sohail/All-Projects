<?php include('includes/header.php'); ?>

<div class="row layout-top-spacing">

    <div class="layout-spacing col-12">
    <?php
                    
                    if(isset($_POST['fetchvecmember'])){
                    $SchoolCode=$data->test_input($_POST['SchoolCode']);
                     if($data->FetchCountVECMember($SchoolCode)==0){
                         echo '<div class="alert alert-warning" role="alert">
                         No VEC List For This School !
                       </div>';
                     }   }            
    
    
    ?>
        <div class="statbox widget box box-shadow">

            <div class="widget-header">
             
                <h3>VEC List</h3>
                
            </div>
            <form action="Member_Directory.php" method="post">
            <div class="d-flex flex-wrap" >

           <?php   
           
           $res=$datafetch->FetchTehsilThroughDistrict($District);
          
           ?>

                <div class="col-md-4 col-sm-6 mb-3 ">
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

                <div class="col-md-4 col-sm-6 mb-3 ">
                    <label for="Tehsil">Union Council</label>
                    <select class="form-control" id="UC">
                        <option>--SELECT--</option>
                        <option>One</option>
                        <option>Two</option>
                        <option>Three</option>
                    </select>
                </div>

               

                <div class="col-md-4 col-sm-6 mb-3">
                    <label for="School Code">GCS Name</label>
                    <select class="form-control" name="SchoolCode" id="School">
                        <option>--SELECT--</option>
                        <option>One</option>
                        <option>Two</option>
                        <option>Three</option>
                    </select>
                </div>
                
           

                <div class="col-12 mt-auto text-right">
                    <button type="submit" name="fetchvecmember" class="btn btn-primary">Search</button>
                </div>
        </div>
    </div>
   

                    </form>
                    <?php
                    
                    if(isset($_POST['fetchvecmember']))
{

  
   $SchoolCode=$data->test_input($_POST['SchoolCode']);
   //'105079'
   $res=$data->FetchVECMember($SchoolCode);
                    
                    ?>

    <div id="tableLight" class="col-12 layout-spacing px-0">
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
                                    <th>Name</th>
                                    <th>CNIC</th>
                                    <th>Category</th>
                                    <th>Contact#</th>
                                    <th>Designation</th>
                                    <th>GCS Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($res as $r ){
                                    if($r['designation']==0){
                                        $designation = "chairman";
        
                                    }elseif($r['designation']==1){
        
                                    $designation = "secertary";
                                    }else{
                                    $designation = "member";
                                    }
                                    $rr=$datafetch->FetchSchoolThroughSchoolCode($SchoolCode);
                                    $schoolName=$rr['CS_Name'];
                                    ?>
                                <tr>
                                    <td class="text-center"><?php echo $r['id'];?></td>
                                    <td><?php echo $r['name'];?></td>
                                    <td><?php echo $r['cnic'];?></td>
                                    <td><?php echo $r['category'];?></td>
                                    <td><?php echo $r['contact'];?></td>
                                    <td><?php echo $designation;?></td>
                                    <td><?php  echo $schoolName;?></td>

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

    </div>
</div>
<?php }?>

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
                console.log(data);
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
                console.log(data);
                $("#School").html(data);
           
            }
        });
    })


</script>