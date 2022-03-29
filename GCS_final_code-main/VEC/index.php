<?php include('../includes/header.php');?>

<style>
    .layout-spacing {
        margin-top: 10px;
    }
</style>

<!--  END SIDEBAR  -->

<div class="layout-spacing col-12">
    <div class="statbox widget box box-shadow">
        <div class="widget-content">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>CNIC</th>
                            <th>Category</th>
                            <th>Contact#</th>
                            <th>Designation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                        $res=$datafetch->fetchVECMember($SchoolCode);
                        foreach($res as $r){
                           if($r['designation']==0){
                               $designation = "chairman";

                           }elseif($r['designation']==1){

                            $designation = "secertary";
                           }else{
                             $designation = "member";
                           }
                       
                        ?>
                        <tr>
                            <td>
                                <div class="d-flex">
                                    <div class="usr-img-frame mr-2 rounded-circle">
                                        <img alt="avatar" class="img-fluid rounded-circle" src="../assets/img/boy.png">
                                    </div>
                                    <p class="align-self-center mb-0"><?php echo $r['name']?></p>
                                </div>
                            </td>
                            <td><?php echo $r['cnic']?></td>
                            <td><?php echo $r['category']?></td>
                            <td><?php echo $r['contact']?></td>
                            <td><?php echo $designation?></td>

                        </tr>
                    <?php }?>
                    </tbody>
                </table>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                    Add Member
                </button>
            </div>


        </div>
    </div>
</div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../includes/process.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="platform-title">Name</label>
                                <input type="text" class="form-control mb-4" id="platform-title" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="platform-title">CNIC</label>
                                <input type="text" class="form-control mb-4" id="platform-title" name="CNIC" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="platform-title">Contact</label>
                                <input type="text" class="form-control mb-4" id="platform-title" name="contact" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="School Code">Designation</label>
                    <select class="form-control" name="designation">
                        <option>--SELECT--</option>
                        <option value="0">Chairman</option>
                        <option VALUE="1">Secertary</option>
                        <option value="2">Member</option>
                    </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="platform-title">Category</label>
                                <input type="text" class="form-control mb-4" id="platform-title" name="category"required >
                            </div>
                        </div>
                    </div>
                    
                
                    
            </div>
            <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" name="AddVecMember" class="btn btn-primary">Save changes</button>
</div>
</form>
        </div>
    </div>
   

</div>


</div>
</div>
</div>

<?php include('../includes/footer.php');?>